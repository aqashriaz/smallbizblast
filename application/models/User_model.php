 <?php 

class User_model extends CI_model{


function getT($comunity_id) 
      {

      	$this->db->select_sum('dealTotal');

        $this->db->where('city_id',$comunity_id);

        $result = $this->db->get('deals')->row(); 

       return $result->dealTotal;
      }


      function get_email_details($community_id,$from,$to) 
      {

		$this->db->select('count(*)'); 
		$this->db->where('community_id',$community_id);
		$this->db->where('dateposted >= date("'.$from.'")');
        $this->db->where('dateposted <= date("'.$to.'")');
        $this->db->distinct();

		$query = $this->db->get('email_subscription');
		$cnt = $query->row_array();
return $cnt['count(*)'];
      }



      function get_deal_details($city_id,$from,$to) 
      {

		$this->db->select('count(*)');
		 
		$this->db->where('city_id',$city_id);
		$this->db->where('dateposted >= date("'.$from.'")');
        $this->db->where('dateposted <= date("'.$to.'")');
        $this->db->distinct();

		$query = $this->db->get('deals');
		$cnt = $query->row_array();
       return $cnt['count(*)'];
      }


       function get_deal_details2($city_id,$from,$to) 
      {

		$this->db->select_sum('count');
		 
		$this->db->where('city_id',$city_id);
		$this->db->where('dateposted >= date("'.$from.'")');
        $this->db->where('dateposted <= date("'.$to.'")');
        $this->db->distinct();

		$result = $this->db->get('deals')->row(); 

         return $result->count;
      }

       function get_deal_details3($business_id,$from,$to) 
      {

		$this->db->select('count(*)');
		 
		$this->db->where('business_id',$business_id);
		$this->db->where('dateposted >= date("'.$from.'")');
        $this->db->where('dateposted <= date("'.$to.'")');
        $this->db->distinct();

		$query = $this->db->get('deals');
		$cnt = $query->row_array();
       return $cnt['count(*)'];
      }


       

       function get4($business_id,$from,$to) 
      {
			 
		$this->db->select_sum('count');
		$this->db->where('business_id',$business_id);

		$this->db->where('dateposted >= date("'.$from.'")');
		$this->db->where('dateposted <= date("'.$to.'")');
		$result = $this->db->get('deals')->row(); 

		return $result->count;
      }



      ///////////////////////////////////////////////////////



function countAll($id) 
      {

		$this->db->select('count(*)');
		 
		$this->db->where('city_id',$id);
		 
        $this->db->distinct();

		$query = $this->db->get('deals');
		$cnt = $query->row_array();
       return $cnt['count(*)'];
      }


      function getBusiness($id) 
      {

		$this->db->select('count(*)');
		 
		$this->db->where('comunity_id',$id);
		 
        $this->db->distinct();

		$query = $this->db->get('business');
		$cnt = $query->row_array();
       return $cnt['count(*)'];
      }

       function getInfo($id) 
      {

		$this->db->select('*');
		 
		$this->db->where('comunity_id',$id);
		 
        $this->db->distinct();

		return $this->db->get('business')->result();
		 
      }


       function get_deal_details55($id) 
      {

		$this->db->select_sum('count');
		 
		$this->db->where('business_id',$id);
		 
        $this->db->distinct();

		$result = $this->db->get('deals')->row(); 

         return $result->count;
      }

//////////////////////////////////////////////////////////////////////


      function fetchB($id){
      	$this->db->select('*');
		 
		$this->db->where('comunity_id',$id);
		 
        $this->db->distinct();

		return $this->db->get('business')->result();
		 
      }
 function dealNum($to,$from){



$this->db->select('*');

$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');

return $this->db->count_all('email_subscription');;
}


 function getdealInfo($id,$from,$to) 
      {

	$this->db->select('count(*)');
		 
		$this->db->where('business_id',$id);
		 $this->db->where('dateposted >= date("'.$from.'")');
       $this->db->where('dateposted <= date("'.$to.'")');

        $this->db->distinct();

		$query= $this->db->get('deals');
		$cnt = $query->row_array();
       return $cnt['count(*)'];
		 
      }
      
       function activeDeals($id) 
      {
      $this->db->select('*');
      $this->db->from('deals');
      $this->db->where('city_id',$id);     
      $this->db->where('status',1);
       return   $this->db->get()->result();
      }
 




}




?>