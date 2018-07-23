<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		
		
		if($this->session->userdata('logged_in')){
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='1'){
				redirect('dashboard');
			}else{
				redirect('subject');	
			}
			
		}
		
		
		
		$data['title']=$this->lang->line('home');
		$data['recent_quiz']=$this->quiz_model->recent_quiz('5');
		$data['recent_subject']=$this->subjects_model->recent_subject('5');

		$data['num_users']=$this->user_model->num_users();
		$data['num_qbank']=$this->qbank_model->num_qbank();
		$data['num_quiz']=$this->quiz_model->num_quiz();
		$data['num_subjects']=$this->subjects_model->num_subjects();
		
		$this->load->view('header',$data);
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
	}
	

	
	
}
