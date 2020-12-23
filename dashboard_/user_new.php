<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin = new writer();
 foreach ($_REQUEST as $key => $k) {
        $$key = $k;
       }
       $file = $admin->save_image("input_img");

       if ($file) {
        $publish = $admin->publish($_REQUEST,$file);
       } else {
		   $publish = null;
		   $msg = "Error: Image is required.";
       }
 if ($publish == 1) {
echo "<script>window.location = '/note.php?msg=pub'</script>";
	exit();
} else {
     $msg = $msg ?? "Error: Some error occured!";
 }
 
}
echo $text_area;
?>
<div class='col-md-2'></div>

<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
<main id="main" c/lass="site-main" role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_3 hdg_title">Dashboard: <small>New Post</small></h1>
            </header>

            
<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
             <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
                <form method="post" enctype="multipart/form-data">
<?php

form_ul('title', "Title", 'text');
form_ul('type', 'Type', 'option', array(
    "Poem",
    "Article",
    "Story"));
form_ul('catagory', "Category/Tag", 'cat', $cat_list);
form_ul("write_up", "Write Up", "textarea");
//form_ul("msg", "Message to Writer", "textarea");
form_ul('desp', "Short Desciption", 'text');
form_ul('img', "Image file (HD Req)", 'file');
?>
                    <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Submit" tabindex="13" style="float:left"/></div>
                    </form>
            </ul>
            <br/>
    </article>
    </main></div>
    <script>
	Simditor.locale = 'en-US';
    var editor = new Simditor({
  textarea: $('#input_write_up')
  //optional options
  
});
    </script>
