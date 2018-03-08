<?php

	/* Custom Admin Page */

	function cvtech_admin_page(){

		add_menu_page('CVTech Edition','CVTech','manage_options','cvtech_general','CVTech_general_func','dashicons-admin-customizer',110);

		/* To Evoide The Title repition */

		add_submenu_page('cvtech_general','CVTech Edition','General','manage_options','cvtech_general','CVTech_general_func');

		add_submenu_page('cvtech_general','CVTech ThemeSupport','Theme Supports','manage_options','cvtech_themeSupport','CVTech_themeSupport_func');

		add_submenu_page('cvtech_general','CVTech Contact Form','Contact Form','manage_options','cvtech_contact','CVTech_cont_func');

		add_submenu_page('cvtech_general','CVTech Custom CSS','Custom CSS','manage_options','cvtech_custom_css','CVTech_custcss_func');

		/* add a custom settings */ 
		add_action('admin_init','CVTech_settings');

	}


	add_action('admin_menu','cvtech_admin_page');

	// Submenu Functions

	function CVTech_general_func(){
		require_once(get_template_directory().'/inc/admin-templates/general-temp.php');
	}

	function CVTech_themeSupport_func(){
		require_once(get_template_directory().'/inc/admin-templates/theme-sup-temp.php');
	}

	function CVTech_cont_func(){
		require_once(get_template_directory().'/inc/admin-templates/contact-form.php');
	}

	function CVTech_custcss_func(){
		require_once(get_template_directory().'/inc/admin-templates/custom-css-temp.php');
	}

	/* Custom Admin Page Style And Scripts */

	function intro_adminpage_style($hook){
		// to enqueue meia
		//wp_enqueue_media();

		// to add scripts tbe cond to specify just the CVTech settings
		wp_enqueue_script('my_jquery_bib_file',get_template_directory_uri().'/scripts/jquery-lib.js',array(),false,true);

		if('toplevel_page_cvtech_general' == $hook){
			wp_enqueue_style('admin-page-style',get_template_directory_uri().'/style/my-admin-style.css');
			wp_enqueue_script('admin-page-script',get_template_directory_uri().'/scripts/my-admin-scripts.js',array(),'1.0.0',true);
		}else if($hook == 'cvtech_page_cvtech_custom_css'){
			wp_enqueue_style('ace-styles',get_template_directory_uri().'/style/ace_css_edit.css');
			wp_enqueue_script('ace-scripts',get_template_directory_uri().'/scripts/ace-editor/ace.js',array(),'1.2.0',true);
			wp_enqueue_script('cvtech-ace-script',get_template_directory_uri().'/scripts/custom_css_edit.js',array(),false,true);
		}else{
			return ;
		}

		
	}

	add_action('admin_enqueue_scripts','intro_adminpage_style');

	/* Create A Custom Settings */

	function CVTech_settings(){
		// To add a type of settings
		add_settings_section('sidebar-set','Sidebar Settings','sidebar_set','cvtech_general');
		add_settings_section('themeSupport-set','Posts Settings','themeSupport_set','cvtech_themeSupport');
		add_settings_section('contactform-set','Contact Form Settings','contact_set','cvtech_contact');
		add_settings_section('customcss-set','Custom Css','custom_css_set','cvtech_custom_css');
		/* ------------- */

		// To Register A Setting Parm In The General Submenu
		register_setting('CVTech-settings','profile_pic');
		register_setting('CVTech-settings','nom');
		register_setting('CVTech-settings','prenom');
		register_setting('CVTech-settings','description');
		register_setting('CVTech-settings','twitter','twitter_test');
		register_setting('CVTech-settings','facebook');
		register_setting('CVTech-settings','gp');
		// To Register A Setting Parm In The Post Submenu
		register_setting('CVTech-themeSupport-set','post_format');
		register_setting('CVTech-themeSupport-set','custom_header');
		register_setting('CVTech-themeSupport-set','custom_background');
		// To Register A Setting Parm In The Contact Form Submenu
		register_setting('CVTech-contact-set','activate_contact');
		// To Register A Setting Parm In The Custom Css Submenu
		register_setting('Custom-Css-set','custom_css');

		/* --------------*/

		// To Add A Field To The Setting Registred In The General Submenu
		add_settings_field('sidebar-profile-pic','Profile Picture','profile_pic_set','cvtech_general','sidebar-set');
		add_settings_field('sidebar-name','Sidebar Name','sidebar_name','cvtech_general','sidebar-set');
		add_settings_field('sidebar-desc','Sidebar Description','sidebar_desc','cvtech_general','sidebar-set');
		add_settings_field('sidebar-fb','Facebook','sidebar_fb','cvtech_general','sidebar-set');
		add_settings_field('sidebar-tw','Twitter','sidebar_tw','cvtech_general','sidebar-set');
		add_settings_field('sidebar-gp','Google+','sidebar_gp','cvtech_general','sidebar-set');
		// To Add A Field To The Setting Registred In The Post Submenu
		add_settings_field('post-fromat','Posts Foramats','post_format','cvtech_themeSupport','themeSupport-set');
		add_settings_field('custom-header','Custom Header','custom_head_func','cvtech_themeSupport','themeSupport-set');
		add_settings_field('custom-background','Custom Background','custom_bg_func','cvtech_themeSupport','themeSupport-set');
		// To Add A Field To The Setting Registred In Contact Form Submenu
		add_settings_field('activate-contact','Contact Form','activate_form_func','cvtech_contact','contactform-set');
		// To Add A Field To The Setting Registred In Custom Css Submenu
		add_settings_field('Custom-Css-set','Custom Css','custom_css_func','cvtech_custom_css','customcss-set');
	}

	// Section Functions 

	function sidebar_set(){
		// section settings
	}
	function themeSupport_set(){
		// section sett
	}
	function contact_set(){
		// section sett		
	}
	function custom_css_set(){
		// section settings
	}

	// Create the generate settings functions

	/* Sidebar Fileds Functtions */
	function profile_pic_set(){
		$pic_url = get_option('profile_pic');

		echo "<input type='hidden' value='".$pic_url."' name='profile_pic' id='profile_pic_url'>";
		echo "<input type='button' value='Update The Picture' id='profile_pic_btn' class='button button-secondary'>";
	}

	function sidebar_desc(){
		$desc = get_option('description');
		echo "<input type='text' name='description' value='".$desc."'placeholder='La Description Ici'/>";		
	}

	function sidebar_name(){
		$nom = get_option('nom');
		$prenom = get_option('prenom');
		echo "<input type='text' name='nom' value='".$nom."'placeholder='Le Nom Ici'/>";
		echo "<input type='text' name='prenom' value='".$prenom."'placeholder='Le Prenom Ici'/>";
	}
	function sidebar_fb(){
		$fb = get_option('facebook');
		echo "<input type='text' name='facebook' value='".$fb."'placeholder='Le FB Ici'/>";
		echo "<p class='description' >Il faut que tu met le URL svp</p>";
	}
	function sidebar_tw(){
		$tw = get_option('twitter');
		echo "<input type='text' name='twitter' value='".$tw."'placeholder='Le Twitter Ici'/>";
	}
	function sidebar_gp(){
		$gp = get_option('gp');
		echo "<input type='text' name='gp' value='".$gp."'placeholder='Le Google+ Ici'/>";
	}

	/* Theme Support Fields Functions */ 
	function post_format(){
		$result = get_option('post_format');

		$format = array('video','aside','image','chat','gallery','link','status','audio','quote');
		$i = 1;
		foreach ($format as $val ) {
			$checked = ($result[$i] == "") ? "" : "checked";
			echo "<label> <input type='checkbox' id='".$val."'  name='post_format[".$i."]' value='".$val."' ".$checked.">".$val."</label><br>";
			$i++;
		}
	}

	function custom_head_func(){
		$option = get_option('custom_header');
		
		echo "<label><input type='checkbox' name='custom_header' value='checked' ".$option."> Activate </label> "; 
	}

	function custom_bg_func(){
		$option = get_option('custom_background');
		
		echo "<label><input type='checkbox' name='custom_background' value='checked' ".$option."> Activate </label> "; 
	}
	/* Contact Form Functions */
	function activate_form_func(){
		$option = get_option('activate_contact');
		
		echo "<label><input type='checkbox' name='activate_contact' value='checked' ".$option."> Activate </label> "; 
	}

	/* Custom Css Function */

	function custom_css_func(){
		echo "<div id='customCss'> /** c'est un comment **/</div>";
	}

	// Tests Part
	function twitter_test( $input ){
		$output = sanitize_text_field($input);
		return $output;
	}



	