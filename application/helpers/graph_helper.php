<?php
function get_last_12_months(){
	return ['end' => date('Y-m-d'), 'start' => date('Y-m-d',strtotime(' -1 year'))];
}



function _get_investments_by_month($years,$user_id,$dashboard=false){
	$ci =& get_instance();
	$months = get_month();
	
	/*
	get investments of given year invested before within or before that year.
	*/
	
	if($dashboard){
		$qd1 = get_last_12_months();
		$query_date_1 = $qd1['start'];
		$query_date_2 = $qd1['end'];
	}else{
		$query_date_1 = $years.'-01-01';
		$query_date_2 = $years.'-12-31';
	}
	
	$inv_query = $ci->db->query("SELECT * FROM user_investments WHERE txn_date <= '$query_date_2' AND user_id = '$user_id' ORDER BY txn_date ASC");
	
	//$inv_query = $ci->db->query("SELECT * FROM user_investments WHERE txn_date >= '$query_date_1' AND txn_date <= '$query_date_2' AND user_id = '$user_id' ORDER BY txn_date ASC");
	
	//echo $ci->db->last_query().'<br>';
	
	if($inv_query->num_rows() > 0){
		$investments = $inv_query->result();
		//echo '<pre>'; print_r($investments); echo '</pre>';
		
		$graph_data = '[';
		$total_investments = 0;
		foreach($investments as $row){
			$month_num = $months[(date('m',strtotime($row->txn_date))-1)];
			if($graph_data != '['){
				$graph_data .= ",";
			}
			$total_investments += $row->amount;
			
			$graph_data .= "['$month_num',$total_investments]";
		}
		$graph_data .= "]";
		
		
		
		
		return $graph_data;
		
		/*foreach($months as $month_num => $month_name){
			$month_num =  ($month_num+1);
			
		}
		$start_date = new DateTime($investments->txn_date);
		$end_date = new DateTime();
		$date_difference = $start_date->diff($end_date);*/
		
		
	}else{
		//echo 'No result found';
		return false;
	}
	
}
function __get_investments_by_month($years,$user_id){
	$ci =& get_instance();
	$months = get_month();
	
	/*
	get investments of given year invested before within or before that year.
	*/
	
	$query_date_1 = $years.'-01-01';
	$query_date_2 = $years.'-12-31';
	
	$inv_query = $ci->db->query("SELECT * FROM user_investments WHERE txn_date <= '$query_date_2' AND user_id = '$user_id' AND status = '1' ORDER BY txn_date ASC");
	
	
	//echo $ci->db->last_query().'<br>'; die;
	
	if($inv_query->num_rows() > 0){
		$investments = $inv_query->result();
		$user_interest_rate = $ci->db->select('interest_rate')->get_where('customer',['id' => $user_id])->row()->interest_rate;
		
		$investment_start_date = new DateTime($investments[0]->txn_date);
		$investment_last_date = new DateTime($query_date_2);
		
		$inv_diff = $investment_start_date->diff($investment_last_date);
		$years_between = $inv_diff->format('%y')*12;
		$months_between = $inv_diff->format('%m') + $years_between;
		
			echo '<br>**** start: '.$investment_start_date->format('Y-m-d').', last: '.$investment_last_date->format('Y-m-d').', total months: '.$months_between.'<br>'; 
		
		$loop_year = $investment_start_date->format('Y');
		$loop_investment = 0;
		$loop_start = 1;
		$loop_month = 0; //month counter for year consideration
		$graph_data = [];
		
		//check if the investment start date is less than 1 year ago.
		if($months_between < 12){
			$loop_start = $investment_start_date->format('m');
			$months_between += $loop_start;
		}
		
		
		for($i = $loop_start; $i <= $months_between; $i++){
			
			//pre processing
			$loop_month++;
			if($loop_month > 12){
				$loop_year++;
				$loop_month = 1;
			}
			
			$lm_total_days = cal_days_in_month(CAL_GREGORIAN,$loop_month,$loop_year);
			$lm_calc_days = $lm_total_days;
			
			$lmd_start = new DateTime($loop_year.'-'.$loop_month.'-01');
			
			$lmd_end = new DateTime($loop_year.'-'.$loop_month.'-'.$lm_total_days);
			$investment_point = '';
			$only_interest = 0;
			$tmp_only_interest = 0;
			
			$only_bank_interest = 0;
			$tmp_bank_interest = 0;
			
			//main processing
			foreach($investments as $user_investment){
				$user_inv_date = new DateTime($user_investment->txn_date);
				
				echo '<br>'.$user_inv_date->format('Y-m-d').': >= start: '.$lmd_end->format('Y-m-d').' and <= end: '.$lmd_end->format('Y-m-d').'<br>';
				
				if($user_inv_date >= $lmd_start and $user_inv_date <= $lmd_end){
					//this investment started within this current loop month
					$inv_loop_day = $user_inv_date->format('%d');
					$investment_point = 'Added new investment of &pound;'.$user_investment->amount.' on '.$user_investment->txn_date;
					$loop_investment += $user_investment->amount;
					
					// calculate total investment amount based on days until this investment date.
					$only_interest = calculate_interest($loop_investment,$user_interest_rate,$inv_loop_day);
					
					$tmp_only_interest += $only_interest;
					
					//bank calculation
					$only_bank_interest = calculate_interest($loop_investment,2,$inv_loop_day);//for dashboard 2% based interest
					$tmp_bank_interest += $only_bank_interest;
					
					$loop_investment += $only_interest;
					
					$lm_calc_days -= ($inv_loop_day);
				}
				
				unset($inv_loop_day);
			}
			/*
			*** issue on having multiple investments addition in same month, confirm
			*/
			
			//calculate interest for remaining days of month
			$only_interest = calculate_interest($loop_investment,$user_interest_rate,$lm_calc_days);
			$tmp_only_interest += $only_interest;
			
			//bank calculation
			$only_bank_interest = calculate_interest($loop_investment,2,$lm_calc_days);
			$tmp_bank_interest += $only_bank_interest;
			
			$loop_investment += $only_interest;
			
			//if($loop_year == $years){
				$loop_month_name = $months[($loop_month-1)];
				
				$graph_data[] = [
					'label' => $loop_month_name.'-'.$loop_year,
					'amount' => $loop_investment,
					'year' => $loop_year,
					'month' => $loop_month_name,
					'info' => $investment_point,
					'interest' => $tmp_only_interest,
					'bank_interest' => $tmp_bank_interest
				];
			//}
			
			
			
		}
		
		
		echo '<pre>'; print_r($graph_data); echo '</pre>';
		
		//echo '<br>'.$graph_data; die;
		
		return $graph_data;
		
		/*foreach($months as $month_num => $month_name){
			$month_num =  ($month_num+1);
			
		}
		$start_date = new DateTime($investments->txn_date);
		$end_date = new DateTime();
		$date_difference = $start_date->diff($end_date);*/
		
		
	}else{
		//echo 'No result found';
		return false;
	}
	
}


