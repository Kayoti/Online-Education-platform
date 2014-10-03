<?PHP
/*
    Registration/Login script from HTML Form Guide
    V1.0

    This program is free software published under the
    terms of the GNU Lesser General Public License.
    http://www.gnu.org/copyleft/lesser.html
    
    GetProfessorProfile
This program is distributed in the hope that it will
be useful - WITHOUT ANY WARRANTY; without even the
implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.

For updates, please visit:
http://www.html-form-guide.com/php-form/php-registration-form.html
http://www.html-form-guide.com/php-form/php-login-form.html

*/
require_once("class.phpmailer.php");
require_once("formvalidator.php");

class FGMembersite
{
    var $admin_email;
    var $from_address;
    
    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;
    var $rand_key;
    var $location_site = 'localhost/pp';
    var $error_message;
    
    //-----Initialization -------
    function FGMembersite()
    {
        $this->sitename = 'localhost:80';
        $this->rand_key = '0iQx5oBk66oVZep';
    }
    
    function InitDB($host,$uname,$pwd,$database,$tablename)
    {
        $this->db_host  = $host;
        $this->username = $uname;
        $this->pwd  = $pwd;
        $this->database  = $database;
        $this->tablename = $tablename;       
    }
    function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }
    
    //-------Main Operations ----------------------
    function RegisterUser()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        $formvars = array();
        
        if(!$this->ValidateRegistrationSubmission())
        {
            return false;
        }
        
        $this->CollectRegistrationSubmission($formvars);
        
        if(!$this->SaveToDatabase($formvars))
        {
            return false;
        }
        
        if(!$this->SendUserConfirmationEmail($formvars))
        {
            return false;
        }

        $this->SendAdminIntimationEmail($formvars);
        
        return true;
    }
