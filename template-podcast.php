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
	<div class="col s12">
		<h1>Podcast</h1>
	</div>

	<?php if( have_posts() ) : ?>
		<?php
		$pages = $wp_query->max_num_pages;
		$args = array(
			'posts_per_page' => 6, // Nota: senza limita i risultati a 10
			'post_type' => 'podcast',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => $paged
		);
		$loop = new WP_Query( $args );
		?>

		<?php while( $loop->have_posts() ): $loop->the_post(); ?>
			<div class="col s12 m6">
				<div class="card-panel">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					<?php content(25, __('[...]') ) ?>
					<a class="<?php echo BTN_DARK ?> hoverable" href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">Ascolta la puntata</a>
				</div>
			</div>
		<?php endwhile; ?>

		<div class="col s12">
			<?php kriesi_pagination($loop->max_num_pages) ?>
		</div>

	<?php else: ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php") ?>

	<?php endif ?>

	</div>
<?php get_footer() ?>
