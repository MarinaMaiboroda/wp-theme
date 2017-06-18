<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage akad
 * @since akad 1.0
 */

get_header(); ?>
<div class="page">
    <img class="page-banner" src="<?= get_template_directory_uri ();?>/dist/images/page-banner.png" alt="banner image"/>
    <div class="full-container">
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    	<article class="column-4">
	<?php else: ?>
	<article>
	<?php endif; ?>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="news-content">
                                        	<a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
                                                <p class="date"><?php echo get_the_date($the_query -> ID); ?> by <?php the_author_posts_link();?></p>
                                        	<?php the_post_thumbnail('thumbnail'); the_excerpt(__('(Read more)')); ?>
						<hr/>
						<?php echo "FILED UNDER:"; the_category(','); echo " >>" ?> <?php the_tags('TAGGED WITH: '); ?>
					</div>
	<?php endwhile; endif; ?>
          <div class="navigation"><?php if (function_exists('wp_corenavi')) wp_corenavi(); ?></div>    
         </article>
	<aside class="column-2">	
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	<?php endif; ?>
	</aside>
    </div>
</div>
<?php get_footer(); ?>