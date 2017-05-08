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

get_header();

?>

<div class="row">
	<div class="col s12 m8 l9">
		<div class="container">
			<?php if( have_posts() ) : ?>
				<?php while( have_posts() ): the_post(); ?>
					<h1 class="flow-text"><?php the_title() ?></h1>
					<?php the_content() ?>
				<?php endwhile ?>
			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			<?php endif ?>
		</div>
	</div>
	<div class="col s12 m4 l3">
		<?php function_exists( 'dynamic_sidebar' )
			and dynamic_sidebar('Sidebar "Single News"') ?>
	</div>
</div>

<?php get_footer();
