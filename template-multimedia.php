<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2017 Valerio Bozzolan
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

get_header();
?>

<div class="container">
	<h1>Multimedia</h1>

	<?php if( have_posts() ): ?>
		<?php
		$pages = $wp_query->max_num_pages;
		$args = array(
			'post_type' => 'multimedia',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => $paged
		);
		$loop = new WP_Query( $args );
		?>

		<div class="row">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php
				$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_logo', true);
				$meta_values = json_decode($post_meta,true);
       		                ?>
				<div class="col s12 m6">
					<div class="card hoverable">
						<div class="card-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
								<?php the_post_thumbnail() ?>
								<span class="card-title"><?php the_date() ?></span>
							</a>
						</div>
						<div class="card-action">
							<a href="<?php the_permalink() ?>" class="<?php echo BTN_DARK ?> hoverable"><?php _e("Vedi") ?></a>
						</div>
					</div>
				</div>
			<?php endwhile ?>
		</div>

		<?php kriesi_pagination($loop->max_num_pages) ?>

	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif ?>

</div>

<?php get_footer();
