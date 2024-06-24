<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body scroll="auto" style="padding:0; margin:0; FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif; cursor:auto; background:var(--light); height:100% !important; width:100% !important; margin:0; padding:0;">		
<table class="rtable mainTable" cellSpacing=0 cellPadding=0 width="100%" style="height:100% !important; width:100% !important; margin:0; padding:0;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" style="BACKGROUND-COLOR: var(--light);">
	<tr>
		<style>@media only screen and (max-width: 616px) {.rimg { max-width: 100%; height: auto; }.rtable{ width: 100% !important; table-layout: fixed; }.rtable tr{ height:auto !important; }}</style>
	</tr>	
	<tr>
	<td vAlign=top>
		<table style="MARGIN: 0px auto; WIDTH: 616px;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class='rtable' border='0' cellSpacing='0' cellPadding='0' width='616' align='center'>
			<tr>
				<td style="BORDER-BOTTOM: #dbdbdb 1px solid; BORDER-LEFT: #dbdbdb 1px solid; PADDING-BOTTOM: 0px; BACKGROUND-COLOR: var(--light); PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: #dbdbdb 1px solid; BORDER-RIGHT: #dbdbdb 1px solid; PADDING-TOP: 0px">
					<table style="WIDTH: 100%;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class=rtable cellSpacing=0 cellPadding=0 align=left>
						<tr style="HEIGHT: 10px">
							<td style="BORDER-BOTTOM: medium none; TEXT-ALIGN: center; BORDER-LEFT: medium none; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #feffff; PADDING-LEFT: 15px; WIDTH: 100%; PADDING-RIGHT: 15px; VERTICAL-ALIGN: middle; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 5px">
								<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: var(--light); MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #333333; FONT-SIZE: 18px; mso-line-height-rule: exactly" align=center>
								Enrollment Details
								</P>
								<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: var(--light); MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 18px; mso-line-height-rule: exactly" align=left>
									Dear $First_name,
								</P>

								<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: var(--light); MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
								Welcome to $Company_name, We are pleased to have you onboard. <br><br>
								</P>
								<?php if( $User_id==1) 
								{ ?>
								<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: var(--light); MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
								To start using our Website / App, please set your password by clicking the Set Password link below.<br><br>
								</P>
								<?php 
								} else {
								?>
								<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: var(--light); MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
								Earn and Redeem Loyalty points when you purchase at any of our brand outlets<br><br>
								Below are your enrollment details
								<br><br>
								</P>
								<?php } ?>
								<TABLE style="border: #dbdbdb 1px solid; WIDTH: 100%; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class=rtable border=0 cellSpacing=0 cellPadding=0 align=center>
									
									<TR>
										<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
											<b>Name</b>
										</TD>
										<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
										    $Customer_name
										</TD>
									</TR>
									<TR>
										<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
											<b>Login Name</b>
										</TD>
										<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
										    $User_email_id
										</TD>
									</TR>
									
									<TR>
										<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
											<b>Set Password</b>
										</TD>
										<TD style="border: #dbdbdb 1px solid;PADDING-BOTTOM: 4px; PADDING-LEFT: 4px; PADDING-RIGHT: 4px; PADDING-TOP: 4px" align=left> 
										   $Pwdlink
										</TD>
									</TR>								
								</TABLE>	
								<P style="LINE-HEIGHT: 155%; BACKGROUND-COLOR: var(--light); MARGIN-TOP: 0px; FONT-FAMILY: Arial, Helvetica, sans-serif; MARGIN-BOTTOM: 1em; COLOR: #666666; FONT-SIZE: 12px; mso-line-height-rule: exactly" align=left>
								We request that you verify your email address under the profile section of our App to get updates on all our specials offers
								<br><br>
								Thank you <br><br>	
								</P>								
								<br><br>
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
</style>