//confirm user ?
    function ConfirmUser()
    {
        if(empty($_GET['code'])||strlen($_GET['code'])<=10)
        {
            $this->HandleError("Please provide the confirm code");
            return false;
        }
        $user_rec = array();
        if(!$this->UpdateDBRecForConfirmation($user_rec))
        {
            return false;
        }
        
        $this->SendUserWelcomeEmail($user_rec);
        
        $this->SendAdminIntimationOnRegComplete($user_rec);
        
        return true;
    }    
    
    function Login()
    {
        if(empty($_POST['username']))
        {
            $this->HandleError("UserName is empty!");
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->HandleError("Password is empty!");
            return false;
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckLoginInDB($username,$password))
        {
            return false;
        }
        
        $_SESSION[$this->GetLoginSessionVar()] = $username;
        
        return true;
    }
    
    function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
		 date_default_timezone_set("America/Halifax");
         return true;
    }
    
    function UserFullName()
    {
        return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
    }
    
    function UserEmail()
    {
        return isset($_SESSION['email_of_user'])?$_SESSION['email_of_user']:'';
	}
	
     function UserRoleType()
    {
        return isset($_SESSION['role_of_user'])?$_SESSION['role_of_user']:'';
    }
	function Userid()
    {
        return isset($_SESSION['id_of_user'])?$_SESSION['id_of_user']:'';
    }
    function LogOut()
    {
        //session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
    
    function EmailResetPasswordLink()
    {
        if(empty($_POST['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        $user_rec = array();
        if(false === $this->GetUserFromEmail($_POST['email'], $user_rec))
        {
            return false;
        }
        if(false === $this->SendResetPasswordLink($user_rec))
        {
            return false;
        }
        return true;
    }
    
    function ResetPassword()
    {
        if(empty($_GET['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        if(empty($_GET['code']))
        {
            $this->HandleError("reset code is empty!");
            return false;
        }
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);
        
        if($this->GetResetPasswordCode($email) != $code)
        {
            $this->HandleError("Bad reset code!");
            return false;
        }
        
        $user_rec = array();
        if(!$this->GetUserFromEmail($email,$user_rec))
        {
            return false;
        }
        
        $new_password = $this->ResetUserPasswordInDB($user_rec);
        if(false === $new_password || empty($new_password))
        {
            $this->HandleError("Error updating new password");
            return false;
        }
        
        if(false == $this->SendNewPassword($user_rec,$new_password))
        {
            $this->HandleError("Error sending new password");
            return false;
        }
        return true;
    }
    
    function ChangePassword()
    {
        if(!$this->CheckLogin())
        {
            $this->HandleError("Not logged in!");
            return false;
        }
        
        if(empty($_POST['oldpwd']))
        {
            $this->HandleError("Old password is empty!");
            return false;
        }
        if(empty($_POST['newpwd']))
        {
            $this->HandleError("New password is empty!");
            return false;
        }
        
        $user_rec = array();
        if(!$this->GetUserFromEmail($this->UserEmail(),$user_rec))
        {
            return false;
        }
        
        $pwd = trim($_POST['oldpwd']);
        
        if($user_rec['password'] != md5($pwd))
        {
            $this->HandleError("The old password does not match!");
            return false;
        }
        $newpwd = trim($_POST['newpwd']);
        
        if(!$this->ChangePasswordInDB($user_rec, $newpwd))
        {
            return false;
        }
        return true;
    }
    
    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    
    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->rand_key);
    }
    
    function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }    
    //-------Private Helper functions-----------
    
    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
    
    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysql_error());
    }
    
    function GetFromAddress()
    {
        if(!empty($this->from_address))
        {
            return $this->from_address;
        }
		
		 $host = $_SERVER['SERVER_NAME']; 
       

        $from ="nobody@$host";
        return $from;
    } 
    
    function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }
    
    function CheckLoginInDB($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
        $qry = "Select name, email,role,username from $this->tablename where username='$username' and password='$pwdmd5' and confirmcode='y'";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        
        $_SESSION['name_of_user']  = $row['name'];
		$_SESSION['id_of_user']  = $row['username'];
        $_SESSION['email_of_user'] = $row['email'];
		$_SESSION['role_of_user'] = $row['role'];
        
        return true;
    }
	
    
    function UpdateDBRecForConfirmation(&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $confirmcode = $this->SanitizeForSQL($_GET['code']);
        
        $result = mysql_query("Select name, email from $this->tablename where confirmcode='$confirmcode'",$this->connection);   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Wrong confirm code.");
            return false;
        }
        $row = mysql_fetch_assoc($result);
        $user_rec['name'] = $row['name'];
        $user_rec['email']= $row['email'];
        
        $qry = "Update $this->tablename Set confirmcode='y' Where  confirmcode='$confirmcode'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }      
        return true;
    }
    
    function ResetUserPasswordInDB($user_rec)
    {
        $new_password = substr(md5(uniqid()),0,10);
        
        if(false == $this->ChangePasswordInDB($user_rec,$new_password))
        {
            return false;
        }
        return $new_password;
    }
    
    function ChangePasswordInDB($user_rec, $newpwd)
    {
        $newpwd = $this->SanitizeForSQL($newpwd);
        
        $qry = "Update $this->tablename Set password='".md5($newpwd)."' Where  id_user=".$user_rec['id_user']."";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error updating the password \nquery:$qry");
            return false;
        }     
        return true;
    }
    
    function GetUserFromEmail($email,&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $email = $this->SanitizeForSQL($email);
        
        $result = mysql_query("Select * from $this->tablename where email='$email'",$this->connection);  

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("There is no user with email: $email");
            return false;
        }
        $user_rec = mysql_fetch_assoc($result);

        
        return true;
    }
    
    function SendUserWelcomeEmail(&$user_rec)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($user_rec['email'],$user_rec['name']);
        
        $mailer->Subject = "Welcome to PresentersPodium.com";

        $mailer->From = $this->GetFromAddress();        
        
        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "Welcome! Your registration  at PresentersPodium.com is completed.\r\n".
        "\r\n".
        "Regards,\r\n".
        "Your team at PresentersPodium.com\r\n";
        

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending user welcome email.");
            return false;
        }
        return true;
    }
    
    function SendAdminIntimationOnRegComplete(&$user_rec)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($this->admin_email);
        
        $mailer->Subject = "Registration Completed: ".$user_rec['name'];

        $mailer->From = $this->GetFromAddress();         
        
        $mailer->Body ="A new user registered at Presenterspodium.com \r\n".
        "Name: ".$user_rec['name']."\r\n".
        "Email address: ".$user_rec['email']."\r\n";
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }
    
    function GetResetPasswordCode($email)
    {
       return substr(md5($email.$this->sitename.$this->rand_key),0,10);
    }
    
    function SendResetPasswordLink($user_rec)
    {
        $email = $user_rec['email'];
        
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email,$user_rec['name']);
        
        $mailer->Subject = "Your reset password request at Presenterspodium.com";

        $mailer->From = $this->GetFromAddress();
        
        $link = $this->GetAbsoluteURLFolder().
                '/registration/resetpwd.php?email='.
                urlencode($email).'&code='.
                urlencode($this->GetResetPasswordCode($email));

        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "There was a request to reset your password at Presenterspodium.com \r\n".
        "Please click the link below to complete the request: \r\n".$link."\r\n".
        "Regards,\r\n".
        "Your team atPresenterspodimu.com \r\n";
        
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }
    
    function SendNewPassword($user_rec, $new_password)
    {
        $email = $user_rec['email'];
        
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email,$user_rec['name']);
        
        $mailer->Subject = "Your new password for Presenterspodium.com";

        $mailer->From = $this->GetFromAddress();
        
        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "Your password is reset successfully. ".
        "1- Login using your updated login:\r\n".
        "username:".$user_rec['username']."\r\n".
        "password:$new_password\r\n".
        "\r\n 2- change your temporary password in your profile page\r\n".
        "Login here: ".$this->GetAbsoluteURLFolder()."/index.php".
        "\r\n".
        "Regards,\r\n".
        "Your team atPresentersPodium.com \r\n"
        ;
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }    
    
    function ValidateRegistrationSubmission()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
        
        $validator = new FormValidator();
        $validator->addValidation("name","req","Please fill in Name");
		 $validator->addValidation("lastname","req","Please fill in Last Name");
        $validator->addValidation("email","email","The input for Email should be a valid email value");
        $validator->addValidation("email","req","Please fill in Email");
        $validator->addValidation("username","req","Please fill in UserName");
        $validator->addValidation("password","req","Please fill in Password");

        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inpname.':'.$inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }
    
    function CollectRegistrationSubmission(&$formvars)
    {
        $formvars['name'] = $this->Sanitize($_POST['name']);
		$formvars['lastname'] = $this->Sanitize($_POST['lastname']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['username'] = $this->Sanitize($_POST['username']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
		/*Added by Tialt*/
		$formvars['role'] = $this->Sanitize($_POST['Role']);
    }
    
    function SendUserConfirmationEmail(&$formvars)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($formvars['email'],$formvars['name']);
        
        $mailer->Subject = "Your registration with PresentersPodium";

        $mailer->From = $this->GetFromAddress();        
        
        $confirmcode = $formvars['confirmcode'];
        
        $confirm_url = $this->GetAbsoluteURLFolder()."/registration/confirmreg.php?code=".$confirmcode;
        
        $mailer->Body ="Hello ".$formvars['name']."\r\n\r\n".
        "Thank you for registering at Presenterspodium.com \r\n".
        "Please click the link below to confirm your registration."."\r\n".
        "$confirm_url"."\r\n\r\n".
        
        "Regards,\r\n".
        "Your Team at Presenterspodium.com\r\n";

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            return false;
        }
        return true;
    }
    function GetAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';

        $urldir ='';
        $pos = strrpos($_SERVER['REQUEST_URI'],'/');
        if(false !==$pos)
        {
            $urldir = substr($_SERVER['REQUEST_URI'],0,$pos);
        }

        $scriptFolder .= $_SERVER['HTTP_HOST'].$urldir;

        return $scriptFolder;
    }
    
    function SendAdminIntimationEmail(&$formvars)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($this->admin_email);
        
        $mailer->Subject = "New registration: ".$formvars['name'];

        $mailer->From = $this->GetFromAddress();         
        
        $mailer->Body ="A new user registered at ".$this->sitename."\r\n".
        "Name: ".$formvars['name']."  ".$formvars['lastname']."\r\n".
        "Email address: ".$formvars['email']."\r\n".
        "UserName: ".$formvars['username']."\r\n".
		"Role: ".$formvars['role'];
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }
    
    function SaveToDatabase(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        if(!$this->Ensuretable())
        {
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'email'))
        {
            $this->HandleError("This email is already registered");
            return false;
        }
        
        if(!$this->IsFieldUnique($formvars,'username'))
        {
            $this->HandleError("This UserName is already used. Please try another username");
            return false;
        }        
        if(!$this->InsertIntoDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        return true;
    }
    
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select username from $this->tablename where $fieldname='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    function DBLogin()
    {

        $this->connection = mysql_connect($this->db_host,$this->username,$this->pwd);

        if(!$this->connection)
        {   
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysql_select_db($this->database, $this->connection))
        {
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        if(!mysql_query("SET NAMES 'UTF8'",$this->connection))
        {
            $this->HandleDBError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }    
    
    function Ensuretable()
    {
        $result = mysql_query("SHOW COLUMNS FROM $this->tablename");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return $this->CreateTable();
        }
        return true;
    }
    
    function CreateTable()
    {
        $qry = "Create Table $this->tablename (".
                "id_user INT NOT NULL AUTO_INCREMENT ,".
                "name VARCHAR( 128 ) NOT NULL ,".
                "email VARCHAR( 64 ) NOT NULL ,".
                "phone_number VARCHAR( 16 ) NOT NULL ,".
                "username VARCHAR( 16 ) NOT NULL ,".
				"role INT(1) NOT NULL ,".
                "password VARCHAR( 32 ) NOT NULL ,".
                "confirmcode VARCHAR(32) ,".
                "PRIMARY KEY ( id_user )".
                ")";
                
        if(!mysql_query($qry,$this->connection))
        {
            $this->HandleDBError("Error creating the table \nquery was\n $qry");
            return false;
        }
        return true;
    }
    
    function InsertIntoDB(&$formvars)
    {
    
        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);
        
        $formvars['confirmcode'] = $confirmcode;
        
        $insert_query = 'insert into '.$this->tablename.'(
                name,
				lastname,
                email,
				phone_number,
                username,
				role,
                password,
                confirmcode
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['name']) . '",
				"' . $this->SanitizeForSQL($formvars['lastname']) . '",
				"' . $this->SanitizeForSQL($formvars['email']) . '", 
				"",
                "' . $this->SanitizeForSQL($formvars['username']) . '",
				"' . $this->SanitizeForSQL($formvars['role']) . '",
                "' . md5($formvars['password']) . '",
                "' . $confirmcode . '"
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }
		/*Added by Tialt
			Insert information into Student or Professor table depending on the role
			Role = 0 -> student and Role = 1 -> professor*/
			if(($formvars['role']) == 1)
			{
				$insert_query = 'insert into professor(
				first_name,
				last_name,
				email_id,
				phone_no,
				username,
				u_id
				)
				values
				(
				"' . $this->SanitizeForSQL($formvars['name']) . '",				
				"' . $this->SanitizeForSQL($formvars['lastname']) . '",
				"' . $this->SanitizeForSQL($formvars['email']) . '",
				"",
				"' . $this->SanitizeForSQL($formvars['username']) . '",
				0
				)';
				
				if(!mysql_query($insert_query, $this->connection))
				{
				$this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
				return false;
				}
			}
			else
			{
				$insert_query = 'insert into student(
				s_fname,
				s_lname,
				email_id,
				student_institute_id,
				phone_no,
				u_id,
				username
				)
				values
				(
				"' . $this->SanitizeForSQL($formvars['name']) . '",
				"' . $this->SanitizeForSQL($formvars['lastname']) . '",
				
				"' . $this->SanitizeForSQL($formvars['email']) . '",
				"",
				"",
				0,
				"' . $this->SanitizeForSQL($formvars['username']) . '"
				)';
				if(!mysql_query($insert_query, $this->connection))
				{
				$this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
				return false;
				}
				
				/* $insert_into_studentcourse = 'INSERT INTO student_course (student_id) 
												SELECT student_id
												FROM student
												WHERE (
												s_fname =  "' . $this->SanitizeForSQL($formvars['name']) . '"
												AND s_lname =  ""
												AND email_id =  "' . $this->SanitizeForSQL($formvars['email']) . '")';
				
				if(!mysql_query($insert_into_studentcourse, $this->connection))
				{
				$this->HandleDBError("Error inserting data to the table\nquery:$insert_into_studentcourse");
				return false;
				} */
			}
			
			/*Changes by Tialt ends here*/
			
        return true;
    }
    function MakeConfirmationMd5($email)
    {
        $randno1 = rand();
        $randno2 = rand();
        return md5($email.$this->rand_key.$randno1.''.$randno2);
    }
    function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
    
 /*
    Sanitize() function removes any potential threat from the
    data submitted. Prevents email injections or any other hacker attempts.
    if $remove_nl is true, newline chracters are removed from the input.
    */
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }    
    function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }
    
    
      
  /*Added by Tialt*/
  /*Start Add New Course*/
   function ValidateCourseForm(&$formvars, &$uerror, &$universityinfo)
	{
		//This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
		$validator = new FormValidator();
        /*$validator->addValidation("iname","req","Please fill in Institute Name");
		$validator->addValidation("address","req","Please fill in Institute Address");
		$validator->addValidation("city","req","Please fill in Institute City");
		$validator->addValidation("provincestate","req","Please fill in Institute Province or State");
		$validator->addValidation("postalzip","req","Please fill in Institute Postal Code or Zip Code");
		$validator->addValidation("country","req","Please fill in Institute Country");*/
		$validator->addValidation("coursename","req","Please fill in a Course Name");
		$validator->addValidation("courseno","req","Please fill in a Course No");
		$validator->addValidation("u_list","req","Please select an Institute");
		$validator->addValidation("productcode","req","Please fill in a Product Code");
		$validator->addValidation("year","req","Please fill in a Year");
		$validator->addValidation("datepicker","req","Please pick a Date");
		$validator->addValidation("presentation","req","Please fill in Presentation Weight");
		$validator->addValidation("question","req","Please fill in Question Weight");
		$validator->addValidation("evaluation","req","Please fill in Evaluation Weight");
		$validator->addValidation("video_response","req","Please fill in Video Response Weight");
		$validator->addValidation("grammar","req","Please fill in Grammar Weight");

        $total = $formvars['presentation'] + $formvars['question'] + $formvars['evaluation'] + $formvars['video_response'] + $formvars['grammar'];
		$uinfostr = "&u_name=".$universityinfo['u_name']."&u_street=".$universityinfo['u_street']."&u_city=".$universityinfo['u_city']."&u_provincestate=".$universityinfo['u_province']."&u_postalzip=".$universityinfo['u_postalcode']."&u_country=".$universityinfo['u_country'];
		
        if((!$validator->ValidateForm())||($total!=100)||($uerror!=''))
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."<br>";
            }
			if($total!=100)
			{
				$errornot100 = "errornot100=".$total;
			}
			header('Location: ./addnewcourse.php?'.$uinfostr.'&uerror='.$uerror.'&'.$errornot100.'&coursename='.$formvars['coursename'].'&courseno='.$formvars['courseno'].'&productcode='.$formvars['productcode'].'&year='.$formvars['year'].'&term='.$formvars['term'].'&datepicker='.$formvars['datepicker'].'&grpchange='.$formvars['grpchange'].'&ulist_val='.$formvars['ulist_val'].'&presentation='.$formvars['presentation'].'&question='.$formvars['question'].'&evaluation='.$formvars['evaluation'].'&video_response='.$formvars['video_response'].'&grammar='.$formvars['grammar'].'&errormsg='.$error);
            //$this->HandleError($error);
            return false;
        }
		return true;
	}
	function ValidateUniversityForm(&$universityinfo)
	{
		//This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
		$validator = new FormValidator();
        $validator->addValidation("iname","req","Please fill in Institute Name");
		$validator->addValidation("address","req","Please fill in Institute Address");
		$validator->addValidation("city","req","Please fill in Institute City");
		$validator->addValidation("provincestate","req","Please fill in Institute Province or State");
		$validator->addValidation("postalzip","req","Please fill in Institute Postal Code or Zip Code");
		$validator->addValidation("country","req","Please fill in Institute Country");
		$noerror='';

        if(!$validator->ValidateForm())
        {
            $error='';
			
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."<br>";
            }

			return $error;
        }        
        return $noerror;
	}
    function AddCourse($professor_id)
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        $formvars = array();
		header('HTTP/1.1 303 See Other');
		$formvars['coursename'] = $this->Sanitize($_POST['coursename']);
        $formvars['courseno'] = $this->Sanitize($_POST['courseno']);
        
        $formvars['productcode'] = $this->Sanitize($_POST['productcode']);
        $formvars['term'] = $this->Sanitize($_POST['term']);
		$formvars['year'] = $this->Sanitize($_POST['year']);
		$formvars['datepicker'] = $this->Sanitize($_POST['datepicker']);
        $formvars['grpchange'] = $this->Sanitize($_POST['grpchange']);
        $formvars['ulist_val'] = $this->Sanitize($_POST['u_list']);
		$formvars['presentation'] = $this->Sanitize($_POST['presentation']);
        $formvars['question'] = $this->Sanitize($_POST['question']);
        $formvars['evaluation'] = $this->Sanitize($_POST['evaluation']);
        $formvars['video_response'] = $this->Sanitize($_POST['video_response']);
        $formvars['grammar'] = $this->Sanitize($_POST['grammar']);
		
		$universityinfo['u_name'] = $this->Sanitize($_POST['iname']);
		$universityinfo['u_street'] = $this->Sanitize($_POST['address']);
		$universityinfo['u_city'] = $this->Sanitize($_POST['city']);
		$universityinfo['u_province'] = $this->Sanitize($_POST['provincestate']);
		$universityinfo['u_postalcode'] = $this->Sanitize($_POST['postalzip']);
		$universityinfo['u_country'] = $this->Sanitize($_POST['country']);
		$uerror='';
		if($formvars['ulist_val']=="other")
		{
			$uerror = $this->ValidateUniversityForm($universityinfo);
		}
		if(!$this->ValidateCourseForm($formvars, $uerror, $universityinfo))
		{
			return false;
		}
		

		if($formvars['grpchange'] == "weekly")
        {
            $formvars['grp_change_freq'] = 0;
        }else if($formvars['grpchange'] == "bi-weekly"){
            $formvars['grp_change_freq'] = 1;
        }
        
		$formvars['professor_id'] = $professor_id;
        
		
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		
		if($formvars['ulist_val']=="other")
		{
			if(!$this->AddUniversityToDB($universityinfo))
			{
				$this->HandleError("Inserting to Database failed!");
				return false;
			}
			else
			{
				$select_uni_query = "select u_id from university where u_name='".$universityinfo['u_name']."' and u_street='".$universityinfo['u_street']."' and u_city='".$universityinfo['u_city']."' and u_province='".$universityinfo['u_province']."' and u_postalcode='".$universityinfo['u_postalcode']."' and u_country='".$universityinfo['u_country']."'";
				$res = mysql_query( $select_uni_query ,$this->connection);

				while(($row = mysql_fetch_assoc($res))) {
					$formvars['ulist_val']=$row["u_id"];
				}
			}
		}

        if(!($this->AddCourseToDB($formvars)))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        header('Location: ./courses.php');
        return true;
    }
    
	
    /*Added by Tialt*/
   function AddCourseToDB(&$formvars)
    {
        $insert_query = 'insert into course(
                product_code,
                course_no,
                course_name,
				term,
				year,
                start_date, 
                total_weeks,
                grp_change_freq, 
                presentation_due_day, 
                presentation_weight, 
                question_weight, 
                evaluation_weight, 
                video_response_weight,
                grammar_weight)
				values
                (
                "' . $this->SanitizeForSQL($formvars['productcode']) . '",
                "' . $this->SanitizeForSQL($formvars['courseno']) . '",
                "' . $this->SanitizeForSQL($formvars['coursename']) . '",
				"' . $this->SanitizeForSQL($formvars['term']) . '",
				"' . $this->SanitizeForSQL($formvars['year']) . '",
                "' . $this->SanitizeForSQL($formvars['datepicker']) . '",
                "10",
                "' . $this->SanitizeForSQL($formvars['grp_change_freq']) . '",
                "Thursday",
                "' . $this->SanitizeForSQL($formvars['presentation']) . '",
                "' . $this->SanitizeForSQL($formvars['question']) . '",
                "' . $this->SanitizeForSQL($formvars['evaluation']) . '",
                "' . $this->SanitizeForSQL($formvars['video_response']) . '",
                "' . $this->SanitizeForSQL($formvars['grammar']) . '"
                )';      
            
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");

            return false;
        }

        else
		{
		
            $course_no =$formvars['courseno'];
            $coursename = $formvars['coursename'];
			$prodcode = $formvars['productcode'];
			$term = $formvars['term'];
			$year = $formvars['year'];
			$date = $formvars['datepicker'];
			$grp_change_freq = $formvars['grp_change_freq'];
			$presentation = $formvars['presentation'];
			$question = $formvars['question'];
            $select_query = "select course_id from course where course_no='$course_no' and course_name= '$coursename' and product_code= '$prodcode' and term='$term' and year=$year and start_date='$date' and grp_change_freq=$grp_change_freq and presentation_weight=$presentation and question_weight=$question";
              
			$res = mysql_query( $select_query ,$this->connection);

			while(($row = mysql_fetch_assoc($res))) {
				$course_id=$row["course_id"];
			}
			$prof_id = $formvars['professor_id'];
			echo $course_id;
			if(!empty($course_id)){
				$insert_query = 'insert into prof_course(
					professor_id,
					course_id)
					values
					(
					"' . $this->SanitizeForSQL($formvars['professor_id']) . '",
					"' .$course_id. '"
					)';      

				if(!mysql_query( $insert_query ,$this->connection))
				{
					$this->HandleDBError("Error inserting data to the table\nquery:$insert_query");                
					return false;
				}

				$insert_query2 = 'insert into course_university(course_id, u_id) values('.$course_id.', '.$formvars['ulist_val'].')';
				
				if(!mysql_query( $insert_query2 ,$this->connection))
				{
					$this->HandleDBError("Error inserting data to the table\nquery:$insert_query2");                
					return false;
				}
				
			}
			
        }
        return true;
    }
  /*End Add New Course*/
	function ValidateThreeTopics()
	{
		//This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
		$validator = new FormValidator();
        $validator->addValidation("textinput1","req","Please fill in topic 1");
		$validator->addValidation("textinput2","req","Please fill in topic 2");
		$validator->addValidation("textinput3","req","Please fill in topic 3");
		$noerror='';

        if(!$validator->ValidateForm())
        {
            $error='';
			
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."<br>";
            }

			return $error;
        }        
        return $noerror;
	}
   function AddTopic($course_id)
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        $formvars = array();
        /*if(isset($_GET['course_id'])) {
        $formvars['course_id'] =$_GET['course_id'];
        }*/
        
        $formvars['course_id'] = $course_id;
        $formvars['week_no'] = $this->Sanitize($_POST['week']);
        $formvars['topic1'] = $this->Sanitize($_POST['textinput1']);
        $formvars['topic2'] = $this->Sanitize($_POST['textinput2']);
        $formvars['topic3'] = $this->Sanitize($_POST['textinput3']);
        $formvars['chapters'] = $_POST['chapters'];
		$formvars['present_time'] = $_POST['time'];
       
        // if(isset($_POST['content-type']))
        // { 
            // if($_POST['content-type'] == "for-against")
            // {
                // $formvars['presentation'] = 1;
            // }else if($_POST['content-type'] == "content-specific"){
                // $formvars['presentation'] = 0;
            // }
        // }
		if(isset($_POST['topic-type']))
        { 
            if($_POST['topic-type'] == "show")
            {
                $formvars['topic'] = 0;
            }else if($_POST['topic-type'] == "hide"){
                $formvars['topic'] = 1;
            }
        }
		
        
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		header('HTTP/1.1 303 See Other');
        if(!$this->AddTopicToDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");            
            return false;
        }
        header('Location: ./topics.php?course_id='.$course_id);
        return true;
    }
    
    
    function AddTopicToDB(&$formvars)
    {

        //Presentation type is set as Content Specific
        $insert_query = 'insert into course_topics_week(
                course_id,
                week_no,
				present_time,
                topic_name1, 
                topic_name2, 
                topic_name3,
                presentation_type,
				topic_type)
				values
                (
                "' . $this->SanitizeForSQL($formvars['course_id']) . '",
                "' . $this->SanitizeForSQL($formvars['week_no']) . '", 
				"' . $this->SanitizeForSQL($formvars['present_time']) . '",
                "' . $this->SanitizeForSQL($formvars['topic1']) . '",
                "' . $this->SanitizeForSQL($formvars['topic2']) . '",
                "' . $this->SanitizeForSQL($formvars['topic3']) . '",
               0,
				"' . $this->SanitizeForSQL($formvars['topic']) . '"
                )';      

            
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            echo $insert_query;
            return false;
        }
		
        foreach ($formvars['chapters'] as $chapter_id){
            $insert_query = 'insert into course_chapter(
                course_id,
                week_no,
                chapter_id)
				values
                (
                "' . $this->SanitizeForSQL($formvars['course_id']) . '",
                "' . $this->SanitizeForSQL($formvars['week_no']) . '",
                "' . $this->SanitizeForSQL($chapter_id) . '"
                )';      
            if(!mysql_query( $insert_query ,$this->connection))
            {
                $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
                echo $insert_query;
                return false;
            }
        }
		
        return true;
    }

    function GetCourses($prof_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select course_id,course_name from course where course_id IN (select course_id from prof_course where professor_id = $prof_id)";      
        $res = mysql_query( $select_query ,$this->connection);
        
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row;
        }
        
        return $all;
    }

    function GetStudentProfile($stud_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from student where student_id = $stud_id";      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
    }