function get_investments_by_month($years,$user_id,$dashboard=false){
	$ci =& get_instance();
	$months = get_month();
	
	/*
	get investments of given year invested before within or before that year.
	*/
	if($dashboard){
		$qd1 = get_last_12_months();
		//print_r($qd1); echo '<br>';
		$query_date_1 = $qd1['start'];
		$query_date_2 = $qd1['end'];
	}else{
		
		//echo 'Before Year: '.$years.'<br>';
		$query_date_1 = $years.'-01-01';
		$query_date_2 = $years.'-12-31';
		if(date('Y') == $years){
			$d1 = new DateTime($query_date_2);
			$d2 = new DateTime();
			if($d1 > $d2){
				$query_date_2 = date('Y-m-d');
			}
		}
	}
	
	$ai_day = [];
	//echo 'After year: '.$years.'<br>';
	$inv_query = $ci->db->query("SELECT * FROM user_investments WHERE txn_date <= '$query_date_2' AND user_id = '$user_id' AND status = '1' ORDER BY txn_date ASC");
	
	
	//echo $ci->db->last_query().'<br>';
	
	if($inv_query->num_rows() > 0){
		$investments = $inv_query->result();
		$user_interest_rate = $ci->db->select('interest_rate')->get_where('customer',['id' => $user_id])->row()->interest_rate;
		$user_interest_rate = ($user_interest_rate==0)?10:$user_interest_rate;
		
		//echo '<br>Interest Rate: '.$user_interest_rate.'%<br>';
		
		//applying additional calculation adjustment
		//$user_interest_rate = adjust_calculation($user_interest_rate);
		
		//echo '<br>Interest Rate: '.$user_interest_rate.'%<br>';
		
		$investment_start_date = new DateTime($investments[0]->txn_date);
		$investment_last_date = new DateTime($query_date_2);
		
		$inv_diff = $investment_start_date->diff($investment_last_date);
		$years_between = $inv_diff->format('%y')*12;
		$months_between = $inv_diff->format('%m') + $years_between+1;
		$days_between = $inv_diff->format('%d');
		
		//echo '<br>**** start: '.$investment_start_date->format('Y-m-d').', last: '.$investment_last_date->format('Y-m-d').', total months: '.$months_between.', Days: '.$days_between.'<br>'; 
		
		$loop_year = $investment_start_date->format('Y');
		
		$loop_investment = 0;
		$loop_start = 1;
		$loop_month = 0; //month counter for year consideration
		
		//$loop_month = (int) $investment_start_date->format('m'); //month counter for year consideration
		
		$graph_data = [];
		$today_date = new DateTime();
		
		
		//check if the investment start date is less than 1 year ago.
		if($months_between < 12){
			$loop_start = $investment_start_date->format('m');
			$months_between += $loop_start;
			$loop_month = ($loop_start-1);
		}
		
		
		for($i = $loop_start; $i <= $months_between; $i++){
			
			//pre processing
			$loop_month++;
			if($loop_month > 12){
				$loop_year++;
				$loop_month = 1;
			}
			
			$calc_info = '';
			
			$lm_total_days = cal_days_in_month(CAL_GREGORIAN,$loop_month,$loop_year);
			
			$lm_calc_days = $lm_total_days;
			
			$lmd_start = new DateTime($loop_year.'-'.$loop_month.'-01');
			
			//skipping if its in future
			if($lmd_start > $today_date){
				break;
			}
			
			$lmd_end = new DateTime($loop_year.'-'.$loop_month.'-'.$lm_total_days);
			
			//if end period is in between the month
			if($lmd_end->format('Y') == date('Y') && $lmd_end->format('m') == date('m') && $lmd_end > new DateTime()){
				$lmd_end = new DateTime();
				$lm_calc_days = $lmd_end->format('d');
				$calc_info = 'To date: '.$lmd_end->format($ci->config->item('date_format'));
			}
			
			
			//echo '<br>LM: '.$loop_month.', LY: '.$loop_year.', lm_tdays: '.$lm_total_days.', lmd_start: '.$lmd_start->format('Y-m-d').', lmd_end: '.$lmd_end->format('Y-m-d').'<br>';
			$investment_point = '';
			$only_interest = 0;
			$tmp_only_interest = 0;
			
			$only_bank_interest = 0;
			$tmp_bank_interest = 0;
			
			$loop_month_name = $months[($loop_month-1)];
			
			//main processing
			foreach($investments as $user_investment){
				$user_inv_date = new DateTime($user_investment->txn_date);
				
				//echo '<br>'.$user_inv_date->format('Y-m-d').': >= start: '.$lmd_end->format('Y-m-d').' and <= end: '.$lmd_end->format('Y-m-d').'<br>';
				
				if($user_inv_date >= $lmd_start and $user_inv_date <= $lmd_end){
					//this investment started within this current loop month
					
					//if its first entry then set days to 0
					$inv_loop_day = $user_inv_date->format('d');
					
					$investment_point = 'Added new investment of &pound;'.$user_investment->amount.' on '.date($ci->config->item('date_format'),strtotime($user_investment->txn_date));
					$loop_investment += $user_investment->amount;
					
					//adding init entry
					$fe_loop_gd = [
						'init' => true, //shows investment init point.
						'label' => $loop_month_name,
						'label-1' => $loop_month_name.'-'.$loop_year,
						'amount' => $loop_investment,
						'year' => $loop_year,
						'month' => $loop_month_name,
						'info' => $investment_point,
						'interest' => $tmp_only_interest,
						'bank_interest' => $tmp_bank_interest
					];
					//echo '<br>'; print_r($fe_loop_gd); echo '<br>';
					$graph_data[] = $fe_loop_gd;
					
					// calculate total investment amount based on days until this investment date.
					$only_interest = (count($graph_data) > 1)?calculate_interest($loop_investment,$user_interest_rate,$inv_loop_day):0;
					
					$tmp_only_interest += $only_interest;
					
					//bank calculation
					$bank_interest_rate = adjust_calculation1(2);
					$only_bank_interest = (count($graph_data) > 1)?calculate_interest($loop_investment,$bank_interest_rate,$inv_loop_day):0;//for dashboard 2% based interest
					$tmp_bank_interest += $only_bank_interest;
					
					$loop_investment += $only_interest;
					
					//echo '<br>'.$lm_calc_days.' - '.$inv_loop_day.'<br>';
					$lm_calc_days -= ($inv_loop_day);
				}
				
				unset($inv_loop_day);
			}
			/*
			*** issue on having multiple investments addition in same month, confirm
			*/
			//echo '<br>Days: '.$lm_calc_days.'<br>';
			
			//calculating annual interest and saving to array for later use
			
			if(!array_key_exists($loop_year,$ai_day)){
				//echo 'LI: '.$loop_investment.', Interest: '.$user_interest_rate.'<br>';
				$n_lp_int = calculate_annual_interest($loop_investment,$user_interest_rate);
				$ai_day[$loop_year] = $n_lp_int+$loop_investment;
				//echo '<pre>'; print_r($ai_day); echo '</pre>';
			}
			
			
			
			//calculate interest for remaining days of month
			$only_interest = calculate_interest(($ai_day[$loop_year]),$user_interest_rate,$lm_calc_days);
			$tmp_only_interest += $only_interest;
			
			//bank calculation
			//$bank_interest_rate = adjust_calculation1(2);
			$only_bank_interest = calculate_interest(($ai_day[$loop_year]),$bank_interest_rate,$lm_calc_days);
			$tmp_bank_interest += $only_bank_interest;
			
			$loop_investment += $only_interest;
			
			//if($loop_year == $years){
				
				$fr_gd = [
					'init' => false, //shows investment init point.
					'label' => $loop_month_name,
					'label-1' => $loop_month_name.'-'.$loop_year,
					'amount' => $loop_investment,
					'year' => $loop_year,
					'month' => $loop_month_name,
					'info' => $calc_info,
					'interest' => $tmp_only_interest,
					'bank_interest' => $tmp_bank_interest,
					'calc_days' => $lm_calc_days,
				];
				
				//echo '<br>'; print_r($fr_gd); echo '<br>';
				
				$graph_data[] = $fr_gd;
			//}
			
			
			
		}
		
		
		//echo '<pre>'; print_r($graph_data); echo '</pre>';
		
		//echo '<br>'.$graph_data; die;
		
		return $graph_data;
		
		/*foreach($months as $month_num => $month_name){
			$month_num =  ($month_num+1);
			
		}
		$start_date = new DateTime($investments->txn_date);
		$end_date = new DateTime();
		$date_difference = $start_date->diff($end_date);*/
		
		
	}else{
		//echo 'No result found';
		return false;
	}
	
}

