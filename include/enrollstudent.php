<?php
if(isset($_GET["u_id"]))
{
	$uni_id = $_GET["u_id"];
}
if(isset($_GET["fn"]))
{
	$fn = $_GET["fn"];
}
if(isset($_GET["student_id"]))
{
	$stud_id = $_GET["student_id"];
}
if($fn=='populatecourses')
{
	PopulateCourses($uni_id, $stud_id);
}
function PopulateCourses($uni_id, $stud_id)
{
		require_once("membersite_config.php");
		$course_list = $fgmembersite->GetUniqueCoursesGivenInstitute($uni_id, $stud_id);
		echo "<h4>Select your Course</h4><select class='selectpicker' id='course_list' name='course_list' onChange='courses_click()'>";
		echo "<option name='courselist' value='select'>Select</option>";
		$i=1;
		foreach ($course_list as $course){
			echo "<option name='ulist' value='".$course['course_id']."'>".$course['course_name']." - ".$course['course_no']."</option>";
		}
		echo "</select>";
		
}

?>