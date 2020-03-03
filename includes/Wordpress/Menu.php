<?php
/**
 * Menu functions
 * Register theme menus
 * =====================================================
 */
namespace HtronTheme\Includes\Wordpress;

class Menu {
    public function init() {
        add_action("init", function () {
            register_nav_menu("default-menu", __("Default Menu", "htronthemetemplate"));
        });   
    }    
}
