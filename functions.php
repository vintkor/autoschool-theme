<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
add_theme_support('post-thumbnails');
remove_action('wp_head', 'wp_generator');

function custom_disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

// --------------------Виджет контакты Карта---------------------------
function maps_text_widget_init() {
	register_sidebar( array(
		'name'          => 'Карта в контактах',
		'id'            => 'maps',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'maps_text_widget_init' );

// --------------------Виджет контакты Форма---------------------------
function contact_form_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Форма в контактах',
    'id'            => 'contact-form',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'contact_form_text_widget_init' );

// --------------------Виджет контакты Footer---------------------------
function form_in_footer() {
  register_sidebar( array(
    'name'          => 'Форма в префутере',
    'id'            => 'contact-footer',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'form_in_footer' );

// ---------------------Вывод максимальнокго количества анонса -----------------
  function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).' ...';
}

// images auto class
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');


// --------------------Регистрация меню--------------------------------------
add_action('init', 'register_nav_menus_on_init');

function register_nav_menus_on_init() {
    register_nav_menus(array(
        'main-menu' => 'Меню сайта'
    ));
}

// --------------------Регистрация меню--------------------------------------
add_action('init', 'footer_menu_1');

function footer_menu_1() {
    register_nav_menus(array(
        'footer-menu-1' => 'Меню в футере левое'
    ));
}

// --------------------Регистрация меню--------------------------------------
add_action('init', 'footer_menu_2');

function footer_menu_2() {
    register_nav_menus(array(
        'footer-menu-2' => 'Меню в футере правое'
    ));
}