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
    $crs_id = $_GET["course_id"];
}
//echo "<script type='text/javascript'>alert('In PHP!');</script>";
$topic_week = $fgmembersite->GetTopicWeek($crs_id);
$max_week = $fgmembersite->GetMaxWeek($crs_id);
if($max_week==0)$max_week=1;

$dateForCalFormat = "d F y";
$dateFormat = "D, d M Y - g:i a";
$currDate = time();
$currDateForCal = date($dateForCalFormat, $currDate);//This format is used for evaluation, presentation, grammar and vidresp deadlines
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
							<a class="brand" href="../index.php">Presenters<span>P</span><i class="icon-comments"></i><span>dium</span></a>
						</div>
                        <ul class="nav">
							<?php 
			                   echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>";
							  echo "Hi,     ".$name." "; echo"<b class='caret'></b></a>
							
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
			<li><a href="<?php echo "courseinfo.php?course_id=$crs_id" ?>">Course Information</a></li>
			<li class="divider-vertical"></li>
			<li class="active"><a>Dashboard</a></li>
			<li class="divider-vertical"></li>
			<li><a href="<?php echo "history.php?course_id=$crs_id" ?>">History</a></li>
			<li class="divider-vertical"></li>
			<li><a href="courses.php">Back to Courses</a></li>
		</ul>
		<h4 style="float:right"> 24/7 support  call  +1 (902) 489-4156</h4>
	</div>
</div>

<br><br>

<div class="container">

