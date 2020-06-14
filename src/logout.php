<?php
include __DIR__.'/parts/service.php';
$admin = new writer();
$cookie_name = 'zara';
$value=$_COOKIE[$cookie_name];
$val = md5(rand());
$qry = "UPDATE `userlogin` SET `ran`='$val' WHERE `ran`='$value'";
$result = mysqli_query($admin->conn, $qry);
setcookie ("zara","0",time()-3600*24,'/');
header("Location: /");
                   exit;
?>