/<?php

/* 
	To Add The Them Support
*/

// Post Format
$result_formats = get_option('post_format');
$custom_header = get_option('custom_header');
$custom_bg = get_option('custom_background');

foreach ($result_formats as $res) {
	$formats[] = ($res == '') ? '' : $res;
	add_theme_support('post-formats',$formats);
}

if(!empty($custom_header)){
	add_theme_support('custom-header');
}

if(!empty($custom_bg)){
	add_theme_support('custom-background');
}
