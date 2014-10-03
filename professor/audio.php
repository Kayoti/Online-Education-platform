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
$prof_id = $fgmembersite->GetProfId($username);

if (isset($_POST['submit'])){
    
   
	if($_POST['submit'] =="Off"){
	$audio= TRUE;
	}
	if($_POST['submit'] =="On"){
	$audio= FALSE;
	}
}
if(isset($_GET["course_id"]))
{
    $course_id = $_GET["course_id"];

}


if(isset($_POST['a_student'])) {
if (!empty($_POST['a_student'])) {
            $sel_student = $_POST['a_student'];
            $student_ids = implode(",",$sel_student);
         }
    else {
      echo "_POST[a_student] is not set: it is empty!<br>";
    }              
}

   header('HTTP/1.1 303 See Other');
 

if($audio)
{
 
    if($fgmembersite->ApproveAudio($student_ids, $course_id))
        {
            echo "<script type='text/javascript'>alert('Audio only option Successfully activated!');</script>";
        } 
}if(!$audio){
echo "<script type='text/javascript'>alert('Bad!');</script>";
   if($fgmembersite->RejectAudio($student_ids, $course_id))
        {
            echo "<script type='text/javascript'>alert('Audio only option Successfully Deactivated!');</script>";
        } 
}
header('Location: ./students.php?course_id='.$course_id);

?>
