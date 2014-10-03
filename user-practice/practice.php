<?php
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
if(isset($_GET["week_no"]))
{

    $week_no = $_GET["week_no"];
	$course_id= $_GET["course_id"];
$_SESSION['week']=$week_no;
$_SESSION['class']=$course_id;

}	
	


//else if something went wrong and the status bar has no week(send us a report...


}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Needs -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		
		<link rel="dns-prefetch" href="//platform.twitter.com">
		<link rel="dns-prefetch" href="//www.facebook.com">
		<link rel="dns-prefetch" href="//plusone.google.com">
		<link rel="dns-prefetch" href="//apis.google.com">
		<link rel="dns-prefetch" href="//ssl.gstatic.com">
		<link rel="dns-prefetch" href="//static.ak.fbcdn.net">
		<link rel="dns-prefetch" href="//urls.api.twitter.com">
		<link rel="dns-prefetch" href="//connect.facebook.net">
		<link rel="dns-prefetch" href="//www.google-analytics.com">
		<link rel="dns-prefetch" href="//httpx.in">
		<link rel="dns-prefetch" href="//tialt.ca">
		<title>Presenters Podium</title>		
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- SEO Metadata /-->
		<meta name="robots" content="index,follow">
		<meta name="googlebot" content="noodp,noarchive,noimageindex">
		<meta name="revisit-after" content="1 month">
		<!-- Verification Metadata /-->
		<meta name="google-site-verification" content="">
		<meta name="msvalidate.01" content="">
		<meta name="alexaVerifyID" content="">
		<link rel="canonical" href="">
		<link rel="image_src" href="">
		<link rel="author" href="../humans.txt" type="text/plain">
		<!-- Favicon /-->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/favicon.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/favicon.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/favicon.png">
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="ico/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="ico/favicon.png">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		
		<!-- Fonts /-->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
		<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,800" rel="stylesheet" type="text/css"> -->
		<!-- CSS Stylesheets /-->
		<link href="../css/extra-css/normalize-1.1.2.css" rel="stylesheet">
		<link href="../css/bootstrap-2.3.2.min.css" rel="stylesheet">
		<link href="../css/bootstrap-responsive-2.3.2.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/font-awesome-3.2.1.min.css" rel="stylesheet">
		<!--[if IE 7]>
		<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
		<![endif]-->
		<!--<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">-->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="../js/modernizr-2.6.2.min.js" type="text/javascript"></script>
		<script src="../js/rnqg.js" type="text/javascript"></script>
		<script src="../js/stopwatch.js" type="text/javascript"></script>
		
		<script src="../js/foragainst.js" type="text/javascript"></script>
		
		<script src="../scripts/gen_validatorv31.js" type="text/javascript"></script>
		<script src="../js/countdown.js" type="text/javascript"></script>
		<script src="../js/cdtorecord.js" type="text/javascript"></script>
		<script src="../js/objectiveList.js" type="text/javascript"></script>
		
    </head>
    <body onload="cdtorecord();    disablebtns();">
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
		
<section class="content">
<div id="note" style="text-align: center;";>
		
		</div>
<div class="container" style="margin: 75px auto -100px;">
	<div class="row">
		<div class="span5 offset1">
			<div class="" style="margin: 0 auto; text-align: center;">
				<div id = "recordaftercd"> <!--Placeholder for Recorder-->
					
				</div>
				<div id="pressRecord">
					<ul style="list-style: none;">
						<p id="pr"><br><br></p>
					</ul>
				</div>
				<div id="listPlace">
					<ul id="list" style="list-style: none;">
					</ul>
				</div>
				<div id="instructions">
					<ul id="inst" style="list-style: none;">
<h5><li><h3>Instructions:</h3></li><br>
<li>Step 1: Set up camera.  Allow, approve, and make sure you can see yourself.</li><br>

<ul id="inst" style="list-style: none;">Step 2: Hit “present”.  Once you hit present, two things will happen simultaneously:

<li>A:  A countdown timer of 15 seconds will appear, giving you 15 seconds before the video begins recording.</li><br>

