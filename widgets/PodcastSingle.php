<?php
/*
 * Plugin Name: Widget Podcast Single Program
 * Plugin URI: 
 * Description: View List Single Program Podcast
 * Version: 2.0
 * Author: Giampaolo
 * Author URI: 
*/

class PodcastSingle extends WP_Widget {

    function PodcastSingle() {
          $widget_ops = array( 'classname' => 'podcast', 'description' => 'View List Single Program Podcast' );
          $this->WP_Widget('PodcastSingle', 'Widget Podcast Single Program', $widget_ops);
    }
	
	function form($instance) {				
      	  $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
          $title = strip_tags($instance['title']); ?>
          <p><label for="<?php echo $this->get_field_id('title'); ?>">Titolo: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
          <?php 
    }
      
    function update($new_instance, $old_instance) {
          $instance = $old_instance;
          $instance['title'] = strip_tags($new_instance['title']);
          return $instance;
    }
 
	function widget($args, $instance) {
          extract( $args );
          $title = apply_filters('widget_title', $instance['title']); 
          $type = 'podcast';
		  $before_widget = '<div class="widget lista-podcast">';
		  $after_widget = '</div>';
          $programmi = wp_get_post_terms( get_the_ID(), 'taxonomy_programmi');
		  foreach ($programmi  as $programma)
			{
				$programmiTerms = $programma->slug;
			}
			?>
          <?php echo $before_widget; ?>
          
                  <?php
                      if ( $title ) {
                          echo $before_title . $title . $after_title;
                      }
                  ?> 						
				    <div class="cont-lista-podcast">
					  
						  <ul><?php
							  $not_in = array();
							  $sticky=get_option('sticky_posts');
							  $args = array (
								  'posts_per_page' => 5,
								  'post_type' => $type,
								  'post_status' => 'publish',
								  'orderby' => 'date', 
								  'order' => 'DESC',
								  'taxonomy_programmi' => $programmiTerms
							  );
							  query_posts($args);
								
							  if ( have_posts() ) :
								  while ( have_posts() ) : the_post();               
									  $not_in[] = get_the_ID();
									  $link = '/'.$post->post_name ;								  
									  ?>
									  <li>
										
						  <?php
							switch( $type ) {
								case Backend::TYPE_PODCAST:
									$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_logo', true);
									$meta_values = json_decode($post_meta,true);
									?>
									<div class="text_description">
										<a href="<?php echo get_permalink($post->ID)?>" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
										</a>
										<div class="date"><?php the_time('d/m/Y') ?></div>
										<div class="excerpt"><?php content(25, __('[...]')); ?></div>	
									</div>
									 <?php
								break; 
							}
						  ?>
																
										 
									  </li>
								  <?php endwhile; ?>
						  </ul>
						  <?php else : ?>
							  <p class="center">Nessun Podcast</p>   
						  <?php endif; ?>
	 
				    </div>
                    <div class="elenco-completo">
                      	<a href="http://www.border-radio.it/podcast/">Ascolta gli altri podcast >></a>
                    </div>
				    <div class="clear"></div>

          <?php echo $after_widget;
        
    }
  
  }
  
  add_action( 'widgets_init', create_function('', 'return register_widget("PodcastSingle");') ); ?>