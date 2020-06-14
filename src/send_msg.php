<?php
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();
if ($admin->user == -1) {
echo "<script>window.location = '/note.php?msg=session_exp';</script>";
exit();
}
$u = isset($_REQUEST['u']) ? ($_REQUEST['u'] == '' ? "!_Error_":$_REQUEST['u']):"!_Error_";
$text = isset($_REQUEST['input_msg']) ? ($_REQUEST['input_msg'] == '' ? "!_Error_":dataready($_REQUEST['input_msg'])):"!_Error_";  
if ($u == "!_Error_" or $text == "!_Error_") {
 echo "<script>window.location = '/note.php?msg=invalid_input';</script>";
exit();   
}
$send = $admin->send_msg($u,$text);
if ($send) {
      $msg = $admin->get_msg($u,'0');
      $msg = array_reverse($msg);
$u1 =  $admin->get_val('userdata','name',"`handle`='$u'");
$u2 = $admin->get_val('userdata','name',"`handle`='$admin->user'");
foreach ($msg as $msg_data) {
    foreach ($msg_data as $key=>$k) {
        $$key = databack($k);
    }
    if ($from == $admin->user) {
       $name = $u2.",$admin->user"; 
    } else {
        $name = $u1.",$u";
    }
    msg_body($name,$body,date('d F Y',strtotime($date)));
}
  
} else {
    echo "<h4 class='hdg hdg_4'>Some error occured</h4>";
    exit();
}
?>