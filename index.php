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
 <!-- HERO SECTION  -->
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">
                <?php the_title(); ?>
            </div>
            <div class="small-title montserrat-text uppercase">
                <?php
                    $pageFrontID = get_option('template');
                    var_dump(the_ID());
                    $pageFrontTitle = get_the_title($pageFrontID); 
                    $slugCurrentPage = get_post_field( 'post_name', get_post() );
                ?>

                <?php echo $pageFrontTitle; ?> / <?php echo $slugCurrentPage; ?>
                    
            </div>                
        </div>
    </div><!-- /.HERO SECTION -->


  <section>
		<div class="container">
			<div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="col-md-9 col-sm-12">
			<?php else : ?>	
					<div class="col-xs-12">
			<?php endif; ?>	
			
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
							<!-- blog post -->
							<div class="blog_post">
								<div class="post_media">
									 <?php the_post_thumbnail('full'); ?>
								</div>
								<div class="post_info">
									<div class="post_date montserrat-text uppercase"><?php the_date('F d, Y'); ?></div>
									<i class="icon ion-chatbox-working"></i>
									<span>8</span>
									<i class="icon ion-ios-heart"></i>
									<span>15</span>
								</div>
								<?php the_excerpt(); ?>
							</div>
			<?php endwhile; endif; ?>		
	
			<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

			</div><!-- end col -->

				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="col-md-3">
					<div class="sidebar">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					</div>
				<?php endif; ?>	
			</div><!-- end row -->
		</div><!-- end container -->
	</section>


<?php get_footer(); ?>