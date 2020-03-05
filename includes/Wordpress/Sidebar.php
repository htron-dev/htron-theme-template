<?php
/**
 * Sidebar functions
 * Register sidebar
 * =====================================================
 */
namespace HtronTheme\Includes\Wordpress;

class Sidebar {
    public function init() {
        add_action("widgets_init", function () {
            $args = [
                "id" => "htron-theme-sidebar",
                "name" =>  __("Theme sidebar", "htronthemetemplate"),
                "before_widget" => '<section id="%1$s" class="py-3 px-2 my-3">',
                "after_widget" => "</section>",
                "before_title" => "<h4 class='h5 pb-2 mb-3 border-bottom'>",
                "after_title" => "</h4>",
            ];
            register_sidebar($args);
        });
    }
}
