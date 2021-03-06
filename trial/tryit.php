<?PHP
ob_start();
require_once("../include/membersite_config.php");  

$userFullname;
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$fgmembersite->LogOut();
	unset($_SESSION['status']);
	if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-10000);
	session_destroy();
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
    $username = $fgmembersite->Userid();
	$url = "profile-student.php?status=loggedin&name=$username";
     
	$rolo =$fgmembersite->UserRoleType();
	$stdn = '0';

		if($rolo == $stdn)
		{   
		$fgmembersite->RedirectToURL($url);
		}
		else
		{
		 $fgmembersite->RedirectToURL("profile-professor.php?status=loggedin");
		}  
	}
	else
	{
		$fgmembersite->RedirectToURL("login.php?status=failedLogin");
		
	}
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
		<script src="../js/stopwatch.js" type="text/javascript"></script>
		<script src="../js/foragainst.js" type="text/javascript"></script>
		
		<script src="../scripts/gen_validatorv31.js" type="text/javascript"></script>
		<script src="../js/countdown.js" type="text/javascript"></script>
		<script src="../js/cdtorecord.js" type="text/javascript"></script
		
    </head>
    <body onload="cdtorecord(); disablebtns();">
        <!-- Start header -->
        <header class="header">
            <div class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                         <div class="brand-wrapper">
							<a class="brand" href="../index.php">Presenters<span>P</span><i class="icon-comments"></i><span>dium</span></a>
						</div>
                        <ul class="nav">
                            <!-- <li class="active"><a href="index.html"></a></li> -->
                            <li><a href="../student.php">Student</a></li>
							<li><a href="../professor.php">Professor</a></li>
							<li><a href="../enroll.php">Enroll</a></li>
							<li><a href="../create-account.php">Create Account</a></li>
                            <li><a href="">Welcome <b>Tester</b></a></li>
                        </ul>
                    </div>
                </div>                
            </div>            
        </header>
        <!-- End header -->          
		
<section class="content">

<div class="container" style="margin: 55px auto auto;">
	<div class="row">
		<div class="span5 offset1">
			<div class="" style="margin: 0 auto; text-align: center;">
				<div id = "recordaftercd"> <!--Placeholder for Recorder-->
					
				</div>
				
				<div id="listPlace">
					<ul id="list" style="list-style: none;">
					</ul>
				</div>
				
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
		<div class="span4 offset1" style="" >
			<!--<div class="title"><h3>Presenters Platform is a creative</h3></div>
			</br></br>-->
			<div class="control-group success" id="generator">
				<h1>Topic</h1><br>
				<form name="random" style="margin:0"><textarea type="text" id="genRandom" style="height: 70px; background-color:#F7FBFF; border:0px; colour:#0E73C0; font:helvetica; font-size:16px;" name="random" size="100%" value="ex"></textarea></form>
			</div>
                        <!--<p class="btn btn-large" id="forAgainst" type="text" readonly size="60%">POSITION</p>-->
			<h2 style="margin-top:20px; margin-bottom:20px;"><p id="forAgainst" style="margin-top:20px; margin-bottom:20px;">POSITION</p></h2>
			<div id="countdown"></div>
			<br>
			<div class="container" id="stopwatch" style="display: inline">
				<input class="btn btn-large btn-block btn-info" id="present" name="pButton" value="Present" type="button" onclick="buttontocd(); getMessage(); getForAgainst(); recordMsg(); document.getElementById('present').disabled=true;"/>
			</div>
			<br>
			<div class="container" id="stopbtndiv" style="display: inline">
				<input class="btn btn-large btn-block btn-danger" id="stopbtn" name="sButton" value="Stop" type="button" onclick="stopfnc(); document.getElementById('stopbtn').disabled=true; document.getElementById('playerbtn').disabled=false;"/>
			</div>
			<br>
			<div class="container" id="playerbtndiv" style="display: inline">
				<input class="btn btn-large btn-block btn-success" id="playerbtn" name="pyButton" value="Player" type="button" onclick="window.location='try-player.php';"/>
			</div>
			<br>
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
					 
                    <!--<div class="span2" style="text-align: center; display: block; margin-left: auto; margin-right: auto;">
						<a href="index.html"><img src="images/presenters-platform-logo-watermark.png" alt="" width="120" height="120"></a>
                    </div>-->
					 
                    <div class="span5 offset2">
                         <p class="footer-info">Presenters Podium provides students a focussed & collaborative environment to present, evaluate, & apply feedback multiple times throughout a semester while progressively learning & refining proper communication & presenting skills.
						 </br><a href="#">Learn More</a></p>
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
					<h3>
					<a href="http://facebook.com/" target="_blank"><i class="icon-facebook"></i></a>
					<a href="https://twitter.com/" target="_blank"><i class="icon-twitter"></i></a>
					</h3>
				</div>
            </div>
        </section>
        </section>
        <!-- End socket -->
		<!-- JavaScript /-->		
		<script type="application/javascript">
			function buttontocd() {
				var myCountdown2 = new Countdown({
					time: 15, 
					width:150, 
					height:120,
					target: countdown,
					onComplete: rcfunction(),
					rangeHi:"second"	// <- no comma on last item!
					});
			}
			
			
			function rcfunction() {
				setTimeout(function() {startrecord();}, 15500);
				setTimeout(function() {enableStop();}, 20500);
			
			}
			
			function enableStop() {
				document.getElementById('stopbtn').disabled=false;
			}
			function startrecord(){
				document.VideoRecorder.record();
			}
			
			function disablebtns() {
				setTimeout(function() {document.getElementById('stopbtn').disabled=true;}, 50); 
				setTimeout(function() {document.getElementById('playerbtn').disabled=true}, 50);
			}
			
			function stopfnc() {
				document.VideoRecorder.stop();
				document.VideoRecorder.save();
				
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