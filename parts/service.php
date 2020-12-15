<?php
define("URL","http://writerventure.com/");
define("limit",10);
define("limit_msg",5);
require_once __DIR__.'/../PHPMailer/class.phpmailer.php';
class writer extends PHPMailer
{
	private $database_name = 'serenewriters';
	private $database_username = 'serenewriters';
	private $servername = "localhost";
	public $conn = null;

	public $user = null;

	public $user_type = null;

	public $textlocal = null;

	public $email = "support@writerventure.com";

	public $do_mail = null;

	public function __construct()
	{
	   
		$this->do_mail = new PHPMailer;
		if (!function_exists('mail_temp')) {
			include ('mail_temp.php');
        }

		

		date_default_timezone_set('Asia/Kolkata');
		$this->conn = mysqli_connect($this->servername, $this->database_username, 'pwd', $this->database_name);
        
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
        

        
		foreach($_REQUEST as $key => $val) {
			$_REQUEST[$key] = mysqli_real_escape_string($this->conn, dataready($val));
		}
        
       $this->user = $this->checkLogin();
        
        	if ($this->do_mail != null) {
			$this->do_mail->IsSMTP();
			$this->do_mail->Host = 'smtp.zoho.in';
			// Enable this option to see deep debug info
		//	$this->do_mail->SMTPDebug = 4;
			$this->do_mail->SMTPSecure = 'tls';
			$this->do_mail->Port = '587';
			$this->do_mail->SMTPAuth = true;
			$this->do_mail->Username = 'support@network-venture.com';
			$this->do_mail->Password = 'jq8xbK8KHQei';
			$this->do_mail->From = "support@network-venture.com";
			$this->do_mail->FromName = "Serene Writers";
            
		}
	}

	public function __destruct() {
		$this->conn->close();
	}
    
    
    //Basic Login Functions ###############################
    
        public function checkLogin()
    {
        $cookie_name = 'zara';
        if (!isset($_COOKIE[$cookie_name]))
        {
            return -1;
        }
        
        $cookie_value =  mysqli_escape_string($this->conn,$_COOKIE['zara']);
        $sql = "Select `handle` from `userlogin` where `ran`='$cookie_value'";
        $result = $this->conn->query($sql);
        if ($result->num_rows < 1)
        {
            return -1;
        } else
        {
            $row = $result->fetch_assoc();
            return $row['handle'];
        }
    }
    
        public function authk($username, $password)
    {
        $username_ =  mysqli_escape_string($this->conn,$username);
        $password_ =  md5(mysqli_escape_string($this->conn,$password));
        $sql = "SELECT NULL FROM `userlogin` where (`handle`='$username_' or `email`='$username_') and `password`='$password_'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
        {
            $cookie_name = 'zara';
            $ran = md5(rand(1000, 1344));
            $sql = "Update `userlogin` SET `ran`='$ran' where (`handle`='$username_'  or `email`='$username_') and `password`='$password_'";
            $result = $this->conn->query($sql);
            setcookie($cookie_name, $ran, 0, "/");
            return 1;
        } else
        {
            return null;
        }
    }
    
        //Basic Login Functions END ###############################
     
