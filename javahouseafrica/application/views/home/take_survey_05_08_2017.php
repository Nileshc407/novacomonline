<html lang="en-US">
<head>
	     
<title>Survey</title>
<meta charset="utf-8">
		 
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="format-detection" content="telephone=no"/>		
		<style>
			body
			{
				height:100%;
				background-color:#FAF2DB;
				overflow:hidden;
			}
			body.preload *{
				visibility: hidden;
			}
			body.transparent-background.resizing *{
				visibility: hidden;
			}

			body.transparent-background {
				background: transparent;
			}

			body.transparent-background #loader{
				background: transparent;
			}

			#loader{
				background-color:#FAF2DB;
				position:absolute;
				position:fixed;
				z-index:999999;
				left:0;
				top:0;
				bottom:0;
				right:0;
				visibility:visible;
			}
			#loader *{
				visibility:visible;
			}

			#loader > .wrapper {
				position: absolute;
				top:50%;
				left:50%;
			}

			#loadingLogo span{
				display: block;
				position: absolute;
				width: 100px;
				top: 50px;
				left: -50px;
				text-align: center;

				font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
				font-size: 11px;
				color: #C9A538;
				-khtml-opacity: 0.6;
				-moz-opacity: 0.6;
				opacity: 0.6;
			}

			#loadingLogo svg{
				position: absolute;
				top: 64px;
				left: -35px;
			}

			#loadingLogo svg path,#loadingLogo svg rect{
				fill:#C9A538;
			}
			@font-face 
			{
			    font-family: 'typeIconFont';
			    src: url('<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/typeform_glyphs.eot');
			    src: url('<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/typeform_glyphs.eot?#iefix') format('embedded-opentype'),
			         url('<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/typeform_glyphs.woff') format('woff'),
			         url('<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/typeform_glyphs.ttf') format('truetype'),
			         url('.svg#typeform_glyphs') format('svg');
			    font-weight: normal;
			    font-style: normal;
			}

		</style>

		
