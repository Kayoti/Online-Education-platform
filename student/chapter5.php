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

  <i>“People will forget what you said, people will forget what you did, but people will never forget how you made them feel”</i><br/><br/>


  When presenting among a large audience, a small audience, or even in front of a colleague, friend, or family member, we all have the tendency to speak too fast.  We’re either too excited to reveal our message or we’re so nervous that we blurt our message out too fast.  This goes against what a good presentation or impromptu speech should be like.  By speaking too fast your message will come off as unprofessional, sloppy, and will detract your audience and their overall comprehension.<br/><br/>

  Be conscious of your speed during regular conversations, in presentations, in your course videos, and when responding to a question.  The more you’re conscious of your speed while using the pause effectively, the more clear and concise your message will be.<br/><br/>  

  To go even further in helping you communicate your message, attempt to use:<br/><br/>

   •  Short words (1 / 2 syllables)  
   •  Short sentences (Avoid using more than one/two commas in a sentence) – 15-20 words per sentence
   •  Short paragraphs (Limit to a few sentences) - Avoid exceeding 3-5 sentences per paragraph.<br/><br/>

  This is not implying that your entire speech should be made up of words that are only 1&2 syllables, short sentences, and paragraphs, but try to make the majority of your speech with these principals in mind.<br/><br/>  

  Using short sentences, words, and paragraphs in your speech will help your audience follow along better while increasing retention and comprehension.<br/><br/>  

  Mix it up, and at times, add in longer words, paragraphs, and sentences for variety.<br/><br/>

  For full engagement, attempt to bring your audiences’ imagination to life.  You want your audience members to feel, touch, smell, and hear your message.  You want them to feel the emotions that you you’re feeling.<br/><br/>


  Speak in the active voice:<br/><br/>

  The active voice conveys energy.  The subject is doing the action.<br/><br/>

  For example:<br/><br/>  

  •  Active:  “The boy threw the ball” compared to “The ball was thrown by the boy”<br/><br/>

  •  “John hiked the mountain” compared to “The Mountain was hiked by John”<br/><br/>

  •  Happy employees have Friday afternoon off – Compared to “There were many happy employees on Friday, due to having the afternoon off”<br/><br/>

  By using the active voice your sentences become strong, direct, and clear, compared to dull, wordy, and confusing.<br/><br/>





  <b>Rhetorical devices</b><br/><br/>

  •  Alliteration – repetition of a constant sound.  Two or more words that begin with the same letter:  Big, huge, hungry, hippo !<br/><br/> 

  •  Simile – comparing one object to another:  He eats like a pig<br/><br/>

  •   Antanagoge - places a criticism and praise together, this helps offset the impact of the sentence:  The bike is not pretty but it works great.<br/><br/>

  •  Metaphor – Creates an image of comparison in your thoughts:  He’s like a speeding bullet.<br/><br/>

  These are just a few examples; there are many more types of these examples online.<br/><br/>

  <b>Jargon</b><br/><br/>

  At times, when presenting to a client, a professional, a group of individuals, or in a general conversation, you may have the tendency to impress or display your knowledge by using unnecessary words, complex words, and sentences to convey your message.<br/><br/>  

  Rule of thumb: most people who are not in your industry or everyday operations will not be aware, or have an understanding of these industry words. This can cause confusion and affect your audiences’ comprehension.  Keep it simple.  Avoid using long, complicating words to either:<br/><br/>

  A – Sound more intelligent
  B – To display your understanding in your given industry.<br/><br/>

  Instead, use more common spoken words that the majority of your audience will understand.  Some people may be embarrassed that they don’t understand a certain word and will most likely never ask for clarification, thus never knowing what you actually meant and affecting their comprehension.  Use words that you know well and words that you can speak with confidence; this will reduce the probability of mispronunciation, miss communication, and miss-direction.<br/><br/>  

  <b>Broad vs. Specific</b> 

  Finally, when explaining a word or sentence, attempt to be as specific with your words as possible.  Avoid being to broad.  This will help your audience understand your message more clearly.<br/><br/> 

  <b>Ex –</b>

  Broad:  I walked up so many stairs   --- How many? Where were you going?<br/><br/>

  Modified:  To reach the top of the look off, we had to walk up 100 grueling and calf burning stairs.  Reaching the top we were amazed by the view of the city.<br/><br/>  

  To summarize:  Use common words and sentences that are specific and comprehendible to everyone in your audience.<br/><br/>

  <b>Pronunciation</b><br/><br/>

  In attempt to convey your message accurately, descriptively, controlled, and organized, at times, you may forget to pronounce your everyday words.<br/><br/>  

  For example –<br/><br/>

  •  Should of → sometimes becomes – shoudda 
  •  Could of  →   Couldda
  •  Would of  → Wouldda
  •  Dropping the  “ing” on certain words – Fishing become fishin
  •  Not fully enunciating the word from start to finish. 
  •  Not saying the word from start to finishing.  Trailing off at the end.<br/><br/>

  Be conscious of this and watch for it in your videos.  Focus on articulating your words from start to finish with clear pronunciation.   This will convey professionalism, confidence, and conviction in your message.<br/><br/>



  
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
