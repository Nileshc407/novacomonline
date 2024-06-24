<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>..:: AeroClub ::..</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
</head>
<body>
<main style="padding-bottom: 100px;padding-top: 44px;" class="commonRoundWrapper">
    <div class="BoxHldr" style="position: relative;background-color: #fff;height: auto;border-radius: 50px 50px 0px 0px;margin-top: -60px;padding-top: 50px;">
        <div style="width: 100%;padding-right: 15px;padding-left: 15px;">
            <div style="position: relative;margin: 0;padding: 0 10px;">
                <h2 style="font-size: 20px;padding-bottom: 15px;font-family: 'Poppins', sans-serif;margin: 0;color: #2F296D;font-weight: 700;">Dear $First_name,</h2>
                <div style="font-size: 14px;padding-bottom: 15px;color: #999999;">Thank you for visiting our restaurant. Your Bill details:</div>
                <ul style="position: relative;margin: 0;padding: 0;color: #000;list-style:none;">
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Date:</span> $Transaction_date</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Order Type:</span> $Order_type</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Outlet:</span> $delivery_outlet</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Order No:</span> $Orderno</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Bill No:</span> $POS_bill_no</li>
                </ul>
                <div style="font-size: 20px;padding: 10px 0;"><b>Order Total:</b> $Symbol_of_currency $subtotal</div>
                <div style="font-size: 20px;padding: 10px 0;color: #2F296D !important;"><b>$Company_Currency Earned:</b> $total_loyalty_points</div>
            </div>
            <hr style="border-top: 1px solid rgba(0, 0, 0, .1);margin-top: 1rem;margin-bottom: 1rem;">
            <div style="position: relative;margin: 0;padding: 0 10px;">
                <ul style="position: relative;margin: 0;padding: 0;color: #000;list-style: none;">
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Total Due:</span> $Symbol_of_currency $grand_total</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Discount: </span> $Symbol_of_currency $discountVal</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Redeem ($Cust_wish_redeem_point) $Company_Currency:</span> $Symbol_of_currency $EquiRedeem</li>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;"><span style="font-family: 'Poppins', sans-serif;margin-right: 8px;font-weight: 600;">Current $Company_Currency balance:</span> $Current_point_balance</li>
					<?php if($vouchers != Null) { ?>
                    <li style="margin: 0 0 10px 0;padding: 0;display: flex;width: 100%;color: #DB1E34 !important;">Note*: ($vouchers) this discount vouchers are used</li>
					<?php } ?>
                </ul>
            </div>
        </div>
    </div>
</main>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>