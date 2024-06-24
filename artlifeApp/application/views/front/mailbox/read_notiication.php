<?php $this->load->view('front/header/header'); ?> 
		<div class="custom-body body-wrapper p-0">
			<div class="notification-wrap">
				<div class="notification-head">
					<ul>
						<li>
							<a href="<?php echo base_url();?>index.php/Cust_home/mailbox">
								<div class="icon">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0)">
										<path d="M23.3022 3.47852H2.69673C2.3585 3.47852 2.04185 3.56167 1.75537 3.69873L12.9506 14.894L15.4599 12.4825C15.4599 12.4825 15.4601 12.4823 15.4601 12.4822C15.4602 12.4821 15.4604 12.482 15.4604 12.482L24.2439 3.69893C23.9574 3.56177 23.6405 3.47852 23.3022 3.47852Z" fill="white"></path>
										<path d="M25.2799 4.73462L17.0142 13L25.2796 21.2654C25.4167 20.979 25.4999 20.6623 25.4999 20.3241V5.67563C25.4999 5.3376 25.4169 5.021 25.2799 4.73462Z" fill="white"></path>
										<path d="M0.720215 4.73438C0.583154 5.02085 0.5 5.3375 0.5 5.67573V20.3242C0.5 20.6622 0.583057 20.9789 0.72002 21.2653L8.98579 12.9999L0.720215 4.73438Z" fill="white"></path>
										<path d="M15.9784 14.036L13.4688 16.4478C13.3258 16.5908 13.1384 16.6624 12.951 16.6624C12.7637 16.6624 12.5762 16.5908 12.4332 16.4478L10.0213 14.0359L1.75537 22.3013C2.04189 22.4384 2.35874 22.5217 2.69707 22.5217H23.3025C23.6408 22.5217 23.9574 22.4385 24.2439 22.3015L15.9784 14.036Z" fill="white"></path>
										</g>
										<defs>
										<clipPath id="clip0">
										<rect x="0.5" y="0.5" width="25" height="25" fill="white"></rect>
										</clipPath>
										</defs>
									</svg>
								</div>
								Unread
							</a>
						</li>
						<li class="active">
							<a href="<?php echo base_url();?>index.php/Cust_home/readnotifications">
								<div class="icon">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0)">
										<path d="M20.0068 12.296V0.25H5.99316V12.296L11.1884 17.4913C11.6723 17.9751 12.3157 18.2416 13 18.2416C13.6843 18.2416 14.3277 17.9751 14.8116 17.4913L20.0068 12.296Z" fill="white"></path>
										<path d="M1.24995 7.55322L4.52788 10.8312V6.10938H0.525879C0.603711 6.65415 0.853857 7.15713 1.24995 7.55322Z" fill="white"></path>
										<path d="M24.7492 23.8063L17.6585 16.7156L15.8469 18.5272C15.0863 19.2877 14.0751 19.7066 12.9996 19.7066C11.924 19.7066 10.9127 19.2877 10.1522 18.5272L8.34058 16.7156L1.24995 23.8063C0.853857 24.2023 0.603711 24.7053 0.525879 25.2501H25.4733C25.3954 24.7053 25.1453 24.2023 24.7492 23.8063Z" fill="white"></path>
										<path d="M21.4717 10.8312L24.7496 7.55323C25.1457 7.15713 25.3959 6.65415 25.4737 6.10938H21.4717V10.8312Z" fill="white"></path>
										<path d="M7.30527 15.6798L0.5 8.87451V22.485L7.30527 15.6798Z" fill="white"></path>
										<path d="M18.6948 15.6797L25.5001 22.485V8.87451L18.6948 15.6797Z" fill="white"></path>
										</g>
										<defs>
										<clipPath id="clip0">
										<rect x="0.5" y="0.25" width="25" height="25" fill="white"></rect>
										</clipPath>
										</defs>
									</svg>
								</div>
								Read
							</a>
						</li>
						<li>
							<a href="javascript:myFunction:Select_delected()">
								<div class="icon">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0)">
										<path d="M21.2671 3.00771H16.8016V1.31523C16.8016 0.865039 16.4366 0.5 15.9863 0.5H10.015C9.56479 0.5 9.19975 0.86499 9.19975 1.31523V3.00771H4.73418C4.28398 3.00771 3.91895 3.37271 3.91895 3.82295V6.33062C3.91895 6.78081 4.28394 7.14585 4.73418 7.14585H21.267C21.7172 7.14585 22.0823 6.78086 22.0823 6.33062V3.82295C22.0823 3.37266 21.7173 3.00771 21.2671 3.00771ZM15.171 3.00771H10.8302V2.13042H15.171V3.00771Z" fill="white"></path>
										<path d="M5.05029 8.77612L5.72627 24.7193C5.74473 25.1557 6.10396 25.5 6.54072 25.5H19.4591C19.8959 25.5 20.2551 25.1557 20.2735 24.7192L20.9495 8.77612H5.05029ZM10.5355 22.1847C10.5355 22.6349 10.1706 23 9.72031 23C9.27012 23 8.90508 22.635 8.90508 22.1847V12.0913C8.90508 11.6411 9.27007 11.276 9.72031 11.276C10.1705 11.276 10.5355 11.641 10.5355 12.0913V22.1847ZM13.815 22.1847C13.815 22.6349 13.45 23 12.9998 23C12.5495 23 12.1845 22.635 12.1845 22.1847V12.0913C12.1845 11.6411 12.5495 11.276 12.9998 11.276C13.45 11.276 13.815 11.641 13.815 12.0913V22.1847ZM17.0944 22.1847C17.0944 22.6349 16.7294 23 16.2792 23C15.829 23 15.464 22.635 15.464 22.1847V12.0913C15.464 11.6411 15.829 11.276 16.2792 11.276C16.7294 11.276 17.0944 11.641 17.0944 12.0913V22.1847Z" fill="white"></path>
										</g>
										<defs>
										<clipPath id="clip0">
										<rect x="0.5" y="0.5" width="25" height="25" fill="white"></rect>
										</clipPath>
										</defs>
										</svg>

								</div>
								Delete
							</a>
						</li>
					</ul>
					<div class="close-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/front_home">
					</div>
					</a>
					<div class="help-block" style="float: center;"></div>
				</div>
				<div class="notification-body">
				<?php 
					foreach($ReadNotifications as $note)
					{
							
						$date11 = date('d-M',strtotime($note['Date']));
						$date1 = date('Y-m-d',strtotime($note['Date']));
						$date2 = date('Y-m-d');
						$diff = abs(strtotime($date2) - strtotime($date1));
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						if($years=='0')	{ $years=''; }
						else{	$years=$years.' Year-'; }
						if($months=='0'){ $months=''; }
						else{$months=$months.' Months-';}
						if($days=='0'){$days='';}elseif($days==1){$days=$days.' Day';}
						else{$days=$days.' Days';}
						?>
						
						<div class="notification-check">
						<label> 
							<input type="checkbox"  name='note' value="<?php echo $note['Id']; ?>" />
							<span>	<a id="mail_body" style="text-decoration: none" href="<?php echo base_url();?>index.php/Cust_home/compose?Id=<?php echo $note['Id']; ?>"><?php echo $note['Offer']; ?></a>
								<span class="date"><?php 
									  if( $years=="" && $months =="" &&  $days== "")
									  {
										// echo 'Some time before';
										echo $date11;
									  }
									  else
									  {
										 // echo $years, $months, $days.' ago';
										 echo $date11;
									  }
									  ?>
								</span>
							</span>
						</label>
						</div>	
				<?php 
					} ?>
				</div>
			</div>
		</div>

