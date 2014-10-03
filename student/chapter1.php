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
<p class="lead">
<b>Opening</b><br/><br/>

The opening is designed to capture your audiences’ attention.  It could be a general statement, an illustration, a story that leads into your body, or a question directed to your audience.  Once you’ve caught your audience’s attention and depending on the type of presentations, you could follow into:<br/><br/>

•  Welcoming the audience<br/><br/>
•  Briefly introduce yourself, who are you, company, experience, knowledge.<br/><br/>
•  State the purpose of your presentation.<br/><br/>
•  If there are questions, briefly discuss how you want to address them.  i.e – During or after the presentation.<br/><br/>

After the opening, you would then proceed into the body of your presentation and discuss your main points (trigger points) that support your thesis (main message)<br/><br/>

It’s okay to memorize your opening.  Your opening is what will grab your audiences’ attention.  A strong beginning will result in added confidence for the rest of your speech.  <br/><br/>

<b>Body</b><br/><br/>

The body of your presentation should include 2-3 main points that support your message.  Tip:  Use your main points within your body as trigger words for remembering each section of your speech.<br/><br/>

General structure of the Body:<br/><br/>

1st. Main point<br/>
Sub point<br/>
Detail – supporting material<br/><br/>

2nd. Main point<br/>
Sub point<br/>
Detail – supporting material<br/><br/>

3rd. Main point<br/>
Sub point<br/>
Detail – supporting material<br/><br/>

<b>Example:</b><br/><br/>  

<b>Main message/thesis:</b>  You’re proposing to your boss that you and your employees should have Friday afternoon off.<br/><br/>

<b>Argument:</b>  Having Friday afternoon off vs. not having Friday afternoon off.<br/><br/>

1st. main point:  Increase productivity (trigger point)<br/><br/>

Sub point – Provides extra information, clarifies your main point, highlights specific features, or verifies the idea, stat, fact it supports.<br/><br/>

Sub Point:  By having Friday afternoon off, our employees will work harder throughout the week by having the understanding that this benefit could be lost if productivity decreases.  Further more, having Friday afternoon off will provide our employees that extra motivation/push to accomplish certain tasks throughout the week, thus increasing productivity.<br/><br/>

Detail - Supporting material – Stats, facts, testimonials, examples, anecdotes, stories, illustrations, diagram, or pictures.<br/><br/>

Detail:  Recent research conducted in the journal of productivity states that “most employees motivation is diminished and bottomed out come Friday at 1 pm.  Companies who allow their employees to leave at 1 pm on Friday have discovered there was an increase in job satisfaction and moral.  Furthermore, employees’ productivity increased through extra motivation, and the push between Monday and Thursday.<br/><br/>

SOURCE:  www.journalofproductivity.com<br/><br/>

<b>Supporting material:</b><br/><br/>

<b>Statistics:</b> Using numbers to support a claim, data, or incidents.  Example – In 2014, 50% of the population will be of age of 65 and older.<br/><br/>

<b>Facts:</b>  Information that exists, that is verifiable, and known to be true.  Example – Regulation golf balls have 336 dimples.<br/><br/>

<b>Testimonials:</b>  Opinion, statements, or quotes from individuals who have experience, or expertise on the subject, topic, or matter.<br/><br/>

Examples, stories, anecdotes, illustrations:  Examples, stories, illustrations or anecdotes from a personal viewpoint, from someone you know, or something you’ve read in a research paper, a book, the newspaper, or articles.  Example – In my most recent job, my team and I were allowed to leave on Friday at 1 pm.  I personally felt more energized with an increase in job satisfaction. We surveyed the entire team and discovered a mutual consensus.<br/><br/>

Diagrams, PowerPoint’s, pictures:  Visual representations that help reinforce and support your main point and message.  More on visual presentations in chapter 9.<br/><br/>

In a very general sense, attempt to write two or three main points on a piece of paper and begin to write down as much information and supporting material as possible related to those main points.  After writing down as much information as possible, refine, and rehearse the information until you feel confident with the order and flow of the supporting material.  Avoid writing down the content as a script in which you will read word by word.<br/><br/>

Remember, the main points within your body are supposed to support your thesis/ general message.<br/><br/>

For ex – If you’re speaking on behalf of the board in regards to your proposal, you could memorize your first point, which is “increase productivity”, however, avoid memorizing your sub points and supporting material.  Instead, rehearse and practiced this information until you can recite it by just glancing at your trigger point.  i.e: Increase productivity.<br/><br/>   

This will actually help decrease the pressure you put on yourself by being able to revert to your knowledge compared to reverting to a memorized speech that was written on paper.<br/><br/>  

Instead, “Increase productivity” is your trigger point and the content that follows is derived from your knowledge, experience, practice, and rehearsal.<br/><br/>

The main point is that you’re not memorizing the content straight off the paper and speaking in a unnatural sounding voice, you’re only memorizing your main points and the rest is spoken naturally, which adds an element of sincerity, conviction, and credibility to your speech.<br/><br/>  

Some people believe that memorizing or reading straight off the page will help reduce nervousness and anxiety, but this can actually create more pressure and anxiety.  What if you lost your position on the paper?  What if you forget your next line?  In addition, speaking from memory (word from word) also conveys an unnatural, inorganic sounding presentation.<br/><br/>

