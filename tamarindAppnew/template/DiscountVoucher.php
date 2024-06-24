<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
	<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	<title>Discount Voucher</title>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Lato', sans-serif;background: linear-gradient(200.05deg, #943F4F 16.68%, #382638 73.29%), #E7ECF2;overflow-x: hidden;font-size: 15px;color: #030303;margin: 0px;">

	<div>
		<header style="text-align: center;">
			<img style="width: 160px;margin: 20px 0 10px 0;" src="$Logo" alt="">
		</header><br>
		<div style="background: #FEFDF8;border-radius: 36px 36px 0 0; min-height: 450px;">
			<div style="padding: 40px 25px 25px;">
				<h2 style="font-weight: 900; color: #030303; font-size: 20px; margin: 0 0 20px 0;">Discount Voucher</h2>
				<h3 style="font-weight: 700; color: #030303; font-size: 20px; margin: 0 0 15px 0;">Dear $Customer_name,</h3>
				<p style="font-weight: 600; font-size: 14px; margin:0 0 18px 0; color: #86869d; line-height: 24px;">Congratulations !!!<br> You have recieved discount voucher<br> $Voucher_no of 
				<?php if($Reward_percent > 0){ ?>
					$Reward_percent (%)
				<?php } else { ?>
					worth $currency  $reward_amt
				<?php } ?>				
				</p>
				<p style="font-weight: 600; font-size: 14px; margin:0 0 18px 0; color: #86869d; line-height: 24px;">The voucher is valid upto $Valid_till.</p>
			</div>
		</div>
	</div>

</body>
</html>