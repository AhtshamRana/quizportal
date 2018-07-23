<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("subjects_model");
	   $this->load->model("user_model");
	   $this->load->model("quiz_model");
	    $this->load->model("qbank_model");
	   $this->lang->load('basic', $this->config->item('language'));
		if($this->db->database ==''){
		redirect('install');	
		}
		 
		 
		 
		
		
	 }

	public function index()
	{
		
		
		
		$data['title']='About';
		
		
		$this->load->view('header',$data);
		$this->load->view('about',$data);
		$this->load->view('footer',$data);
	}
	

	
	
}