<script type="text/javascript">
 var settings = {
	 browser: "default",
    language: "en",
    paths: {
        submit: "<?php echo base_url(); ?> /index.php/Cust_home/mailbox"
    },    
    colors:{
        primary: '#C9A538',
        secondary: '#7A7A7A'
    },
    
} 
</script>
<script type="text/javascript">
	var serializedForm = 
	{
		"fields":
		[
			{
				"id":"28327229",
				"question":"Which social network do you use the most?",
				"label":"Which social network do you use the most?",
				"type":"list-image",
				"required":true,
				"attachment_type":"",
				"position":0,
				"calculations":[],
				"randomize":false,
				"multiple":false,
				"other":true,
				"choices":
						{
							"36589397":{"id":"36589397","label":"Facebook","position":0,"image":[]},
							"36589398":{"id":"36589398","label":"Twitter","position":1,"image":[]},
							"36589399":{"id":"36589399","label":"LinkedIn","position":2,"image":[]},
							"36589400":{"id":"36589400","label":"Pinterest","position":3,"image":[]},
							"36589401":{"id":"36589401","label":"Google+","position":4,"image":[]},
							"36589402":{"id":"36589402","label":"Tumblr","position":5,"image":[]},
							"36589403":{"id":"36589403","label":"Instagram","position":6,"image":[]}
						},
					"supersize":false,
					"labels_enabled":true
			},
			{
				"id":"28327234",
				"question":"How often do you check\u00a0{{answer_28327229}}?",
				"label":"How often do you check\u00a0{{answer_28327229}}?",
				"type":"list",
				"required":true,
				"attachment_type":"",
				"position":1,
				"calculations":[],
				"randomize":false,
				"multiple":false,
				"other":false,
				"choices":
						{
							"36589421":{"id":"36589421","label":"Every hour","position":0},
							"36589422":{"id":"36589422","label":"Every day","position":1},
							"36589423":{"id":"36589423","label":"Every week","position":2},
							"36589424":{"id":"36589424","label":"Every month","position":3},
							"36589425":{"id":"36589425","label":"Less frequently","position":4}
						},
						"vertical":true
			},			
			{
				"id":"28327230",
				"question":"On which device do you use {{answer_28327229}} the most?",
				"label":"On which device do you use {{answer_28327229}} the most?",
				"type":"list-image",
				"required":true,
				"attachment_type":"",
				"position":2,
				"calculations":[],
				"randomize":false,
				"multiple":false,
				"other":false,
				"choices":
						{
							"36589404":{"id":"36589404","label":"smartphone","position":0,"image":[]},
							"36589405":{"id":"36589405","label":"tablet","position":1,"image":[]},
							"36589406":{"id":"36589406","label":"laptop","position":2,"image":[]},
							"36589407":{"id":"36589407","label":"desktop","position":3,"image":[]}
						},
						"supersize":false,
						"labels_enabled":true
			},
			{
				"id":"28327236",
				"question":"How happy are you with using\u00a0{{answer_28327229}} on your\u00a0{{answer_28327230}}?",
				"label":"How happy are you with using\u00a0{{answer_28327229}} on your\u00a0{{answer_28327230}}?",
				"type":"rating",
				"required":true,
				"attachment_type":"",
				"position":3,
				"calculations":[],
				"max_value":5,
				"shape":"up"
			},
			{
				"id":"28327231",
				"question":"Which types of content do you share the most?",
				"label":"Which types of content do you share the most?",
				"type":"list-image",
				"required":true,
				"attachment_type":"",
				"position":4,
				"calculations":[],
				"randomize":true,
				"multiple":true,
				"other":true,
				"choices":
						{
							"36589408":{"id":"36589408","label":"Pictures","position":0,"image":[]},
							"36589409":{"id":"36589409","label":"Videos","position":1,"image":[]},
							"36589410":{"id":"36589410","label":"Status updates","position":2,"image":[]},
							"36589411":{"id":"36589411","label":"Articles","position":3,"image":[]},
							"36589412":{"id":"36589412","label":"News pieces","position":4,"image":[]},
							"36589413":{"id":"36589413","label":"Quizzes","position":5,"image":[]},
							"36589414":{"id":"36589414","label":"Deals & coupons","position":6,"image":[]}
						},
						"supersize":false,
						"labels_enabled":true
			},
			{
				"id":"28327232",
				"question":"What do you mainly use social networks for?",
				"label":"What do you mainly use social networks for?",
				"type":"list-image",
				"required":true,
				"attachment_type":"",
				"position":5,
				"calculations":[],
				"randomize":false,
				"multiple":false,
				"other":false,
				"choices":
						{
							"36589415":{"id":"36589415","label":"Keeping in touch with friends","position":0,"image":[]},
							"36589416":{"id":"36589416","label":"Discovering new things","position":1,"image":[]},
							"36589417":{"id":"36589417","label":"Staying up to date with news and events","position":2,"image":[]},"36589418":{"id":"36589418","label":"Following thought leaders or celebrities","position":3,"image":[]}
						},
						"supersize":true,
						"labels_enabled":true
			},
			{
				"id":"28327235",
				"question":"How old are you?",
				"label":"How old are you?",
				"type":"list",
				"required":true,
				"attachment_type":"",
				"position":6,
				"calculations":[],
				"randomize":false,
				"multiple":false,
				"other":false,
				"choices":
				{
					"36589426":{"id":"36589426","label":"17 or younger","position":0},
					"36589427":{"id":"36589427","label":"18 to 24","position":1},
					"36589428":{"id":"36589428","label":"25 to 34","position":2},
					"36589429":{"id":"36589429","label":"35 to 44","position":3},
					"36589430":{"id":"36589430","label":"45 to 54","position":4},
					"36589431":{"id":"36589431","label":"55 to 64","position":5},
					"36589432":{"id":"36589432","label":"65 or older","position":6},
					"36589433":{"id":"36589433","label":"I prefer not to answer","position":7}
				},
				"vertical":false
			},
			{
				"id":"28327233",
				"question":"And finally, what is your gender?",
				"label":"And finally, what is your gender?",
				"type":"list-image",
				"required":true,
				"attachment_type":"",
				"position":7,
				"calculations":[],
				"randomize":false,
				"multiple":false,
				"other":false,
				"choices":
						{
							"36589419":{"id":"36589419","label":"Male","position":0,"image":[]},
							"36589420":{"id":"36589420","label":"Female","position":1,"image":[]}
						},
						"supersize":false,
						"labels_enabled":true
			}
		],				
	};
</script>		
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/style1.css ">
	<link id="font" href="<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/style2.css" rel="stylesheet" type="text/css">	
