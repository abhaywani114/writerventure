<?php
$page_global = array(
"page_title"=>"Search - Serene Writers",
"page_description"=>"Discover latest writing that you want to head or hear from your favourit authour. Just type in the catagory and start to read",
"page_image"=> "/files/logo.png",
"page_keyword"=>"Sign up,Serene Writers, new user"
);
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();

$discover_ = isset($_REQUEST['input_s']) ? ($_REQUEST['input_s'] != '' ? $_REQUEST['input_s']:"none"):"none";
$type_ = isset($_REQUEST['input_type']) ? ($_REQUEST['input_type'] != '' ? $_REQUEST['input_type']:"Write-up"):"Write-up";
$search = isset($_REQUEST['action']);

if ($search) {
     $val = isset($_GET['val']) ? ($_GET['val'] != '' ? ($_GET['val'] > 0 ? $_GET['val']:"none"):"none"):"none";
     $offset = limit * $val - limit;
} else {
    $offset =0;
}
            $s = "'%$discover_%'";
            if ($type_ == "Write-up") {
    $data = $admin->get_data_pub("(`title` like $s or `cat` like $s or `desp` like $s or `handle` like $s) and `status` <= 5",$offset,'`date` DESC');
            } else {
            $lim = limit;
        $data = $admin->view_user("$, `name` like $s or `bio` like $s or `country` like $s or `addr` like $s or `handle` like $s LIMIT $lim offset $offset");

    }

    if ($data != -1) {
    $post = null;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }
    
    if ($type_ == "Write-up") {
    $post .= post_li($title,"/read/$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,'two',$type);
    } else {
    $post .= post_li($name,"/author/$handle",resize_img($dp,30,0,0),$bio,date('Y h M'),null,null,'four',null);
    }
  }
  
  if ($search) {
    echo $post;
    exit();
  }
  } else {
    if ($type_ == "Write-up") {
      $post = post_li("No Publications found","#",NULL,"Sorry we didn't found any publication. Please input valid string",date('Y h M'),NULL,NULL,'one');
    } else {
    $post = post_li("No Author Found","#",null,"Sorry we didn't found any author. Please input valid string",date('Y h M'),null,null,'four',null);
    }
  
  }
  if ($search) {
    exit();
  }
include __DIR__.'/parts/head.php';
?>
<div id="primary" class="content-area">
                
            <li class="grid-item-archive-title  col-sm-12" style="margin: 18px 0px;">
	<article class="grid-item-article grid-item-headline">
		<header class="entry-grid-header">
			<h1 class="hdg hdg_2 hdg_title">Search</h1>
         
            <div>
            <br />
<form>

                  <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
          <?php
        form_ul("s","String","text",$discover_);
        form_ul("type","Type","option",array("Write-up","Author"));
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
</div>
        <!-- status elements -->
<div class="text-center" align='center'>
<button id="load_more" class="btn">Load More</button>
</div> 
<?php $js = "$ = jQuery;var page = 2;load_more('/search.php?action=1&input_s=$discover_&input_type=$type_&');";?>

<?php
include __DIR__.'/parts/foot.php';
?>