<!--
	This Is To Generate The General Submenu
-->

<?php
	$FullName = get_option('nom').' '.get_option('prenom');
	$description = get_option('description');
	$picture = get_option('profile_pic');
?>

<h1> Bienvenu Dans Le General De MyTheme </h1>
<?php settings_errors(); ?>


<form class="sidebar-options" method="POST" action="options.php">
	<?php settings_fields('CVTech-settings'); ?>
	<?php do_settings_sections('cvtech_general') ?>
	<?php submit_button(); ?>
</form>

<div class="sidebar-preview">
	<div class="img-container">
		<img src=" <?php echo $picture; ?> "/>
	</div>
	
	<h1 class="user-name"><?php echo $FullName; ?></h1>
	<h2 class="user-descreption"><?php echo $description; ?></h2>
	<div class="social-container">
	</div>
</div>

