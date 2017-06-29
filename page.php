<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 *
 * @package WordPress
 * @subpackage akad
 * @since akad 1.0
 */

get_header(); ?>
    <!-- HERO SECTION  -->
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">
                <?php the_title(); ?>
            </div>
            <div class="small-title montserrat-text uppercase">
                <?php
                    $pageFrontID = get_option('page_on_front');
                    $pageFrontTitle = get_the_title($pageFrontID); 
                    $slugCurrentPage = get_post_field( 'post_name', get_post() );
                ?>

                <?php echo $pageFrontTitle; ?> / <?php echo $slugCurrentPage; ?>
                    
            </div>                
        </div>
    </div><!-- /.HERO SECTION -->

    <section>
        <div class="container">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </section>   

<?php get_footer(); ?>