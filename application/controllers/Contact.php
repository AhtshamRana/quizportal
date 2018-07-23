<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {



	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form','url', 'email'));
        $this->load->library(array('session', 'form_validation', 'email'));

	}


	public function index() {

		$data['title']='Contact';

		$this->load->view('header',$data);
		$this->load->view('contact',$data);
		$this->load->view('footer',$data);

	}

	public function message() {

		$config = array(
			'protocol' => 'smtp',
		    'smtp_host' => 'mail.thequizportal.com',
		    'smtp_port' => '26',
		    'smtp_user' => 'contact@thequizportal.com', 
		    'smtp_pass' => '!@#$%^&*()', 
		    'mailtype' => 'text'
		);
		$this->load->library('email', $config);

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$myemail = "contact@thequizportal.com";

		$this->email->from($myemail, $name);
		$this->email->to('contact@thequizportal.com',$email);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($this->email->send()){
			$this->session->set_flashdata('sent', '<strong>Thank You !</strong> Your message has been delivered.');
			redirect('contact');
		}
		else{
			$this->session->set_flashdata('fail', '<strong>Sorry !</strong> Your message could not be sent, please try later.');
			redirect('contact');
		}

	}

}