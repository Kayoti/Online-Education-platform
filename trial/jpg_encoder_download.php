<?php
//this file is called by the videorecorder.swf file when the [SAVE] button is pressed

//videorecorder.swf sends the name of the stream via the GET variable named "name"
$photoName = $_GET["name"];

//the recorderId var contais the value of the recorderId fash var sent from VideoRecorder.html to the swf file
$recorderId= $_GET["recorderId"];

//we make the snapshots folder if it does not exists
if(!is_dir("snapshots")){
	$res = mkdir("snapshots",0777); 
}

//it also sends the snapshot JPG info via POST
if(isset($GLOBALS["HTTP_RAW_POST_DATA"])){
	$image = fopen("snapshots/".$photoName,"wb");
	fwrite($image , $GLOBALS["HTTP_RAW_POST_DATA"] );
	fclose($image);
}

echo "save=ok";
die();
//echo "save=failed" to tell the recorder the snapshot saving process has failed
?>