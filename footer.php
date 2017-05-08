<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2015, 2016 Valerio Bozzolan
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

$license_name = 'Creative Commons Attribuzione 3.0 Italia';
$license_url = 'https://creativecommons.org/licenses/by/3.0/it/';

?>

<footer class="page-footer red darken-4">
	<div class="row">
		<div class="col s12 m10 l11">
			<?php get_sidebar('footer') ?>
		</div>
		<div class="col s12 m2 l1">
			<ul>
				<li class="white-text">Ci segui?</li>
				<li><a title="Border Radio on Facebook" href="http://www.facebook.com/Border.Radio.CC" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/facebook.png" alt="Border Radio on Facebook" /></a></li>
				<li><a title="Border Radio on Twitter" href="http://twitter.com/Border_Radio" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/twitter.png" alt="Border Radio on Twitter" /></a></li>
				<li><a title="Border Radio on Flickr" href="http://www.flickr.com/photos/border-radio/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/flickr.png" alt="Border Radio on Flickr" /></a></li>
				<li><a title="Border Radio on Vimeo" href="http://vimeo.com/borderradio" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/vimeo.png" alt="Border Radio on Vimeo" /></a></li>
				<li><a title="Border Radio on YouTube" href="http://www.youtube.com/user/BorderGateRadio" target="_blank"	><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/youtube.png" alt="Border Radio on YouTube" /></a></li>
				<li><a title="RSS - Border Radio" href="http://borderradio.wordpress.com/feed/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/social_icon/rss.png" alt="RSS - Border Radio" /></a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<p class="white-text">Naturalmente, i contenuti del sito sono rilasciati sotto la licenza di contenuto libero <a class="deep-orange-text text-lighten-4" href="<?php echo $license_url ?>" title="<?php echo $license_name ?>" target="_blank"><?php echo $license_name ?></a>. Possono presentarsi eventuali eccezioni.</p>
	</div>
	<div class="footer-copyright">
		<div class="container">
			&copy; <?php echo date('Y') ?> <a class="white-text" href="<?php echo $license_url ?>" title="<?php echo $license_name ?>" target="_blank"><em>Alcuni</em></a> diritti riservati.
		</div>
	</div>
</footer>

<!-- start wp_footer() -->
<?php wp_footer() ?>
<!-- end wp_footer() -->

</body>
</html><?php // Do not waste this newline