<?php $this->load->view('front/header/footer');  ?>
<script>
function Select_delected()
{
	var result=1;
	if (result == 1)
	{	
		var urlid = "<?php echo base_url()?>index.php/Cust_home/delete_notification";
		var favorite = [];
		var theArray = new Array();
		var i=0;
		$.each($("input[name='note']:checked"), function(){
		
		if(jQuery(this).prop('checked'))
		{
			theArray[i] = jQuery(this).val();
			i++;
		}
					
		});	
		if(theArray !='')
		{
			/*setTimeout(function() 
			{
				$('#myModal').modal('show'); 
			}, 0);
			setTimeout(function() 
			{ 
				$('#myModal').modal('hide'); 
			},2000); */
			
			jQuery.ajax({
				 url: '<?php echo base_url()?>index.php/Cust_home/delete_notification',
				 type: 'post',
				 data: {
					 NoteID: theArray,
					 other_id: ''
				 },
				 datatype: 'json',
				 success: function(data)
				 {
					var msg='Notification deleted successfuly';
					$('.help-block').show();
					$('.help-block').css("color","green");
					$('.help-block').html(msg);
					setTimeout(function(){ $('.help-block').hide(); }, 5000);
					location.reload(); 
				 }
			});
		}
		else
		{
			var msg='Please select atleast one notification to proceed';
			$('.help-block').show();
			$('.help-block').css("color","red");
			$('.help-block').html(msg);
			setTimeout(function(){ $('.help-block').hide(); }, 5000);
			return true;
		}
	}
	else
	{
		return false;
	}	
} 
function Page_refresh()
{
	setTimeout(function() 
	{
		$('#myModal').modal('show'); 
	}, 0);
	setTimeout(function() 
	{ 
		$('#myModal').modal('hide'); 
	},2000);
	
	// window.location.reload();
}
</script>
<script>
function form_submit()
{ 
	setTimeout(function() 
	{
		$('#myModal').modal('show'); 
	}, 0);
	setTimeout(function() 
	{ 
		$('#myModal').modal('hide'); 
	},2000);
	
	document.Read_mail_search.submit();
} 
</script>