<?php
/**
 * Pagination functions
 * add classes to pagination links
 * =====================================================
 */
namespace HtronTheme\Includes\Wordpress;

class Pagination {
    public function init() {
        add_filter("next_posts_link_attributes", function ($html) {
            return "class='page-link'";
        });
        add_filter("previous_posts_link_attributes", function ($html) {
            return "class='page-link'";
        });
    }    
}
