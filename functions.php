<?php

add_action('set_current_user', 'csstricks_hide_admin_bar');
function csstricks_hide_admin_bar() {
  if (current_user_can('edit_posts')) {
    show_admin_bar(false);
  }
}
/* Add Styles and Scripts */

function enqueue_styles() {
	wp_enqueue_style( 'akad', get_stylesheet_uri());
  wp_register_style('animate', get_template_directory_uri () . '/dist/css/animate.css');
  wp_enqueue_style('animate');

  wp_register_style('animsition', get_template_directory_uri () . '/dist/css/animsition.min.css');
  wp_enqueue_style('animsition');

  wp_register_style('slider', get_template_directory_uri () . '/dist/css/flexslider.css');
  wp_enqueue_style('slider');

  wp_register_style('icons', get_template_directory_uri () . '/dist/css/ionicons.min.css');
  wp_enqueue_style('icons');

	wp_register_style('general-styles', get_template_directory_uri () . '/dist/css/general.min.css');
	wp_enqueue_style( 'general-styles');
}

add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('jquery-scripts', get_template_directory_uri () . '/dist/js/jquery-2.1.4.min.js', '', '', true);
	wp_enqueue_script('jquery-scripts');

  wp_register_script('animsition', get_template_directory_uri () . '/dist/js/jquery.animsition.min.js', '', '', true);
  wp_enqueue_script('animsition');

  wp_register_script('flexslider', get_template_directory_uri () . '/dist/js/jquery.flexslider.js', '', '', true);
  wp_enqueue_script('flexslider');

  wp_register_script('social-btn', get_template_directory_uri () . '/dist/js/jquery.social-buttons.min.js', '', '', true);
  wp_enqueue_script('social-btn');

  wp_register_script('wow', get_template_directory_uri () . '/dist/js/wow.min.js', '', '', true);
  wp_enqueue_script('wow');

  wp_register_script('isotope', get_template_directory_uri () . '/dist/js/isotope.pkgd.min.js', '', '', true);
  wp_enqueue_script('isotope');

  wp_register_script('main-js', get_template_directory_uri () . '/dist/js/main.js', '', '', true);
  wp_enqueue_script('main-js');

	wp_register_script('general-scripts', get_template_directory_uri () . '/dist/js/general.min.js', '', '', true);
        wp_enqueue_script('general-scripts');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

/* Add thumb for posts and pages */
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

/* Add Menus */

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'main', __( 'Top Menu', 'akad' ) );
  register_nav_menu( 'footer', __( 'Footer Menu', 'akad' ) );
}

function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="second-level" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');  

/* Chenge eecept */
function custom_excerpt_length() {
    $length = 25;
    return $length;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function clean_excerpt_more() {
    return '';
}

add_filter( 'excerpt_more', 'clean_excerpt_more' );

function custom_the_excerpt( $excerpt ) {
    $ellipsis = ' ';
    
    $link = $ellipsis .'<a class="more-link" href="' . get_permalink() . '">Read More</a>';
    return $excerpt . $link;
}

add_filter( 'get_the_excerpt', 'custom_the_excerpt' );

/** Add Sidebar **/
add_action( 'widgets_init', 'akad_widgets_init' );
function akad_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Column 1', 'akad' ),
        'id' => 'footer-1',
        'description' => __( 'Widgets in this area will be shown on the footer.', 'akad' ),
        'before_widget' => ' <div id="%1$s" class="one-aside-block">',
	       'after_widget'  => '</div>',
	       'before_title'  => '<h3>',
	       'after_title'   => '</h3>',
    ) );

 //    register_sidebar( array(
 //        'name' => __( 'Footer column 2', 'akad' ),
 //        'id' => 'footer-2',
 //        'description' => __( 'Widgets in this area will be shown on the footer.', 'akad' ),
 //        'before_widget' => ' <div id="%1$s" class="one-aside-block">',
	// 'after_widget'  => '</div>',
	// 'before_title'  => '<h3>',
	// 'after_title'   => '</h3>',
 //    ) );

 //    register_sidebar( array(
 //        'name' => __( 'Footer column 3', 'akad' ),
 //        'id' => 'footer-3',
 //        'description' => __( 'Widgets in this area will be shown on the footer', 'akad' ),
 //        'before_widget' => ' <div id="%1$s" class="one-aside-block">',
	// 'after_widget'  => '</div>',
	// 'before_title'  => '<h3>',
	// 'after_title'   => '</h3>',
 //    ) );

 //    register_sidebar( array(
 //        'name' => __( 'Main sidebar', 'lorallangemeier' ),
 //        'id' => 'main-sidebar',
 //        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'lorallangemeier' ),
 //        'before_widget' => ' <div id="%1$s" class="">',
	// 'after_widget'  => '</div>',
	// 'before_title'  => '<h3>',
	// 'after_title'   => '</h3>',
 //    ) );

 //    register_sidebar( array(
 //        'name' => __( 'Home sidebar', 'lorallangemeier' ),
 //        'id' => 'home-sidebar',
 //        'description' => __( 'Widgets in this area will be shown on home page for show featured news.', 'lorallangemeier' ),
 //        'before_widget' => ' <div id="%1$s" class="">',
	// 'after_widget'  => '</div>',
	// 'before_title'  => '<h4>',
	// 'after_title'   => '</h4>',
 //    ) );
}

function wp_corenavi() {  
  global $wp_query, $wp_rewrite;  
  $pages = '';  
  $max = $wp_query->max_num_pages;  
  if (!$current = get_query_var('paged')) $current = 1;  
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));  
  $a['total'] = $max;  
  $a['current'] = $current;  
  
  $total = 1; //1 - выводить текст "—траница N из N", 0 - не выводить  
  $a['mid_size'] = 2; //сколько ссылок показывать слева и справа от текущей  
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце  
  $a['prev_text'] = '&lt;&nbsp;Previous'; //текст ссылки "ѕредыдуща¤ страница"  
  $a['next_text'] = 'Next&nbsp;&gt;'; //текст ссылки "—ледующа¤ страница"  
  
  if ($max > 1) echo '<div class="navigation">';  
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";  
  echo $pages . paginate_links($a);  
  if ($max > 1) echo '</div>';  
}  

?>