<?php
/*
 * Plugin Name: RSS All Prog.
 * Plugin URI: 
 * Description: Visualizza gli RSS relativi del Blog
 * Version: 2.0
 * Author: Giampaolo
 * Author URI: 
*/

require_once( ABSPATH . WPINC . '/feed.php' );

class RssProgramsAll extends WP_Widget {


	function RssProgramsAll() {
		parent::WP_Widget(
			'rssfeedswidget',
			__( 'RSS All Prog.', 'rssfeedswidget' ),
			array(	'classname' => 'simplerssfeedswidget', 'description' => __( 'Visualizza gli RSS relativi del Blog', 'rssfeedswidget' ) )
		);
	}

	/** @see WP_Widget::form */
	function form( $instance )
	{
		$title = esc_attr( $instance[ 'title' ] );
		if( empty( $title ) )
			$title = __( 'Notizie dal Blog', 'rssfeedswidget' );

		$rss = esc_attr( $instance[ 'rss' ] );
		if( empty( $rss ) )
		{
			$rss = __( 'DEFAULT_RSS_FEEDS', 'rssfeedswidget' );
			if( $rss == 'DEFAULT_RSS_FEEDS' )
			{
				// Default RSS feeds list if none has been provided for the blog locale

				$rss =   "http://borderradio.wordpress.com/feed";										// BorderRadio Blog
			}
		}
		$rss = str_replace( '!', "\n", $rss );

		// Get parameters
		$maxDisplayedItemsPerSource = $instance[ 'maxDisplayedItemsPerSource' ];
		if( !isset( $maxDisplayedItemsPerSource ) || $maxDisplayedItemsPerSource <= 0 || $maxDisplayedItemsPerSource > 100 )
			$maxDisplayedItemsPerSource = 5;

		$maxDisplayedItemsInTotal = $instance[ 'maxDisplayedItemsInTotal' ];
		if( !isset( $maxDisplayedItemsInTotal ) || $maxDisplayedItemsInTotal <= 0 || $maxDisplayedItemsInTotal > 100 )
			$maxDisplayedItemsInTotal = 5;

		// Source
		$source = $instance[ 'source' ];
		if( $source != 'displayed' && $source != 'hidden' )
			$source = 'displayed';

		?>
		<p>
			<label for="<?php echo( $this->get_field_id( 'title' ) ); ?>">
				<?php _e( 'Title:', 'rssfeedswidget' ); ?>
				<input class="widefat" id="<?php echo( $this->get_field_id( 'title' ) ); ?>" name="<?php echo( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo( $title ); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo( $this->get_field_id( 'rss' ) ); ?>">
				<?php _e( 'RSS feeds (one per line):', 'rssfeedswidget' ); ?>
				<textarea cols="40" rows="5" class="widefat" id="<?php echo( $this->get_field_id( 'rss' ) ); ?>" name="<?php echo( $this->get_field_name( 'rss' ) ); ?>"><?php echo( $rss ); ?></textarea>
			</label>
		</p>

		<p>
			<label for="<?php echo( $this->get_field_id( 'maxDisplayedItemsPerSource' ) ); ?>">
				<?php _e( 'Maximum displayed items from same source:', 'rssfeedswidget' ); ?>
				<input class="widefat" id="<?php echo( $this->get_field_id( 'maxDisplayedItemsPerSource' ) ); ?>" name="<?php echo( $this->get_field_name( 'maxDisplayedItemsPerSource' ) ); ?>" type="text" value="<?php echo( $maxDisplayedItemsPerSource ); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo( $this->get_field_id( 'maxDisplayedItemsInTotal' ) ); ?>">
				<?php _e( 'Maximum displayed items in total:', 'rssfeedswidget' ); ?>
				<input class="widefat" id="<?php echo( $this->get_field_id( 'maxDisplayedItemsInTotal' ) ); ?>" name="<?php echo( $this->get_field_name( 'maxDisplayedItemsInTotal' ) ); ?>" type="text" value="<?php echo( $maxDisplayedItemsInTotal ); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo( $this->get_field_id( 'source' ) ); ?>">
				<?php _e( 'RSS Feed Source:', 'rssfeedswidget' ); ?>
				<select name="<?php echo $this->get_field_name('source'); ?>" id="<?php echo $this->get_field_id('source'); ?>" class="widefat">
					<option value="displayed"<?php selected( $source, 'displayed' ); ?>><?php _e( 'Display source', 'rssfeedswidget' ); ?></option>
					<option value="hidden"<?php selected( $source, 'hidden' ); ?>><?php _e( 'Hide source', 'rssfeedswidget' ); ?></option>
				</select>
			</label>
		</p>

		<?php
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance )
	{
		// processes widget options to be saved
		$instance = $old_instance;

		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'rss' ] = strip_tags( $new_instance[ 'rss' ] );
		
