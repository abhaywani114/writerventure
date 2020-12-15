<?php
define("URL_","http://www.serenewriters.com/");
$page_global = array(
"page_title"=>"Serene Writers",
"page_description"=>"Are you a writer? Then you must be part of Serene Writers to share your write-ups with rest of world. Please sign up here.!",
"page_image"=> URL_ ."files/social.png",
"page_keyword"=>"Sign up,Serene Writers, new user,goto dashboard"
);
include __DIR__.'/parts/head.php';
if (isset($_GET['categories'])) {
    //do this
    include __DIR__.'/cat.php';
} else {
    //do this
    include __DIR__.'/parts/homepage.php';
}
include __DIR__.'/parts/foot.php';
?>