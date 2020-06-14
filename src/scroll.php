<?php
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();
 $val = isset($_GET['val']) ? ($_GET['val'] != '' ? ($_GET['val'] > 0 ? $_GET['val']:"none"):"none"):"none";
 $page = isset($_GET['page']) ? ($_GET['page'] != '' ? $_GET['page']:"none"):"none";
$offset = limit * $val - limit;
if ($page != "none" and $val != "none") {

        if ($page=="home") {
        $data = $admin->get_data_pub("`status` <= 5",$offset,'`date` DESC');
        $post_type = 'two';
       } else if ($page=='cat') {
         $type = isset($_GET['type']) ? ($_GET['type'] != '' ? ($_GET['type'] !=  '' ? $_GET['type']:"none"):"none"):"none";
                 $data = $admin->get_data_pub("`type`='$type' and `status` <= 5",$offset,'`date` DESC');
                 $post_type='two';
       } else if ($page == 'user_pub') {
        if ($admin->user == -1) {
            exit();
        }
         $data = $admin->get_data_pub("`handle`='$admin->user'",0,"`date` DESC");
        $post_type = "three";
       }
        
    $post = null;
    if ($data != -1) {
        foreach ($data as $data_) {
            foreach ($data_ as $key=>$k) {
                $$key = databack($k);
                }
                
                
$post .= post_li($title,"/read/$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,$post_type,$type);


    }
    echo $post;
    exit();
    } else {
        exit();
    }
}

?>