     //accout creation functions follow 
     public function create_ac($input) {
        
       foreach ($input as $key => $k) {
        $$key = $k;
       }
        
        //checking username n email
        
        $check_1 = $this->get_val('userlogin','Index',"`handle`='$input_uname' or `email`='$input_email'");
        $check_2 = $this->get_val('userdata','Index',"`handle`='$input_uname' or `email`='$input_email'");
        if ($check_1 != -1 or $check_2 != -1 ) {
            return -2;
        }

       //creating username and passowrd
   $rand = md5(rand(1,200));
   $pwd = md5($input_pwd);
   
   $google =  $_POST['g-recaptcha-response'];
   $validate_google = google_validate($google);
   if (!$validate_google) {
       return -3;
   }
   
   
    if(!preg_match('/^[a-z\d_]{5,20}$/i',$input_uname)){ 
        return -4;
    }
   
   if (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
   
       return -2;
   }
   
   $sql = "INSERT INTO `userlogin`(`Index`, `handle`, `type`, `email`, `password`, `ran`) VALUES (Null,'$input_uname','user','$input_email','$pwd','$rand')";
   $sql_exe = $this->conn->query($sql);
   if (!$sql_exe) {
    return -1;
   }
   
   $input_bio = databack(nl2br($input_bio));
   
    //adding info in database.
    $sql = "INSERT INTO `userdata`(`Index`, `handle`, `name`, `gender`, `addr`, `country`, `bio`, `intrested`,`email`,`dp` ,`status`) VALUES (Null,'$input_uname','$input_name','$input_gender','$input_addr','$input_country','$input_bio','$input_intrested','$input_email','user.png','0')";
       $sql_exe = $this->conn->query($sql);
    if (!$sql_exe) {
    $this->conn->rollBack();
    return -1;
   }
   
   $msg2 = $this->mail2("Welcome to Serene Writers",<<<EOD
We welcolcome you to the family of Serene Writers. We are happy to have you and we would love to share ypur writings on our website. Please start publishing now.
Thank you!         
EOD
,$input_email, 'User',"support@writerventure.com","Support");  
    return 1;
   } 
    

    public function get_val($table,$field,$where) {
        $sql = "SELECT `$field` FROM `$table` WHERE $where";
  //      echo $sql;
        $sql_exe = $this->conn->query($sql);
        if ($sql_exe->num_rows < 1) {
            return -1;
        } else {
            $fetch = $sql_exe->fetch_assoc();
            return $fetch[$field];
        }
    }

    //publishing functions
    public function publish($pub,$file) {
        foreach ($pub as $key=>$k) {
            $$key = $k;
        }
        
        $url = preg_replace('/\s+/', '_', $input_title);
        $x = 1;
        while ($x != 0) {
            $is_exist = $this->get_val('write_up','url',"`url`='$url'");
            if ($is_exist != -1) {
                $url = urlencode($url).'_'.$x;
                $x += 1;
            } else {
                $x = 0;
            }  
        }
        $is_exist_2 = $this->get_val('write_up','Index',"`title`='$input_title' and `handle`='$this->user'");
        if ($is_exist_2 != -1) {
            return -1;
        }
        
    $sql = "INSERT INTO `write_up`(`Index`, `handle`, `url`,`type` ,`title`, `body`, `desp`, `image`, `cat`, `date`,`status`) VALUES (Null,'$this->user','$url','$input_type','$input_title','$input_write_up','$input_desp','$file','$input_catagory',NOW(),'0')";
    $sql_exe = $this->conn->query($sql);
   if (!$sql_exe) {
    return -1;
   } else {
    return 1;
   }
    }
    
    public function get_data_pub($where = 1,$offset,$orderBY = null) {
        $lim = limit;
        if ($orderBY != Null) {
        $orderBY  = "ORDER BY $orderBY";
        }
        $sql = "SELECT * from `write_up` where $where $orderBY LIMIT $lim OFFSET $offset ";
      // echo $sql;
        $sql_exe  = $this->conn->query($sql);
        if ($sql_exe->num_rows < 1) {
            return -1;
        } else {
            $return = null;
            while($row = $sql_exe->fetch_assoc()) {
                $return[] = $row; 
            }
            return $return;
        }
        
    }
    
    public function save_image($Key,$dir = null) {
        global $_FILES;
        if ($dir == null) {
            $dir = '/../upload/';
        }
        
        
        
        if ($_FILES) {
        $extensions=array('image/jpg','image/jpe','image/jpeg','image/jfif','image/png','image/bmp','image/dib','image/gif');
       $fileformat = $_FILES[$Key]["type"];
            if (!in_array($fileformat, $extensions)) {
              return null;
            }
        }
        
        
        $rand = md5(rand());
        if(strlen($_FILES[$Key]["name"]) != 0){
        $fileN = $rand.$_FILES[$Key]["name"];
        $fileformat = $_FILES[$Key]["type"];
        $target_dir = __DIR__.$dir;
        $target_file = $target_dir . basename($fileN);
        $move =  move_uploaded_file($_FILES[$Key]["tmp_name"], $target_file);
    } else {
        $fileN = null;
        return null;
    }
    
    if ($move) {
    return $fileN;
    } else {
        return null;
    }
    }

