<?php
define("URL_","http://www.writerventure.com/");
$page_global = array(
"page_title"=>"About Us -Writer Venture",
"page_description"=>"Writer Venture is an inspiration for the writers including story tellers and poets. Learn who are behind Writer Venture.",
"page_image"=> URL_ ."files/social.png",
"page_keyword"=>"Sign up,writer venture, new user,goto dashboard"
);
include __DIR__.'/../parts/head.php';
?>

<div id="primary" class="col-sm-12 col-md-11 content-area" style="margin:auto">
		<main id="main" class="site-main" role="main">

			
<article id="post-99" class="post-99 page type-page status-publish hentry">
	<header class="entry-header col-sm-12">
		<h1 class="hdg hdg_1 hdg_title">About Us</h1>	</header><!-- .entry-header -->

	
	<div class="entry-content clearfix">
		<div class="col-sm-12">
			<p class="selectionShareable" style="text-align: justify !important;">
          Everyone has a story to tell. But not all are able to pen it down. A few get succeed in it. Many try but fail to execute things, due to the lack of exposure and opportunities. There is no need to get disheartened. Believe in yourself. Proud on yourself. Writer Venture believes in you and is proud on you. Talents differ. Write! Yes, you can write. We will publish your work. Writer Venture is a Kashmir based online-publisher which gives common people an opportunity to share their literary work with rest of the world. Opportunity comes but rare. Make it count. We really care for you and recognise your talent.<br/>
You can instantly start to publish your works but sign up at our website. We have messagning and following feature. So on Writer Venture you can make your own network. We support freedom of speach!<br/>
Best of Luck!
           </p>
           <p class="selectionShareable" style="text-align: right !important;"><b>Reach us at:</b><br />
           <span class="fa fa-map"></span> Khan Arcade - 2nd Floor, Jawaharnagar Srinagar<br/>
<span class="fa fa-envelope-square"></span>support@writerventure.com</p><br />
           

           
           

	<header class="entry-header col-sm-12">
		<h1 class="hdg hdg_1 hdg_title">Core Team</h1>	</header><!-- .entry-header -->

      <div class="col-md-10 col-md-offset-1">
        <div class="col-lg-12" style="text-align:center">
          <div class="row pt-md " style="text-align:center;margin:auto">
          
          
                     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="<?php echo resize_img('team/2.png',10,300,350);?>" class="img-responsive">
                <ul class="text-center">
                  <a href="https://www.facebook.com/abhay.waniii.9"><li><i class="fa fa-facebook"></i></li></a>
                  <a href="https://twitter.com/wani_abhay"><li><i class="fa fa-twitter"></i></li></a>
                  <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                </ul>
              </div>
              <h1>Abrar Ajaz Wani</h1>
              <h2>Founder</h2>
            </div>
            
               <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6" ></div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="<?php echo resize_img('team/1.png',10,300,350);?>" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                  <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                  <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                </ul>
              </div>
              <h1>Affan Yesvi</h1>
              <h2>Director / Co-Founder</h2>
            </div>
            
  



             		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<div class="clearfix"></div>
		</main><!-- #main -->
	</div>
<style>
 .f_r{   
    float: right !important;
}
.team{
    padding:75px 0;
}
h6.description{
	font-weight: bold;
	letter-spacing: 2px;
	color: #999;
	border-bottom: 1px solid rgba(0, 0, 0,0.1);
	padding-bottom: 5px;
}
.profile{
	margin-top: 25px;
}
.profile h1{
	font-weight: normal;
	font-size: 20px;
	margin:10px 0 0 0;
}
.profile h2{
	font-size: 14px;
	font-weight: lighter;
	margin-top: 5px;
}
.profile .img-box{
	opacity: 1;
	display: block;
	position: relative;
}
.profile .img-box:after{
	content:"";
	opacity: 0;
	background-color: rgba(0, 0, 0, 0.75);
	position: absolute;
	right: 0;
	left: 0;
	top: 0;
	bottom: 0;
}
.img-box ul{
	position: absolute;
	z-index: 2;
	bottom: 50px;
	text-align: center;
	width: 100%;
	padding-left: 0px;
	height: 0px;
	margin:0px;
	opacity: 0;
}
.profile .img-box:after, .img-box ul, .img-box ul li{
	-webkit-transition: all 0.5s ease-in-out 0s;
    -moz-transition: all 0.5s ease-in-out 0s;
    transition: all 0.5s ease-in-out 0s;
}
.img-box ul i{
	font-size: 20px;
	letter-spacing: 10px;
}
.img-box ul li{
	width: 30px;
    height: 30px;
    text-align: center;
    border: 1px solid #88C425;
    margin: 2px;
    padding: 5px;
	display: inline-block;
}
.img-box a{
	color:#fff;
}
.img-box:hover:after{
	opacity: 1;
}
.img-box:hover ul{
	opacity: 1;
}
.img-box ul a{
	-webkit-transition: all 0.3s ease-in-out 0s;
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out 0s;
}
.img-box a:hover li{
	border-color: #fff;
	color: #88C425;
}                            
</style>
<link rel='stylesheet' type='text/css' media='all' href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<?php
include __DIR__.'/../parts/foot.php';
?>