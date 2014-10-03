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

A well organized presentation makes it easier for your audience to follow along, comprehend, process, and retain the information.  This will result in a speech that is more captivating and entertaining.<br/><br/>

Creating and Brainstorming:<br/><br/>  

Detailed below in an example framework for generating/brainstorming content for your speech/presentation.
The goal is to write your speech in a way that can be heard through the ear, conveyed easily, while remembering each section, main point, and supporting material.  That’s why we recommend against writing your entire speech word for word out on paper.  Use the techniques/frameworks discussed below and become comfortable with this approach as it will help with retention, recall, and the way your message will be convey to your audience.<br/><br/>

Please note:  Reading straight off of a paper will sound unnatural and more like a screenplay, which is acting.  You want to convey a natural, sincere, organic message.<br/><br/>

Separate your content for creative thought, ideas, and brainstorming.  Sometimes it can be difficult to write a presentation/speech, and all you need to do is to get your mind flowing by writing ideas down on paper.<br/><br/>  


At this stage of the game, your goal is to write down as much information regarding your message, main points, and supporting material. Focus more on idea generation than the quality of content.<br/><br/>  

Once you have generated enough content, revised the information, and selected the content you will include in your presentation/speech, you can now move on to organizing your speech.<br/><br/>


<b>Opening</b><br/><br/>

As discussed earlier, an opening is designed to grab your audiences’ attention.  It should lay out the foundation of your presentation/speech, while providing insight into what you will be talking about. (General message/thesis)<br/><br/>

Include:<br/><br/>

*  <i>Subjective to the type of speech/presentation</i><br/><br/>

•  Briefly introduce yourself, who are you, company, experience, and knowledge.<br/><br/>
•  State the purpose of your presentation<br/><br/>
•  If there are questions, briefly discuss how you want to address them.  i.e – During or after the presentation.<br/><br/>

<b>Examples:</b><br/><br/>

1 - You could begin with a mini story to your main message.  Your could open with a life story, a story about an experience, a story about a work situation in which you’re trying to solve.  A story will captivate your audience’ attention, it will provide them with some insight into your main message while leading them into your body.<br/><br/>  

2 - A statement.  A specific or generalized statement that relates to your main message.<br/><br/>  

<i>“  We need to change our health care system today!”</i><br/><br/>

3 - A Question.<br/><br/>  

<i>“How many people in the audience enjoy traveling?  Who here has ever taking a trip to Florida? “</i>><br/><br/>

4 - A video.  A video that relates to your main message.<br/><br/>

5 - A quote.<br/><br/>

6 - An illustration – <i>“It’s Friday afternoon, and it’s a beautiful day outside.  The sun is shining, the birds are chirping, and 51 employees are seated at their desk, locked up inside, and feeling miserable.”</i><br/><br/>

Avoid opening your presentation with a story, statement, or illustration that does not relate to your main message/presentation.  
The brain process meaning before detail.  This is why it is imperative to include the gist, the main idea of your message/ core concept in your opening.><br/><br/>  

If you’re individual from a company who is in-servicing a group, avoid diving straight into the in-service.  Provide your name, companies name, locations, years in operation, a little about your position, title, and an overview of the main points that will be discussed.><br/><br/>

Also, avoid dragging the opening on too long.  It should be short, concise, and to the point.  Provide enough information to elicit anticipation, curiosity, and excitement.><br/><br/>  

<b>Body</b><br/><br/>

As discussed earlier, the purpose of the body is to convey your main points.  I’d recommend breaking your body up into two or three main points.  Each main point is followed with at least two forms of supporting material.><br/><br/>

Whether you’re presenting/speaking to inform, advise, entertain, argue, inspire, sell, or to pitch a product or service, there are various ways to structure the content.><br/><br/> 

Below is a suggested framework for the content of the body:<br/><br/> 

Claim (main point) #1 –
Sub Point # 1
Tier 1 Supporting material – (Strongest evidence/information)
Tier 2 Supporting material<br/><br/> 

Remember:  Your supporting material should consist of examples, additional information, stats, facts, testimonials, experiences, and research that support your claim.  Each main point and supporting material should relate and tie into your thesis (general message of the speech).<br/><br/>   

