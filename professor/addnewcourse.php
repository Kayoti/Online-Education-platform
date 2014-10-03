<?PHP
ob_start();
require_once("../include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("../index.php");
	exit;
}
else
{
$name= $fgmembersite->UserFullName();

if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$fgmembersite->LogOut();
	unset($_SESSION['status']);
	if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-10000);
	session_destroy();
}
$username = $fgmembersite->Userid();
$prof_id = $fgmembersite->GetProfId($username);
$professor_university = $fgmembersite->GetProfessorInstitue($prof_id);
//echo $prof_id;

if(isset($_POST['submitted']))
{
   
   if($fgmembersite->AddCourse($prof_id))
   {
       //echo "<script type='text/javascript'>alert('The Course has been added successfully!');</script>";
       
        
   }   
}
}
?>
<!DOCTYPE html>
<!-- This website was built with pride by Tialt Team.
Tialt specialises in building Web Systems.
View the portfolio @ http://tialt.ca -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <base href="http://presenterspodium.com/"/> -->
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<link href="//fonts.googleapis.com" rel="dns-prefetch">
		<link href="//themes.googleusercontent.com" rel="dns-prefetch">
		<link href="//www.presenterspodium.com" rel="dns-prefetch">
		<link href="//presenterspodium.com" rel="dns-prefetch">
		<link href="//www.presentersplatform.com" rel="dns-prefetch">
		<link href="//presentersplatform.com" rel="dns-prefetch">
		<link href="//browsehappy.com" rel="dns-prefetch">
		<link href="//ajax.googleapis.com" rel="dns-prefetch">
		<link href="//google-analytics.com" rel="dns-prefetch">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<title>Presenter's Podium - Discover Your Ability.</title>
		<meta name="description" content="Refine, develop and improve your communication skills.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="generator" content="Crafted by Tialt" />
	<!-- SEO Metadata -->
		<meta name="robots" content="index,follow">
		<meta name="googlebot" content="noodp,noarchive,noimageindex">
		<meta name="revisit-after" content="1 month">
	<!-- Search Engine Verification Metadata -->
		<meta name="google-site-verification" content="">
		<meta name="msvalidate.01" content="">
		<meta name="alexaVerifyID" content="">
	<!-- Facebook Open Graph Meta Tags -->
		<meta property="og:title" content="Presenter's Podium - Discover Your Ability.">
		<meta property="og:description" content="Refine, develop and improve your communication skills.">
		<meta property="og:url" content="http://presenterspodium.com">
		<meta property="og:site_name" content="Presenter's Podium">
		<meta property="og:type" content="general">
		<meta property="og:image" content="../images/presenterspodium-200x200.jpg">		
		<link href="" rel="canonical">
		<link href="" rel="image_src">
		<link href="" rel="publisher">
		<link href="" rel="author">
		<link href="../humans.txt" rel="author" type="text/plain">
		<link href="../apple-touch-icon.png" rel="apple-touch-icon">
		<link href="../favicon.ico" rel="shortcut icon">
	<!-- Google Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	<!-- CSS Stylesheets -->
		<link href="../css/normalize-1.1.3.css" rel="stylesheet" type="text/css">
		<link href="../css/page-loader/pace-theme-flash.css" rel="stylesheet" type="text/css">
		<link href="../css/bootstrap-2.3.2.min.css" rel="stylesheet" type="text/css">
		<link href="../css/bootstrap-responsive-2.3.2.min.css" rel="stylesheet" type="text/css">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link href="../css/font-awesome-3.2.1.min.css" rel="stylesheet" type="text/css">
	<!--[if IE 7]>
		<link href="../css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css">
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="../js/html5shiv-3.7.0.min.js"></script>
	<![endif]-->
		<script src="../js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
		<!--[if lt IE 8]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<!-- Start header -->
        <header class="header">
            <div class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="brand-wrapper">
							<a class="brand" href="../index.php">Presenters<span>P</span><i class="icon-comments"></i><span>dium</span></a>
						</div>
                       <ul class="nav">
							<?php 
			                   echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>";
							  echo "Hi     ".$name." "; echo"<b class='caret'></b></a>
							
									<ul class='dropdown-menu'>
								    <li ><a  href='profile.php'>Profile</a></li>
									<li ><a  href='../index.php?status=loggedout'>Sign out</a></li>
									</ul></li>";
									
								?>
                        </ul>
                    </div>
                </div>                
            </div>            
        </header>
	<!-- End header -->
		
		<!-- Start Body Section -->
		<section class="content">
		
	<div class="navbar">
		<div class="navbar-inner">
			<a class="brand" href="#"></a>
			<ul class="nav">
				<li><a href="profile.php?professor_id=1">Profile</a></li>
				<li class="divider-vertical"></li>
				<li class="active"><a href="courses.php">Courses</a></li>
			</ul>
			<h4 style="float:right"> 24/7 support  call  +1 (902) 489-4156</h4>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span6 offset4">
				<form class="form enroll-form" style="margin: 50px auto 50px" action='<?php  ?>' method='post' accept-charset='UTF-8'>
				<h2>Customize Your Course</h2>
				<br>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='hidden' type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
				<div class="text-error"><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
				<p class="text-error" id="error"><?php 
												if(isset($_GET["errormsg"]))
												{
													$error = $_GET["errormsg"];
													echo $error;
													//echo "Your total weightage must equal to 100. Currently your total is ".$error;
												}
												if(isset($_GET["uerror"]))
												{
													$uerror = $_GET["uerror"];
													echo $uerror;
													//echo "Your total weightage must equal to 100. Currently your total is ".$error;
												}
												if(isset($_GET["errornot100"]))
												{
													$errornot100 = $_GET["errornot100"];
													echo "Your total weightage must equal to 100. Currently your total is ".$errornot100."<br>";
												}
												?>
				</p>
					<fieldset>
						<div class="control-group">
							<label class="control-label">Which institute will this course be offered at? Please add your institute if it doesn't exist in the list.</label>
							<div class="controls">
								<select class="selectpicker" id="u_list" name="u_list" tabindex="3" onChange="name_click()">
									<?php
										if(isset($_GET["ulist_val"]))
										{
											$ulistval = $_GET["ulist_val"];
											if($ulistval=='other')
											{
												echo '<option name="ulist" value="other">Add an Institution</option>';
											}
											else
											{
												require_once("../include/membersite_config.php");
												$institute_ulist = $fgmembersite->GetUidInstitute($ulistval);
												echo "<option name='ulist' value='".$institute_ulist["u_id"]."'>".$institute_ulist["u_name"]."</option>";
											}
											
											
										}
										else
										{
											echo '<option name="ulist" value="">Select</option>';
										}
										$institute_res = $fgmembersite->GetInstitute();
										foreach ($institute_res as $institute){                                
											echo "<option name='ulist' value='".$institute["u_id"]."'>".$institute["u_name"]."</option>";
										}
										echo '<option name="ulist" value="other">Add an Institution</option>';
									?>
									
								</select>
								<p class="help-block"></p>
							</div>
						</div>
						<!--Add Your Institution Begins-->
							<?php 
								if(isset($_GET['ulist_val']))
								{
									$uni_val = $_GET['ulist_val'];
									if($uni_val=="other")
										echo '<div class="addyourinstitute">';
									else
										echo '<div class="addyourinstitute" style="display:none;">';
								}
								else
								echo '<div class="addyourinstitute" style="display:none;">';
								
							?>

								<div class="control-group span6">
									<label class="control-label">Institute Name: </label>
									<div class="controls">
											<input id="iname" name="iname" type="text" value="<?php if(isset($_GET['u_name']))
																								{
																									$u_name=$_GET['u_name']; echo $u_name;
																								}?>" placeholder=""  class="input input-block">
											<p class="help-block"></p>
									</div>
								</div>
								<div class="control-group span6">
									<label class="control-label">Address: </label>
									<div class="controls">
										<input id="address" name="address" type="text" value="<?php if(isset($_GET['u_street']))
																							{
																								$u_street=$_GET['u_street']; echo $u_street;
																							}?>" placeholder=""  class="input input-block">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="control-group span6">
									<label class="control-label">City: </label>
									<div class="controls">
										<input id="city" name="city" type="text" value="<?php if(isset($_GET['u_city']))
																							{
																								$u_city=$_GET['u_city']; echo $u_city;
																							}?>" placeholder=""  class="input input-block">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="control-group span6">
									<label class="control-label">Province/State: </label>
									<div class="controls">
										<input id="provincestate" name="provincestate" type="text" value="<?php if(isset($_GET['u_provincestate']))
																							{
																								$u_provincestate=$_GET['u_provincestate']; echo $u_provincestate;
																							}?>" placeholder=""  class="input input-block">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="control-group span6">
									<label class="control-label">Postal/Zip Code: </label>
									<div class="controls">
										<input id="postalzip" name="postalzip" type="text" value="<?php if(isset($_GET['u_postalzip']))
																							{
																								$u_postalzip=$_GET['u_postalzip']; echo $u_postalzip;
																							}?>" placeholder=""  class="input input-block">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="control-group span6">
									<label class="control-label">Country: </label>
									<div class="controls">
										<input id="country" name="country" type="text" value="<?php if(isset($_GET['u_country']))
																							{
																								$u_country=$_GET['u_country']; echo $u_country;
																							}?>" placeholder=""  class="input input-block">
										<p class="help-block"></p>
									</div>
								</div>
							</div>
						<!--Adding Institute Ends-->	
						<div class="control-group">
							<label class="control-label" for="coursename">Course Name:</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="coursename" name="coursename" placeholder="" value="<?php if(isset($_GET['coursename']))
																																{
																																	$coursename=$_GET['coursename']; echo $coursename;
																																}?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="courseno">Course Number:</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="courseno" name="courseno" placeholder="" value="<?php if(isset($_GET['courseno']))
																																{
																																	$courseno=$_GET['courseno']; echo $courseno;
																																}?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="productcode">Product Code:</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="productcode" name="productcode" placeholder="" value="<?php if(isset($_GET['productcode']))
																																{
																																	$productcode=$_GET['productcode']; echo $productcode;
																																}?>">
							</div>
							<p>Share this secret product code with your class so that they can enroll for this course.</p>
						</div>
						<div class="control-group">
							<label class="control-label" for="term">Term:</label>
							<div class="controls">
							<?php if(isset($_GET['term']))
									{
										$term=$_GET['term'];
									}
									else $term = "Fall";
							?>
								<input type="radio" id="fall" class="radio inline" name="term" value="Fall" <?php if($term=='Fall') echo 'checked';?>>
								<label for="fall">Fall</label>
								<input type="radio" id="winter" class="radio inline" name="term" value="Winter" <?php if($term=='Winter') echo 'checked';?>>
								<label for="winter">Winter</label>
								<input type="radio" id="summer" class="radio inline" name="term" value="Summer" <?php if($term=='Summer') echo 'checked';?>>
								<label for="summer">Summer</label>
							</div>
						</div>
					</fieldset>
					<fieldset>

						<div class="control-group">
							<label class="control-label" for="year">Year:</label>
							<div class="controls">
								<input class="input-xlarge form-control" type="number" min="2013" max="3013" id="year" name="year" placeholder="" value="<?php if(isset($_GET['year']))
																																{
																																	$year=$_GET['year']; echo $year;
																																}?>">
							</div>
						</div>
						<p>Please note: Weeks always begin on a Monday, please select the next Monday in the calendar as your start date.</p>
						<div class="control-group">
							<label class="control-label" for="datepicker">Start Date:</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="datepicker" name="datepicker" placeholder="" value="<?php if(isset($_GET['datepicker']))
																																{
																																	$datepicker=$_GET['datepicker']; echo $datepicker;
																																}?>">
							</div>
						</div>
					</fieldset>
						<h5>Frequency groups change:</h5>
					<fieldset>
					<?php if(isset($_GET['grpchange']))
									{
										$grpchange=$_GET['grpchange'];
									}
									else $grpchange = "weekly";
							?>
							<input type="radio" id="weekly" class="radio inline" name="grpchange" value="weekly" <?php if($grpchange=='weekly') echo 'checked';?>>
							<label for="weekly">Weekly</label>
							<input type="radio" id="bi-weekly" class="radio inline" name="grpchange" value="bi-weekly" <?php if($grpchange=='bi-weekly') echo 'checked';?>>
							<label for="bi-weekly">Bi-Weekly</label>
					</fieldset>
					<!--<br>
					<p>Note: After the due date for presentations, students must evaluate, ask one question and respond to their question before the next week begins. When the next week begins, whatever is submitted is submitted for that week.</p>
					<br>-->
					<h5>Please add desired weights for each component</h5>
					<fieldset>
						<p class="required">
							<div class="input-prepend input-append">
								<span class="add-on">Presentations</span>
								<input class="input input-small" id="presentation" name="presentation" type="text" value="<?php if(isset($_GET['presentation']))
																																{
																																	$presentation=$_GET['presentation']; echo $presentation;
																																}?>">
								<span class="add-on">%</span>
							</div>
						</p>
						<p class="required">
							<div class="input-prepend input-append">
								<span class="add-on">Question</span>
								<input class="input input-small" id="question" name="question" type="text" value="<?php if(isset($_GET['question']))
																																{
																																	$question=$_GET['question']; echo $question;
																																}?>">
								<span class="add-on">%</span>
							</div>
						</p>
						<p class="required">
							<div class="input-prepend input-append">
								<span class="add-on">Evaluation</span>
								<input class="input input-small" id="evaluation" name="evaluation" type="text" value="<?php if(isset($_GET['evaluation']))
																																{
																																	$evaluation=$_GET['evaluation']; echo $evaluation;
																																}?>">
								<span class="add-on">%</span>
							</div>
						</p>
						<p class="required">
							<div class="input-prepend input-append">
								<span class="add-on">Video Response</span>
								<input class="input input-small" id="video_response" name="video_response" type="text" value="<?php if(isset($_GET['video_response']))
																																{
																																	$video_response=$_GET['video_response']; echo $video_response;
																																}?>">
								<span class="add-on">%</span>
							</div>
						</p>
						<p class="required">
							<div class="input-prepend input-append">
								<span class="add-on">Grammar</span>
								<input class="input input-small" id="grammar" name="grammar" type="text" value="<?php if(isset($_GET['grammar']))
																																{
																																	$grammar=$_GET['grammar']; echo $grammar;
																																}?>">
								<span class="add-on">%</span>
							</div>
						</p>
					<div class="text-center">
						<input class="btn btn-large btn-logo" type='submit' name='submit' value='Submit'/>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</section>
		<!-- End Body Section -->

		<!-- Start SIGN IN MODAL -->
		<div id="signInModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:4%;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel" class="text-center">Sign in</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="#login.php" method="post">
					<div class="control-group">
						<label class="control-label" for="signinUsername">Username</label>
						<div class="controls">
						<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" id="signinUsername" name="signinUsername" placeholder="Username" required=""></div><br><br>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="signinPassword">Password</label>
						<div class="controls">
						<div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input type="password" id="signinPassword" name="signinPassword" placeholder="Password" required=""></div><br><br>
						</div>
					</div>
					<div class="control-group">
						<p style="position:absolute; left:40%; bottom:5%;"><button type="submit" class="btn btn-logo">Sign in</button>
						<a href="#">Forgot Password?</a>
						</p>
					</div>
				</form>
			</div>
			<div class="modal-footer" style="height:70px;">
				<h4 class="text-center">Don't have an account? Create your account today!</h4>
				<a href="create-account.html" role="button" class="btn btn-logo" style="position:absolute; left:40%;">Create Account</a>
			</div>
		</div>
		<!-- End SIGN IN MODAL -->

		<!-- Start footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="span2 list-footer">
					<ul style="list-style: none;">
						<li><a href="../create-account.php">Create an Account</a></li>
						<li><a href="#">Learn More</a></li>
						<li><a href="../contact.php">Contact Us</a></li>
						
					</ul>
				</div>
				<div class="span2 offset1 list-footer">
					<ul style="list-style: none;">
						<li><a href="#">Research</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="agree.php">Terms of Use</a></li>
						<li><a href="privacy.php">Privacy Policy</a></li>
					</ul>
				</div>

				<div class="span5 offset2">
					 <p class="footer-info">Presenters Podium provides students a focussed & collaborative environment to present, evaluate, & apply feedback multiple times throughout a semester while progressively learning & refining proper communication & presenting skills.<br><a href="#">Learn More</a></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer -->
	
		<!-- Start Copyright Section -->
		<section class="socket">
			<div class="container">
				<div class="footer-copyright">
					<span>&#169; Presenters Podium - Halifax, NS | Crafted by <a class="tialt" href="http://www.tialt.ca" target="_blank">Tialt</a></span>
				</div>
				<div class="list-social">
					<h3><a href="http://facebook.com/" target="_blank"><i class="icon-facebook"></i></a>
					<a href="https://twitter.com/" target="_blank"><i class="icon-twitter"></i></a></h3>
				</div>
			</div>
		</section>
		<!-- End Copyright Section -->
	
	<!-- JavaScript -->
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>
	<script src="../js/bootstrap-2.3.2.min.js"></script>
	<script src="../js/plugins.js"></script>
	
	<!-- Custom JavaScript -->
	<script>
		var date = new Date();
		date.setDate(date.getDate()-1);
		$(function() {
			
			$('#datepicker').datepicker({
				format: 'yyyy-mm-dd',
				startDate: date
			});
			$('#datepicker').datepicker('setDaysOfWeekDisabled', [0,2,3,4,5,6]);
			$('.selectpicker').selectpicker();
		});
	</script>
	<script>
		
			function name_click(){
				value_select = document.getElementById("u_list").value;
				if(value_select=="other")
				{
					//alert("inside other");
					var changeIt = document.getElementsByClassName("addyourinstitute");
					for (var i = 0; i < changeIt.length; i++) {
							changeIt[i].style.display = "";
					}						
				}
				else
				{
					var changeIt = document.getElementsByClassName("addyourinstitute");
					for (var i = 0; i < changeIt.length; i++) {
							changeIt[i].style.display = "none";
					}
				}
				//alert(value_select);
				}
				
		</script>
	
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>
	-->
    </body>
</html><!-- Last Updated on 2013-10-01 T 12:00:00 -04:00 -->
