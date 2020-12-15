<?php
$to_ = isset($_REQUEST['u']) ? $_REQUEST['u']:'';
$del = isset($_REQUEST['d']) ? $_REQUEST['d']:'none';
if ($del != "none") {
    $del  = $admin->del_msg($del);
    if ($del) {
        echo "<script>window.location = '/dashboard/Message'</script><noscript>Please enable javascript</noscript>";
        exit();
    }
    
}
$is_exist = $to_ != '' ? $admin->get_val('userdata','handle',"`handle`='$to_'"):-1;

if ($to_ == '' or $is_exist == -1) {
 echo "<script>window.location = '/dashboard/Message'</script><noscript>Please enable javascript</noscript>";
    exit();
}
?>
<div class='col-md-2'></div>

<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
<main id="main" class="site-main" role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_3 hdg_title">Dashboard:<small>Messenger</small></h1>
            </header>
<?php echo $user_option;?>
            <br/>
            <style>
                .body_text {
    font-size: 19px;
    margin-top: 0;
    margin-bottom: 5px;   
                }
                .chat_base {
                        opacity: 0.60;
                        font-size: 10px!important;
                        line-height: 1 !important;
                    float: right;
                }
                .w3-margin-bottom {
                    display: block;
                    padding: 10px;
                   /*/ min-height: 30vh;/*/
                }
                .w3-bar .w3-bar-item {
    padding: 8px 16px;
    float: left;
    width: auto;
    border: none;
    outline: none;
    display: block;
}
                .w3-bar {width: 100%;}
                
                  @media (min-width:756px) {
                .pad_msg {padding:3px 6vh;}
                  }
            </style>
            
<div class="w3-bar">

  <div class="w3-bar-item"> 
<input placeholder="@to" name="u" value="<?php echo $to_?>" class="w3-input" type="text" id="to"/></div>
  <div class="w3-bar-item"> <input type="submit" class="w3-button w3-black" value="Open" onclick="window.location = '/dashboard/Message_Open&u='+ jQuery('#to').val()" />
  </div>
   <div class="w3-bar-item"> 
   <a href='#' onclick="del('<?php echo $to_?>')"><buttion class='btn'>Delete</buttion></a>
  </div>
   <script>
   function del(val) {
       var con = confirm("Do you want to delete?");
       if (con == true) {
           window.location = "/dashboard/Message_Open&d="+val;
       }
   }
   </script>
</div>
<div class="clearfix"></div>
   
     <a href="/dashboard/Message_Open&u=<?php
     echo $to_;
     $page = isset($_REQUEST['page']) ? $_REQUEST['page']:0;
     $page_nxt  = $page + 1;
     echo "&page=$page_nxt";
     ?>"><button class="btn" style="width: 100%;">Load Previous</button></a>      
            <div class='pad_msg' id="msg_body">
                
<?php
//msg body msg_body($text_from,$text_body,$sent,$seen)
$offset = $page_nxt * 5 - 5;
$msg = $admin->get_msg($to_,"$offset");
if ($msg) {
$msg = array_reverse($msg);
$u1 =  $admin->get_val('userdata','name',"`handle`='$to_'");
$u2 = $admin->get_val('userdata','name',"`handle`='$admin->user'");
foreach ($msg as $msg_data) {
    foreach ($msg_data as $key=>$k) {
        $$key = databack($k);
    }
    if ($from == $admin->user) {
       $name = $u2.",$admin->user"; 
    } else {
        $name = $u1.",$to_";
    }
    msg_body($name,$body,date('d F Y',strtotime($date)));
}
} else {
  msg_body("No message found,$to_","Please start by typing a new message. All the best!",date('d F Y'));
}
                
                
?>
        
                </div>
            
<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
    <form id="msg_snd_form" method="post" action="/send_msg.php?u=<?php echo $to_;?>">
<?php
form_ul("msg","Message","textarea");        
?>
<div class="gform_footer top_label"> 
<input type="submit" id="gform_submit_button_1_" class="gform_button button" name='submit' value="submit" tabindex="13" style="float:left" /></div>
</form> 
                 <script>
                 $ = jQuery;
  function setform(form,datas) {
$(document).ready(function(){
      $(form).on('submit', function(e){
        e.preventDefault();
        var form = e.target;
        var data = new FormData(form);
        $.ajax({
          url: form.action,
          method: form.method,
          processData: false,
          contentType: false,
          data: data,
          processData: false,
          success: function(data){
          $('#input_msg').val(null);
         $( datas ).html( data );
             }
        })
      })
    })
}
setform("#msg_snd_form","#msg_body");
                 </script>
            </ul>
            
            <br/>
    </article>
    </main></div>