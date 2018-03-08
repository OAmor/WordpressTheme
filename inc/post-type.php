<?php
// To Add A Post Type

$activate_contact = get_option('activate_contact');

if ($activate_contact == 'checked' ){
	add_action('init','cvtech_add_contact_post_type');
	// to specify the message table columns
	add_filter('manage_contact_posts_columns','manage_post_columns_func');
	// to edit each columns 
	add_action('manage_contact_posts_custom_column','manage_custom_columns_func',10,2);
	// to add a meta box
	add_action('add_meta_boxes','contact_email_meta_box_func');
	// to update the meta box content
	add_action('save_post','save_email_data');
}


/**/


function cvtech_add_contact_post_type(){
	$labels = array(
		'name'			=> 'Messages',
		'singular_name' => 'Message',
		'menu_name'		=> 'Messages',
		'add_new'		=> 'Add Message',
		'all_items'     => 'All Messages',
		'menu_admin_bar'=> 'Messages'
	);

	$args = array(
		'labels' 			=> $labels,
		'capability_type'	=> 'post',
		'show_ui' 			=> true,
		'show_in_menu'		=> true,
		'menu_position'		=>	26,
		'hierarchical'		=> false,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array('title','author','editor')
	);

	register_post_type('contact',$args);
}

function manage_post_columns_func($columns){

	$newColumns =array();
	// to specify the columns
	$newColumns['title'] ='Full Name';
	$newColumns['message'] ='Message';
	$newColumns['email'] ='Email';
	$newColumns['date'] ='Date';
	// return the new columns to the filter
	return $newColumns;
}

function manage_custom_columns_func($columns , $id){
	switch ($columns) {
		case 'message':
			echo get_the_excerpt();
			break;
		
		case 'email':
			$the_email = get_post_meta($id,'_contact_emil_key',true);
			echo $the_email;
			break;

		default:
			//..
			break;
	}
}

/* Add A Meta Box */
function contact_email_meta_box_func(){
	add_meta_box('email_meta_box','User Email','edit_email_meta_box_calback','contact','side');
}

function edit_email_meta_box_calback($post){
	// to collect the information from the meta box
	wp_nonce_field('save_email_data','email_metabox_nonce');
	$val = get_post_meta($post->ID,'_contact_emil_key',true);

	// to genere the meta box
	echo "<label for='email_field'>Email : </label>";
	echo "<input type='text' id='email_field_metabox' name='email_field_metabox' size='25' value='".$val."'/>";
}

// function to save email data

function save_email_data($post_id){
	// for security 
	if( ! isset($_POST['email_metabox_nonce']) && ! isset($_POST['email_field_metabox']) && ! current_user_can('edit_post',$post_id) ){
		return;
	}
	// to collect the data form the input text
	$the_email = sanitize_text_field($_POST['email_field_metabox']);
	update_post_meta($post_id,'_contact_emil_key',$the_email);
}