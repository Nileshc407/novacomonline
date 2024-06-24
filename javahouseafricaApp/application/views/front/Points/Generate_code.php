<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<main class="qrCodeWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url().'index.php/Cust_home/front_home'; ?>"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg"></a></div>
            </div>
            <div class="col-12">
                <div class="BoxHldr">
                    <div class="text-center mb-3"><img src="<?php echo base_url(); ?>assets/img/logo.svg"></div>
                    <div class="pointMain"><?php echo $Current_point_balance; ?> <?php echo $Currency_name; ?></div>
                   <!-- <div class="pointMain mb-4">0 KES</div>-->
                    <hr>
                    <p class="mt-4"><?php echo $Msg; ?></p>
                    <div class="codeMain"><?php echo $pin; ?></div>
                    <div class="expiresMain">Expires in <?php echo $pin_valid_till; ?> minutes</div>
                </div>
            </div>
        </div>
    </div>
</main>