		$instance[ 'maxDisplayedItemsPerSource' ] = $new_instance[ 'maxDisplayedItemsPerSource' ];
		if(    !is_numeric( $instance[ 'maxDisplayedItemsPerSource' ] )
			|| $instance[ 'maxDisplayedItemsPerSource' ] <= 0
			|| $instance[ 'maxDisplayedItemsPerSource' ] > 100 )
		{
			$instance[ 'maxDisplayedItemsPerSource' ] = 5;
		}
		
		$instance[ 'maxDisplayedItemsInTotal' ] = $new_instance[ 'maxDisplayedItemsInTotal' ];
		if(    !is_numeric( $instance[ 'maxDisplayedItemsInTotal' ] )
			|| $instance[ 'maxDisplayedItemsInTotal' ] <= 0
			|| $instance[ 'maxDisplayedItemsInTotal' ] > 100 )
		{
			$instance[ 'maxDisplayedItemsInTotal' ] = 5;
		}

		$instance[ 'source' ] = $new_instance[ 'source' ];
		if( $instance[ 'source' ] != 'displayed' && $instance[ 'source' ] != 'hidden' )
			$instance[ 'source' ] = 'displayed';

		return $instance;

	}

	static function sort( $a, $b )
	{
		if( $a->get_date( 'U' ) < $b->get_date( 'U' ) )
		{
			return 1;
		}

		if( $a->get_date( 'U' ) > $b->get_date( 'U' ) )
		{
			return -1;
		}
		
		return 0;
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance )
	{
		// outputs the content of the widget
		extract( $args );

		echo( '<div class="widget rss-index">' );

		// Get title
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		echo( '<div class="title">' . $title . '</div>' );

		echo( '<div class="cont-lista-rss">' );

		// Get parameters
		$maxDisplayedItemsPerSource = $instance[ 'maxDisplayedItemsPerSource' ];
		if( !isset( $maxDisplayedItemsPerSource ) || $maxDisplayedItemsPerSource <= 0 || $maxDisplayedItemsPerSource > 100 )
			$maxDisplayedItemsPerSource = 5;

		$maxDisplayedItemsInTotal = $instance[ 'maxDisplayedItemsInTotal' ];
		if( !isset( $maxDisplayedItemsInTotal ) || $maxDisplayedItemsInTotal <= 0 || $maxDisplayedItemsInTotal > 100 )
			$maxDisplayedItemsInTotal = 5;

		// Get source
		$source = $instance[ 'source' ];
		if( $source != 'displayed' &&  $source != 'hidden' )
			$source = 'displayed';
			$rss = $instance[ 'rss' ];
			
		// Get and display RSS feeds
		$rssUris  = explode( "\n", $rss );
		// parse feeds URIs
		$displayedItems = array();
		foreach( $rssUris as $rssUri )
		{
			// Is the URI fine?
			if( !empty( $rssUri ) )
			{
				// OK, fetch feed
				$feed = fetch_feed( $rssUri );
				if( !is_wp_error( $feed ) )
				{
					// OK
					$maxItems = $feed->get_item_quantity( $maxDisplayedItemsPerSource );
					if( $maxItems > 0 )
					{
						// OK, found items in the fetched feed
						$feedItems = $feed->get_items( 0, $maxItems );
						foreach( $feedItems as $item )
						{
							$displayedItems[] = $item;
						}
					}
				}
			}
		}

		// Do we have at least 1 item to display?
		if( !empty( $displayedItems ) )
		{
			// Yes, we do
			usort( $displayedItems, 'RssProgramsAll::sort' );

			echo( '<ul>' );
			$displayedItemsCount = 0;
			foreach( $displayedItems as $item )
			{
				echo( '<li><a title="'.date_i18n( get_option( 'date_format' ), $item->get_date( 'U' ) ).'" href="'.$item->get_permalink().'" target="_blank">'.$item->get_title().'</a>' );
				if( $source != 'hidden' )
					echo( ' <small>(<cite>'.$item->get_feed()->get_title().'</cite>)</small>' );
				echo( '</li>');
				
				$displayedItemsCount++;
				if( $displayedItemsCount > $maxDisplayedItemsInTotal )
				{
					break;
				}
			}
			echo( '</ul>' );
		}

		echo( '</div></div>' );
	}

} 

  add_action( 'widgets_init', create_function('', 'return register_widget("RssProgramsAll");') ); ?>