/*editted by Nilofer*/
    function GetStudentUniversity($stud_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from university WHERE u_id IN (select u_id from student where student_id = $stud_id)";      
            
        $res = mysql_query( $select_query ,$this->connection);
		if(mysql_num_rows($res)== 0)
		{
			return false;
		}
		else
		{
			$all = array();
			while(($row = mysql_fetch_assoc($res))) {
				$all=$row;
				}

			return $all;
		}
    }
/*edit end by Nilofer*/
    function GetStudentCourses($stud_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select course_id,course_name from course where course_id IN (select course_id from student_course where student_id=$stud_id AND approval_status=1 AND payment_flag=1)";      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        $column_name="course_name";
        while(($row = mysql_fetch_assoc($res))) {
            $all[] = $row;
        }
        
        return $all;
    }

     function GetInstitute()
    {

        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = 'select u_name,u_id from university';      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        $column_name="u_name";
        while(($row = mysql_fetch_assoc($res))) {
            $all[] = $row;
        }
        
        return $all;
    }
	function GetUniqueCoursesGivenInstitute($uni_id, $stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT course.course_id, course.course_no, course.course_name FROM course
						INNER JOIN course_university
						ON course.course_id = course_university.course_id
						WHERE course_university.u_id=".$uni_id." and course.course_id NOT IN 
						(SELECT course_id from student_course where student_id=".$stud_id." and approval_status != 2)";
		$res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[] = $row;
        }
        
        return $all;
	}
    function GetProfessorProfile($prof_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from professor where professor_id = $prof_id";      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
    }

    function GetProfessorInstitue($prof_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from university where u_id IN (select u_id from professor where professor_id = ".$prof_id.")";      
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
    }
    function GetUidInstitute($u_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from university where u_id=".$u_id;     
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
	}
     function GetProfessorStudents($course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
          
        $select_query = "select student.student_id, student.s_fname, student.s_lname, student_course.approval_status, student_course.audio_only from student, student_course where student.student_id = student_course.student_id and student_course.course_id= ".$course_id." and student.student_id IN (select student_id from student_course where course_id = ".$course_id." and approval_status != 2)";
		$res = mysql_query($select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row;
        }
        
        return $all;
    }

    function GetStudentsForApproval($course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }    
        $select_query = "select student.student_id,student.s_fname, student.s_lname, student.email_id, student.student_institute_id, student_course.approval_status, university.u_name from student, student_course,university where student.student_id = student_course.student_id and student_course.university_id = university.u_id and student_course.course_id=".$course_id." and student.student_id IN (select student_id from student_course where course_id = ".$course_id.") and student_course.approval_status =0";
		//echo $select_query;
		$res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row;
        }
        
        return $all;
    }
    /*Changes ends here*/    
  
  function UpdateProfessorProfile($prof_id)
    {
		
		$universityinfo = array();
        $formvars['phoneno'] = $this->Sanitize($_POST['phno']);
		$formvars['ulist_val'] = $this->Sanitize($_POST['u_list']);
        $universityinfo['u_name'] = $this->Sanitize($_POST['iname']);
		$universityinfo['u_street'] = $this->Sanitize($_POST['address']);
		$universityinfo['u_city'] = $this->Sanitize($_POST['city']);
		$universityinfo['u_province'] = $this->Sanitize($_POST['provincestate']);
		$universityinfo['u_postalcode'] = $this->Sanitize($_POST['postalzip']);
		$universityinfo['u_country'] = $this->Sanitize($_POST['country']);
		
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        header('HTTP/1.1 303 See Other');
        $update_professor_query = 'UPDATE professor SET phone_no='. mysql_real_escape_string($formvars['phoneno'], $this->connection).' WHERE professor_id='.$prof_id;
		$res = mysql_query( $update_professor_query ,$this->connection);
		
		if($formvars['ulist_val']!="other")
		{
			$update_professor = 'UPDATE professor 
								  SET u_id = '.$formvars['ulist_val'].'
								  WHERE professor_id='.$prof_id;
			$result = mysql_query( $update_professor ,$this->connection);
		}
		else
		{
			$uerror = $this->ValidateUniversityForm($universityinfo);
			if($uerror=='')
			{
				if(!$this->AddUniversityToDB($universityinfo))
				{
					$this->HandleError("Inserting to Database failed!");
					echo "<script type='text/javascript'>alert('Failed!');</script>";
					return false;
				}
			
				$update_professor = 'UPDATE professor 
								  SET u_id = (SELECT u_id
													   FROM university
													   WHERE u_name="'.$universityinfo['u_name'].'")
								  WHERE professor_id='.$prof_id;
				$resultq = mysql_query( $update_professor ,$this->connection);
			}
			else
			{
				$uinfostr = "&u_name=".$universityinfo['u_name']."&u_street=".$universityinfo['u_street']."&u_city=".$universityinfo['u_city']."&u_provincestate=".$universityinfo['u_province']."&u_postalzip=".$universityinfo['u_postalcode']."&u_country=".$universityinfo['u_country'];
				header('Location: ./editprofile.php?ulist_val='.$formvars['ulist_val'].'&errormsg='.$uerror.$uinfostr);
				return false;
			}
		}
        header('Location: ./profile.php');
        return true;
    }          
