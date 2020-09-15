         <?php 

class Admin_model extends CI_model{

  function countAllformaster($id,$to,$from){

$this->db->select('count(*)');
 $this->db->where('city_id',$id);
   $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
   $query= $this->db->get('deals');
    $cnt = $query->row_array();
       return $cnt['count(*)'];
}


 function masterFetch($from,$to){

    $this->db->select('cityname, city_id');
    $this->db->from('deals');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
    $this->db->distinct();

   return  $this->db->get()->result() ;
}


function countEmail($id){

$this->db->select('*');
$this->db->from('email_subscription');
$this->db->where('community_id',$id);

   return $this->db->count_all_results();
}


function countDeal1($id){

$this->db->select('*');
$this->db->from('deals');
$this->db->where('business_id',$id);

   return $this->db->count_all_results();
}

  
   function fetchEmails2($from,$to){

    $this->db->select('community_name , community_id , status');
    $this->db->from('email_subscription');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
  
    $this->db->distinct();

return  $this->db->get()->result() ;
}



  
   function fetchEmails($from,$to,$id){
 $this->db->select('community_name , community_id , status');
    $this->db->from('email_subscription');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
      $this->db->where('community_id',$id);

    $this->db->distinct();

return  $this->db->get()->result() ;
}


function emailNum5($from,$to){

$this->db->select('*');

$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');

return $this->db->count_all('email_subscription');;
}


function countActiveEmail($id){
 
 $this->db->select('count(*)');

  $this->db->where('community_id',$id);
  /*$this->db->where('dateposted >= date("'.$from.'")');
  $this->db->where('dateposted <= date("'.$to.'")');*/
   $status='subscribe';
   $this->db->where('email_status',$status);

    $query= $this->db->get('email_subscription');
    $cnt = $query->row_array();
       return $cnt['count(*)'];
}


function emailNum($from,$to,$id){
 
 $this->db->select('count(*)');

  $this->db->where('community_id',$id);
  /*$this->db->where('dateposted >= date("'.$from.'")');
  $this->db->where('dateposted <= date("'.$to.'")');*/
   $status='subscribe';
   $this->db->where('email_status',$status);

    $query= $this->db->get('email_subscription');
    $cnt = $query->row_array();
       return $cnt['count(*)'];
}


function get_all_routes(){

  return $this->db->get_where('communities',array('status',1))->result_array();
}

function getallbusiness(){
$this->db->order_by('status', 'ASC');
  return $this->db->get("business")->result() ;
      

}
 function email_subscribe($formArray)
      {
       $this->db->insert("email_subscription",$formArray);
      }


function fetchDeals3($from,$to,$id){

    $this->db->select('detail1, count');
    $this->db->from('deals');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
    $this->db->where('business_id',$id);
    $this->db->distinct();

   return  $this->db->get()->result() ;
}




  function fetchDeals($from,$to){

    $this->db->select('cityname,city_id');
    $this->db->from('deals');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
    $this->db->distinct();

   return  $this->db->get()->result() ;
}

