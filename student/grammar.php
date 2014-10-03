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
$stud_id = $fgmembersite->GetStudId($username);
if(isset($_GET["course_id"]))
{
    $crs_id = $_GET["course_id"];
}
if(isset($_GET["week_no"]))
{
    $week_requested = $_GET["week_no"];
}

/*Calculate latest week allowed based on timer*/
$dateForCalFormat = "d F y";
$dateFormat = "D, d M Y - g:i a";
$currDate = time();
$currDateForCal = date($dateForCalFormat, $currDate);//This format is used for evaluation, presentation, grammar and vidresp deadlines

	$deadlines = $fgmembersite->GetDeadlines($crs_id,$stud_id,$week_requested);
	if(!empty($deadlines))
	{
		//echo '<br>'.date($dateFormat,$currDate).'<br>';
		if($currDate>$deadlines['grammar_deadline'])
			header('Location: ./dashboard.php?course_id='.$crs_id);
		else
			$currweekallowed = $week_requested;
	}
	else
		header('Location: ./dashboard.php?course_id='.$crs_id);

	if(isset($_SESSION['score'][$currweekallowed][$crs_id]))
	{
		$score = $_SESSION['score'][$currweekallowed][$crs_id];
	}
	else
		$score = 'N/A';
	
	
	$q_start = 10*$currweekallowed - 9;
	$q_curr = $q_start;
	if(isset($_GET["q_curr"]))
	{
		$q_curr = $_GET["q_curr"];//q_curr goes from 1 to 100 depending on the current week
		if($q_curr>=$q_start&&$q_curr<=$q_start+9)
		{
		}
		else
			$q_curr = $q_start;
	}	
	$q_id = $q_curr-(10*($currweekallowed-1));//q_id goes from 1 to 10 to display on the screen
	
	$question = $fgmembersite->GetGrammarQuestion($q_curr);
	$subname = isset($_POST['subname']);
	if($subname)
	{
		$answer = $fgmembersite->Sanitize(trim($_POST['inputanswer']));
		if($answer!=NULL&&($answer==$question['answer1']||$answer==$question['answer2']||$answer==$question['answer3']))
			$answervalue=10;
		else
			$answervalue=0;
		$fgmembersite->GrammarValidateAnswer($stud_id,$crs_id, $currweekallowed, $q_id, $q_curr, $answervalue);
	}
	


//echo "<script type='text/javascript'>alert('In PHP!');</script>";
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
		<style>
		table{
			table-layout: fixed;
		}

		td {
			
			overflow: hidden;
			width: 20px;
			height: 20px;
			text-align:center; vertical-align:middle;
		}
		</style>
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
			<li class="active"><a href="dashboard.php?course_id=<?php echo $crs_id;?>">Dashboard</a></li>
			<li class="divider-vertical"></li>
			<li><a href="<?php echo "history.php?course_id=$crs_id" ?>">History</a></li>
			<li class="divider-vertical"></li>
			<li><a href="courses.php">Back to Courses</a></li>
		</ul>
	</div>
</div>




<div class="container">
<div id="note" style="text-align: center;";>
		<h4><font color="red"> Caution:</font> Navigating away from this page after,during, or before completing each questions will count as your submission.</h4>
		</div>
		<h4><p>
			<font color="red"> Instructions:</font><br>
			A-&nbsp;Please correct the grammar sentence and submit your answer. Once you hit submit, you cannot correct your answer.<br>
			B-&nbsp;Navigate through the numbers in the question column below to review your answers.
		</p><br><br>
 <div class="row">
 
	<div class="span8 offset1">
	
		
	 </div>
 </div>
 <form  style="border:2px solid #a1a1a1;
padding:2% 0.5% 2% 2%; 

