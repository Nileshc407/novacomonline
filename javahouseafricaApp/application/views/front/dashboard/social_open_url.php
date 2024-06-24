<?php header('Access-Control-Allow-Origin: *');
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu'); 
?>  
 <header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
				<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><img src="<?php echo base_url(); ?>assets/img/java-icon/java-house-logo-big.svg"></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop1 padBottom">
	<div class="container" >		
		<!--<iframe src="<?php echo $url; ?>" target="_top" name="iframe_a" title="Iframe Example" frameborder="0" allowfullscreen>
		
	  
		</iframe>
		<!--<embed type="text/html" src="<?php echo $url; ?>" width="800" height="500">-->

		 
	  <!--- http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';"---->
	 
		
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
        
	<style>	
	
		body {
    margin: 0;            /* Reset default margin */
}
iframe {
    display: block;       /* iframes are inline by default */

    border: none;         /* Reset default border */
    height: 100vh;        /* Viewport-relative units */
    width: 100vw;
}
.container{
	padding: 0 !IMPORTANT;
}
</style>
<script>
	$.ajax('<?php echo $url; ?>',{
		
			type:"get",
			// data:{"fname":"ravi","lname":"phad"},
			// dataType:"text/html",
			contentType: "html",
			crossDomain:true,
			
			success: function(data,status,xhr){
				console.log("data---"+data);
				console.log("status---"+status);
				console.log("xhr---"+xhr);
				console.log("xhr---"+JSON.stringify(xhr));
				
				
				//var data = JSON.parse(data);
				//console.log(data);
				var data2 = JSON.stringify(data);
				console.log(data2);
				
				$(".container").text(data);
				
			},
			error: function(jqXhr, textStatus, errorMessage){
					console.log("jqXhr---"+JSON.stringify(jqXhr));
					console.log("textStatus---"+textStatus);
					console.log("errorMessage---"+errorMessage);
			}
		})
</script>
        