function get_investments_by_duration($user_id,$start_date,$end_end,$dashboard=false){
	$ci =& get_instance();
	$months = get_month();
	
	/*
	get investments of given year invested before within or before that year.
	*/
	if($dashboard){
		$qd1 = get_last_12_months();
		//print_r($qd1); echo '<br>';
		$query_date_1 = $qd1['start'];
		$query_date_2 = $qd1['end'];
	}else{
		//echo 'Before Year: '.$years.'<br>';
		$query_date_1 = $years.'-01-01';
		$query_date_2 = $years.'-12-31';
		if(date('Y') == $years){
			$d1 = new DateTime($query_date_2);
			$d2 = new DateTime();
			if($d1 > $d2){
				$query_date_2 = date('Y-m-d');
			}
		}
	}
	//echo 'After year: '.$years.'<br>';
	$inv_query = $ci->db->query("SELECT * FROM user_investments WHERE txn_date <= '$query_date_2' AND user_id = '$user_id' AND status = '1' ORDER BY txn_date ASC");
	
	
	//echo $ci->db->last_query().'<br>';
	
	if($inv_query->num_rows() > 0){
		$investments = $inv_query->result();
		$user_interest_rate = $ci->db->select('interest_rate')->get_where('customer',['id' => $user_id])->row()->interest_rate;
		$user_interest_rate = ($user_interest_rate==0)?10:$user_interest_rate;
		
		//echo '<br>Interest Rate: '.$user_interest_rate.'%<br>';
		
		//applying additional calculation adjustment
		$user_interest_rate = adjust_calculation($user_interest_rate);
		
		//echo '<br>Interest Rate: '.$user_interest_rate.'%<br>';
		
		$investment_start_date = new DateTime($investments[0]->txn_date);
		$investment_last_date = new DateTime($query_date_2);
		
		$inv_diff = $investment_start_date->diff($investment_last_date);
		$years_between = $inv_diff->format('%y')*12;
		$months_between = $inv_diff->format('%m') + $years_between+1;
		$days_between = $inv_diff->format('%d');
		
		//echo '<br>**** start: '.$investment_start_date->format('Y-m-d').', last: '.$investment_last_date->format('Y-m-d').', total months: '.$months_between.', Days: '.$days_between.'<br>'; 
		
		$loop_year = $investment_start_date->format('Y');
		$loop_investment = 0;
		$loop_start = 1;
		$loop_month = 0; //month counter for year consideration
		
		//$loop_month = (int) $investment_start_date->format('m'); //month counter for year consideration
		
		$graph_data = [];
		$today_date = new DateTime();
		
		
		//check if the investment start date is less than 1 year ago.
		if($months_between < 12){
			$loop_start = $investment_start_date->format('m');
			$months_between += $loop_start;
			$loop_month = ($loop_start-1);
		}
		
		
		for($i = $loop_start; $i <= $months_between; $i++){
			
			//pre processing
			$loop_month++;
			if($loop_month > 12){
				$loop_year++;
				$loop_month = 1;
			}
			
			$calc_info = '';
			
			$lm_total_days = cal_days_in_month(CAL_GREGORIAN,$loop_month,$loop_year);
			
			$lm_calc_days = $lm_total_days;
			
			$lmd_start = new DateTime($loop_year.'-'.$loop_month.'-01');
			
			//skipping if its in future
			if($lmd_start > $today_date){
				break;
			}
			
			$lmd_end = new DateTime($loop_year.'-'.$loop_month.'-'.$lm_total_days);
			
			//if end period is in between the month
			if($lmd_end->format('Y') == date('Y') && $lmd_end->format('m') == date('m') && $lmd_end > new DateTime()){
				$lmd_end = new DateTime();
				$lm_calc_days = $lmd_end->format('d');
				$calc_info = 'To date: '.$lmd_end->format($ci->config->item('date_format'));
			}
			
			
			
			
			//echo '<br>LM: '.$loop_month.', LY: '.$loop_year.', lm_tdays: '.$lm_total_days.', lmd_start: '.$lmd_start->format('Y-m-d').', lmd_end: '.$lmd_end->format('Y-m-d').'<br>';
			$investment_point = '';
			$only_interest = 0;
			$tmp_only_interest = 0;
			
			$only_bank_interest = 0;
			$tmp_bank_interest = 0;
			
			$loop_month_name = $months[($loop_month-1)];
			
			//main processing
			foreach($investments as $user_investment){
				$user_inv_date = new DateTime($user_investment->txn_date);
				
				//echo '<br>'.$user_inv_date->format('Y-m-d').': >= start: '.$lmd_end->format('Y-m-d').' and <= end: '.$lmd_end->format('Y-m-d').'<br>';
				
				if($user_inv_date >= $lmd_start and $user_inv_date <= $lmd_end){
					//this investment started within this current loop month
					
					//if its first entry then set days to 0
					$inv_loop_day = $user_inv_date->format('d');
					
					$investment_point = 'Added new investment of &pound;'.$user_investment->amount.' on '.date($ci->config->item('date_format'),strtotime($user_investment->txn_date));
					$loop_investment += $user_investment->amount;
					
					//adding init entry
					$fe_loop_gd = [
						'init' => true, //shows investment init point.
						'label' => $loop_month_name,
						'label-1' => $loop_month_name.'-'.$loop_year,
						'amount' => $loop_investment,
						'year' => $loop_year,
						'month' => $loop_month_name,
						'info' => $investment_point,
						'interest' => $tmp_only_interest,
						'bank_interest' => $tmp_bank_interest
					];
					//echo '<br>'; print_r($fe_loop_gd); echo '<br>';
					$graph_data[] = $fe_loop_gd;
					
					// calculate total investment amount based on days until this investment date.
					$only_interest = (count($graph_data) > 1)?calculate_interest($loop_investment,$user_interest_rate,$inv_loop_day):0;
					
					$tmp_only_interest += $only_interest;
					
					//bank calculation
					$bank_interest_rate = adjust_calculation1(2);
					$only_bank_interest = (count($graph_data) > 1)?calculate_interest($loop_investment,$bank_interest_rate,$inv_loop_day):0;//for dashboard 2% based interest
					$tmp_bank_interest += $only_bank_interest;
					
					$loop_investment += $only_interest;
					
					//echo '<br>'.$lm_calc_days.' - '.$inv_loop_day.'<br>';
					$lm_calc_days -= ($inv_loop_day);
				}
				
				unset($inv_loop_day);
			}
			/*
			*** issue on having multiple investments addition in same month, confirm
			*/
			//echo '<br>Days: '.$lm_calc_days.'<br>';
			
			
			
			//calculate interest for remaining days of month
			$only_interest = calculate_interest($loop_investment,$user_interest_rate,$lm_calc_days);
			$tmp_only_interest += $only_interest;
			
			//bank calculation
			$bank_interest_rate = adjust_calculation1(2);
			$only_bank_interest = calculate_interest($loop_investment,$bank_interest_rate,$lm_calc_days);
			$tmp_bank_interest += $only_bank_interest;
			
			$loop_investment += $only_interest;
			
			//if($loop_year == $years){
				
				$fr_gd = [
					'init' => false, //shows investment init point.
					'label' => $loop_month_name,
					'label-1' => $loop_month_name.'-'.$loop_year,
					'amount' => $loop_investment,
					'year' => $loop_year,
					'month' => $loop_month_name,
					'info' => $calc_info,
					'interest' => $tmp_only_interest,
					'bank_interest' => $tmp_bank_interest,
					'calc_days' => $lm_calc_days,
				];
				
				//echo '<br>'; print_r($fr_gd); echo '<br>';
				
				$graph_data[] = $fr_gd;
			//}
			
			
			
		}
		
		
		//echo '<pre>'; print_r($graph_data); echo '</pre>';
		
		//echo '<br>'.$graph_data; die;
		
		return $graph_data;
		
		/*foreach($months as $month_num => $month_name){
			$month_num =  ($month_num+1);
			
		}
		$start_date = new DateTime($investments->txn_date);
		$end_date = new DateTime();
		$date_difference = $start_date->diff($end_date);*/
		
		
	}else{
		//echo 'No result found';
		return false;
	}
	
}


