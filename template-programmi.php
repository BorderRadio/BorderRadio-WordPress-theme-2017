<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2015, 2016, 2017 Valerio Bozzolan
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

get_header()

?>

<div class="container">
	<h1>Programmi</h1>

	<?php if( have_posts() ): ?>
		<?php
		$pages = $wp_query->max_num_pages;
		$args = array(
			'posts_per_page' => 200, // Nota: senza limita i risultati a 10
			'post_type' => 'programmi',
			'post_status' => 'publish',
			'orderby' => 'rand',
			'paged' => $paged
		);
		$loop = new WP_Query( $args );
		?>

</div>


		<div class="row">
		<?php while( $loop->have_posts() ): $loop->the_post(); ?>

			<?php
			$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_logo', true);
			$meta_values = json_decode($post_meta,true);
                        ?>

			<div class="col s12 m4 l3">
				<div class="card small hoverable">
					<div class="card-image">
						<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
							<img src="<?php echo $meta_values['logo'] ?>" alt="<?php the_title_attribute() ?>" class="responsive-img" />
						</a>
					</div>
					<div class="card-content">
						<p class="flow-text"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></p>
						<small><?php content( 25, __('[...]') ) ?></small>
					</div>
				</div>
			</div>
		<?php endwhile ?>
		</div>

		<div class="container">
			<?php kriesi_pagination($loop->max_num_pages) ?>
		</div>
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif ?>

<?php get_footer();
