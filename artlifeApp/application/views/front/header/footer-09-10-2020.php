 <?php 
		$ci_object = &get_instance(); 
		$ci_object->load->model('Igain_model');
		
		$cart_check = $this->cart->contents();
			if(!empty($cart_check)) {
				$cart = $this->cart->contents(); 
				$grand_total = 0; 
				$item_count = COUNT($cart);  
			}
		if($item_count <= 0 ) {
			$item_count=0;
		}
		else {
			$item_count = $item_count;
		}
		// echo "--item_count-".$item_count;
		
		
		$fetch_class=$this->router->fetch_class();
		$fetch_method=$this->router->fetch_method();

		$session_data = $this->session->userdata('cust_logged_in');
		$data['Company_id'] = $session_data['Company_id'];
		$data['enroll'] = $session_data['enroll'];
		
		$NotificationsCount= $ci_object->Igain_model->Fetch_Open_Notification_Count($session_data['enroll'], $session_data['Company_id']);
		if($NotificationsCount){
			$NotificationsCount= $NotificationsCount;
		} else {
			$NotificationsCount=0;
		}
		
		if($this->router->fetch_method()=='myprofile'  || $this->router->fetch_method()=='profile' ){
			$myprofile='active';
			//$this->router->fetch_method() != "myprofile"
		} else {
			$myprofile='';
		}
		if($this->router->fetch_method()=='front_home'){
			$front_home='active';
			
		} else {
			$front_home='';
		}
		
		if($this->router->fetch_method()=='statement'){
			$statement='active';
			
		} else {
			$statement='';
		}
		if($this->router->fetch_method()=='mailbox'  || $this->router->fetch_method()=='compose' ){
			$mailbox='active';
			
		} else {
			$mailbox='';
		}
		
		
 ?>  