<div class="accordion" id="accordion2">
<?php
$groupformed = 0;
for($weekcount=1; $weekcount<=10; $weekcount++)
{
  require_once("../include/membersite_config.php");
  $deadlines = $fgmembersite->GetDeadlines($crs_id,$stud_id,$weekcount);
  //
  if(!empty($deadlines))
  {
  //echo '<br>'.date($dateFormat,$currDate).'<br>';
  if($currDate>$deadlines['eval_deadline'])$contEval = false;else $contEval = true;
  if($currDate>$deadlines['grammar_deadline'])$contGrammar = false;else $contGrammar = true;
  if($currDate>$deadlines['ppt_deadline'])$contPpt = false;else $contPpt = true;
  if($currDate>$deadlines['vidresp_deadline'])$contVidresp = false;else $contVidresp = true;
  }
  
  
  echo '<div class="accordion-group">';
  if($weekcount<=$max_week)
  {
	echo  '<div class="accordion-heading">';
	echo    '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$weekcount.'"><h2>Week '.$weekcount.'</h2></a>';
  }
  else
  {
	echo  '<div class="accordion-heading accordion-disable">';
	echo    '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$weekcount.':Disable"><h2>Week '.$weekcount.'</h2></a>';
  }
  echo  '</div>';
  if($weekcount==$max_week)
  echo  '<div id="collapse'.$weekcount.'" class="accordion-body collapse in">';
  else
  echo  '<div id="collapse'.$weekcount.'" class="accordion-body collapse">';
  echo  '<div class="accordion-inner">';
  echo  '<div class="row auto-margin">';
				echo  '<div class="span4 text-center no-margin">';
					echo  '<div class="week-well">';
						echo  '<h2>Group</h2>';
						echo  '<br>';
						echo  '<div class="row">';
							
								
								require_once("../include/membersite_config.php");
								$studentsingroup = $fgmembersite->GetGroupIds($weekcount, $crs_id, $stud_id);
								$i = 0;
								if(!empty($studentsingroup))
								{
									$groupformed = 1;
									echo  '<div class="span2">';
									foreach($studentsingroup as $student)
									{
										$i++;
										if($student['student_id']!=$stud_id)
										{
											echo "<p style='font-size:50px;'><i class='icon-user'></i></p>";
											//echo "<img src='../images/user_icon80.gif' alt='' class='img-thumbnail'>";
											//echo "<br>";
											$ppt_flag = $fgmembersite->GetPresentedStudentIds($weekcount, $crs_id, $student['student_id']);
											$peer_eval_status = $fgmembersite->GetPeerEvaluationStatus($weekcount, $crs_id, $student['student_id'], $stud_id, 0);
											if($contEval==false && $ppt_flag==1 && $peer_eval_status==0)
											{
												echo "<p class='lead text-warning text-center'>".$student['s_fname']."</p>";
											}
											else if($ppt_flag==0)
											{
												echo "<p class='lead text-center'>".$student['s_fname']."</p>";
											}
											else
											{
												if($peer_eval_status==0)
													echo "<a href='evaluate.php?self=0&student_evaluated_id=".$student['student_id']."&student_id=".$stud_id."&course_id=".$crs_id."&week_no=".$weekcount."'><p class='lead text-center'>".$student['s_fname']."</p></a>";
												else
												{
													echo "<p class='lead text-center' style='text-decoration:line-through;'>".$student['s_fname']."</p>";
												}
											}
											//echo "<a class='btn btn-logo btn-block btn-large' href='evaluate.php?student_evaluated_id=".$student['student_id']."&student_id=".$stud_id."&course_id=".$crs_id."&week_no=1'>".$student['s_fname']." ".$student['s_lname']."</a>";
										}
										else 
										{
											echo "<p style='font-size:50px;'><i class='icon-user'></i></p>";
											//echo "<img src='../images/user_icon80.gif' alt='' class='img-thumbnail'>";
											//echo "<br>";
											$ppt_flag = $fgmembersite->GetPresentedStudentIds($weekcount, $crs_id, $student['student_id']);
											$peer_eval_status = $fgmembersite->GetPeerEvaluationStatus($weekcount, $crs_id, $student['student_id'], $stud_id, 0);
											if($contEval==false && $ppt_flag==1 && $peer_eval_status==0)
											{
												echo "<p class='lead text-warning text-center'>Self</p>";
											}
											else if($ppt_flag==0)
											{
												echo "<p class='lead text-center'>Self</p>";
											}
											else
											{	
												if($peer_eval_status==0)
													echo "<a href='evaluate.php?self=1&student_evaluated_id=".$student['student_id']."&student_id=".$stud_id."&course_id=".$crs_id."&week_no=".$weekcount."'><p class='lead text-center'>Self</p></a>";
												else
													echo "<p class='lead text-center' style='text-decoration:line-through;'>Self</p>";
											}
										}
										if(($i%2)==0)
										{
										echo "</div><div class='span2'>";
										}
										//else echo "<br>";
									}
									echo  '</div>';
								}
								else
								{
									echo "<p class='lead text-center'>Groups haven't been formed yet.</p>";
									$groupformed = 0;
								}
							
						echo  '</div>';
					echo  '</div>';
				echo  '</div>';
				echo  '<div class="span4 text-center no-margin">';
					echo  '<div class="week-well">';
						echo  '<h2>Topics</h2>';
						echo  '<br>';

						$topics = $fgmembersite->GetTopics($weekcount, $crs_id);
						$hide = $fgmembersite->GetHideShowTopics($weekcount, $crs_id);//0-show, 1-hide
						$question_count = $fgmembersite->GetQuestionCount($crs_id, $weekcount, $stud_id);
						$present_done= $fgmembersite->GetPresentFlag($crs_id, $weekcount, $stud_id);
						$response_done=$fgmembersite->GetResponseFlag($crs_id, $weekcount, $stud_id);
						if(!empty($topics))
						{
							if(!$hide)
							{
								echo "<p class='lead text-center'>1. ".$topics["topic_name1"]."</p>";
								//echo "<br><br>";
								echo "<p class='lead text-center'>2. ".$topics["topic_name2"]."</p>";
								//echo "<br><br>";
								echo "<p class='lead text-center'>3. ".$topics["topic_name3"]."</p>";
							}
							else
							{
								echo "<p class='lead text-center'>Topics for this week are impromptu and will appear when you start presenting</p>";
							}
							if($groupformed==1)
							{
								$ppt_flag = $fgmembersite->GetPresentedStudentIds($weekcount, $crs_id, $stud_id);
								//if($ppt_flag==0 && $contPpt==false)
								//{
								//	echo "<a class='btn btn-large btn-danger disabled' href='#'>Present</a>";
								//}
								 if($ppt_flag==0)
								{
									//echo "<a class='btn btn-large btn-logo' id='presentWarning'  href='#presentWarningModal".$weekcount."' data-toggle='modal'>Present</a>";
									echo "<a class='btn btn-large btn-logo' href='../user-video/platform.php?week_no=$weekcount&course_id=$crs_id'>Present</a> ";
									$presentname = isset($_POST['presentname'.$weekcount]);
									if($presentname)
									{
									   $fgmembersite->RedirectToURL('../user-video/platform.php?week_no='.$weekcount.'&course_id='.$crs_id);
									}
								}
								else if($ppt_flag==1)
									echo "<img style='padding-left:50px;' src='../images/check-mark.png' alt='File Submitted! -no image'>";
								else
									echo "<a class='btn btn-large disabled' href='#'>Present</a>";
							}
							else
								echo "<a class='btn btn-large disabled' href='#'>Present</a>";
							if($groupformed==1)
							{
								$vid_flag = $fgmembersite->GetVideoResponseFlag($stud_id,$crs_id, $weekcount);
								$question_count = $fgmembersite->GetQuestionCount($crs_id, $weekcount, $stud_id);
								if($contVidresp==false && $vid_flag==0 && $question_count>=1)
								{
									echo "<a class='btn btn-large btn-danger disabled' href='#'>Respond</a>";
								}
								else if($question_count==0)
									echo "<a class='btn btn-large disabled' href='#'>Respond</a>";
								else if($vid_flag==1)
									echo "<img src='../images/check-mark.png' alt='File Submitted! -no image'>";
								else
								{
									echo "<a class='btn btn-large btn-logo' id='respondWarning'  href='#respondWarningModal".$weekcount."' data-toggle='modal'>Respond</a>";
									//echo "<a class='btn btn-large btn-logo' href='../user-respvid/response.php?week_no=$weekcount&course_id=$crs_id'>Respond</a>";
									$respondname = isset($_POST['respondname'.$weekcount]);
									if($respondname)
									{
									   $fgmembersite->RedirectToURL('../user-respvid/response.php?week_no='.$weekcount.'&course_id='.$crs_id);
									}
								}
							}
							else
								echo "<a class='btn btn-large disabled' href='#'>Respond</a>";
							
							
							
							
							/*
							if($present_done==0 && $groupformed==1)
							{
								echo "<a class='btn btn-large btn-logo' href='../user-video/platform.php?week_no=$weekcount&course_id=$crs_id'>Present</a> ";
							}
							else if(($present_done==0 && $groupformed==0))
							{
								echo "<a class='btn btn-large disabled' href='#'>Present</a> ";
							}
							else if($present_done==1 && $groupformed==1)
							{
							 echo "<img src='../images/check-mark.png' alt='File Submitted! -no image'>";
							}
							if($question_count==1 && $groupformed==1)
							{
								if($response_done==1)
								{
									echo "<img src='../images/check-mark.png' alt='File Submitted! -no image'>";
								}
								else
								{
									echo "<a class='btn btn-large btn-logo' href='../user-respvid/response.php?week_no=$weekcount&course_id=$crs_id'>Respond</a>";
								}
							}
							else if(($question_count==0 && $groupformed==0))
							{
								echo "<a class='btn btn-large disabled' href='#'>Respond</a>";
							}	
							else if(($question_count==0 && $groupformed==1))
							{
								echo "<a class='btn btn-large disabled' href='#'>Respond</a>";
							}*/	
							
						}
						else
						{
							 echo "<p class='lead text-center'>No Topics Available Yet</p>";
							 echo "<a class='btn btn-large disabled' href='#'>Present</a> ";
							 echo "<a class='btn btn-large disabled' href='#'>Respond</a>";
						}

					echo '</div>';
				echo '</div>';
				echo '<div class="span4 text-center no-margin">';
					echo '<div class="week-well">';
						echo '<h2>Lessons for this week</h2>';
						echo '<br>';

							$chapters = $fgmembersite->GetChapters($crs_id,$weekcount);
							if(!empty($chapters))
							{
								foreach($chapters as $chapter)
								{
									echo "<a href='chapter".$weekcount.".php?chapter_id=".$chapter."&course_id=".$crs_id."'><p class='lead text-center'>Lesson ".$chapter."</p></a>";
								}
								
							}
							else
							{
								echo "<p class='lead text-center'>No Chapters Available Yet</p>";
								//echo "<a class='btn btn-large disabled' href='#'>Practice</a> ";
								//echo "<a class='btn btn-large disabled' href='#'>Grammar</a>";
							}
							echo "<a class='btn btn-large btn-logo' href='../user-practice/practice.php?week_no=$weekcount&course_id=$crs_id'>Practice</a> ";
							$grammar_status = $fgmembersite->GetGrammarStatus($stud_id,$crs_id, $weekcount);
							if(!empty($deadlines))
							{	 
								if($contGrammar==false && $grammar_status==0)
									echo "<a class='btn btn-large btn-danger disabled' href='#'>Grammar</a>";
								else if($contGrammar==true && $grammar_status==0)
									echo "<a class='btn btn-large btn-logo' href='grammar.php?course_id=".$crs_id."&week_no=".$weekcount."'>Grammar</a>";
								else if($contGrammar==true && $grammar_status!=0)
									echo "<img src='../images/check-mark.png' alt='File Submitted! -no image'>";
								else
									echo "<a class='btn btn-large disabled' href='#'>Grammar</a>";
							}
							else
								echo "<a class='btn btn-large btn-logo disabled' href='#'>Grammar</a>";
							
					echo '</div>';
				echo '</div>';
			echo '</div>';
			//End previous row
			if(!empty($deadlines))
			{  
				echo '<div class="row auto-margin">';
					echo '<div class="span4 text-center no-margin">';
						echo '<br><br>';
						echo 'Evaluations deadline: '.date($dateFormat,$deadlines['eval_deadline']).'.';
					echo '</div>';
					echo '<div class="span4 text-right no-margin">';
						echo '<br><br>';
						echo 'Presentation deadline: '.date($dateFormat,$deadlines['ppt_deadline']).'.<br>';
						echo 'Video Response deadline: '.date($dateFormat,$deadlines['vidresp_deadline']).'.';
					echo '</div>';
					echo '<div class="span4 text-right no-margin">';
						echo '<br><br>';
						echo 'Grammar deadline: '.date($dateFormat,$deadlines['grammar_deadline']).'.';
					echo '</div>';
				echo '</div>';
			}
		echo '</div>';
    echo '</div>';
  echo '</div>';
 }
 ?>

