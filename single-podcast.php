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

$type = 'programmi';
$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_podcast', true);
$meta_values = json_decode($post_meta, true);
?>

	<div class="col s12 m6 l8">
		<?php if( have_posts() ): ?>
			<?php while( have_posts() ) : the_post(); ?>
				<h1 class="post-title flow-text"><?php the_title() ?></h1>
				<?php the_content() ?>
				<p>Pubblicato il <?php the_date() ?>.</p>
			<?php endwhile ?>
		<?php else: ?>
			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php include TEMPLATEPATH . "/searchform.php" ?>
		<?php endif ?>
	</div>

	<div class="col s12 m6 l4">
		<?php function_exists( 'dynamic_sidebar' )
			and dynamic_sidebar('Sidebar "Single Podcast"') ?>
	</div>

<?php
get_footer();
