 <?php
ob_start();
require_once("../include/membersite_config.php"); 
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("../index.php");
	exit;
}
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$fgmembersite->LogOut();
	unset($_SESSION['status']);
	if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-10000);
	session_destroy();
}
$username = $fgmembersite->Userid();
$stud_id = $fgmembersite->GetStudId($username);
?>
<!DOCTYPE html>

<!-- This website was built with pride by Tialt Team.

Tialt specialises in building Web Systems for the worlds.

View the portfolio @ http://tialt.ca -->

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- <base href="http://presenterspodium.com/"/> -->

		<link rel="dns-prefetch" href="//fonts.googleapis.com">

		<link rel="dns-prefetch" href="//www.presenterspodium.com">

		<link rel="dns-prefetch" href="//presenterspodium.com">

		<link rel="dns-prefetch" href="//www.presentersplatform.com">

		<link rel="dns-prefetch" href="//presentersplatform.com">

		<link rel="dns-prefetch" href="//browsehappy.com">

		<link rel="dns-prefetch" href="//ajax.googleapis.com">

		<link rel="dns-prefetch" href="//google-analytics.com">

		<link rel="dns-prefetch" href="//www.google-analytics.com">

		<title>Presenter's Podium - Discover Your Ability.</title>

		<meta name="description" content="Refine, develop and improve your communication skills.">

		<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SEO Metadata /-->

		<meta name="robots" content="index,follow">

		<meta name="googlebot" content="noodp,noarchive,noimageindex">

		<meta name="revisit-after" content="1 month">

	<!-- Search Engine Verification Metadata /-->

		<meta name="google-site-verification" content="">

		<meta name="msvalidate.01" content="">

		<meta name="alexaVerifyID" content="">

		<link rel="canonical" href="">

		<link rel="image_src" href="">

		<link rel="author" href="../humans.txt" type="text/plain">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="apple-touch-icon" href="../apple-touch-icon.png">

		<link rel="shortcut icon" href="../favicon.ico">

	<!-- Fonts /-->

		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

	<!-- CSS Stylesheets /-->

		<link href="../css/normalize-1.1.3.css" rel="stylesheet">

		<link href="../css/bootstrap-2.3.2.min.css" rel="stylesheet">

		<link href="../css/bootstrap-responsive-2.3.2.min.css" rel="stylesheet">

		<link href="../css/style.css" rel="stylesheet">

		<link href="../css/font-awesome-3.2.1.min.css" rel="stylesheet">

		<link href="../css/page-loader/pace-theme-flash.css" rel="stylesheet">

	<!--[if IE 7]>

		<link rel="stylesheet" href="../css/font-awesome-ie7.min.css">

	<![endif]-->

	<!--[if lt IE 9]>

		<script src="../js/html5shiv-3.6.2.min.js"></script>

	<![endif]-->

		<script src="../js/modernizr-2.6.2.min.js"></script>

		<script src="../js/pace.min.js"></script>

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

							<a class="brand" href="index.html">Presenters<span>P</span><i class="icon-comments"></i><span>dium</span></a>

						</div>

                        <ul class="nav">

                            <li><a href="../student.php">Student</a></li>
							<li><a href="../professor.php">Professor</a></li>
							<li><a href="profile.php">Welcome</a></li>
                            <li><a href="../index.php?status=loggedout">Sign out</a></li>

                        </ul>

                    </div>

                </div>                

            </div>            

        </header>

	<!-- End header -->

		

