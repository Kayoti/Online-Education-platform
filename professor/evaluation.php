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
$prof_id = $fgmembersite->GetProfId($username);
if(isset($_GET["student_id"]))
{
    $student_id = $_GET["student_id"];
}
if(isset($_GET["course_id"]))
{
    $course_id = $_GET["course_id"];
}


$student_name = $fgmembersite->GetStudentName($student_id);
$student_evaluation = $fgmembersite->GetStudentEval($student_id,$course_id);
$weight = $fgmembersite->GetCourseWeight($course_id);              
    
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
							<a class="brand" href="../index.php">Presenters<span>P</span><i class="icon-comments"></i><span>dium</span></a>
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
				<li class=""><a href="courseinfo.php?course_id=<?php echo $course_id;?>">Course Information</a></li>
				<li class="divider-vertical"></li>
				<li class="active"><a href="students.php?course_id=<?php echo $course_id;?>">Students</a></li>
				<li class="divider-vertical"></li>
				<li class=""><a href="topics.php?course_id=<?php echo $course_id;?>">Topics</a></li>
				<li class="divider-vertical"></li>
				<li class=""><a href="courses.php">Back to Courses</a></li>
			</ul>
			<h4 style="float:right"> 24/7 support  call  +1 (902) 489-4156</h4>
		</div>
	</div>

	<div class="container">
		<h2 class=""><?php echo $student_name["s_fname"];?> <?php echo $student_name["s_lname"];?></h2>
		<h4>Note:  Please click the number under “week” to evaluate a student</h4>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered">
					<tdead>
						<tr>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Week</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>History</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Presentation</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Evaluations</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Question</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Video Response</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Grammar</strong></th>
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong>Total</strong></th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                        $week_total = 0;
                        $no_of_weeks = 0;
                        //foreach ($course_weight as $weight){
                            $presentation_weight=$weight["presentation_weight"];
                            $question_weight=$weight["question_weight"];
                            $evaluation_weight=$weight["evaluation_weight"];
                            $video_response_weight=$weight["video_response_weight"];
                            $grammar_weight=$weight["grammar_weight"];
                        //}
                        foreach ($student_evaluation as $week){
                            $wk_no = $week["week_no"];
							$video_response_flag = $fgmembersite->GetVideoResponseFlag($student_id,$course_id, $wk_no);
                            $ppt_marks = $week["avg_ppt_marks"]*($presentation_weight);
                            $eval_marks=$week["evaluation_marks"]*($evaluation_weight);
                            $que_marks = $week["question_marks"]*($question_weight);
                            $vr_marks = $video_response_flag*($video_response_weight);
                            $grm_marks = $week["grammar_marks"]*($grammar_weight);
                            $total = $ppt_marks+$eval_marks+$que_marks+$vr_marks+$grm_marks;
                            $week_total = $week_total + $total;
                            $no_of_weeks++;
                            echo "<tr><td style='vertical-align: center; text-align: center; line-height: 40px;'>";
							$peer_eval_status = $fgmembersite->GetPeerEvaluationStatus($wk_no, $course_id, $student_id, $prof_id);
							if($peer_eval_status>0)
								echo "<a style='text-decoration: none;' href='#' onClick='return false;' data-toggle='tooltip' title='You cannot evaluate again.'><div class='number-circle-disabled' style='display: inline-block; float:none; margin: 0; clear: both;'>$wk_no</div></td>";
							else
								echo "<a style='text-decoration: none;' href='../student/evaluate.php?self=2&student_evaluated_id=".$student_id."&course_id=".$course_id."&week_no=".$wk_no."'><div class='number-circle' style='display: inline-block; float:none; margin: 0; clear: both;'>$wk_no</div></td>";
							echo "<td style='vertical-align: center; text-align: center; line-height: 40px;'><a style='text-decoration: none;' href='history.php?course_id=".$course_id."&student_evaluated_id=".$student_id."&week_no=".$wk_no."'>Week $wk_no</td>";
							echo "<td style='vertical-align: center; text-align: center; line-height: 40px;'>";
                            echo $ppt_marks;
                            echo "</td><td style='vertical-align: center; text-align: center; line-height: 40px;'>";
                            echo $eval_marks;
                            echo "</td><td style='vertical-align: center; text-align: center; line-height: 40px;'>";
                            echo $que_marks;
                            echo "</td><td style='vertical-align: center; text-align: center; line-height: 40px;'>";
                            echo $vr_marks;
                            echo "</td><td style='vertical-align: center; text-align: center; line-height: 40px;'>";
                            echo $grm_marks;
                            echo "</td><td style='vertical-align: center; text-align: center; line-height: 40px;'><strong>";
                            echo $total;
                            echo "</strong></td></tr>";                            
                        }
						$marks = 0;
                        if($week_total>0 && $no_of_weeks > 0){
                            $marks = $week_total / $no_of_weeks;
                        }
                        ?>
						
						<tr>
							<td style="vertical-align: center; text-align: right; line-height: 40px;" colspan="7"><strong>Marks</strong></td>
                            
							<td style="vertical-align: center; text-align: center; line-height: 40px;"><strong><?php echo $marks;?></strong></th>
						</tr>
					</tbody>
				</table>
			</div>
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
