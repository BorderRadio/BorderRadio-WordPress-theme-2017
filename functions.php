<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2011 Border Radio, Gianpaolo
# Copyright (C) 2017 Border Radio, Gianpaolo, Valerio Bozzolan
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see <http://www.gnu.org/licenses/>.

defined('RADIO_STREAM_PAGE')
	or define('RADIO_STREAM_PAGE', 'http://stream.border-radio.it/player/radio.html');

// border-calendar plugin and template-palinsesto is using this const
defined('UTC_OFFSET')
	or define('UTC_OFFSET', get_option('gmt_offset') );

defined('MATERIALIZE_URL')
	or define('MATERIALIZE_URL', get_stylesheet_directory_uri() . '/static/materialize');

defined('MATERIAL_ICONS')
	or define('MATERIAL_ICONS', get_stylesheet_directory_uri() . '/static/material-icons');

define('DARK_BG', 'red darken-3');

define('BTN_BASE', 'btn waves-effect');

define('BTN_DARK', BTN_BASE . ' waves-light ' . DARK_BG);
define('BTN_LIGH', BTN_BASE . ' waves-red white black-text');

function mdi($icon, $extra = '') {
	printf('<i class="material-icons<?php if( $extra ) echo " $extra"; ?>">%s</i>', $icon);
}

// Materialize CSS - MIT License
// http://materializecss.com
wp_register_style( 'materialize', MATERIALIZE_URL . '/css/materialize.min.css');
wp_register_script('materialize', MATERIALIZE_URL . '/js/materialize.min.js', array('jquery') );

// To have a .row with .cols at the same height
wp_register_script('materialize.same-height',
	get_stylesheet_directory_uri() . '/static/same-height.js',
	array('materialize')
);

// Materialize CSS patc
wp_register_style('materialize-patch',
	get_stylesheet_directory_uri() . '/static/materialize-patch/materialize.css',
	array('materialize')
);

// Showinfo (same as airtime-showinfo?)
wp_register_script('border-showinfo',
	get_stylesheet_directory_uri() . '/static/border-showinfo.js',
	array('jquery')
);

wp_register_script('border-player',
	get_stylesheet_directory_uri() . '/static/border-player.js',
	array('border-showinfo')
);

wp_register_script('airtime-showinfo',
	get_stylesheet_directory_uri() . '/airtime-widgets/js/jquery.showinfo.js'
);

wp_register_style('airtime',
	get_stylesheet_directory_uri() . '/airtime-widgets/css/airtime-widgets.css'
);

if( ! class_exists('Backend') ) {
	require('backend.php');
	Backend::init();
}

require 'functions/custom-functions.php';
require 'functions/custom-pagination.php';
//require ('functions/custom-taxonomies.php');

// Giampaolo || 13.10.2011 || Nuovo metodo registrazione widget
require 'widgets/Programmi.php';
require 'widgets/PodcastAll.php';
require 'widgets/PodcastSingle.php';
require 'widgets/FacebookLike.php';
require 'widgets/BorderRadioLike.php';
require 'widgets/RssProgram.php';
require 'widgets/RssProgramsAll.php';
require 'widgets/News.php';
require 'widgets/BorderRadioPlayer.php';

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
