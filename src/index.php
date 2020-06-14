<?php
define("URL_","http://www.writerventure.com/");
$page_global = array(
"page_title"=>"Writer Venture",
"page_description"=>"Are you a writer? Then you must be part of Writer Venture to share your write-ups with rest of world. Please sign up here.!",
"page_image"=> URL_ ."files/social.png",
"page_keyword"=>"Sign up,writer venture, new user,goto dashboard"
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