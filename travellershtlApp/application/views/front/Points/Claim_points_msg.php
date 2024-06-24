<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
?>
<main class="qrCodeWrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url().'index.php/Cust_home/front_home'; ?>"><img src="<?php echo base_url(); ?>assets/img/close-icon1.svg"></a></div>
                <div class="qrCodeHldr">
                    <div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/java-group-icon.svg"></div>
                    <h2><?php echo ($Enroll_details->First_name.' '.$Enroll_details->Last_name); ?></h2>
                    <div class="pointMain"><?php echo $Current_point_balance; ?> <span class="txt"><?php echo $Currency_name; ?></div>
                    <div class="qrCodeMain flex-column">
                        <div class="sucessfully"><?php echo $Message; ?></div>
                        <div class="codeMain"><?php echo $Claimed_points; ?></div>
                        <!--<div class="expiresMain">dkjkjj</div>-->
                    </div>
                </div>
			</div>
		</div>
	</div>
</main>
<?php //$this->load->view('front/header/footer');  ?>
<style>
.qrCodeHldr {
    position: relative;
    background: #fff;
    border-radius: 15px;
    width: 290px;
    min-height: 472px;
    padding: 10px;
    margin: 0px auto 0 auto;
    -webkit-box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 10%);
    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.10);
    box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 10%);
    text-align: center;
}
</style>