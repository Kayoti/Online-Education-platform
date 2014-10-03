<%
''this file is called by the videorecorder.swf file when the [SAVE] button is pressed

''videorecorder.swf sends the name of the stream via GET
Dim photoName
photoName = Request.QueryString("name")

''the recorderId var contais the value of the recorderId fash var sent from VideoRecorder.html to the swf file
Dim recorderId
recorderId=Request.QueryString("recorderId")

'' Map the path to the relevant save folder
Dim strPath
strPath = Server.MapPath("snapshots/")
strPath = strPath & photoName

'' 
Dim fileData
fileData = Request.BinaryRead(Request.TotalBytes)

'' write the file to disk new method
Dim fs,f
Set fs=CreateObject("Scripting.FileSystemObject")
Set f = fs.OpenTextFile(strPath,8,true)
f.Write fileData
f.Close


'' write the file to disk
''Dim oFile
''oFile = File.Create(strPath)
''oFile.Write fileData
''oFile.Close

Response.write("save=ok")
''Response.write("save=failed") to tell the recorder the snapshot saving process has failed
%>