  function fetchDeals2($from,$to,$id){

    $this->db->select('business_name, business_id');
    $this->db->from('deals');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
    $this->db->where('city_id',$id);
    $this->db->distinct();

   return  $this->db->get()->result() ;
}






function fetchBusiness($from,$to,$id){

    $this->db->select('business_name,business_id');
    $this->db->from('deals');
    $this->db->where('dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
    $this->db->where('city_id',$id);

    $this->db->distinct();

   return  $this->db->get()->result() ;
}


function dealNum9($from,$to){

$this->db->select('*');
$this->db->from('deals');
$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');
return $this->db->count_all_results();
}


function dealNum($from,$to,$id){

$this->db->select('*');
$this->db->from('deals');
$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');
$this->db->where('city_id',$id);

return $this->db->count_all_results();
}

function dealNum8($from,$to){


$this->db->select_sum('count');
$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');
$result = $this->db->get('deals')->row(); 

return $result->count;
}

function dealNum2($from,$to,$id){

 
$this->db->select_sum('count');
$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');
$this->db->where('city_id',$id);
$this->db->distinct();

$result = $this->db->get('deals')->row(); 

return $result->count;
}

function dealNum5($from,$to,$id){

$this->db->select_sum('count');
$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');
$this->db->where('business_id',$id);
$result = $this->db->get('deals')->row(); 

return $result->count;
}






  function fetchcomunity($from,$to){

    $this->db->select('*');
    $this->db->from('communities');
    $this->db->where(' dateposted >= date("'.$from.'")');
    $this->db->where('dateposted <= date("'.$to.'")');
return  $this->db->get()->result() ;
}

function comunityNum($from,$to){

$this->db->select('*');
$this->db->from('communities');
$this->db->where('dateposted >= date("'.$from.'")');
$this->db->where('dateposted <= date("'.$to.'")');
return $this->db->count_all_results();
}
  
function businessNum($from,$to){

$this->db->select('*');
$this->db->from('business');
$this->db->where('activated >= date("'.$from.'")');
$this->db->where('activated <= date("'.$to.'")');
return $this->db->count_all_results();
}




  function insertAdmin($dataArray)
      {
       $this->db->insert("admin",$dataArray);
      }

  // total Active communities Counter
  function count_active_com()
      {
      $this->db->where('status',1);
      return $this->db->count_all('communities');
      }  

  // total Active Business Counter
  function count_active_bus()
      {
      $this->db->where('status',1);
      return $this->db->count_all('business');
      } 

       function count_active_deal()
      {
      $this->db->where('status',1);
      return $this->db->count_all('deals');
      } 

  // total InActive communities Counter
  function count_inactive_com()
      {
      $this->db->where('status',0);
      return $this->db->count_all('communities');
      }  

  // total InActive Business Counter
  function count_inactive_bus()
      {
      $this->db->where('status',0);
      return $this->db->count_all('business');
      }  

// delete community
   function delete_comunity($id)
      { 
      $this->db->where('id',$id);
      $this->db->delete('communities');
      }

  function insertcommunity($formArray)
      {
      $this->db->insert("communities",$formArray);
      }


  function getallcomunities()
      {
         $this->db->order_by('status', 'asc');
      $communities= $this->db->get("communities") ;
      return $communities;
      }
        function getreview()
      {
      $contactus= $this->db->get("contactus") ;
      return $contactus;
      }
  function getalldeal()
      {
      $deal= $this->db->get("deals") ;
      return $deal;
      }

  function statusdeal()
      {
      $this->db->select('dateposted');
         $this->db->from('deals');
/*      $this->db->where('status',1);
*/ 
     return   $this->db->get()->result();
      }

  function get_comunities()
      {
      $communities= $this->db->get("communities") ;
      return $communities;
      }
  function sponsor_img()
      {
      $sponsor_img= $this->db->get("sponsor_img") ;  
      return $sponsor_img; 
      }

  function getActiveEmails() 
      {
      $this->db->select('email');
      $this->db->from('communities');
      $this->db->where('status',1);
      // $this->db->order_by('id', 'desc');
      return   $this->db->get()->result();
      }

  function getActiveBusiness() 
      {
      $this->db->select('email');
      $this->db->from('business');
      $this->db->where('status',1);
      // $this->db->order_by('id', 'desc');
      return   $this->db->get()->result();
      }

  function updateStatus($dataArray,$id)
      {
      $this->db->where('id', $id);
      $this->db->update('communities',$dataArray);
      return true;
      }

  function community_status($dataArray,$id)
      {
      $this->db->where('id', $id);
      $this->db->update('business',$dataArray);
      return true;
      }

  function  getComunity($id)
      {
      $query =$this->db->get_where('communities',array('id' =>$id)); 
      if ($query->num_rows()>0) {
      return $query->row();
      }
      }

  function updateBusiness($dataArray,$id)
      {
      $this->db->where('id', $id);
      $this->db->update('business',$dataArray);
      return true;
      }

  function insertDeal($dataArray)
      {
      $this->db->insert("deals",$dataArray);
      }

  function sponsorimg1($dataArray)
      {
      $this->db->insert("sponsor_img",$dataArray);
      }

  function sponsorimg2($dataArray)
      {
      $this->db->insert("sponsor_img",$dataArray);
      }

  function getBusiness($city)
      {
      $query= $this->db->get("business") ;
      return $query;
      }
       function getBusiness1()
      {
      $query= $this->db->get("business") ;
      return $query;
      }

function bus_signup($dataArray)
      {
         $this->db->insert("business",$dataArray);
      }


 function updateBusinessStatus($formArray,$id)
      {
      $this->db->where('id', $id);
      $this->db->update('business',$formArray);
      return true;
      }

 function activeBEmails() 
      {
      $this->db->select('email');
      $this->db->from('business');
      $this->db->where('status',1);
      // $this->db->order_by('id', 'desc');
      return   $this->db->get()->result();
      }

  function inactiveBEmails() 
      {
      $this->db->select('email');
      $this->db->from('business');
      $this->db->where('status',2);
      // $this->db->order_by('id', 'desc');
      return   $this->db->get()->result();
      }

  function allBEmails() 
      {
      $this->db->select('email');
      $this->db->from('business');
      // $this->db->order_by('id', 'desc');
      return   $this->db->get()->result();
      }

  function  getdeal($id)
      {
      $query =$this->db->get_where('deals',array('id' =>$id)); 
      if ($query->num_rows()>0) {
      return $query->row();
      }
      }

       function  get_deals($deal_id)
      {
              $this->db->order_by('status', 'asc');

     return $this->db->get_where('deals',array('business_id' =>$deal_id))->result(); 
       
      }


  function updateDeal($dataArray,$id)
      {
      //$this->db->where('id', $id);
      $this->db->insert('deals',$dataArray);
      return true;
      }

  function cancel_deal($id)
      {
      $this->db->where('id',$id);
      $this->db->delete('deals');
      }

  public function get_city_info()
      {
      $state=$this->input->post("state");
      $query="select distinct city_name from ektree_states where state_name ='$state' ";
      $city_info=$this->db->query($query);
      return $city_info;
      }
  public function get_state_info()
      {
      $query="select distinct state_name from ektree_states";
      $states_info=$this->db->query($query);
      return $states_info;
      }

  public function multiple_images($image = array())
      {
      return $this->db->insert('sponsor_img',$image);
      }
 
  public function get_user($id)
      {
      $this->db->where('id', $id);
      $query = $this->db->get('admin');
      return $query->row();
      }

  public function update_user($id, $admin)
      {
      $this->db->where('id', $id);
      $this->db->update('admin', $admin);
      }



public function getB($comunity_id)
{
 
      $this->db->order_by('status', 'asc');
      $this->db->where('comunity_id', $comunity_id);

     return  $this->db->get("business")->result();
    
}
}
?>