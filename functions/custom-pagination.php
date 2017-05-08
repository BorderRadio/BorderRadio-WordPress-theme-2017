<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 03.10.2011 Giampaolo, 2017 Valerio Bozzolan
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

function kriesi_pagination($pages = '', $range = 2) {
	global $paged, $wp_query;

	$showitems = $range * 2 + 1;

	if( empty($paged) ) {
		$paged = 1;
	}

	if($pages == '') {
		$pages = $wp_query->max_num_pages;
		if( ! $pages ) {
			$pages = 1;
		}
	}

	if( 1 == $pages ) {
		return;
	}

	echo '<div class="pagination section">';

	if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
		printf(
			'<a class="%s" href="%s" title="%s">%s</a>',
			BTN_DARK,
			get_pagenum_link(1),
			"Prima",
			'&laquo;'
		);
	}
	if($paged > 1 && $showitems < $pages) {
		printf(
			'<a class="%s" href="%s" title="%s">%s</a>',
			BTN_DARK,
			get_pagenum_link($paged - 1),
			"Indietro",
			'&lsaquo;'
		);
	}
	for($i=1; $i <= $pages; $i++) {
		if(1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
			// asd
		} else {
			continue;
		}

		if( $paged == $i ) {
			printf(
				'<span class="hide-on-small-only btn waves-effect grey">%s</span>',
				$i
			);
		} else {
			printf(
				'<a class="hide-on-small-only %s" href="%s">%s</a>',
				BTN_DARK,
				get_pagenum_link($i),
				$i
			);
		}
	}
	if($paged < $pages && $showitems < $pages) {
		printf(
			'<a class="%s" href="%s" title="%s">%s</a>',
			BTN_DARK,
			get_pagenum_link($paged + 1),
			"Avanti",
			'&rsaquo;'
		);
	}
	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
		printf(
			'<a class="%s" href="%s" title="%s">%s</a>',
			BTN_DARK,
			get_pagenum_link($pages),
			"Ultima",
			'>>'
		);
	}
	echo "</div>\n";
}
