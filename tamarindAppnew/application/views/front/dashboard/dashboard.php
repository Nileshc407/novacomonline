<?php
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu'); 
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);

if($Current_point_balance<0){
	$Current_point_balance=0;
}else{
	$Current_point_balance=$Current_point_balance;
}

$Photograph=$Enroll_details->Photograph;
if($Photograph=="")
{
	$Photograph=base_url()."assets/images/profile.jpg";
	
} else {
	
	$Photograph=$this->config->item('base_url2').$Photograph;
}

$Member_based_redeem_flag = $Company_Details->Member_based_redeem_flag;
?>
<div class="custom-body">
	<div class="container">
	   <div class="profile-box">
		  <div class="dashboard-logo">
			 <img src="<?php echo base_url()."assets/images/logo.svg"; ?>" alt=""/>
		  </div>
	   </div>
	</div>
	<div class="qrcode-card qrcode-main">
	   <h2><?php echo ucwords($Enroll_details->First_name).' '.ucwords($Enroll_details->Last_name); ?></h2>
	   <div class="point">
		  <span><b id="CP_balance"><?php echo $Current_point_balance; ?></b> <?php echo $Company_Details->Currency_name; ?></span>
	   </div>
	   <!--<img src="<?php //echo base_url().'qr_code_profiles/'.$Enroll_details->Enrollement_id.'_'.$Enroll_details->Card_id. '.png'; ?>" alt="">-->
	   <div class="submit-field">
			<a href="<?php echo base_url().'index.php/Cust_home/Generate_code?flag=1'; ?>"><button type="button" class="submit-btn">Earn Code</button></a>
		</div> 
		<div class="submit-field">
		<?php if($Member_based_redeem_flag == 1) { ?>
			<a href="<?php echo base_url().'index.php/Cust_home/Generate_redeem_code'; ?>"><button type="button" class="submit-btn">Redeem Code</button></a>
			<?php } else { ?>
			<a href="<?php echo base_url().'index.php/Cust_home/Generate_code?flag=2'; ?>"><button type="button" class="submit-btn">Redeem Code</button></a>
			<?php } ?>
		</div>
	</div>
	<div class="main-nav">
	   <ul>
		  <li class="parent-item">
			 <a href="<?php echo base_url(); ?>index.php/Cust_home/Current_offers">
				<span class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="38" height="38" viewBox="0 0 38 38">
					  <image id="tag" width="38" height="38" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAmCAYAAACoPemuAAADTElEQVRYhc3YaUgUYRgH8L+77qqlZiUEHSpGpmVbqdUH71Y7IIjUSC1L+lgmWkZmZSVGCaLkEhiESIfYBX2JTjvMILRD1wyP2tKV1UjL0NzL3Y0ZUlxndmZ2d8x5vizLvPO+P5555pl3xqWru/8cgDwAUggjDABKCdgYALFAUONhEAkQRYRUJAAEbcwYrKf7O548bEJ/36BwYO+aOnD2ZBW6OtUoyLtMi5sR2MjwKPJPZeBAdhIiNgSjtUVFGePK12JGwxhqa+rwul4J7aje5jiPWW6ITwhDdNxqKJs/421jO7Ztj6SMI9qFxVmUXm/EhaJr5KJ7Mjdjjo+nzbFDv4ZRqbgHi8UCjWYAWTkpCIsIooxzOmPjKJ95XjiUmwyRiFodqi8adLarsSI0AAa9EVqtHn2aQVRU5mK+rzftvE7BuKA6O9Q4X3QVwSH+qL5yH7M9PZC0Mxa3ap7ZRMGZ4ueCIqKtVYV4eTiZNZ+5niQqTh7GOr9DMK4oIohM1T//gMhoGXleyMoATmvYDbMHRQQBOZKfBi9vDxwv3IvApQv5hzGhjuZcYsTtSIlF0PIlnNfiDGPL1DdVH+dFeYPZe/n4CNZ2QYfS6Qx49aIFYrEIUbEySKWSifEGgxENL5Uwmcxkd3d3p+4/fw+NkM2YKRhhtjJVVlJL/hKLN7/vwuFjqRPnKMrv4M+IDhKJGI1vPuHEmX1Wc5rNZlyvfoTIGJljMKbL91GpQtWNAui0BuQcvGh1XlvrV5QpssmMZKYVU1CK8rvkszQ1XW4/jK2mQmWBZNZMYyasWbvM+tiqQFSU3Yarq5gcNxU19HMY+YUZkEiZq4hylNglsBU6cekm19jkyMpNtqoxOpSbm4QyJyusoV4JCyyMdx9R0Ilb1tEeI26EjYnhE/8dQYGuXSxa7Etue3vVPzhNwBSOomhhQcF+SN2dQG59CSDXmPqocQYFpo3i4weNuFlTh9PF++Hnv8CuSZ1Fganzb9q6HrvS5XZnjg8UI8wRHF8oVpg9OD5RnGBccHyjOMOYcNOBsgtGh5suFBx9ryRaSe2Np2QbcYEL7yiHYUR0tPdA0zuAqBgZ6wP5v8KmOwT9fcwkAMfUID91lvz7ICuUMAIo/QsDH+epinbjrAAAAABJRU5ErkJggg=="/>
					</svg>
				</span>
				Current Offers
			 </a>
		  </li>
		  <li class="parent-item">
			 <a href="<?php echo base_url(); ?>index.php/Cust_home/MerchantCommunication">
				<span class="icon">
					<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="38" height="38" fill="#bbbbff"/>
					<path d="M19.5143 21.7874L19.5143 21.7874C19.6536 21.7778 19.793 21.8045 19.9189 21.8648C20.0448 21.9252 20.1529 22.0172 20.2326 22.1319L19.5143 21.7874ZM19.5143 21.7874L19.5111 21.7877M19.5143 21.7874L19.5111 21.7877M19.5111 21.7877C19.3457 21.7999 19.1783 21.8061 19.009 21.8061C18.8039 21.8061 18.6004 21.7967 18.3986 21.7789C17.4036 21.6907 16.4393 21.3885 15.5719 20.8929C14.7051 20.3977 13.9554 19.721 13.3742 18.9093M19.5111 21.7877L13.3742 18.9093M13.3742 18.9093C13.296 18.799 13.1914 18.7101 13.0698 18.6508C12.9469 18.5909 12.8109 18.5631 12.6743 18.5702C12.5378 18.5772 12.4053 18.6189 12.2893 18.6911L12.2893 18.6911C12.1733 18.7634 12.0776 18.864 12.0111 18.9834L12.011 18.9836L8.91721 24.5438L8.91719 24.5438L8.91523 24.5473C8.71368 24.9151 8.65187 25.4163 8.91369 25.8584L8.91356 25.8585L8.92079 25.8701C9.04237 26.0657 9.21173 26.227 9.41292 26.339C9.61411 26.451 9.84049 26.5099 10.0707 26.5102H10.0715H13.4231H13.4348L13.4465 26.5097C13.4504 26.5096 13.4542 26.5105 13.4576 26.5123C13.4607 26.514 13.4634 26.5165 13.4654 26.5194L15.1225 29.2914C15.1229 29.2921 15.1233 29.2927 15.1236 29.2934C15.2396 29.4893 15.4038 29.6523 15.6006 29.7668C15.7981 29.8817 16.0218 29.944 16.2503 29.9476L16.2729 29.9479L16.2955 29.9467C16.7635 29.9207 17.2503 29.631 17.4636 29.1639L17.4638 29.1634L20.3045 22.9265L20.3051 22.9251C20.3627 22.7979 20.3862 22.6579 20.3735 22.5189L20.3735 22.5189C20.3608 22.3799 20.3123 22.2465 20.2326 22.1319L13.3742 18.9093Z" stroke="#302F64" stroke-width="1.27"/>
					<path d="M20.8423 22.0036L19.2594 25.4865C19.2592 25.4869 19.259 25.4873 19.2588 25.4877C19.2007 25.6149 19.1707 25.7531 19.1707 25.8929C19.1707 26.0328 19.2007 26.171 19.2589 26.2982C19.259 26.2985 19.2592 26.2989 19.2594 26.2993L20.5588 29.1579C20.5589 29.1581 20.559 29.1584 20.5591 29.1586C20.5591 29.1586 20.5592 29.1587 20.5592 29.1587C20.7691 29.6214 21.2522 29.92 21.7259 29.9464L21.7513 29.9478L21.7768 29.9471C22.0052 29.9415 22.2283 29.8774 22.4248 29.7609C22.62 29.6452 22.7825 29.4817 22.8969 29.2859L24.5488 26.5171C24.5541 26.5147 24.5687 26.5097 24.5942 26.5098L24.5942 26.5098H24.5976H27.9822C28.2383 26.5098 28.4967 26.4418 28.7205 26.2834C28.9446 26.1248 29.0967 25.9022 29.1832 25.6548L29.1838 25.6528C29.2483 25.4665 29.2716 25.2683 29.252 25.072C29.2327 24.879 29.1725 24.6924 29.0753 24.5246L26.0051 18.9805L26.0051 18.9805L26.0028 18.9763C25.9361 18.8581 25.8407 18.7586 25.7254 18.687C25.61 18.6154 25.4785 18.5741 25.3429 18.5668C25.2074 18.5596 25.0722 18.5867 24.9499 18.6456C24.8276 18.7044 24.7221 18.7932 24.6432 18.9037L24.6432 18.9038C23.8689 19.9886 22.7989 20.8279 21.5609 21.3216C21.2432 21.4472 20.9862 21.6906 20.8435 22.0011L20.8435 22.0011L20.8423 22.0036Z" stroke="#302F64" stroke-width="1.27"/>
					<path d="M19.0112 17.5725C20.5011 17.5725 21.7091 16.3649 21.7091 14.875C21.7091 13.3851 20.5011 12.1775 19.0112 12.1775C17.5213 12.1775 16.3132 13.3851 16.3132 14.875C16.3132 16.3649 17.5213 17.5725 19.0112 17.5725Z" stroke="#302F64" stroke-width="1.27"/>
					<path d="M17.4538 17.2052C17.9146 17.5131 18.4564 17.6775 19.0106 17.6775L17.4538 17.2052ZM17.4538 17.2052C16.9929 16.8973 16.6337 16.4596 16.4216 15.9475M17.4538 17.2052L16.4216 15.9475M16.4216 15.9475C16.2095 15.4354 16.154 14.8719 16.2621 14.3283M16.4216 15.9475L16.2621 14.3283M16.2621 14.3283C16.3702 13.7846 16.6371 13.2853 17.0291 12.8933M16.2621 14.3283L17.0291 12.8933M17.0291 12.8933C17.421 12.5014 17.9204 12.2345 18.464 12.1263M17.0291 12.8933L18.464 12.1263M18.464 12.1263C19.0076 12.0182 19.5711 12.0737 20.0832 12.2858M18.464 12.1263L20.0832 12.2858M20.0832 12.2858C20.5953 12.4979 21.033 12.8571 21.3409 13.318M20.0832 12.2858L21.3409 13.318M21.3409 13.318C21.6489 13.7789 21.8132 14.3207 21.8132 14.8749L21.3409 13.318ZM20.9912 16.8554C21.5165 16.3301 21.8121 15.6179 21.8132 14.875L20.9912 16.8554ZM20.9912 16.8554C20.4658 17.3807 19.7537 17.6764 19.0107 17.6775L20.9912 16.8554ZM19.0107 8.0525C15.2474 8.0525 12.1882 11.1122 12.1882 14.875C12.1882 18.6379 15.2488 21.6975 19.0107 21.6975C22.7727 21.6975 25.8332 18.6374 25.8332 14.875C25.8332 11.1126 22.7736 8.0525 19.0107 8.0525Z" stroke="#302F64" stroke-width="1.27"/>
					</svg>
				</span>
				Membership Benefits
			 </a>
		  </li>
		  <li class="parent-item">
			 <a href="<?php echo base_url(); ?>index.php/Cust_home/mailbox">
				<span class="icon">
					<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="38" height="38" fill="#F8E0A4"/>
					<path d="M14.7297 20.0289V20.0297L14.7387 20.0281C15.0792 19.9662 15.2941 19.6566 15.2635 19.3196L15.2634 19.3196C15.2629 19.3141 15.2619 19.3046 15.2603 19.2914C15.2453 19.1593 15.1878 18.6546 15.2563 18.063C15.3341 17.3911 15.5733 16.6351 16.2083 16.2348L16.2083 16.2349L16.2094 16.2341C16.4878 16.0485 16.5799 15.6773 16.3953 15.3697L16.3954 15.3697L16.3941 15.3677C16.2084 15.0893 15.8372 14.9972 15.5296 15.1817L15.5296 15.1817L15.5286 15.1823C14.5427 15.8058 14.1687 16.8624 14.0397 17.7691C13.9751 18.2231 13.9715 18.6417 13.9841 18.9538C13.9904 19.1099 14.0007 19.2395 14.0094 19.3336C14.0132 19.375 14.0168 19.4095 14.0195 19.4363C14.0199 19.4399 14.0202 19.4434 14.0206 19.4467L14.0239 19.4806L14.0248 19.4909L14.0249 19.4939C14.025 19.4945 14.025 19.4948 14.025 19.4949H14.024L14.0259 19.5047C14.0875 19.8124 14.3639 20.0289 14.6443 20.0289H14.6445H14.6447H14.6448H14.645H14.6452H14.6453H14.6455H14.6457H14.6458H14.646H14.6462H14.6463H14.6465H14.6467H14.6468H14.647H14.6472H14.6473H14.6475H14.6477H14.6478H14.648H14.6482H14.6483H14.6485H14.6487H14.6488H14.649H14.6492H14.6493H14.6495H14.6497H14.6498H14.65H14.6502H14.6503H14.6505H14.6507H14.6508H14.651H14.6512H14.6513H14.6515H14.6517H14.6518H14.652H14.6522H14.6523H14.6525H14.6527H14.6528H14.653H14.6532H14.6533H14.6535H14.6537H14.6538H14.654H14.6542H14.6543H14.6545H14.6547H14.6548H14.655H14.6552H14.6553H14.6555H14.6557H14.6558H14.656H14.6562H14.6563H14.6565H14.6567H14.6568H14.657H14.6572H14.6573H14.6575H14.6577H14.6578H14.658H14.6582H14.6583H14.6585H14.6587H14.6588H14.659H14.6592H14.6593H14.6595H14.6597H14.6598H14.66H14.6602H14.6603H14.6605H14.6607H14.6609H14.661H14.6612H14.6614H14.6615H14.6617H14.6619H14.662H14.6622H14.6624H14.6625H14.6627H14.6629H14.663H14.6632H14.6634H14.6635H14.6637H14.6639H14.664H14.6642H14.6644H14.6645H14.6647H14.6649H14.665H14.6652H14.6654H14.6655H14.6657H14.6659H14.666H14.6662H14.6664H14.6665H14.6667H14.6669H14.667H14.6672H14.6674H14.6675H14.6677H14.6679H14.668H14.6682H14.6684H14.6685H14.6687H14.6689H14.669H14.6692H14.6694H14.6695H14.6697H14.6699H14.67H14.6702H14.6704H14.6705H14.6707H14.6709H14.671H14.6712H14.6714H14.6715H14.6717H14.6719H14.672H14.6722H14.6724H14.6725H14.6727H14.6729H14.673H14.6732H14.6734H14.6735H14.6737H14.6739H14.674H14.6742H14.6744H14.6745H14.6747H14.6749H14.675H14.6752H14.6754H14.6755H14.6757H14.6759H14.676H14.6762H14.6764H14.6765H14.6767H14.6769H14.677H14.6772H14.6774H14.6775H14.6777H14.6779H14.678H14.6782H14.6784H14.6785H14.6787H14.6789H14.679H14.6792H14.6794H14.6795H14.6797H14.6799H14.68H14.6802H14.6804H14.6805H14.6807H14.6809H14.681H14.6812H14.6814H14.6815H14.6817H14.6819H14.682H14.6822H14.6824H14.6825H14.6827H14.6829H14.683H14.6832H14.6834H14.6835H14.6837H14.6839H14.684H14.6842H14.6844H14.6845H14.6847H14.6849H14.685H14.6852H14.6854H14.6855H14.6857H14.6859H14.686H14.6862H14.6864H14.6865H14.6867H14.6869H14.687H14.6872H14.6874H14.6875H14.6877H14.6879H14.688H14.6882H14.6884H14.6885H14.6887H14.6889H14.689H14.6892H14.6894H14.6895H14.6897H14.6899H14.69H14.6902H14.6904H14.6905H14.6907H14.6909H14.691H14.6912H14.6914H14.6915H14.6917H14.6919H14.692H14.6922H14.6924H14.6925H14.6927H14.6929H14.693H14.6932H14.6934H14.6935H14.6937H14.6939H14.694H14.6942H14.6944H14.6945H14.6947H14.6949H14.695H14.6952H14.6954H14.6955H14.6957H14.6959H14.696H14.6962H14.6964H14.6965H14.6967H14.6969H14.697H14.6972H14.6974H14.6975H14.6977H14.6979H14.698H14.6982H14.6984H14.6985H14.6987H14.6989H14.699H14.6992H14.6994H14.6995H14.6997H14.6999H14.7H14.7002H14.7004H14.7006H14.7007H14.7009H14.7011H14.7012H14.7014H14.7016H14.7017H14.7019H14.7021H14.7022H14.7024H14.7026H14.7027H14.7029H14.7031H14.7032H14.7034H14.7036H14.7037H14.7039H14.7041H14.7042H14.7044H14.7046H14.7047H14.7049H14.7051H14.7052H14.7054H14.7056H14.7057H14.7059H14.7061H14.7062H14.7064H14.7066H14.7067H14.7069H14.7071H14.7072H14.7074H14.7076H14.7077H14.7079H14.7081H14.7082H14.7084H14.7086H14.7087H14.7089H14.7091H14.7092H14.7094H14.7096H14.7097H14.7099H14.7101H14.7102H14.7104H14.7106H14.7107H14.7109H14.7111H14.7112H14.7114H14.7116H14.7117H14.7119H14.7121H14.7122H14.7124H14.7126H14.7127H14.7129H14.7131H14.7132H14.7134H14.7136H14.7137H14.7139H14.7141H14.7142H14.7144H14.7146H14.7147H14.7149H14.7151H14.7152H14.7154H14.7156H14.7157H14.7159H14.7161H14.7162H14.7164H14.7166H14.7167H14.7169H14.7171H14.7172H14.7174H14.7176H14.7177H14.7179H14.7181H14.7182H14.7184H14.7186H14.7187H14.7189H14.7191H14.7192H14.7194H14.7196H14.7197H14.7199H14.7201H14.7202H14.7204H14.7206H14.7207H14.7209H14.7211H14.7212H14.7214H14.7216H14.7217H14.7219H14.7221H14.7222H14.7224H14.7226H14.7227H14.7229H14.7231H14.7232H14.7234H14.7236H14.7237H14.7239H14.7241H14.7242H14.7244H14.7246H14.7247H14.7249H14.7251H14.7252H14.7254H14.7256H14.7257H14.7259H14.7261H14.7262H14.7264H14.7266H14.7267H14.7269H14.7271H14.7272H14.7274H14.7276H14.7277H14.7279H14.7281H14.7282H14.7284H14.7286H14.7287H14.7289H14.7291H14.7292H14.7294H14.7296H14.7297Z" fill="#302F64" stroke="#302F64" stroke-width="0.1"/>
					<path d="M29.2984 24.4199C29.2984 22.9581 28.1645 21.7504 26.7362 21.6678V18.413C26.7362 14.9305 24.4611 11.9599 21.3272 10.9462V10.2995C21.3272 9.01923 20.2799 7.97197 18.9997 7.97197C17.7195 7.97197 16.6722 9.01923 16.6722 10.2995V10.9462C13.5384 11.9597 11.2632 14.902 11.2632 18.413V21.6687C9.836 21.7782 8.70098 22.9569 8.70098 24.4199C8.70098 25.9279 9.94751 27.1744 11.4555 27.1744H16.2452V27.2952C16.2452 28.8032 17.4917 30.0498 18.9997 30.0498C20.5077 30.0498 21.7542 28.8032 21.7542 27.2952V27.1744H26.5439C28.0519 27.1744 29.2984 25.9279 29.2984 24.4199ZM17.9109 10.2995C17.9109 9.70077 18.401 9.21072 18.9997 9.21072C19.5984 9.21072 20.0884 9.70077 20.0884 10.2995V10.64C19.7349 10.5884 19.3801 10.5626 18.9997 10.5626C18.6193 10.5626 18.2645 10.5884 17.9109 10.64V10.2995ZM18.9997 11.8298C22.5869 11.8298 25.4975 14.7959 25.4975 18.413V21.6654H12.5019V18.413C12.5019 14.7676 15.4123 11.8298 18.9997 11.8298ZM20.5155 27.2952C20.5155 28.1217 19.8261 28.811 18.9997 28.811C18.1732 28.811 17.4839 28.1217 17.4839 27.2952V27.1744H20.5155V27.2952ZM26.5439 25.9072H11.4555C10.6291 25.9072 9.93972 25.2179 9.93972 24.3914C9.93972 23.565 10.6291 22.8757 11.4555 22.8757H26.5439C27.3703 22.8757 28.0597 23.565 28.0597 24.3914C28.0597 25.2179 27.3703 25.9072 26.5439 25.9072Z" fill="#302F64" stroke="#302F64" stroke-width="0.1"/>
					</svg>
				</span>
				Notification
			 </a>
		  </li>
		  <li class="parent-item">
			 <a href="<?php echo base_url(); ?>index.php/Cust_home/statement">
				<span class="icon">
					<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="38" height="38" fill="#D8D1E5"/>
					<path d="M27.2004 14.0505L27.2004 14.0505L27.1982 14.0481L22.0534 8.65113C22.0533 8.6511 22.0533 8.65107 22.0533 8.65104C21.9403 8.5321 21.7835 8.45859 21.6178 8.45859H13.4715C11.9133 8.45859 10.6275 9.73898 10.6275 11.2975V26.702C10.6275 28.2607 11.9133 29.5411 13.4715 29.5411H24.5281C26.0863 29.5411 27.372 28.2607 27.372 26.702V14.4702C27.372 14.3087 27.2981 14.1599 27.2004 14.0505ZM22.2271 12.7553V10.5891L25.3389 13.8557H23.3327C22.7216 13.8557 22.2271 13.3653 22.2271 12.7553ZM24.5281 28.3323H13.4715C12.583 28.3323 11.8364 27.5947 11.8364 26.702V11.2975C11.8364 10.4097 12.5783 9.66741 13.4715 9.66741H21.0183V12.7553C21.0183 14.0364 22.0521 15.0646 23.3327 15.0646H26.1632V26.702C26.1632 27.5949 25.4215 28.3323 24.5281 28.3323Z" fill="#302F64" stroke="#302F64" stroke-width="0.2"/>
					<path d="M23.1497 24.8521H14.8472C14.5146 24.8521 14.2428 25.1238 14.2428 25.4566C14.2428 25.7892 14.5146 26.061 14.8472 26.061H23.1548C23.4874 26.061 23.7592 25.7892 23.7592 25.4566C23.7592 25.1231 23.4867 24.8521 23.1497 24.8521Z" fill="#302F64" stroke="#302F64" stroke-width="0.2"/>
					<path d="M19.0807 21.1974C18.6231 21.1974 18.2429 20.8074 18.2429 20.321C18.2429 20.0597 18.0371 19.8396 17.7765 19.8396C17.5161 19.8396 17.3102 20.0597 17.3102 20.321C17.3102 21.1537 17.8455 21.8576 18.5777 22.0859V22.3767C18.5777 22.6379 18.7836 22.8582 19.044 22.8582C19.3046 22.8582 19.5104 22.6379 19.5104 22.3767V22.1089C20.2838 21.908 20.8513 21.1803 20.8513 20.3247C20.8513 19.3121 20.059 18.4855 19.0807 18.4855C18.6231 18.4855 18.2429 18.0956 18.2429 17.6093C18.2429 17.1228 18.6231 16.7329 19.0807 16.7329C19.5383 16.7329 19.9186 17.1228 19.9186 17.6093C19.9186 17.8704 20.1243 18.0907 20.3849 18.0907C20.6454 18.0907 20.8513 17.8704 20.8513 17.6093C20.8513 16.7498 20.2803 16.0259 19.5104 15.8252V15.6221C19.5104 15.361 19.3046 15.1407 19.044 15.1407C18.7836 15.1407 18.5777 15.361 18.5777 15.6221V15.8362C17.8415 16.0613 17.3102 16.7695 17.3102 17.6015C17.3102 18.6143 18.1023 19.4407 19.0807 19.4407C19.5383 19.4407 19.9186 19.8308 19.9186 20.3171C19.9186 20.8076 19.538 21.1974 19.0807 21.1974Z" fill="#302F64" stroke="#302F64" stroke-width="0.2"/>
					</svg>
				</span>
				My Statement
			 </a>
		  </li>
	   </ul>
	</div>
 </div>
