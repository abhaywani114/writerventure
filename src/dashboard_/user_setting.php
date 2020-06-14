<?php
$admin = new writer();
if ($admin->user == -1) {
    echo "<Script>window.location = '/note.php?msg=session_exp</script>";
    exit(0);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
       $file = $admin->save_image("input_img"); 
    
      $publish = $admin->update_user($_REQUEST,$file);
     if ($publish == 1) {
        echo "<script>window.location = '/note.php?msg=update_user'</script>";  
        exit();
     }  else if ($publish == -1) {
        $msg = "Error: Min 6 char password required!";
     } else if ($publish == -2) {
        $msg = "Invalid old password";
     } else {
        $msg = "Some error occured!";
        
     } 
} 
$data = $admin->view_user($admin->user,"`addr`,`bio`,`intrested`");
foreach ($data as $user_data) {
      foreach($user_data as $key=>$k) {
        $$key = $k;
}
}
echo $text_area;
?>
<div class='col-md-2'></div>

<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
<main id="main" c/lass="site-main" role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_3 hdg_title">Dashboard:<small>Settings</small></h1>
            </header>
<?php echo $user_option;?>
            <br/>
            <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                     <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
            <form method="post" action="/dashboard/Setting"  enctype="multipart/form-data">
<?php
form_ul('addr',"Address",'text',$addr);
form_ul('gender','Gender','option',array("Male","Female"));
form_ul('country','Country','option',$country_opt); //global def varible
form_ul('intrested',"Intrested",'cat',$cat_list,$intrested);
form_ul('bio',"About Yourself",'textarea',databack($bio));
form_ul('img',"Your Image","file");
echo "<br/><hr/>";             
form_ul('pwd_old',"Old Password",'password');  
form_ul('pwd_new',"New Password",'password');  
?>            
    <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Submit" tabindex="13" style="float:left"></div>     
           </form> </ul>
         
    <br/>
        <script>
    var editor = new Simditor({
  textarea: $('#input_bio')
  //optional options
  
});
    </script>
   </article>
    </main></div>