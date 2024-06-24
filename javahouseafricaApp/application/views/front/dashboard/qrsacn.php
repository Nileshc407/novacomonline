<?php 
$this->load->view('front/header/header'); 
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></a></div>
				<div><h1>Feedback</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop commonRoundWrapper feedbackWrapper">
    <div class="BoxHldr marBottom">
		<div class="container">
			<div class="section">
				<div id="my-qr-reader">
				</div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script src="https://unpkg.com/html5-qrcode"></script>
<!--<script>
function domReady(fn) {
    if (
        document.readyState === "complete" ||
        document.readyState === "interactive"
    ) {
        setTimeout(fn, 1000);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}
 
domReady(function () {
 
    function onScanSuccess(decodeText, decodeResult) {
        // alert("You Qr is : " + decodeText, decodeResult);
		window.location.href = decodeText;
    }
    let htmlscanner = new Html5QrcodeScanner(
        "my-qr-reader",
        { fps: 10, qrbos: 250 }
    );
    htmlscanner.render(onScanSuccess);
});
</script>-->
<script>
	function domReady(fn) {
		if (document.readyState === "complete" || document.readyState === "interactive") {
			setTimeout(fn, 1000);
		} else {
			document.addEventListener("DOMContentLoaded", fn);
		}
	}

	domReady(function () {
		function onScanSuccess(decodeText, decodeResult) {
			// alert("Your QR code is: " + decodeText);
			location.replace(decodeText);
		}

		let htmlscanner = new Html5QrcodeScanner("my-qr-reader", { fps: 10, qrbox: 250 });
		htmlscanner.render(onScanSuccess);

		// Handle iOS WKWebView specific events
		document.addEventListener("deviceready", onDeviceReady, false);
		function onDeviceReady() {
			if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.didAllowCameraPermissions) {
				window.webkit.messageHandlers.didAllowCameraPermissions.postMessage(null);
			}
		}
	});
</script>
<style>
.container {
	width: 100%;
}
.section {
	background-color: #f4f4f4;
}

#my-qr-reader {
	 padding: 20px !important;
}

#my-qr-reader img[alt="Info icon"] {
	display: none;
}

#my-qr-reader img[alt="Camera based scan"] {
	width: 100px !important;
	height: 100px !important;
}

button {
	padding: 10px 20px;
	border: 1px solid #b2b2b2;
	outline: none;
	border-radius: 0.25em;
	color: white;
	font-size: 15px;
	cursor: pointer;
	margin-top: 15px;
	margin-bottom: 10px;
	background-color: #d62300;
	transition: 0.3s background-color;
}

button:hover {
	background-color: #d62300;
}

#html5-qrcode-anchor-scan-type-change {
	text-decoration: none !important;
	color: #1d9bf0;
}

video {
	width: 100% !important;
	border: 1px solid #b2b2b2 !important;
	border-radius: 0.25em;
}
</style>