/*Changed by Nilofer*/
  function UpdateStudentProfile($stud_id)
    {
        $universityinfo = array();
        $formvars['phoneno'] = $this->Sanitize($_POST['phno']);
        $formvars['student_institute_id'] = $this->Sanitize($_POST['studentid']);
		$formvars['ulist_val'] = $this->Sanitize($_POST['u_list']);
        $universityinfo['u_name'] = $this->Sanitize($_POST['iname']);
		$universityinfo['u_street'] = $this->Sanitize($_POST['address']);
		$universityinfo['u_city'] = $this->Sanitize($_POST['city']);
		$universityinfo['u_province'] = $this->Sanitize($_POST['provincestate']);
		$universityinfo['u_postalcode'] = $this->Sanitize($_POST['postalzip']);
		$universityinfo['u_country'] = $this->Sanitize($_POST['country']);
		
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        header('HTTP/1.1 303 See Other');
        $update_student_query = 'UPDATE student SET student_institute_id="'.$formvars['student_institute_id'].'", phone_no='. mysql_real_escape_string($formvars['phoneno'], $this->connection).' WHERE student_id='.$stud_id;
		$res = mysql_query( $update_student_query ,$this->connection);
		
		if($formvars['ulist_val']!="other")
		{
			$update_student = 'UPDATE student 
								  SET u_id = '.$formvars['ulist_val'].'
								  WHERE student_id='.$stud_id;
			$result = mysql_query( $update_student ,$this->connection);
		}
		else
		{
			$uerror = $this->ValidateUniversityForm($universityinfo);
			if($uerror=='')
			{
				if(!$this->AddUniversityToDB($universityinfo))
				{
				$this->HandleError("Inserting to Database failed!");
				echo "<script type='text/javascript'>alert('Failed!');</script>";
				return false;
				}
				$update_student = 'UPDATE student_course 
									  SET u_id = (SELECT u_id
														   FROM university
														   WHERE u_name="'.$universityinfo['u_name'].'")
									  WHERE student_id='.$stud_id;
				$resultq = mysql_query( $update_student ,$this->connection);
			}
			else
			{
				$uinfostr = "&u_name=".$universityinfo['u_name']."&u_street=".$universityinfo['u_street']."&u_city=".$universityinfo['u_city']."&u_provincestate=".$universityinfo['u_province']."&u_postalzip=".$universityinfo['u_postalcode']."&u_country=".$universityinfo['u_country'];
				header('Location: ./editprofile.php?ulist_val='.$formvars['ulist_val'].'&errormsg='.$uerror.$uinfostr);
				return false;
			}
		}
        header('Location: ./profile.php');
        return true;
    }
	function EnrollStudent($stud_id)
	{
		$formvars['u_id'] = $this->Sanitize($_POST['u_list']);
        $formvars['course_id'] = $this->Sanitize($_POST['course_list']);
        $formvars['p_code'] = $this->Sanitize($_POST['pcode']);
		$pending_flag = 0;
		$payment_pending = 1;
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		header('HTTP/1.1 303 See Other');
		if($formvars['course_id']!="select")
		{
			$verify_query = "SELECT product_code FROM course WHERE course_id=".$formvars['course_id'];
		
			$res = mysql_query( $verify_query ,$this->connection);
			$row = mysql_fetch_assoc($res);
			if($formvars['p_code']!=$row["product_code"])
			{
				header('Location: ./enroll.php?error=001');
			}
			else
			{
				$insert_query = "INSERT INTO student_course (student_id, course_id, university_id, approval_status, payment_flag) VALUES (".$stud_id.",".$formvars['course_id'].",".$formvars['u_id'].",".$pending_flag.", ".$payment_pending." )";
				if(!mysql_query( $insert_query ,$this->connection))
				{
					$this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
					echo "Some issue occurred! Please try again.";
					return false;
				}
				header('Location: ./courses.php?msg=1');
			}
		}
		else
			return false;
		
		return true;
	}
	function ValidatePeerEvaluationForm($self)
	{
		//This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
		$validator = new FormValidator();
        if($self==0||$self==2)
		{
			$validator->addValidation("questionbox","maxlen=90","Max 75 characters permitted");
			$validator->addValidation("questionbox","req","Please submit your question");
			$validator->addValidation("marks","req","Please submit your marks");
			$validator->addValidation("marks","lt=11","Marks must be in the range of 0 - 10");
			$validator->addValidation("commentbox","req","Please enter a comment");
			$validator->addValidation("commentbox","maxlen=550","Max 500 characters permitted");
		}
		else
		{
			$validator->addValidation("commentbox","req","Please enter a comment");
			$validator->addValidation("commentbox","maxlen=550","Max 500 characters permitted");
		}
		
		$noerror='';
        if(!$validator->ValidateForm())
        {
            $error='';
			
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."<br>";
            }
			return $error;
        }        
        return $noerror;
	}
    function InsertPeerEvaluation($self,$stud_evaluated_id, $stud_id, $week_no, $crs_id, $role)
	{
        //stud_evaluated_id - the one being evaluated
        //stud_id - the one evaluating
		$formvars = array();
		$formvars['url']= $this->Sanitize($_POST['addUrl']);
		$formvars['comment'] = htmlentities($this->SanitizeForSQL($_POST['commentbox']));
        if($role==0)
		{
			if($self==0)
			{
				$formvars['question'] = htmlentities($this->SanitizeForSQL($_POST['questionbox']));
				$formvars['marks'] = $this->Sanitize($_POST['marks']);
				
			}
			else if($self==1)
			{
				$formvars['question'] = '';
				$formvars['marks'] = 0;
			}
		}
		else
		{
			$formvars['question'] = htmlentities($this->SanitizeForSQL($_POST['questionbox']));
			$formvars['marks'] = $this->Sanitize($_POST['marks']);
		}
		header('HTTP/1.1 303 See Other');
		
		/*if($error!='')
		{
			header('Location: ./evaluate.php?self='.$self.'&student_evaluated_id='.$stud_evaluated_id.'&course_id='.$crs_id.'&week_no='.$week_no.'&error='.$error.'&question='.$formvars['question'].'&comment='.$formvars['comment'].'&marks='.$formvars['marks']);
			return false;
		}*/
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		
		$insert_query = "INSERT INTO peer_evaluation VALUES (".$crs_id.", ".$stud_evaluated_id.",".$week_no.",".$role.",".$formvars['marks'].",
						'".$formvars['question']."','".$formvars['comment']."',".$stud_id.")";
		echo $insert_query;
		if(!mysql_query( $insert_query ,$this->connection))
			{
                $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
                echo "Some issue occurred! Please try again.";
                return false;
            }
            else{ 
				//Update students presentation marks

                $update_evaluated_query ="UPDATE student_evaluation set avg_ppt_marks = (select AVG(Case When evaluated_role_by=0 and student_id!=evaluated_by_id then presentation_marks When evaluated_role_by=1 then presentation_marks else NULL END)/10 as average from peer_evaluation where course_id = $crs_id and student_id = $stud_evaluated_id and week_no = $week_no) where course_id = $crs_id and student_id = $stud_evaluated_id and week_no = $week_no";
                $res = mysql_query( $update_evaluated_query ,$this->connection);
				if($role==1)
				{
					header('Location: ../professor/evaluation.php?course_id='.$crs_id.'&student_id='.$stud_evaluated_id);
					return true;
				}
				//Update the student who is evaluating the above student (DO NOT DO THIS FOR PROF)
				else if($role==0)
				{
					
					$select_que_query = "select count(question) from peer_evaluation where course_id = $crs_id and evaluated_by_id = $stud_id and week_no = $week_no and evaluated_role_by=0 and student_id!=evaluated_by_id and question != ''";
					$res = mysql_query( $select_que_query ,$this->connection);
					while(($row = mysql_fetch_assoc($res))) {
						$question=$row["count(question)"];                                        
					}
					
					$select_ppt_query = "select count(presentation_marks) from peer_evaluation where course_id = $crs_id and evaluated_by_id = $stud_id and week_no = $week_no and evaluated_role_by=0 and student_id!=evaluated_by_id";
					$res = mysql_query( $select_ppt_query ,$this->connection);
					while(($row = mysql_fetch_assoc($res))) {
						$presentation_count=$row["count(presentation_marks)"];                    
					}

					$select_group_count = "select count(ppt_submission_flag) from student_groups where course_id = $crs_id and week_no = $week_no and ppt_submission_flag =1 and student_id!=$stud_id and group_id = (select group_id from student_groups where course_id = $crs_id and student_id = $stud_id and week_no = $week_no)";
					$res = mysql_query( $select_group_count ,$this->connection);
					while(($row = mysql_fetch_assoc($res))) {
						$group_count=$row["count(ppt_submission_flag)"];
					}

					if($group_count != 0)
					{
						$question_marks = $question/$group_count;
						$evaluation_marks = ($presentation_count/$group_count);
						$update_stud_query ="UPDATE student_evaluation set question_marks = $question_marks, evaluation_marks= $evaluation_marks where course_id = $crs_id and student_id = $stud_id and week_no = $week_no";
						$res = mysql_query( $update_stud_query ,$this->connection);
					}
				}
                
            }
		header('Location: ./dashboard.php?course_id='.$crs_id);
		return true;
	}
	//Gets presentation duration set by prof
	function GetTime($week_no, $crs_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT present_time from course_topics_week where course_id=".$crs_id." AND week_no=".$week_no;      
		$res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["present_time"];
        }
        
        return $all;
	}
	//Gets topics posted by prof
    function GetTopics($week_no, $crs_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT topic_name1, topic_name2, topic_name3 from course_topics_week where course_id=".$crs_id." AND week_no=".$week_no;      
		$res = mysql_query($select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
	}
	function GetGroupIds($week_no, $crs_id, $stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "Select student_id, s_fname, s_lname FROM student WHERE student_id IN (SELECT student_id FROM student_groups WHERE week_no=".$week_no." and course_id=".$crs_id." and group_id = (select group_id from student_groups where week_no =".$week_no." and course_id =".$crs_id." and student_id =".$stud_id."))";      
		$res = mysql_query($select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row;
        }
        
        return $all;
	}
	function GetPresentedStudentIds($week_no, $crs_id, $stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT ppt_submission_flag FROM student_groups WHERE week_no=".$week_no." and student_id=".$stud_id." and course_id=".$crs_id;      
		$res = mysql_query($select_query ,$this->connection);

        while(($row = mysql_fetch_assoc($res))) {
            $all=$row['ppt_submission_flag'];
        }
        
        return $all;
	}
	function GetPeerEvaluationStatus($week_no, $crs_id, $stud_id, $stud_evaluated_by_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT count(student_id) FROM peer_evaluation WHERE week_no=".$week_no." and student_id=".$stud_id." and course_id=".$crs_id." and evaluated_by_id=".$stud_evaluated_by_id;      
		$res = mysql_query($select_query ,$this->connection);

        while(($row = mysql_fetch_assoc($res))) {
            $all=$row['count(student_id)'];
        }
        
        return $all;
	}
	function GetMaxWeek($course_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT MAX(week_no) FROM course_topics_week WHERE course_id = '$course_id'";  
        $week = mysql_query( $select_query ,$this->connection);
        $week_n = mysql_result($week, 0);
		return $week_n;
	}
	function GetQuestionCount($crs_id, $week_no, $stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_que_query = "select count(question) from peer_evaluation where course_id = $crs_id and week_no = $week_no and student_id = $stud_id and question != ''";
		$res = mysql_query( $select_que_query ,$this->connection);
		while(($row = mysql_fetch_assoc($res))) {
			$question=$row["count(question)"];                                        
		}
		return $question;
	}
	function ApproveAudio($student_ids, $course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }

        
        $update_query = "UPDATE student_course SET audio_only= 1 WHERE course_id=$course_id and student_id IN ($student_ids)";
        
        $res = mysql_query( $update_query ,$this->connection);
        return true;
    }
    
    function RejectAudio($student_ids, $course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $update_query = "UPDATE student_course SET audio_only= 0 WHERE course_id=$course_id and student_id IN ($student_ids)";
        $res = mysql_query( $update_query ,$this->connection);
        return true;
    }
    /*Change ends by Nilofer*/
    function ApproveStudents($student_ids, $course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }

        
        $update_query = "UPDATE student_course SET approval_status= 1 WHERE course_id=$course_id and student_id IN ($student_ids)";
        
        $res = mysql_query( $update_query ,$this->connection);
        return true;
    }
    
    function RejectStudents($student_ids, $course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $update_query = "UPDATE student_course SET approval_status= 2 WHERE course_id=$course_id and student_id IN ($student_ids)";
        $res = mysql_query( $update_query ,$this->connection);
        return true;
    }
    
    
    function GetCourseInfo($course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from course where course_id=$course_id";      
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
    }    
    
    function GetNoOfStudents($course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select count(student_id) from student_course where course_id=$course_id and approval_status=1";      
        
        $res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["count(student_id)"];
        }
        
        return $all;
    }
    
     function GetStudentEval($student_id,$course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from student_evaluation where student_id = $student_id and course_id = $course_id";      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row;
        }
        
        return $all;        
    }   
