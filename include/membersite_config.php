<?PHP
require_once("fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('localhost:80');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'',
                      /*username*/'',
                      /*password*/'',
                      /*database name*/'',
                      /*table name*/'');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('AOu6uHhppEWOssk');

?>
