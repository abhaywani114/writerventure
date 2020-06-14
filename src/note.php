<?php
include __DIR__.'/parts/service.php';
$page_global = array(
"page_title"=>"Update - Writer Venture",
"page_description"=>"This page deals with internal errors! <nofllow>",
"page_image"=> URL ."files/logo.png",
"page_keyword"=>"Error Occured"
);
if (isset($_REQUEST['msg'])) {
    $msg  = $_REQUEST['msg'];
    if ($msg == 'ac_creation') {
        $color = 'black';
        $msg_1 = "Account Created Successfully";
        $msg_2 = "Please login now to continue.";
    } else if ($msg == 'session_exp') {
         $color = 'red';
        $msg_1 = "Session Expired/Invalid";
        $msg_2 = "Please login now to continue.";
    } else if ($msg == 'pub') {
        $color = "Green";
        $msg_1 = "Published Successfully";
        $msg_2 = "Congratulations your write up had been published on Writer Venture. All the best!";  
    } else if ($msg == 'article_not_found') {
        $color = "Red";
        $msg_1 = "Write-up Not Found";
        $msg_2 = "Write-up had been deleted or reported or your url is invalid! Please check again;";  
    } else if ($msg == 'update') {
        $color = "Green";
        $msg_1 = "Updated Successfully";
        $msg_2 = "Write-up had been updated!";  
    } else if ($msg == 'del_true') {
        $color = "Green";
        $msg_1 = "Deleted Successfully";
        $msg_2 = "Write-up had been deleted!";  
    } else if ($msg == 'del_false') {
        $color = "Red";
        $msg_1 = "Error while deleting write-up";
        $msg_2 = "Please check if you have authorization to delete the article.";  
    } else if ($msg == 'update_user') {
        $color = "Green";
        $msg_1 = "Updated Successfully";
        $msg_2 = "User's info had been updated successfully";  
    } else if ($msg == 'author_not_found') {
        $color = "Red";
        $msg_1 = "Author Not Found";
        $msg_2 = "Author had been deleted or your url is invalid! Please check again;";  
    } else if ($msg == 'invalid_input') {
        $color = "Red";
        $msg_1 = "Invalid Input";
        $msg_2 = "You have tried to enter an invalid input.";  
    } else if ($msg == 'report_done') {
        $color = "Green";
        $msg_1 = "Reported Successfully";
        $msg_2 = "We have recieved your report. We will soon process and get back to you.";  
    } else if ($msg == 'report_er') {
        $color = "red";
        $msg_1 = "Error occurred";
        $msg_2 = "Some error occurred while reporting.";  
    } else if ($msg == 'mail_sent_pwd') {
        $color = "Green";
        $msg_1 = "Verification mail Sent";
        $msg_2 = "We have sent an email to you. Please verify to reset your password.";  
    } else if ($msg == 'done_rest') {
        $color = "Green";
        $msg_1 = "Password Reset";
        $msg_2 = "Your password had been reseted.";  
    } else if ($msg == 'done_rest_err') {
        $color = "red";
        $msg_1 = "Error occurred";
        $msg_2 = "Some error occurred while reseting your password. Your link maybe broken or your password len is < 6. ";  
    } else {
         $color = "red";
        $msg_1 = "Error occurred";
        $msg_2 = "Some error occurred while processing.";  
    }
} else {
    header("Location: /");
}
include __DIR__.'/parts/head.php';
?>
<style>
@media screen and (min-width:770px) {
.margin_ph {
    margin: 30vh 0 25vh 0 !important;
}
}
</style>
<div class="row margin_ph" >
<div class='col-md-2'></div>

<div id="primary" class="col-sm-12 col-md-8 content-area" style="margin:auto">
<main id="main" c/lass="site-main " role="main">
        <article id="post-99" class="post-99 page type-page status-publish hentry">
	<header class="entry-header col-sm-12" style="padding: 5vh 0 0;">
        <h1 class="hdg hdg_1 hdg_title" ><?php echo $msg_1;?></h1>
            </header>
        
<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                <h3 class="hdg_3" style="color: <?php echo $color;?> !important;"><?php echo $msg_2;?></h3>
            </ul>
            <br/>
    </article>
    </main></div></div>
<?php
include __DIR__.'/parts/foot.php';
?>