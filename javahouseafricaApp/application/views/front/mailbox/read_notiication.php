<?php $this->load->view('front/header/header'); 
$this->load->view('front/header/menu'); ?> 
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/mailbox';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Notification History</h1></div>
				<div class="leftRight" style="width: 60px;"><button onclick="javascript:myFunction:Select_delected();"><img src="<?php echo base_url(); ?>assets/img/trash-icon.svg"></button></div>
			</div>
		</div>
	</div>
</header>
<main class="padTop commonRoundWrapper">
 <div class="BoxHldr marBottom">
	<div class="container">
		<div class="row">
           <div class="col-12 notificationWrapper comHeight1 scrollbarMain">
				<div class="help-block" style="float: center;"></div>
                <ul class="notifiHldr">
				<?php 
				if($ReadNotifications != Null)
				{
				$LVDatetoPrint = '0';
				foreach($ReadNotifications as $note)
				{
					$Trans_date = date('d M Y', strtotime($note['Date']));	
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
					if( $years=="" && $months =="" &&  $days== "")
					{
						$DatetoPrint = "Today";
						$Trans_date = date('H:i:s A',strtotime($note['Date']));
					}
					else if($months == "")
					{
						$DatetoPrint = "Earlier";
					}
					else
					{
						 // $DatetoPrint = "$years $months $days";
						 $DatetoPrint = date('F',strtotime($note['Date']));
					}
				?>
				<?php if($DatetoPrint != $LVDatetoPrint){?>
                    <li class="mb-4 greyTxt">
                            <?php echo $DatetoPrint; ?>
                    </li>
					<?php } ?>
                    <li>
                        <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/compose?Id=<?php echo $note['Id']; ?>">
                            <div class="d-flex align-items-center">
                                <div class="mr-auto">
                                    <label class="checkbox"> <h2><?php echo $note['Offer']; ?></h2>
                                        <input type="checkbox" name='note' value="<?php echo $note['Id']; ?>">
                                        <span class="checkmark checkmarkTop"></span>
                                    </label>
                                </div>
                                <div class="dateTime"><?php echo $Trans_date; ?></div>
                            </div>
                        </a>
                    </li>
                  <?php 
				  $LVDatetoPrint = $DatetoPrint;
					}
				} ?> 
                </ul>
            </div>
		</div>
	</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
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
			var msg='Please select at least anyone notification';
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