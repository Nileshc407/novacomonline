<?php 

	$banner_image=$this->config->item('base_url2').'images/redemption.jpg';
	
	$subject = "Redemption Transaction from Merchandizing Catalogue  of our ".$Company_details->Company_name ;
	
	$html = '<html xmlns="http://www.w3.org/1999/xhtml">';
	$html .= '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>';

	$html .= '<body scroll="auto" style="padding:0; margin:0; FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif; cursor:auto; background:#FEFFFF;height:100% !important; width:100% !important; margin:0; padding:0;">';
			
	$html .= '<table class="rtable mainTable" cellSpacing=0 cellPadding=0 width="100%" style="height:100% !important; width:100% !important; margin:0; padding:0;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" bgColor=#feffff>
		<tr>
			<td style="LINE-HEIGHT: 0; HEIGHT: 20px; FONT-SIZE: 0px">&#160;</td>
			<style>@media only screen and (max-width: 616px) {.rimg { max-width: 100%; height: auto; }.rtable{ width: 100% !important; table-layout: fixed; }.rtable tr{ height:auto !important; }}</style>
		</tr>
		
		<tr>
			<td vAlign=top>
				<table style="MARGIN: 0px auto; WIDTH: 616px;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="rtable" border="0" cellSpacing="0" cellPadding="0" width="616" align="center">
					<tr>
						<td style="BORDER-BOTTOM: #dbdbdb 1px solid; BORDER-LEFT: #dbdbdb 1px solid; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: #dbdbdb 1px solid; BORDER-RIGHT: #dbdbdb 1px solid; PADDING-TOP: 0px">
							<table style="WIDTH: 100%;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class=rtable cellSpacing=0 cellPadding=0 align=left>
								<tr style="HEIGHT: 10px">
									<td style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 15px; WIDTH: 100%; PADDING-RIGHT: 15px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 5px">
										<table border=0 cellSpacing=0 cellPadding=0 align=center style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tr>
												<td style="PADDING-BOTTOM: 15px; PADDING-LEFT: 2px; PADDING-RIGHT: 2px; PADDING-TOP: 2px" align=middle>
													<table border=0 cellSpacing=0 cellPadding=0 style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
														<tr>
															<td style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; BACKGROUND-COLOR: transparent; BORDER-TOP: medium none; BORDER-RIGHT: medium none">
																<IMG style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; BACKGROUND-COLOR: transparent; DISPLAY: block; BORDER-TOP: medium none; BORDER-RIGHT: medium none;border:0; outline:none; text-decoration:none;" class=rimg border=0 src='.$banner_image.' width=580 height=200 hspace="0" vspace="0">
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table> 
										
										<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #333333; FONT-SIZE: 18px; mso-line-height-rule: exactly" align=left>
											Dear '.$Full_name.' ,
										</P>';

										$html.='<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
											 Thank You for Redeeming  Item(s)  from our Merchandize Catalogue. Please find below the details of your transaction. <br><br>
											 <strong>Redemption Date:</strong> '.$Trans_date. '<br><br>
										</P>									
							<TABLE style="border: #dbdbdb 1px solid; WIDTH: 100%; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class=rtable border=0 cellSpacing=0 cellPadding=0 align=center>
							';
										
									$i=0;		
									foreach($data["Item_details"] as $item)
									{																
										$Grand_Total_Redeem_points2[]=$item["Total_points"];
										
										$html .= '<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Merchandize item name</b>
												</TD>
													<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
												   '.$item["Merchandize_item_name"].'
													</TD>
											</TR>
																				
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Voucher No</b>
												</TD>
													<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													'.$Voucher_array[$i].'
												</TD>
											</TR>
																				
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Quantity</b>
												</TD>
													<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													'.$item["Quantity"].'
												</TD>
											</TR>
																				
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Total Redeem Points</b>
												</TD>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left>
													'.$item["Total_points"].'
												</TD>
											</TR>
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Branch Name</b>
												</TD>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left>
													'.$item["Branch_name"].'
												</TD>
											</TR><TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Branch Address</b>
												</TD>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left>
													'.$item["Address"].'
												</TD>
											</TR>
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Status</b>
												</TD>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left>
													Issued
												</TD>
											</TR>											
											';
										$i++;
									}
									
										$html .='
											<TR  style="border:#2f3131 2px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px">
												<TD colspan="2" align=left> 
													
												</TD>
													
											</TR>
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Grand Total Points</b>
												</TD>
													<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													'.array_sum($Grand_Total_Redeem_points2).'
												</TD>
											</TR>
																				
											<TR>
												<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													<b>Available Balance</b>
												</TD>
													<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
													'.$Avialable_balance.'
												</TD>
											</TR>';
																
						
										
										$html .= '<br>
										<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
											Regards,
											<br>'.$Company_details->Company_name.' Team.
										</P>
									</td>
								</tr>
							</table>
						</td>
					</tr>';
					
					$html .= '<tr>
						<td style="BORDER-BOTTOM: #dbdbdb 1px solid; BORDER-LEFT: #dbdbdb 1px solid; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: #dbdbdb 1px solid; BORDER-RIGHT: #dbdbdb 1px solid; PADDING-TOP: 0px">
							<table style="WIDTH: 100%;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class=rtable cellSpacing=0 cellPadding=0 align=left>
								<tr style="HEIGHT: 20px">
									<td style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 15px; WIDTH: 100%; PADDING-RIGHT: 15px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 5px">
										<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: transparent; MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #333333; FONT-SIZE: 10px; mso-line-height-rule: exactly" align=left>
											<strong>DISCLAIMER: </strong><em>This e-mail message is proprietary to '.$Company_details->Company_name.' and is intended solely for the use of the entity to whom it is addressed. It may contain privileged or confidential information exempt from disclosure as per applicable law. 
											If you are not the intended recipient or responsible for delivery to the intended recipient,
											you may not copy, deliver, distribute or print this message. The message and its contents have been virus checked. But the recipients may conduct their own. '.$Company_details->Company_name.' will not accept any claims for damages arising out of viruses.<br>
											Thank you for your cooperation.</em>
										</P>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>			
		<tr>
			<td style="LINE-HEIGHT: 0; HEIGHT: 8px; FONT-SIZE: 0px">&#160;</td>
		</tr>
	</table>	
	</table>
	</body>
	</html>
	<style>
	td, th{
	font-size: 13px !IMPORTANT;
	}
	</style>';
					
?>