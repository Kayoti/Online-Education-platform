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
if(isset($_GET["course_id"]))
{
	$course_id= $_GET["course_id"];
}	

	


$direction=('../Wowza/content/'.$fgmembersite->Userid().'-practice-course-'.$course_id.'.flv');


}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Needs -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<base href="http://presenterspodium.com/"/>
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
		<link rel="author" href="humans.txt" type="text/plain">
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
		<script src="../js/jwplayer.js"></script>
    </head>
    <body>
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

<div class="container" style="margin: 75px auto -100px;">
	<div class="container" id="player">
                                    <div id="my-video" style="text-align: center"></div>
                                    <script type="text/javascript">
									var simple = '<?php echo $direction;?>';
									
                                        jwplayer('my-video').setup({
                                            
                                            
                                            width: '960',
											height: '360',
											quality: '1',
											listbar: {
                                             position: 'right',
                                               size: 320
                                                },
												
											playlist: [
											{							
											file: simple,
											title: "Trial"
											}
										]
										});
                                    </script>
                                </div>
				            </div>
				

</section>
<div class="container" style="margin: 0px 0px 0px 300px ;">
         <div class="span4 offset1" style="" >
            <div class="container" id="stopwatch" style="display: inline;">
				<input class="btn btn-large btn-block btn-info" id="present" name="pButton" value="Dashboard" type="button" onclick="window.location='<?php echo "../student/dashboard.php?course_id=$course_id";?>'"/>
			</div>
		</div>
		</div>

		
		
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
		<script type="text/javascript">
		Modernizr.load([
			{load: [
				'../js/jquery-1.10.2.min.js',
				'../js/jquery-migrate-1.2.1.min.js',
				'../js/bootstrap-2.3.2.min.js'
			]}
		]);
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