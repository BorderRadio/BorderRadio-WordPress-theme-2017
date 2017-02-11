<?php

    // Giampaolo || 28.10.2011 || custom post in rss feed
    function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'programmi');
	return $qv;
	}
	add_filter('request', 'myfeed_request');

    // Giampaolo || 24.10.2011 || elimino widget default di wordpress
	function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Meta');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

    // Giampaolo || 03.10.2011 || cambio logo nel login
	function login_logo() {
	echo '<style type="text/css">
	h1 a {background:url("'.get_bloginfo('template_directory').'/images/logo-login.png") no-repeat scroll center top transparent; }
	</style>';}
	add_action('login_head', 'login_logo');

	// Giampaolo || 03.10.2011 || cambio logo in amministrazione
	function admin_logo() {
	echo '<style type="text/css">
	#header-logo {background:url("'.get_bloginfo('template_directory').'/images/logo-admin.png") no-repeat scroll center center transparent; }
	</style>';}
	add_action('admin_head', 'admin_logo');
  
  	// Giampaolo || 03.10.2011 || Register Header Menu
	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu' ),
			)
		);
	}
	
	// Giampaolo || 03.10.2011 || Rimuove il numero di versione di WordPress
	function wpbeginner_remove_version() {
        return '';
    }
    add_filter('the_generator', 'wpbeginner_remove_version');
	
	// Giampaolo || 03.10.2011 || Add support for WP 2.9 post thumbnails
    if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	    add_theme_support( 'post-thumbnails' );
    }
	
	// Giampaolo || 03.10.2011 || Content Limit
    function content($num, $more_link_text = '[...]') {  
		$theContent = get_the_content($more_link_text);  
		$output = preg_replace('/<img[^>]+./','', $theContent);  
		$limit = $num+1;  
		$content = explode(' ', $output, $limit);  
		array_pop($content);  
		$content = implode(" ",$content);  
		$content = strip_tags($content, '<a><address><a><abbr><acronym><b><big><blockquote><br><caption><cite><class><code><col><del><dd><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><ins><kbd><li><ol><p><pre><q><s><span><strike><strong><sub><sup><table><tbody><td><tfoot><tr><tt><ul><var>');
		echo "<p>";
		echo close_tags($content);
		echo " " . $more_link_text . "</p>";
    }
	
	// Giampaolo || 03.10.2011 || Find and close unclosed xhtml tags
    function close_tags($text) {
    $patt_open    = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%";
    $patt_close    = "%((?<=</)([^>]+)(?=>))%";
    if (preg_match_all($patt_open,$text,$matches))
    {
        $m_open = $matches[1];
        if(!empty($m_open))
        {
            preg_match_all($patt_close,$text,$matches2);
            $m_close = $matches2[1];
            if (count($m_open) > count($m_close))
            {
                $m_open = array_reverse($m_open);
                foreach ($m_close as $tag) $c_tags[$tag]++;
                foreach ($m_open as $k => $tag)    if ($c_tags[$tag]--<=0) $text.='</'.$tag.'>';
            }
        }
    }
    return $text;
    }
	
	// Giampaolo || 22.07.2011 || Inserisce post e custom post nell'archivio TAG 
	add_filter('pre_get_posts', 'query_post_type');
	function query_post_type($query) {
	  if (is_tag()) {
		$post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('post');
		$query->set('post_type',$post_type);
		return $query;
		}
	}
	
	// Giampaolo || 05.07.2011 || Admin Bar nascosta agli utenti esterni
	function my_function_admin_bar($content) {
		return ( current_user_can("administrator") || current_user_can("author") || current_user_can("editor") ) ? $content : false;
	}
	add_filter( 'show_admin_bar' , 'my_function_admin_bar');
	
	// Giampaolo || 28.08.2011 || Include file in Feed Rss
	function feedFilter($query) {
	if ($query->is_feed) {
	add_filter('rss2_item', 'feedContentFilter');
	}
	return $query;
	}
	add_filter('pre_get_posts','feedFilter');
	 
	function feedContentFilter($item) {

	global $post;

	$args = array(
	'order' => 'ASC',
	'post_type' => 'attachment',
	'post_parent' => $post->ID,
	'post_mime_type' => 'image',
	'post_status' => null,
	'numberposts' => 1,
	);
	$attachments = get_posts($args);
	if ($attachments) {
	foreach ($attachments as $attachment) {
	$image = wp_get_attachment_image_src($attachment->ID, 'large');
	$mime = get_post_mime_type($attachment->ID);
	}
	}

	if ($image) {
	echo '<enclosure url="'.$image[0].'" length="" type="'.$mime.'"/>';
	}
	return $item;
	}
	
	// Elimina link nei commenti 
	remove_filter('comment_text', 'make_clickable', 9);

	// Esclude le pagine dai risultati della ricerca 
	function filter_search($query) {
	if ($query-> is_search) {
	$query-> set('post_type', 'post');
	};
	return $query;
	};
	add_filter('pre_get_posts', 'filter_search');


// The function to group all the widget areas //
function create_widgets_init() {
// The custom widget //
register_sidebars( 1,
array(
'name' => 'Head column',
'id' => 'head-column',
'description' => __('The header widget area, used for placing your custom widgets.'),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3 class="widgettitle">',
'after_title' => '</h3>')
);
}
 
// ACTIVATE THE WIDGET(S) //
add_action( 'widgets_init', 'create_widgets_init' );

?>