<?php
if (!isset($_GET['url'])) {
    header("Location: /");
    exit();
}
include __DIR__.'/parts/head.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

      $report =  $admin->report($_REQUEST);
   if ($report) {
    echo "<script>window.location='/note.php?msg=report_done'</script>";
    exit;
   } else {
      echo "<script>window.location='/note.php?msg=report_er'</script>";
    exit;
   }
}


 $url = $_GET['url'];
    $data = $admin->get_data_pub("`url`='$url'",0);
    if ($data != -1) {
    $post = null;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }
    }
    }
echo $text_area;
?>
<div class='col-md-2'></div>

<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
<main id="main" c/lass="site-main" role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry" style="min-height:100vh">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_3 hdg_title">Report</h1>
            </header>
<?php echo $user_option; ?>
            
<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
             <?php
            if (isset($msg)) {
           echo "<br/><h3 class='hdg_3' style='color: red;font-weight:700;'>$msg</h3><br/>";
           }
           ?>
                <form method="post" enctype="multipart/form-data">
<?php

form_ul('title', "Title", 'text',"Report Against: $title");
form_ul('name', "Your Name:", 'text');
form_ul('email', "Your Email:", 'text');
form_ul("report", "report", "textarea", <<<EOD
<b>Title</b>: $title<br/>
<b>Author</b>: $handle<br/>
<b>Post Url</b>: $url
<h4><b>Report (Write In next Line):</b></h4>:->
EOD
);
?>
                    <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Submit" tabindex="13" style="float:left"/></div>
                    </form>
            </ul>
            <br/>
    </article>
    </main></div>
    <script>
    var editor = new Simditor({
  textarea: $('#input_report')
  //optional options
  
});
    </script>
<?php
include __DIR__.'/parts/foot.php';
?>