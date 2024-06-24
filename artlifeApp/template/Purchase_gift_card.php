<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
	<body scroll="auto" style="padding:0; margin:0; FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif; cursor:auto; background:#fff; height:100% !important; width:100% !important; margin:0; padding:0;">

		<table class="rtable mainTable" cellSpacing=0 cellPadding=0 width="100%" style="height:100% !important; width:100% !important; margin:0; padding:0;border:0; mso-table-lspace:0pt; mso-table-rspace:0pt;" style="BACKGROUND-COLOR: #fff;">
		<tr>
			
		</tr>
				<tr>
					<td vAlign=top>
						<table style="MARGIN: 0px auto; WIDTH: 616px; mso-table-lspace:0pt; mso-table-rspace:0pt; border-bottom:1px solid #d2d6de;" class="rtable" border="0" cellSpacing="0" cellPadding="0" width="616" align="center">
						<tr>
							<td style="BORDER-BOTTOM: #dbdbdb 1px solid; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #fff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
						   <table style="WIDTH: 100%;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class=rtable cellSpacing=0 cellPadding=0 align=left>
							<tr style="HEIGHT: 10px">
								<td style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #fff; PADDING-LEFT: 15px; WIDTH: 100%; PADDING-RIGHT: 15px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 5px">
								<table border=0 cellSpacing=0 cellPadding=0 align=center style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
							<tr>
							<td style="PADDING-BOTTOM: 15px; PADDING-LEFT: 2px; PADDING-RIGHT: 2px; PADDING-TOP: 2px" align=middle>	
					</td>
				</tr>
			</table> 
			<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: #fff; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #333333; FONT-SIZE: 18px; mso-line-height-rule: exactly; margin-top: -50px;" align=center>
			<b>Gift Card Confirmation</b>
			</P>
		 
			<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: #fff; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 18px; mso-line-height-rule: exactly" align=left>
			Dear $First_name,
			</P>

		<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: #fff; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
			Thank You for purchasing the gift card.<br>Please find below the details of your gift card. <br><br>
		
			<strong><b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></strong><span> $Transaction_date</span><br>
			<!--<strong><b>Order Type :</b></strong> $Order_type<br><br>-->
			<strong><b>Outlet &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></strong> $Outlet_name<br>
			<!--<strong><b>Order No :</b></strong> $Orderno<br><br>-->
			<strong><b>Bill No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></strong> $Bill_no<br><br>
		
			<strong><h2 style="text-align: left;"><b>Bill Total &nbsp;&nbsp;&nbsp;&nbsp;: </b><span style="font-weight: normal; font-size: 17px;"> $Symbol_currency $Bill_amount</span></h2></strong>
			<!--<strong><h3 style="text-align: left;"><b>$Company_Currency Earned : </b><strong style="font-weight: normal; color: var(--green);"> $total_loyalty_points</strong></h3></strong>-->
		</P>
		<?php
		if($Gift_card_array !=Null)
		{ 
			foreach($Gift_card_array as $row) { ?>
		<hr>
		<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
			<!--<strong><b>Total Due :</b></strong> $Symbol_of_currency $grand_total<br><br>-->
			<strong><b>Gift Card No. &nbsp;&nbsp;&nbsp;:</b></strong> <?php echo $row['GiftCardNo']; ?><br>
			<strong><b>Card Amount&nbsp;&nbsp;&nbsp;&nbsp;:</b></strong> $Symbol_currency <?php echo number_format($row['Item_Rate'],2); ?><br>
			<strong><b>Valid Till&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></strong> <?php echo $row['Valid_till']; ?><br>
		</P>
		<?php } 
		} ?>
		<!--<b>Note<span style="color:red"> * </span> : ($vouchers) this discount vouchers are used </b>-->
		</P>
		</td>
		</tr>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		</td>
		</tr>			
			
		</table>	
		</body>
		</html>
<style>
td, th{
		font-size: 13px !IMPORTANT;
	}
@media only screen and (max-width: 616px) {.rimg { max-width: 100%; height: auto; }.rtable{ width: 100% !important; table-layout: fixed; }.rtable tr{ height:auto !important; }}
</style>