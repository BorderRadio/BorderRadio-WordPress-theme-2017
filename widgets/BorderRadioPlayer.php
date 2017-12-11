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

class BorderRadioPlayer {
	static function spawn() {
	?>
		<!-- BorderRadioPlayer -->
		<div class="card-panel onair-border">
			<div class="onair_img">
				<!-- TODO: Move to a JavaScript own file callback -->
				<a href="javascript:Popup('<?php echo urlencode( RADIO_STREAM_PAGE ) ?>')" title="<?php bloginfo('sitename') ?> - On Air"></a>
			</div>
			<div class="onair_text">
				<div id="headerLiveHolder"></div>
			</div>
			<div class="onair-palinsesto">
				<a href="/palinsesto/" title="Scopri l'intero palinsesto">Vedi palinsesto</a>
			</div>
		</div>
		<!-- /BorderRadioPlayer -->
	<?php
	}
}

