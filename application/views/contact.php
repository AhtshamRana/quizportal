<?php
$this->load->view('nav');
?>   
		<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
	   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
<div class="row" style="margin-top:20px;">
<div class="container" >

	<div class="section-content">
				<h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
				<h3>We read emails periodically! Expecting a quick reply? <a href="http://m.me/thequizportal" target="_blank"> Message</a> us on <a href="http://fb.me/thequizportal" target="_blank">facebook</a>.</h3>
	</div>

<div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form">
                    <!-- Form -->
                    <form id="contact-us" method="post" action="<?php echo site_url('contact/message/');?>">
                        <!-- Left Inputs -->
                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                            <!-- Name -->
                            <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                            <!-- Email -->
                            <input type="email" name="mail" id="mail" required="required" class="form" placeholder="Email" />
                            <!-- Subject -->
                            <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                        </div><!-- End Left Inputs -->
                        <!-- Right Inputs -->
                        <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                            <!-- Message -->
                            <textarea name="message" id="message" class="form textarea mceNoEditor"  placeholder="Message"></textarea>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="submit" id="submit" name="submit" class="form-btn semibold" disabled>Send Message</button> 
                        </div><!-- End Bottom Submit -->
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>

                    <!-- Your Mail Message -->
                    <div class="mail-message-area">
                        <!-- Message -->
                        <div class="alert gray-bg mail-message">
                            <?php if($this->session->flashdata('sent')) {
                                echo $this->session->flashdata('sent'); 
                            } ?>
                            <?php if($this->session->flashdata('fail')) {
                                echo $this->session->flashdata('fail'); 
                            } ?>
                        </div>
                    </div>

            </div><!-- End Contact Form Area -->
</div><!-- End Inner -->

</div>
</div>