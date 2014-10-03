using System;
using System.Collections.Generic;
using System.Web;
using System.IO;
using System.Collections;

namespace HDFVR
{
    public partial class JpegEncoder : System.Web.UI.Page
    {
        private const string UPLOAD_DIRECTORY = "snapshots/";
        private IList extensions = new string[] { "jpg" };

		public static void CopyStream(Stream input, Stream output)
		{
			byte[] buffer = new byte[8 * 1024];
			int len;
			while ( (len = input.Read(buffer, 0, buffer.Length)) > 0)
			{
				output.Write(buffer, 0, len);
			}    
		}

        protected void Page_Load(object sender, EventArgs e)
        {

            	//videorecorder.swf sends the name of the stream via the GET variable named "name"
                string photoName = this.Request.Params["name"];
                
                //the recorderId var contais the value of the recorderId fash var sent from VideoRecorder.html to the swf file
                string recorderId = this.Request.Params["recorderId"];
               
			   //we make the snapshots folder if it does not exists
                string uploadDirectory = HttpContext.Current.Server.MapPath(UPLOAD_DIRECTORY);
				if (!Directory.Exists(uploadDirectory))
				{
					Directory.CreateDirectory(uploadDirectory);
				}
				
				string uploadFile = Path.Combine(uploadDirectory, photoName);
				
				//Get the stream  
				Stream input = (Stream)Request.InputStream;  
		  
				using (Stream file = File.OpenWrite(uploadFile))
				{
					CopyStream(input, file);
				}
			

                string response = string.Empty;
                response = "?save=ok";
                Response.Write(response);
        }
    }
}