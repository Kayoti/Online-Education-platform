<%
''###################### HDFVR Configuration File #####################
''connectionstring:String
''desc: the rtmp connection string to the hdfvr application on your media server
''values: 'rtmp://localhost/hdfvr/_definst_', 'rtmp://myfmsserver.com/hdfvr/_definst_', etc...
Dim connectionstring
connectionstring=""

''#####FOR DOCUMENTATION ON EACH OPTION CHECK OUT AVC_SETTINGS.PHP#####

''Dim recorderId
''recorderId=Request.QueryString("recorderId")

Dim languagefile
languagefile="translations/en.xml"

Dim qualityurl
qualityurl=""

Dim maxRecordingTime
maxRecordingTime=120

Dim userId
userId = ""

Dim outgoingBuffer
outgoingBuffer=60

Dim playbackBuffer
playbackBuffer=1

Dim autoPlay
autoPlay="false"

Dim deleteUnsavedFlv
deleteUnsavedFlv = "false"

Dim hideSaveButton
hideSaveButton=0

Dim onSaveSuccessURL
onSaveSuccessURL=""

Dim snapshotSec
snapshotSec = 5

Dim snapshotEnable
snapshotEnable = "true"

Dim minRecordTime
minRecordTime = 5

Dim backgroundColor
backgroundColor = "0x990000"

Dim menuColor
menuColor = "0x333333"

Dim radiusCorner
radiusCorner = 4

Dim showFps
showFps = "true"

Dim recordAgain
recordAgain =  "true"

Dim useUserId
useUserId =  "false"

Dim streamPrefix
streamPrefix = "videoStream_"

Dim streamName
streamName = ""

Dim disableAudio
disableAudio = "false"

Dim chmodStreams
chmodStreams = ""

Dim padding
padding = 2

Dim countdownTimer
countdownTimer = "false"

Dim overlayPath
overlayPath = ""

Dim overlayPosition
overlayPosition="tr"

Dim loopbackMic
loopbackMic="false"

Dim showMenu
showMenu="true"

Dim showTimer
showTimer = "true"

Dim showSoundBar
showSoundBar = "true"

Dim flipImageHorizontally
flipImageHorizontally = false

''##################### DO NOT EDIT BELOW ############################
Response.write("connectionstring=")
Response.write(connectionstring)
Response.write("&languagefile=")
Response.write(languagefile)
Response.write("&qualityurl=")
Response.write(qualityurl)
Response.write("&maxRecordingTime=")
Response.write(maxRecordingTime)
Response.write("&userId=")
Response.write(userId)
Response.write("&outgoingBuffer=") 
Response.write(outgoingBuffer)
Response.write("&playbackBuffer=") 
Response.write(playbackBuffer)
Response.write("&autoPlay=")
Response.write(autoPlay)
Response.write("&deleteUnsavedFlv=")
Response.write(deleteUnsavedFlv)
Response.write("&hideSaveButton=")
Response.write(hideSaveButton)
Response.write("&onSaveSuccessURL=")
Response.write(onSaveSuccessURL)
Response.write("&snapshotSec=")
Response.write(snapshotSec)
Response.write("&snapshotEnable=")
Response.write(snapshotEnable)
Response.write("&minRecordTime=")
Response.write(minRecordTime)
Response.write("&backgroundColor=")
Response.write(backgroundColor)
Response.write("&menuColor=")
Response.write(menuColor)
Response.write("&radiusCorner=")
Response.write(radiusCorner)
Response.write("&showFps=")
Response.write(showFps)
Response.write("&recordAgain=")
Response.write(recordAgain)
Response.write("&useUserId=")
Response.write(useUserId)
Response.write("&streamPrefix=")
Response.write(streamPrefix)
Response.write("&streamName=")
Response.write(streamName)
Response.write("&disableAudio=")
Response.write(disableAudio)
Response.write("&chmodStreams=")
Response.write(chmodStreams)
Response.write("&padding=")
Response.write(padding)
Response.write("&overlayPath=")
Response.write(overlayPath)
Response.write("&overlayPosition=")
Response.write(overlayPosition)
Response.write("&loopbackMic=")
Response.write(loopbackMic)
Response.write("&showMenu=")
Response.write(showMenu)
Response.write("&showTimer=")
Response.write(showTimer)
Response.write("&showSoundBar=")
Response.write(showSoundBar)
Response.write("&flipImageHorizontally=")
Response.write(flipImageHorizontally)

%>