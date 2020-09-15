      <?php 

class Front_model extends CI_model{

function getActiveDeals($id){

        $this->db->select('*');
        $this->db->from('deals');
        $this->db->where('city_id',$id);
        $this->db->where('status',1); 
       //$this->db->order_by('status', 'asc');
      return   $this->db->get()->result();

}
 
 


function insertsignup($dataArray)
  {
     $this->db->insert("business",$dataArray);
  }

function insertComSignup($dataArray)
  {
     $this->db->insert("communities",$dataArray);
  }


   function getBusiness($id) 
     {
        $this->db->select('*');
        $this->db->from('business');
        $this->db->where('comunity_id',$id);
        $this->db->where('status',1); 
       //$this->db->order_by('status', 'asc');
      return   $this->db->get()->result();
     }
     function getDeals($business_id) 
     {
        $this->db->select('*');
        $this->db->from('deals');
        $this->db->where('status',1); 
        $this->db->where('business_id',$business_id);
         return   $this->db->get()->result();
     }
     
     function insertcontactus($formArray)
      {
      $this->db->insert("contact_us",$formArray);
      }


}
?>