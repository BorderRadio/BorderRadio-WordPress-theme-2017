<?php
  if(!class_exists('Backend')) {
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
	
  // Giampaolo || 13.10.2011 || Nuovo metodo registrazione sidebar
	if ( function_exists('register_sidebar') ) {
			 register_sidebar(array(
				  'name'=>'Sidebar "Homepage left"',
				  'id' => 'homepage-left',
				  'description' => 'Homepage left',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<div class="title">',
				  'after_title' => '</div>',
			  ));
			  register_sidebar(array(
				  'name'=>'Sidebar "Homepage right"',
				  'id' => 'homepage-right',
				  'description' => 'Homepage right',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<div class="title">',
				  'after_title' => '</div>',
			  ));
			   register_sidebar(array(
				  'name'=>'Sidebar "Programma"',
				  'id' => 'programma-single',
				  'description' => 'Programma',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			   register_sidebar(array(
				  'name'=>'Sidebar "Multimedia"',
				  'id' => 'multimedia-single',
				  'description' => 'Multimedia',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			   register_sidebar(array(
				  'name'=>'Sidebar "All News"',
				  'id' => 'news-list',
				  'description' => 'All News',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			   register_sidebar(array(
				  'name'=>'Sidebar "Single News"',
				  'id' => 'news-single',
				  'description' => 'Single News',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			   register_sidebar(array(
				  'name'=>'Sidebar "Single Podcast"',
				  'id' => 'podcast-single',
				  'description' => 'Podcast',
				  'before_widget' => '<div class="widget">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			   register_sidebar(array(
				  'name'=>'Sidebar "Footer 1"',
				  'id' => 'footer1',
				  'description' => 'Footer 1',
				  'before_widget' => '<div class="widget-footer first">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			  register_sidebar(array(
				  'name'=>'Sidebar "Footer 2"',
				  'id' => 'footer2',
				  'description' => 'Footer 2',
				  'before_widget' => '<div class="widget-footer second">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			  register_sidebar(array(
				  'name'=>'Sidebar "Footer 3"',
				  'id' => 'footer3',
				  'description' => 'Footer 3',
				  'before_widget' => '<div class="widget-footer third">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
			  register_sidebar(array(
				  'name'=>'Sidebar "Footer 4"',
				  'id' => 'footer4',
				  'description' => 'Footer 4',
				  'before_widget' => '<div class="widget-footer forth">',
				  'after_widget' => '</div>',
				  'before_title' => '<h3 class="widget-title">',
				  'after_title' => '</h3>',
			  ));
	}
 
?>