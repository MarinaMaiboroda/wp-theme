<?php
/**
 * Template Name: Show benefit and team sections
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

    <?php 
        $args = array(
            'post_parent' => get_the_ID(), //ID parent page
            'post_type'   => 'page', 
            'numberposts' => 2,
            'orderby'     => 'ID',
            'order'       => 'ASC'
        );

        $children = get_children( $args );

        //var_dump($children);
?>  


        <section>
        <div class="container">
            <div class="row">
                <?php 
                    foreach ( $children as $childPage ): ?>
                    <div class="col-md-6">
                        <div class="section-title" style="text-align:left;float:left;width:100%;margin-bottom:0">
                            <span><?php echo $childPage->post_title; ?></span>

                            <?php                             
                              $subtitle = get_post_meta( $childPage->ID, 'Subtitle', true );
                               //var_dump($subtitle);
                            ?>

                            <p class="montserrat-text uppercase"><?php echo $subtitle;?></p>
                        </div>

                        <?php echo $childPage->post_content; ?>
                    </div>

                    <?php endforeach; ?>              

            </div>
        </div>
    </section>

     <section>
  <div class="container">
   <div class="row">
    <div class="section-title">
    <?php $benefit = get_post('56');
     //var_dump($benefit);
    ?>
     <span><?php echo $benefit->post_title; ?></span>
     <?php echo $benefit->post_content; ?>
    </div>
   </div>

   <?php 
     query_posts( array(
     'post_type'      => 'benefit',
     'order'          => 'ASC',
     'orderby'        => 'ID'
     ) );?>
     
   <div class="row">
     <?php if (have_posts()): while (have_posts()): the_post(); 
       $icon_class = types_render_field("icon-benefit", array("output"=>"raw")); ?>
      <div class="col-md-4 col-sm-6 col-xs-12 benefits_2_single wow fadeInUp">
       <i class="icon <?php echo $icon_class; ?>"></i>
       <span class="title montserrat-text uppercase"><?php the_title(); ?></span>
       <?php the_content(); ?>
      </div>
     <?php endwhile; endif;

      wp_reset_query();
     ?>
   </div>
  </div>
 </section>


<?php get_footer(); ?>