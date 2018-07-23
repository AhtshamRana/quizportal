 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
?>
   
 <h3><?php echo $title;?></h3>

  <div class="row">
<div class="col-md-12" style="margin-bottom: 40px;">
<br> 
	<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
	?>
					
	     <?php 
if(count($quizzes)==0){
	?>
<?php echo $this->lang->line('no_record_found');?>
	<?php
}
$cc=0;
$colorcode=array(
'success',
'warning',
'info',
'success',
'danger'
);
foreach($quizzes as $key => $val){
?>
	  
	                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-<?php echo $colorcode[$cc];?> panel-pricing">
                        <div class="panel-heading">
                            <h3><?php echo substr(strip_tags($val['quiz_name']),0,50);?></h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong><?php echo $this->lang->line('duration');?> <?php echo $val['duration'];?></strong></p>
                        </div>
                        <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $this->lang->line('noq');?>:  <?php echo $val['noq'];?></li>
                            <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $this->lang->line('maximum_attempts');?>: <?php echo $val['maximum_attempts'];?></li>
                            </ul>
                        <div class="panel-footer">
                         
						 
<a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid']);?>" class="btn btn-success"  ><?php echo $this->lang->line('attempt');?> </a>

<?php 
if($logged_in['su']=='1'){
	?>
			
<a href="<?php echo site_url('quiz/edit_quiz/'.$val['quid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
<?php 
}
?>


                        </div>
                    </div>
                </div>
                <!-- /item --> 
	  
	  
	  <?php 
	  if($cc >= 4){
	  $cc=0;
	  }else{
	  $cc+=1;
	  }
	  
}
  ?>                  

</div>

</div>

</div>