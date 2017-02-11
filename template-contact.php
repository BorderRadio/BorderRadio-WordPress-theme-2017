<?php 
/**
* Template Name: Page Contact
*/
get_header(); ?>
        
        <div class="sidebar-left">
		    <?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
                <h1 class="post-title"><?php the_title(); ?></h1>
	            <?php the_content(); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
	        <?php endif; ?>
	    </div>
	    <div class="sidebar-right">
				<p>Border Radio è una comunità aperta a tutti coloro che desiderano contribuire attivamente alla promozione e alla diffusione della cultura copyleft.</p>
				<p>Se hai delle competenze specifiche o dei contenuti da proporre, se desideri apprendere le nozioni di base per diventare un tecnico audio o uno speaker o se, più semplicemente, hai delle idee o un programma da proporre, <a href="mailto:redazione@border-radio.it" title="Contattaci - Border Radio">CONTATTACI</a>!</p>
                <div class="testo-contatti">
                	<img  src="<?php bloginfo('template_directory'); ?>/images/partecipa.png" alt="Border-Radio - Partecipa" />
                    <div>
                    	<span class="titolo-target">PARTECIPA</span>
						<p>Diventa uno dei nostri volontari, <strong>partecipa</strong> attivamente al nostro progetto e <strong>contribuisci</strong> a far crescere Border Radio e a diffondere il germe del copyleft!</p>
					</div>
				</div>                
                <div class="testo-contatti">
                	<img  src="<?php bloginfo('template_directory'); ?>/images/speaker.png" alt="Border-Radio - Speaker" />
                    <div>
                    	<span class="titolo-target">SPEAKER</span>
						<p>Se sei uno speaker e <strong>hai un programma da proporre</strong>, non esitare a contattarci; Border Radio propone un palinsesto eterogeneo in continua evoluzione che sarà progressivamente arricchito al fine di offrire agli utenti una programmazione il più possibile diversificata. Se, viceversa, aspiri a diventare uno speaker, Border Radio è il <strong>posto giusto dove imparare</strong> a condurre la propria trasmissione radiofonica.</p>
					</div>
				</div>
                <div class="testo-contatti">
                	<img  src="<?php bloginfo('template_directory'); ?>/images/tecnici.png" alt="Border-Radio - Tecnici" />
                    <div>
                    	<span class="titolo-target">TECNICI</span>
						<p>Se sei un tecnico e desideri condividere le tue competenze, <strong>entra a far parte della nostra comunità</strong>. Se, viceversa, non sei un tecnico ma ti piacerebbe diventarlo, Border Radio può trasmetterti gratuitamente il proprio know-how e proporti un percorso formativo.</p>
					</div>
				</div>
                <div class="testo-contatti">
                	<img  src="<?php bloginfo('template_directory'); ?>/images/artisti.png" alt="Border-Radio - Artisti" />
                    <div>
                    	<span class="titolo-target">ARTISTI</span>
						<p>Border Radio ti offre degli spazi all'interno della propria programmazione e dei propri eventi che potrai utilizzare per <strong>promuovere e diffondere le tue creazioni</strong> copyleft.</p>
					</div>
				</div>
                <div class="testo-contatti">
                	<img  src="<?php bloginfo('template_directory'); ?>/images/locali.png" alt="Border-Radio - Locali" />
                    <div>
                    	<span class="titolo-target">LOCALI</span>
						<p>Se sei il titolare di un locale, <strong>contribuisci alla diffusione dei contenuti copyleft</strong> proposti da Border Radio trasmettendo la radio all'interno del tuo locale o organizzando, in collaborazione e con il supporto di Border Radio, degli eventi copyleft.</p>
					</div>
				</div>
        </div>	
<?php get_footer(); ?>	