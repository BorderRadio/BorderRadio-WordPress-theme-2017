<?php get_header(); ?>        

            <div id="content">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                <h1 class="post-title"><?php the_title(); ?></h1>
                <p><?php the_content('Read the rest of this entry &raquo;'); ?></p>
  
							<?php endwhile; ?>
				
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
                
                
	


             </div>   


<?php get_sidebar(); ?>		
<?php get_footer(); ?>	