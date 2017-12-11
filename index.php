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

wp_enqueue_script('airtime-showinfo');

get_header();
?>

<div class="row">

<!-- start index.php -->

	<!-- start main sidebars -->
	<div class="col s12 m6">
		<?php if( function_exists('wp_content_slider') ): ?>
			<div class="card-panel">
				<?php wp_content_slider() ?>
			</div>
		<?php endif ?>

		<?php if( function_exists('dynamic_sidebar') ): ?>
			<div class="card-panel">
				<!-- start homepage-left -->
					<?php dynamic_sidebar('homepage-left') ?>
				<!-- end homepage-left -->
			</div>
		<?php endif ?>
	</div>
	<!-- end main sidebars -->

	<!-- start main content -->
	<div class="col s12 m6">
		<?php BorderRadioPlayer::spawn() ?>
	</div>

	<?php if( function_exists('dynamic_sidebar') ): ?>
	<div class="col s12 m6">
		<div class="card-panel">
			<!-- start homepage-right sidebar -->
			<?php dynamic_sidebar('homepage-right') ?>
			<!-- end homepage-right sidebar -->
		</div>
	</div>
	<?php endif ?>
	<!-- end main content -->

<!-- end index.php -->

</div>
<?php

get_footer();
