<?php
$this->load->view('nav');
?>

 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" id="quiz_detail" action="<?php echo site_url('quiz/validate_quiz/'.$quiz['quid']);?>">
	
<div class="col-md-12" style="margin-bottom: 40px;">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
<table class="table table-bordered">
<tr><td><?php echo $this->lang->line('quiz_name');?></td><td><?php echo $quiz['quiz_name'];?></td></tr>
<tr><td colspan='2'><?php echo $this->lang->line('description');?><br><?php echo $quiz['description'];?></td></tr>
<tr><td><?php echo $this->lang->line('duration');?></td><td><?php echo $quiz['duration'];?></td></tr>
<tr><td><?php echo $this->lang->line('maximum_attempts');?></td><td><?php echo $quiz['maximum_attempts'];?></td></tr>
<tr><td><?php echo $this->lang->line('pass_percentage');?></td><td><?php echo $quiz['pass_percentage'];?></td></tr>
<tr><td><?php echo $this->lang->line('correct_score');?></td><td><?php echo $quiz['correct_score'];?></td></tr>
<tr><td><?php echo $this->lang->line('incorrect_score');?></td><td><?php echo $quiz['incorrect_score'];?></td></tr>

</table>
  

<?php 
if($this->session->userdata('logged_in')){
?>	
	<button class="btn btn-success" type="submit"><?php echo $this->lang->line('start_quiz');?></button>
 
 <?php 
}else{
	if($quiz['with_login']==0){ 
	?>
	
	<button class="btn btn-success" type="submit"><?php echo $this->lang->line('start_quiz');?></button>
 &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('quiz/open_quiz/0');?>" ><?php echo $this->lang->line('back');?></a>

	
	<?php 
	}else{
?>
<div class="alert alert-danger"><?php echo str_replace('{base_url}',base_url(),$this->lang->line('login_required'));?></div>
&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('quiz/open_quiz/0');?>" ><?php echo $this->lang->line('back');?></a>
<?php
	} 
}
?>
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>


<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('to_which_position');?></b><br><input type="text" style="width:30px" id="qposition" value=""><br><br>
<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;">Cancel</a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:movequestion();"   class="btn btn-info"  style="cursor:pointer;">Move</a>

</center>
</div>