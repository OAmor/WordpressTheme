<!--
	This Is To Generate The General Submenu
-->

<h1>Contact Form Settings </h1>

<?php settings_errors(); ?>

<form class="contact-form-options" method="POST" action="options.php">
	<?php settings_fields('CVTech-contact-set'); ?>
	<?php do_settings_sections('cvtech_contact'); ?>
	<?php submit_button(); ?>
</form>