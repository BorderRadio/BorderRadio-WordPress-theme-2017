<?php 
/**
* Template Name: Page Licenze
*/
get_header(); ?>        
        <div class="sidebar-left">
        	<h1>Una Cultura Condivisa</h1>
			<iframe style="float: left; margin-bottom: 25px;" src="http://player.vimeo.com/video/7165373?title=0&amp;byline=0&amp;portrait=0&amp;color=242b3a" frameborder="0" width="460" height="319"></iframe>
            <h1>A Shared Culture</h1>
            <iframe style="float: left; margin-bottom: 25px;" src="http://www.youtube.com/embed/j8s1ohZDgMU" frameborder="0" width="460" height="315"></iframe>
            <h1>The Power of Open</h1>
            <p style="float:left"><strong>The Power of Open</strong>, un libro che riassume quanto fatto dall'organizzazione nel corso degli anni e racooglie le testimonianza di artisti, giornalisti, registi, amministratori pubblici, scrittori, dj, produttori cinematografici che distribuiscono le proprie opere sotto licenze Creative Commons.</p>
            <p><a href="http://thepowerofopen.org/" target="_blank" title="The Power of open">Download PDF</a></p>
			<img style="float: left; margin-bottom: 10px;" title="cc-book" src="http://www.border-radio.it/wp-content/uploads/2011/10/cc-book.jpg" alt="" width="420" height="742" />
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