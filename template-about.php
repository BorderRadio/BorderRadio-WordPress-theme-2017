<?php 
/**
* Template Name: Page About
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
            <div class="fix-header-right">
				<div class="onair-border">
					<div class="onair_img">
						<a href="javascript:Popup('http://stream.border-radio.it/player/radio.html')" style="background-image: url(http://www.border-radio.it/wp-content/themes/BorderRadio/images/br-ascoltaora.gif);" title="Border Radio - On Air"></a>                    
                    </div>
					<div class="onair_text">
						<div id="headerLiveHolder">
        	            </div>
                    </div>
                    <div class="onair-palinsesto">
                    	<a href="http://www.border-radio.it/palinsesto/" title="Scopri l'intero palinsesto">Scopri l'intero palinsesto >></a>
                    </div>
				</div>
			</div>
			<div class="clear"></div>
		    <img src="<?php bloginfo('template_directory'); ?>/images/border-radio_about.jpg" alt="Border-Radio - Chi Siamo" width="440" height="660" border="0"/>
        </div>	
<?php get_footer(); ?>	