    //updating function
    
    public function update($update,$file) {
     
       foreach ($update as $key=>$k) {
            $$key = $k;
        }
        
        if ($this->get_val('write_up','url',"`url`='$input_url'") == -1) {
            return null;
        }
        if ($file) {
            $file = ",`image`='$file'";
        } else {
            $file = null;
        }
        $sql = "UPDATE `write_up` SET `type`='$input_type',`title`='$input_title',`body`='$input_write_up',`desp`='$input_desp',`cat`='$input_catagory',`status`='1' $file WHERE `url`='$input_url' and `handle`='$this->user'";
        $sql_exe = $this->conn->query($sql);
        if ($sql_exe) {
            return 1;
        } else {
            return -1;
        }          
    }
    
    public function del_post($url) {
        $sql = "DELETE FROM `write_up` WHERE `url`='$url' and `handle`='$this->user'";
        $sql_exe = $this->conn->query($sql);
        if ($sql_exe) {
            return 1;
        } else {
            return null;
        }
    }

    //user functions
    
    public function view_user($handle,$data = null) {
        
        if (!$data) {
            $data = "*";
        }
        if ($handle[0] == "$") {
            $handle = explode(",",$handle);
            $handle = $handle[1];
        } else {
            $handle = "`handle`='$handle'";
        }
        $sql = "SELECT $data from `userdata` where $handle";
   
        $sql_exe  = $this->conn->query($sql);
        if ($sql_exe->num_rows < 1) {
            return -1;
        } else {
            $return = null;
            while($row = $sql_exe->fetch_assoc()) {
                $return[] = $row; 
            }
            return $return;
        }
        
    }
    
    public function update_user($update,$file) {
        foreach ($update as $key=>$k) {
            $$key = html_entity_decode($k);
        }
          if ($file) {
            $file = ",`dp`='$file'";
        } else {
            $file = null;
        }
    $sql = "UPDATE `userdata` SET `gender`='$input_gender',`addr`='$input_addr',`country`='$input_country',`bio`='$input_bio',`intrested`='$input_intrested' $file WHERE `handle`='$this->user'";
        $sql_exe = $this->conn->query($sql);

        if ($sql_exe) {
         if (strlen($input_pwd_old) != 0 or strlen($input_pwd_new) != 0) {
            if (strlen($input_pwd_new) < 6) {
                $this->conn->rollback();
                return -1;
            }
            $input_pwd_new = md5($input_pwd_new);
            $input_pwd_old  = md5($input_pwd_old);
            $sql = "UPDATE `userlogin` SET `password`='$input_pwd_new' WHERE `password`='$input_pwd_old' and `handle`='$this->user'";
            $sql_exe = $this->conn->query($sql);
            $id_done = $this->get_val('userlogin','Index',"`password`='$input_pwd_new'");
            if ($id_done == -1) {
                $this->conn->rollback();
                return -2;
            }
         }
         return 1;
        } else {
            return null;
        }
    }
    //messing functionalties
    
    public function send_msg($to,$msg) {
        
        $sql = "INSERT INTO `msgs`(`Index`, `from`, `to`, `date`, `body`, `from_view`, `to_view`, `file`) VALUES (NULL,'$this->user','$to',now(),'$msg','0','0','null')";
         $is_exist = $this->get_val('userdata','handle',"`handle`='$to'");
         if ($is_exist == -1) {
            return null;
         }
        $sql_exe = $this->conn->query($sql);
        if (!$sql_exe) {
             return null;
        } else {
            return 1;
        }
        
    }

    public function get_msg($id,$offset) {
        $lim = limit_msg;
        $orderBY  = "ORDER BY `date` DESC";
        $where  = "(`to`='$id' and `from`='$this->user') or (`from`='$id' and `to`='$this->user')";
        $sql = "SELECT * from `msgs` where $where $orderBY LIMIT $lim OFFSET $offset ";   
        $sql_exe  = $this->conn->query($sql);
        if ($sql_exe->num_rows < 1) {
            return null;
        } else {
            $return = null;
            while($row = $sql_exe->fetch_assoc()) {
                $return[] = $row; 
            }
            return $return;
        }
        
    }
    
