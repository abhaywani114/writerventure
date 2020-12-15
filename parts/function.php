<?php
function menu_li($name, $link)
{
    echo <<< EOD
<li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-85"><a href="$link">$name</a><button class="dropdown-toggle" aria-expanded="false"><svg class="icon icon-angle-down" area-labelledby="title"><title>Sub Menu</title><use xlink:href="#icon-angle-down"></use></svg></button></li>
EOD;
}

function post_li($title, $link, $image, $desp, $date, $authour, $tag, $type, $write_up_type=null)
{
      
    $tag = explode(",",$tag);
    $tag_ = null;
  foreach ($tag as $k) {
    if ($k != '') {
   $tag_ .=  " <a href='/tag/$k' rel='category tag'>$k</a>";
  }
  }
    if ($type == 'one') {   
    $num = rand();

$return = <<< EOD
<li class="grid-item col-xs-12 col-sm-12 col-lg-8">

			<div class="grid-item-featured">
			<a href="$link">
				<img width="768" height="473" src="$image" class="attachment-attache-post-large size-attache-post-large wp-post-image" alt=""  />			</a>
		</div>
	   <article id="post-$num" class="grid-item-article post-$num post type-post status-publish format-image has-post-thumbnail sticky hentry category-nature post_format-post-format-image">
		<header class="entry-grid-header"><h2 class="hdg hdg_2 hdg_title"><a href="$link" rel="bookmark">$title</a></h2></header>
        <div class="entry-grid-author">
	<div class="entry-grid-author-wrap">
		<span class="byline">$write_up_type Posted by <span class="author vcard"><a class="url fn n" href="/author/$authour">$authour</a></span></span> <span class="posted-on">on <time class="entry-date published" datetime="2015-06-15T19:46:24+00:00">$date</time></span>	</div><!-- .entry-trid-author-wrap -->
</div><!-- .entry-grid-author -->

		<div class="entry-content entry-grid-content">
			<p class="excerpt">$desp</p>		</div><!-- .entry-content -->

		<div class="entry-grid-meta">
				<div class="entry-cats-list">$tag_</div>
							
					</div>
	</article>
</li>

EOD;
    } else
        if ($type == 'two') {
            $num = rand();
            $exp = explode("/",$link);
            if ($exp[1] != 'read') {
                $link = "/read/$link";
            }
         //   var_dump($exp);
$return = <<< EOD
<li class="grid-item  col-xs-12 col-sm-6 col-lg-4">

			<div class="grid-item-featured">
			<a href="$link" >
				<img width="420" height="258" src="$image" class="attachment-attache-post-medium size-attache-post-medium wp-post-image" alt=""/>			</a>
		</div>
	
	<article id="post-$num" class="grid-item-article post-$num post type-post status-publish format-image has-post-thumbnail hentry category-journal post_format-post-format-image">
		<header class="entry-grid-header"><h3 class="hdg hdg_3 hdg_title"><a href="$link" rel="bookmark">$title</a></h3></header>
<div class="entry-grid-author">
	<div class="entry-grid-author-wrap">
		<span class="byline">$write_up_type Posted by <span class="author vcard"><time class="entry-date published" >$date</time></span>	</div><!-- .entry-trid-author-wrap -->
</div><!-- .entry-grid-author -->
		<div class="entry-content entry-grid-content">
			<p class="excerpt">$desp</p>		
            </div><!-- .entry-content -->
		<div class="entry-grid-meta">
			<div class="entry-grid-meta-cats">
					<div class="entry-cats-list">$tag_</div>
					</div>
	</article><!-- #post-## -->
</li>

EOD;
        } else
            if ($type == 'three') {
                global $status;
                if ($status > 1) {
                    $status = "<span style='color:red'>Reported level $status</span>";
                } else {
                    $status = null;
                }
                $desp = databack($desp);
$return =  <<< EOD
<li class="grid-item col-xs-12 col-sm-6 col-lg-4">

			<div class="grid-item-featured">
			<a href="/safeview.php?url=$link">
				<img width="420" height="258" src="$image" class="attachment-attache-post-medium size-attache-post-medium wp-post-image" alt=""/>			</a>
		</div>
	
	<article id="post-168" class="grid-item-article post-168 post type-post status-publish format-image has-post-thumbnail hentry category-journal post_format-post-format-image">
		<header class="entry-grid-header"><h4 class="hdg hdg_3 hdg_title"><a href="/safeview.php?url=$link" rel="bookmark">$title</a></h4></header>
<div class="entry-grid-author">
	<div class="entry-grid-author-wrap">
		<span class="byline">$write_up_type Posted by <span class="author vcard"><a class="url fn n" href="/author/$authour">$authour</a></span></span> <span class="posted-on">on<time class="entry-date published" >$date</time></span>	</div><!-- .entry-trid-author-wrap -->
</div><!-- .entry-grid-author -->
		<div class="entry-content entry-grid-content">
			<p class="excerpt">$desp</p>
            $status		
            </div><!-- .entry-content -->
		<div class="entry-grid-meta">
			<div class="entry-grid-meta-cats">
				<a href="#" onclick="del('$link')" rel="delete">Delete</a> | <a href="/dashboard/Edit&post_url=$link" rel="Edit">Edit</a></div>
					</div>
	</article><!-- #post-## -->
</li>
<script>function del(url) {
    var con;con=confirm("Do you want to delete?");if(con==true) {window.location="/dashboard/del&url="+url};
}</script>
EOD;
            } else
            if ($type == 'four') {
$return =  <<< EOD
<li class="grid-item col-xs-12 col-sm-6 col-lg-4">

			<div class="grid-item-featured">
			<a href="$link">
				<img width="420" height="258" src="$image" class="attachment-attache-post-medium size-attache-post-medium wp-post-image" alt=""/>			</a>
		</div>
	
	<article id="post-168" class="grid-item-article post-168 post type-post status-publish format-image has-post-thumbnail hentry category-journal post_format-post-format-image">
		<header class="entry-grid-header"><h4 class="hdg hdg_3 hdg_title"><a href="$link" rel="bookmark">$title</a></h4></header>
<div class="entry-grid-author">
	<div class="entry-grid-author-wrap">
</div><!-- .entry-grid-author -->
		<div class="entry-content entry-grid-content" style='padding-bottom:0 !important;'>
			<p class="excerpt"><br/>$desp</p>		
            </div><!-- .entry-content -->
					</div>
	</article><!-- #post-## -->
</li>

EOD;
}
return $return;
}
function form_ul($name, $label, $type, $val = null, $id = null)
{
    if ($type == 'text' or $type == 'password') {
        echo <<< EOD
                <li  class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_$name$id">$label</label>
                    <div class="ginput_container ginput_container_text">
                <input name="input_$name$id" id="input_$name$id" type="$type" value="$val" class="medium" tabindex="10">
                        </div></li>
EOD;
    } else
        if ($type == 'option') {
            $val_new = null;
            if ($val != null) {
                foreach ($val as $k) {
                    $val_new .= "<option value='$k'>$k</option>";
                }
            }
            echo <<< EOD
<li  class="gfield field_sublabel_below field_description_below">
<label class="gfield_label" for="input_$name$id">$label</label>
<div class="ginput_container ginput_container_text">
    <select name="input_$name$id"  class="select medium" style='padding:8px;' id="input_$name$id" tabindex="9" required>
    <option value=''>Select $label</option>
   $val_new
    </select></div></li><br/>
EOD;
        } else 
            if ($type == 'file') {
echo <<<EOD
<li  class="gfield field_sublabel_below field_description_below">
<label class="gfield_label" for="input_$name$id">$label</label>
<div class="ginput_container ginput_container_text">
    <input name="input_$name$id" id="input_$name$id" type="file" class="medium" >
</div></li><br/>
EOD;
            }else
            if ($type == 'cat') {
                $val_new = null;
                if ($val != null) {
                    foreach ($val as $k) {
                        $val_new .= "<li><input type='checkbox' value='$k' />$k</li><li>";
                    }
                }
                $id_ = $id;
                $id = null;
                echo <<< EOD
<li  class="gfield field_sublabel_below field_description_below">
<label id='Linput_$name$id' class="gfield_label" for="input_$name$id">$label</label>
<div class="ginput_container ginput_container_text">
<dl class="dropdown$name$id"> 
  
    <dt id='input_$name$id'>
   
      <input id='hida$name$id' class="hida$name$id" type='text' name='input_$name$id' value='$id_' placeholder='Click me to revele' autocomplete="off" />    
      <p class="multiSel"></p>  
   
    </dt>
  
    <dd>
        <div class="mutliSelect$name$id">
            <ul style='display:none'>
               $val_new
            </ul>
        </div>
    </dd>
</dl></div></li><br/>
<script>
jQuery("#hida$name$id").on('click', function() {
  jQuery(".dropdown$name$id dd ul").slideToggle('fast');
});

jQuery(".dropdown dd ul li input").on('click', function() {
  jQuery(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return jQuery("#" + id).find("dt a span.value").html();
}

jQuery(document).bind('click', function(e) {
  var jQueryclicked = jQuery(e.target);
  if (!jQueryclicked.parents().hasClass("dropdown$name$id")) jQuery(".dropdown$name$id dd ul").hide();
});

jQuery('.mutliSelect$name$id input[type="checkbox"]').on('click', function() {

  var title = jQuery(this).closest('.mutliSelect$name$id').find('input[type="checkbox"]').val(),
    title = jQuery(this).val() + ",";

  if (jQuery(this).is(':checked')) {
   jQuery('#hida$name$id').val(jQuery('#hida$name$id').val()+ title)
  } else {
    //jQuery('span[title="' + title + '"]').remove();
     jQuery('#hida$name$id').val(jQuery('#hida$name$id').val().replace(title,''));

  }
});
</script>
EOD;
            } else
                if ($type == 'textarea') {
                    echo <<< EOD
<li  class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_$name$id">$label</label>
                    <div class="ginput_container ginput_container_text">
<textarea name="input_$name$id" id="input_$name$id" class="textarea medium" tabindex="12" aria-invalid="false" rows="10" cols="50" data-gramm="true" data-txt_gramm_id="1bbbd82f-26a3-743d-361b-6b216c4b663d" data-gramm_id="1bbbd82f-26a3-743d-361b-6b216c4b663d" spellcheck="false" data-gramm_editor="true" style="z-index: auto; position: relative; line-height: normal; font-size: 13.3333px; transition: none; background: transparent !important;" required>
EOD;
echo $val;
echo '</textarea></div></li>';
                }
}
$country_opt = array(
    "Afghanistan",
    "Albania",
    "Algeria",
    "American Samoa",
    "Andorra",
    "Angola",
    "Anguilla",
    "Antarctica",
    "Antigua and Barbuda",
    "Argentina",
    "Armenia",
    "Aruba",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bermuda",
    "Bhutan",
    "Bolivia",
    "Bosnia and Herzegowina",
    "Botswana",
    "Bouvet Island",
    "Brazil",
    "British Indian Ocean Territory",
    "Brunei Darussalam",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Cape Verde",
    "Cayman Islands",
    "Central African Republic",
    "Chad",
    "Chile",
    "China",
    "Christmas Island",
    "Cocos (Keeling) Islands",
    "Colombia",
    "Comoros",
    "Congo",
    "Congo, the Democratic Republic of the",
    "Cook Islands",
    "Costa Rica",
    "Cote d'Ivoire",
    "Croatia (Hrvatska)",
    "Cuba",
    "Cyprus",
    "Czech Republic",
    "Denmark",
    "Djibouti",
    "Dominica",
    "Dominican Republic",
    "East Timor",
    "Ecuador",
    "Egypt",
    "El Salvador",
    "Equatorial Guinea",
    "Eritrea",
    "Estonia",
    "Ethiopia",
    "Falkland Islands (Malvinas)",
    "Faroe Islands",
    "Fiji",
    "Finland",
    "France",
    "France Metropolitan",
    "French Guiana",
    "French Polynesia",
    "French Southern Territories",
    "Gabon",
    "Gambia",
    "Georgia",
    "Germany",
    "Ghana",
    "Gibraltar",
    "Greece",
    "Greenland",
    "Grenada",
    "Guadeloupe",
    "Guam",
    "Guatemala",
    "Guinea",
    "Guinea-Bissau",
    "Guyana",
    "Haiti",
    "Heard and Mc Donald Islands",
    "Holy See (Vatican City State)",
    "Honduras",
    "Hong Kong",
    "Hungary",
    "Iceland",
    "India",
    "Indonesia",
    "Iran (Islamic Republic of)",
    "Iraq",
    "Ireland",
    "Israel",
    "Italy",
    "Jamaica",
    "Japan",
    "Jordan",
    "Kazakhstan",
    "Kenya",
    "Kiribati",
    "Korea, Democratic People's Republic of",
    "Korea, Republic of",
    "Kuwait",
    "Kyrgyzstan",
    "Lao, People's Democratic Republic",
    "Latvia",
    "Lebanon",
    "Lesotho",
    "Liberia",
    "Libyan Arab Jamahiriya",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Macau",
    "Macedonia, The Former Yugoslav Republic of",
    "Madagascar",
    "Malawi",
    "Malaysia",
    "Maldives",
    "Mali",
    "Malta",
    "Marshall Islands",
    "Martinique",
    "Mauritania",
    "Mauritius",
    "Mayotte",
    "Mexico",
    "Micronesia, Federated States of",
    "Moldova, Republic of",
    "Monaco",
    "Mongolia",
    "Montserrat",
    "Morocco",
    "Mozambique",
    "Myanmar",
    "Namibia",
    "Nauru",
    "Nepal",
    "Netherlands",
    "Netherlands Antilles",
    "New Caledonia",
    "New Zealand",
    "Nicaragua",
    "Niger",
    "Nigeria",
    "Niue",
    "Norfolk Island",
    "Northern Mariana Islands",
    "Norway",
    "Oman",
    "Pakistan",
    "Palau",
    "Panama",
    "Papua New Guinea",
    "Paraguay",
    "Peru",
    "Philippines",
    "Pitcairn",
    "Poland",
    "Portugal",
    "Puerto Rico",
    "Qatar",
    "Reunion",
    "Romania",
    "Russian Federation",
    "Rwanda",
    "Saint Kitts and Nevis",
    "Saint Lucia",
    "Saint Vincent and the Grenadines",
    "Samoa",
    "San Marino",
    "Sao Tome and Principe",
    "Saudi Arabia",
    "Senegal",
    "Seychelles",
    "Sierra Leone",
    "Singapore",
    "Slovakia (Slovak Republic)",
    "Slovenia",
    "Solomon Islands",
    "Somalia",
    "South Africa",
    "South Georgia and the South Sandwich Islands",
    "Spain",
    "Sri Lanka",
    "St. Helena",
    "St. Pierre and Miquelon",
    "Sudan",
    "Suriname",
    "Svalbard and Jan Mayen Islands",
    "Swaziland",
    "Sweden",
    "Switzerland",
    "Syrian Arab Republic",
    "Taiwan, Province of China",
    "Tajikistan",
    "Tanzania, United Republic of",
    "Thailand",
    "Togo",
    "Tokelau",
    "Tonga",
    "Trinidad and Tobago",
    "Tunisia",
    "Turkey",
    "Turkmenistan",
    "Turks and Caicos Islands",
    "Tuvalu",
    "Uganda",
    "Ukraine",
    "United Arab Emirates",
    "United Kingdom",
    "United States",
    "United States Minor Outlying Islands",
    "Uruguay",
    "Uzbekistan",
    "Vanuatu",
    "Venezuela",
    "Vietnam",
    "Virgin Islands (British)",
    "Virgin Islands (U.S.)",
    "Wallis and Futuna Islands",
    "Western Sahara",
    "Yemen",
    "Yugoslavia",
    "Zambia",
    "Zimbabwe");

/*/$user_option = <<< EOD
<style>
    .btnx {
        margin: 5px 4px;
        display: inline-block;
    }
</style>
<div><a href='/dashboard/NewPost'><button class="btn btnx">New</button></a>|
<a href='/dashboard/MyPublication'<button class="btn btnx">My Publication</button></a>|
<a href='/dashboard/Message'<button class="btn btnx">Messenger</button></a>|
<a href='/dashboard/Setting'><button class="btn btnx">Settings</button></a>|
<button class="btn btnx">Logout</button></div>
EOD;/*/
$user_option = null;
function msg_body($text_from, $text_body, $sent)
{
    $from = explode(',',$text_from);
    $text_from = $from[0];
    $handle = $from[1];
    echo <<< EOD
<div class="row w3-margin-bottom">
    <div class="col-12 zero" style="padding: 10px;margin:auto!important">
        <h4><b style='color: blue;'><a href='/author/$handle'>$text_from</a></b></h4> 
        <p class='body_text'>$text_body</p>
        <span class='chat_base'>Sent: $sent</span>   
    </div>
</div>
EOD;
}
function msg_list($name, $h,$image)
{
    echo <<< EOD
     <div class="col-sm-12 col-lg-3 col-md-3">
  <div class="entry-meta-author">
   <a href='/dashboard/Message_Open&u=$h'>   <img alt="" src="$image" class="avatar avatar-84 photo" height="84" width="84"><p class="sahil">$name</p></a></div></div>
EOD;
}
$text_area = <<<EOD
<script>
var  $ = jQuery;
</script>
<script type="text/javascript" src="/textarea/jquery.min.js"></script>
<script type="text/javascript" src="/textarea/mobilecheck.js"></script>
<script type="text/javascript" src="/textarea/module.js"></script>
<script type="text/javascript" src="/textarea/uploader.js"></script>
<script type="text/javascript" src="/textarea/hotkeys.js"></script>
<script type="text/javascript" src="/textarea/simditor.js"></script>
<link rel="stylesheet" href="/textarea/simditor.css" />

EOD;
$cat_list = array("General","Science","Politics","Technology","Kashmir","Sufism","Mystism","Love","Pain","Drama","Friction","Biography","Travel");
?>