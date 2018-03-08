<!--
	This Is To Generate The General Submenu
-->

<h1>Bienvenu Dans Mon Admin Panel Posts :) </h1>

<?php settings_errors(); ?>

<form class="theme-support-options" method="POST" action="options.php">
	<?php settings_fields('CVTech-themeSupport-set'); ?>
	<?php do_settings_sections('cvtech_themeSupport'); ?>
	<?php submit_button(); ?>
</form>