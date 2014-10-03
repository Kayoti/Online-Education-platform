<?php
ob_start();
require_once("../include/membersite_config.php"); 
if(!$fgmembersite->CheckLogin())
{
$fgmembersite->LogOut();
    $fgmembersite->RedirectToURL("../index.php");
	exit;
}
//big else
else
{
$name= $fgmembersite->UserFullName();
$username = $fgmembersite->Userid();
$stud_id = $fgmembersite->GetStudId($username);
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$fgmembersite->LogOut();
	unset($_SESSION['status']);
	if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-10000);
	session_destroy();
}
$username = $fgmembersite->Userid();
if(isset($_GET["self"]))
{
	$self = $_GET["self"];
}
//self - 0 - evaluator is other student
//self - 1 - evaluator is self student
//self - 2 - evaluator is prof
if($self==0||$self==1)
{
	$stud_id = $fgmembersite->GetStudId($username);
}
else
	$prof_id = $fgmembersite->GetProfId($username);
if(isset($_GET["student_evaluated_id"]))
{
    $stud_evaluated_id = $_GET["student_evaluated_id"];
}
if(isset($_GET["week_no"]))
{
    $week_no = $_GET["week_no"];
}
if(isset($_GET["course_id"]))
{
    $crs_id = $_GET["course_id"];
}

require_once("../include/membersite_config.php");
 $subname = isset($_POST['subname']);
 if($subname)
    {
       $error = $fgmembersite->ValidatePeerEvaluationForm($self);
	   if($error=='')
	   {
		   if($self<2)
		   {
			   if($fgmembersite->InsertPeerEvaluation($self,$stud_evaluated_id, $stud_id, $week_no, $crs_id, 0))
				{
					//$stud_id is the person who is logged in and evaluating other students in the group
					//$stud_evaluated_id is the student being evaluated
					
					//echo "<script type='text/javascript'>alert('Profile updated successfully!');</script>";        
				}
			}
			else if($self==2)
			{
				//prof is evaluating
				if($fgmembersite->InsertPeerEvaluation($self,$stud_evaluated_id, $prof_id, $week_no, $crs_id, 1))
				{
					//$stud_id is the person who is logged in and evaluating other students in the group
					//$stud_evaluated_id is the student being evaluated
					
					//echo "<script type='text/javascript'>alert('Profile updated successfully!');</script>";        
				}
			}
		}
    }
	$eval_video=$fgmembersite->GetEvalVid($crs_id,$week_no,$stud_evaluated_id);
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
		<link href="../css/jquery.pageslide.css" rel="stylesheet">
	<!--[if IE 7]>

		<link rel="stylesheet" href="../css/font-awesome-ie7.min.css">

	<![endif]-->

	<!--[if lt IE 9]>

		<script src="../js/html5shiv-3.6.2.min.js"></script>

	<![endif]-->
		<script src="../js/modernizr-2.6.2.min.js"></script>

		<script src="../js/pace.min.js"></script>
		<script src="../js/jwplayer.js"></script>
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
<?php
if($self==2)
{
	echo '<div class="navbar">';
		echo '<div class="navbar-inner">';
			echo '<a class="brand" href="#"></a>';
			echo '<ul class="nav">';
				echo '<li class=""><a href="../professor/courseinfo.php?course_id='.$crs_id.'">Course Information</a></li>';
				echo '<li class="divider-vertical"></li>';
				echo '<li class="active"><a href="../professor/students.php?course_id='.$crs_id.'">Students</a></li>';
				echo '<li class="divider-vertical"></li>';
				echo '<li class=""><a href="../professor/topics.php?course_id='.$crs_id.'">Topics</a></li>';
				echo '<li class="divider-vertical"></li>';
				echo '<li class=""><a href="../professor/courses.php">Back to Courses</a></li>';
			echo '</ul>';
		echo '</div>';
	echo '</div>';
}
else
{
	echo '<div class="navbar">';

		echo '<div class="navbar-inner">';

			echo '<a class="brand" href="#"></a>';

			echo '<ul class="nav">';

				echo '<li class="active"><a href="courseinfo.php?course_id='.$crs_id.'">Course Information</a></li>';

				echo '<li class="divider-vertical"></li>';

				echo '<li><a href="dashboard.php?course_id='.$crs_id.'">Dashboard</a></li>';

				echo '<li class="divider-vertical"></li>';

				echo '<li><a href="history.php">History</a></li>';

				echo '<li class="divider-vertical"></li>';

				echo '<li><a href="courses.php">Back to Courses</a></li>';

			echo '</ul>';

		echo '</div>';

	echo '</div>';
}
?>


	<div class="container">

		<div class="row offset1">
			<div class="span6">
			<form class="form" action="<?php ?>" method='post' accept-charset='UTF-8'>

				<h1>Evaluate: <?php 
				require_once("../include/membersite_config.php"); 
				$student_evaluated = $fgmembersite->GetStudentProfile($stud_evaluated_id);
				echo $student_evaluated['s_fname']." ".$student_evaluated['s_lname'];
				?></h1>			
