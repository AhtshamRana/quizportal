<html lang="en">
  <head>
  <title>The Quiz Portal | Gateway to MCQ Success | <?php echo $title;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		meta_tags();
	?>
	<meta name="description" content="Practice Quizzes and MCQs for all VU Subjects. Best MCQs and Quiz preparation tool for success in VU quiz and midterm, final term exams.">
	<meta name="keywords" content="quiz practice, vu quizzes, lecture wise mcqs, solved quizzes and mcqs, virtual university exams help, midterm past papers mccqs, vu final term solved mcqs, vu solved papers, vu exams preparation">
	<meta name="author" content="TheQuizPortal">
	

	<!-- bootstrap css -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- custom css -->
	<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">
	
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	<script src="<?php echo base_url('js/jquery.js');?>"></script>
	
	<!-- custom javascript -->
	  	<script src="<?php echo base_url('js/basic.js');?>"></script>
		
	<!-- bootstrap js -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
	
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/ico">
 </head>
  <body>
  	
		
	<?php 
			if($this->session->userdata('logged_in')){
				if(($this->uri->segment(1).'/'.$this->uri->segment(2))!='quiz/attempt'){
				$logged_in=$this->session->userdata('logged_in');
	?>
	    <nav class="navbar" id="member_nav">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="http://thequizportal.com"><img src="<?php echo base_url('images/logo_small.png');?>"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
              <?php  
				if($logged_in['su']==1){
			?>
			  
			  <li <?php if($this->uri->segment(1)=='dashboard'){ echo "class='active'"; } ?> ><a href="<?php echo site_url('dashboard');?>"><?php echo $this->lang->line('dashboard');?></a></li>
            
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('users');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('user/new_user');?>"><?php echo $this->lang->line('add_new');?></a></li>
                  <li><a href="<?php echo site_url('user');?>"><?php echo $this->lang->line('users');?> <?php echo $this->lang->line('list');?></a></li>
                  
                </ul>
              </li>
			 
			 
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('qbank');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('qbank/pre_new_question');?>"><?php echo $this->lang->line('add_new');?></a></li>
                  <li><a href="<?php echo site_url('qbank');?>"><?php echo $this->lang->line('question');?> <?php echo $this->lang->line('list');?></a></li>
                  
                </ul>
              </li>
			 
			 
			 
		    <?php 
				}else{
			?>
			 <li><a href="<?php echo site_url('user/edit_user/'.$logged_in['uid']);?>"><?php echo $this->lang->line('myaccount');?></a></li>
			<?php 
				}
			?>
			 <?php  
				if($logged_in['su']==1){
				?>
     		  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('quiz');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a href="<?php echo site_url('quiz/add_new');?>"><?php echo $this->lang->line('add_new');?></a></li>

				 <li><a href="<?php echo site_url('quiz');?>"><?php echo $this->lang->line('quiz');?> <?php echo $this->lang->line('list');?></a></li>
               
                </ul>
              </li>
              <?php 
				}
				?>
	
			<li><a href="<?php echo site_url('subject');?>">Subjects</a></li>

	           <li><a href="<?php echo site_url('result');?>"><?php echo $this->lang->line('result');?></a></li>
			 
			 
			  <?php  
				if($logged_in['su']==1){
			?>
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user_group'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('setting');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 
                  <li><a href="<?php echo site_url('user/group_list');?>"><?php echo $this->lang->line('group_list');?></a></li>
                  <li><a href="<?php echo site_url('qbank/category_list');?>"><?php echo $this->lang->line('category_list');?></a></li>
                  <li><a href="<?php echo site_url('qbank/level_list');?>"><?php echo $this->lang->line('level_list');?></a></li>
                  
					<li><a href="<?php echo site_url('dashboard/config');?>"><?php echo $this->lang->line('config');?></a></li>
					 
					<li><a href="<?php echo site_url('dashboard/css');?>"><?php echo $this->lang->line('custom_css');?></a></li>
						  
                  
                </ul>
              </li>
			
			<?php 
				}
				?>
             <li><a href="<?php echo site_url('user/logout');?>"><?php echo $this->lang->line('logout');?></a></li>
			  
            </ul>
             
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

	<?php 
			}
			}
	?>
	
