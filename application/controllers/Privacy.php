<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {


	public function index()
	{
		
		
		
		$data['title']='Privacy Policy';
		
		
		$this->load->view('header',$data);
		$this->load->view('privacy',$data);
		$this->load->view('footer',$data);
	}
	

	
	
}
