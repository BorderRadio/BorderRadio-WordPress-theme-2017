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
	<!-- start single.php -->
	<div class="section">
		<?php if( have_posts() ): ?>
			<?php while( have_posts() ): the_post() ?>
		                <h1>
					<a href="<?php the_permalink() ?>" title="Vedi <?php the_title() ?>">
						<?php the_title() ?>
					</a>
				</h1>
		                <p><?php the_content('Read the rest of this entry &raquo;'); ?></p>
				<div class="commentbox">
					<?php the_tags('Tags: ', ', ', '<br />'); ?> | 
					<?php the_time('F jS, Y') ?> 
					<!-- by <?php the_author() ?> --> |
					Posted in <?php the_category(', ') ?> | 
					<?php edit_post_link('Edit', '', ' | ') ?>
				</div>
				<div id="comments"><?php comments_template() ?></div>
			<?php endwhile ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			</div>

		<?php else: ?>

			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>

		<?php endif ?>

	</div>
	<!-- end single.php -->
<?php

get_footer();
