<?php
/*
 * Plugin Name: Widget Programmi
 * Plugin URI: 
 * Description: View List Custom Post Programmi
 * Version: 1.2
 * Author: Giampaolo
 * Author URI: 
*/

class ProgramsAll extends WP_Widget {

    function ProgramsAll() {
          $widget_ops = array('classname' => 'programmi', 'description' => 'View List Custom Post Programmi');
          $this->WP_Widget('ProgramsAll', 'Widget Programmi', $widget_ops);
      }
	
    function form($instance) {				
      	  $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
          $title = strip_tags($instance['title']); ?>
          <p><label for="<?php echo $this->get_field_id('title'); ?>">Titolo: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
          <?php 
      }
	  
    function update($new_instance, $old_instance) 
      {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
	  
	function widget($args, $instance) {
          extract( $args );
          $title = apply_filters('widget_title', $instance['title']); 
          $type = 'programmi';
		  $before_widget = '<div class="widget lista-programmi">';
		  $after_widget = '</div>';
          ?>
          
          <?php echo $before_widget; ?>
          
                  <?php
                      if ( $title ) {
                          echo ('<div class="title">' . $title . '</div>');
                      }
                  ?>
                  							
				  <div class="cont-lista-programmi">

						  <?php
							  $not_in = array();
							  $sticky=get_option('sticky_posts');
							  $args = array (
								  'posts_per_page' => 1000,
								  'post_type' => $type,
								  'post_status' => 'publish',
								  'orderby' => 'rand'
							  );
							  query_posts($args);
								
							  if ( have_posts() ) :
								  while ( have_posts() ) : the_post();               
									  $not_in[] = get_the_ID();
									  $link = '/'.$post->post_name ;								  
									  ?>
										
						  <?php
							switch( $type ) {
								case Backend::TYPE_PROGRAMMI:
									$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_logo', true);
									$meta_values = json_decode($post_meta,true);
									?>
							        <div class="prog_button">
									 <a href="<?php echo get_permalink($post->ID)?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" style="background-image: url(<?php echo $meta_values['logo']; ?>);"></a>
                                     
					</div>

									 <?php
								break; 
							}
						  ?>
																
										 
								  <?php endwhile; ?>
						  <?php else : ?>
							  <p class="center">Nessun Programma</p>   
						  <?php endif; ?>

				  </div>
                                  

                  <?php
                  switch( $type ) {
                      case Backend::TYPE_PROGRAMMI: 
                          $link = get_option('home') . "/programmi-radio/";
                      break; 
                  }
                  ?>

				  <div class="elenco-completo">
                      			<a href="<?php echo $link;?>">Tutti i programmi >></a>
                  		  </div>

				  <div class="clear"></div>

          <?php echo $after_widget;
        
      }
      
  }
  
  add_action( 'widgets_init', create_function('', 'return register_widget("ProgramsAll");') ); ?>