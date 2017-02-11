<?php
/*
 * Plugin Name: Border Radio Facebook Like
 * Plugin URI: 
 * Description: View Facebook Like Box "Border Radio"
 * Version: 2.0
 * Author: Giampaolo
 * Author URI: 
*/

class BorderRadioLike extends WP_Widget {

	function BorderRadioLike() {
       $widget_ops = array( 'classname' => 'BorderRadioLike', 'description' => 'View Facebook Like Box - Border Radio' );
	   $this->WP_Widget( 'BorderRadioLike', 'Border Radio Facebook Like', $widget_ops);		
	}
	
	function form($instance) { 	
 	}
	
	function update($new_instance, $old_instance) {                
       $instance = $old_instance;
       return $instance;
    }

	function widget($args, $instance) { 
		extract( $args );	
		?>
        <div class="widget facebook-like-box">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FBorder.Radio.CC&amp;width=440&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:440px; height:258px;" allowTransparency="true"></iframe>
        </div>  
       <?php 
    }
} 
add_action( 'widgets_init', create_function('', 'return register_widget("BorderRadioLike");') ); ?>