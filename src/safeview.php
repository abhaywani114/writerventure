<?php
session_start();
include __DIR__.'/parts/head.php';
if (isset($_GET['url'])) { 
    $url = $_GET['url'];
    $data = $admin->get_data_pub("`url`='$url'",0);
    if ($data != -1) {
    $post = null;
    foreach ($data as $data_) {
    foreach ($data_ as $key=>$k) {
        $$key = databack($k);
    }
if (($handle != $admin->user) and (!isset($_SESSION['login']))) {

  echo "<script>window.location = '/note.php?msg=article_not_found'</script>";
     exit();     
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
?>
<div id="primary" class="content-area col-sm-12 col-md-12" style="margin:auto !important">
		<main id="main" class="site-main" role="main">

			<div class="entry-featured">
		<img width="768" height="473" src="<?php echo resize_img($image,40,0,0); ?>" class="attachment-attache-post-large size-attache-post-large wp-post-image" alt="">	</div>

<article id="post-176" class=" post type-post status-publish format-image has-post-thumbnail hentry category-nature post_format-post-format-image">
	<div class="row">
		<header class="entry-header col-sm-12"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
		<h2 class="hdg hdg_2 hdg_subtitle">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small></h2>			
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
s.src = 'https://http-www-writerventure-com.disqus.com/embed.js';
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
		<img alt="" src="<?php echo resize_img($dp,40,0,0); ?>"class="avatar avatar-84 photo" height="84" width="84"/>
        <div class="clearfix"></div>
        <div align='center'><b class="hdg_5 text-center"><?php echo $name;?></b></div></div>
         
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
           </div>
            
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