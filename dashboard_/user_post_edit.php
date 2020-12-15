<?php
$admin = new writer();
if ($admin->user == -1) {
    echo "<Script>window.location = '/note.php?msg=session_exp</script>";
    exit(0);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 foreach ($_REQUEST as $key => $k) {
        $$key = $k;
       }
       $file = $admin->save_image("input_img");

        $publish = $admin->update($_REQUEST,$file);
    
     if ($publish == 1) {
   echo "<script>window.location = '/note.php?msg=update'</script>";
        exit();
} else {
     $msg = "Error: Some error occured!";
    }
 
} 
 if (isset($_REQUEST['post_url'])) {
    $url =  $_REQUEST['post_url'];
    $data = $admin->get_data_pub("`url`='$url'",0);
    foreach ($data as $data_) {
        foreach ($data_ as $key=>$k) {
            $$key = $k;
        }
    }
} else {
 echo "<script>window.location = '/note.php?msg=update'</script>";
exit();   
 
} 
echo $text_area;
?>
<div class='col-md-2'></div>

<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
<main id="main" class="site-main" role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_3 hdg_title">Dashboard:<small>New</small></h1>
            </header>
<?php echo $user_option; ?>
            
<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
             <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
                <form method="post" action="/dashboard/Edit" enctype="multipart/form-data">
<?php

form_ul('title', "Title", 'text',$title);
form_ul('type', 'Type', 'option', array(
    "Poem",
    "Article",
    "Story"));
form_ul('catagory', "Category/Tag", 'cat', $cat_list,$cat);
form_ul("write_up", "Write Up", "textarea", databack(html_entity_decode($body)));
//form_ul("msg", "Message to Writer", "textarea");
form_ul('desp', "Short Desciption", 'text',$desp);
form_ul('img', "Image file (HD Req)", 'file');
?>
<input type="hidden" name="input_url" value="<?php echo $url;?>" />
<input type="hidden" name="post_url" value="<?php echo $url;?>" />
                    <div class="gform_footer top_label"> 
                    <input type="submit"  class="gform_button button" value="Submit"/></div>
                    </form>
            </ul>
            
            <br/>
                <script>
    var editor = new Simditor({
  textarea: $('#input_write_up')
  //optional options
  
});
    </script>
    </article>
    </main></div>