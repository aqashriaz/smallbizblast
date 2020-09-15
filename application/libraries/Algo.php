<?php
/*
* 2 investments can't be of same day (if exists sum up both and add them as single)
* changing interest rate will effect whole history not from change date onward.
*/
class Algo{
	
	//general vars
	var $ci,$_debug=false;
	var $bank_interest_rate = 2; // 2%
	
	//date variables
	var $start_date,$end_date,$duration;
	var $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	//user variables
	var $user_id,$user_investments,$user_interest_rate;
	var $investment_start_date;
	
	//calculation variables
	var $yLoop;
	
	function __construct($user_id){
		$this->ci =& get_instance();
		$this->user_id = $user_id[0];
		if(ENVIRONMENT=='development'){
			//$this->_debug=true;
		}
	}
	
	
	
	function init($start_date='',$end_date=''){
		if(!$start_date){
			$d = $this->get_last_12_months();
			//$this->debug($d);
			$this->start_date = new DateTime($d['start']);
			$this->end_date = new DateTime($d['end']);
		}else{
			$this->start_date = new DateTime($start_date);
			$this->end_date = new DateTime($end_date);
		}
		$today = new DateTime();
		if($this->end_date > $today){
			$this->end_date = $today;
		}
		//$this->debug(['end' => $this->end_date->format('Y-m-d')]);
		//echo '<br>B: '.$end_date.', A: '.$this->end_date->format('Y-m-d');
		
		$this->get_user_investments();
		$this->get_user_interest_rate();
		
		if(count($this->user_investments) > 0){
			return $this->process();
		}
		return false;
	}
	
