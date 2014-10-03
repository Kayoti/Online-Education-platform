using System;
using System.Collections.Generic;
using System.Web;
using System.IO;
using System.Collections;

namespace HDFVR
{
    public partial class SaveToDB : System.Web.UI.Page
    {
        
        protected void Page_Load(object sender, EventArgs e)
        {

            	
                string streamName = this.Request.Params["streamName"];         
                string streamDuration = this.Request.Params["streamDuration"];
				string userId = this.Request.Params["userId"];
				string recorderId = this.Request.Params["recorderId"];
               
			   
                string response = string.Empty;
                response = "save=ok";
                Response.Write(response);
        }
    }
}