<section class="content">



	<div class="navbar">

		<div class="navbar-inner">

			<a class="brand" href="#"></a>

			<ul class="nav">

				<li><a href="profile.php">Profile</a></li>

				<li class="divider-vertical"></li>

				<li class="active"><a href="courses.php">Courses</a></li>

			</ul>
		<h4 style="float:right"> 24/7 support  call  +1 (902) 489-4156</h4>
		</div>

	</div>

	

	<div class="container">

		<div class="row">

			<div class="span4">

				<h2 class=""><div class="number-circle">1</div>Select Course</h2>

			</div>

			<div class="span8">

				<br>

				<p class="description">Following courses are eligible for payment. Pick one at a time to pay</p>

				<fieldset>

					<select class="selectpicker" id="" name="" style="display: none;">									

						<?php
							require_once("../include/membersite_config.php");
							$eligible_courses = $fgmembersite->GetEligiblePaymentCourses($stud_id);
							if($eligible_courses!=NULL)
							{
								echo "<option name='paycourses' value='select'>Select</option>";
								foreach($eligible_courses as $courses)
								{
									echo "<option name='paycourses' value='".$courses['course_id']."'>".$courses['course_no']." - ".$courses['course_name']."</option>";
								}
							}
							else
								echo "<option name='paycourses' value='none'>None Available</option>";
						?>
						<!--<option name="paycourses" value="csci4141">CSCI 4141 - Information Retrieval</option>

						<option name="paycourses" value="comm2424">CSCI 2424 - Networks</option>

						<option name="paycourses" value="comm1616">COMM 1616 - Communications</option>-->

					</select>

				</fieldset>

			</div>

		</div>

		<div class="row">

			<div class="span4">

				<div class="">

					<h2 class=""><div class="number-circle">2</div>Pay</h2>

					<p class="description">No contract. Your subscription will be terminated at the end of the semester.</p>

					<p class="description"><strong>Note:</strong> You will have a lifetime alumni membership which will provide you discounts and a community for our affiliated platforms (Interviews and Presenters By One)</p>

					<p class="description"><strong>Note:</strong> If you drop out of the class or need to cancel for whatever reason, you're responsible for the first month's payment, however, proceeding payments will be fully reimbursed.</p>

					<div class="enroll-guarantee">

						<img alt="Guarantee" src="../images/guarantee-seal.png">

						<p></p>

					</div>

				</div>

			</div>	

			<div class="span8">

				<h3>You pay $35 per course</h3>

				<label>Select form of payment:</label>
				<small>SSL encryption protects your credit card details. <a href="#">Learn More</a></small>

				<fieldset class="options">

					<label class="radio" for="PaymentOptions1">

						<input type="radio" name="PaymentOptions" id="PaymentOptions1" value="creditcard" checked>

						<img alt="Visa" src="../images/credit-cards/visa.png">

						<img alt="Mastercard" src="../images/credit-cards/mastercard.png">

						<img alt="American Express" src="../images/credit-cards/american-express.png">

						<img alt="Discover" src="../images/credit-cards/discover.png">

					</label>



					<label class="radio" for="PaymentOptions2">

						<input type="radio" name="PaymentOptions" id="PaymentOptions2" value="paypal">

						<img alt="PayPal" src="../images/credit-cards/paypal.png">

					</label>

					

					<label class="radio" for="PaymentOptions3">

						<input type="radio" name="PaymentOptions" id="PaymentOptions3" value="callin">

						Call in

					</label>

				</fieldset>

			</div>

			

			<div class="span8">

				<div class="hr-space"></div>

			</div>

			

			<div class="span8">

				<div class="row">

					<div class="span4">

						<label for="">Name on card</label>

						<input id="" class="input-block-level" name="" size="30" tabindex="1" type="text">

					</div>

					<div class="span4">

						<label for="">Card number</label>

						<input id="" class="input-block-level" name="" size="30" tabindex="2" type="text">

					</div>

				</div>

				<div class="row">

					<div class="span4">

						<label data-required="true" for="">Expiration date</label>

						<select class="selectpicker span2" id="" name="" tabindex="3" style="display: none;">

							<option value="1">1 - January</option>

							<option value="2">2 - February</option>

							<option value="3">3 - March</option>

							<option value="4">4 - April</option>

							<option value="5">5 - May</option>

							<option value="6">6 - June</option>

							<option value="7">7 - July</option>

							<option selected="selected" value="8">8 - August</option>

							<option value="9">9 - September</option>

							<option value="10">10 - October</option>

							<option value="11">11 - November</option>

							<option value="12">12 - December</option>

						</select>

						<select class="selectpicker span2" id="" name="" tabindex="3" style="display: none;">

							<option selected="selected" value="2013">2013</option>

							<option value="2014">2014</option>

							<option value="2015">2015</option>

							<option value="2016">2016</option>

							<option value="2017">2017</option>

							<option value="2018">2018</option>

							<option value="2019">2019</option>

							<option value="2020">2020</option>

							<option value="2021">2021</option>

							<option value="2022">2022</option>

							<option value="2023">2023</option>

							<option value="2024">2024</option>

							<option value="2025">2025</option>

							<option value="2026">2026</option>

							<option value="2027">2027</option>

							<option value="2028">2028</option>

						</select>

						

					</div>

					<div class="span2">

						<p>

						<label for="">Security code</label>

						<input id="security_code" class="input-block-level" name="" size="30" tabindex="4" type="text">

						</p>

					</div>

					<div class="span2">

						<p>

						<label for="">Postal code</label>

						<input id="" class="input-block-level" name="" size="30" tabindex="5" type="text">

						</p>

					</div>

				</div>

				
				<p class="">By clicking the 'submit' button you are agreeing to the pricing above and our <a href="#">Terms and Conditions</a>.</p>
				
				<fieldset>

					<button class="btn btn-large btn-logo" type="button" type="submit">Submit</button>

				</fieldset>
				

				<div class="span8">

					<div class="hr-space"></div>

				</div>

				

				<!--<p class="description">Your summary text will appear.</p>

				<p class="description">______________________________________________________________________</p>

				<p class="description">______________________________________________________________________</p>

				<p class="description">______________________________________________________________________</p>

				<p class="description">______________________________________________________________________</p>
				-->
				

			</div>

			

			</form>



		</div> <!-- /row -->

	</div> <!-- /container account-form -->

	</form>

</section>



<!-- #START# - SIGN IN MODAL -->

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

<!-- #END# - SIGN IN MODAL -->



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

	

	<!-- Start socket -->

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

	<!-- End socket -->

	

	<!-- JavaScript -->

	<script src="../js/jquery-1.10.2.min.js"></script>

	<script src="../js/jquery-migrate-1.2.1.min.js"></script>

	<script src="../js/sizzle.min.js"></script>

	<script src="../js/bootstrap-2.3.2.min.js"></script>

	<script src="../js/plugins.js"></script>

	

	<!-- Custom JavaScript -->

	<script>

		$(function() {

			$('#datepicker').datepicker();

			$('.selectpicker').selectpicker();

		});

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

</html><!-- Last Updated on 2013-09-25 T 04:02:00 -04:00 -->
