<?php
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();
 $val = isset($_GET['val']) ? $_GET['val']:"none";
 if ($val == "none" or $val == '') {
     exit();
 }
 
  if(!preg_match('/^[a-z\d_]{5,20}$/i',$val)){        
  echo "<b>Username is not valid</b><br/>";
  exit();
    }
 
 $is_exist = $admin->get_val('userlogin','handle',"`handle`='$val'");
 if ($is_exist == -1) {
     echo "<b>Username Avalable</b><br/>";
     exit();
 } else {
     echo "<b>Username Taken</b><br/>";
     exit();
 }
?>