	function process(){
		$mLoop = 12;
		$loop_year = $this->start_date->format('Y');
		$loop_month = $this->start_date->format('m');
		$loop_day = $this->start_date->format('d');
		$calculate = true;
		
		$_A = [];
		$_B = [];
		//echo '<br> Duration: '.$this->duration.'<br>';
		//echo '<br>'.$this->yLoop.' Year(s) Loop, ';
		$lpD = 0;
		for($y = 1;$y <= $this->yLoop; $y++){
			for($m = 1; $m <= $mLoop; $m++){
				if($lpD==0){
					$m = $loop_month;
				}
				//echo '<br>LM: '.$loop_month.', LY: '.$loop_year;
				$month_tDays = cal_days_in_month(CAL_GREGORIAN,$loop_month,$loop_year);
				$loop_month_name = $this->months[$loop_month-1];
				//echo '=> tDays: '.$month_tDays.', LM_name: '.$loop_month_name;
				for($d = 1; $d <= $month_tDays; $d++){
					if($lpD==0){
						$d = $loop_day;
					}
					$today_skip = false;
					$loop_date = new DateTime($loop_year.'-'.$loop_month.'-'.$d);
					$lp_date = $loop_year.'-'.$this->d($loop_month).'-'.$this->d($d);
					//echo '==> Date: '.$lp_date.'<br>';
					
					//stopping further calculations
					if($loop_date > $this->end_date){
						//echo '<br>loop broken on: '.$lp_date.'<br>';
						$calculate = false;
						break;
					}
					$lpD++; 
					if(array_key_exists($lp_date,$this->user_investments)){
						//echo '<br>Adding date '.$lp_date.' to $_A<br>';
						//new investment added this date
						//now calculate interest for one year
						$ui_obj = $this->user_investments[$lp_date];
						$ui_id = $ui_obj->id;
						$u_inv = $ui_obj->amount;
						
						//user interest
						$u_int = $this->calc_annual_interest($u_inv,$this->user_interest_rate);
						
						$u_int_day = $u_int/365;
						
						//bank interest
						$u_bank_int = $this->calc_annual_interest($u_inv,$this->bank_interest_rate);
						$b_int_day = $u_bank_int/365;
						
						$u_int_end = $this->plus_1_year($lp_date);
						$_A[$ui_id][$u_int_end] = [
							'id' => $ui_id,
							'initial_investment' => $u_inv,
							'investment' => $u_inv,
							'interest' => $u_int,
							'interest_day' => $u_int_day,
							'start_date' => $lp_date,
							'info' => [
								$loop_year.'-'.$loop_month => "New investment of &pound;".$u_inv." (ID: ".$ui_id.") added by ".$loop_date->format($this->ci->config->item('date_format'))
							],
							'end_date' => $u_int_end,
							'current_value' => $u_inv,
							'history' => [],
							
							//bank values
							'bank_interest' => $u_bank_int,
							'b_current_value' => $u_inv,
							'b_interest_day' => $b_int_day,
							'bhistory' => []
						];
						$today_skip = true;
					}
					
					//now further processing every day
					
					
					
					//calculation
					$this->debug($_A);
					foreach($_A as $k1 => $v1){
						foreach($v1 as $k=>$v){
							$f_A1 = new DateTime($v['end_date']);
							//if($f_A1 >= $loop_date && ((!isset($ui_id) || $v['id'] != $ui_id) && (!isset($new_ai_id) || $new_ai_id != $v['id']))){
							if($today_skip) continue;

							if($f_A1 >= $loop_date ){
								//user calc
								$_A[$k1][$k]['current_value'] += $v['interest_day'];
								//$_A[$k1][$k]['history'][$lp_date] = $_A[$k]['current_value'];

								//bank calc
								$_A[$k1][$k]['b_current_value'] += $v['b_interest_day'];
								//$_A[$k1][$k]['bhistory'][$lp_date] = $_A[$k]['b_current_value'];
							}
						}
					}
					
					
					//calculating interest for next year if prev. one year passed.
					foreach($_A as $k=>$v){
						if(array_key_exists($lp_date,$_A[$k])){
							//echo 'annual rate updated<br>';
							$c_value = $_A[$k][$lp_date]['current_value'];

							//new annual interest
							$new_ai = $this->calc_annual_interest($c_value,$this->user_interest_rate);
							$new_ai_id = $_A[$k][$lp_date]['id'];
							$new_int_day = $new_ai/365;

							//bank interest
							$c_bank_value = $_A[$k][$lp_date]['b_current_value'];
							$new_bank_ai = $this->calc_annual_interest($c_bank_value,$this->bank_interest_rate);
							$new_bank_int_day = $new_bank_ai/365;

							$new_int_end = $this->plus_1_year($lp_date);
							$_A[$new_ai_id][$new_int_end] = [
								'id' => $new_ai_id,
								'initial_investment' => $_A[$k][$lp_date]['initial_investment'],
								'investment' => $c_value,
								'interest' => $new_ai,
								'interest_day' => $new_int_day,
								'start_date' => $lp_date,
								'info' => [], //$_A[$k][$lp_date]['info'],
								'end_date' => $new_int_end,
								'current_value' => $c_value,
								'history' => [],

								//bank values
								'bank_initial_value' => $_A[$k][$lp_date]['b_current_value'],
								'bank_interest' => $new_bank_ai,
								'b_interest_day' => $new_bank_int_day,
								'b_current_value' => $c_bank_value,
								'bhistory' => []
								];
							//$today_skip = true;
						}
					}
					
					
					//echo '<br>'.$y.', '.$m.', '.$d.', '.$lp_date;
					$loop_day++;
					if($loop_day >= $month_tDays){
						$loop_day = 1;
					}
					
					//breaking loop
					/*if($loop_date >= $this->end_date){
						break;
					}*/
					
					unset($ui_obj);
					unset($ui_id);
					unset($u_inv);
					unset($u_int);
					unset($u_int_day);
					unset($u_int_end);
					unset($new_ai_id);
					
				}
				
				//if($calculate){
					
				//preparing final result
				$sums = $this->sum($_A,$loop_year,$loop_month);
				
				//$this->debug($sums);
				$fr_gd = [
					'label' => $loop_month_name,
					'label-1' => $loop_month_name.' '.$loop_year,
					'label-2' => $loop_month_name.' '.substr($loop_year,-2),
					'amount' => $sums['total'],
					'year' => $loop_year,
					'month' => $loop_month_name,
					'info' => $sums['info'],
					'interest' => $sums['interest'],
					'bank_amount' => $sums['bank_total'],
					'bank_interest' => $sums['bank_interest'],
					'initial_investment' => $sums['initial_investment'],
					//'calc_days' => $lm_calc_days,
				];
				$_B[] = $fr_gd;
				
				//}
				
				$loop_month++;
				if($loop_month > 12){
					$loop_month = 1;
				}
				//stopping month loop
				if(!$calculate){
					break;
				}
			}
			
			$loop_year++;
			if(!$calculate){
				break;
			}
		}
		//echo '<br>Days: '.$lpD.'<br>';
		//echo '<br>Loop Date: '.$lp_date;
		//$this->debug($_A);
		//$this->debug($_B);
		return $_B;
	}
	
