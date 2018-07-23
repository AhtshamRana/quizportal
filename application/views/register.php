<?php
$this->load->view('nav');
?>

 <div class="container">

  <div class="row main">
  	<div class="main-login main-center">
  		<h3>Register a New Account</h3>
     <form method="post" action="<?php echo site_url('login/insert_user/');?>">

		<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
				<div class="form-group">
					<label for="inputEmail" class="cols-sm-2 control-label">Your Email</label> 
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
						<input type="email" id="inputEmail" name="email" class="form-control" placeholder="<?php echo $this->lang->line('email_address');?> (Required)" required autofocus>
					</div>
				</div>		
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="cols-sm-2 control-label">Password</label>
				<div class="cols-sm-10">	
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
					<input type="password" id="inputPassword" name="password"  class="form-control" placeholder="<?php echo $this->lang->line('password');?> (Required)" required >
					</div>
				</div>	
			 </div>
				<div class="form-group">	 
					<label for="inputEmail" class="cols-sm-2 control-label">First Name</label>
				<div class="cols-sm-10">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span> 
					<input type="text"  name="first_name"  class="form-control" placeholder="<?php echo $this->lang->line('first_name');?> (Required)" required autofocus>
					</div>
				</div>	
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="cols-sm-2 control-label">Last Name</label>
				<div class="cols-sm-10">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span> 	 
					<input type="text"   name="last_name"  class="form-control" placeholder="<?php echo $this->lang->line('last_name');?>"   autofocus>
					</div>
				</div>	
			</div>
				<div class="form-group">	 
					<label class="cols-sm-2 control-label"><?php echo $this->lang->line('select_group');?></label> 
				<div class="cols-sm-10">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span> 
					<select class="form-control" name="gid" id="gid"  >
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>"><?php echo $val['group_name'];?> </option>
						<?php 
					}
					?>
					</select>
					</div>
				</div>	
			</div>
 

	<div class="form-group"><button id="button" class="btn btn-default btn-lg btn-block login-button" type="submit">Register</button>
	</div>
	</form>
	</div>
	</div>

	</div>
      

<script>
 
</script>