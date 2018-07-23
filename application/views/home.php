<?php
$this->load->view('nav');
?>
            <div class="jumbotron">
            <div class="container">
            
				<div class="jumbotron-heading">
					<h1 class="display-4">MCQs and Quiz Preparation Tool</h1>
					<p class="lead">Practice Quizzes and MCQs for high marks in VU exams and Quiz assignments.</p>
					<hr class="my-4">
					<p><small>Best tool for preparation of MCQ tests and exams. Lecture wise quizzes and MCQs of Virtual University Subjects.</small></p>
				</div>

                 <div class="jumbotron-login">

						<form class="form-signin" method="post" action="<?php echo site_url('login/verifylogin');?>">
						<h3 class="form-signin-heading">Enter</h3>
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
										 
										<button class="btn btn-lg btn-success btn-block" type="submit"><?php echo $this->lang->line('login');?></button>
								</div>
								<div style="text-align: center">
								<?php 
								if($this->config->item('user_registration')){
									?>
									<a style="margin-bottom:10px;white-space:pre-wrap;" class="btn btn-sm btn-primary" href="<?php echo site_url('login/registration');?>">Register Account</a>
								<?php
								}
								?>
								<a style="margin-bottom:10px;white-space:pre-wrap;" class="btn btn-sm btn-danger" href="<?php echo site_url('login/forgot');?>"><?php echo $this->lang->line('forgot_password');?></a>
								</div>
							</form>
                 	</div>
            </div>
			</div>

<div id="carousel-features" class="carousel slide" data-ride="carousel" data-interval="false">
	<!-- Indicators -->
	<div class="carousel-wrapper">
		<h2>The Goods</h2>
		<ol class="carousel-indicators">
			<span data-target="#carousel-features" data-slide-to="0" class="active">Subjects</span>
			<span data-target="#carousel-features" data-slide-to="1">MCQs</span>
			<span data-target="#carousel-features" data-slide-to="2">Exams</span>
		</ol>
	</div>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<div class="row">
				<div class="col-sm-6">
					<div class="img-wrapper">
						<img src="http://thequizportal.com/images/subjects.jpg">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="carousel-caption">
						<h2>Prepare every subject</h2>
						<p>Computer Science, IT, Software Engineering, Programming, Database, Algorithms, Data Structures, Data Communication, Networking, Operating Systems, English, Pakistan Studies, Islamic Studies, Physics, Economics, Management, Accounting, Mathematics and more. We are to cover all Virtual University Subjects and expand outwards. Pick Subjects of your interest and study scheme and practice to learn and prepare to succeed.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="row">
				<div class="col-sm-6">
					<div class="img-wrapper">
						<img src="http://thequizportal.com/images/MCQs.jpg">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="carousel-caption">
						<h2>Lecture wise MCQs</h2>
						<p>We provide lecture wise MCQs of all the subjects we have so you can practice and prepare your subjects in an orderly fashion. Questions added cover all the concepts discussed in the lectures so you can have better understanding of the subject and comprehend all the study objectives. Lecture wise questions are prepared from the VU handouts, past quizzes and past papers.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="row">
				<div class="col-sm-6">
					<div class="img-wrapper">
						<img src="http://thequizportal.com/images/success.jpg">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="carousel-caption">
						<h2>Midterm and final past papers</h2>
						<p>All past midterm and final term papers' MCQs are added alongside all the past available quiz questions in the lecture wise MCQ quizzes so you can get the highest marks in quiz activities and also in the term exams. It is best to practice all concerned lectures before attempting the quiz or exam.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<div class="container">
  <div class="row">
  <div class="stats-heading"><h3>A few <span style="color:#023744;font-weight:bold;text-transform:uppercase;">Numbers</span> that <span style="font-style:italic;color:#023744;text-transform:uppercase;font-weight:bold;">Matter</span></h3></div>
    <div class="col-lg-3 col-sm-3">
      <div class="circle-tile ">
        <div class="circle-tile-heading cgreen"><i class="fa fa-users fa-fw fa-3x"></i></div>
        <div class="circle-tile-content cgreen">
          <div class="circle-tile-description text-faded"> Members</div>
          <div class="circle-tile-number text-faded"><?php echo $num_users;?></div>
        </div>
      </div>
    </div>
     
    <div class="col-lg-3 col-sm-3">
      <div class="circle-tile ">
        <div class="circle-tile-heading dark-blue"><i class="fa fa-book fa-fw fa-3x"></i></div>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"> Subjects </div>
          <div class="circle-tile-number text-faded"><?php echo $num_subjects;?></div>
        </div>
      </div>
    </div> 
    
       <div class="col-lg-3 col-sm-3">
      <div class="circle-tile ">
        <div class="circle-tile-heading blue"><i class="fa fa-info fa-fw fa-3x"></i></div>
        <div class="circle-tile-content blue">
          <div class="circle-tile-description text-faded"> Quizzes </div>
          <div class="circle-tile-number text-faded"><?php echo $num_quiz;?></div>
        </div>
      </div>
    </div> 
    
       <div class="col-lg-3 col-sm-3">
      <div class="circle-tile ">
        <div class="circle-tile-heading green"><i class="fa fa-question fa-fw fa-3x"></i></div>
        <div class="circle-tile-content green">
          <div class="circle-tile-description text-faded"> MCQs </div>
          <div class="circle-tile-number text-faded"><?php echo $num_qbank;?></div>
        </div>
      </div>
    </div> 
  </div> 
</div>


<section id="bottom" class="section text-center">
        <div class="container">
            <div class="col-sm-4 recent-quiz" style="margin-bottom:20px;">
				<?php 
					if($this->config->item('open_quiz')){
				?>
					<h3 style="margin-bottom:20px;">Recently Added Quizzes</h3>
				 
				<?php 
				foreach($recent_quiz as $key => $val){
				?>
				<div style="margin-top:10px;">
				<label><?php echo $val['quiz_name'];?></label>
				</div>
				<p>
				<?php 
				}
				if(count($recent_quiz)==0){
					echo $this->lang->line('no_record_found');
				}
				?>
				</p>
				<?php 
				}
				?> 
            </div>
            <div class="col-sm-4 recent-subject" style="margin-bottom:20px;">

					<h3 style="margin-bottom:20px;">Recently Added Subjects</h3>
				 
				<?php 
				foreach($recent_subject as $key => $val){
				?>
				<div style="margin-top:10px;letter-spacing: 1px;">
				<label><?php echo $val['category_name'];?></label>
				</div>
				<p>
				<?php 
				}
				if(count($recent_subject)==0){
					echo $this->lang->line('no_record_found');
				}
				?>
				</p>
				
            </div>
             <div class="col-sm-4 recent-subject" style="margin-bottom:20px;">

					<h3 style="margin-bottom:20px;">Important Links</h3>
				
					<p><a style="text-decoration: none; color: #ffffff;" href="http://thequizportal.com/privacy">Privacy Policy</a></p>
					<p><a style="text-decoration: none; color: #ffffff;" href="http://thequizportal.com/terms">Terms of Use</a></p>
					<p><a style="text-decoration: none; color: #ffffff;" href="http://forumvu.com">Virtual University Help Forum</a></p>
            </div>
        </div>
</section>
