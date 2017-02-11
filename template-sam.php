<?php 
/**
* Template Name: Page Sam
*/
get_header(); ?>        
        <div class="sidebar-left">
        			
            <!-- YOUTUBE-->
            <iframe style="float: left; margin-bottom: 25px;" src="http://www.youtube.com/embed/TdbJTnKCOgY" frameborder="0" width="460" height="319"></iframe>
        	
            
            <!-- TWITTER-->
            <div class="twitter-widget">
				<a class="twitter-timeline" width="460" height="400" href="https://twitter.com/sam_museum" data-widget-id="314518261272297472">Tweets di @sam_museum</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            
            
            <div class="mixcloud-widget">   
<iframe width="460" height="160" src="//www.mixcloud.com/widget/iframe/?feed=http%3A%2F%2Fwww.mixcloud.com%2FBorderRadio%2Fspot-audio-per-sam013-long-version%2F&embed_uuid=2f997ba5-5535-49a5-966a-dde12e70a262&stylecolor=&embed_type=widget_standard" frameborder="0"></iframe>
			</div>
           
           
	    </div>
	    <div class="sidebar-right">
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
<?php get_footer(); ?>