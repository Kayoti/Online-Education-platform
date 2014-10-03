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
  
  <b>Presentation aids:</b><br/><br/>

  I will refer to PowerPoint throughout this chapter, however, below are other excellent resources for creating presentations:<br/><br/>

  •  Slideshare
  •  Prezi
  •  Keynote
  • Powtoons<br/><br/>

  Visual aids are an excellent tool for increasing the clarity and comprehension of your message.<br/><br/>

  Visual presentation can help by:<br/><br/>

  Increase the retention rate of your message.  Audience members will remember a visual presentation more than an oral presentation.  Research indicates that audience members will remember up to two thirds more when they “see” compared to what they “hear”.  Brain rules – Brain Medina <br/><br/>

  Increase the level of comprehension.  Images, diagrams, a few key words with an explanation can help your audience members see in their own minds what you’re describing.<br/><br/>

  Increase attentiveness’ – Combining a speech with slides will help keep and maintain your audiences’ attention and overall comprehension.  You will have less wondering minds and more attentive members when using visual aids.<br/><br/>  

  Visual aids can help you.  Control your nervous with visual aids.  Why?  Because you will briefly distract your audience away from you and onto your PowerPoint, diagram, or image.  As well, if you forget a point or a sentence, the PowerPoint is there to your rescue.  As discussed, avoid using your visual aid as notes, but if all else fails and you forget a point, your slides will trigger your memory, helping you get back on track.<br/><br/>

  A PowerPoint presentation/presentation in general should create a story and an experience.<br/><br/>  

  A few things to take into consideration before jumping into creating your slides:<br/><br/>

  # 1 – Plan:  Think first, draft second.  Think about your content and draft those ideas out out on paper (as we did in chapter two) to organize your thoughts.<br/><br/>

  # 2 – While you’re drafting your presentation, collect ideas, organize those ideas, and sketch a story.<br/><br/>

  # 3 – Revise, and run your presentation.  Eliminate sections that are weak and reinforce areas that are strong.  Cut down/add information until you’ve met your allotted time.<br/><br/>

  # 4 – Build the slides<br/><br/>

  # 5 – Rehearse, reflect and revise until you’re confident with your content, flow, and time.<br/><br/>

  <b>Other visual aid tools:</b>

  •  Overhead transparencies:  Small audience.<br/><br/>

  •  Flipchart – Small groups, small meetings, taking notes, generating feedback, ideas, moving from idea to idea, you can use different colors, good for brainstorming, use the pages and information at a later point.<br/><br/>

  •  Whiteboards – Small groups/meeting.  Similar criteria as flipcharts.  Great for lists, diagrams.<br/><br/> 

  •  Props – objects that can better help reinforce your message.  It could be a product, brochure, pamphlet, a model, and/or a diagram.<br/><br/> 


  <b>PowerPoint Guidelines</b>

  PowerPoint and visual aids are used only as a support.  They help your audience understand your message more concisely, provides structure, increases retention, while stimulating your audiences imagination.<br/><br/>

  1)	Your slides should support and reinforce; they shouldn’t be your presentation.<br/><br/>

  Limit each slide or visual aid to one main point or thought.<br/><br/>

  When creating your slides, limit the words on the slides to the bare minimum, just enough to stimulate your audiences’ minds without giving away the entire idea.  The less words the better.  You do not want your audience reading the information from your slides when they should be listening to you.  For example, if you create a slide with content that fills half the page, your audience members will be reading the information on the slide compared to listening to you speak.<br/><br/>


  Your slides should be used to reinforce your message and provide further support to your main point.  For example, if you’re describing a trip to Florida, you could mention that you went to Disney World.  Most people know the castle, and therefore, having a slide with just this photo would be enough.  This will stimulate your audience’s attention, provides them a clear understanding of your main point, while rousing their imagination.  You will then proceed into explaining your experience or your main point on Disney world.<br/><br/>  

  If you’re training a group of individuals on “Sales techniques” and explaining that listening is a major component to a successful salesperson.  You could design your slide with one word and a picture of an ear.  You could then proceed into explaining why listening is so important.<br/><br/>

  If you’re speaking about the different types of exercise and where to facilitate exercise, you could construct your slides with the header and below three points further supporting your message.  Three is my maximum and a recommendation.  Our brains process three in a unique way.  Most things come in three.  Three is an easy balance, its not too much nor is it too little.  Recent information on cognitive functioning state that bullet points are the least effective way to delivering important information.  Omit bullet points.<br/><br/>

  1)	Slides can be used to clear up a complex point.  For example, if you’re explaining the sales process, a slide with a diagram clearly explaining this would better help your audiences’ comprehension.<br/><br/> 


  2)	Never face your slides, face your audience.  Seasoned presenters will rehearse in such depth that they have it timed to a tee.  They know when to hit the button to transition to the next slide without having to turn their back and look at the screen.  Their information coincides with the flow and layout of the presentation.  Apparently, Steve Jobs would rehearse for days and days before his keynote presentations.  If Steve job is rehearsing and practicing, then we should as well.<br/><br/>

  Always focus on your audience; they’re there to see you, not your back.  I mentioned never face away from your audience; however, there are always exceptions.  If you are in a bind, or you lacked in practice, or you have forgotten your next line, it wont be the end of the world or effect your presentation dramatically if you subtlety glance at your slides to help with your transition or to trigger your memory.<br/><br/>

  A tip:  If stuck in a jam and you were not able to practice as much as you would like.  Place your computer so it sits in the corner of your eye.  Face the audience and keep a close eye on the computer, which is displaying your slides on the screen.  Now, when you need to transition, glance at the computer screen that is in the corner of your eye instead of turning your back and facing the screen.<br/><br/>

  A good presentation could be the deciding factor when it comes to a sale, money from investors, an approved proposal, a successful interview, a job, a movement, success, or even a presidential election.<br/><br/>

  3)	Think simple:  Your slides should be clear and concise:<br/><br/>

  Research indicates that ideas are more likely to be remembered if they’re displayed as pictures rather than words.<br/><br/>

  This research is called “Picture superiority effect (PSE) – Which concludes that presentations that are conducted orally are recalled 10% of the time up to 72 hours later and presentation that consist of almost entirely of pictures are recalled up to 65% of the time up to 72 hours.<br/><br/>

  The reason behind this and according to John Medina:  “Your brain interprets every letter as a picture so wordy slides will confuse your brain.”<br/><br/>  

  Brain Rules – Brian Median<br/><br/>

  Focus more on pictures and limit your words<br/><br/>

  Wordiness:  Avoid using more than three lines of text and no more than 4-5 words per line.  Slides that are cluttered can be distracting, as your audience will be reading the words and not listening to you.<br/><br/>

  Visible:  Increase font/image size so everyone in the room can see what you’re displaying.<br/><br/>

  Simplicity:  Think simple.  One image with a title, one line of textone image with one or two lines of text, or just have one image that is describing the point you’re making.<br/><br/>

  Color:<br/><br/>

  Choose colors that complement one another.  When constructing your slides, try using only 2-3 colors at most.  Ensure the colors are visible from the back of the room.  Avoid using fluorescent colors that are bright and tacky.<br/><br/>  

  Ex – Avoid white font on a yellow background.<br/><br/>

  Consistency:<br/><br/>

  Maintain consistency throughout your presentation.  Consistency with colors, size of images, and the amount of words used on your slides.<br/><br/>  


  Variety:  Use more than one visual aid.  This isn’t always necessary as a PowerPoint presentation will be enough.  However, there are times when using multiple visual aids will help in conveying your message.  Ex – When Steve jobs presented the 
  iPhone, he used slides and the product.<br/><br/>

  Timing:  Show the visual aid/PowerPoint first, briefly pause, let the audience digest and process the information, and proceed into your message.  Display the slides long enough so everyone has a chance to read them.  Avoid moving too fast from one slide to another.<br/><br/>  

  Distractions:  As discussed earlier, don’t face the slides, face your audience.  If you’re writing on a white board, flip chart etc. don’t speak while you’re writing, gather the information/answers to the questions and then write them down.<br/><br/>

  Preparation:  Prepare and rehearse your presentation/speech until you know each section of the opening, body, and close.  Ensure your message flows with your slides/visual aids.  The last thing you want is to be speaking about the wrong slide.  Before presenting or giving your speech, ensure your slides, computer, projector are working properly and are displaying your slides on the screen.  Position the computer to your ideal position in case you need to glance at the screen (If the room is accommodating) Move to the back of the room so you can test visibility.  Can the person at the back of the room see your slides clearly? If technology fails you, have a back up plan so the show will go on.<br/><br/>

  <b>Back-up Plan</b>

  •  Oral presentation without the use of a visual aid.
  •  Whiteboard
  •  Flip chart
  •  Have a back up computer
  •  Throw your slides on a clouding software such as “dropbox.com” to access your slides from a different computer.  
  •  Back up your slides on a USB<br/><br/>

 
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
