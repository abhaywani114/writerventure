<?php
$page_global = array("title" => "Serene Writers:Dashboard", "description" => null);
if (!isset($_GET['view'])) {
    header("Location: /");
    exit();
}
include __dir__ . '/parts/head.php';
$view = $_GET['view'];
if ($view == "Message") {
    include __dir__ . '/dashboard/msg_index.php';
} else
    if ($view == 'NewPost') {
        include __dir__ . '/dashboard/user_new.php';
    } else
        if ($view == 'Setting') {
            include __dir__ . '/dashboard/user_setting.php';
        } else
        if ($view == 'MyPublication') {
              include __dir__ . '/dashboard/user_pub.php';
        } else {
            //error
        }
        include __dir__ . '/parts/foot.php';
?>