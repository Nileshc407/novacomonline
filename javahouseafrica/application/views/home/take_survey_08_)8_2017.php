<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Survey Template 3</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $this->config->item('base_url2')?>assets/portal_assets/survey_css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
    <style type="text/css">
	
	body{
		background-color:#ebf8e1;
		color: gray;
	}
	.wizard 
	{   
		background-color: #ebf8e1;
	}
    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }
    .wizard > div.wizard-inner {
        position: relative;
    }
.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}
.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 3px solid gray;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 9%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: gray;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: gray;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 10px auto;
    border-radius: 100%;
    padding: 0;
}

.wizard .nav-tabs > li a:hover 
{
	background: transparent;
}

.wizard .tab-pane 
{
	position: relative;
    padding-top: 80px;
	min-height: 400px;
}
.wizard h3 
{
    margin-top: 0;
}
@media(max-width : 585px ) 
{

    .wizard {
        width: 90%;
        height: auto !important;
    }
    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
	.wizard .nav-tabs > li {
		width: 20%;
	}
	.form-group
	{
		padding: 26px;
	}
	.btn-group, .btn-group-vertical
	{		
		padding-top: 12px;
	}
	div.checkRadioContainer
	{
		width: 100% !important;
	}
}
.container {
  
    width: 80%;
	background-color: #ebf8e1;
}
.wizard h3
{
	border-bottom: 1px solid #3276b1;
    margin-top: 0;
    padding: 10px;
}
ul 
{
  list-style-type: none;
}

li 
{
  display: inline-block;
}
input[type="checkbox"][id^="cb"] 
{
  display: none;
}

label 
{
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}
label:before 
{
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}
label img 
{
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}
:checked + label 
{
  border-color: #ddd;
}

:checked + label:before 
{
  content: "✓";
  background-color: gray;
  transform: scale(1);
}

:checked + label img 
{
  transform: scale(0.9);
  z-index: -1;
  border: 2px solid gray;
  padding: 5px;
}
.fa-check:before
{
	 color: gray;
	 margin-right: 26px;
}
.btn-primary
{
	background-color: gray;
    border-color: gray;
}
.btn-primary:hover
{
	background-color: #ebf8e1;
}

div.checkRadioContainer > label > input 
{
    visibility: hidden;
}

div.checkRadioContainer 
{
  
	width: 50%;
    display: block;
    margin: 0 auto;
    float: left;
}
div.checkRadioContainer > label 
{
    display: block;
    border: 1px solid gray;
    cursor: pointer;
	text-align: center;
}
div.checkRadioContainer > label > span 
{
    display: inline-block;
    vertical-align: top;
    line-height: 2em;
	font-weight: 100;
}
div.checkRadioContainer > label > input + i 
{
    visibility: hidden;
    color: #428bca;
    margin-left: -0.5em;
    margin-right: 0.2em;
}
div.checkRadioContainer > label > input:checked + i 
{
    visibility: visible;
}
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>	
</head>
<body>
			<?php 		
			$Survey_data = json_decode( base64_decode($_REQUEST['Survey_data']) );
			$Survey_data = get_object_vars($Survey_data);			
			if($Survey_data['Card_id'] == '' || $Survey_data['Card_id']== "" || $Survey_data['Card_id']== '0')
			{			
			?>
				<!-- Modal -->	
				<script>					
				$(window).load(function(){
					$('#myModal').modal('show');
				}); 				
				function Close_window()
				{ 
					window.close();
				}
				</script>
				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">						
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" onclick="close_window();return false;" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Application Information</h4>
						</div>
						<div class="modal-body">
						  <p>You have not been assigned Membership ID yet ...Please visit nearest outlet</p>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" onclick="close_window();return false;" data-dismiss="modal">Close</button>
						</div>
					  </div>					  
					</div>
				</div>
				<!-- Modal -->	
			<?php 
			} 
			?>
			
