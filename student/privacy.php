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
else
{
$username = $fgmembersite->Userid();
$stud_id = $fgmembersite->GetStudId($username);
$name= $fgmembersite->UserFullName();
}
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
		<meta property="og:image" content="images/presenterspodium-200x200.jpg">		
		<link href="" rel="canonical">
		<link href="" rel="image_src">
		<link href="" rel="publisher">
		<link href="" rel="author">
		<link href="humans.txt" rel="author" type="text/plain">
		<link href="apple-touch-icon.png" rel="apple-touch-icon">
		<link href="favicon.ico" rel="shortcut icon">
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
		<link href="css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css">
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/html5shiv-3.7.0.min.js"></script>
	<![endif]-->
		<script src="../js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
		<!--[if lt IE 8]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<!-- Start Header Menu -->
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
							  echo "Hi,     ".$name." "; echo"<b class='caret'></b></a>
							
									<ul class='dropdown-menu'>
								    <li ><a  href='../student/profile.php'>Profile</a></li>
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
			<div class="container">
<br><br>
This Privacy Policy governs the manner in which Presenters Podium collects, uses, maintains and discloses information collected from users (each, a "User") of the www.presenterspodium.com website ("Site"). This privacy policy applies to the Site and all products and services offered by Presenters Podium, including without limitation the Presenters Podium software program<br/><br/>


Personal identification information<br/><br/>

We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number, credit card information. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.<br/><br/>

Non-personal identification information<br/><br/>

We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.<br/><br/>

Web browser cookies<br/><br/>

Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.<br/><br/>

How we use collected information<br/><br/>

Presenters Podium may collect and use Users personal information for the following purposes:<br/><br/>

•	- To improve customer service
Information you provide helps us respond to your customer service requests and support needs more efficiently.<br/><br/>
•	- To personalize user experience
We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.<br/><br/>
•	- To improve our Site
We may use feedback you provide to improve our products and services.<br/><br/>
•	- To process payments
We may use the information Users provide about themselves when placing an order only to provide service to that order. We do not share this information with outside parties except to the extent necessary to provide the service.<br/><br/>
•	- To run a promotion, contest, survey or other Site feature
To send Users information they agreed to receive about topics we think will be of interest to them.<br/><br/>
•	- To send periodic emails
We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests. If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email or User may contact us via our Site.
How we protect your information<br/><br/>

We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.<br/><br/>

Sensitive and private data exchange between the Site and its Users happens over a SSL secured communication channel and is encrypted and protected with digital signatures. Our Site is also in compliance with PCI vulnerability standards in order to create as secure of an environment as possible for Users.<br/><br/>

Sharing your personal information<br/><br/>

We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.<br/><br/>

Compliance with children's online privacy protection act<br/><br/>

Protecting the privacy of the very young is especially important. For that reason, we never collect or maintain information at our Site from those we actually know are under 13, and no part of our website is structured to attract anyone under 13.<br/><br/>

Changes to this privacy policy<br/><br/>

Presenters Podium has the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our Site, revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.<br/><br/>

Your acceptance of these terms<br/><br/>

By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.<br/><br/>

Contacting us<br/><br/>

If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:
Presenters Podium<br/><br/>
www.presenterspodium.com
22 Raymond Dr. Lower Sackville, Nova Scotia. Canada
9024894156
matthew.fanning10@gmail.com<br/><br/>

This document was last updated on October 17, 2013
			</div>
		</section>
	<!-- End Body Section -->

		

		<!-- Start Footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="span2 list-footer">
						<ul style="list-style: none;">
							<li><a href="../create-account.php">Create an Account</a></li>
							<li><a href="../enroll.php">Enroll</a></li>
							<li><a href="#">Learn More</a></li>
							<li><a href="#">Take a Tour</a></li>
							<li><a href="../contact.php">Contact Us</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Affiliate Program</a></li>
						</ul>
					</div>
					<div class="span2 offset1 list-footer">
						<ul style="list-style: none;">
							<li><a href="#">Research</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>

					<div class="span5 offset2">
						 <p class="footer-info">Presenters Podium provides students a focussed & collaborative environment to present, evaluate, & apply feedback multiple times throughout a semester while progressively learning & refining proper communication & presenting skills.<br><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->
	
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
</html><!-- Last Updated on 2013-10-01 T 12:00:00 -04:00 -->