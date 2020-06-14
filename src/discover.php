<?php
$page_global = array(
"page_title"=>"Discover - Writer Venture",
"page_description"=>"Discover latest writing that you want to head or hear from your favourit authour. Just type in the catagory and start to read",
"page_image"=> "/files/logo.png",
"page_keyword"=>"Sign up,writer venture, new user"
);
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();

$discover_ = isset($_REQUEST['input_cat']) ? ($_REQUEST['input_cat'] != '' ? $_REQUEST['input_cat']:"none"):"none";
$val = isset($_GET['val']) ? ($_GET['val'] != '' ? ($_GET['val'] > 0 ? $_GET['val']:"none"):"none"):"none";
$discover_preserver = $discover_;
if ($val != "none") {
   $offset = limit * $val - limit;
} else {
    $offset =0;
}
  

            $discover_ = explode(',',$discover_);
            $discover = null;
            foreach ($discover_ as $cat) {
                if ($cat != '') {
                    
                 $discover .= $discover !=null ? "or `cat` LIKE '%$cat%'":"`cat` LIKE '%$cat%'";  
                }
            }
     $data = $admin->get_data_pub("($discover) and `status` <= 5",$offset,'`date` DESC');
    if ($data != -1) {
    $post = null;

    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }

    $post .= post_li($title,"/read/$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,'two',$type);
  }
  } else {
    $post = post_li("No Publications found","#",NULL,"Sorry we didn't found any publication. Please select a catagory to discover writing.",date('Y h M'),NULL,NULL,'one');
  }
if ($val != "none") {
    echo $post;
    exit();
}
include __DIR__.'/parts/head.php';
?>
<div id="primary" class="content-area">
                
            <li class="grid-item-archive-title  col-sm-12" style="margin: 18px 0px;">
	<article class="grid-item-article grid-item-headline">
		<header class="entry-grid-header">
			<h1 class="hdg hdg_2 hdg_title">Discover</h1>
       
            <div>
            <br />
              <h5>Selected: <strong><?php echo $discover_preserver; ?></strong></h5>
<form>

                  <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
          <?php
        form_ul("cat","Catagory", "cat",$cat_list);
          ?></ul>
     
          <input type='submit' value="Discover" class='btn' />
          </form>
</div>	</header><!-- .entry-header -->
	</article><!-- #post-## -->
    
</li>  <div class="clearfix"></div>
    
        <ul id="grid" class="grid grid_apn" role="main">
<?php
echo $post;

            ?>    
            
        </ul>
                <!-- status elements -->
<div class="text-center" align='center'>
<button id="load_more" class="btn">Load More</button>
</div> 
<?php $js = "$ = jQuery;var page = 2;load_more('/discover.php?input_cat=$discover_preserver&');";?>

</div>
<?php
include __DIR__.'/parts/foot.php';
?>