</head>

<body class="preload   default  repeat proportion  ">

	<div id="typeform" class="">
	
	<!--Start Page code starts-->
		<div id="1405504" class="intro screen " data-field="true">
			<div class="content-wrapper">
				<div class="content">
			
					<!--GIF image code starts-->
					<div class="media">
						<div class="attachment" data-attachment='{"image":"<?php echo $this->config->item('base_url2'); ?>SurveyImages/default.gif","width":210,"height":210,"video_source":"","video_id":""}'>
					
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="" data-first-frame="<?php echo $this->config->item('base_url2'); ?>SurveyImages/default.gif"/>
						</div>	
					</div>
					<!--GIF image code ended-->
									
					<div class="text">
						<strong>Online Customer Survey<br /></strong>Welcome to Survey...
								Start your survey here, It take 5-6 minutes.
					</div>

					<div class="button-wrapper">
						<div class="button general full enabled hover-effect" style="">
							Start
						</div>
						<div class="button-text">
							press <strong>ENTER</strong>
						</div>
					</div>				
				</div>
			</div>
	
			<div class="footer">
				<div class="persistent-wrapper">
					<div class="persistent background"></div>
					<div class="persistent"></div>
				</div>
				<div class="overlay"></div>
				<div class="content">
					<div class="button-wrapper">
						<a class="button general full enabled hover-effect" target="_parent" style="">Start</a>
						<div class="button-text">
							press <strong>ENTER</strong>
						</div>
					</div>
				</div>
				<div class="scroll-smooth"></div>
			</div>
		</div>
	<!--Start Page code ended-->		
		<!--Form code start-->
		<form class="form" action="" method="POST" onsubmit="return validateForm()">
		<div class="form">
			<ul class="questions">
			
			<!--1st Question code starts-->
				<li class="list-image active required  " id="28327229"  data-model='{"id":"28327229","type":"list-image","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">
					
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
		
						<div class="question">
							<span>How Do you know about App?</span>
						</div>
					
						<div class="content">
							<div class="content-wrapper">
								<div class="multiple">
									Choose as many as you like
								</div>
								<ul class="columns">
									<!--Facebook button code starts-->
									<li id="36589397" class="Border container">
										<input type="hidden" name="value" value="Facebook"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/facebook_83X83.png" width="83" 	height="83" alt="Facebook"/>
										</div>
										<div class="text">

											<div class="label">
												<div class="letter">
													<span>A</span>
												</div>
												<div class="caption">
													Facebook
												</div>
											</div>
										</div>									
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Facebook button code ended-->
									<!--Twitter button code starts-->
									<li id="36589398" class="Border container">
										<input type="hidden" name="value" value="Twitter"/>
											<div class="tick-wrapper"></div>
												<span class="tick"></span>
												<div class="image-wrapper">
													<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
													data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/twitter_83X83.png"	width="83" height="83" alt="Twitter"/>
												</div>												
												<div class="text">
													<div class="label">
														<div class="letter">
															<span>B</span>
														</div>
														<div class="caption">
															Twitter
														</div>
													</div>
												</div>												
												<div class="aux ">
													<div class="bg"></div>
													<div class="bd"></div>
												</div>
									</li>
									<!--Twitter button code ended-->
									
									<!--LinkedIn button code starts-->
									<li id="36589399" class="Border container">
										<input type="hidden" name="value" value="LinkedIn"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/linkdin_83X83.png"
											width="83" height="83" alt="LinkedIn" />
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>C</span>
												</div>
												<div class="caption">
													LinkedIn
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--LinkedIn button code ended-->
									
									<!--Pinterest button code starts-->
									<li id="36589400" class="Border container">
										<input type="hidden" name="value" value="Pinterest"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/pinterest_83X83.png"
											width="83" height="83" alt="Pinterest" />
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>D</span>
												</div>
												<div class="caption">
													Pinterest
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Pinterest button code ended-->
									
									<!--Google+ button code starts-->
									<li id="36589401" class="Border container">
										<input type="hidden" name="value" value="Google+"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/google_83X83.png"
											width="82" height="83" alt="Google+"/>
										</div>
											
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>E</span>
												</div>
												<div class="caption">
													Google+
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Google+ button code ended-->
									
									<!--Tumblr button code starts-->
									<li id="36589402" class="Border container">
										<input type="hidden" name="value" value="Tumblr"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/tumblr_83X83.png"
											width="83" height="83" alt="Tumblr"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>F</span>
												</div>
												<div class="caption">
													Tumblr
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Tumblr button code ended-->
									
									<!--Instagram button code starts-->
									<li id="36589403" class="Border container">
										<input type="hidden" name="value" value="Instagram"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/instagram_83X83.png"
											width="83" height="83" alt="Instagram"/>
										</div>										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>G</span>
												</div>
												<div class="caption">
													Instagram
												</div>
											</div>
										</div>										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Instagram button code ended-->
									
									<!--Other button code starts-->
									<li class="custom container" id="other">
										<input type="hidden" name="value" value="!other"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										
										<div class="image-wrapper">
											<img src="<?php echo $this->config->item('base_url2'); ?>SurveyImages/lazy.png"
											data-original="<?php echo $this->config->item('base_url2'); ?>SurveyImages/other_124X115.png" width="124" height="115" />						
											<span class="val">Other</span>
											<input class="other-field" type="text" maxlength="45"/>

											<div class="button-wrapper ok-confirm">
												<div class="button nav tick tick--button enabled">
													<span></span>	
												</div>
											</div>							
										</div>										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>H</span>
												</div>
											</div>
										</div>										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Other button code ended-->
								</ul>										
								<div class="clear"></div>
									<div class="clear"></div>
									<div class="message ">
									<span></span>
									<div></div>
								</div>
								
								<div class="confirm container">
									<div class="button-wrapper confirm">
										<div class="button nav enabled">
											<span>OK</span>
											<span class="confirm"></span> 	
										</div>
									</div>
									<div class="text">	
										press <strong>ENTER</strong>
									</div>
								</div>
		
							</div>
						</div>
					</div>
				</li>
		<!--1st Question code ended-->
		
		
		<!--2nd Question code starts-->
				<li class="list active required   vertical" id="28327234"  data-model='{"id":"28327234","type":"list","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
						
						<div class="question">
							<span>How often do you check {{answer_28327229}}?</span>
						</div>
						
						<div class="content">
							<div class="content-wrapper">
								<div class="attachment-wrapper">				
									<div class="control">
										<div class="multiple">
											Choose as many as you like
										</div>
										<ul class="columns">
										
											<li id="36589421" class="container">
												<input type="hidden" name="value" value="Every hour"/>
												<div class="letter">
													<span>A</span>
												</div>												
												<span class="label">Every hour</span>
												<span class="tick"></span>
												<div class="aux ">
													<div class="bg"></div>
													<div class="bd"></div>
												</div>
											</li>

											<li id="36589422" class="container">
												<input type="hidden" name="value" value="Every day"/>
													<div class="letter">
														<span>B</span>
													</div>
													
													<span class="label">Every day</span>
													<span class="tick"></span>
													<div class="aux ">
														<div class="bg"></div>
														<div class="bd"></div>
													</div>
											</li>

											<li id="36589423" class="container">
												<input type="hidden" name="value" value="Every week"/>
													<div class="letter">
														<span>C</span>
													</div>
														
													<span class="label">Every week</span>
													<span class="tick"></span>
													<div class="aux ">
														<div class="bg"></div>
														<div class="bd"></div>
													</div>
											</li>

											<li id="36589424" class="container">
												<input type="hidden" name="value" value="Every month"/>
													<div class="letter">
														<span>D</span>
													</div>
													
													<span class="label">Every month</span>
													<span class="tick"></span>
													<div class="aux ">
														<div class="bg"></div>
														<div class="bd"></div>
													</div>
											</li>

											<li id="36589425" class="container">
												<input type="hidden" name="value" value="Less frequently"/>
													<div class="letter">
														<span>E</span>
													</div>
													
													<span class="label">Less frequently</span>
													<span class="tick"></span>
													<div class="aux ">
														<div class="bg"></div>
														<div class="bd"></div>
													</div>
											</li>

										</ul>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="message ">
									<span></span>
									<div></div>
								</div>
								
								<div class="confirm container">
									<div class="button-wrapper confirm">
										<div class="button nav enabled">
											<span>OK</span>
											<span class="confirm"></span> 	
										</div>
									</div>
									<div class="text">
										press <strong>ENTER</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<!--2nd Question code ended-->	  								
	
			<!--3rd Question code starts-->
				<li class="list-image active required  " id="28327230"  data-model='{"id":"28327230","type":"list-image","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">
					
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
						
						<div class="question">
							<span>On which device do you use {{answer_28327229}} the most?</span>
						</div>
						<div class="content">
							<div class="content-wrapper">
								<div class="multiple">
									Choose as many as you like
								</div>
								<ul class="columns">
									<!--Smartphone code ended-->
									<li id="36589404" class="Border container">
										<input type="hidden" name="value" value="smartphone"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/NxYbpinqgK/choice/default#.png"
											width="36" height="50" alt="smartphone"/>
										</div>										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>A</span>
												</div>
												<div class="caption">
													smartphone
												</div>
											</div>
										</div>										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Smartphone code ended-->
									
									<!--Tablet code starts-->
									<li id="36589405" class="Border container">
										<input type="hidden" name="value" value="tablet"/>
											<div class="tick-wrapper"></div>
											<span class="tick"></span>
												<div class="image-wrapper">
													<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
													data-original="https://images.typeform.com/images/ytrvHh9FbP/choice/default#.png"
													width="54" height="60" alt="tablet"/>
												</div>
												
												<div class="text">
													<div class="label">
														<div class="letter">
															<span>B</span>
														</div>
														<div class="caption">
															tablet
														</div>
													</div>
												</div>
												
												<div class="aux ">
													<div class="bg"></div>
													<div class="bd"></div>
												</div>
										</li>
										<!--Tablet code ended-->
										
										<!--Laptop code starts-->
										<li id="36589406" class="Border container">
											<input type="hidden" name="value" value="laptop"/>
											<div class="tick-wrapper"></div>
											<span class="tick"></span>
											<div class="image-wrapper">
												<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
												data-original="https://images.typeform.com/images/ZQ32uBgbwX/choice/default#.png"
												width="85" height="49" alt="laptop"/>
											</div>											
											<div class="text">
												<div class="label">
													<div class="letter">
														<span>C</span>
													</div>
													<div class="caption">
														laptop
													</div>
												</div>
											</div>											
											<div class="aux ">
												<div class="bg"></div>
												<div class="bd"></div>
											</div>
										</li>
										<!--Laptop code ended-->
										
										<!--Desktop code starts-->
										<li id="36589407" class="Border container">
											<input type="hidden" name="value" value="desktop"/>
											<div class="tick-wrapper"></div>
											<span class="tick"></span>
											<div class="image-wrapper">
												<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
												data-original="https://images.typeform.com/images/xKdtM6XyRy/choice/default#.png"
												width="100" height="78" alt="desktop"/>
											</div>
											
											<div class="text">
												<div class="label">
													<div class="letter">
														<span>D</span>
													</div>
													<div class="caption">
														desktop
													</div>
												</div>
											</div>
											
											<div class="aux ">
												<div class="bg"></div>
												<div class="bd"></div>
											</div>
										</li>
										<!--Desktop code ended-->
								</ul>
								<div class="clear"></div>
								<div class="clear"></div>
								<div class="message ">
									<span></span>
									<div></div>
								</div>
								
								<div class="confirm container">
									<div class="button-wrapper confirm">
										<div class="button nav enabled">
											<span>OK</span>
											<span class="confirm"></span> 	
										</div>
									</div>
									<div class="text">	
										press <strong>ENTER</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<!--3rd Question code ended-->
			
			<!--4th Question code starts-->
				<li class="rating active required  icon-up" id="28327236"  data-model='{"id":"28327236","type":"rating","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">					
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
						
						<div class="question">
							<span>Rate this App with using {{answer_28327229}} on your {{answer_28327230}}?</span>
						</div>
						<div class="content">
							<div class="content-wrapper">
								<div class="attachment-wrapper">
									<div class="control">
										<ul class="icons" data-steps='{"steps":["1","2","3","4","5"]}'></ul>
									</div>
								</div>
								<div class="clear"></div>
								<div class="message ">
									<span></span>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<!--4th Question code ended-->	 

			<!--5th Question code starts-->
				<li class="list-image active required  randomize multiple" id="28327231"  data-model='{"id":"28327231","type":"list-image","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">
					
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
						
						<div class="question">
							<span>Select which types of item you most liked?</span>
						</div>
						<div class="content">
							<div class="content-wrapper">
								<div class="multiple">
									Choose as many as you like
								</div>
								<ul class="columns">
								
									<!--1st box img starts-->
									<li id="36589408" class="Border container">
										<input type="hidden" name="value" value="Pictures"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/iJV3MT3DKh/choice/default#.png"
											width="70" height="81" alt="Pictures"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>A</span>
												</div>
												<div class="caption">
													BAT
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--1st box img ends-->
									
									<!--2nd box img starts-->
									<li id="36589409" class="Border container">
										<input type="hidden" name="value" value="Videos"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/278JKy4e62/choice/default#.png"
											width="70" height="71" alt="Videos"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>B</span>
												</div>
												<div class="caption">
													Ball
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--2nd box img ended-->
									
									<!--3rd box img starts-->
									<li id="36589410" class="Border container">
										<input type="hidden" name="value" value="Status updates"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/J735MC6ZsE/choice/default#.png"
											width="80" height="50" alt="Status updates"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>C</span>
												</div>
												<div class="caption">
													Mobile
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--3rd box img ended-->
									
									<!--4th box img starts-->
									<li id="36589411" class="Border container">
										<input type="hidden" name="value" value="Status updates"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
												data-original="https://images.typeform.com/images/M3BkdZgU3h/choice/default#.png"
												width="60" height="77" alt="News pieces"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>C</span>
												</div>
												<div class="caption">
													Mobile
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--4th box img ended-->
									
									<!--5th box img starts-->
									<li id="36589412" class="Border container">
										<input type="hidden" name="value" value="Pictures"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/iJV3MT3DKh/choice/default#.png"
											width="70" height="81" alt="Pictures"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>A</span>
												</div>
												<div class="caption">
													BAT
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--5th box img ended-->
									
									<!--6th box img starts-->
									<li id="36589413" class="Border container">
										<input type="hidden" name="value" value="Videos"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/278JKy4e62/choice/default#.png"
											width="70" height="71" alt="Videos"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>B</span>
												</div>
												<div class="caption">
													Ball
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--6th box img ended-->
									
									<!--7th box img starts-->
									<li id="36589414" class="Border container">
										<input type="hidden" name="value" value="Status updates"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/J735MC6ZsE/choice/default#.png"
											width="80" height="50" alt="Status updates"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>C</span>
												</div>
												<div class="caption">
													Mobile
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--7th box img ended-->
									
									<!--8th box img starts-->
									<li class="custom container" id="other">
										<input type="hidden" name="value" value="!other"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper"><img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png" data-original="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/other.png" width="124" height="115" />
											<span class="val">Other</span>
											<input class="other-field" type="text" maxlength="45"/>
																				
											<div class="button-wrapper ok-confirm">
												<div class="button nav tick tick--button enabled">
													<span></span>	
												</div>
											</div>
									
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>H</span>
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--8th box img ended-->		 	
								</ul>
								<div class="clear"></div>
								<div class="clear"></div>
								<div class="message ">
									<span></span>
									<div></div>
								</div>
								
								<div class="confirm container">
									<div class="button-wrapper confirm">
										<div class="button nav enabled">
											<span>OK</span>
											<span class="confirm"></span> 	
										</div>
									</div>
									
									<div class="text">
										press <strong>ENTER</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<!--5th Question code ended-->
			
			<!--6th Question code starts-->
				<li class="list-image active required   supersize" id="28327232"  data-model='{"id":"28327232","type":"list-image","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">
					
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
						
						<div class="question">
							<span>How is the feature of App?</span>
						</div>
						
						<div class="content">
							<div class="content-wrapper">
								<div class="multiple">
									Choose as many as you like
								</div>
								
								<ul class="columns">
									<!--Satisfied img-->
									<li id="36589415" class="Border container">
										<input type="hidden" name="value" value="Keeping in touch with friends"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper img-rounded">
											<img src="https://openclipart.org/download/192852/thumbs-up-right.svg" class="img-rounded"
											data-original="https://in.pinterest.com/pin/92042386115206422/"
											width="108" height="108" alt="Keeping in touch with friends"/>
										</div>
										
								
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>A</span>
												</div>
												<div class="caption">
													Satisfied
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Satisfied img ended-->																	
					
									<!--Dissatisfied img-->
									<li id="36589416" class="Border container">
										<input type="hidden" name="value" value="Keeping in touch with friends"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper img-rounded">
											<img src="https://openclipart.org/download/192849/thumbs-down-left.svg" class="img-rounded"
											data-original="https://in.pinterest.com/pin/92042386115206422/"
											width="108" height="108" alt="Keeping in touch with friends"/>
										</div>
								
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>B</span>
												</div>
												<div class="caption">
													Dissatisfied
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Dissatisfied img ended-->
								</ul>
								<div class="clear"></div>
								<div class="clear"></div>
								
								<div class="message ">
									<span></span>
									<div></div>
								</div>
									
								<div class="confirm container">
									<div class="button-wrapper confirm">
										<div class="button nav enabled">
											<span>OK</span>
											<span class="confirm"></span> 	
										</div>
									</div>
									<div class="text">
										press <strong>ENTER</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<!--6th Question code ended-->
				  								 								
			<!--7th Question code starts-->																	
				<li class="list-image active required  " id="28327233"  data-model='{"id":"28327233","type":"list-image","name":"","required":true,"showPadlockIcon":false}'>
					<div class="wrapper">
						<div class="item">
							<span></span>
							<div class="arrow">
								<div class="arrow-right"></div>
							</div>
						</div>
						<div class="question">
							<span>And finally, what is your gender?</span>
						</div>
						<div class="content">
							<div class="content-wrapper">
								<div class="multiple">
									Choose as many as you like
								</div>
								
								<ul class="columns">
									<!--Male section starts-->
									<li id="36589419" class="Border container">
										<input type="hidden" name="value" value="Male"/>
										<div class="tick-wrapper"></div>
										<span class="tick"></span>
										<div class="image-wrapper">
											<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
											data-original="https://images.typeform.com/images/WP6DGsezHx/choice/default#.png"
											width="78" height="82" alt="Male"/>
										</div>
										
										<div class="text">
											<div class="label">
												<div class="letter">
													<span>A</span>
												</div>
												<div class="caption">
													Male
												</div>
											</div>
										</div>
										
										<div class="aux ">
											<div class="bg"></div>
											<div class="bd"></div>
										</div>
									</li>
									<!--Male section ended-->
									
									<!--Female section starts-->
									<li id="36589420" class="Border container">
										<input type="hidden" name="value" value="Female"/>
											<div class="tick-wrapper"></div>
											<span class="tick"></span>
											<div class="image-wrapper">
												<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png"
												data-original="https://images.typeform.com/images/txxXi9gsGF/choice/default#.png"
												width="64" height="83" alt="Female"/>
											</div>
											
											<div class="text">
												<div class="label">
													<div class="letter">
														<span>B</span>
													</div>
													<div class="caption">
														Female
													</div>
												</div>
											</div>
											
											<div class="aux ">
												<div class="bg"></div>
												<div class="bd"></div>
											</div>
									</li>
									<!--Female section ended-->
								</ul>
								
								<div class="clear"></div>
								<div class="clear"></div>
								<div class="message ">
									<span></span>
									<div></div>
								</div>
								
								<div class="confirm container">
									<div class="button-wrapper confirm">
										<div class="button nav enabled">
											<span>OK</span>
											<span class="confirm"></span> 	
										</div>
									</div>
									<div class="text">
										press <strong>ENTER</strong>
									</div>
								</div>
		
							</div>
						</div>
					</div>
				</li>
				<!--7th Question code ended-->
				
			</ul>
			
			<!--OK Button code-->
			<div class="footer-confirm">
				<div class="persistent background"></div>
				<div class="wrapper">
					<div class="content">			
						<div class="button-wrapper confirm">
							<div class="button nav enabled hover-effect">
								<span>OK</span>
								<span class="confirm"></span> 	
							</div>
						</div>						
						<div class="text">
							<span class="default">press <strong>ENTER</strong></span>
							<span class="textarea">press <strong>ENTER</strong></span>
							<span class="multiple">press <strong>ENTER</strong></span>
						</div>
			
					</div>
				</div>
			</div>
			<!--OK Button code ended-->
			
			<div id="fixed-footer" class="lightness-step">
				<div class="overlay"></div>
				<div class="persistent background"></div>
				
					<!--Up & down arrow button code-->
					<div class="nav-buttons">
						<div class="button-wrapper up">
							<div class="button nav enabled hover-effect">
								<span></span>
								<span class="up"></span> 	
							</div>
						</div>
	

						<div class="button-wrapper down">
							<div class="button nav enabled hover-effect">
								<span></span>
								<span class="down"></span> 	
							</div>
						</div>
					</div>
					<!--Up & down arrow button code ended-->
					
					<div class="clear"></div>
					<!--Progress bar code-->
					<div class="content">
						<div id="progress"></div>
					</div>
					<!--Progress bar code ended-->

			</div>

			<!--7th Que sumit button code-->
			<div id="unfixed-footer" class="lightness-step">
				<div class="footer-message">
					<div class="background"></div>
					<div class="content">
						<span class="default-message"></span>
					</div>
				</div>
				
				<div class="persistent background lightness-step"></div>
					<div class="content">
						<div class="button-wrapper submit">
							<div class="button-text">
								press <strong>ENTER</strong>
							</div>
						</div>
						<div class="button-wrapper review">
							<div class="button general red enabled hover-effect">
								Review
							</div>
                            <div class="button-text">
								press <strong>ENTER</strong>
							</div>
						</div>

					</div>
			</div>
			<!--7th Que submit button code ended-->
			
		</div>
		</form>
		<!--Form code ended-->
	
		<div id="904947" class="outro screen " data-field="true">
			<!--Front page GIF Img-->
			<div class="content-wrapper">
				<div class="content">
						
					<div class="media">                                   
						<div class="attachment" data-attachment='{"image":"https:\/\/images.typeform.com\/images\/KqvgC2ZZpN\/image\/default#.png","width":210,"height":324,"video_source":"","video_id":""}'>
							<img src="//dkl3g0z0k6qzr.cloudfront.net/quickyformapp/images/lazy.png" data-original="" />
						</div>
					</div>
									
					<div class="text">
						<a href="https://smresults.typeform.com/report/o2SDoO/kmQm" target="_blank">https://smresults.typeform.com/report/o2SDoO/kmQm</a>				
					</div>
				</div>
			</div>
			<!--Front page GIF Img-->
			
			<div class="footer">
				<div class="persistent-wrapper">
					<div class="persistent background"></div>
					<div class="persistent"></div>
				</div>
				<div class="overlay"></div>
				<div class="scroll-smooth"></div>
			</div>
		</div>
	
	<div id="0" class="outro default screen " data-field="true">
	<div class="content-wrapper">
		<div class="content">

									
			<div class="media">
							</div>

									
			<div class="text">
				
			</div>

									
			
									
            
									
						
		</div>
	</div>
	<div class="footer">
		<div class="persistent-wrapper">
			<div class="persistent background"></div>
			<div class="persistent"></div>
		</div>
		<div class="overlay"></div>
		<div class="content">
			<div class="button-wrapper">
							</div>
		</div>
		<div class="scroll-smooth"></div>
	</div>
