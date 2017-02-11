<?php 
/**
* Template Name: Page Speaker
*/
get_header(); ?>
				<div class="post-content-wrapper">
					
						<?php if (have_posts()) : ?>
						<?php
						    $pages = $wp_query->max_num_pages;
							$args = array( 
							    'posts_per_page' => 200, // Nota: senza limita i risultati a 10
								'post_type' => 'speaker',
								'post_status' => 'publish',
								'orderby' => 'rand',
							    'paged' => $paged
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
						    <div class="lista-speaker-content">
								<?php
								  $contatto = get_post_meta(get_the_ID(), 'metakey_speaker_contatto', true);
								  $contatto = json_decode($contatto,true);
								  $contatto = $contatto['speaker_contatto'];

								  $foto = get_post_meta(get_the_ID(), 'metakey_speaker_foto', true);
								  $foto = json_decode($foto,true);
								  $foto = $foto['speaker_foto'];
								?>
								<img class="img-speaker" src="<?php echo $foto ?>" />
								<div class="name-speaker"><?php the_title(); ?></div>
								<div class="ruolo-speaker"><?php echo $ruolo?></div>
								<?php 
								  $programmi = wp_get_post_terms( get_the_ID(), 'taxonomy_programmi');
								  foreach ($programmi  as $programma)
								  {
								?>
								<div class="programma-speaker"><?php echo $programma->name ?></div>
								<?php
								  }
								?>
								<div class="contatto-speaker"><?php echo $contatto ?></div>


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