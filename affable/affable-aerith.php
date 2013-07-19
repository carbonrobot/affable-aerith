<?php

add_action('after_setup_theme', 'affable_setup', 17);
add_action('customize_register', 'affable_customize_register');

function affable_setup()
{
  add_action('wp_enqueue_scripts', 'affable_scripts_and_styles', 1000);

  // Remove stuffs we don't support (yet)
  unregister_nav_menu('footer-links');
  remove_theme_support('custom-background');
}

function affable_customize_register($wp_customize)
{
  $wp_customize->add_setting('affable_avatar_image_url', array(
    'default' => 'http://lorempixel.com/150/150/cats',
  ));
  $wp_customize->add_setting('affable_gravatar_email', array(
    'default' => '',
  ));

  $wp_customize->add_control('affable_gravatar_email', array(
    'label'   => __('Gravatar Email Address', 'bonestheme'),
    'section' => 'title_tagline',
  ));
  $wp_customize->add_control('affable_avatar_image_url', array(
    'label'   => __('Avatar Image Url', 'bonestheme'),
    'section' => 'title_tagline',
  ));
}

function affable_scripts_and_styles()
{
  if (!is_admin()) {
    wp_register_script('affable-js', get_stylesheet_directory_uri() . '/affable/js/all.js', array('jquery'), '', true);
    wp_register_style('affable-stylesheet', get_stylesheet_directory_uri() . '/affable/css/all.css', array(), '', 'all');

    wp_dequeue_script('bones-js');
    wp_dequeue_style('bones-stylesheet');

    wp_enqueue_script('affable-js');
    wp_enqueue_style('affable-stylesheet');
  }
}

/**
 * Returns the gravatar image if it is set. If not, tries to get the image url set in the
 * theme customization page.
 * @return string
 */
function affable_get_avatar_image_url()
{
  $email = trim(strval(get_theme_mod('affable_gravatar_email')));
  if (!empty($email)) {
    // https://en.gravatar.com/site/implement/hash/
    $hash = md5(strtolower($email));
    return "http://secure.gravatar.com/avatar/{$hash}?s=150";
  }

  return get_theme_mod('affable_avatar_image_url');
}

function affable_html_current_post_byline()
{
  $text = 'in %1$s &middot; <time class="updated" datetime="%2$s" pubdate>%3$s</time>';
  return sprintf(__($text, 'affable_aerith'), get_the_category_list(', '), get_the_time('Y-m-j'),
    get_the_time(get_option('date_format')));
}

function affable_main_nav()
{
  wp_nav_menu(array(
    'container'       => 'div',
    'container_class' => 'main-nav clearfix',
    'menu'            => __('The Main Menu', 'bonestheme'),
    'menu_class'      => '',
    'theme_location'  => 'main-nav',
    'depth'           => 1, // Only 1st level is supported
    'fallback_cb'     => 'affable_main_nav_fallback'
  ));
}

function affable_main_nav_fallback()
{
  wp_page_menu(array(
    'show_home'  => true,
    'menu_class' => 'main-nav clearfix', // adding custom nav class
  ));
}


function affable_article_tags()
{
  the_tags('<span class="tags-title">' . __('Tagged', 'bonestheme') . '</span> ', ' ', '');
}