Tier 1 & 2:  For each main point, we recommended stating your strongest evidence and supporting material first.  Follow your strongest point with at least one additional piece of supporting material.<br/><br/> 

The general idea is to include your main topic (thesis, general message) in your opening followed by main points and supporting material.<br/><br/> 

Your sub point should be the bridge between the claim (main points) and supporting material.<br/><br/> 

For example:  Your main idea could be:  “How to loose weight”<br/><br/> 

Your main idea is then divided up into main points that support your main idea (thesis)<br/><br/> 

Your main points could include:<br/><br/> 

•  Exercise
•  Nutrition
•  Sleep<br/><br/> 

Your opening could be a statement about the lack of exercise in North America, it could discuss the complexity of losing weight, or why you believe losing weight is so difficult.<br/><br/> 

The body would discuss the main points that support your thesis, general message.
We use a repetitive layout because the human mind is better at comprehending information when laid out in patterns.<br/><br/> 

Claim#1 – Exercise
Sub point # 1
Detail:  Supporting material #1
                 Supporting material #2<br/><br/> 

Claim#2 – Nutrition
Sub point # 2
Detail:  Supporting material #1
                  Supporting material #2<br/><br/> 

Claim#3 – Sleep
Sub point # 3
Detail:  Supporting material #1
                 Supporting material #2<br/><br/> 

Supporting material should back your claim (main points) and tie into the general message (thesis) of your speech.<br/><br/> 

Close:  Sum up the different ways to loose weight, and how the audience can contact you for additional information/sign up with you.  (We will discuss “call to action” in later chapters)<br/><br/> 

The purpose of organizing your speech is to help the audience follow along, while helping you draft & remember the layout and main points when delivering.<br/><br/>   

<b>Close</b>

The purpose of the conclusion is to reinforce your message and main points.  You want your audience to leave with a lasting impression.  You can sum up your main points, briefly review each point, or reiterate each point through a story, illustration, or example.  In our “How to become more fit” / “In-service” examples, you may want to leave your audience with a call to action, a way to contact you, or a website address for further information.<br/><br/>   

Depending on the format of your body and main points, the conclusion will change.<br/><br/>   

For example:<br/><br/> 

•  Informative:  Sum up/review
•  Persuasive:  Call to action
•  A Story:  A final quote/ joke that ties in your message.<br/><br/> 

Avoid adding new information in your conclusion.  At times, when the conclusion arrives, you may start to feel more at ease, which will trigger information that you left out.  Avoid adding that back in, it will confuse your audience.  As well, avoid saying “sorry” at all times.  If you make a mistake, if you forget your next point, or if you need to refer back to your notes, that is fine and it happens to the best of us.<br/><br/>   

Your goal is to get out of that situation with ease and professionalism.  Most of the time, your audience will be blind to the mistake, so avoid drawing attention by saying sorry.  Take a breath, refocus, and move on.<br/><br/>    

The last sentence in your close should sound like an ending.  As discussed in chapter one, end your presentation with words that convey an ending.  I.e – Avoid ending on a note that articulates more information or a sentence that the audience has difficulty interpreting as an ending.<br/><br/> 

Plan, Collect, Revise, and Rehearse<br/><br/> 

Plan -<br/><br/>  

# 1 – Plan:  Think first, draft second.  Think about your content and draft those ideas/thoughts onto paper. (Figure 1.1) Organize your thoughts.<br/><br/> 

# 2 – While you’re drafting your presentation (figure 1.2), collect ideas, organize those ideas in your head and on paper, and sketch a story.<br/><br/> 

# 3 – Rehearse, and run your presentation.  Eliminate sections that are weak and reinforce areas that are strong.  Cut down/add information until you’ve met your allotted time.<br/><br/>   

# 4 – Review, rehearse, and reflect until you’re confident with your content, flow, and time.<br/><br/> 

<b>To sum up:</b><br/><br/> 


Open – Main message – Provide insight and lead the audience into the body<br/><br/> 

Body – Two to three main points with supporting material which tie into your general message<br/><br/> 

Close – Sum up, review, reiterate, and provide a call to action.<br/><br/> 






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
