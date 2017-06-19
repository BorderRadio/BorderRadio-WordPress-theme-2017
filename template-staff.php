<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2015, 2016, 2017 Border Radio, Valerio Bozzolan
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

/**
* Template Name: Page Staff
*/
wp_enqueue_script('materialize.same-height');

get_header();
?>

<div class="container">

	<h1><?php the_title() ?></h1>

	<?php if( have_posts() ): ?>

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
		?>

		<div class="row same-height">
			<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="col s12 m6">
					<?php
					  $ruolo = get_post_meta(get_the_ID(), 'metakey_staff_ruolo', true);
					  $ruolo = json_decode($ruolo, true);
					  $ruolo = $ruolo['staff_ruolo'];

					  $contatto = get_post_meta(get_the_ID(), 'metakey_staff_contatto', true);
					  $contatto = json_decode($contatto,true);
					  $contatto = $contatto['staff_contatto'];

					  $foto = get_post_meta(get_the_ID(), 'metakey_staff_foto', true);
					  $foto = json_decode($foto, true);
					  $foto = $foto['staff_foto'];
					?>
					<div class="card-panel hoverable">
						<div class="row valign-wrapper">
							<div class="col s4">
								<img src="<?php echo $foto ?>" alt="<?php the_title_attribute() ?>" class="responsive-img circle" />
							</div>
							<div class="col s8">
								<div><strong><?php the_title() ?></strong></div>
								<div><?php echo $ruolo ?></div>
								<div><?php echo $contatto ?></div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile ?>
		</div>

	<?php else: ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif ?>
</div>

<?php get_footer();
