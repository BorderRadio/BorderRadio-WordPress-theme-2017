<?php get_header(); ?>
            <div class="sidebar-left">       
				<div class="post-content-wrapper">
					<div class="post-content">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<h1 class="post-title">
									<?php the_title(); ?>
								</h1>
									<?php the_content(); ?>
							<?php endwhile; ?>
						<?php else : ?>
							<h2 class="center">Not Found</h2>
							<p class="center">Sorry, but you are looking for something that isn't here.</p>
							<?php include (TEMPLATEPATH . "/searchform.php"); ?>
						<?php endif; ?>
					</div>   
				</div>
			</div>
			<div class="sidebar-right"> 
			    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Sidebar "Single News"') ) ?>
			</div>
<?php get_footer(); ?>	