<?php if($Survey_response_count==0){ ?>
<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Question 1">
                            <span class="round-tab">
                                <img src="<?php echo $this->config->item('base_url2')?>SurveyImages/question-sign.png">
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Question 2">
                            <span class="round-tab">
                                <img src="<?php echo $this->config->item('base_url2')?>SurveyImages/question-sign.png">
                            </span>
                        </a>
                    </li>                    
					<li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Question 3">
                            <span class="round-tab">
                                <img src="<?php echo $this->config->item('base_url2')?>SurveyImages/question-sign.png">
                            </span>
                        </a>
                    </li>
					<li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Question 4">
                            <span class="round-tab">
                                <img src="<?php echo $this->config->item('base_url2')?>SurveyImages/question-sign.png">
                            </span>
                        </a>
                    </li>
					<li role="presentation" class="disabled">
                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Question 5">
                            <span class="round-tab">
                                <img src="<?php echo $this->config->item('base_url2')?>SurveyImages/question-sign.png">
                            </span>
                        </a>
                    </li>
					<li role="presentation" class="disabled">
                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="Question 6">
                            <span class="round-tab">
                                <img src="<?php echo $this->config->item('base_url2')?>SurveyImages/question-sign.png">
                            </span>
                        </a>
                    </li>					
                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" action="congrats.php" method="POST">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Q1. Are you satisfied by our Loyalty Program</h3>
								
								<div class="checkRadioContainer">
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="radioGroup" />
										<i class="fa fa-check fa-2x"></i>
										<span>YES</span>
									</label>
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="radioGroup" />
										<i class="fa fa-check fa-2x"></i>
										<span>No</span>
									</label>									
								</div>
						
                        
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Q2. Which Merchandizing Category do you like the most?</h3>
							
								<div class="checkRadioContainer">
									<label>
										<input type="checkbox" name="chk1"  value="Movie Tickets" />
										<i class="fa fa-check fa-2x"></i>
										<span>Movie Tickets</span>
									</label>
									<label>
										<input type="checkbox" name="chk2" value="Footwear" />
										<i class="fa fa-check fa-2x"></i>
										<span>Footwear</span>
									</label>
									<label>
										<input type="checkbox" name="chk3"  value="Books" />
										<i class="fa fa-check fa-2x"></i>
										<span>Books</span>
									</label>									
								</div>
							
							
                        
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Q3. How would you rate our Redemption Catalogue?</h3>
									<ul>
											<li>
												<input type="checkbox" id="cb1" />
												<label for="cb1"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/instagram_83X83.png" /></label>
											</li>
											<li>
												<input type="checkbox" id="cb2" />
												<label for="cb2"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/facebook_83X83.png" /></label>
											</li>
											<li>
												<input type="checkbox" id="cb3" />
												<label for="cb3"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/twitter_83X83.png" /></label>
											</li>
											<li>
												<input type="checkbox" id="cb4" />
												<label for="cb4"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/linkdin_83X83.png" /></label>
											</li>
											
										</ul>
									
						</br>
						</br>
                       
                    </div>
					<div class="tab-pane" role="tabpanel" id="step4">
                        <h3>Q4. How would you rate our Redemption Catalogue?</h3>
							<div class="checkRadioContainer">
									<label>
										<input type="checkbox" name="chk1"  value="User Friendly" />
										<i class="fa fa-check fa-2x"></i>
										<span>User Friendly</span>
									</label>
									<label>
										<input type="checkbox" name="chk1"  value="High Quality" />
										<i class="fa fa-check fa-2x"></i>
										<span>High Quality</span>
									</label>
									<label>
										<input type="checkbox" name="chk2" value="Poor Quality" />
										<i class="fa fa-check fa-2x"></i>
										<span>Poor Quality</span>
									</label>
									<label>
										<input type="checkbox" name="chk3"  value="Good Value for Money" />
										<i class="fa fa-check fa-2x"></i>
										<span>Good Value for Money</span>
									</label>
									<label>
										<input type="checkbox" name="chk3"  value="Overpriced" />
										<i class="fa fa-check fa-2x"></i>
										<span>Overpriced</span>
									</label>									
							</div>
						
                        
                    </div>
					<div class="tab-pane" role="tabpanel" id="step5">
                        <h3>Q5. Which Merchandizing Category do you like the most?</h3>
							
								<div class="checkRadioContainer">
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="chk1"  value="User Friendly" />
										<i class="fa fa-check fa-2x"></i>
										<span>User Friendly</span>
									</label>
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="chk1"  value="High Quality" />
										<i class="fa fa-check fa-2x"></i>
										<span>High Quality</span>
									</label>
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="chk1" value="Poor Quality" />
										<i class="fa fa-check fa-2x"></i>
										<span>Poor Quality</span>
									</label>
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="chk1"  value="Good Value for Money" />
										<i class="fa fa-check fa-2x"></i>
										<span>Good Value for Money</span>
									</label>
									<label>
										<input type="radio" class="next-step" onClick="increase_bar();" name="chk1"  value="Overpriced" />
										<i class="fa fa-check fa-2x"></i>
										<span>Overpriced</span>
									</label>									
							</div>
								
							
							
                        
                    </div>
					<div class="tab-pane" role="tabpanel" id="step6">
                        <h3>Q6. Comments/ Suggestion </h3>
							
								<div class="form-group">
									<textarea class="form-control" id="currentAddress" rows="4" cols="50" name="currentAddress" placeholder="Address" required></textarea>					
								</div>
                    </div>
					
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed Survey.</p>
						<ul class="list-inline pull-left">
                            <li><button type="button" class="btn btn-primary prev-step"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/left-arrow.png"></button></li>
                            <li>
								<button type="submit" name="submit" value="Submit" id="submit" class="btn btn-primary">Submit</button>
							</li>
							
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
	
	
	
	
	
   </div>
	<div class="row">
	
		<div class="col-md-6">
			<progress  role="progressbar" role="progressbar" aria-valuenow="10"  aria-valuemin="0" aria-valuemax="100" value="0" max="100" id="p1">0%</progress>
			<ul class="list-inline pull-left">
				<li> 
					<b class="text-center" id="percent" ></b>
				</li>
			</ul>
		</div>
		<div class="col-md-3">	</div>
		<div class="col-md-3">		
			<ul class="list-inline pull-right">
				<li><button type="button" class="btn btn-primary prev-step"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/left-arrow.png"></button></li>
				<li><button type="button" class="btn btn-primary next-step"><img src="<?php echo $this->config->item('base_url2')?>SurveyImages/right-arrow.png"></button></li>
			</ul>
		</div>
		   
	   <br />
	   <br />
	
	</div>
</div>

<?php }	else { ?>

				<script>		
					$(window).load(function(){
						$('#myModal_done').modal('show');
					}); 
					
					function close_window_done() 
					{
						close();
						
					}
				</script>
					<!-- Modal -->
					<div class="modal fade" id="myModal_done" role="dialog">
						<div class="modal-dialog">						
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" onclick="close_window_done();return false;" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Application Information</h4>
							</div>
							<div class="modal-body">
							  <p>Sorry, it seems you have already given the survey or you do not have any survey. Contact Customer Service</p>
							</div>
							<div class="modal-footer">
							  <button type="button" onclick="close_window_done();return false;" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						  </div>
						  
						</div>
					</div>
					<!-- Modal -->
			
		<?php } ?>
	
	
			
		


		
		

<script type="text/javascript">

$(document).ready(function () {
	// alert('Onlick');
	// return false;
	
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>



<script language="JavaScript">
<!--
function increase_bar() {
var v1=document.getElementById('p1').value;
document.getElementById("p1").value= v1 + 10;
document.getElementById("percent").value= v1 + 10 +'%';

// alert(document.getElementById("percent").value);
document.getElementById("percent").innerHTML = v1 + Math.round(10)  +'% Completed';
	
}

</script>
<script>
</script>
</body>
</html>
