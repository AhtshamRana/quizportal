<?php
Class User_model extends CI_Model
{
 function login($username, $password)
 {
   
   if($password!=$this->config->item('master_password')){
   $this -> db -> where('portal_users.password', MD5($password));
   }
    $this -> db -> where('portal_users.email', $username);
    $this -> db -> where('portal_users.verify_code', '0');
    $this -> db -> join('portal_group', 'portal_users.gid=portal_group.gid');
  $this->db->limit(1);
    $query = $this -> db -> get('portal_users');

			 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();
   }
   else
   {
     return false;
   }
 }
 
 
  function admin_login()
 {
   
    $this -> db -> where('uid', '1');
    $query = $this -> db -> get('portal_users');

			 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();
   }
   else
   {
     return false;
   }
 }

 function num_users(){
	 
	 $query=$this->db->get('portal_users');
		return $query->num_rows();
 }
 
 
 
 function user_list($limit){
	 if($this->input->post('search')){
		 $search=$this->input->post('search');
		 $this->db->or_where('portal_users.email',$search);
		 $this->db->or_where('portal_users.first_name',$search);
		 $this->db->or_where('portal_users.last_name',$search);;

	 }
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('portal_users.uid','desc');
		 $this -> db -> join('portal_group', 'portal_users.gid=portal_group.gid');
		 $query=$this->db->get('portal_users');
		return $query->result_array();
		
	 
 }
 
 
 function group_list(){
	 $this->db->order_by('gid','desc');
	$query=$this->db->get('portal_group');
		return $query->result_array();
		 
	 
 }
 
 function verify_code($vcode){
	 $this->db->where('verify_code',$vcode);
	$query=$this->db->get('portal_users');
		if($query->num_rows()=='1'){
			$user=$query->row_array();
			$uid=$user['uid'];
			$userdata=array(
			'verify_code'=>'0'
			);
			$this->db->where('uid',$uid);
			$this->db->update('portal_users',$userdata);
			return true;
		}else{
			
			return false;
		}
		 
	 
 }
 
 
 function insert_user(){
	 
		$userdata=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'gid'=>$this->input->post('gid'),
		'su'=>$this->input->post('su')		
		);
		
		if($this->db->insert('portal_users',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
  function insert_user_2(){
	 
		$userdata=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'gid'=>$this->input->post('gid'),
		'su'=>'0'		
		);
		$veri_code=rand('1111','9999');
		 if($this->config->item('verify_email')){
			$userdata['verify_code']=$veri_code;
		 }
		 		if($this->session->userdata('logged_in_raw')){
					$userraw=$this->session->userdata('logged_in_raw');
					$userraw_uid=$userraw['uid'];
					$this->db->where('uid',$userraw_uid);
				$rresult=$this->db->update('portal_users',$userdata);
				if($this->session->userdata('logged_in_raw')){
				$this->session->unset_userdata('logged_in_raw');	
				}		
				}else{
				$rresult=$this->db->insert('portal_users',$userdata);
				}
		if($rresult){
			 if($this->config->item('verify_email')){
				 // send verification link in email
				 
$verilink=site_url('login/verify/'.$veri_code);
 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('activation_subject');
			$message=$this->config->item('activation_message');;
			
			$message=str_replace('[verilink]',$verilink,$message);
		
			$toemail=$this->input->post('email');
			 
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 print_r($this->email->print_debugger());
			exit;
			}
			 
				 
			 }
			 
			return true;
		}else{
			
			return false;
		}
	 
 }
 

 
 
 
 
 
 function reset_password($toemail){
$this->db->where("email",$toemail);
$queryr=$this->db->get('portal_users');
if($queryr->num_rows() != "1"){
return false;
}
$new_password=rand('1111','9999');

 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('password_subject');
			$message=$this->config->item('password_message');;
			
			$message=str_replace('[new_password]',$new_password,$message);
		
		
			
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 //print_r($this->email->print_debugger());
			
			}else{
			$user_detail=array(
			'password'=>md5($new_password)
			);
			$this->db->where('email', $toemail);
 			$this->db->update('portal_users',$user_detail);
			return true;
			}

}



 function update_user($uid){
	 $logged_in=$this->session->userdata('logged_in');
						 
			
		$userdata=array(
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name')	
		);
		if($logged_in['su']=='1'){
			$userdata['email']=$this->input->post('email');
			$userdata['gid']=$this->input->post('gid');
			$userdata['su']=$this->input->post('su');
			}
			
		if($this->input->post('password')!=""){
			$userdata['password']=md5($this->input->post('password'));
		}
		 $this->db->where('uid',$uid);
		if($this->db->update('portal_users',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
 function update_group($gid){
	 
		$userdata=array();
		if($this->input->post('group_name')){
		$userdata['group_name']=$this->input->post('group_name');
		}
		 $this->db->where('gid',$gid);
		if($this->db->update('portal_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
 
 function remove_user($uid){
	 
	 $this->db->where('uid',$uid);
	 if($this->db->delete('portal_users')){
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
 
 function remove_group($gid){
	 
	 $this->db->where('gid',$gid);
	 if($this->db->delete('portal_group')){
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
 
 
 function get_user($uid){
	 
	$this->db->where('portal_users.uid',$uid);
	   $this -> db -> join('portal_group', 'portal_users.gid=portal_group.gid');
$query=$this->db->get('portal_users');
	 return $query->row_array();
	 
 }
 
 
 
 function insert_group(){
	 
	 	$userdata=array(
		'group_name'=>$this->input->post('group_name'),
		
		);
		
		if($this->db->insert('portal_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
 
 
 
 

}












?>