/**
###################### HDFVR Configuration File ######################
########################### .aspx Version ######################### 
#### See avc_settings.php for explanation of each variable ########
**/
using System;
using System.Collections.Generic;
using System.Web;

namespace HDFVR
{
    public partial class GeneralSettings : System.Web.UI.Page
    {
        private static Dictionary<string, object> configurationData = new Dictionary<string, object>();

        private static void CreateConfig()
        {
            configurationData = new Dictionary<string, object>();

            /** ######################## MANDATORY FIELDS ######################### **/
            configurationData.Add("connectionstring", "rtmp://localhost/hdfvr/_definst_");
            /** ######################### OPTIONAL FIELDS (GENERAL) ############### **/
            configurationData.Add("languagefile", "translations/en.xml");
			configurationData.Add("qualityurl", "");
			configurationData.Add("maxRecordingTime", 120);
			configurationData.Add("userId", "");
			configurationData.Add("outgoingBuffer", 60);
			configurationData.Add("playbackBuffer", 1);
			configurationData.Add("autoPlay", "false");
			configurationData.Add("deleteUnsavedFlv", "false");
			configurationData.Add("hideSaveButton", 0);
			configurationData.Add("onSaveSuccessURL", "");
			configurationData.Add("snapshotSec", 5);
			configurationData.Add("snapshotEnable", "true");
			configurationData.Add("minRecordTime", 5);
			configurationData.Add("backgroundColor", 0x990000 );
			configurationData.Add("menuColor", 0x333333);
			configurationData.Add("radiusCorner", 4);
			configurationData.Add("showFps", "true");
			configurationData.Add("recordAgain", "true");
			configurationData.Add("useUserId", "false");
			configurationData.Add("streamPrefix", "videoStream_");
			configurationData.Add("streamName", "");
			configurationData.Add("disableAudio", "false");
			configurationData.Add("chmodStreams", "");
			configurationData.Add("padding", 2);
			configurationData.Add("countdownTimer", "fullStar.png");
			configurationData.Add("overlayPosition", "tr");
			configurationData.Add("loopbackMic", "false");
			configurationData.Add("showMenu", "true");
			configurationData.Add("showTimer", "true");
			configurationData.Add("showSoundBar", "true");
			configurationData.Add("flipImageHorizontally", "false");
        }

        protected void Page_Load(object sender, EventArgs e)
        {
            CreateConfig();
            Response.Write("a=b");
            foreach (KeyValuePair<string, object> configOption in configurationData)
            {
                Response.Write("&" + configOption.Key + "=" + HttpUtility.UrlEncode(configOption.Value.ToString()));
            }
        }
    }
}