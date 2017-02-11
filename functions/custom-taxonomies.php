<?php

// Creazione nuove tassonomie

add_action( 'init', 'taxonomies_init' );

function taxonomies_init() {
	
	$focus_labels = array(
		'name' => _x( 'Focus', 'taxonomy general name' ),
		'singular_name' => _x( 'Focus', 'taxonomy singular name' ),
		'search_items' =>  __( 'Cerca tra i Focus' ),
		'all_items' => __( 'Tutti i Focus' ),
		'parent_item' => __( 'Focus genitore' ),
		'parent_item_colon' => __( 'Focus genitore:' ),
		'edit_item' => __( 'Modifica Focus' ), 
		'update_item' => __( 'Aggiorna Focus' ),
		'add_new_item' => __( 'Aggiungi nuovo Focus' ),
		'new_item_name' => __( 'Nuovo nome Focus' ),
		'menu_name' => __( 'Focus' ),
	); 	
	
	register_taxonomy(
	    'focus', 
		array('programmi', 'podcast', 'speaker'), 
		array(
				'hierarchical' => true,
				'labels' => $focus_labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'focus' ),
	    )
	);
}



// Inserimento colonna Extra in Post List
add_filter('manage_posts_columns', 'cnews_columns');

function cnews_columns($columns) {
	$position = 0;
	foreach ( $columns as $key => $col) {
		if ($position == 5) {
			$temp_columns["extra"] = "Extra";					
			}
		$temp_columns[$key] = $col;
		$position ++;
		}
    return $temp_columns;
}

add_action('manage_posts_custom_column',  'cnews_show_columns');

function cnews_show_columns($name) {
	
    global $post;
    switch ($name) {
			
        case 'extra':
		
			$terms = get_the_terms( $post->ID , 'focus' );
			if ($terms) {
			
			echo "Focus: ";
			
			foreach ( $terms as $term ) { 
			
				echo "<br />&raquo; <a href='/wp-admin/edit.php?focus=" . $term->slug . "&post_type=post'>" . $term->name . "</a>";
				}
			}
			echo "<br />";
			break;
    }	
}
?>