function get_month(){
	return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
}
function get_total_days($year){
	return 365;
	$d1 = new DateTime($year.'-01-01');
	$d2 = new DateTime($year.'-12-31');
	$diff = $d1->diff($d2);
	$days = $diff->format('%d')+ ($diff->format('%m')*30) +($diff->format('%y')*12*30);
	return $days;
}

//echo get_total_days(2020);

function calculate_interest($investment,$interest_rate,$days){
	//return round(($investment*$interest_rate*$days)/365,2);
	//return round(($investment/365/100*$interest_rate)*$days);
	return round((($investment/100*$interest_rate)/365)*$days,0);
}

function calculate_annual_interest($investment,$interest_rate){
	//return round(($investment*$interest_rate*$days)/365,2);
	//return round(($investment/365/100*$interest_rate)*$days);
	return round(($investment/100*$interest_rate),0);
}

function _calculate_roi($investment,$interest_rate,$total_days){
	return $investment*$interest_rate*$total_days;
}

function calculate_growth($original_value,$new_value){
	$r['profit'] = $new_value - $original_value;
	$r['growth'] = round(($r['profit']/$original_value)*100,2);
	return $r;
}

function adjust_calculation($interest_rate){
	$per = 95.67;
	return ($interest_rate/100*$per);
}
function adjust_calculation1($interest_rate){
	$per = 68.00;
	$per = 95.67;
	return ($interest_rate/100*$per);
}

function format_graph($graph_data,$year = false,$dash_dates = false,$dash_start=false,$dash_end=false){
	/*if(!$year){
		$year = date('Y');
	}*/
	
	$str = "[";
	
	$count_t = count($graph_data);
	foreach($graph_data as $gd){
		if($gd['init']==true && $count_t > 1){
			continue;
		}
		
	$cDate = new DateTime($gd['label']); //current date time
	if(($dash_dates == false && $gd['year'] == $year) || ($dash_dates == true && $cDate >= $dash_start && $cDate <= $dash_end)){
		//if($gd['year'] == $year){
			if($str != '['){
				$str .= ",";
			}
			$str .= "['".$gd['label']."',".$gd['amount']."]";
		}
	}
	
	$str .= "]";
	return $str;
}

function get_total_invested($user_id){
	$ci =& get_instance();
	return $ci->db->query("SELECT txn_date,sum(amount) as total_invested FROM user_investments WHERE user_id = '".$user_id."' AND status = '1' ORDER BY txn_date ASC")->row();
}

/* Admin Dashboard*/


?>