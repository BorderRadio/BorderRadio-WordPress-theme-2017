<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- BEGIN html -->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head profile="http://gmpg.org/xfn/11">

    <!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <!-- Title -->
	<title><?php wp_title(''); ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="http://www.border-radio.it/wp-content/themes/BorderRadio/favicon.ico" />

	<!-- Stylesheets -->
    <link rel="stylesheet" href="http://www.border-radio.it/wp-content/themes/BorderRadio/style.css" type="text/css" media="screen" />
    <link href="http://www.border-radio.it/airtime-widgets/css/airtime-widgets.css" rel="stylesheet" type="text/css" />

	<!-- RSS, Atom & Pingbacks -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo( 'rss_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Wp Head -->
	<?php define('UTC_OFFSET', get_option('gmt_offset'));//IMPORTANT: border-calendar plugin and template-palinsesto is using this const?>
	<?php wp_head(); ?>
	
	<!-- AddThis -->
	<script src="http://www.border-radio.it/wp-content/themes/BorderRadio/js/addthis_widget.js" type="text/javascript"></script> 

	<!-- Template Contact -->
	<?php if (is_page_template('template-contact.php')) { ?>
	    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript"></script>
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

	<!-- Google Analytics -->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-17083532-1']);
	  _gaq.push(['_trackPageview']);
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
    
    
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
	<script src="http://www.border-radio.it/airtime-widgets/js/jquery-1.6.1.min.js" type="text/javascript"></script>
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

<body <?php body_class(); ?>>


<div id="top-header">
        <div class="navigation-header">
        
        	<div id="logo">
			    <a href="<?php bloginfo( 'url' ); ?>" title="Border Radio">
				    <img src="<?php bloginfo('template_directory'); ?>/images/logo_border-radio.png" alt="Border Radio" width="248" height="59" border="0"/>

				</a>

			</div>
			<div class="social-icon">
				<ul>
                                	<li><span class="follow">Follow us:</span></li>
					<li><a title="Border Radio on Facebook" href="http://www.facebook.com/Border.Radio.CC" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/facebook.png" alt="Border Radio on Facebook" /></a></li>
					<li><a title="Border Radio on Twitter" href="http://twitter.com/Border_Radio" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/twitter.png" alt="Border Radio on Twitter" /></a></li>
					<li><a title="Border Radio on Flickr" href="http://www.flickr.com/photos/border-radio/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/flickr.png" alt="Border Radio on Flickr" /></a></li>

					<li><a title="Border Radio on Vimeo" href="http://vimeo.com/borderradio" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/vimeo.png" alt="Border Radio on Vimeo" /></a></li>
					<li><a title="Border Radio on YouTube" href="http://www.youtube.com/user/BorderGateRadio" target="_blank"	><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/youtube.png" alt="Border Radio on YouTube" /></a></li>
					<li><a title="RSS - Border Radio" href="http://borderradio.wordpress.com/feed/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/rss.png" alt="RSS - Border Radio" /></a></li>




<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('head-column') ) : ?>

<?php endif; ?>

				</ul>
			</div>

	</div>
</div>

<div id="header">
        <div class="navigation-header">
			<div class="menu-header">
			    <?php wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'menu', 'menu_id' => 'primary-menu',  'theme_location' => 'primary-menu' ) ); ?>
			</div>
	    </div>
</div>


<div id="wrapper">
        <div class="wrapper-container">