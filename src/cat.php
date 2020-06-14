<div id="primary" class="content-area">
                
            <li class="grid-item-archive-title  col-sm-12" style="margin: 18px 0px;">
	<article class="grid-item-article grid-item-headline">
		<header class="entry-grid-header">
			<h1 class="hdg hdg_2 hdg_title"><?php
            
                 $cat_ = isset($_GET['categories']) ? ($_GET['categories'] != '' ? $_GET['categories']:"Error"): "Error";
                  if ($cat_ != 'Feed') {
                    echo "Categories: $cat_";
                    } else {
                        echo "Latest feed from the author you follow";
                    }
                ?></h1>
         	</header><!-- .entry-header -->
	</article><!-- #post-## -->
</li>  <div class="clearfix"></div>
    
        <ul id="grid" class="grid grid_apn" role="main">
<?php
        if ($cat_ != 'Error') {
            if ($cat_ != 'Feed') {
         $data = $admin->get_data_pub("`type`='$cat_' and `status` <= 5",0,'`date` DESC');
         } else {
            $data = $admin->get_data_pub("`status` <= 5 and `handle` IN (select `follow` as `handle` from `follow` where `handle`='$admin->user')",0,'`date` DESC');
         }
    if ($data != -1) {
    $post = null;
    $x = 1;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }
     if ($x==1){
        $type_ ='one';
        $x = 2;
     } else {
        $type_ = 'two';
     }
    $post .= post_li($title,"/read/$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,$type_,$type);
  }
  } else {
    $post = post_li("No Publications found","#",NULL,"Sorry we didn't found any publication. Please follow someone to update your feed.",date('Y h M'),NULL,NULL,'one');
  }
  echo $post;
  }
            ?>    
            
        </ul>
        <div class="clearfix"></div>
          <!-- status elements -->
<div class="text-center" align='center'>
<button id="load_more" class="btn">Load More</button>
</div> 
<?php $js = "$ = jQuery;var page = 2;load_more('/scroll.php?page=cat&type=$cat_&');";?>
</div>