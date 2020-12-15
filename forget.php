<?php
include __DIR__.'/parts/service.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin = new writer();
 foreach ($_REQUEST as $key => $k) {
        $$key = $k;
       }
       if (!isset($_GET['new'])) { 
       $login = $admin->forget($input_uname);
       if ($login) {
        header('Location: /note.php?msg=mail_sent_pwd');
        exit();
       }
       } else if (isset($_GET['val'])) {
        $val = $_GET['val'];
        $reset = $admin->reset_pwd($input_new_pwd,$input_con_pwd,$val);
         if ($reset) {
        header('Location: /note.php?msg=done_rest');
        exit();
       } else {
          header('Location: /note.php?msg=done_rest_err');
        exit(); 
       }
       }

} 
$page_global = array(
"page_title"=>"Forget Password - Serene Writers",
"page_description"=>"In order to publish your writeups you need to login. Please feed us with your username and password!",
"page_image"=> URL."files/login.png",
"page_keyword"=>"Login,Serene Writers, goto dashboard"
);

include __DIR__.'/parts/head.php';
?>
<div class='col-md-2'></div>
<div id="primary" class="col-sm-12 col-md-8 content-area" style="margin:auto">
<main id="main" class="site-main" role="main">
    
    <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 8vh 0;">
		<h1 class="hdg hdg_1 hdg_title">Forget Password</h1><br/>
        <div class="gform_body">
<img class="responsive" src="/files/login.png" alt="login" style="margin:auto;display:block" height='100' width='100'/>
            <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                    <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
         <br />  <b>Please keep your password's length minimum 6 char.</b>
         <div class="clearfix"></div>
         <br/>              
<?php
if (!isset($_GET['new'])) {
    echo '<form method="post" >';
form_ul('uname',"Enter Your Email?",'text');
} else {
    $val = $_GET['val'];
        echo "<form method='post' action='/forget.php?new=1&val=$val' >";
        form_ul('new_pwd',"New Password",'password');
        form_ul('con_pwd',"Confirm Password",'password');
    
}               
?>
                    <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Submit" tabindex="13"  style="float:left"> <a href='/signup.php' class='btn' style="float:right">Sign Up</a></div>
                    </form>
            </ul>
        </div>
        <div class="clearfix"></div>
        <br />
            <a href="/forget.php">Forget Password?</a>
        </header></article>
    
    
    </main>
</div>
<?php
include __DIR__.'/parts/foot.php';
?>