    public function msg_list($type,$offset = 0) {
        if ($type=="inbox") {
  $sql = "SELECT  `from` as Al, max(`date`) as `date` from `msgs` where (`to` = '$this->user' and `to_view`='0') GROUP BY `Al` ORDER BY `date` DESC LIMIT 50 OFFSET $offset ;";
   } else if ($type == "outbox") {
    $sql = "SELECT  `to` as Al, max(`date`) as `date` from `msgs` where (`from` = '$this->user' and `from_view`='0') GROUP BY `Al` ORDER BY `date` DESC LIMIT 50 OFFSET $offset;";
   }

    $sql_exe  = $this->conn->query($sql);
        if ($sql_exe->num_rows < 1) {
            return null;
        } else {
            $return = null;
            while($row = $sql_exe->fetch_assoc()) {
            
           $return[] = $row;
                  
            }
            return $return;
        }
        
    }
    
    public function del_msg($del) {
        $sql = "UPDATE `msgs` SET `to_view`='1' WHERE (`to` = '$this->user' and `to_view`='0') and `from`='$del'";
        $sql_exe  = $this->conn->query($sql);
        $sql = "UPDATE `msgs` SET `from_view`='1' WHERE (`from` = '$this->user' and `from_view`='0') and `to`='$del'";
        $sql_exe2  = $this->conn->query($sql);
        if ($sql_exe and $sql_exe2) {
            return 1;
        } else {
            $this->conn->rollback();
            return null;
        }
        
    }
    //mail function 
    	public function mail2($subject, $body, $mail, $name_,$reply,$name)
	{

		$body_ = mail_temp(nl2br($body), $subject);
		$this->do_mail->Subject = $subject;
		$this->do_mail->AltBody = 'This e-mail and any attachments thereto are intended for the sole use of the recipient(s) named above and may contain information that is confidential.';
		$this->do_mail->MsgHTML($body_);
		$this->do_mail->clearAddresses();
		$this->do_mail->AddAddress($mail, $name_);
        $this->addReplyTo($reply, $name);
		if ($this->do_mail->send()) {
			return 1;
		}
		else {

			return null;
		}

		return null;
	}
    
    public function report($Data) {
    foreach ($Data as $key => $k) {
        $$key = $k;
       }
       $is_exist = $this->get_val("write_up","status","`url`='$url'");
       if ($is_exist == -1) {
        return null;
       }
        $handle = $this->get_val("write_up","handle","`url`='$url'");
       $this->notify($handle,"Some one reported your write-up: http://writerventure.com/read/$url. E-mail following!");
       //report EMail CHeck
        $new_val = $is_exist + 1;
       $val = $this->get_val('report','status',"`url`='$url'");
       if ($val == '-2') {
            $new_val = 5;
       }
       
       $is_email = $this->get_val('report','status',"`url`='$url' and `email`='$input_email'");
      if ($is_email != -1) {
     return null;
   }
       
       $sql = "INSERT INTO `report`(`Index`, `url`, `email`, `status`) VALUES (Null,'$url','$input_email','0')";
          $sql_exe =  $this->conn->query($sql);
       if (!$sql_exe) {
        $this->conn->rollback();
        return null;
        }
       
       
       //###########################
       
      
       $sql  = "UPDATE `write_up` SET `status`='$new_val' WHERE `url`='$url'";       
       $sql_exe =  $this->conn->query($sql);
       if ($sql) {
        
       $msg1 = $this->mail2($input_title, $input_report, "abhaywani@gmail.com", "Abrar Ajaz",$input_email,$input_name);
       $msg2 = $this->mail2("We recieved your report",<<<EOD
Thanks for writing to us. We are working on your report. You will be notified soon!
with regards
Team Serene Writers
EOD
,$input_email, $input_name,"mail@volunteerventure.com","Admin");
        
        return 1;
       } else {
        return null;
       }
       
    }
    
