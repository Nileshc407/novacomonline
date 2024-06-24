<?php $this->load->view('front/header/header'); 
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<main class="qrCodeWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg"></a></div>
                <div class="text-center mt-4 mb-3"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
                <h2><?php echo ($Enroll_details->First_name.' '.$Enroll_details->Last_name); ?></h2>
                <div class="pointMain"><?php echo $Current_point_balance; ?> <?php echo $Currency_name; ?></div>
            </div>
        </div>
    </div>
    <div class="BoxHldr">
        <div class="qrCodeMain">
            <img src="<?php echo base_url(); ?>assets/img/qr-code.svg">
        </div>
        <div class="col-12 mt-5">
            <a href="<?php echo base_url();?>index.php/Cust_home/Generate_code" class="MainBtn w-100 text-center">Generate Code</a>
        </div>
    </div>
</main>
<?php //$this->load->view('front/header/footer'); ?>
