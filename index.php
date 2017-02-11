<?php get_header(); ?>        

        <div class="sidebar-left">            		
	    	<?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-left') ) : ?> 
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
        
        
        
        
        
        
	        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-right') ) : ?> 
            <?php endif; ?> 
        </div>
        	
<?php get_footer(); ?>	
