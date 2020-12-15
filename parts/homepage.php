<?php
if (isset($_GET['page'])) {
    $page = 0;
    $no_load =1;
} 

    $data = $admin->get_data_pub("`status` <= 5",0,'`date` DESC');
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
      if (isset($no_load)) { 
  $type_ = 'two';
  }
    $post .= post_li($title,"/read/$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,$type_,$type);
  }
  } else {
    $post = post_li("No Publications found","#",NULL,"Sorry we didn't found any publication by you. Start by publishing now",date('Y h M'),NULL,NULL,'one');
  }
  if (isset($no_load)) { 
    echo $post;
    exit();
  }
?>
<div id="primary" class="content-area article-feed " style="min-height: 90vh;" >
        <ul id="grid" class="grid grid_apn " role="main">
<?php   echo $post;         ?>    
            

        </ul>
        <!-- status elements -->
<div class="text-center" align='center'>
<button id="load_more" class="btn">Load More</button>
</div> 
<?php $js = "$ = jQuery;var page = 2;load_more('/scroll.php?page=home&');";?>


</div>