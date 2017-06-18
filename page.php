<?php
/**
 * The template for displaying pages
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
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    	<article class="column-4">
	<?php else: ?>
	<article>
	<?php endif; ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>

         </article>
	<aside class="column-2">	
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	<?php endif; ?>
	</aside>
    </div>
</div>

<?php get_footer(); ?>