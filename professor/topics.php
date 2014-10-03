<?php
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

if(isset($_GET["course_id"]))
{
    $course_id = $_GET["course_id"];
}  
$max_week = $fgmembersite->GetMaxWeek($course_id);
if($max_week==0)$max_week=1;
if(isset($_POST['submitted']))
{
	$max_week=$_POST['week'];
	if($fgmembersite->AddTopic($course_id))
	{
		  // echo "<script type='text/javascript'>alert('The Topic has been added successfully!');</script>";        
	} 
	
}
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
		<!-- End Header Menu -->
		
		<!-- Start Body Section -->
		<section class="content">

<div class="navbar">
	<div class="navbar-inner">
		<a class="brand" href="#"></a>
		<ul class="nav">
			<li class=""><a href="courseinfo.php?course_id=<?php echo $course_id;?>">Course Information</a></li>
			<li class="divider-vertical"></li>
			<li class=""><a href="students.php?course_id=<?php echo $course_id;?>">Students</a></li>
			<li class="divider-vertical"></li>
			<li class="active"><a href="#">Topics</a></li>
			<li class="divider-vertical"></li>
			<li class=""><a href="courses.php">Back To Courses</a></li>
		</ul>
	</div>
</div>

<br><br>

<div class="container">

<div class="accordion" id="accordion2">
<!-- Accordian Form -->
	<?php
	require_once("../include/membersite_config.php");
		for ($weekcount=1; $weekcount<=10; $weekcount++){

			 $topicDetails = $fgmembersite->GetTopicDetailsForWeek($course_id,$weekcount);
			 $chapterDetails = $fgmembersite->GetChapters($course_id,$weekcount);
			 if(empty($topicDetails))
			 {
					  echo "<div class='accordion-group'>";
						echo "<div class='accordion-heading'>";
						  echo "<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#collapse".$weekcount."'><h2>Week ".$weekcount."</h2></a>";
						echo "</div>";
						if($weekcount==$max_week)
						{	
							echo '<div id="collapse'.$weekcount.'" class="accordion-body collapse in">';
						}
						else
							echo '<div id="collapse'.$weekcount.'" class="accordion-body collapse">';
							echo '<div class="accordion-inner">';
								echo '<form class="form-horizontal enroll-form" action="" method="post" accept-charset="UTF-8">';
								echo "<input type='hidden' name='submitted' id='submitted' value='1'/>";
								echo "<input type='hidden' type='text'  class='spmhidip' name='";echo $fgmembersite->GetSpamTrapInputName();echo"' />";
								echo "<div class='text-error'><span class='error'>";echo $fgmembersite->GetErrorMessage();echo"</span></div>";
								echo "<input type='hidden' name='week' id='week' value='$weekcount'/>";
									echo '<div class="row">';
										echo '<div class="span5 text-center">';
										echo '<h3>Topics</h3>';
													echo '<div class="control-group">';
														echo '<label class="control-label lead" for="textinput1">1.</label>';
														echo '<div class="controls">';
															echo '<input class="input-xlarge" type="text" maxlength="75" id="textinput1" name="textinput1" placeholder="Topic1" value="'.$_POST["textinput1"].'">';
														echo '</div>';
													echo '</div>';
													echo '<div class="control-group">';
														echo '<label class="control-label lead" for="textinput2">2.</label>';
														echo '<div class="controls">';
															echo '<input class="input-xlarge" type="text" maxlength="75" id="textinput2" name="textinput2" placeholder="Topic2" value="'.$_POST["textinput2"].'">';
														echo '</div>';
													echo '</div>';
													echo '<div class="control-group">';
														echo '<label class="control-label lead" for="textinput3">3.</label>';
														echo '<div class="controls">';
															echo '<input class="input-xlarge" type="text" maxlength="75" id="textinput3" name="textinput3" placeholder="Topic3" value="'.$_POST["textinput3"].'">';
														echo '</div><br><br>';
														echo '<div class="control-group">';
														echo '<label class="control-label for="cardtype">Card Type:</label>'.
'<select class="form-control" id="time" name="time">'.
'<option value="selectcard">--- Please select ---</option>'.
'<option value="60">1 minute</option>'.
'<option value="120">2 minutes</option>'.
'<option value="180">3 minutes</option>'.
'<option value="240">4 minutes</option>'.
'<option value="300">5 minutes</option>'.
'<option value="360">6 minutes</option>'.
'<option value="420">7 minutes</option>'.
'<option value="480">8 minutes</option>'.
'<option value="600">10 minutes</option>'.
'<option value="900">15 minutes</option>'.
'<option value="1200">20 minutes</option>'.
'</select></br></div>';
echo '</div>';
echo '</div>';
										echo '<div class="span5 offset1 text-center">';
											echo '<div class="row text-center">';
													echo '<h3>Options</h3>';
													echo '<p class="lead" for="chapters">Chapters</p>';
														echo '<div class="control-group">';
															echo '<div class="control-group" id="chapters">';
																echo '<select class="selectpicker lead" name="chapters[]" multiple="" data-size="10" data-selected-text-format="count" style="display: none;">';
																	echo '<option value="1">Chapter 1</option>';
																	echo '<option value="2">Chapter 2</option>';
																	echo '<option value="3">Chapter 3</option>';
																	echo '<option value="4">Chapter 4</option>';
																	echo '<option value="5">Chapter 5</option>';
																	echo '<option value="6">Chapter 6</option>';
																	echo '<option value="7">Chapter 7</option>';
																	echo '<option value="8">Chapter 8</option>';
																	echo '<option value="9">Chapter 9</option>';
																	echo '<option value="10">Chapter 10</option>';
																echo '</select>';
															echo '</div>';
														echo '</div>';
											echo '</div>';
											echo '<div class="row text-center">';
													echo '<div class="span5">';
														echo '<p class="lead" for="topic-type">Topic Type</p>';
														echo '<div class="control-group">';
															echo '<input type="radio" id="radio3" name="topic-type" value="show" checked="">';
															echo '<label for="radio3">Show Topic</label>';
															echo '<input type="radio" id="radio4" name="topic-type" value="hide">';
															echo '<label for="radio4">Hide Topic</label><br>';
															
														echo '</div>';	
													echo '</div>';
													
											echo '</div>';
										echo '</div>';
									echo '</div>';
									echo '<div class="row">';
										echo '<br><br>';
									echo '</div>';
									echo '<div class="row">';
										echo '<div class="span3 offset4">';
											echo '<input class="btn btn-large btn-logo span3" onclick="fun()" type="submit" name="submit" value="Submit"/>';
										echo '</div>';
									echo '</div>';
									echo '<div class="row">';
										echo '<br><br>';
									echo '</div>';
								echo '</form>';
							echo '</div>';
						echo '</div>';
					  echo '</div>';
			}
			else
			{
					  //<!-- Accordian Form Ends-->
					  //<!-- Accordian Display -->
					  echo '<div class="accordion-group">';
						echo '<div class="accordion-heading">';
						  echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$weekcount.'"><h2>Week '.$weekcount.'</h2></a>';
						echo '</div>';
						if($weekcount==$max_week)
						echo '<div id="collapse'.$weekcount.'" class="accordion-body collapse in">';
						else
						echo '<div id="collapse'.$weekcount.'" class="accordion-body collapse">';
							echo '<div class="accordion-inner">';
								echo '<form class="form-horizontal enroll-form">';
									echo '<div class="row">';
										echo '<div class="span5 text-center">';
											echo '<h3>Topics</h3>';
											echo '<p class="lead text-center">1. '.$topicDetails["topic_name1"].'</p>';
											echo '<p class="lead text-center">2. '.$topicDetails["topic_name2"].'</p>';
											echo '<p class="lead text-center">3. '.$topicDetails["topic_name3"].'</p>';	
											$convert=($topicDetails["present_time"])/60;
											echo '<p class="lead text-center">Time Limit: '.$convert.' minutes</p>';												
										echo '</div>';	
										echo '<div class="span5 offset1">';	
										echo '<h3>Options Chosen</h3>';
												foreach($chapterDetails as $chapter){
												   echo "<a href='chapter.php?chapter_id=".$chapter."'><p class='lead'>Chapter".$chapter."</p></a>";  
												}
												// if($topicDetails["presentation_type"] == 1)
													// echo '<p class="lead">Presentation Type - For/Against</p>';
												// else if($topicDetails["presentation_type"] == 0)
													// echo '<p class="lead">Presentation Type - Content Specific</p>';
												if($topicDetails["topic_type"] == 0)
													echo '<p class="lead">Topics will be visible to students on their dashboard.</p>';
												else if($topicDetails["topic_type"] == 1)
													echo '<p class="lead">Topics will be invisible to students on their dashboard.</p>';
										echo '</div>';
									echo '</div>';
									
									echo '<div class="row">';
										echo '<br>';
									echo '</div>';
								echo '</form>';
							echo '</div>';
						echo '</div>';
					  echo '</div>';
			}
		}
	 ?>
  <!-- Accordian Display Ends-->
</div>
</div>
<!-- Accordian Ends-->
<!-- Container Ends-->
<br><br>
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
	<script src="../js/sizzle.min.js"></script>
	<script src="../js/bootstrap-2.3.2.min.js"></script>
	<script src="../js/plugins.js"></script>
	<!--check time submission-->
	<script>
	function fun()
{
 var ddl = document.getElementById("cardtype");
 var selectedValue = ddl.options[ddl.selectedIndex].value;
    if (selectedValue == "selectcard")
   {
    alert("Please select a card type");
   }
}
</script>
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