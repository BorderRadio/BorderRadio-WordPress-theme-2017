<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2015, 2016 Valerio Bozzolan
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

wp_enqueue_script('jquery');

// Registered in functions.php
wp_enqueue_script('materialize');
wp_enqueue_style('materialize');
wp_enqueue_style('materialize-patch');

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<title><?php wp_title() ?></title>

	<link rel="shortcut icon" type="image/x-icon" href="http://www.border-radio.it/wp-content/themes/BorderRadio/favicon.ico" />

	<!-- Stylesheets
	<link rel="stylesheet" href="http://www.border-radio.it/wp-content/themes/BorderRadio/style.css" type="text/css" media="screen" />
	<link href="http://www.border-radio.it/airtime-widgets/css/airtime-widgets.css" rel="stylesheet" type="text/css" />
	-->

	<!-- RSS, Atom & Pingbacks -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name') ?> RSS Feed" href="<?php bloginfo('rss2_url') ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url') ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url') ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

	<!-- start wp_head() -->
	<?php wp_head() ?>
	<!-- end wp_head() -->

	<!-- Template Contact -->
	<?php if( is_page_template('template-contact.php') ) { ?>
		<script src="<?php bloginfo('template_url'); ?>/js/validate.min.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/init.js" type="text/javascript"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/gmap3.js" type="text/javascript"></script>
		<style>
			  .gmap3{
				margin: 20px auto;
				border: 1px dashed #C8C8C8;
				width: 440px;
				height: 440px;
			  }
	        </style>

		<script type="text/javascript">
		  $(function(){

			$('#test1').gmap3(
			  { action: 'addMarker',
				address: "Via Fratelli Emilio e Francesco Faà Di Bruno, 2, Torino",
				map:{
				  center: true,
				  zoom: 14,
				  mapTypeId: google.maps.MapTypeId.TERRAIN
				}
			  }
			  );
		  });
		</script>
	<?php } ?>

    <script type="text/javascript">
	<!--

		var stile = "top=10, left=10, width=530, height=500, status=no, menubar=no, toolbar=no scrollbars=no";

		function Popup(apri) 
		{
  			window.open(apri, "", stile);
		}
	//-->
	</script>

	<!-- Widget ON AIR -->
	<script src="http://www.border-radio.it/airtime-widgets/js/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>
	<script src="http://www.border-radio.it/airtime-widgets/js/jquery.showinfo.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
    		$("#headerLiveHolder").airtimeLiveInfo({
        		sourceDomain: "http://www.border-radio.it",
        		text: {onAirNow:"On Air Now", offline:"Music No Stop",
				current:"", next:"Next"},
        		updatePeriod: 20 //seconds
    		});
    		var d = new Date().getDay();
		});
	</script>

<!-- END head -->
</head>

<body <?php body_class() ?>>

<nav>
	<div class="center red darken-4">
		<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>">
			<!-- in future, get_option() -->
			<?php if(true): ?>
				<?php $logo = get_stylesheet_directory_uri() . '/images/logo_border-radio.png'; ?>
				<img src="<?php echo $logo ?>" alt="<?php bloginfo('name') ?> logo" />
			<?php else: ?>
				<?php bloginfo('name') ?>
			<?php endif ?>
		</a>
	</div>
	<div class="container">
		<div class="nav-wrapper">
			<?php wp_nav_menu( array(
				'container'      => 'ul',
				'menu_class'     => 'center hide-on-med-and-down',
				'menu_id'        => 'nav-mobile',
				'theme_location' => 'primary-menu',
				'depth'          => 1
			) ) ?>
		</div>
	</div>
</nav>


<div id="top-header">
        <div class="navigation-header">
        	<div id="logo">
		</div>
		<div class="social-icon">
			<ul>
				<!--
                               	<li><span class="follow">Follow us:</span></li>
				<li><a title="Border Radio on Facebook" href="http://www.facebook.com/Border.Radio.CC" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/facebook.png" alt="Border Radio on Facebook" /></a></li>
				<li><a title="Border Radio on Twitter" href="http://twitter.com/Border_Radio" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/twitter.png" alt="Border Radio on Twitter" /></a></li>
				<li><a title="Border Radio on Flickr" href="http://www.flickr.com/photos/border-radio/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/flickr.png" alt="Border Radio on Flickr" /></a></li>
				<li><a title="Border Radio on Vimeo" href="http://vimeo.com/borderradio" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/vimeo.png" alt="Border Radio on Vimeo" /></a></li>
				<li><a title="Border Radio on YouTube" href="http://www.youtube.com/user/BorderGateRadio" target="_blank"	><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/youtube.png" alt="Border Radio on YouTube" /></a></li>
				<li><a title="RSS - Border Radio" href="http://borderradio.wordpress.com/feed/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/rss.png" alt="RSS - Border Radio" /></a></li>
				-->

				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('head-column') ) : ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>

<!-- header .container -->
<div class="container">
	<div class="row">

	<!-- end header.php -->
