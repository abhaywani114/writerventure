<?php
    session_start();
if (!isset( $_SESSION['login'])) {
function login_($msg) {
$login = <<< EOD
<html><head><title>Admin Pannel</title></head><body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>


<div style="padding: 40px;text-align:center"><h1>Login</h1><h2>Writer Venture!</h2><div>
<form action="/admin_x.php" method='post'>
  <div class="imgcontainer">
    <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
$msg
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</form>
</div>
<style>
/* Bordered form */
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
.avatar {
    width: 140;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}</style>
</body>
</html>
EOD;
return $login;
}


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
 echo login_(null);
exit();
} else {
    $name = md5($_POST['uname']);
    $pwd = md5($_POST['pwd']);
    $users = array("47f8d5e66a360ad41aadc43cb0b1b276"=>"508a11d99e64df0b099bafaa31f776b4");
    
    if (array_key_exists ( $name ,$users)) {
        if ($users[$name] == $pwd) {
            $_SESSION['login'] = "Allah";
        } else {
            $error_login = 1;
        }
    } else {
        $error_login = 1;
    }
    if (isset($error_login)) {
      echo login_("<h4><b>Invalid username/password</h4>");
      exit();   
    }
}
} 

include __DIR__.'/parts/service.php';
$admin = new writer();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'approve') {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            if ($url != '') {
                $action = $admin->up_vote($url);
                if ($action) {
                    $msg = "<h4>Article approved! (Don't Refresh)</h4>";
                } else {
                    $msg = "<h4>Error Occured! (Don't Refresh)</h4>";
                }
            }
        } else {
            $msg = "Error";
        }
    } else if ($action == 'del') {
              if (isset($_GET['url'])) {
            $url = $_GET['url'];
            if ($url != '') {
                $action = $admin->down_vote($url);
                if ($action) {
                    $msg = "<h4>Article deleted! (Don't Refresh)</h4>";
                } else {
                    $msg = "<h4>Error Occured! (Don't Refresh)</h4>";
                }
            }
        } else {
            $msg = "Error";
        }  
    } else if ($action == 'logout') {
        session_unset();
        session_destroy();
        header("Location: /admin_x.php");
        exit;
    }
}
?>
<html><head><title>Admin Pannel</title></head><body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>


<div style="padding: 40px;text-align:center"><h1>Admin Panel</h1><h2>Writer Venture!</h2>
<?php
if (isset($msg)) {
    echo $msg;
}
?>
</div>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   <th>Email</th>
                    <th>Url</th>
                    <th>Status</th>
                      <th>up-vote</th>
                       <th>Delete Post</th>
                   </thead>
    <tbody>
    <?php
    $offset = 0;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $page_next = $page + 1;
        $page_pre = $page - 1;
    } else {
            $page =1;
        $page_next = 2;
        $page_pre = 1;
    }
    if($page == 1) {
        $page_pre = 1;
    } else if ($page < 1) {
        $page =1;
        $page_next = 2;
        $page_pre = 1;  
    }

    $data = $admin->view_report($page);
    //var_dump($data);
    $dl = null;
    if ($data != -1) {
    foreach ($data as $d) {
        foreach ($d as $key=>$k) {
            $$key = $k;
        }
        if ($status == 1 or $status == 0) {
            $status = "No action yet";
            $st = "null";
        } else if ($status == -2) {
            $status = "Approved";
            $st = "style='cursor: not-allowed;'";
        } else if ($status == -3) {
             $status = "Deleted";
            $st = null;
            $dl = "style='cursor: not-allowed;'";
        }
echo <<<EOD
    <tr>
    <td>$email</td>
    <td><a href='/safeview.php?url=$url' target="_blank">$url</a></td>
    <td>$status</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Approve"><a href='/admin_x.php?action=approve&url=$url' $st><button class="btn btn-primary btn-xs" $st><span class="glyphicon glyphicon-pencil" $st></span></button></a></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete Post"><a href='/admin_x.php?action=del&url=$url' $dl><button class="btn btn-danger btn-xs" $dl><span class="glyphicon glyphicon-trash" $dl></span></button></p></td>
    </tr>
EOD;
    }
    }
    ?>

    
    
    </tbody>
        
</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
<li><a href="/admin_x.php?action=logout"><span class="glyphicon glyphicon-off"></span></a></li>
  <li><a href="<?php
  echo "/admin_x.php?page=$page_pre"
  ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li><a href="<?php
  echo "/admin_x.php?page=$page_next"
  ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        </div>
	</div>
</div>



    

</body></html>