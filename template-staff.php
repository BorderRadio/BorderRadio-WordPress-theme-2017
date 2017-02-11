<?php 
/**
* Template Name: Page Staff
*/
get_header(); ?>
				<div class="post-content-wrapper">
					
						<?php if (have_posts()) : ?>
						<?php
						    $pages = $wp_query->max_num_pages;
							$args = array( 
							    'posts_per_page' => 200, // Nota: senza limita i risultati a 10
								'post_type' => 'staff',
								'post_status' => 'publish',
								'orderby' => 'rand',
							    'paged' => $paged
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
						    <div class="lista-speaker-content">
								<?php
								  $ruolo = get_post_meta(get_the_ID(), 'metakey_staff_ruolo', true);
								  $ruolo = json_decode($ruolo,true);
								  $ruolo = $ruolo['staff_ruolo'];

								  $contatto = get_post_meta(get_the_ID(), 'metakey_staff_contatto', true);
								  $contatto = json_decode($contatto,true);
								  $contatto = $contatto['staff_contatto'];

								  $foto = get_post_meta(get_the_ID(), 'metakey_staff_foto', true);
								  $foto = json_decode($foto,true);
								  $foto = $foto['staff_foto'];
								?>
								<img class="img-speaker" src="<?=$foto?>" />
								<div class="name-speaker"><?=the_title();?></div>
								<div class="programma-speaker"><?=$ruolo?></div>
								<div class="contatto-speaker"><?=$contatto?></div>
							</div>
							<?php endwhile; ?>
							<!--kriesi_pagination($loop->max_num_pages);-->
						<?php else : ?>
							<h2 class="center">Not Found</h2>
							<p class="center">Sorry, but you are looking for something that isn't here.</p>
							<?php include (TEMPLATEPATH . "/searchform.php"); ?>
						<?php endif; ?> 
				</div>
<?php get_footer(); ?>	