	function sum($a,$year,$month){
		//echo '<br>Month Sum: '.$year.'-'.$month.'<br>';
		$sums = [];
		$initial_investments = [];
		$interests = [];
		$bank_interests = [];
		$bank_total = [];
		$info = '';
		//$this->debug($a);
		foreach($a as $k1=>$v1){
			//user calc
			if(is_array($v1)){
				foreach($v1 as $k=>$v){
					if(!array_key_exists($k1,$sums)){
						$initial_investments[$k1] = $v['initial_investment'];

						$sums[$k1] = $v['current_value'];

						$interests[$k1] = ($v['current_value']-$v['initial_investment']);//$v['interest'];

						$bank_total[$k1] = $v['b_current_value'];

						$bank_interests[$k1] = ($v['b_current_value']-$v['initial_investment']);//$v['bank_interest'];
					}else{
						$initial_investments[$k1] = $v['initial_investment'];
						//$sums[$v['id']] += $v['interest'];
						$sums[$k1] = $v['current_value'];

						$interests[$k1] += ($v['current_value']-$v['investment']);//$v['interest'];

						$bank_total[$k1] = $v['b_current_value'];

						$bank_interests[$k1] += ($v['b_current_value']-$v['bank_initial_value']);//$v['bank_interest'];
					}
				}
			}
			
			
			
			
			/*
			//user interest
			if(!array_key_exists($v['id'],$interests)){
				
			}else{
				//$interests[$v['id']] += $v['interest'];
				
			}
			
			//bank calc
			if(!array_key_exists($v['id'],$bank_interests)){
				
			}else{
				//$bank_interests[$v['id']] += $v['bank_interest'];
				
			}
			
			//bank interest
			if(!array_key_exists($v['id'],$interests)){
				
			}else{
				//$interests[$v['id']] += $v['interest'];
				
			}*/
			
			//info processing
			$info_key = $year.'-'.$month;
			if(is_array($v['info']) && array_key_exists($info_key,$v['info'])){
				$info .= (!empty($info))?', ':'';
				$info .= $v['info'][$info_key];
			}
			
		}
		return ['total' => array_sum($sums),'initial_investment' => array_sum($initial_investments),'interest' => array_sum($interests),'bank_total' => array_sum($bank_total), 'bank_interest' => array_sum($bank_interests),'info' => $info];
	}
	
	function get_user_investments(){
		$query = $this->ci->db->query("SELECT id,amount,txn_date FROM user_investments WHERE txn_date <= '".$this->end_date->format('Y-m-d')."' AND user_id = '$this->user_id' AND status = '1' ORDER BY txn_date ASC")->result();
		foreach($query as $k=>$v){
			if($k==0){
				$this->date_preprocess($v->txn_date);
			}
			$this->user_investments[$v->txn_date] = $v;
		}
		//print_r($this->user_investments);
	}
	
	function date_preprocess($inv_date){
		$this->start_date = new DateTime($inv_date);
		
		$inv_diff = $this->start_date->diff($this->end_date);
		$this->duration = $inv_diff->format('%y year(s), %m month(s) and %d day(s)');
		$this->yLoop = ($inv_diff->format('%y')+2);
		//echo $this->yLoop.'<br>';
	}
	
	function get_user_interest_rate(){
		$this->user_interest_rate = $this->ci->db->select('interest_rate')->get_where('customer',['id' => $this->user_id])->row()->interest_rate;
	}
	
	function get_last_12_months(){
		return ['end' => date('Y-m-d'), 'start' => date('Y-m-d',strtotime(' -1 year'))];
	}
	
	function adjust_future_end_date($year){
		if(date('Y') == $year){
			$d1 = new DateTime();
			if($this->end_date > $d1){
				$this->end_date = new DateTime();
			}
		}
	}
	
	function calc_annual_interest($investment,$interest_rate){
		return round(($investment/100*$interest_rate),0);
	}
	
	
	function calc_interest($investment,$interest_rate){
		//return round(($investment*$interest_rate*$days)/365,2);
		//return round(($investment/365/100*$interest_rate)*$days);
		return round((($investment/100*$interest_rate)/365)*$days,2);
	}
	
	function plus_1_year($date){
		return date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " + 1 year"));
	}
	
	function debug($a){
		if($this->_debug==true){
			echo '<pre>'; print_r($a); echo '</pre>';
		}
	}
	
	function calculate_growth($original_value,$new_value){
		$r['profit'] = $new_value - $original_value;
		$r['growth'] = round(($r['profit']/$original_value)*100,2);
		return $r;
	}
	
	function get_total_invested($user_id){
		$ci =& get_instance();
		return $ci->db->query("SELECT txn_date,sum(amount) as total_invested FROM user_investments WHERE user_id = '".$user_id."' AND status = '1' ORDER BY txn_date ASC")->row();
	}
	
	function format_graph($graph_data,$year=false,$show_year=false,$last_1_year=false){
		//in user dashboard showing last 1 year stats
		if($last_1_year){
			$year = date('Y')-1;
		}
		
		$str = "[";

		$count_t = count($graph_data);
		foreach($graph_data as $gd){
			//Month based condition
			/*$dl = new DateTime($gd['label-1']);
			if($this->start_date >= $dl && $this->end_date <= $dl){*/
			
			//year based condition
			if(($year == false) or ($year == $gd['year'])){
				$cDate = new DateTime($gd['label']); //current date time
				if($str != '['){
					$str .= ",";
				}
				$label = ($show_year==true)?$gd['label-2']:$gd['label'];
				$str .= "['".$label."',".$gd['amount']."]";
			}
			//}
		}

		$str .= "]";
		return $str;
	}
	
	function d($d){
		return str_pad($d, 2, '0', STR_PAD_LEFT);
	}
}