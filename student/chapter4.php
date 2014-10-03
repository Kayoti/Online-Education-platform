<?php
ob_start();
    if(isset($_GET["chapter_id"]))
{
    $chapter_id = $_GET["chapter_id"];
}
if(isset($_GET["course_id"]))
{
    $crs_id = $_GET["course_id"];
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
			<li class="active"><a href="courseinfo.php?course_id=<?php echo $crs_id;?>">Course Information</a></li>

				<li class="divider-vertical"></li>

				<li><a href="dashboard.php?course_id=<?php echo $crs_id;?>">Dashboard</a></li>

				<li class="divider-vertical"></li>

				<li><a href="history.php">History</a></li>

				<li class="divider-vertical"></li>

				<li><a href="courses.php">Back to Courses</a></li>
		</ul>
	</div>
</div>

<div class="container">
<div class="page-header text-center">
                                                                       
                                                                     
                                                                     
                                             
                                                                     
                                                                     
                                                                     
                                             
                                                                     
                                                                     
                                                                     
                                             
<h1>Chapter <?php echo $chapter_id;?></h1>
</div>
<p class="lead"><br/><br/>

  Are you?<br/><br/>

  •  Informing your audience on a new policy?
  •  Entertaining your audience with a story, a joke?
  •  Trying to persuade your audience to take action, to sign up, to purchase your product, or adopt your way of thinking?
  •  Inspiring your audience to take action, to change their lives, or to make a difference?<br/><br/>

  Most topics will have general and specific points that will need to be addressed.<br/><br/>

  Ex – General message/thesis:  “How to become more fit”<br/><br/>  

  Specific –<br/><br/> 

  1 – Running outdoors on a path
  2 – Avoid eating greasy food such as fried chicken
  3 – Sleep 6-8 hrs a night<br/><br/>

  Ex – General message/thesis: “Allowing employees to leave early on Friday”<br/><br/> 

  Specific – 
  1-	Increased productivity due to more relaxation, increased moral, and increased job satisfaction.
  2-	Increased revenue due to an increase in productivity and happy employees
  3-	Less recruiting/ training fees due to employee retention<br/><br/>

  Being specific and narrowing down on the general purpose of the message creates a presentation/speech that is more direct and easier to understand from your audiences’ perspective.<br/><br/>  

  When informing, persuading, inspiring, or entertaining an audience on a specific point, attempt to:<br/><br/>

  1)	Speak from the audiences’ frame of mind.  Enter into their minds and form your words around their way of thinking.
  2)	Based on your specific points, what do you want your audience to do after your speech?
  3)	Use words/sentences/points that are specific and precise.
  4)	Your call to action/recommendation must be attainable.  For example, you shouldn’t ask your audience to do something in which they’re incapable of completing or attaining.<br/><br/>  

  By choosing a topic you’re generally interested/have knowledge in, while identifying the specific purposes, you will:<br/><br/>

  •  Organize your speech more effectively
  •  Help your audience remember each main point
  •  Increase confidence and decrease nervousness
  •  Increase credibility<br/><br/> 

  To conclude, identify the general purpose of your message.  Within the general message, identify the specific points you want to make that will guide your audience along to take action, adopt your viewpoint, idea, and/or comprehend your message and purpose.   
  Practice, practice, and practice some more.  Practice will help you stay on schedule, increase your confidence, while decreasing your nervousness.<br/><br/>  

  Strive not to use notes.  Use the frameworks from figure 1.1 & 1.2 to organize your presentation/speech.  Use your keywords as trigger points.<br/><br/>

  We will learn more about persuasive messages in later chapters.<br/><br/>

  Right now, we will dive into what makes up an informative and entertaining speech, and in later chapters, we will discus persuasive and inspirational speeches.<br/><br/>

  <b>A call to action:</b>  

  You’ve spent time developing content, crafting a well organized speech, and fought off the nerves to present your speech/presentation, now it’s time to convey a call to action.  In your close, depending on the type of speech, ask for the business, signatures, a commitment, or challenge.  For this course, if arguing a position, challenge your opponent/audience with a statement or thought-provoking message that will demand well-tailored content, opposing remarks, or well thought out evidence against your position.<br/><br/>

  Introduction to Impromptu Speaking:<br/><br/>

  Have you ever been asked a question on the spot and your mind has blanked? Unable to gather your thoughts together despite knowing the answer?  Wanted to respond to an argument, however, was unable to say what you really wanted to say.<br/><br/>  

  Have you ever been in situations where your boss, colleague, professor, friend has asked you a question and the answer does not come out properly?<br/><br/>

  Many of these situations may have happened to you, or will happen to you.  The purpose of impromptu speaking is to help you improve your quick thinking skills, to help you gather your thoughts, while developing the automatic habit of answering in a clear and concise manner when questioned on the spot.<br/><br/>  

  When given a question on the spot how do you respond effectively without excessive filler words (ummm, ahhhh, soo….)<br/><br/> 

  Stop.  Think about the question being asked and gather your thoughts.  If it is a question that you know well, answer promptly without cutting the individuals last few words off.<br/><br/>

  Let’s assume that the answer takes some thought.<br/><br/>  

  My suggestion is to listen and focus on the words the other individual is saying.  Repeat the words that are being said in your own mind and really focus on “what is being asked”.  Once you have sorted out the question in your own mind, attempt to develop 2-3 main points that you can address.<br/><br/>  

  For instance:<br/><br/>

  Question:  “What makes you more qualified for this position than another candidate”<br/><br/>

  Stop, take a breath and focus on “qualified” What makes you more qualified.  
  Formulate answers based on your past.  What makes you stand out for this position?  Were you number in something?  Accomplished something unique?  Received high rewards ?  How did you do in collage/ university? Did you complete a certain course?  Think about things you have done in your past that will answer the question.<br/><br/>

  Let’s say you were number 1 in sales for your company, you were promoted twice, and you attend/have completed a course that will help you for this position.   There you go, you have three things to say.  Elaborate on each of these main points providing examples of how you accomplished # 1 in sales, why you were promoted, and what you accomplished in that course to become better qualified for this position.<br/><br/>

  Step 1 - Stop, 
  Step 2- Focus on the question being asked
  Step 3 - Think about your past.<br/><br/>

  People tend to focus more on what other individual will say or think instead of focusing on the question.  Focus and breathe.  Answer the question that is being asked.   At times your nervousness and/or excitement will get the best of you and you might find yourself rambling on or going off track to what is being asked.<br/><br/>  

  Be conscious of this and if you do find yourself veering off, end that sentence and say “So going back to your question, those are some of the reasons why I’m more qualified”<br/><br/>  

  If you’ve stopped, thought about the question and you’re still having trouble thinking of content, ask the individual to repeat the question to buy yourself more time.   This will be your time to refocus on what’s being asked and to develop content.<br/><br/>  

  Please note:<br/><br/>  

  If asked a question, avoid restating the question back as your opening.<br/><br/>  

  Ex – Question:  What would you do with $1 million dollars.  
  Answer:  If I won $1 million dollars I would…<br/><br/>

  You want to design your opening as if the audience/individual, who asked the question, never heard the question being asked.<br/><br/>

  The best way to become better at gathering and answering questions with confidence is through practice.<br/><br/> 

  To sum up:<br/><br/>

  Focus on what is being asked and develop content.  Avoid thinking about anything else other than what is being asked.<br/><br/>

  By consistently practicing this skill you will become better at answering questions on the spot.  Eventually you will build up enough muscle memory that speaking impromptu/on the spot becomes a habit, a habit that will pay dividends many times in your professional and personal life.   Imagine having the ability to focus on the words rather than experiencing a clouded and confused mind.  That’s our goal with the impromptu generator.  Practice, build “on the spot” muscle memory and develop the habit.  The only way to improve on this skill is by practicing.<br/><br/>   

  The definition of Impromptu is:<br/><br/> 

  1.  Prompted by the occasion rather than being planned in advance:<br/><br/>  

  2. Spoken, performed, done, or composed with little or no preparation; extemporaneous<br/><br/> 

  http://www.thefreedictionary.com/impromptu<br/><br/> 

  That’s exactly what our goal was when designing the impromptu generator.<br/><br/> 

  To help you :<br/><br/> 

  •  Better prepare yourself for occasions in conversation that are unplanned.
  •  To help you become more effective when speaking on the spot
  •  Develop the skill of conveying your ideas and thoughts in your own words.
  •  To help practice gathering your thoughts and ideas and delivering them in a efficient and captivating manner.<br/><br/> 

  Impromptu speaking will help you in/when:<br/><br/> 

  •  Job interviews
  •  The question period of a presentation/speech
  •  Meetings
  •  The classroom
  •  Interviews for professional programs.  I.e – Medical school.
  •  Speaking on the spot to a client, boss, board of advisers.  
  •  Defending your position
  •  Being asked a question from your wife, girlfriend, mother, friend, stranger.<br/><br/> 


</p>
</div>

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

<!-- Start footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="span2 list-footer">
					<ul style="list-style: none;">
						<li><a href="create-account.html">Create an Account</a></li>
						<li><a href="enroll.html">Enroll</a></li>
						<li><a href="#">Learn More</a></li>
						<li><a href="#">Take a Tour</a></li>
						<li><a href="contact.html">Contact Us</a></li>
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
