<?php

    $data = $admin->get_data_pub("`handle`='$admin->user'",0,"`date` DESC");
    if ($data != -1) {
    $post = null;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = $k;
    } 
    $post .= post_li($title,"$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,'three',$type);
  }
  } else {
    $post = post_li("No Publications found","#",NULL,"Sorry we didn't found any publication by you. Start by publishing now",date('Y h M'),NULL,NULL,'one');
  }
?>


<div id="primary" class="content-area" style="min-height: 88vh;">
                
            <li class="grid-item-archive-title  col-sm-12" style="margin: 18px 0px;">
	<article class="grid-item-article ">
		<header class="entry-grid-header">
			<h1 class="hdg hdg_3 hdg_title">Dashboard:<small>Publications</small></h1>
        
         	</header><!-- .entry-header -->
	</article><!-- #post-## -->
</li>  <div class="clearfix"></div>
    
        <ul id="grid" class="grid grid_apn" role="main">
<?php

//post_li('Can food bring people to Kashmir? These cousins think so','/read/abc','','Being your own boss has never been so affordable. here’s a lot to be said for being your own boss. The freelance lifestyle affords certain freedoms, comforts, and rewards that 40 cubicle-bound hours a week …',date('Y h M'),'Abrar Ajaz','Freedom','three');

echo $post;
            ?>    
            
        </ul>
        
        <!-- status elements -->
<div class="text-center" align='center'>
<button id="load_more" class="btn">Load More</button>
</div> 
<?php $js = "$ = jQuery;var page = 2;load_more('/scroll.php?page=user_pub&');";?>

</div>