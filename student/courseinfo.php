<?php
ob_start();
require_once("../include/membersite_config.php"); 
if(!$fgmembersite->CheckLogin())
{
$fgmembersite->LogOut();
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
$stud_id = $fgmembersite->GetStudId($username);

if(isset($_GET["course_id"]))
{
    $course_id = $_GET["course_id"];
}

$course_details = $fgmembersite->GetCourseInfo($course_id);
$course_university = $fgmembersite->GetCourseInstitue($course_id);
$course_prof = $fgmembersite->GetCourseProfessor($course_id);                  
 }                 
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8" />

</head>

<body>



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



	<section class="content">

		

		<div class="navbar">

			<div class="navbar-inner">

				<a class="brand" href="#"></a>

				<ul class="nav">

					<li class="active"><a href="#">Course Information</a></li>

					<li class="divider-vertical"></li>

					<li><a href="dashboard.php?course_id=<?php echo $course_id?>">Dashboard</a></li>
					
					<li class="divider-vertical"></li>

					<li><a href="history.php?course_id=<?php echo $course_id?>">History</a></li>
					<li class="divider-vertical"></li>

					<li><a href="courses.php">Back to Courses</a></li>

				</ul>
			<h4 style="float:right"> 24/7 support  call  +1 (902) 489-4156</h4>
			</div>

		</div>



		<div class="container">

		<div class="span6">

			<h3><?php echo $course_details["course_name"]; 
					  echo ' - ';
					  echo $course_details["course_no"]; 
					  ?>
			</h3>
			
			<p><?php echo $course_details["term"]; ?> <?php echo $course_details["year"]; ?></p>
			<p>Institute: <span class="text-info"><?php echo $course_university["u_name"]; ?></span></p>
			
			<p>Professor: <?php echo  $course_prof['first_name'].' '.$course_prof['last_name'];?></p>
			<p>Start Date: <?php echo $course_details["start_date"]; ?></p>

			<h3>Deadlines</h3>
			<p>Presentation: <span class="text-info">Thursdays at 11:59 pm</span></p>
			<p>Evaluation: <span class="text-info">Saturdays at 11:59 pm</span></p>
			<p>Video Response: <span class="text-info">Sundays at 11:59 pm</span></p>
			<p>Grammar: <span class="text-info">Sundays at 11:59 pm</span></p>

			<h3>Grading Scale</h3>

			<table class="table table-bordered">

				<thead>

					<tr>

					<th>Section</th>

					<th>Weight %</th>

					</tr>

				</thead>

				<tbody>

					<tr>

						<td>Presentation</td>

						<td><?php echo $course_details["presentation_weight"]; ?></td>

					</tr>

					<tr>

						<td>Question</td>

						<td><?php echo $course_details["question_weight"]; ?></td>

					</tr>

					<tr>

						<td>Evaluation</td>

						<td><?php echo $course_details["evaluation_weight"]; ?></td>

					</tr>

					<tr>

						<td>Video Response</td>

						<td><?php echo $course_details["video_response_weight"]; ?></td>

					</tr>

					<tr>

						<td>Grammar</td>

						<td><?php echo $course_details["grammar_weight"]; ?></td>

					</tr>

				</tbody>

			</table>

		</div>

		</div>



	</section>







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
