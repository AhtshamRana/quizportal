 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
?>
   
 <h3><?php echo $title;?></h3>

  <div class="row">
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
	
		
if(count($subj_details)==0){
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
foreach($subj_details as $key => $val){
?>
	  
	                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-<?php echo $colorcode[$cc];?> panel-pricing">
                        <div class="panel-heading">
                            <h3><?php echo substr(strip_tags($val['category_name']),0,50);?></h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>No. of Quizzes: <?php echo $val['count(portal_qcl.cid)'];?></strong></p>
                        </div>
                        <div class="panel-footer">
                         
						 
<a href="<?php echo site_url('subject/quizzes/'.$val['cid']);?>" class="btn btn-success"  >Open</a>


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