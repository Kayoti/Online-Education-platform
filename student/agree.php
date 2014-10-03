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
else
{
$username = $fgmembersite->Userid();
$stud_id = $fgmembersite->GetStudId($username);
$name= $fgmembersite->UserFullName();
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
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<link href="//fonts.googleapis.com" rel="dns-prefetch">
		<link href="//themes.googleusercontent.com" rel="dns-prefetch">
		<link href="//www.presenterspodium.com" rel="dns-prefetch">
		<link href="//presenterspodium.com" rel="dns-prefetch">
		<link href="//www.presentersplatform.com" rel="dns-prefetch">
		<link href="//presentersplatform.com" rel="dns-prefetch">
		<link href="//browsehappy.com" rel="dns-prefetch">
		<link href="//ajax.googleapis.com" rel="dns-prefetch">
		<link href="//google-analytics.com" rel="dns-prefetch">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<title>Presenter's Podium - Discover Your Ability.</title>
		<meta name="description" content="Refine, develop and improve your communication skills.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="generator" content="Crafted by Tialt" />
	<!-- SEO Metadata -->
		<meta name="robots" content="index,follow">
		<meta name="googlebot" content="noodp,noarchive,noimageindex">
		<meta name="revisit-after" content="1 month">
	<!-- Search Engine Verification Metadata -->
		<meta name="google-site-verification" content="">
		<meta name="msvalidate.01" content="">
		<meta name="alexaVerifyID" content="">
	<!-- Facebook Open Graph Meta Tags -->
		<meta property="og:title" content="Presenter's Podium - Discover Your Ability.">
		<meta property="og:description" content="Refine, develop and improve your communication skills.">
		<meta property="og:url" content="http://presenterspodium.com">
		<meta property="og:site_name" content="Presenter's Podium">
		<meta property="og:type" content="general">
		<meta property="og:image" content="images/presenterspodium-200x200.jpg">		
		<link href="" rel="canonical">
		<link href="" rel="image_src">
		<link href="" rel="publisher">
		<link href="" rel="author">
		<link href="humans.txt" rel="author" type="text/plain">
		<link href="apple-touch-icon.png" rel="apple-touch-icon">
		<link href="favicon.ico" rel="shortcut icon">
	<!-- Google Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	<!-- CSS Stylesheets -->
		<link href="../css/normalize-1.1.3.css" rel="stylesheet" type="text/css">
		<link href="../css/page-loader/pace-theme-flash.css" rel="stylesheet" type="text/css">
		<link href="../css/bootstrap-2.3.2.min.css" rel="stylesheet" type="text/css">
		<link href="../css/bootstrap-responsive-2.3.2.min.css" rel="stylesheet" type="text/css">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link href="../css/font-awesome-3.2.1.min.css" rel="stylesheet" type="text/css">
	<!--[if IE 7]>
		<link href="css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css">
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/html5shiv-3.7.0.min.js"></script>
	<![endif]-->
		<script src="../js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
		<!--[if lt IE 8]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<!-- Start Header Menu -->
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

	<!-- Start Body Section -->
		<section class="content">
			<div class="container">
<p>SOFTWARE AS A SERVICE TERMS OF USE AGREEMENT<br><br>

Your use of this internet site, www.presenterspodium.com, (the “Site”) and any software or any other services offered on the Site including but not limited to off-line or third party components, data storage, lists, reports, dashboards, or templates (collectively, the “Services”) is subject to these Terms of Use (the “Terms”). If you do not agree to these Terms, you agree not to use or access the Services and the Site. If you are agreeing to these Terms on behalf of a company or other legal entity, you represent that you have the authority to bind such entity to these Terms. Your registration for or use of the Site and the Services shall be deemed to be your agreement to abide by these Terms. Presenters Podium Educational Technology Limited (hereinafter referred to as “We”, “Us”, or “Our”) may modify these Terms at any time (without notice to you) by posting revised Terms on the Site. Your use of the Site and the Services constitutes your binding acceptance of these Terms, including any modifications that We make. You are responsible for regularly reviewing these Terms for any changes or updates to the Site or the Services.<br>

1.	License Grant
We hereby grant you a non-exclusive, non-transferable right to use the Site and the Services for the term for which you have paid the applicable subscription (“License Term”) solely for your own individual personal purposes.  You agree to solely use the Site and the Services, and agree to not share your account with any other user. In addition, your access to the Site and the Services may not be transferred to any other person.
We expressly retain all rights not expressly granted to you
You shall be solely responsible for and shall pay directly, any and all taxes, duties and charges incurred in the performance of this Terms of Use Agreement, including, but not limited to, sales and use taxes, withholding taxes, duties and charges imposed by federal, provincial, or local governmental authorities in Canada or elsewhere, but excluding any taxes levied against the income or capital of Us or upon Us as employer of Our employees. 
You shall collect, report, and pay to the relevant taxing authority, and indemnify Us for any liability relating to, all applicable excise, property, value-added tax ("VAT"), sales and use, or similar taxes, any withholding requirement in addition to, or in lieu thereof, and any customs, import, export or other duties, levies, tariffs, taxes, or other similar charges that are imposed by any jurisdiction for any and all services provided to any third party as permitted by this Terms of Use Agreement.  
2.	Your Content
2.1	You shall own Your Content (as defined herein) that you enter into the Site while using the Site and the Services. You grant Us and Our associates, affiliates, agents, licensors, and partners (collectively, “Affiliated Parties”) a non-exclusive, worldwide, perpetual, irrevocable, royalty free, sub-licensable right to exercise the copyright, publicity and database rights you have in Your Content, and any media now or in the future, in connection with the Site and the Services.  
2.2	 You are solely responsible for all materials, data, and information, whether publically posted or privately transmitted, that you upload, post, email, transmit, or otherwise make available on the Site or through the Services (“Your Content”). You have the sole responsibility for the accuracy, quality, integrity, legality, reliability, and appropriateness of Your Content. Except as permitted in this Agreement, We will not edit, delete, or disclose the contents of Your Content unless authorized by you, required to do so by law, or We believe that such action is necessary to:
(a)	conform with Applicable Laws (as defined herein);
(b)	protect and defend Our rights or Our property; and/or
(c)	enforce this Agreement. 
Any rights reserved by Us hereunder may be performed by Us, our employees, agents or contractors.
2.3	You warrant that you own or have sufficient legal right to Intellectual Property Rights (as defined herein) in Your Content and that Your Content does not violate Applicable Laws (as defined herein) or the rights of any third party.  
2.4	While using the Site or the Services, you may be exposed to content that you find offensive, indecent, objectionable, or inaccurate, and you bear all risks associated with using that content. We have the right, but not the obligation, to remove any content that may, in Our sole discretion, violate this Agreement or that is otherwise objectionable or offensive.  
3.	Intellectual Property Rights
3.1	All right, title, and interest in and to the Site, the Services, and any and all logos, designs, trademarks, and creative works on the Site and affiliated with the Services (excluding Your Content) are and will remain Our exclusive property, and we maintain worldwide copyright rights, trade secret rights, and other intellectual property rights in such property (collectively, “Intellectual Property Rights”), even if We incorporate any of your Feedback (as defined below) into subsequent versions of the Site or Services. You will not use our Intellectual Property Rights (or anything that is confusingly similar to our Intellectual Property Rights) for any purpose. 
3.2	All feedback, comments, and suggestions for improving the Site and the Services (the “Feedback”) that you provide to Us, and any contributions you make to the Site by posting content and communicating with other users via post or forms on the Site (“User Posts”) will be Our exclusive property. You hereby irrevocably transfer and assign to Us and agree to irrevocably assign and transfer to Us all of your right, title and interest in and to all of your Feedback and User Posts, including all worldwide Intellectual Property Rights therein.  At Our request, you will execute documents and take such further acts as We may request to assist Us in acquiring, perfecting and maintaining Our Intellectual Property Rights and other legal protections for your Feedback and User Posts.


4.	Publicity
We may use your name as part of a general list of users and may refer to you as a user of the Services and the Site in Our general advertising and marketing materials. 

5.	Registration Information
If We request registration information from you, you will provide Us with true, accurate, current and complete information. During the License Term, you will promptly update your registration to keep it accurate, current, and complete.  If We issue you a password, you may not reveal it to anyone else. You may not use anyone else’s password. You are responsible for maintaining the confidentiality of your accounts and passwords. We will not be responsible for any loss or damage that may result if you fail to comply with these requirements.
6.	User Restrictions
6.1	You will be responsible for all activity occurring on your account and will comply with all Applicable Laws (as defined herein). 
6.2	If offered as part of the Services, you agree to use Our bulletin board services, chat areas, news groups, forms, communities and/or message or communication facilities (collectively, the “Forms”) only to send and receive messages and material that are appropriate to that particular Form.  
6.3	If you choose a user name or upload content that, in Our sole discretion, is obscene, indecent, abusive or that might otherwise subject Us to public disparagement, scorn, or liability, We reserve the right (without notice to you) to automatically change your user name, delete your posts or content from the Site, deny you access to the Site or the Services, or any combination of these options.  
6.4	The technology and the software underlying the Site and the Services are owned by Us or Affiliated Parties. You agree not to copy, modify, create derivative works of, decompile, attempt to extract source code from, rent, lease, loan, sell, assign, distribute, reverse engineer, grant a security interest in (or transfer any right to) the technology or any software underlying the Site or the Services. You agree not to modify the software underlying the Site in any manner or form or to use modified versions of such software. 
6.5	Without limitation, you will not do any of the following on the Site:
(a)	defame, abuse, harass, stock, threaten, or otherwise violate the legal rights of others and generally agree not to use the Site or Services for illegal purposes; 
(b)	publish, post, upload, email, distribute, or disseminate (collectively, “Transmit”) any inappropriate, profane, defamatory, misleading, infringing, obscene, indecent, or unlawful content;
(c)	transmit anyone's sensitive information, including but not limited to anyone’s identification documents, financial information, or any confidential information;
(d)	transmit files that contain viruses, corrupted files, or any other similar software, programs or malicious code that may damage or adversely affect the Site, the Services, Our software, hardware, telecommunications equipment, or the operation of another person’s computer; 
(e)	advertise or use the Services for any commercial purpose; 
(f)	transit surveys, contests, pyramid schemes, spam, unsolicited advertising or promotional materials, chain letters, or other unsolicited messages; 
(g)	restrict or inhibit any other user from using and enjoying any area within the Site or Services; 
(h)	interfere with or disrupt the Site, the Services, and/or any associated software, servers or networks; 
(i)	reverse engineer, decompile, disassemble or otherwise attempt to discover the source code or underlying ideas or algorithms of the Site or the Services or any content therein;
(j)	impersonate any person or entity, or falsely state or otherwise misrepresent your affiliation with a person or entity.
7.	Service Communications
You understand and agree that the Site and the Services may include communication such as service announcements and administrative messages from Us or Affiliated Parties.  You may not be able to opt out of receiving these service announcements and administrative messages while using the Site and the Services.  You also understand that the Site and the Services may include advertisements. 
8.	Third Party Sites, Products and Services
The Site may contain links to other internet sites owned by third parties.  Your use of each of those sites is subject to the conditions, if any, of those sites.  We have no control over sites that are not Ours, and We are not responsible for any use of such sites or content on them. Our inclusion on the Site of any third party content or link to a third party site is not an endorsement of that content or third party site.  
9.	Fees
You agree to pay the fees on the terms stated in any agreement between you and Us governing payment (the “User Fees”). 
10.	Term; Termination; Service Cancellation
10.1	The License Term will begin upon payment of the User Fees and will automatically terminate 4 months following payment of the User Fees. 
10.2	We may immediately terminate or suspend your use of the Site or the Services, or terminate your account and this Agreement if you:
(a)	fail to pay any applicable fees when due; or
(b)	breach or otherwise fail to comply with this Agreement.
10.3	You will continue to be charged for the Site and the Services during any period of suspension. Termination of this Agreement by us will not relieve you from any obligation to pay fees that remain unpaid for the applicable License Term.
10.4	Upon termination by Us of this Agreement or any part thereof in accordance with this Agreement as a result of your breach, negligence, or default, We will have no obligation to refund any fees paid by you. 
10.5	Upon termination by Us of this Agreement or your account, you will not create another account, use the Site or access the Services without Our authorization, which shall be determined in our absolute sole discretion. 
11.	Indemnification
11.1	You hereby agree to indemnify, defend and hold Us and all of Our officers, directors, owners, employees, Affiliated Parties, suppliers, and licensors (collectively referred to in this section 11, the “Indemnified Parties”) harmless from and against any and all liability, losses, costs, and expenses (including legal fees) incurred by any Indemnified Party in connection with any claim, including but not limited to, claims for defamation, violation of rights of publicity and/or privacy, copyright infringement, or trademark infringement, arising out of:
(a)	your use of the Site and the Services; 
(b)	any use or alleged use of your account or your passwords by any person, whether or not authorized by you; 
(c)	the content, quality, or the performance of Your Content that you submit to the Site; 
(d)	your connection to the Site; 
(e)	your violation of this Agreement, or
(f)	your violation of the rights of any other person or entity.
11.2	You shall be responsible for compliance with all obligations imposed by any and all applicable provincial laws, federal laws, regulations, by-laws, foreign laws, directives, and any implementing or amending legislation as may be enacted from time to time before or during the License Term (collectively, the “Applicable Laws”) and you shall indemnify and hold Us harmless from and against any third party claim against Us resulting from your violation (intentional or otherwise) of the Applicable Laws.  
12.	Disclaimer
12.1	We are not responsible for the deletion, loss, damage, destruction, failure to store, misdelivery, or the untimely delivery of any information on the Site, including Your Content. We are not responsible for any service outages that are caused by Our maintenance on servers of the technology that underlies the Site or the Services, problems inherent in the use of the internet and electronic communications, failures of Our service providers (including telecommunications, hosting, and power providers), computer viruses, malicious use of our software or Site, natural disasters or other destruction or damage to Our facilities, acts of nature, war, civil disobedience or any other cause, whether or not beyond Our reasonable control.  
12.2	The Site and the Services, Our software, content and other materials, are provided on an “as is, as available” basis.  Any material that you download or otherwise obtain through the Site and the Services is done at your own discretion and risk, and you will be solely responsible for any potential damages to your computer system or loss of data that results from your download of any such material or use of the Site and the Services.  
12.3	We do not make any warranties or representations that:
(a)	the Site or the Services will meet your requirements; 
(b)	the Site or the Services will be uninterrupted, timely, secure, error free, virus free, or operate in combination with any other hardware, software, system or data; 
(c)	any information obtained from the Site or from using the Services will be accurate or reliable; 
(d)	the quality of any products, services, content, information, software or other materials that you purchase or obtain through the Site will meet your expectations; or
(e)	any errors you encounter while using the Site or the Services will be corrected.
12.4	We make no warranties, representations, guarantees or conditions of any kind as to title, non-infringement, merchantability, or fitness for a particular purpose with respect to the Site or any of its content, products, software or other materials available through the Site and used as part of the Services.  

13.	Limitation of Liability
13.1	To the maximum extent permitted by applicable law, we will not be liable for any direct or indirect, incidental, special, exemplary, punitive or consequential damages suffered by you in connection with or arising out of the Services or the Site, its software, content or other materials, even if We have been advised of the possibility of such damages, including but not limited to, damages for loss of profits, goodwill, use or loss of Your Content, passwords, or other intangible losses, resulting from but not limited to:
(a)	the use or the inability to use the Site and the Service;
(b)	alteration of, inaccuracies, errors or omissions in Your Content, transmissions or data; or
(c)	statements or conduct of any third party, including but not limited to any and all damages flowing from unauthorized third party use of the Site or the Services.
14.	Miscellaneous
14.1	Our failure to exercise or enforce any right available to us pursuant to this Agreement or Applicable Laws will not constitute a waiver of such right. 
14.2	This Agreement is not assignable. 
14.3	This Agreement, including all terms, conditions, and policies that are incorporated into these Terms by reference, constitute the entire Agreement between you and Us and govern your use of the Site and the Services, superseding any prior agreements that you may have with Us.  
14.4	This Agreement will be construed in accordance with the laws of the Province of Nova Scotia and the federal laws of Canada.  
14.5	If any part of this Agreement is determined to be invalid or unenforceable pursuant to Applicable Laws, the invalid or unenforceable provision will be severed and deleted from this Agreement. All other Terms which remain valid and enforceable will survive and remain in full force and effect.  


</p>
			</div>
		</section>
	<!-- End Body Section -->

		

		<!-- Start Footer -->
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

					<div class="span5 offset2">
						 <p class="footer-info">Presenters Podium provides students a focussed & collaborative environment to present, evaluate, & apply feedback multiple times throughout a semester while progressively learning & refining proper communication & presenting skills.<br><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->
	
		<!-- Start Copyright Section -->
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
		<!-- End Copyright Section -->
	
	<!-- JavaScript -->
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>
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
</html><!-- Last Updated on 2013-10-01 T 12:00:00 -04:00 -->