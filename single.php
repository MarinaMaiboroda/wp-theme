<?php
/**
 * The template for displaying all single posts and attachments
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
            <?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
                <h1 class="entry-title"><?php the_title();?></h1>
                <p class="date"><?php echo get_the_date($the_query -> ID); ?> by <?php the_author_posts_link();?></p>
		<!--<div class="post-thumbnail"><?php //the_post_thumbnail();?></div>-->
		<?php the_content();?>
                <?php endwhile; ?> 
		<hr/>
		<?php echo "FILED UNDER:"; the_category(','); echo " >>" ?> <?php the_tags('TAGGED WITH: '); ?>
         </article>
	<aside class="column-2">	
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	<?php endif; ?>
	</aside>
    </div>
</div>

<?php get_footer(); ?>