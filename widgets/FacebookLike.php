<?php
/*
 * Plugin Name: Facebook Like Box Program widget
 * Plugin URI: 
 * Description: Facebook Like Box in Single Program
 * Version: 1.2
 * Author: Giampaolo
 * Author URI: 
*/

class FacebookLike extends WP_Widget {

	function FacebookLike() {
		$widget_ops = array('classname' => 'social', 'description' => 'Facebook Like Box in Single Program');
		$this->WP_Widget('FacebookLike', 'Facebook Like Box Program', $widget_ops);
	}
	
	function form($instance) { 	
 	}
	
	function update($new_instance, $old_instance) {                
       $instance = $old_instance;
       return $instance;
    }

	function widget($args, $instance) { 
		extract( $args );
		$type = 'programmi';
        $before_widget = '<div class="widget facebook-like-box">';
		$after_widget = '</div>';		 
		$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_facebook', true);
	    $meta_values = json_decode($post_meta,true);	
		?>
		<?php  if( $meta_values['facebook'] !== "" ) { ?>
		<?php echo $before_widget; ?>  
		<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F<?php echo $meta_values['facebook']; ?>&amp;width=440&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:440px; height:260px;" allowTransparency="true"></iframe>    
		<?php echo $after_widget;?>
		<?php }
		
	}
			
} 

add_action( 'widgets_init', create_function('', 'return register_widget("FacebookLike");') ); ?>