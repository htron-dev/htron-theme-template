<?php
/**
 * Wp enqueue functions
 * Register all js and css files
 * =====================================================
 */
namespace HtronTheme\Includes\Wordpress;

class Enqueue {
    public function init() {
        // enquen files in wordpress hook
        add_action( "wp_enqueue_scripts", function () {
            $this->register_enqueues();
            $this->enqueue_files();
        });
    }
    public function register_enqueues() {
        wp_register_script( "main", get_template_directory_uri() . "/assets/dist/main.js", [], 1.1, true);
        wp_register_style( "main", get_template_directory_uri() . "/assets/dist/css/main.css",false,"1.1","all");
    }
    public function enqueue_files () {
        wp_enqueue_script("main");
        wp_enqueue_style("main");
    }
}
