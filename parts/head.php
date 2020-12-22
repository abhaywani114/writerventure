<?php
if (!function_exists('menu_li')) {
include __DIR__.'/function.php';
}
if (!class_exists('writer')) {
require_once __DIR__.'/service.php';
}
if (!isset($admin)) {
    $admin = new writer();
}
?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from demos.press75.com/attache/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jul 2018 07:06:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/files/icon.png" type="image/gif" sizes="16x38">

<?php
if (isset($page_global)) {
    foreach ($page_global as $key=>$k) {
        $$key = $k;
    }
echo <<<EOD
<title>$page_title</title>
<meta name="description" content="$page_description">
 <meta name="keywords" content="$page_keyword">

<meta property="og:title" content="$page_title" />

<meta property="og:description" content="$page_description" />

<meta property="og:image" content="$page_image" />

EOD;
} else {
    echo "<title>Serene Writers</title>";
}
    
   ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119135561-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119135561-2');
</script>

<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
<link rel='dns-prefetch' href='http://s.w.org/' />
<link rel="alternate" type="application/rss+xml" title="Attache &raquo; Feed" href="http://demos.press75.com/attache/feed/" />
<link rel="alternate" type="application/rss+xml" title="Attache &raquo; Comments Feed" href="http://demos.press75.com/attache/comments/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.4\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.4\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/demos.press75.com\/attache\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.7"}};
			!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56692,8205,9792,65039],[55357,56692,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
.home {
    background: url("/upload/team/background.jpg") fixed;
    background-size: cover;
}
article, {

    background: #ffffffbf;
    color:#000 !important;
}
</style>
<link rel='stylesheet' id='attache-fonts-css'  href='https://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700%7CLora%3A400%2C400italic%7CQuicksand%3A700&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='attache-css-css'  href='/wp-content/themes/attache/styledc8c.css?ver=2.2' type='text/css' media='all' />
<script type='text/javascript' src='/wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
<link rel='https://api.w.org/' href='http://demos.press75.com/attache/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://demos.press75.com/attache/wp-includes/wlwmanifest.xml" /> 
		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		<meta name="twitter:partner" content="tfwp">
</head>
<body class="home blog infinite-scroll">

<svg display="none" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
	<symbol id="icon-search" viewBox="0 0 951 1024">
		<title>search</title>
		<path class="path1" d="M658.286 475.429q0-105.714-75.143-180.857t-180.857-75.143-180.857 75.143-75.143 180.857 75.143 180.857 180.857 75.143 180.857-75.143 75.143-180.857zM950.857 950.857q0 29.714-21.714 51.429t-51.429 21.714q-30.857 0-51.429-21.714l-196-195.429q-102.286 70.857-228 70.857-81.714 0-156.286-31.714t-128.571-85.714-85.714-128.571-31.714-156.286 31.714-156.286 85.714-128.571 128.571-85.714 156.286-31.714 156.286 31.714 128.571 85.714 85.714 128.571 31.714 156.286q0 125.714-70.857 228l196 196q21.143 21.143 21.143 51.429z"></path>
	</symbol>
	<symbol id="icon-facebook" viewBox="0 0 1024 1024">
		<title>facebook</title>
		<path class="path1" d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512v-384h-128v-128h128v-96c0-88.366 71.632-160 160-160h160v128h-160c-17.674 0-32 14.328-32 32v96h176l-32 128h-144v367.87c220.828-56.838 384-257.3 384-495.87 0-282.77-229.23-512-512-512z"></path>
	</symbol>
	<symbol id="icon-linkedin" viewBox="0 0 1024 1024">
		<title>linkedin</title>
		<path class="path1" d="M512 20.48c-271.462 0-491.52 220.058-491.52 491.52s220.058 491.52 491.52 491.52 491.52-220.058 491.52-491.52-220.058-491.52-491.52-491.52zM391.68 715.725h-99.533v-320.307h99.533v320.307zM341.299 356.096c-31.437 0-51.763-22.272-51.763-49.818 0-28.109 20.941-49.715 53.043-49.715s51.763 21.606 52.378 49.715c0 27.546-20.275 49.818-53.658 49.818zM755.2 715.725h-99.533v-177.51c0-41.318-14.438-69.376-50.432-69.376-27.494 0-43.827 18.995-51.046 37.274-2.662 6.502-3.328 15.718-3.328 24.883v184.678h-99.584v-218.112c0-39.987-1.28-73.421-2.611-102.195h86.477l4.557 44.493h1.997c13.107-20.89 45.21-51.712 98.918-51.712 65.485 0 114.586 43.878 114.586 138.189v189.389z"></path>
	</symbol>
	<symbol id="icon-google-plus" viewBox="0 0 1024 1024">
		<title>google-plus</title>
		<path class="path1" d="M437.006 818.162c0 75.068-46.39 134.392-177.758 139.176-76.984-43.786-141.49-106.952-186.908-182.866 23.69-58.496 97.692-103.046 182.316-102.114 24.022 0.252 46.41 4.114 66.744 10.7 55.908 38.866 101 63.152 112.324 107.448 2.114 8.964 3.282 18.206 3.282 27.656zM512 0c-147.94 0-281.196 62.77-374.666 163.098 36.934-20.452 80.538-32.638 126.902-32.638 67.068 0 256.438 0 256.438 0l-57.304 60.14h-67.31c47.496 27.212 72.752 83.248 72.752 145.012 0 56.692-31.416 102.38-75.78 137.058-43.28 33.802-51.492 47.966-51.492 76.734 0 24.542 51.722 61.098 75.5 78.936 82.818 62.112 99.578 101.184 99.578 178.87 0 78.726-68.936 157.104-185.866 183.742 56.348 21.338 117.426 33.048 181.248 33.048 282.77 0 512-229.23 512-512s-229.23-512-512-512zM768 384v128h-64v-128h-128v-64h128v-128h64v128h128v64h-128zM365.768 339.472c11.922 90.776-27.846 149.19-96.934 147.134-69.126-2.082-134.806-65.492-146.74-156.242-11.928-90.788 34.418-160.254 103.53-158.196 69.090 2.074 128.22 76.542 140.144 167.304zM220.886 642.068c-74.68 0-138.128 25.768-182.842 63.864-24.502-59.82-38.044-125.29-38.044-193.932 0-56.766 9.256-111.368 26.312-162.396 7.374 99.442 77.352 176.192 192.97 176.192 8.514 0 16.764-0.442 24.874-1.022-7.95 15.23-13.622 32.19-13.622 49.982 0 29.97 16.488 47.070 36.868 66.894-15.402 0-30.27 0.418-46.516 0.418z"></path>
	</symbol>
	<symbol id="icon-mail" viewBox="0 0 1024 1024">
		<title>mail</title>
		<path class="path1" d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM256 256h512c9.138 0 18.004 1.962 26.144 5.662l-282.144 329.168-282.144-329.17c8.14-3.696 17.006-5.66 26.144-5.66zM192 704v-384c0-1.34 0.056-2.672 0.14-4l187.664 218.942-185.598 185.598c-1.444-5.336-2.206-10.886-2.206-16.54zM768 768h-512c-5.654 0-11.202-0.762-16.54-2.208l182.118-182.118 90.422 105.498 90.424-105.494 182.116 182.12c-5.34 1.44-10.886 2.202-16.54 2.202zM832 704c0 5.654-0.762 11.2-2.206 16.54l-185.6-185.598 187.666-218.942c0.084 1.328 0.14 2.66 0.14 4v384z"></path>
	</symbol>
	<symbol id="icon-twitter" viewBox="0 0 1024 1024">
		<title>twitter</title>
		<path class="path1" d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM766.478 381.48c0.252 5.632 0.38 11.296 0.38 16.988 0 173.51-132.070 373.588-373.584 373.588-74.15 0-143.168-21.738-201.276-58.996 10.272 1.218 20.724 1.84 31.322 1.84 61.518 0 118.134-20.992 163.072-56.21-57.458-1.054-105.948-39.020-122.658-91.184 8.018 1.532 16.244 2.36 24.704 2.36 11.976 0 23.578-1.61 34.592-4.61-60.064-12.066-105.326-65.132-105.326-128.75 0-0.554 0-1.104 0.012-1.652 17.7 9.834 37.948 15.742 59.47 16.424-35.232-23.546-58.414-63.736-58.414-109.292 0-24.064 6.476-46.62 17.78-66.010 64.76 79.44 161.51 131.712 270.634 137.19-2.238-9.612-3.4-19.632-3.4-29.924 0-72.512 58.792-131.298 131.304-131.298 37.766 0 71.892 15.944 95.842 41.462 29.908-5.886 58.008-16.814 83.38-31.862-9.804 30.662-30.624 56.394-57.732 72.644 26.56-3.174 51.866-10.232 75.412-20.674-17.594 26.328-39.854 49.454-65.514 67.966z"></path>
	</symbol>
	<symbol id="icon-pinterest" viewBox="0 0 1024 1024">
		<title>pinterest</title>
		<path class="path1" d="M512.006 0.002c-282.774 0-512.006 229.23-512.006 511.996 0 216.906 134.952 402.166 325.414 476.772-4.478-40.508-8.518-102.644 1.774-146.876 9.298-39.954 60.040-254.5 60.040-254.5s-15.32-30.664-15.32-76.008c0-71.19 41.268-124.336 92.644-124.336 43.68 0 64.784 32.794 64.784 72.12 0 43.928-27.964 109.604-42.404 170.464-12.060 50.972 25.556 92.536 75.814 92.536 91.008 0 160.958-95.96 160.958-234.466 0-122.584-88.088-208.298-213.868-208.298-145.678 0-231.186 109.274-231.186 222.19 0 44.008 16.95 91.196 38.102 116.844 4.182 5.070 4.792 9.516 3.548 14.68-3.884 16.18-12.522 50.96-14.216 58.076-2.234 9.368-7.422 11.356-17.124 6.842-63.95-29.77-103.926-123.264-103.926-198.348 0-161.51 117.348-309.834 338.294-309.834 177.61 0 315.634 126.56 315.634 295.704 0 176.458-111.256 318.466-265.676 318.466-51.886 0-100.652-26.958-117.35-58.796 0 0-25.672 97.766-31.894 121.71-11.564 44.468-42.768 100.218-63.642 134.226 47.91 14.832 98.818 22.832 151.604 22.832 282.768-0.002 511.996-229.23 511.996-512 0-282.766-229.228-511.996-511.994-511.996z"></path>
	</symbol>
	<symbol id="icon-chat" viewBox="0 0 1024 1024">
		<title>chat</title>
		<path class="path1" d="M938.24 170.667c0-47.147-37.76-85.333-84.907-85.333h-682.667c-47.147 0-85.333 38.187-85.333 85.333v512c0 47.147 38.187 85.333 85.333 85.333h597.333l170.667 170.667-0.427-768z"></path>
	</symbol>
	<symbol id="icon-play-circle-outline" viewBox="0 0 1024 1024">
		<title>play-circle-outline</title>
		<path class="path1" d="M426.667 704l256-192-256-192v384zM512 85.333c-235.733 0-426.667 190.933-426.667 426.667s190.933 426.667 426.667 426.667 426.667-190.933 426.667-426.667-190.933-426.667-426.667-426.667zM512 853.333c-188.16 0-341.333-153.173-341.333-341.333s153.173-341.333 341.333-341.333 341.333 153.173 341.333 341.333-153.173 341.333-341.333 341.333z"></path>
	</symbol>
	<symbol id="icon-angle-down" viewBox="0 0 658 1024">
		<title>angle-down</title>
		<path class="path1" d="M614.286 420.571q0 7.429-5.714 13.143l-266.286 266.286q-5.714 5.714-13.143 5.714t-13.143-5.714l-266.286-266.286q-5.714-5.714-5.714-13.143t5.714-13.143l28.571-28.571q5.714-5.714 13.143-5.714t13.143 5.714l224.571 224.571 224.571-224.571q5.714-5.714 13.143-5.714t13.143 5.714l28.571 28.571q5.714 5.714 5.714 13.143z"></path>
	</symbol>
	<symbol id="icon-angle-right" viewBox="0 0 366 1024">
		<title>angle-right</title>
		<path class="path1" d="M340 548.571q0 7.429-5.714 13.143l-266.286 266.286q-5.714 5.714-13.143 5.714t-13.143-5.714l-28.571-28.571q-5.714-5.714-5.714-13.143t5.714-13.143l224.571-224.571-224.571-224.571q-5.714-5.714-5.714-13.143t5.714-13.143l28.571-28.571q5.714-5.714 13.143-5.714t13.143 5.714l266.286 266.286q5.714 5.714 5.714 13.143z"></path>
	</symbol>
	<symbol id="icon-angle-left" viewBox="0 0 366 1024">
		<title>angle-left</title>
		<path class="path1" d="M358.286 310.857q0 7.429-5.714 13.143l-224.571 224.571 224.571 224.571q5.714 5.714 5.714 13.143t-5.714 13.143l-28.571 28.571q-5.714 5.714-13.143 5.714t-13.143-5.714l-266.286-266.286q-5.714-5.714-5.714-13.143t5.714-13.143l266.286-266.286q5.714-5.714 13.143-5.714t13.143 5.714l28.571 28.571q5.714 5.714 5.714 13.143z"></path>
	</symbol>
	<symbol id="icon-menu" viewBox="0 0 612 612">
		<title>icon-menu</title>
		<path class="path1" d="M0,95.625v38.25h612v-38.25H0z M0,325.125h612v-38.25H0V325.125z M0,516.375h612v-38.25H0V516.375z"></path>
	</symbol>
</defs>
</svg>

<div id="page" class="site">
	<div class="container-fluid">
		<a class="skip-link screen-reader-text" href="#primary">Skip to content</a>
		<header id="masthead" class="site-header" role="banner">
			<div class="inner">
				<div class="site-branding">

					<a href='#' onclick="jQuery('#bar').toggleClass('site-navigation-wrapper')"><img class="site-title"	src="/files/logo.png"></a>		
					<button style="z-index:1000" nclick="jQuery('#bar').toggleClass('site-navigation-wrapper')" class="site-mobile-toggle" aria-controls="menu-toggle" aria-expanded="false">
						<svg class="icon icon-menu" aria-labelledby="title"><title>Menu</title><use xlink:href="#icon-menu"></use></svg>
					</button></div>
		

				<div id='bar' class="site-navigation-wrapper">
											<nav id="site-navigation" class="main-navigation" role="navigation">
							<div class="menu-primary-container">
                <ul id="menu-primary" class="menu">
          <?php
menu_li('Home','/');
if ($admin->user != -1) {
menu_li('Latest Feed','/categories/Feed');
}
menu_li('Discover','/discover.php');
menu_li('Article','/categories/Article');
menu_li('Stories','/categories/Story');
menu_li('Poems','/categories/Poem');
if ($admin->user != -1) {
// menu_li($admin->user,'/dashboard/');
echo <<< EOD
<li id="menu-item-125" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-125" aria-haspopup="true"><a href="#">$admin->user</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Open Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button>
<ul class="sub-menu" aria-expanded="false">

<li id="menu-item-126" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-126"><a href="/dashboard/NewPost">New Post</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button></li>

<li id="menu-item-127" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-127"><a href="/dashboard/MyPublication">My Publications</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button></li>

<li id="menu-item-128" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-128"><a href="/dashboard/Message">Messenger</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button>
<ul class="sub-menu" aria-expanded="false">
<li id="menu-item-129" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-129"><a href="/dashboard/Message&x=sent">Sent</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button></li>
</ul>
</li>	

<li id="menu-item-129" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-129"><a href="/dashboard/Setting">Settings</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button></li>	


<li id="menu-item-130 class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-130"><a href="/logout.php">Logout</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button></li>	
</ul>
</li>

EOD;
} else {
menu_li('Login','/login.php');
}
//menu_li('About Us','/company/aboutus');
                    ?>

</ul></div>						</nav><!-- #site-navigation -->
					
					<div class="site-search">
						
<form role="search" method="get" class="search-form" action="/search.php">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search &hellip;" value="" name="input_s" title="Search for:" />
	</label>
	<svg class="icon icon-search" aria-labelledby="title"><title>Search</title><use xlink:href="#icon-search"></use></svg>
	<input type="submit" class="search-submit screen-reader-text" value="Search" />
</form>
					</div>

						<div class="site-socials">
		<h2 class="hdg hdg_6 hdg_bold hdg_upper">Connect</h2>

		<ul class="headline-socials">
								<li>
						<a class="socials social-facebook" href="https://www.facebook.com/Writre-Venture-242576203065508/" >
							<svg class="icon icon-facebook"><use xlink:href="#icon-facebook">/use></svg>
						</a>
					</li>
									<li>
						<a class="socials social-twitter" href="#" t>
							<svg class="icon icon-twitter"><use xlink:href="#icon-twitter">/use></svg>
						</a>
					</li>
									<li>
						<a class="socials social-linkedin" href="#">
							<svg class="icon icon-linkedin"><use xlink:href="#icon-linkedin">/use></svg>
						</a>
					</li>
									<li>
						<a class="socials social-google-plus" href="#">
							<svg class="icon icon-google-plus"><use xlink:href="#icon-google-plus">/use></svg>
						</a>
					</li>
									<li>
						<a class="socials social-pinterest" href="#" >
							<svg class="icon icon-pinterest"><use xlink:href="#icon-pinterest">/use></svg>
						</a>
					</li>
						</ul>
	</div>

				</div>

			</div><!-- .inner -->

		</header><!-- #masthead -->
