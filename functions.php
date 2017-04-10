<?php
// border-calendar plugin and template-palinsesto is using this const
defined('UTC_OFFSET')
	or define('UTC_OFFSET', get_option('gmt_offset') );

defined('MATERIALIZE_URL')
	or define('MATERIALIZE_URL', get_stylesheet_directory_uri() . '/static/materialize');

define('DARK_BG', 'red darken-3');

define('BTN_BASE', 'btn waves-effect');

define('BTN_DARK', BTN_BASE . ' waves-light ' . DARK_BG);
define('BTN_LIGH', BTN_BASE . ' waves-red white black-text');

function mdi($icon) {
	printf('<i class="material-icons">%s</i>', $icon);
}

// Materialize CSS - MIT License
// http://materializecss.com
wp_register_style( 'materialize', MATERIALIZE_URL . '/css/materialize.min.css');
wp_register_script('materialize', MATERIALIZE_URL . '/js/materialize.min.js');

// Materialize CSS patc
wp_register_style('materialize-patch',
	get_stylesheet_directory_uri() . '/static/materialize-patch/materialize.css'
);

if( ! class_exists('Backend') ) {
	require('backend.php');
	Backend::init();
}

require ('functions/custom-functions.php');
require ('functions/custom-pagination.php');
//require ('functions/custom-taxonomies.php');

// Giampaolo || 13.10.2011 || Nuovo metodo registrazione widget
include("widgets/Programmi.php");
include("widgets/PodcastAll.php");
include("widgets/PodcastSingle.php");
include("widgets/FacebookLike.php");
include("widgets/BorderRadioLike.php");
include("widgets/RssProgram.php");
include("widgets/RssProgramsAll.php");
include("widgets/News.php");

function register_border_widget($id, $title) {
	static $SIDEBAR_CLASS = '';

	register_sidebar( array(
		'name'=> "Sidebar \"$title\"",
		'id' => $id,
		'description' => $title,
		'before_widget' => '<!-- start single widget --><div class="' . $SIDEBAR_CLASS . '">',
		'after_widget' => '</div><!-- end single widget -->',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
}

// Giampaolo || 13.10.2011 || Nuovo metodo registrazione sidebar
if( function_exists('register_sidebar') ) {
	register_border_widget('homepage-left', "Homepage left");
	register_border_widget('homepage-right', "Homepage right");
	register_border_widget('programma-single', "Programma");
	register_border_widget('multimedia-single', "Multimedia");
	register_border_widget('news-list', "All News");
	register_border_widget('news-single', "Single News");
	register_border_widget('podcast-single', "Single Podcast");
	register_border_widget('footer1', "Footer 1");
	register_border_widget('footer2', "Footer 2");
	register_border_widget('footer3', "Footer 3");
	register_border_widget('footer4', "Footer 4");
}
