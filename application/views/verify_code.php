<?php
$this->load->view('nav');
?>
 <div class="container">

   
 <h3><?php echo $title;?></h3>
 
 <div class="col-md-4">

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

			</form>
		</div>
	</div>

</div>  


</div> 