    public function view_report($offset) {
        $offset = $offset * 50 - 50;
       $sql = "SELECT * from `report` where 1 ORDER BY `Index` LIMIT 50 OFFSET $offset ";

        $sql_exe  = $this->conn->query($sql);
        if ($sql_exe->num_rows < 1) {
            return -1;
        } else {
            $return = null;
            while($row = $sql_exe->fetch_assoc()) {
                $return[] = $row; 
            }
            return $return;
        } 
    }
    
    public function up_vote($url) {
    $val = $this->get_val('report','status',"`url`='$url'");
       if ($val == -1) {
        return null;
       }
       
     if ($val == -2) {
        return null;
     }  
       
    $sql = "UPDATE `report` SET `status`='-2' WHERE `url`='$url'";
     $sql_exe  = $this->conn->query($sql);
     if (!$sql_exe) {
        $this->conn->rollback();
        return null;
     }
     $sql = "UPDATE `write_up` SET `status`='-100' WHERE `url`='$url'";
     $sql_exe  = $this->conn->query($sql);
     if (!$sql_exe) {
        $this->conn->rollback();
        return null;
     }
     
     $sql = "Select * from `report` where `url`='$url'";
     $sql_exe = $this->conn->query($sql);
     while($row = $sql_exe->fetch_assoc()) {
        foreach($row as $key=>$k) {
            $$key = $k;
        }
        
        $msg2 = $this->mail2("Report Response",<<<EOD
we have reviewed your report against: <a href="http://www.writerventure.com/read/$url">$url</a> and we found nothing which can voilate our community standard.
Thank you!         
EOD
,$email, 'User',"support@writerventure.com","Support");   
        return 1;
     }
     }
     
     
     
    public function down_vote($url) {
        $val = $this->get_val('report','status',"`url`='$url'");
         if ($val == -1) {
        return null;
        }
        
           if ($val == -3) {
        return null;
     }  
        
        $sql = "UPDATE `report` SET `status`='-3' WHERE `url`='$url'";
     $sql_exe  = $this->conn->query($sql);
     if (!$sql_exe) {
        $this->conn->rollback();
        return null;
     }
     $sql = "UPDATE `write_up` SET `status`='100' WHERE `url`='$url'";
     $sql_exe  = $this->conn->query($sql);
     if (!$sql_exe) {
        $this->conn->rollback();
        return null;
     }
     
     
     $sql = "Select * from `report` where `url`='$url'";
     $sql_exe = $this->conn->query($sql);
     while($row = $sql_exe->fetch_assoc()) {
        foreach($row as $key=>$k) {
            $$key = $k;
        }
        
        $msg2 = $this->mail2("Report Response",<<<EOD
we have reviewed your report against: <a href="http://www.writerventure.com/read/$url">$url</a> and we found it voilating our community standard. We have taken it down.
Thank you!         
EOD
,$email, 'User',"support@writerventure.com","Support");   
        return 1;
     }       
    }   
    
    
    //follow functionality
    
    public function follow($handle) {
        $is_exist = $this->get_val('follow','handle',"`follow`='$handle'");
        if ($is_exist != -1) {
            return null;
        }
        
        $sql = "INSERT INTO `follow`(`Index`, `handle`, `follow`, `date`) VALUES (NULL,'$this->user','$handle',now())";
          $sql_exe  = $this->conn->query($sql);
          if (!$sql_exe) {
            $this->conn->rollback();
            return null;
          }
          $this->notify($handle,"Hay <a href=http://www.writerventure.com/author/$this->user><strong>$this->user</strong></a> started to following you" );
        return 1;
    } 
    
    public function unfollow($handle) {
         $is_exist = $this->get_val('follow','handle',"`handle`='$this->user' and `follow`='$handle'");
        if ($is_exist == -1) {
            return null;
        }
        
        $sql = "DELETE FROM `follow` WHERE `handle`='$this->user' and `follow`='$handle'";
        $sql_exe  = $this->conn->query($sql);
         if (!$sql_exe) {
            $this->conn->rollback();
            return null;
          }
        return 1;
    }
    
