<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller { 

	function __construct(){

		parent::__construct();
		$this->load->helper('common');
	//	$this->load->helper('mailer');		
        $this->load->library("email");	
		//$this->load->library('encrypt');
		
	}
 
	public function com_home()
	{
		$this->load->helper('common');

		$this->load->view('Community_Admin_Portal_pages/community_sidebar');
		$this->load->view('Community_Admin_Portal_pages/community_admin_home');
	}

	public function com_metrics()
	{

		$this->load->view('Community_Admin_Portal_pages/community_sidebar');
		$this->load->view('Community_Admin_Portal_pages/community_admin_metrics');
	}

	public function com_business_signup()
	{

		$this->load->view('Community_Admin_Portal_pages/community_sidebar');
		$this->load->view('Community_Admin_Portal_pages/community_business_signup_preference');
	}

	public function com_prefrences()
	{

		$this->load->view('Community_Admin_Portal_pages/community_sidebar');
		$this->load->view('Community_Admin_Portal_pages/community_smallbizblast_preference');
	}

public function com_view_business()
	{
		$this->load->view('Community_Admin_Portal_pages/community_sidebar');
		$this->load->view('Community_Admin_Portal_pages/community_view_businesses');
	}

	public function com_infoblast()
	{
		$this->load->view('Community_Admin_Portal_pages/info_blast_to_businesses');
	}



	
			
}