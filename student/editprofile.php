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
$stud_id = $fgmembersite->GetStudId($username);


				  $student_profile = $fgmembersite->GetStudentProfile($stud_id);
				  $student_university = $fgmembersite->GetStudentUniversity($stud_id);

 $subname = isset($_POST['subname']);
 if($subname)
    {
       if($fgmembersite->UpdateStudentProfile($stud_id))
        {
            echo "<script type='text/javascript'>alert('Profile updated successfully!');</script>";        
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
		<script>
		
			function name_click(){
				value_select = document.getElementById("u_list").value;
				if(value_select=="other")
				{
					//alert("inside other");
					var changeIt = document.getElementsByClassName("control-group span7");
					for (var i = 0; i < changeIt.length; i++) {
							changeIt[i].style.display = "";
					}						
				}
				else
				{
					var changeIt = document.getElementsByClassName("control-group span7");
					for (var i = 0; i < changeIt.length; i++) {
							changeIt[i].style.display = "none";
					}
				}
				//alert(value_select);
				}
				
		</script>
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
				<li class="active"><a href="profile.php">Profile</a></li>
				<li class="divider-vertical"></li>
				<li><a href="courses.php">Courses</a></li>
			</ul>
			<h4 style="float:right"> 24/7 support  call  +1 (902) 489-4156</h4>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<form class="form-horizontal" action="<?php ?>" method='post' accept-charset='UTF-8'>
			<h1><i class="icon-user">&nbsp&nbsp</i>Personal Information</h1>
			<fieldset>
			<div class="control-group span6">
				<label class="control-label">First Name: </label>
				<div class="controls">
					<input id="fname" name="fname" type="text" value="<?php echo $student_profile["s_fname"]?>" placeholder=""  class="input input-block" disabled="">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Last Name: </label>
				<div class="controls">
					<input id="lname" name="lname" type="text" value="<?php echo $student_profile["s_lname"]?>" placeholder=""  class="input input-block" disabled="">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Student ID: </label>
				<div class="controls">
					<input id="studentid" name="studentid" type="text" value="<?php echo $student_profile["student_institute_id"]?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Email ID: </label>
				<div class="controls">
					<input id="email" name="email" type="text" value="<?php echo $student_profile["email_id"]?>" placeholder=""  class="input input-block" disabled="">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Phone Number: </label>
				<div class="controls">
					<input id="phno" name="phno" type="text" maxlength="10" placeholder="No Spaces or Hyphens" value="<?php echo $student_profile["phone_no"]?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			</fieldset>
			<h1><i class="icon-book">&nbsp;&nbsp;</i>Institute Information</h1>
			<fieldset>
			<div class="control-group span6">
				<label class="control-label">Pick your institute from the list. If your institute does not exist, add it by selecting "Add an Institution" from the list.</label>
				<div class="controls">
					<select class="selectpicker" id="u_list" name="u_list" tabindex="3" onChange="name_click()">
						<?php
							$ulistval = 'select';
							if(isset($_GET['ulist_val']))
							{
								$ulistval = $_GET['ulist_val'];
							}
							if($ulistval=="other")
							{
								echo "<option name='ulist' value='other'>Add an Institution</option>";
							}
							else if($student_university!=NULL)
							{
								echo "<option name='ulist' value='".$student_university["u_name"]."'>".$student_university["u_name"]."</option>";
							}
							else
							{
								echo "<option name='ulist' value='select'>Select</option>";
							}
						?>
						<?php
							require_once("../include/membersite_config.php");
							$institute_res = $fgmembersite->GetInstitute();
							foreach ($institute_res as $institute){
								echo "<option name='ulist' value='".$institute["u_id"]."'>".$institute["u_name"]."</option>";
							}
						?>
						<option name="ulist" value="other">Add an Institution</option>
					</select>
					<p class="help-block"></p>
				</div>
			</div>
			<?php 
				if(isset($_GET['ulist_val']))
				{
					$uni_val = $_GET['ulist_val'];
					if($uni_val=="other")
						echo '<div class="addyourinstitute">';
					else
						echo '<div class="addyourinstitute" style="display:none;">';
				}
				else
				echo '<div class="addyourinstitute" style="display:none;">';
								
			?>
			<div class="control-group span7">
				<input type='hidden' type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
				<div class="text-error"><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
				<p class="text-error" id="error"><?php 
													if(isset($_GET["errormsg"]))
													{
														$error = $_GET["errormsg"];
														echo $error;
														//echo "Your total weightage must equal to 100. Currently your total is ".$error;
													}?>
				</p>
			</div>
			<div class="control-group span7">
				<label class="control-label">Institute Name: </label>
				<div class="controls">
					<input id="iname" name="iname" type="text" value="<?php if(isset($_GET['u_name']))
																		{
																			$u_name=$_GET['u_name']; echo $u_name;
																		}?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span7">
				<label class="control-label">Address: </label>
				<div class="controls">
					<input id="address" name="address" type="text" value="<?php if(isset($_GET['u_street']))
																			{
																				$u_street=$_GET['u_street']; echo $u_street;
																			}?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span7">
				<label class="control-label">City: </label>
				<div class="controls">
					<input id="city" name="city" type="text" value="<?php if(isset($_GET['u_city']))
																	{
																		$u_city=$_GET['u_city']; echo $u_city;
																	}?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span7">
				<label class="control-label">Province/State: </label>
				<div class="controls">
					<input id="provincestate" name="provincestate" type="text" value="<?php if(isset($_GET['u_provincestate']))
																					{
																						$u_provincestate=$_GET['u_provincestate']; echo $u_provincestate;
																					}?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span7">
				<label class="control-label">Postal/Zip Code: </label>
				<div class="controls">
					<input id="postalzip" name="postalzip" type="text" value="<?php if(isset($_GET['u_postalzip']))
																				{
																					$u_postalzip=$_GET['u_postalzip']; echo $u_postalzip;
																				}?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group span7">
				<label class="control-label">Country: </label>
				<div class="controls">
					<input id="country" name="country" type="text" value="<?php if(isset($_GET['u_country']))
																			{
																				$u_country=$_GET['u_country']; echo $u_country;
																			}?>" placeholder=""  class="input input-block">
					<p class="help-block"></p>
				</div>
			</div>
			</div>
			</fieldset>
			<fieldset>
				<p class="text-center">
					<button class="btn btn-large btn-logo" type="submit" name="subname">Save</button>
				</p>
			</fieldset>
			</form>

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