</div>

	<div id="background">
	<div></div>
</div>

</div>


<ul id="texts" style="display:none;">
	<li id="submit-button" onclick="JavaScript:return Validate();">Send</li>		
</ul>

		
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/spin.js/2.0.1/spin.min.js"></script>    	
		<script type="text/javascript">
			var opts = {
			  lines: 16, // The number of lines to draw
			  length: 3, // The length of each line
			  width: 3, // The line thickness
			  radius: 14, // The radius of the inner circle
			  color: '#C9A538', // #rgb or #rrggbb
			  speed: 2.1, // Rounds per second
			  trail: 60, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: false // Whether to use hardware acceleration
			};
			var target = document.getElementById('spin');
			var spinner = new Spinner(opts).spin(target);
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/common-min.z.js"></script>		
		<!-- end of common scripts -->		        
		<script type="text/javascript">
            var jumps = [];
			freezeframe_options = {
				animation_icon_image: false,
				loading_background_image: false,
				loading_background_color: "transparent",
				loading_background_position: "top left",
				trigger_event: "focus",
                loading_fade_in_speed: 1,
				auto_run: false
			}
		</script>
		<script type="text/javascript" src="<?php echo $this->config->item('base_url2'); ?>assets/portal_assets/survey_css/default-min.z.js">
		</script>  
    </body>
</html>
<script type="text/javascript">
	function validateForm()
	{
		alert('Validate');
	}
</script>