<footer class="footer-shadow">
			<ul>
				<li class="<?php echo $front_home; ?>">
					<a href="<?php echo base_url(); ?>index.php/Cust_home/front_home">
						<svg xmlns="http://www.w3.org/2000/svg" width="36.883" height="31.766" viewBox="0 0 36.883 31.766">
						  <g id="ICONS_8" data-name="ICONS 8" transform="translate(-12.225 -14.783)">
							<g id="Group_121" data-name="Group 121">
							  <g id="Group_120" data-name="Group 120">
								<path id="Path_362" data-name="Path 362" d="M48.9,31.365l-6.452-5.92v-8.85H36.28v3.192l-5.272-4.838a.64.64,0,0,0-.862,0L12.433,31.368a.64.64,0,0,0-.108.815.672.672,0,0,0,.573.3h4.444V45.91a.639.639,0,0,0,.639.639h8.342a.612.612,0,0,0,.613-.613V38.174a.773.773,0,0,1,.773-.773h5.916a.773.773,0,0,1,.773.773v7.762a.612.612,0,0,0,.613.613h8.342a.639.639,0,0,0,.639-.639V32.479h4.444a.672.672,0,0,0,.573-.3A.639.639,0,0,0,48.9,31.365Z" fill="#c1bdb7"/>
							  </g>
							</g>
						  </g>
						</svg>
					</a>
				</li>
				<li class="<?php echo $mailbox; ?>">
					<a href="<?php echo base_url(); ?>index.php/Cust_home/mailbox">
						<svg xmlns="http://www.w3.org/2000/svg" width="31.883" height="35.158" viewBox="0 0 31.883 35.158">
						  <g id="ICONS_9" data-name="ICONS 9" transform="translate(-14.112 -13.542)">
							<g id="Group_123" data-name="Group 123">
							  <g id="Group_122" data-name="Group 122">
								<g id="bell_30_">
								  <path id="XMLID_240_" d="M30.053,48.7a5.025,5.025,0,0,0,5.075-4.974H24.978A5.025,5.025,0,0,0,30.053,48.7Z" fill="#c1bdb7" fill-rule="evenodd"/>
								  <path id="XMLID_239_" d="M45.651,39.458l-3.7-4.088a3.315,3.315,0,0,1-.86-2.223v-5.8a11.146,11.146,0,0,0-9.121-10.959v-.923a1.92,1.92,0,1,0-3.84,0v.918a10.888,10.888,0,0,0-9.121,10.658v6.109a3.315,3.315,0,0,1-.86,2.223l-3.7,4.088a1.324,1.324,0,0,0,1.013,2.207h29.17A1.324,1.324,0,0,0,45.651,39.458Z" fill="#c1bdb7" fill-rule="evenodd"/>
								</g>
							  </g>
							</g>
						  </g>
						</svg>

						<span><?php echo $NotificationsCount->Open_notify; ?></span>
					</a>
				</li>
				<li class="<?php echo $statement; ?>">
					<a href="<?php echo base_url(); ?>index.php/Cust_home/statement">
						<svg xmlns="http://www.w3.org/2000/svg" width="36.886" height="36.547" viewBox="0 0 36.886 36.547">
						  <path id="Path_3" data-name="Path 3" d="M30.231,13.06c.4-1.269,1.045-1.269,1.441,0l3.2,10.252a3.444,3.444,0,0,0,3.052,2.308H48.284c1.283,0,1.483.642.445,1.427l-8.38,6.337a3.654,3.654,0,0,0-1.166,3.734l3.2,10.253c.4,1.269-.128,1.666-1.166.882l-8.38-6.337a3.32,3.32,0,0,0-3.773,0l-8.38,6.337c-1.038.784-1.562.387-1.166-.882l3.2-10.253a3.655,3.655,0,0,0-1.166-3.734l-8.38-6.337c-1.038-.784-.837-1.427.445-1.427H23.976a3.443,3.443,0,0,0,3.052-2.308Z" transform="translate(-12.508 -12.108)" fill="#c1bdb7"/>
						</svg>

					</a>
				</li>
				<li class="<?php echo $myprofile; ?>">
					<a href="<?php echo base_url(); ?>index.php/Cust_home/myprofile">
						<svg xmlns="http://www.w3.org/2000/svg" width="43.168" height="23.531" viewBox="0 0 43.168 23.531">
						  <g id="ICONS_16" data-name="ICONS 16" transform="translate(-9.083 -16.967)">
							<g id="Group_83" data-name="Group 83">
							  <g id="Group_82" data-name="Group 82">
								<path id="Path_302" data-name="Path 302" d="M50.9,36.478c-1.723-1.225-4.365-.575-6.011-2.757,0,0-.613-.689.765-2.374s1.493-4.365,1.149-6.433a4.439,4.439,0,0,0-8.653,0c-.345,2.068-.23,4.748,1.148,6.433a3.277,3.277,0,0,1,.9,1.828,6.931,6.931,0,0,1,1.876.916c2.6,1.848,2.458,5.407,2.361,6.406H52.2S52.626,37.7,50.9,36.478Z" fill="#c1bdb7"/>
								<path id="Path_303" data-name="Path 303" d="M19.2,34.092a6.952,6.952,0,0,1,1.929-.932,3.321,3.321,0,0,1,.9-1.813c1.378-1.685,1.493-4.365,1.148-6.433a4.439,4.439,0,0,0-8.653,0c-.344,2.068-.23,4.748,1.148,6.433s.766,2.374.766,2.374C14.8,35.9,12.153,35.253,10.43,36.478s-1.3,4.02-1.3,4.02h7.714C16.746,39.5,16.6,35.939,19.2,34.092Z" fill="#c1bdb7"/>
								<path id="Path_304" data-name="Path 304" d="M41.057,35.527a5.984,5.984,0,0,0-2-.851c-1.86-.486-3.965-.613-5.432-2.558,0,0-.758-.852.946-2.936s1.847-5.4,1.42-7.954a5.489,5.489,0,0,0-10.7,0c-.426,2.557-.284,5.871,1.421,7.954s.946,2.936.946,2.936c-1.457,1.931-3.543,2.07-5.394,2.547a6.052,6.052,0,0,0-2.039.862c-2.131,1.515-1.61,4.971-1.61,4.971H42.666S43.187,37.042,41.057,35.527Z" fill="#c1bdb7"/>
							  </g>
							</g>
						  </g>
						</svg>

					</a>
				</li>
			</ul>
		</footer>
	</div>
   <!--Main jQuery-->
   <script src="<?php echo base_url(); ?>assets/brand-0/js/jquery-3.2.1.min.js"></script>
   <!--Bootstrap Min JS-->
   <script src="<?php echo base_url(); ?>assets/brand-0/js/popper.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/brand-0/js/bootstrap.min.js"></script>
   <!--custom JS-->
   <script src="<?php echo base_url(); ?>assets/brand-0/js/owl.carousel.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/brand-0/js/custom.js"></script>
   <script>
		$(document).ready(function(){
			$('.slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				dots:false,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})
		})
   </script>

</body>
</html>
<style type="text/css">
	footer.footer-shadow{
		box-shadow:0 15px 7px -18px rgba(0,0,0,0.1) inset;
	}
</style>