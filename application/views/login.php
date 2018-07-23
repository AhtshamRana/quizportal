<?php
$this->load->view('nav');
?>

<div class="row" style="margin-top:20px;">
<div class="container" >

<div class="col-md-8">
<?php 
if($this->config->item('open_quiz')){
	?>
<h3><?php echo $this->lang->line('recent_quizzes');?></h3>
 
<?php 
foreach($recent_quiz as $key => $val){
?>
<div style="margin-top:30px;">
<label><a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid'].'/'.urlencode($val['quiz_name'])); ?>"><?php echo $val['quiz_name'];?></a></label>
<p>
<span style="font-size:12px;color:#999;">
<?php echo substr(strip_tags($val['description']),0,100);?>
</span>
<br>
<?php echo $this->lang->line('questions');?>: <?php echo $val['noq'];?> | 
<?php echo $this->lang->line('duration2');?> <?php echo $val['duration'];?> Min. 
</p>
</div>
<p>
<?php 
}
if(count($recent_quiz)==0){
	echo $this->lang->line('no_record_found');
}
?>
</p>
<a href="<?php echo site_url('quiz/open_quiz/0');?>" class="btn btn-default " style="margin-top:30px;padding-left:50px;padding-right:50px; margin-bottom:40px;"><?php echo $this->lang->line('view_all');?></a>

<?php 
}
?>
</div>
<div class="col-md-4 main_login_panel">

	<div class="login-panel panel panel-default">
		<div class="panel-body"> 
		
		

			<form class="form-signin" method="post" action="<?php echo site_url('login/verifylogin');?>">
					<h3 class="form-signin-heading"><?php echo $this->lang->line('login');?></h3>
		<?php 
		if($this->session->flashdata('message')){
			?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('message');?>
			</div>
		<?php	
		}
		?>				  
			<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('email_address');?></label> 
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="<?php echo $this->lang->line('email_address');?>" required autofocus>
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="sr-only"><?php echo $this->lang->line('password');?></label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="<?php echo $this->lang->line('password');?>" required >
			 </div>
			<div class="form-group">	  
					 
					<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $this->lang->line('login');?></button>
			</div>
<?php 
if($this->config->item('user_registration')){
	?>
	<a href="<?php echo site_url('login/registration');?>"><?php echo $this->lang->line('register_new_account');?></a>
	&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}
?>
	<a href="<?php echo site_url('login/forgot');?>"><?php echo $this->lang->line('forgot_password');?></a>

			</form>
		</div>
	</div>

</div>
 

</div>

</div>