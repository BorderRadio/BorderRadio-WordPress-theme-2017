<!-- begin #sidebar --> 

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer1'  )
		&& ! is_active_sidebar( 'footer2' )
		&& ! is_active_sidebar( 'footer3'  )
		&& ! is_active_sidebar( 'footer4' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>



<?php if ( is_active_sidebar( 'footer1' ) ) : ?>

						<?php dynamic_sidebar( 'footer1' ); ?>

<?php endif; ?>

<?php if ( is_active_sidebar( 'footer2' ) ) : ?>

						<?php dynamic_sidebar( 'footer2' ); ?>

<?php endif; ?>

<?php if ( is_active_sidebar( 'footer3' ) ) : ?>

						<?php dynamic_sidebar( 'footer3' ); ?>

<?php endif; ?>

<?php if ( is_active_sidebar( 'footer4' ) ) : ?>

						<?php dynamic_sidebar( 'footer4' ); ?>

<?php endif; ?>
			
<!-- end #sidebar --> 
