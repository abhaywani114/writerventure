<?php
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();
if ($admin->user  == -1) {
    echo "<b>You Need to login</b>";
    exit();
}
$handle = isset($_REQUEST['h']) ? ($_REQUEST['h'] != '' ? $_REQUEST['h']:"none"):"none";
$action = isset($_REQUEST['ac']) ? ($_REQUEST['ac'] != '' ? $_REQUEST['ac']:"none"):"none";

if ($handle == "none" or $action == "none") {
    exit();
}

if ($action == 'follow') {
    $follow = $admin->follow($handle);
    if ($follow) {
        echo "<b>Now Following</b>";
        exit();
    }
} else if ($action == 'unfollow') {
    $unfollow = $admin->unfollow($handle);
    if ($unfollow){
        echo "<b>Unfollowed</b>";
        exit();
    }
}
?>