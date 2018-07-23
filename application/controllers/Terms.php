<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {


	public function index()
	{
		
		
		
		$data['title']='Terms of Use';
		
		
		$this->load->view('header',$data);
		$this->load->view('terms',$data);
		$this->load->view('footer',$data);
	}
	

	
	
}
