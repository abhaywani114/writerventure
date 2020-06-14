<?php
$sent = isset($_GET['x']) ? true:null;
$val = isset($_GET['val']) ? ($_GET['val'] != '' ? ($_GET['val'] > 0 ? $_GET['val']:"1"):"1"):"1";
     $offset = 50 * $val - 50;
if ($sent == null) {
$msg = $admin->msg_list('inbox',$offset);
} else {
$msg = $admin->msg_list('outbox',$offset);
}
?>
<div class='col-md-2'></div>
<style>
    .sahil {
        margin: 0px 0px 5px 0px;
        padding: 0px 0px 4px 0px;
        font-weight: 700;
    }
    .sahil:hover {
        background: #000;
        color: #fff;
        cursor: pointer;
    }
</style>
<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
<main id="main" ckass="site-main" role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_3 hdg_title">Dashboard: <small>Messenger</small></h1>
            </header>

            
            <div style='padding:3px 6vh'>

<h3 class="hdg_3"><?php
if ($sent == null) {
    echo "Inbox";
} else {
    echo "Outbox";
}
?></h3><br/>
            
            
<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
    <div class="row">
<?php
// msg list: msg_list($name,$image)
if ($msg) {
foreach ($msg as $al) {
    $handle = $al['Al'];
   $name =  $admin->get_val('userdata','name',"`handle`='$handle'");
   $dp =  $admin->get_val('userdata','dp',"`handle`='$handle'");
   if ($dp == null) {
    $dp = 'user.png';
   }
   msg_list($name,$handle,resize_img($dp,30,100,100));
}
} else {
    echo "No messages yet!";
}
?>

    </div>


            </ul>
      </div>
      
            <br/>
            <div class="text-center" align='center'>
<a href="<?php
 $val = $val + 1;
 if ($msg) {
if ($sent == null) {
echo "/dashboard/Message&val=$val";
} else {
echo "/dashboard/Message&val=$val&x=sent";
}
} else {
    echo "#";
}
?>"><button id="load_more" class="btn">Load More</button></a>
</div> 
          
    </article>
    
    </main></div>