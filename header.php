<!DOCTYPE html>
<html <?php language_attributes();?>>
	<head>
		<title><?php bloginfo('name'); ?></title>
		<meta <?php bloginfo('charset') ?>>
		<meta name="viewport" content="width=device-width,intial-scale=1"/>

		<?php if( is_singular() && pings_open( get_quered_object() ) ) {?>
			<link rel="pingback" href="<?php bloginfo('pingback_url') ;?>"/>
		<?php } ?>
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<!-- Start The Header -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-content text-center" style="background-image: url(<?php header_image(); ?>)">
						<div class="header-desciption">
							<h1><?php bloginfo('name') ?></h1>
							<h3><?php bloginfo('discription'); ?></h3>
						</div>
						<div class="header-nav-menu">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End The Header -->

