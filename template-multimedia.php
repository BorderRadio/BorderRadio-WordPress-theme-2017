<?php 
/**
* Template Name: Page Multimedia
*/
get_header(); ?>
           
				<div class="post-content-wrapper">
                        <h1>Multimedia</h1>
                    
						<?php if (have_posts()) : ?>
						<?php
						    $pages = $wp_query->max_num_pages;
							$args = array( 
							    'posts_per_page' => 200, // Nota: senza limita i risultati a 10
								'post_type' => 'multimedia',
								'post_status' => 'publish',
								'orderby' => 'date',
								'order' => 'DESC',
							    'paged' => $paged
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_logo', true);
							$meta_values = json_decode($post_meta,true);
                        ?>
						    <div class="lista-news-content">
                            		<div class="thumb">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail();?></a>
									</div>
                                	<div class="news-abstract">	
                                    	<div class="post-title">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
										</div>
										<div class="post-date">
								   			<?php the_time('j M Y') ?>
										</div>
										<?php content(30, __('[...]')); ?>
										<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">Read more >></a>
									</div>
							</div>  
							<?php endwhile; ?>
							<?php kriesi_pagination($loop->max_num_pages); ?>
						<?php else : ?>
							<h2 class="center">Not Found</h2>
							<p class="center">Sorry, but you are looking for something that isn't here.</p>
							<?php include (TEMPLATEPATH . "/searchform.php"); ?>
						<?php endif; ?> 
				</div>
			
<?php get_footer(); ?>	