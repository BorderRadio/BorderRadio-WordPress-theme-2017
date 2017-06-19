<?php
# Border Radio 2017 MaterializeCSS WordPress theme
# Copyright (C) 2015, 2016, 2017 Border Radio, Valerio Bozzolan
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
		<div class="col s12 m6 l4">
			<?php if( have_posts() ): ?>
				<?php while( have_posts() ): the_post(); ?>
					<div class="card-panel">
						<h1 class="post-title"><?php the_title() ?></h1>
						<?php the_content() ?>
					</div>
				<?php endwhile ?>
			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
	        	<?php endif ?>
		</div>

		<div class="col s12 m6 l8">
			<div class="card-panel">
				<p class="flow-text">Border Radio è una comunità aperta a tutti coloro che desiderano contribuire attivamente alla promozione e alla diffusione del contenuto libero e della cultura copyleft.</p>
				<p>Se hai delle competenze specifiche o dei contenuti da proporre, se desideri apprendere le nozioni di base per diventare un tecnico audio o uno speaker o se, più semplicemente, hai delle idee o un programma da proporre, <a href="mailto:redazione@border-radio.it" title="Contatti - Border Radio">CONTATTACI</a>!</p>
			</div>

			<?php function template_contatti_single($title, $url, $desc) { ?>
			<!-- Start row <?php echo $title ?> -->
			<div class="card-panel">
				<div class="row">
					<div class="col s3">
						<img src="<?php	 echo get_bloginfo('template_directory') . $url ?>" alt="<?php printf(
							"%s - %s",
							get_bloginfo('sitename'),
							$title
						) ?>" class="responsive-img" />
					</div>
					<div class="col s9">
						<p><?php printf($desc,
							get_bloginfo('sitename')
						) ?></p>
					</div>
				</div>
			</div>
			<!-- end row <?php echo $title ?> -->
			<?php }; ?>

			<?php
			template_contatti_single(
				_("Partecipa"),
				'/images/partecipa.png',
				_(
					"Diventa uno dei nostri volontari, <strong>partecipa</strong> attivamente al nostro progetto " .
					"e <strong>contribuisci</strong> a far crescere Border Radio e a diffondere il germe del copyleft!"
				)
			);
			template_contatti_single(
				_("Speaker"),
				'/images/speaker.png',
				_(
					"Se sei uno speaker e <strong>hai un programma da proporre</strong>, non esitare a contattarci; " .
					"%1\$s propone un palinsesto eterogeneo in continua evoluzione che sarà progressivamente arricchito al fine di offrire agli utenti una programmazione il più possibile diversificata. " .
					"Se, viceversa, aspiri a diventare uno speaker, %1\$s è il <strong>posto giusto dove imparare</strong> a condurre la propria trasmissione radiofonica."
				)
			);
			template_contatti_single(
				_("Tecnici"),
				'/images/tecnici.png',
				_(
					"Sei sei un tecnico e desideri condividere le tue competenze, <strong>entra a far parte della nostra comunità</strong>. " .
					"Se, viceversa, non sei un tecnico ma ti piacerebbe diventarlo, %1\$s può trasmetterti gratuitamente il proprio know-how e proporti un percorso formativo."
				)
			);
			template_contatti_single(
				_("Artisti"),
				'/images/artisti.png',
				_(
					"Border Radio ti offre degli spazi all'interno della propria programmazione e dei propri eventi " .
					"che potrai utilizzare per <strong>promuovere e diffondere le tue creazioni</strong> copyleft."
				)
			);
			template_contatti_single(
				_("Locali"),
				'/images/locali.png',
				_(
					"Se sei il titolare di un locale, <strong>contribuisci alla diffusione dei contenuti copyleft</strong> proposti da %1\$s trasmettendo la radio all'interno del tuo locale o organizzando, ".
					"in collaborazione e con il supporto di Border Radio, degli eventi copyleft."
				)
			);
			?>
		</div>
		<!-- end .col -->
	</div>
	<!-- end .row -->
<?php
get_footer();