<?php $this->load->view('front/header/footer');  ?>
<div class="modal" tabindex="-1" role="dialog" id="myModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<div class="container">
			<div class="profile-box">
				<br>
				  <div class="dashboard-logo">
					 <img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="">
				  </div>
			</div>
		</div>		
      </div>
      <div class="modal-body">
		<div id="cover-caption">
				<div class="container">
					<div class="row text-white">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
							<!--<h5 class="display-4 py-2 text-truncate">Enter validation code</h5>-->
							<div class="px-2">
								<form name="change-password" action="" method="POST" onsubmit="return passwordValidation()" id="SubmitForm" class="justify-content-center">
									<div class="form-group">
										
										<input type="text" name="Validate_code" id="Validate_code" class="form-control" style="color:#fff;text-transform: uppercase;background: transparent;" placeholder="Enter Validation Code">
									</div>	
										<input type="submit" value="SUBMIT"  name="VERIFY" id="Verify" class="btn btn-primary btn-lg" style="background-color: var(--primary);box-shadow:none;">
										
										<div class="form-group">										
											<span class="required error" id="Validate_code-info"></span>										
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
      </div>
     
    </div>
  </div>
</div>
<style>
.modal-dialog-full-width {
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width:none !important;

    }

    .modal-content-full-width  {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ececec !important 
    }

    .modal-header-full-width  {
        border-bottom: 1px solid #9ea2a2 !important;
    }

    .modal-footer-full-width  {
        border-top: 1px solid #9ea2a2 !important;
    }

.modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
  background: linear-gradient(200.05deg, #943F4F 16.68%, #382638 73.29%), #E7ECF2;
}
.display-4{
	font-size: 1.5rem !IMPORTANT;
}
.modal-header{
	border-bottom: none !IMPORTANT;
}
</style>
<script type="text/javascript">
	var Verification_code = <?php echo $Verification_code; ?>;
	
    if(Verification_code <= 0 ){
		
		// console.log("----Verification_code-----+"+Verification_code);
		$(window).on('load',function(){
        $('#myModal').modal('show');
		});
	}
	/* 27-01-2028 */
	function load_current_point_balance(){	
		$.ajax({
				type: 'post',
				 url: "<?php echo base_url()?>index.php/Cust_home/get_current_point_balance/",
				data: { },
				success: function (data) {
				  // console.log('form was submitted'+data);
				  
				  var dataObj = JSON.parse(data);
				  
				  /*  console.log('---dataObj----'+dataObj.status);
				   console.log('---dataObj----'+dataObj.Current_balance); */
				   
				   $("#CP_balance").html(dataObj.Current_balance);  
				}
		  });
	}
	//load_current_point_balance(); // This will run on page load
	setInterval(function(){
		load_current_point_balance() // this will run after every 5 seconds
	}, 5000);
	
	/* 27-01-2028 */
	
	$(function () {

        $('form').on('submit', function (e) {
			
			var valid = true;
			var Validate_code = $("#Validate_code").val();			
			if (Validate_code.trim() == "") {
				// $("#Validate_code-info").html("Enter Verification Code").css("color", "#fff").show();
				$("#Validate_code").addClass("error-field");
				valid = false;
			}
			if (valid == false) {
				$('.error-field').first().focus();
				valid = false;
			}
			if (valid == true){
					
				/* console.log("submit form "); */
				  e.preventDefault();
				  $.ajax({
						type: 'post',
						 url: "<?php echo base_url()?>index.php/Cust_home/validate_code/",
						data: { ValidateCode: Validate_code },
						success: function (data) {
						  // console.log('form was submitted'+data);
						  
						  var dataObj = JSON.parse(data);
						  
						   //console.log('---dataObj----'+dataObj.status);
						   //console.log('---dataObj----'+dataObj.Message);
						   
						  if(dataObj.status=='1030'){
							  
							  
							 $("#Validate_code-info").html(dataObj.Message).css("color", "#fff").show();
								$("#Validate_code").addClass("error-field");
					
							  //console.log('----1111-----'+dataObj.Message);
							  
							  setTimeout(function(){
								$("#Validate_code-info").html("").hide();
							}, 3000);
							  
						  } else if(dataObj.status=='1027'){
							  
							  // console.log('----222-----'+dataObj.Message);
							   
							   $("#Validate_code-info").html(dataObj.Message).css("color", "#fff").show();
								$("#Validate_code").addClass("error-field");
							
								 setTimeout(function(){
									$("#Validate_code-info").html("").hide();
								}, 2000);
							
								setTimeout(function(){
								   window.location.reload(1);
								}, 3000);
							
							
							   
						  } else if(dataObj.status=='1030'){
							   //console.log('----1028-----'+dataObj.Message);
								$("#Validate_code-info").html(dataObj.Message).css("color", "#fff").show();
								$("#Validate_code").addClass("error-field");
								
								 setTimeout(function(){
								$("#Validate_code-info").html("").hide();
							}, 3000);
							  
						  } else if(dataObj.status=='1029'){
							   //console.log('----4444-----'+dataObj.Message);
							   
							   
								$("#Validate_code-info").html(dataObj.Message).css("color", "#fff").show();
								$("#Validate_code").addClass("error-field");
								
								 setTimeout(function(){
								$("#Validate_code-info").html("").hide();
							}, 3000);
							  
						  }
						}
				  });
			}
        });
      });
	function passwordValidation() {		
		var valid = true;

		/* $("#current-password").removeClass("error-field");
		$("#new-password").removeClass("error-field");
		$("#confirm-new-password").removeClass("error-field"); */

		var Validate_code = $("#Validate_code").val();
		/* var newpassword = $("#new-password").val();
		var confirmnewpassword = $("#confirm-new-password").val(); */
		
		
		/*  $("#current-password-info").html("").hide();
		$("#new-password-info").html("").hide(); 
		$("#confirm-new-password-info").html("").hide(); 
		 */
		
				
		if (Validate_code.trim() == "") {
			// $("#Validate_code-info").html("Enter Verification Code").css("color", "#ee0000").show();
			$("#Validate_code").addClass("error-field");
			valid = false;
		}
		if (valid == false) {
			$('.error-field').first().focus();
			valid = false;
		}
		return valid;
	}
</script>       