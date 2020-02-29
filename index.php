<?php
namespace HtronTheme;

require_once __DIR__ . "/vendor/autoload.php";
get_header();
wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/dist/js/main.js', array ( 'jquery' ), 1.1, true);
wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/dist/css/main.css',false,'1.1','all');
$home = new Includes\Home;

$home->render();

get_footer();