<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("quiz_model");
	   $this->load->model("user_model");
	   $this->load->model("subjects_model");
	   $this->lang->load('basic', $this->config->item('language'));

	 }

	public function index()
	{
		
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('home');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('home');
		}
		
		
		
		$logged_in=$this->session->userdata('logged_in');
			 
		$data['title']='Subjects';
		// fetching subject
		$data['subj_details']=$this->subjects_model->subject_details();
		$this->load->view('header',$data);
		$this->load->view('subject_list',$data);
		$this->load->view('footer',$data);
	}

		public function quizzes($cid){
				// redirect if not loggedin
				if(!$this->session->userdata('logged_in')){
				redirect('home');
			
				}
				$logged_in=$this->session->userdata('logged_in');
				if($logged_in['base_url'] != base_url()){
				$this->session->unset_userdata('logged_in');		
				redirect('home');
				}

		
		$logged_in=$this->session->userdata('logged_in');
		$gid=$logged_in['gid'];
		$data['title']="Quizzes";
		
		$data['quizzes']=$this->subjects_model->get_quizzes($cid);
		
		$this->load->view('header',$data);
		$this->load->view('subject_quizzes',$data);
		$this->load->view('footer',$data);
		
	}

	


}