<br><br>
</section>

<!-- #START# - Present MODAL -->
<?php
for($presentcount=1; $presentcount<=10; $presentcount++)
{
		echo '<div id="presentWarningModal'.$presentcount.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:4%;">';
			echo '<div class="modal-header">';
				echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>';
				echo '<h3 id="myModalLabel" class="text-center">Warning</h3>';
			echo '</div>';
			
			echo '<div class="modal-body">';
				echo '<p class="text-center">Are you ready to present?  If so, please hit “present”.'; 
					echo 'Once entering into the present platform, hitting the back button, closing the screen, or disconnecting is considered your submission.'; 
					echo 'Is your audio and video working properly?  Do you need to return to the practice platform to make sure everything is working properly?';
				echo '</p>';
				
			echo '</div>';
			echo '<div class="modal-footer" style="height:30px;">';
				echo '<form class="form-horizontal" action="#" method="post">';
					
					echo '<div class="control-group text-center">';
						echo '<p>';
							echo '<a class="btn btn-inverse" href="#presentWarningModal'.$presentcount.'" data-toggle="modal">I\'ll Practice</a>';
							echo '<button type="submit" class="btn btn-logo" name="presentname'.$presentcount.'">Present</button>';
						echo '</p>';				
					echo '</div>';
				echo '</form>';
			echo '</div>';
		echo '</div>';
}
?>
<!-- #END# - Present MODAL -->
<!-- #START# - Respond MODAL -->
<?php
for($modalcount=1; $modalcount<=10; $modalcount++)
{
		echo '<div id="respondWarningModal'.$modalcount.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:4%;">';
			echo '<div class="modal-header">';
				echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>';
				echo '<h3 id="myModalLabel" class="text-center">Warning</h3>';
			echo '</div>';
			
			echo '<div class="modal-body">';
				echo '<p class="text-center">';
					echo 'Are you ready to respond to your question?  If so, please hit “respond”.';
					echo 'Remember: Once entering into the respond platform, hitting the back button, closing the screen, or disconnecting is considered your submission.';  
				echo '</p>';
				
			echo '</div>';
			echo '<div class="modal-footer" style="height:30px;">';
				echo '<form class="form-horizontal" action="#" method="post">';
					
					echo '<div class="control-group text-center">';
						echo '<p>';
							echo '<a class="btn btn-inverse" href="#respondWarningModal'.$modalcount.'" data-toggle="modal">I\'ll Wait</a>';
							echo '<button type="submit" class="btn btn-logo" name="respondname'.$modalcount.'">Respond</button>';
						echo '</p>';				
					echo '</div>';
				echo '</form>';
			echo '</div>';
		echo '</div>';
}
?>
<!-- #END# - Respond MODAL -->

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
