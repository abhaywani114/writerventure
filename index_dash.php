<?php
include __DIR__.'/parts/service.php';
$admin = new writer();
if ($admin->user == -1) {
    header("Location: /note.php?msg=session_exp");
}
$page_global = array(
"page_title"=>"Dashboard - Writer Venture",
"page_description"=>"Are you a writer? Then you must be part of Writer Venture to share your write-ups with rest of world. Please sign up here.!",
"page_image"=> URL ."files/logo.png",
"page_keyword"=>"Sign up,writer venture, new user,goto dashboard"
);
if (!isset($_GET['view'])) {
    header("Location: /");
    exit();
}
include __dir__ . '/parts/head.php';
$view = $_GET['view'];
if ($view == "Message") {
    include __dir__ . '/dashboard_/msg_index.php';
} else
    if ($view == 'Message_Open') {
        include __dir__ . '/dashboard_/msg_body.php';
    } else
    if ($view == 'NewPost') {
        include __dir__ . '/dashboard_/user_new.php';
    } else
        if ($view == 'Setting') {
            include __dir__ . '/dashboard_/user_setting.php';
        } else
        if ($view == 'MyPublication') {
              include __dir__ . '/dashboard_/user_pub.php';
        } else
        if ($view == 'Edit') {
              include __dir__ . '/dashboard_/user_post_edit.php';
        } else
        if ($view == 'del') {
              include __dir__ . '/dashboard_/user_post_del.php';
        } else {
            //error
        include __dir__ . '/dashboard_/user_pub.php';
        }
        include __dir__ . '/parts/foot.php';
?>