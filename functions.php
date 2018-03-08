<?php

	require get_template_directory().'/inc/function-admin.php';
	require get_template_directory().'/inc/function-admin-addthemsup.php';
	require get_template_directory().'/inc/post-type.php';
	
	/* Introduire De CSS Style */

	function itro_styles(){
		wp_enqueue_style('my_fonts_styles',get_template_directory_uri().'/style/bootstrap.min.css');
		wp_enqueue_style('my_css_styles',get_template_directory_uri().'/style/my-style.css');
		wp_enqueue_style('my_fonts_styles',get_template_directory_uri().'/style/font-awesome.min.css');
	}

	add_action('wp_enqueue_scripts','itro_styles');

	/* Intrduire De JavaScripts */

	function intro_js(){
		wp_enqueue_script('my_jquery_bib_file',get_template_directory_uri().'/scripts/jquery-lib.js',array(),false,true);
		wp_enqueue_script('my_js_file',get_template_directory_uri().'/scripts/my-scripts.js',array(),false,true);
		wp_enqueue_script('my_js_file',get_template_directory_uri().'/scripts/bootstrap.min.js',array(),false,true);
	}
	add_action('wp_enqueue_scripts','intro_js');

	