<?php
/*echo 'footer';
$user = $this->session->userdata('logged_in');
print_r($user);*/
?>
<!-- FOOTER -->
		<div class="tb-footer">
			<div class="tb-top-footer">
				<div class="container">
				<div class="tb-btm-logo">
					<!--<img src="<?php //echo base_url();?>assets/public/img/tb-btn-logo.png">-->
					<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/public/img/tb-btn-logo.png"></a>
				</div>
				<div class="hr-footer">
				</div>
				</div>
				<div class="tb-top-footer-content">
				<div class="row">
					<div class="col-md-2">
						<div class="tb-top-footer-div">
							<div class="tb-map"></div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="tb-top-footer-div">
							<h3>CONTACT US</h3>
							<ul class="upclass">
							<li><div class="a1"></div></li>
							<li>Movie Ticket,<br>
									7nd Floor, jbgniv jbjakn, kjbjkb, jhv, Delhi 213130</li>
							</ul>
							<ul class="upclass">
							<li><div class="a2"></div></li>
							<li>+91 1234 4678</li>
							</ul>
							<ul class="upclass">
							<li><div class="a3"></div></li>
							<li>+91 4664 8978 87\</li>
							</ul>
							<ul class="upclass">
							<li><div class="a4"></div></li>
							<li>abcd@gmail.com</li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="tb-top-footer-div">
						<h3>MOVIES BY LANGUAGE</h3>
						<ul>
							<li>Hindi</li>
							<li>English</li>
							<li>Marathi</li>
							<li>Bengali</li>
							<li>Tamil</li>
							<li>Malayalam</li>
							<li>Bhojpuri</li>
							<li>Kannada</li>
						</ul>
						</div>
					</div>
					<div class="col-md-2">
							<div class="tb-top-footer-div">
						<h3>COUNTRIES</h3>
						<ul>
							<li>India</li>
							<li>USA</li>
							<li>Australia</li>
							<li>UK</li>
							<li>UAE</li>
							<li>NEW ZEALAND</li>
						</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="tb-top-footer-div">
						<h3>EXCLUSIVES</h3>
						<ul>
							<li>Book A Smile</li>
							<li>Corporate Vouchers</li>
							<li>Gift Cards</li>
							<li>Refer My Friend</li>
							<li>Reserve Your Seats</li>
						</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="tb-top-footer-div">
						<h3>HELP</h3>
						<ul>
							<li>Site Map</li>
							<li>FAQs</li>
							<li>Terms And Conditions</li>
							<li>Privacy Policy</li>
						</ul>
						</div>
					</div>
				</div>
				</div>
				</div>

			<div class="tb-bottom-footer">
				<div class="container">
					<div class="col-md-6">
						<div class="tb-btm-left">
					All rights reserved. Terms of Use | Privacy Policy
						</div>
					</div>
					<div class="col-md-6">
						<div class="tb-btm-right">
						<ul>
						<li> <a href="" target="_blank" rel="nofollow" title="Like Us on Facebook"><div class="m1"></div></li></a>
						<li><a href="" target="_blank" rel="nofollow" title="Like Us on Googleplus"><div class="m2"></div></li></a>
						<li><a href="" target="_blank" rel="nofollow" title="Like Us on Googleplus"><div class="m3"></div></li></a>
						<li><a href="" target="_blank" rel="nofollow" title="Like Us on Googleplus"><div class="m4"></div></li></a>
						<li><a href="" target="_blank" rel="nofollow" title="Like Us on Googleplus"><div class="m5"></div></li></a>
						<div class="clearfix">
						</ul>
						</div>
					</div>
				</div>
			</div>
		</div> 

<script type="text/javascript">
		var get_city = '<?php echo get_cookie("tb_search"); ?>';
		if(get_city==''){		
			$('#tab_city').modal('show');
		}		
	</script>
</body>
</html>
<?php
/*echo 'footer';
$user = $this->session->userdata('logged_in');
print_r($user);*/
?>