<li>B: Your topic and position (optional) will appear.  You’ll have 15 seconds to gather your thoughts.</li></ul><br>
Step 3: Once the 15 seconds reaches zero, it’s time to present<br>Good luck!
					</h5></ul>
				
				</div>
			</div>
		</div>
		<div class="span4 offset1" style="" >
			<!--<div class="title"><h3>Presenters Platform is a creative</h3></div>
			</br></br>-->
			<br>
			<div class="control-group success" id="generator">
				<label class="control-label" for="genRandom" style="color:#666666; font-size:24px; font-weight:300;">Topic to discuss:</label>
				<form name="random"><textarea type="text" id="genRandom" style="height: 70px; background-color:#F7FBFF; border:0px; colour:#0E73C0; font:helvetica;"name="random" size="100%" value="ex"></textarea></form>
			</div>
			<!--<p id="forAgainst" style="color:#666666; font-size:28px; font-weight:bold;">POSITION</p>-->
			<div id="countdown"></div>
			<br>
			<div class="container" id="stopwatch" style="display: inline">
				<input class="btn btn-large btn-block btn-info" id="present" name="pButton" value="Present" type="button" onclick="buttontocd();  getMessage();  document.getElementById('present').disabled=true;"/>
			</div>
			<br>
			<div class="container" id="stopbtndiv" style="display: inline">
				<input class="btn btn-large btn-block btn-danger" id="stopbtn" name="sButton" value="Stop" type="button" onclick="stopfnc(); document.getElementById('stopbtn').disabled=true; document.getElementById('playerbtn').disabled=false; document.getElementById('dashbtn').disabled=false;"/>
			</div>
			<br>
			<div class="container" id="playerbtndiv" style="display: inline">
				<input class="btn btn-large btn-block btn-success" id="playerbtn" name="pyButton" value="View Recording" type="button" onclick="window.location='<?php echo "../user-practice/practice-player.php?course_id=$course_id";?>'"/>
			</div>
			<br>
			<div class="container" id="dashbtndiv" style="display: inline">
				<input class="btn btn-large btn-block btn-info" id="dashbtn" name="dashButton" value="Dashboard" type="button" onclick="window.location='<?php echo "../student/dashboard.php?course_id=$course_id";?>'"/>
			</div>
			<br>
		</div>
	</div>
</div>


</section>        
		<!-- JavaScript /-->		
		<script type="application/javascript">
			function buttontocd() {
				var myCountdown2 = new Countdown({
					time: 15, 
					width:150, 
					height:150,
					target: countdown,
					onComplete: rcfunction(),
					rangeHi:"second",
                    numbers		: 	{
										font 	: "Arial",
										color	: "#ffffff",
										bkgd	: "#000000",
										rounded	: 0.15,				// percentage of size 
										shadow	: {
													x : 0,			// x offset (in pixels)
													y : 3,			// y offset (in pixels)
													s : 4,			// spread
													c : "#000000",	// color
													a : 0.4			// alpha	// <- no comma on last item!
													}
													} // <- no comma on last item!
					});
			}
			
			
			function rcfunction() {
				setTimeout(function() {startrecord();}, 15500);
				setTimeout(function() {enableStop();}, 16000);
			
			}
			
			function enableStop() {
				document.getElementById('stopbtn').disabled=false;
			}
			function startrecord(){
				document.VideoRecorder.record();
			}
			
			function disablebtns() {
				setTimeout(function() {document.getElementById('stopbtn').disabled=true;}, 50); 
				
				
			}
			
			function stopfnc() {
				document.VideoRecorder.stop();
			}
			
			
		</script>
		<script type="text/javascript">

		
		</script>
		<script type="text/javascript">
		Modernizr.load([
			{load: [
				'../js/jquery-1.10.2.min.js',
				'../js/jquery-migrate-1.2.1.min.js',
				'../js/bootstrap-2.3.2.min.js'
			]}
		]);
		</script>
		<script type="text/javascript">
			function recordMsg() {
				document.getElementById("pr").innerHTML="<b>Press <font color='red'>RED</font> button to start recording.</b>";
			};
		</script>
		
		<script type="text/javascript">
		
		</script>
		<!--
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script src="js/jquery.onecarousel.min.js"></script>
		<script src="js/jquery.tweet.js"></script>
		<script src="js/jflickrfeed.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/jquery.fitvids.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		-->
    </body>
	

</html>