<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2011 Border Radio, Gianpaolo
# Copyright (C) 2017 Border Radio, Gianpaolo, Valerio Bozzolan
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see <http://www.gnu.org/licenses/>.

get_header();

?>
<div class="container">
	<div class="row">
		<!-- start template-about.php -->
		<div class="col s12 m6">
			<?php if( have_posts() ): ?>
				<div class="card-panel">
					<?php while( have_posts() ) : the_post(); ?>
						<h1><?php the_title() ?></h1>
						<?php the_content() ?>
					<?php endwhile ?>
				</div>
				<!-- /.card-panel -->
			<?php else: ?>
				<div class="card-panel">
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
				</div>
				<!-- /.card-panel -->
			<?php endif ?>
		</div>
		<div class="col s12 m6">
			<?php BorderRadioPlayer::spawn() ?>
			<div class="card-panel">
				<img class="responsive-img" src="<?php bloginfo('template_directory') ?>/images/border-radio_about.jpg" alt="<?php bloginfo('sitename') ?> - Chi Siamo" />
			</div>
		</div>
	</div>
	<!-- .row -->
</div>
<!-- /.container -->

<?php
get_footer();
