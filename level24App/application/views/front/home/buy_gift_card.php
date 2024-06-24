<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
$ci_object = &get_instance(); 
$ci_object->load->model('Igain_model');
?>

<header>
<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Redeem_history';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Gift Cards</h1></div>
				<div class="leftRight"><button id="sidebarCollapse" onclick="#';" ></button></div>
			</div>
		</div>
	</div>
</header>

<main class="padTop padBottom">
	<div class="container giftCardWrapper">
		<div class="row">
            <div class="col-12">
                <div class="cardMain d-flex align-items-center mb-4 p-4">
					<form class="w-100" method="post" id="SubmitForm" action="<?php echo base_url()?>index.php/Cust_home/CheckoutGiftCard">
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="Gift_card_amt" placeholder="Enter gift card amount <?php echo $Symbol_of_currency; ?>" onkeyup="this.value=this.value.replace(/\D/g,'')" required>
                        </div>
						<div id="Gift_card_amt_div" style="width:225px;"> </div>
						<button class="redBtn w-100 text-center" type="submit">Buy Now</button>
                    </form>
                </div>
            </div>

			<?php if($MyGiftCard !=Null){ 
			foreach($MyGiftCard as $row){
			?>
			<div class="col-12">
				<div class="giftCardHldr">
					<div class="imgMain"><img src="<?php echo base_url(); ?>assets/img/card-img1.jpg"></div>
					<div class="textMain d-flex align-items-center">
						<div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/360-logo.png"></div>
						<div class="textHldr">
							<h2><?php echo $row->Gift_card_id; ?></h2>
							<h2><?php echo date('d-M-Y',strtotime($row->Valid_till)); ?></h2>
							<div class="price redTxt"><?php echo $row->Card_balance.' '.$Symbol_of_currency; ?> </div>
							<!--<a href="#" class="buyBtn w-100">Buy Now</a>-->
						</div>
					</div>
				</div>
            </div>
		<?php } 
		}
		?>

		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>