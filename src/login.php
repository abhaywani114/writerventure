<?php
include __DIR__.'/parts/service.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin = new writer();
 foreach ($_REQUEST as $key => $k) {
        $$key = $k;
       }
       $login = $admin->authk($input_uname,$input_pwd);
 if ($login) {
header("Location: /");
exit();
} else {
     $msg = "Error: Invalid Username and Password!";
    }
 
} 
$page_global = array(
"page_title"=>"Login - Writer Venture",
"page_description"=>"In order to publish your writeups you need to login. Please feed us with your username and password!",
"page_image"=> URL."files/login.png",
"page_keyword"=>"Login,writer venture, goto dashboard"
);

include __DIR__.'/parts/head.php';
?>
<div class='col-md-2'></div>
<div id="primary" class="col-sm-12 col-md-8 content-area" style="margin:auto">
<main id="main" class="site-main" role="main">
    
    <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 8vh 0;">
		<h1 class="hdg hdg_1 hdg_title">login</h1><br/>
        <div class="gform_body">
<img class="responsive" src="/files/login.png" alt="login" style="margin:auto;display:block" height='100' width='100'/>
            <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                    <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
                <form method="post">
<?php

form_ul('uname',"Username",'text');                
form_ul('pwd',"Password",'password');  
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