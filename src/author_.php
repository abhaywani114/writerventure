<?php
$handle = isset($_REQUEST['handle']) ? $_REQUEST['handle']:"Error";
if ($handle == "Error") {
header("Location: /note.php?msg=author_not_found");   
exit(); 
} 
include __DIR__.'/parts/head.php';
$user_data = $admin->view_user($handle);
if ($user_data != -1) {
foreach ($user_data as $data) {
    foreach ($data as $key=>$k) {
        $$key = $k;
    }
}
} else {
    echo "<script>window.location = '/note.php?msg=author_not_found'</script>";
exit();
}
?>
<style>
.grid-item-headline:before {z-index: unset !important;}
.socials {color:#fff !important;z-index:1000;}
.entry-meta-author {
    margin: 0 0 9px;}
    .entry-meta-author {max-width:100% !important;}
    .entry-meta-author img {max-width: 80% !important;width: 63%!important;margin: auto;float:none}
</style>
<div id="primary" class="content-area">
                
            <li class="grid-item-archive-title  col-sm-12" style="margin: 18px 0px;">
	<article class="grid-item-article grid-item-headline">
		<header class="entry-grid-header">
			<h1 class="hdg hdg_2 hdg_title">Author</h1>
         	</header><!-- .entry-header -->
            <div class="row">
        <div class="col-md-2">
				
<div class="entry-meta">
	<div class="entry-meta-author text-center">
    <br />
		<img alt="" src="<?php echo resize_img($dp,40,100,100); ?>"class="avatar avatar-84 photo" height="84" width="84"/>
        <div class="clearfix"></div>
        <div align='center'><b class="hdg_5 text-center"><?php echo $name;?></b><br />
        <?php
       $num = $admin->num_folowers($handle);
        echo "Follower: $num"
        ?></div></div>
         
                </div><!-- .entry-meta -->
  </div>

			<div class="col-md-9" class="text-justify">
           <?php echo databack($bio);?>
             <div class="clearfix"></div> 
             <br />
             <ul class="list-group">
                 <li class="list-item">
						<a class="socials social-mail" href='/dashboard/Message_Open&u=<?php echo $handle;?>'>
						<svg class="icon icon-mail"><use xlink:href="#icon-mail"></use></svg>
						<span>Message</span>
					</a>
				</li>
                <?php
                $is_exist = $admin->get_val('follow','handle',"`handle`='$admin->user' and `follow`='$handle'");
                if ($is_exist == -1) {
echo <<< EOD
          <li class="list-item" id="follow">
						<a class="socials social-plus" href='#' onclick="follow('$handle')">
					<svg class=" icon svg-icon" viewBox="0 0 20 20">
							<path d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10"></path>
						</svg>
						<span>Follow</span>
					</a>
				</li>
EOD;
                } else {
echo <<< EOD
       <li class="list-item" id="follow">
						<a class="socials social-plus" href='#' onclick="unfollow('$handle')">
					<svg class=" icon svg-icon" viewBox="0 0 20 20">
<path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path>
						</svg>
						</svg>
						<span>Unollow</span>
					</a>
				</li>
EOD;

    }
                ?>
             
                </ul>
           </div>
            
            </div>
	</article><!-- #post-## -->
    <script>
    $ = jQuery;
    function follow(h) {
    $('#follow').load("/follow.php?ac=follow&h="+h);
    };
      function unfollow(h) {
    $('#follow').load("/follow.php?ac=unfollow&h="+h);
    };
    </script>
</li>  <div class="clearfix"></div>
    
        <ul id="grid" class="grid" role="main">
<?php
 
     if ($handle != 'Error') {
         $data = $admin->get_data_pub("`handle`='$handle' and `status` <= 5",0,'`date` DESC');
    if ($data != -1) {
    $post = null;

    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }

    $post .= post_li($title,"/read/$url",resize_img($image,30,786,473),$desp,date('Y h M'),$handle,$cat,'two',$type);
  }
  } else {
    $post = post_li("No Publications found","#",NULL,"Sorry we didn't found any publication by you. Start by publishing now",date('Y h M'),NULL,NULL,'one');
  }
  echo $post;
  }
 ?>    
            
        </ul>
</div>
<?php
include __DIR__.'/parts/foot.php';
?>