<?php
require_once("../include/membersite_config.php");
//need this if statement for userid() to show up
if(!$fgmembersite->CheckLogin())
{
//redundant  but for now seems legit
    $fgmembersite->LogOut();
    $fgmembersite->RedirectToURL("../index.php");
	
	exit;
}



//if session has week_no and course_id ... else send us a report
session_start();
if($week_no=  $_SESSION['week'])
{
$course_id = $_SESSION['class'];

$username = $fgmembersite->Userid();
$stud_id = $fgmembersite->GetStudId($username);
$fileName = $fgmembersite->Userid()."-practice-course-".$course_id;


 
###################### HDFVR Configuration File ######################
//connectionstring:String
//desc: the rtmp connection string to the hdfvr application on your media server
//values: 'rtmp://localhost/hdfvr/_definst_', 'rtmp://myfmsserver.com/hdfvr/_definst_', etc...

$config['connectionstring']='rtmp://localhost/hdfvr/_definst_';


//This variable is sent to videorecorder.swf via flash vars and sent to this Php script via GET/query string. 
//To edit it's value look in the VideoRecorder.html file for "&recorderId=123", 123 is it's default value.
//You can use this variabe to control the below variables that are sent back to HDFVR. Tehse variables are the main way to control/configure HDFVR.
if(isset($_GET["recorderId"])){
	$recorderId = $_GET["recorderId"];
}

//languagefile:String
//description: path to the XML file containing words and phrases to be used in the video recorder interface, use this setting to switch between languages while maintaining several language files
//values: URL paths to the translation files
//default: 'translations/en.xml'
$config['languagefile']='translations/en.xml';

//qualityurl: String
//desc: path to the .xml file describing video and audio quality to use for recording, this variable has higher priority than the qualityurl from flash vars
//values: URL paths to the audio/video quality profile files
//default: '' (the qualityurl flash var is being used)
$config['qualityurl']='';

//maxRecordingTime: Number
//desc: the maximum recording time in seconds
//values: any number greater than 0;
//default:120
$config['maxRecordingTime']=150;

//userId: String
//desc: the id of the user logged into the website, not mandatory, this var is passed back to the save_video_to_db.php file via GET when the [SAVE] button in the recorder is pressed, this variable can also be passed via flash vars like this: videorecorder.swf?userId=XXX, but the value in this file, if not empty, takes precedence. If $config["useUserId"]="true", the value of this variable is also used in the stream name.
//values: strings or numbers will do
//by default its empty: ""
$config['userId']="";


//outgoingBuffer: Number
//desc: Specifies how long the buffer for the outgoing audio/video data can grow before Flash Player starts dropping frames. On a high-speed connection, buffer time will not affect anything because data is sent almost as quickly as it is captured and there is no need to buffer it. On a slow connection, however, there might be a significant difference between how fast Flash Player can capture audio and video data data and how fast it can be sent to the client, thus the surplus needs to be buffered. HDFVR will increase the value specified here as much as possible (if the buffer fills more than 90% of the available buffer, we double the available buffer) to prevent Flash Player from dumping the data in the buffer when it's full.
//values: 30,60,etc...
//default:60
$config['outgoingBuffer']=60;

//playbackBuffer: Number
//desc: Specifies how much video time to buffer when (after recording a movie) you play it back
//values: 1, 10,20,30,60,etc...
//default:1
$config['playbackBuffer']= 1;

//autoPlay: String
//desc: weather the recorded video should play automatically after recording it or we should  wait for the user to press the PLAY button
//values: false, true
//default: 'false'
$config['autoPlay']='false';

//deleteUnsavedFlv: String
//desc: weather the recorded videos for which the user has not pressed [SAVE] will be deleted from the media server or not
//values: false, true
//default: 'false'
$config['deleteUnsavedFlv'] = 'false';

//hideSaveButton:Number
//desc: makes the [SAVE] button invisible. When the [SAVE] button is pressed the save_video_to_db.xxx script is called and the corresponding JS functions. The creation/existence of the new video file and corresponding snapshot do not depend on pressing this button.
//An invisible SAVE button can be used to move the SAVE action to the HTML page where there can be other form fields that can be submitted together with the info about the vid.
//When the SAVE button is hidden you can use the onUploadDone java script hook to get some info about the newly recorded flv file and redirect the user/enable a button on the HTML page/populate some hidden FORM vars/etc... .
//NOTE: when hiding this button some functions/calls will never be performed: save_video_to_db.php will never be called, onSaveOk and onSaveFailed JS functions will not be called
//values: 1 for hidden, 0 for visible
//default: 0 (visible)
$config['hideSaveButton']=1;


//onSaveSuccessURL:String
//desc: when the [SAVE] button is pressed (if its enabled) save_video_to_db.php (or .asp) is called. If the save operation succeeds AND if this variable is NOT EMPTY, the user will be taken to the URL
//values: any URL you want the user directed to after he presses the [Save] button
//default: ""
$config["onSaveSuccessURL"]="";

//snapshotSec:Number
//desc: the snapshot is taken when the recording reaches this length/time
//NOTE: THE SNAPSHOT IS SAVED TO THE WEB SERVER AS A JPG WHEN THE USER PRESSES THE SAVE BUTTON. If Save is not pressed the snapshot is not saved.
//values: any number  greater or equal to 0,  if 0 then the snap shot is taken when the [REC] button is pressed
//default: 5
$config["snapshotSec"] = 5;

//snapshotEnable:Number
//desc: if set to true the recorder will take a snapshot 
//values: true or false
//default: 'true'
$config["snapshotEnable"] = "true";

//minRecordTime:Number
//desc: the minimum number of seconds a recording must be in length. The STOP button will be disabled until the recording reaches this length! 
//values: any number lower them maxRecordingTime
//default: 5
$config["minRecordTime"] = 1;

//backgroundColor:Hex number
//desc: color of background area inside the video recorder around the video area
//values: any color in hex format
//default:0x990000 (dark red)
$config["backgroundColor"] = 0x000000;

//menuColor:Hex number
//desc: the color of the lower area of the recorder containing the buttons and the scrub bar
//values:any color in hex format
//default:0x333333 (dark grey)
$config["menuColor"] = 0x000000;

//radiusCorner:Number
//desc: the radius of the 4 corners of the video recorder
//values: 0 for no rounded corners, 4,8,16,etc...
//default: 4
$config["radiusCorner"] = 0;

//showFps:String
//desc: Shows or hides the FPS counter
//values: 'false' to hide it 'true' to show it
//default: 'true'
$config["showFps"] = 'true';

//recordAgain:String
//desc:if set to true the user will be able to record again and again until he is happy with the result. If set to false he only has 1 shot!
//values:'false' for one recording, 'true' for multiple recordings
//default: 'true'
$config["recordAgain"] =  'false';

//useUserId:String
//desc:if set to 'true' the stream name will be {prefix}_{userId}_{timestamp_random} instead of {prefix}_{timestamp_random}. {userId} will be reaplced by HDFVR with the value of $config['userId'] from this file.
//values:'false' for not using the userId in the file name, 'true' for using it
//default: 'false'
$config["useUserId"] =  'true';

//streamPrefix:String
//desc: adds a prefix to the .flv (recording) file name on the media server like this: {prefix}_{timestamp_random} or {prefix}_{userId}_{timestamp_random} if the useUserId option is set to true
//values: a string
//default: "videoStream_"
$config["streamPrefix"] = "videoStream_";

//streamName:String
//desc: By default the application generates a random name ({prefix}_{timestamp_random}) for the .flv file (recording). If you want to use a certain name set this variable and it will overwrite the pattern {prefix}_{timestamp_random}.
//values: a string
//default: ""
$config["streamName"] = $fileName;

//disableAudio:String
//desc: By default the application records audio and video. If you want to disable audio recording set this var to 'true'.
//values: 'false' to include audio in the recording, 'true' to record without audio
//default: 'false'
$config["disableAudio"] = 'false';

//chmodStreams:String
//desc: If you want to change the permissions on the newly recorded .flv file after it is saved to the disk on the media server you can use this variable. This works only on Red5 and Wowza.
//values: "0666","0777", etc.
//default: ""
$config["chmodStreams"] = "";

//padding:Number
//desc: the padding between elements in the recorder in pixels
//values: any number
//default:2
$config["padding"]=2;

//countdownTimer:String
//desc: set to true if you want the timer to decrease from the upper limit (maxRecordingTime) down to 0
//values: "true", "false"
//defaut: "false"
$config["countdownTimer"]="false";

//overlayPath:String
//desc: realtive URL path to the image to be shown as overlay
//values: any realtive path
//defaut: "" //no overlay
$config["overlayPath"]="fullStar.png";

//overlayPosition:String
//desc: position of the overlay image mentioned above
//values: "tr" for top right, "tl" for top left, no other positions are supported
//defaut: "tr"
$config["overlayPosition"]="tr";

//loopbackMic:String
//desc: weather or not the sound should be also played back in the speakers/heaphones during recording
//values: "true" for yes, "false" for no
//defaut: "false"
$config["loopbackMic"]="false";

//showMenu:String
//desc: weather or not the bottom menu in the HDFVR shoud show, some people choose to control the HDFVR via JS and they do ot need the menu, when not using the menu you can decrease the height of HDFVR by 32 (3o is the height of the button 2 is the default padding value in this config file)
//values: "true" to show, "false" to hide
//default: "true"
$config["showMenu"]="false";

//showTimer:String
//desc: Show or hides the timer
//values: 'false' to hide it 'true' to show it
//default: 'true'
$config["showTimer"] = 'true';

//showSoundBar:String
//desc: Shows or hides the sound bar
//values: 'false' to hide it 'true' to show it
//default: 'true'
$config["showSoundBar"] = 'true';

//flipImageHorizontally:String
//desc: Shows the webcam feed flipped horizontally. The actual video file will not contain the flipped image.
//values:  'true' to flip it, 'false' to show it as it comes from the webcam
//default: 'false'
$config["flipImageHorizontally"] = 'false';

##################### DO NOT EDIT BELOW ############################
//integration.php most commonly contains code for integrating with 3rd party CMS systems 
//it is generally used for overwriting values in this file so that whenever you update HDFVR the integration remains unchanged

if (file_exists("integration.php")){ include("integration.php");}

echo "donot=removethis";
foreach ($config as $key => $value){
	echo '&'.$key.'='.$value;
}
}
else
{
echo "something went wrong, please contact support";
}
?>