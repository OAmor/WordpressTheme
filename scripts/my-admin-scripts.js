
$(document).ready(function(){
	'use strict';

	var mediaUploader;

	$('#profile_pic_btn').click(function(e){
		
		//e.preventDefault();

		// if the media exist befor it will be opened directly else it will be created first
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		// To Create The WP Media Object

		//mediaUploader = wp.media.frames.file_frame = wp.media({
		mediaUploader= wp.media({	
			title: 'Chose A Profile Picture',
			button: {
				text: 'Chose'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			// get the img value
			var profileImg = mediaUploader.state().get('selection').first().toJSON();
			// put the img url in the hidden input
			$('#profile_pic_url').val(profileImg.url);
			// to change automaticly when chosing the image
			$('.sidebar-preview .img-container img').attr('src',profileImg.url);
		});

		mediaUploader.open();
	});

});