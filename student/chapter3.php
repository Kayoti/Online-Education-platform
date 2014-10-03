<?php
ob_start();
    if(isset($_GET["chapter_id"]))
{
    $chapter_id = $_GET["chapter_id"];
}
if(isset($_GET["course_id"]))
{
    $crs_id = $_GET["course_id"];
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
			<li class="active"><a href="courseinfo.php?course_id=<?php echo $crs_id;?>">Course Information</a></li>

				<li class="divider-vertical"></li>

				<li><a href="dashboard.php?course_id=<?php echo $crs_id;?>">Dashboard</a></li>

				<li class="divider-vertical"></li>

				<li><a href="history.php">History</a></li>

				<li class="divider-vertical"></li>

				<li><a href="courses.php">Back to Courses</a></li>
		</ul>
	</div>
</div>

<div class="container">
<div class="page-header text-center">
                                                                       
                                                                     
                                                                     
                                             
                                                                     
                                                                     
                                                                     
                                             
<h1>Chapter <?php echo $chapter_id;?></h1>
</div>
<p class="lead"><br/><br/>

<b>How to develop an Argument –</b><br/><br/>

The purpose of an argument, whether you’re on the for or the against is to state your general message, your claims and supporting material for each claim.<br/><br/>  

You want to attempt to be as clear and concise as possible so your audience members will not be confused.<br/><br/>

Note:  Research indicates that people remember most what they hear last.
Position your argument against the opposition in a way that tackles the toughest obstacles first and the weakest last.  By strategically placing the weakest rebuttal last with your strongest solution, you come off as having a stronger position while conveying a more convincing argument.<br/><br/>  

The general structure of an argument is the same as what we discussed in chapter two.<br/><br/>  

<b>Opening - General message/thesis</b><br/><br/>

<b>Body -</b>

Main point (Claim) # 1
Sub point # 1
•  #1 support material
•  #2 support material<br/><br/>

Main point (Claim) # 2
Sub point # 2
•  #1 support material
•  #2 support material<br/><br/>

Optional<br/><br/> 

Main point (Claim) # 3
Sub point # 3
•  #1 support material
•  #2 support material<br/><br/>

Conclusion – Sum up, review, reiterate, and end on a lasting impression.<br/><br/>

<b>Why is 3 unique?</b><br/><br/>

Whether our brains were hardwired when growing up through mathematics, science, religion, movies, sports, or music, there is something profound about the number three.  Three resonates with the human mind more than any other number.  
For further information: http://en.wikipedia.org/wiki/3_(number)<br/><br/>

Therefore, structuring your presentation with three main points may help your audience follow along, comprehend, and recall your information better as they will be able to relate to the number three.<br/><br/>

Supporting points – Your evidence<br/><br/>

Your evidence is used to validate and support your claim.<br/><br/>

Ensure your evidence:<br/><br/>

•  Relates to your main point
•  Concrete
•  Creditable<br/><br/>

Evidence explains how and why.<br/><br/>

Framework for a claim:<br/><br/>

Main point (Claim) # 1

1:  State your claim
2:  Briefly explain your claim
3:  Supporting material # 1 & # 2:  Use stats, facts, examples, testimonials, anecdotes, etc. to verify your claim and how it relates to claim # 1 (main point)
4:  Conclude your first claim and how it ties into the general purpose of your message.<br/><br/>

When making a claim, you should ask yourself:  Does my supporting material back my claim?  Is it strong? Relevant? Clearly explained?<br/><br/>

General statement → Claim → Supporting material:  Explain, prove, conclude → how it relates to the general purpose.<br/><br/>  

At the end of an argument, your audience or opponent should be able to identify:<br/><br/> 

•  The Issue 
•  Cause 
•  How to fix it/why it doesn’t need to be fixed (Your solution – main points)
•  Result – If we fix it then… / It doesn’t need to be fixed because (sum up)<br/><br/>

</p>
</div>

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
						<li><a href="create-account.html">Create an Account</a></li>
						<li><a href="enroll.html">Enroll</a></li>
						<li><a href="#">Learn More</a></li>
						<li><a href="#">Take a Tour</a></li>
						<li><a href="contact.html">Contact Us</a></li>
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
