<?php

add_action('after_setup_theme', 'affable_setup', 17);

function affable_setup()
{
  add_action('wp_enqueue_scripts', 'affable_scripts_and_styles', 1000);
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
