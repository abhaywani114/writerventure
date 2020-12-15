<?php
include __DIR__.'/parts/service.php';
include __DIR__.'/parts/function.php';
$admin = new writer();

if (isset($_GET['url'])) { 
    $url = $_GET['url'];
    $data = $admin->get_data_pub("`url`='$url' and `status` <= 5",0);
    if ($data != -1) {
    $post = null;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }

    }
    } else {
  echo "<script>window.location = '/note.php?msg=article_not_found'</script>";
     exit();   
    }
} else {
echo "<script>window.location = '/note.php?msg=article_not_found'</script>";
exit();
}
$user_data = $admin->view_user($handle);

foreach ($user_data as $data) {
    foreach ($data as $key=>$k) {
        $$key = $k;
    }
}
$page_global = array(
"page_title"=>"$title - Serene Writers",
"page_description"=>"$desp",
"page_image"=> "http://serenewriters.com/upload/$image",
"page_keyword"=>"$cat"
);
include __DIR__.'/parts/head.php';
?>
<div id="primary" class="content-area col-sm-12 col-md-12" style="margin:auto !important">
		<main id="main" class="site-main" role="main">

			<div class="entry-featured">
		<img width="768" height="473" src="<?php echo resize_img($image,40,0,0); ?>" class="attachment-attache-post-large size-attache-post-large wp-post-image" alt="">	</div>

<article id="post-176" class=" post type-post status-publish format-image has-post-thumbnail hentry category-nature post_format-post-format-image">
	<div class="row">
		<header class="entry-header col-sm-12">
			<h1 class="hdg hdg_2" style="font-size: 25px;"><?php echo $title;?></h1><span class="posted-on hdg_7"><time class="entry-date published"><?php echo $name." | ".$type." | ".date("d F Y",strtotime($date));?></time></span>		</header><!-- .entry-header -->

		<div class="entry-content">
			<div class="col-sm-10 col-sm-push-2">
				<p class="selectionShareable" style="text-align:  justify;"><?php echo html_entity_decode($body); ?></p>
			</div>

			<div class="col-sm-2 col-sm-pull-10">
		
<div class="entry-meta">

	
	<!--div class="entry-meta-author ">
		<img alt="" src="<?php echo resize_img($dp,100,0,0); ?>" class="avatar avatar-84 photo" height="84" width="84"/>
	<p style="margin-bottom:0;" class="hdg_6 s"><a href="<?php echo "/author/$handle"?>"> <?php echo $name;?> </a></p>	<br/></div-->

	
	<div class="entry-meta-share">

	<br />

		<ul class="entry-meta-socials">
							<li>
					<a class="socials social-facebook" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;">
						<svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg>
						<span>Facebook</span>
					</a>
				</li>
							<li>
					<a class="socials social-twitter" href="#" onclick="window.open('http://twitter.com/share?text=A Designer’s Crusade For a Dying Planet&amp;url='+encodeURIComponent(location.href), 'twitter-share-dialog', 'width=626,height=436'); return false;">
						<svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg>
						<span>Twitter</span>
					</a>
				</li>
							<li>
					<a class="socials social-google-plus" href="#" onclick="window.open('https://plus.google.com/share?url='+encodeURIComponent(location.href), 'twitter-share-dialog', 'width=626,height=436'); return false;">
						<svg class="icon icon-google-plus"><use xlink:href="#icon-google-plus"></use></svg>
						<span>Google Plus</span>
					</a>
				</li>
							<li>
					<a class="socials social-mail" href="mailto:?subject=A Designer’s Crusade For a Dying Planet&amp;body=http://demos.press75.com/attache/dying-planet/" onclick="">
						<svg class="icon icon-mail"><use xlink:href="#icon-mail"></use></svg>
						<span>Email</span>
					</a>
				</li>
					</ul>
	</div>
<div class="entry-cats-list">
    <?php
  $tag = explode(",",$cat);
  foreach ($tag as $k) {
    if ($k != '') {
   echo " <a href='/tag/$k' rel='category tag'>$k</a>";
  }
  }
    ?>

   </div>
<a href="<?php echo "/report.php?url=$url"?>"> Report </a>
                </div><!-- .entry-meta -->
  

				</div>

			<div class="clearfix"></div>

		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->

<div class="clearfix"></div>
<div class="clearfix"><br /></div>
<div id="comments" class="comments-area col-sm-12">
	
		<div id="respond" class="comment-respond">
		<h2 class="hdg hdg_2 hdg_subtitle">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h2>
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://http-www-serenewriters-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            

			</div><!-- #respond -->
	
</div><!-- #comments -->
              <div class="clearfix"></div>
              <style>
.grid-item-headline:before {z-index: unset !important;}
.socials2 {color:#fff !important;z-index:1000;}
.entry-meta-author {
    margin: 0 0 9px;}
    .entry-meta-author {max-width:100% !important;}
    .entry-meta-author img {max-width: 80% ;width: 63%;margin: auto;float:none}
           @media (max-width:756px) {
          .content-area {padding: 5px !important;}
      .grid-item {padding:0;}
      .entry-meta-author img {max-width: 80% !important;width: 110px!important;margin: auto;float:none}
      }
</style>
              
              
            <li class="grid-item-archive-title  col-sm-12" style="margin: 18px 0px;padding:0">
	<article class="grid-item-article grid-item-headline">
		<header class="entry-grid-header">
			<h1 class="hdg hdg_3 hdg_title">Author</h1>
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
                 <li>
					<a class="socials social-mail" href='/dashboard/Message_Open&u=<?php echo $handle;?>'>
						<svg class="icon icon-mail"><use xlink:href="#icon-mail"></use></svg>
						<span class="socials2">Message</span>
					</a>
				</li>
                
                   <?php
                $is_exist = $admin->get_val('follow','handle',"`handle`='$admin->user' and `follow`='$handle'");
                if ($is_exist == -1) {
echo <<< EOD
          <li class="list-item" id="follow">
						<a class="socials social-plus" href='#follow' onclick="follow('$handle')">
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
						<a class="socials social-plus" href='#follow' onclick="unfollow('$handle')">
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
           </div>
                <script>
    $ = jQuery;
    function follow(h) {
    $('#follow').load("/follow.php?ac=follow&h="+h);
    };
      function unfollow(h) {
    $('#follow').load("/follow.php?ac=unfollow&h="+h);
    };
    </script>
            </div>
	</article><!-- #post-## -->
</li> 
                
                
                
            <div class="clearfix"></div>
            <div id="recent-posts-2" class="widget ">		<h3 class=" widget-title hdg_3">Recent Posts</h3>		
		</div>
            
                    <?php
                
                
  $data = $admin->get_data_pub("`handle`='$handle' and `status` <= 5",0,'`date` DESC');
    if ($data != -1) {
    $post = null;
    $x = 1;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }
 
    $post .= post_li(databack($title),"/read/$url",NULL,databack($desp),date('Y h M'),$handle,$cat,'two',$type);
  }
    echo $post;
  }

       ?>
		</main><!-- #main -->
	</div>
<?php
include __DIR__.'/parts/foot.php';
?>