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
		
		if($this->router->fetch_method()=='myprofile'  || $this->router->fetch_method()=='profile' || $this->router->fetch_method()=='account' || $this->router->fetch_method()=='changepassword' || $this->router->fetch_method()=='settings' ){
			$myprofile='active';
			//$this->router->fetch_method() != "myprofile"
		} else {
			$myprofile='';
		}
		if($this->router->fetch_method()=='front_home' || $this->router->fetch_method()=='set_brand' ){
			$front_home='active';
			
		} else {
			$front_home='';
		}
		
		if($this->router->fetch_method()=='statement' || $this->router->fetch_method()=='points_history'){
			$statement='active';
			
		} else {
			$statement='';
		}
		if($this->router->fetch_method()=='mailbox'  || $this->router->fetch_method()=='readnotifications' || $this->router->fetch_method()=='compose' ){
			$mailbox='active';
			
		} else {
			$mailbox='';
		}
		
		
		
		/* Footer changes-12-10-2020 */
		
			$fetch_method2 = $this->router->fetch_method();
			$start_method = $this->router->fetch_method();	

		// echo"--start_method----".$start_method."--<br>";			
			
			/* echo"--fetch_method2----".$fetch_method2."--<br>";
			echo"--fetch_class----".$fetch_class."--<br>"; */
			
			
			
			/* if($fetch_method='front_home'){
				
				$nextPage='Cust_home/set_brand?brndID='.$_SESSION['brndID'];
				$prevPage='Cust_home/front_home';
				
			} else  */
			if($fetch_method2 =='set_brand'){
				
				// echo"--set_brand-<br>";
				
				
				if($_SESSION['brndID']==121  ){
					
					$nextPage='Cust_home/front_home';
					
				} else {
					
					$nextPage='Cust_home/brand_menu';
				}
				
				
				$prevPage='Cust_home/front_home';
				
			} 
			 if($fetch_method2 =='brand_menu'){
				// echo"--brand_menu-<br>";
				
				if( $_SESSION['brndID']==146 || $_SESSION['brndID']==121  ){
					
					$nextPage='Cust_home/front_home';
					
				} else {
					
					$nextPage='Shopping/select_outlet_shopping';
				}
				
				
				
				$prevPage='Cust_home/set_brand?brndID='.$_SESSION['brndID'];
				
				
				
			} if($fetch_method2 =='select_outlet_shopping'){
				
				// echo"--select_outlet_shopping-<br>";
				// $nextPage='Cust_home/front_home';
				// $prevPage='Cust_home/front_home';
				
				$prevPage='Cust_home/set_brand?brndID='.$_SESSION['brndID'];
				$nextPage='Cust_home/set_brand?brndID='.$_SESSION['brndID'];
				
			} 
			 if($fetch_method2 == 'myprofile' ){
				// echo"--myprofile-<br>";
				$nextPage='Cust_home/account';
				$prevPage='Cust_home/front_home';
				
			}
			 if($fetch_method2=='account'){
				// echo"--account-<br>";
				$nextPage='Cust_home/profile';
				$prevPage='Cust_home/myprofile';
				
			}
			 if($fetch_method2 =='profile'){
				// echo"--profile-<br>";
				$nextPage='Cust_home/changepassword';
				$prevPage='Cust_home/account';
				
			}
			 if($fetch_method2 =='changepassword'){
				// echo"--changepassword-<br>";
				$nextPage='Cust_home/mailbox';
				$prevPage='Cust_home/account';
				
			}
			if($fetch_method2 =='compose'){
				// echo"--changepassword-<br>";
				$nextPage='Cust_home/mailbox';
				$prevPage='Cust_home/mailbox';
				
			}
			 if($fetch_method2 =='mailbox'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/account';
				$prevPage='Cust_home/account';
				
			}
			 if($fetch_method2 =='readnotifications'){
				// echo"--readnotifications-<br>";
				$nextPage='Cust_home/statement';
				$prevPage='Cust_home/mailbox';
				
			}
			if($fetch_method2 =='statement'){
				// echo"--statement-<br>";
				$nextPage='Cust_home/mailbox';
				$prevPage='Cust_home/points_history';
				
			}
			if($fetch_method2 =='points_history'){
				// echo"--statement-<br>";
				$nextPage='Cust_home/mailbox';
				$prevPage='Cust_home/myprofile';
				
			}
			if($fetch_method2 =='works'){
				// echo"--works-<br>";
				$nextPage='Cust_home/front_home';
				$prevPage='Cust_home/front_home';
				
			}
			if($fetch_method2 =='mailbox'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/myprofile';
				$prevPage='Cust_home/myprofile';
				
			}
			if($fetch_method2 =='Verify_email'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/profile';
				$prevPage='Cust_home/profile';
				
			}			
			if($fetch_method2 =='Verified_email'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/Verified_email';
				$prevPage='Cust_home/Verify_email';
				
			}
			if($fetch_method2 =='settings'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/account';
				$prevPage='Cust_home/account';
				
			}
			if($fetch_method2 =='Decline'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/mailbox';
				$prevPage='Cust_home/mailbox';
				
			}
			if( $fetch_class=='API' && $fetch_method2 =='index'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/mailbox';
				$prevPage='Cust_home/mailbox';
				
			}
			if($fetch_method2 =='Upload_img'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/myprofile';
				$prevPage='Cust_home/myprofile';
				
			}
			if($fetch_method2 =='stamp_collection'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/points_history';
				$prevPage='Cust_home/points_history';
				
			}
			if($fetch_method2 =='vouchers_listing'){
				// echo"--mailbox-<br>";
				$nextPage='Cust_home/points_history';
				$prevPage='Cust_home/points_history';
				
			}
			

			/* else {
				
				$nextPage='Cust_home/front_home';
				$prevPage='Cust_home/front_home';
				
			}	 */		
			
			
			// echo"--fetch_method--1--".$fetch_method."--<br>";
			
			
			
			
						
			
			// echo"--fetch_method--2--".$fetch_method."--<br>";
			// echo"--nextPage----".$nextPage."--<br>";
			// echo"--prevPage----".$prevPage."--<br>";
			
			
			// $prevPage= $_SERVER['HTTP_REFERER'];
			
			// echo"--start_method----".$start_method."--<br>";
			
			
			
			if($start_method =='front_home' || $start_method =='front_home') {
				
				$footerClass='d-flex justify-content-center';
				
			} else {
				
				$footerClass='d-flex justify-content-between';
			}
			
		/* Footer changes-12-10-2020 */
		
		
	?>  


		<!--<footer class="<?php echo $footerClass; ?>">-->
		<footer class="footer-shadow">
		
			<?php if($start_method != 'front_home' && $start_method != 'contact') {
				?>
					<div class="prev-arrow">
						<a href="<?php echo base_url(); ?>index.php/<?php echo $prevPage; ?>"></a>
					</div>
			<?php } ?>
			
			
			
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
					<a href="<?php echo base_url(); ?>index.php/Cust_home/points_history">
						<svg xmlns="http://www.w3.org/2000/svg" width="36.886" height="36.547" viewBox="0 0 36.886 36.547">
						  <path id="Path_3" data-name="Path 3" d="M30.231,13.06c.4-1.269,1.045-1.269,1.441,0l3.2,10.252a3.444,3.444,0,0,0,3.052,2.308H48.284c1.283,0,1.483.642.445,1.427l-8.38,6.337a3.654,3.654,0,0,0-1.166,3.734l3.2,10.253c.4,1.269-.128,1.666-1.166.882l-8.38-6.337a3.32,3.32,0,0,0-3.773,0l-8.38,6.337c-1.038.784-1.562.387-1.166-.882l3.2-10.253a3.655,3.655,0,0,0-1.166-3.734l-8.38-6.337c-1.038-.784-.837-1.427.445-1.427H23.976a3.443,3.443,0,0,0,3.052-2.308Z" transform="translate(-12.508 -12.108)" fill="#c1bdb7"/>
						</svg>

					</a>
				</li>
				<li class="<?php echo $myprofile; ?>">
					<a href="<?php echo base_url(); ?>index.php/Cust_home/myprofile">
						<svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.09146 23.4817C3.8359 24.1389 3.90892 24.869 4.31052 25.4532C4.71212 26.0373 5.33278 26.3659 6.06296 26.3659H23.8795C24.5732 26.3659 25.2303 26.0373 25.6319 25.4532C26.0335 24.869 26.1066 24.1389 25.851 23.4817C23.989 19.0276 19.7174 16.1433 14.9347 16.1433C10.152 16.1433 5.88042 19.0276 4.09146 23.4817Z" fill="#86869D"></path>
						<path d="M20.7757 8.47617C20.7757 5.26335 18.1471 2.63469 14.9343 2.63469C11.7214 2.63469 9.09277 5.26335 9.09277 8.47617C9.09277 11.689 11.7214 14.3177 14.9343 14.3177C18.1471 14.3177 20.7757 11.689 20.7757 8.47617Z" fill="#86869D"></path>
						</svg>

					</a>
				</li>
			</ul>
			<?php if($start_method !='front_home') { ?>
				<div class="next-arrow">
					<!--<a href="<?php echo base_url(); ?>index.php/<?php echo $nextPage; ?>"></a>-->
				</div>
			<?php } 
			
			$fetch_method="";
			?>
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

		$( document ).ready(function() {
	        $( ".card-header a" ).click(function() {
	            $( ".custom-body" ).toggleClass( "hide-up" );
	        });
	    });   
   </script>
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
	.collapsing {
  transition: none !IMPORTANT;
}
</style>