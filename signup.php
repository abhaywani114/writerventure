<?php
include __DIR__.'/parts/service.php';
$admin = new writer();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$create = $admin->create_ac($_REQUEST);
if ($create == 1) {
header("Location: /note.php?msg=ac_creation");
exit();
} else {
    if ($create == -1) {
    $msg = "Error occured while creating the account!";
    } else if ($create == -2) {
     $msg = "Error: Usename or Email already exist!";   
    } else if ($create == -3) {
     $msg = "Error: ReCAPTCHA not verified.";   
    } else if ($create == -4) {
     $msg = "Error: Invalid email.";   
    }
}
}
$page_global = array(
"page_title"=>"Sign-Up - Serene Writers",
"page_description"=>"Are you a writer? Then you must be part of Serene Writers to share your write-ups with rest of world. Please sign up here.!",
"page_image"=> URL."files/login.png",
"page_keyword"=>"Sign up,Serene Writers, new user,goto dashboard"
);

include __DIR__.'/parts/head.php';
?>
<div class='col-md-2'></div>
<div id="primary" class="col-sm-12 col-md-8 content-area" style="margin:auto">
<main id="main" class="site-main" role="main">
    
    <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12">
		<h1 class="hdg hdg_1 hdg_title">Create a New Account</h1><br/>
        <div class="gform_body">
<img class="responsive" src="/files/login.png" alt="login" style="margin:auto;display:block" height='100' width='100'/>
            <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
            <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
                <form method='post'>
<?php
form_ul('name',"Name",'text');
form_ul('addr',"Address",'text');
form_ul('gender','Gender','option',array("Male","Female"));
form_ul('country','Country','option',$country_opt); //global def varible
form_ul('intrested',"Intrested",'cat',$cat_list);
form_ul('email',"E-mail",'text');
form_ul('bio',"About Yourself",'textarea');
echo "<br/><hr/>";
form_ul('uname',"Username (Do not use space, min 6)",'text');    
echo "<span id='status'></span>";
form_ul('pwd',"Password",'password');  
?>
<div class="g-recaptcha" data-sitekey="6LdiBBAaAAAAAMgUvtqioSK63sKrOe9uLg5mV7a8"></div><br/>
<input type="hidden" value="submit" name="submit" />
                    <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Submit" tabindex="13" style="float:left"> <a href='/login.php' class='btn' style="float:right">Login</a></div>
                    </form>
            </ul>
        </div><br/><br/>
        </header></article>
    <script>
    $ = jQuery;
         $(document).ready(function(){
$('#input_uname').keyup(function(){
var x = $('#input_uname').val();
    $.get("/is_exist.php?val="+x, function(data, status){
        $('#status').html(data);
    });
});
});
        
    </script>
    </main>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</div>
<?php
include __DIR__.'/parts/foot.php';
?>