Use trigger points, organize your thoughts, and speak from your experience, and knowledge.<br/><br/>

Please note:  If you choose to use notes, I would avoid writing down your entire speech on your note cards.  Include a few key points in your opening/close and your trigger points (main points) from your body.  After enough practice, you might start to realize that you do not need to rely on note cards.<br/><br/>  



<b>Examples of Structure:</b><br/><br/>

Opening:  Option to have this written out, memorized, or off the cuff.<br/><br/>

1st. Main point – (Trigger word) ex –Increase productivity<br/><br/>

2nd main point – (Trigger word) ex –Increase Job satisfaction<br/><br/>

3rd main point – (Trigger word) ex – Decreased recruiting costs<br/><br/>

Close:  Option to have this written out, memorized, or off the cuff.<br/><br/>

Close<br/><br/>

People usually recall the first and last thing you say the most.  Your close is the last thing your audience will hear.  You want your audience members to be thinking of those last words as they leave the room.  The close is your time to:<br/><br/>

•  Summarize your key points and information that you want your audience to leave with.  Avoid adding in new content.<br/><br/>
•  Act!  -  The close could be your time to challenge your audience, ask for the business, gain commitment, or follow an action plan.<br/><br/>  
•  Impression – State an important, thought provoking point or quote that ties in your main points.<br/><br/>

Your close is designed to sum up your main points while ending on a lasting impression.  If you have to, memorize your ending to ensure a strong close.  Strive to end your presentation with words that convey an ending.  I.e – Avoid ending on a note that conveys more information or a sentence that the audience has difficulty interpreting as an ending.<br/><br/>

<b>Eye contact</b>

When presenting in front of a live audience, an online audience, or face to face; eye contact is essential.  Eye contact projects sincerity, confidence, and conviction.  Attempt to avoid:<br/><br/>

•   Reading straight off of the page as discussed earlier<br/><br/>
•  Looking behind the camera (Audience), to the left, or right of the camera or audience<br/><br/>
•  Looking at the screen (aisle, back wall, one person )<br/><br/>

Maintain eye contact with the camera when appropriate.  There are instances when you will be using body language and facial expressions that will cause your eyes to shift, move around etc. but that will be apart of your presentation, and that is fine.  In further chapters, we will look into eye contact for different sized audiences, when presenting online, and for face-to-face interactions.<br/><br/>

For now, attempt to make eye contact with the camera.  By practicing this you will become more experienced/comfortable looking into one area, which will help when speaking to someone face-to-face.<br/><br/>

<b>Filler words – Clichés –Redundancies – Jargon</b><br/><br/>


<b>Filler words –</b> Once you complete the course your world of conversations will change.  You will now be much more aware of filler words.  Not only will you be aware of the amount of filler words you speak, but the amount of filler words others will use when conveying their message.<br/><br/>  

<b>The most common filler words are:</b><br/><br/>

•   “Ah”<br/><br/>
•  “You know”<br/><br/>
•  Unnecessary “ands”<br/><br/>
•  “um”<br/><br/>
•  “so”<br/><br/>
•  “uh”<br/><br/>
•  ”As you know”<br/><br/>
•  “Needless to say”<br/><br/>

Filler words can detract from your message and should be replaced with a pause or the first word in the next sentence.  Filler words can affect the flow, comprehension, and conviction of your presentation/speech.  Throughout this course you will be evaluated on the amount of filler words you say.  As you progress, you will become more aware of filler words and verbal ticks, which will help limit these words when presenting or speaking to another individual.<br/><br/> 


<b>Clichés</b><br/><br/>

Avoid using clichés within your presentation as it can make your message sound general, or phony.  Instead of using a cliché, use an example that is specific to your message.  For example.  If you’re discussing productivity and money, instead of saying “Time is money” you could describe specifically that each hour wasted results in X dollar loss to the company.  Make it specific to your message compared to using a board clichés.<br/><br/>

<b>Redundancies</b><br/><br/> 

Avoid using too many words to explain your message.  The shorter the word and sentences, the better.<br/><br/> 

<b>Ex –</b> 

Added bonus – instead use: Bonus<br/><br/>
Definite decision – instead use: Decision<br/><br/>
Difficult dilemma – Instead use:  Dilemma<br/><br/> 

<b>Jargon</b><br/><br/>

Avoid using jargon at all cost.  It’s redundant and can cause issues with comprehension.  In addition, avoid using industry words that will confuse your audience.  Industry words are words only used in your line of work/occupation.  Ex)  Medial condyles, which means: the inside of your knees.  Avoid the trap that using big complicating words outside of your industry will make you sound more intelligent, it doesn’t, it will confuse your audience.<br/><br/>

<b>Example of Jargon:</b><br/><br/> 

Bang for the buck<br/><br/>
Get your ducks in a row<br/><br/>
BTW - By The Way<br/><br/>
Utilization – use<br/><br/>
Conceptualize - understand<br/><br/>
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
</html><!-- Last Updated on 2013-09-25 T 04:02:00 -04:00 -->
