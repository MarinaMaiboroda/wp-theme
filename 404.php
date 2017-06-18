<?php
/**
 * The template for error pages
 *
 * This is the template that displays all pages by default.
 *
 * @package WordPress
 * @subpackage Loral_Langemeier
 * @since Loral Langemeier 1.0
 */

?>

<?php get_header(); ?>
<div class="page">
    <img class="page-banner" src="<?= get_template_directory_uri ();?>/dist/images/page-banner.png" alt="banner image"/>
    <div class="full-container">
	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
    	<article class="column-4">
	<?php else: ?>
	<article>
	<?php endif; ?>
            	<h1 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
		<div class="page-content">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>
        	<?php get_search_form(); ?>
		</div><!-- .page-content -->
         </article>
	<aside class="column-2">	
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	<?php endif; ?>
	</aside>
    </div>
</div>

<?php get_footer(); ?>