width:100%;
border-radius:25px;"class="form-horizontal" action="<?php ?>" method='post' accept-charset='UTF-8'>
	 <div class="row">
		<div class="span8 offset1">
			<span class="lead" id="part1"><?php if(!empty($question)) echo $question["part1"];?></span>
			<?php
			if(isset($_SESSION['answer'][$q_curr][$crs_id]))
			{
				if($_SESSION['answervalue'][$q_curr][$crs_id]==10)
					echo '<span class="lead text-success" style="font-weight:700;">'.$_SESSION['answer'][$q_curr][$crs_id].'</span>';
				else
				{
					echo '<span class="lead text-error" style="font-weight:700;">'.$_SESSION['answer'][$q_curr][$crs_id].'</span>';
				}
			}
			else if(!empty($question))
				echo '<input class="input-small lead" style="text-align:center" type="text" name="inputanswer" value="'.$question["wrong_answer"].'">';
			?> 
			<span class="lead" id="part2"><?php if(!empty($question)) echo $question["part2"];?></span>
		</div>
	 </div>
	 <br><br>
	 <div class="row">
		<div class="span8 offset1">
			
			<?php
				if(isset($_SESSION['answervalue'][$q_curr][$crs_id]))
				{
					if($_SESSION['answervalue'][$q_curr][$crs_id]==10)
						echo '<p class="lead">Your answer is correct!</p>';
					else
					{
						if(!empty($question))
						{
							echo '<span class="lead" id="part1">'.$question["part1"].'</span>';
							echo '<span class="lead text-success" style="font-weight:700;"> '.$question['answer1'].' </span>';
							echo '<span class="lead" id="part2">'.$question["part2"].'</span>';
						}
					}
					
				}
				else
				{
					echo '<div class="text-left">';
					echo '<button class="btn btn-large btn-logo" type="submit" name="subname">Submit</button></div>';
				}
			?>
		 </div>
	 </div>
 </form><br><br>
<div class="row">
	<div class="span1">
	</div>
	<div class="span2">
		<div class="input-prepend input-append">
			<span class="add-on">Question</span>
			<span class="input-mini uneditable-input" id="grammar" name="grammar"><?php echo $q_id;?></span>
			<span class="add-on">of 10</span>
		</div>
	</div>
    <div class="span2">
	  <div>
		<a class="btn btn-block btn-logo" disabled="disabled" href="#">Question</a>
	  </div>
    </div>
    <div class="span6">
	<table class="table table-bordered">
			<tr>
			<?php
				for($i=1; $i<=10; $i++)
				{
					if($i==$q_id)
					{
						echo '<td class="success"><a href="#">'.$i.'</a></td>';
					}
					else
						echo '<td><a href="grammar.php?course_id='.$crs_id.'&week_no='.$week_requested.'&q_curr='.($i+(10*($week_requested-1))).'">'.$i.'</a></td>';
				}
			?>

			</tr>
		</table>
    </div>
 </div>
 <div class="row">
	<div class="span1">
	</div>
	<div class="span2">
		<div class="input-prepend input-append">
			<span class="add-on">Score</span>
			<span class="input-mini uneditable-input" id="" name=""><?php echo $score;?></span>
			<span class="add-on">of 100%</span>
		</div>
	</div>
    <div class="span2">
	  <div>
		<a class="btn btn-block btn-inverse" disabled="disabled" href="#">Answer</a>
	  </div>
    </div>
    <div class="span6">
      <table class="table table-bordered">
			<tr>
			
			<?php
			for($i=1; $i<=10; $i++)
			{
				$i_curr = $i+(10*($week_requested-1));
				if(isset($_SESSION['answervalue'][$i_curr][$crs_id]))
				{//Display checkmark or wrongmark
					if($i==$q_id)
					{
						echo '<td class="success"><a href="#">';
						if($_SESSION['answervalue'][$i_curr][$crs_id]==0)//wrong answer
							echo '<i class="icon-remove"></i>';
						else
							echo '<i class="icon-ok"></i>';
						echo '</a></td>';
					}
					else
					{
						echo '<td><a href="grammar.php?course_id='.$crs_id.'&week_no='.$week_requested.'&q_curr='.$i_curr.'">';
						if($_SESSION['answervalue'][$i_curr][$crs_id]==0)//wrong answer
							echo '<i class="icon-remove"></i>';
						else
							echo '<i class="icon-ok"></i>';
						echo '</a></td>';
					}
				}
				else
				{
					if($i==$q_id)
					{
						echo '<td class="success"></td>';
					}
					else
						echo '<td></td>';
				}
			}
			?>

		</tr>
	  </table>
    </div>
 </div>
<br><br>



</div>
<br><br>
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