    public function num_folowers($handle) {
        $sql = "Select null from `follow` where `follow`='$handle'";
        $sql_exe  = $this->conn->query($sql);
         if (!$sql_exe) {
            $this->conn->rollback();
            return 0;
          }
        return $sql_exe->num_rows;
    }
    
    //forget passswoed
     public function forget($uname) {
        $email = $this->get_val('userlogin','email',"(`email`='$uname' or `handle`='$uname')");
        $val  = md5(rand());
        $sql = "INSERT INTO `verify`(`Index`, `email`, `value`, `date`, `status`) VALUES (NULL,'$email','$val',NOW(),0)";
        $sql_exe  = $this->conn->query($sql);
         if (!$sql_exe) {
            $this->conn->rollback();
            return null;
        }
         $msg2 = $this->mail2("Forget Password",<<<EOD
we have reviewed your request to reset password. Please follow this link to reset password: <a href="http://www.writerventure.com/forget.php?new=1&val=$val">Forget Password</a>
Thank you!         
EOD
,$email, 'User',"support@writerventure.com","Support");  

    if ($msg2) {
        return 1;
    } else {
            $this->conn->rollback();
            return null;
    }
        

     }
     
     
     public function reset_pwd($input_new_pwd,$input_con_pwd,$val) {
        
        $email = $this->get_val('verify','email',"`value`='$val' and `status`='0'  and `date` > DATE_SUB(NOW(), INTERVAL 1 DAY);");

        if ($email == -1) {
            return null;
        }
       
        if ($input_con_pwd != $input_new_pwd or strlen($input_con_pwd) < 6 or strlen($input_new_pwd) < 6) {
            return null;
        } 
        
        $input_new_pwd = md5($input_new_pwd);
           $sql = "UPDATE `userlogin` SET `password`='$input_new_pwd' WHERE `email`='$email'";
            $sql_exe  = $this->conn->query($sql);
             if (!$sql_exe) {
                $this->conn->rollback();
                return null;
            }
              $sql = "DELETE FROM `verify` WHERE `value`='$val'";
                 $sql_exe  = $this->conn->query($sql);
            
        return 1;
           
     }
    
    
     public function notify($to,$msg) {
        
        $sql = "INSERT INTO `msgs`(`Index`, `from`, `to`, `date`, `body`, `from_view`, `to_view`, `file`) VALUES (NULL,'Support','$to',now(),'$msg','0','0','null')";
         $is_exist = $this->get_val('userdata','handle',"`handle`='$to'");
         if ($is_exist == -1) {
            return null;
         }
        $sql_exe = $this->conn->query($sql);
        if (!$sql_exe) {
             return null;
        } else {
            return 1;
        }
        
    }
//end of class
}    
    
 




function dataready($data)
{
//	$data = trim($data);
//	$data = stripslashes($data);
//	$data = nl2br(htmlspecialchars($data));
	return  htmlentities($data);
}
function databack($data) {
return  html_entity_decode(stripslashes(str_replace('\r\n','<br/>',$data)));
}
function resize_img($url,$q,$w=null,$h=null){
    $url_ = explode ('/',$url);
    if ($url_[0] != "upload") {
        $url  = "upload/$url";
    }
    $w="&width=$w";
    $h = "&height=$h";
    $ac = "&action=resize";
return "/resizer.php?file=$url&quality=$q$w$h$ac";
}
function google_validate($receivedRecaptcha) {

$google_secret =  "6LfKoWoUAAAAAEn9RkOLYM4htfEFi6GQl24vGL5Z";
$verifiedRecaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify?secret='.$google_secret.'&response='.$receivedRecaptcha;
$handle = curl_init($verifiedRecaptchaUrl);
curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); // not safe but works
//curl_setopt($handle, CURLOPT_CAINFO, "./my_cert.pem"); // safe
$response = curl_exec($handle);
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
curl_close($handle);
if ($httpCode >= 200 && $httpCode < 300) {
  if (strlen($response) > 0) {
        $responseobj = json_decode($response);
        if(!$responseobj->success) {
            return null;
            }
        else {
            return 1;
        }
    }
} else {
  echo "curl failed. http code is ".$httpCode;
}
}
?>
