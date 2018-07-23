<?php
Class Subjects_model extends CI_Model {

		
		function recent_subject($limit){
	  
	 
		$this->db->limit($limit);
		$this->db->order_by('cid','desc');
		$query=$this->db->get('portal_category');
		return $query->result_array();
	}

	function num_subjects(){
	 
	 $query=$this->db->get('portal_category');
		return $query->num_rows();
 }


	  function get_subjects(){

	  	$this->db->order_by('category_name','asc');
		$query=$this->db->get('portal_category');
		return $query->result_array(); 
		 
	 }

	 function subject_details(){
	 	 $logged_in=$this->session->userdata('logged_in');

	 	$this->db->order_by('category_name','asc');
	 	$query=$this->db->query('Select portal_category.cid,portal_category.category_name,count(portal_qcl.cid) from portal_qcl join portal_category on portal_category.cid=portal_qcl.cid join portal_quiz on portal_qcl.quid=portal_quiz.quid group by portal_category.category_name');
	 	return $query->result_array();
	 }
 
 	function get_quizzes($cid){
 		$this->db->where('portal_qcl.cid', $cid);
	 	$this->db->select('portal_qcl.*,portal_category.category_name,portal_quiz.*');
	    $this->db->from('portal_qcl'); 
	    $this->db->join('portal_category', 'portal_category.cid = portal_qcl.cid');
	    $this->db->join('portal_quiz', 'portal_quiz.quid = portal_qcl.quid');
	    $query=$this->db->get();
	    return $query->result_array(); 
 	} 


}
?>