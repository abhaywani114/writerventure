<?php
$admin = new writer();
if (isset($_REQUEST['url'])) {
    $url =  $_REQUEST['url'];
    $del = $admin->del_post($url);
    if ($del) {
        echo "<script>window.location = '/note.php?msg=del_true';</script>";
    } else {
        echo "<script>window.location = '/note.php?msg=del_false';</script";
    }
}

?>