<div class="video-container">	
					 <div id="my-video" style="text-align: center"></div>					 
					 <script type="text/javascript">
									var simple = '<?php echo $eval_video;?>';
									   jwplayer('my-video').setup({
                                            
                                            
                                            width: '570',
											height: '250',
											quality: '1',
											
												
											playlist: [
											{							
											file: "../wowza/content/"+simple+".flv",
											title: "Play Video"
											}
										]
										});
					 </script>
				</div>				
				<!-- <img src="..\images\extra\home-video-placeholder.png" class="img-rounded"> -->
				<br>

				<a class="btn btn-logo btn-large" href="javascript:$.pageslide({ direction: 'left', href:'rubric.html' })">Rubric</a>

				<br>
			<?php $topicreturned = $fgmembersite->GetTopicSelected($crs_id,$week_no, $stud_evaluated_id);?>
			<?php echo '<br>';
							echo '<tr>';
										echo '<th style="vertical-align: bottom; text-align: center;">Topic Selected: </th>';
								echo '</tr>';
								echo '<tr>';
									if(!empty($topicreturned))
										echo '<td style="vertical-align: bottom; text-align: center;">'.$topicreturned.'</td>';
									else
										echo '<td style="vertical-align: bottom; text-align: center;">Empty submission.</td>';
								echo '</tr>';
								echo '<br>';
								?>
				<fieldset>
				<input type='hidden' type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
				<div class="text-error"><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
				<p class="text-error" id="error"><?php 	echo $error;//echo "Your total weightage must equal to 100. Currently your total is ".$error;?>
				</p>
				<div class="control-group">

					<label class="control-label">Comment </label>

					<div class="controls">

						<textarea rows="8" name="commentbox" placeholder="Instructions: indicate key aspects that the speaker did well in, in addition to something that could be improved. End on a summary / a positive note." maxlength="500" style="width:100%;"><?php echo $fgmembersite->Sanitize($_POST['commentbox']);?></textarea>

						<p class="help-block"></p>
					</div>
				</div>
				<?php
				//self = 0 means 
				if($self==0||$self==2)
				{
					echo '<div class="control-group">';

						echo '<label class="control-label">Question </label>';

						echo '<div class="controls">';

							echo '<textarea rows="1" placeholder="Let\'s be clear and concise. 75 Max. characters" name="questionbox" maxlength="75" style="width:100%;">';
								echo $fgmembersite->Sanitize($_POST['questionbox']);
							echo'</textarea>';

							echo '<p class="help-block"></p>';

						echo '</div>';

					echo '</div>';

					echo '<div class="control-group">';

						echo '<label class="control-label">Grade </label>';

						echo '<div class="controls">';

							echo '<div class="input-prepend input-append">';

								echo '<input class="input input-small" id="appendedPrependedInput" name="marks" maxlength="2" type="text" value="';
								echo $fgmembersite->Sanitize($_POST['marks']);
								echo '">';

								echo '<span class="add-on"> / 10</span>';

							echo '</div>';

						echo '</div>';

					echo '</div>';
				}
				?>
				<button class="btn btn-large btn-logo"type=" submit" name="subname">Submit</button>
				</fieldset>
			</form>
<p ><font size="2">Warning:  Any rude, offensive, discriminatory, racial, unethical, and obscene comments, questions, and behavior will result in termination from Presenters Podium and potential<br>
 penalties /repercussions from your institution.  Presenters Podium is designed to help you improve your oral communication and presentation skills.  Please be fair, use sound<br>
 judgments, and provide fair, constructive, helpful, comments, questions, and feedback.  Thank you for your cooperation.<br></font></p>
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
	<script src="../js/jquery.pageslide.min.js"></script>
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