function GetStudentName($student_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select s_fname,s_lname from student where student_id = $student_id";      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all = $row;
        }
        
        return $all;
        
    }
    
    function GetCourseWeight($course_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_course_weight = "select presentation_weight,question_weight,evaluation_weight,video_response_weight,grammar_weight from course where course_id = $course_id";
        
        $res = mysql_query( $select_course_weight ,$this->connection);
        while(($row = mysql_fetch_assoc($res))) {
			$all=$row;	    
		}
        return $all;        
    }   
    function GetProfId($user_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select professor_id from professor where username = '$user_id'";      
        $res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["professor_id"];
        }
        
        return $all;
    } 
	function GetStudId($user_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select student_id from student where username = '$user_id'";      
        $res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["student_id"];
        }
        
        return $all;
    }    	
	
	function GetWeek($week_no)
	{
		$all=$week_no;
        
        return $all;
	}
	function GetPresentFlag($course_id,$week_no,$stud_id)
	{
		if(!$this->DBLogin())
		{
			$this->HandleError("Database login failed!");
			return false;
		}
		$select_query = "SELECT ppt_submission_flag FROM student_groups WHERE student_id = '$stud_id' and week_no = '$week_no'and course_id='$course_id'";
		
		$res = mysql_query($select_query, $this->connection);
            $row = mysql_fetch_array($res);
			return $row['ppt_submission_flag'];
	}
	function GetResponseFlag($course_id,$week_no,$stud_id)
	{
	if(!$this->DBLogin())
		{
			$this->HandleError("Database login failed!");
			return false;
		}
		
		$select_query = "SELECT video_response_flag FROM student_groups WHERE course_id='$course_id' and week_no='$week_no' and student_id='$stud_id'";
		
		
		$res = mysql_query($select_query, $this->connection);
            $row = mysql_fetch_array($res);
			return $row['video_response_flag'];
	}
	//update ppt_flag on database
	function UpdateSubmission($course_id,$week_no,$stud_id,$file)
	{
		if(!$this->DBLogin())
		{
			$this->HandleError("Database login failed!");
			return false;
		}
		
		$select_query = "UPDATE student_groups SET ppt_submission_flag=1 , presentation_filename='$file' WHERE course_id='$course_id' and week_no = '$week_no'and student_id = '$stud_id'";
		
		$res = mysql_query($select_query, $this->connection);
		return true;
	
	}
	//update response_flag on database
	function UpdateRespSubmit($course_id,$week_no,$stud_id,$file)
	{
		if(!$this->DBLogin())
		{
			$this->HandleError("Database login failed!");
			return false;
		}
		
		$select_query = "UPDATE student_groups SET video_response_flag=1 , video_response_filename='$file' WHERE course_id='$course_id' and week_no = '$week_no'and student_id = '$stud_id'";
		
		$res = mysql_query($select_query, $this->connection);
		return true;
	
	}
	function GetQuestionWeek($course_id,$week_no,$stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        

        $select_query = "select question from peer_evaluation where student_id = '$stud_id' and course_id='$course_id' and week_no='$week_no' and question!=''";  

         $all = Array();		
        $res = mysql_query( $select_query ,$this->connection);
        
        while($row = mysql_fetch_assoc($res)) {
            $all[]=$row["question"];
        }
        
        return $all;
		
	}
	function GetEvalVid($course_id,$week_no,$stud_evaluated_id)
	{
	    if(!$this->DBLogin())
		{
			$this->HandleError("Database login failed!");
			return false;
		}
		
		$select_query = "SELECT presentation_filename FROM student_groups WHERE course_id='$course_id' and week_no='$week_no' and student_id='$stud_evaluated_id'";
		
		
		$res = mysql_query($select_query, $this->connection);
            $row = mysql_fetch_array($res);
			return $row['presentation_filename'];
	
	}
	function GetEvalResponseVid($course_id,$week_no,$stud_evaluated_id)
	{
	    if(!$this->DBLogin())
		{
			$this->HandleError("Database login failed!");
			return false;
		}
		
		$select_query = "SELECT video_response_filename FROM student_groups WHERE course_id='$course_id' and week_no='$week_no' and student_id='$stud_evaluated_id'";
		
		
		$res = mysql_query($select_query, $this->connection);
            $row = mysql_fetch_array($res);
			return $row['video_response_filename'];
	
	}
	/*Changes by Nilofer Begin Here*/
	function GetTopicWeek($crs_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from course_topics_week where course_id = $crs_id";      
 
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
    }
	function GetAvailableCoursesCount($stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT count(course_id) FROM student_course WHERE approval_status=1 and payment_flag=0 and student_id = $stud_id";
		
		$res = mysql_query( $select_query ,$this->connection);
        while(($row = mysql_fetch_assoc($res))) {
			$all=$row["count(course_id)"];
        }
        
        return $all;
	}
	function GetEligiblePaymentCourses($stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT course_id,course_no,course_name from course where course_id 
						 IN(Select course_id FROM student_course 
						 WHERE approval_status=1 and payment_flag=0 and student_id=".$stud_id.")";
		$res = mysql_query( $select_query ,$this->connection);
        while(($row = mysql_fetch_assoc($res))) {
			$all[]=$row;
        }
        
        return $all;
	}
	function GetTopicDetailsForWeek($course_id,$week_no)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT topic_name1, topic_name2, topic_name3,present_time, presentation_type, topic_type from course_topics_week where course_id ='$course_id' and week_no = '$week_no'";      
		$all = array();
        $res = mysql_query( $select_query ,$this->connection);
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        return $all;

    }

     function GetChapters($course_id,$week_no)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }

        $select_query = "SELECT chapter_id from course_chapter where course_id ='$course_id' and week_no = '$week_no'";      
        
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row["chapter_id"];
        }
        return $all;
    }    

	function AddUniversity()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

        $formvars = array();
        $formvars['u_name'] = $this->Sanitize($_POST['iname']);
        $formvars['u_street'] = $this->Sanitize($_POST['address']);
        $formvars['u_city'] = $this->Sanitize($_POST['city']);
        $formvars['u_province'] = $this->Sanitize($_POST['provincestate']);
        $formvars['u_postalcode'] = $this->Sanitize($_POST['postalzip']);
        $formvars['u_country'] = $this->Sanitize($_POST['country']);
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		/*$select_query = 'SELECT count(u_name) FROM university WHERE u_name='. $formvars['u_name'];
		$res = mysql_query( $select_query ,$this->connection);
		while(($row = mysql_fetch_assoc($res))) {
			$u_count=$row["count(u_name)"];                                        
		}*/
		
        if(!$this->AddUniversityToDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        
        return true;
    }
	function AddUniversityToDB(&$formvars)
	{
		 $insert_query = 'insert into university(
                u_name,
                u_street,
                u_city, 
                u_province, 
                u_postalcode, 
                u_country)
				values
                (
                "' . $this->SanitizeForSQL($formvars['u_name']) . '",
                "' . $this->SanitizeForSQL($formvars['u_street']) . '",
                "' . $this->SanitizeForSQL($formvars['u_city']) . '",
                "' . $this->SanitizeForSQL($formvars['u_province']) . '",
                "' . $this->SanitizeForSQL($formvars['u_postalcode']) . '",
                "' . $this->SanitizeForSQL($formvars['u_country']) . '"
                )';      
            
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }
        return true;
	}
	function GetCourseInstitue($crs_id)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from university where u_id IN (select u_id from course_university where course_id = ".$crs_id.")";      
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
    }
	function GetCourseProfessor($crs_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select first_name,last_name from professor where professor_id IN (select professor_id from prof_course where course_id = ".$crs_id.")";      
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
	}
	
	/*Changes by Nilofer end Here*/
	function GetGrammarQuestion($question_no)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select * from grammar_question where q_id =".$question_no;      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        
        return $all;
	}
	function GrammarValidateAnswer($stud_id,$crs_id, $week_no, $q_id, $q_curr, $answervalue)
	{
		$formvars = array();
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		
		$q_next = $q_curr + 1;
		$formvars['inputanswer'] = $this->Sanitize($_POST['inputanswer']);
		$_SESSION['answer'][$q_curr][$crs_id] = $formvars['inputanswer'];
		if(isset($_SESSION['score'][$week_no][$crs_id]))
			$_SESSION['score'][$week_no][$crs_id] = $_SESSION['score'][$week_no][$crs_id] + $answervalue;
		else
			$_SESSION['score'][$week_no][$crs_id] = $answervalue;
		if($answervalue==0)//incorrect answer
		{
			$_SESSION['answervalue'][$q_curr][$crs_id] = 0;
		}
		else//correct answer
			$_SESSION['answervalue'][$q_curr][$crs_id] = 10;
		
        $update_query = "UPDATE student_evaluation SET grammar_marks=".(($_SESSION['score'][$week_no][$crs_id])/100)." WHERE student_id=".$stud_id." and course_id=".$crs_id." and week_no=".$week_no;
        $res = mysql_query( $update_query ,$this->connection);
		header('Location: ./grammar.php?course_id='.$crs_id.'&week_no='.$week_no.'&q_curr='.$q_next);
		return true;
		
	}
	function GetVideoResponseFlag($stud_id,$crs_id, $week_no)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT video_response_flag FROM student_groups WHERE week_no=".$week_no." and student_id=".$stud_id." and course_id=".$crs_id;      
		$res = mysql_query($select_query ,$this->connection);

        while(($row = mysql_fetch_assoc($res))) {
            $all=$row['video_response_flag'];
        }
        
        return $all;
	}
	function GetDeadlines($crs_id,$stud_id,$week_no)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "select eval_deadline,ppt_deadline,vidresp_deadline,grammar_deadline from student_groups where course_id=$crs_id and student_id=$stud_id and week_no=$week_no";
        //echo $select_query;
		$res = mysql_query( $select_query ,$this->connection);
        
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row;
        }
        return $all;
    }
	function GetMaxWeekForGrammar($course_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT MAX(week_no) FROM student_groups WHERE course_id = '$course_id'";  
        $week = mysql_query( $select_query ,$this->connection);
        $week_n = mysql_result($week, 0);
		return $week_n;
	}
	function GetCourseType($crs_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT grp_change_freq FROM course WHERE course_id = '$crs_id'";  
        $grp = mysql_query( $select_query ,$this->connection);
        $grpchange = mysql_result($grp, 0);
		return $grpchange;
	}
	function GetGrammarStatus($stud_id,$crs_id, $week_no)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "SELECT grammar_marks FROM student_evaluation WHERE course_id = $crs_id and student_id=$stud_id and week_no=$week_no";  
        
		$res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["grammar_marks"];
        }
        
		return $all;
	}
	function GetPeerEvaluations($stud_id,$crs_id,$week_no)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = "select * from peer_evaluation where student_id = $stud_id and course_id=$crs_id and week_no=$week_no";      
            
        $res = mysql_query( $select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all[]=$row;
        }
        
        return $all;
	}
	function UpdateQuestionAnswered($course_id,$week_no,$stud_id,$question)
	{
	
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$update_question = 'UPDATE student_groups 
								  SET question_for_vidresp = "'.$question.'"
								  WHERE course_id='.$course_id.' and week_no='.$week_no.' and student_id='.$stud_id;

		if(!mysql_query( $update_question ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$update_question");
            return false;
        }
		return true;
	}
	function GetVideoResponseQuestion($course_id,$week_no,$stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = 'SELECT question_for_vidresp FROM student_groups WHERE course_id='.$course_id.' and week_no='.$week_no.' and student_id='.$stud_id;
        
		$res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["question_for_vidresp"];
        }
        
		return $all;
	}
	function UpdateTopicSelected($course_id,$week_no,$stud_id,$topic)
	{
	
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$update_topic_choosen = 'UPDATE student_groups 
								  SET topic_answered = "'.$topic.'"
								  WHERE course_id='.$course_id.' and week_no='.$week_no.' and student_id='.$stud_id;

		if(!mysql_query( $update_topic_choosen ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$update_topic_choosen");
            return false;
        }
		return true;
	}
	function GetTopicSelected($course_id,$week_no,$stud_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
		$select_query = 'SELECT topic_answered FROM student_groups WHERE course_id='.$course_id.' and week_no='.$week_no.' and student_id='.$stud_id;
        
		$res = mysql_query( $select_query ,$this->connection);
        
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["topic_answered"];
        }
        
		return $all;
	}
	function GetHideShowTopics($week_no, $crs_id)
	{
		if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        $select_query = "SELECT topic_type from course_topics_week where course_id=".$crs_id." AND week_no=".$week_no;      
		$res = mysql_query($select_query ,$this->connection);
        $all = array();
        while(($row = mysql_fetch_assoc($res))) {
            $all=$row["topic_type"];
        }
        
        return $all;
	}
}
?>
