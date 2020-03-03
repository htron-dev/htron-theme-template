<?php
namespace HtronTheme\Includes\Header;

class DefaultHeader {
    private $html;
    private $site_tile;
    private $site_url;
    public function __construct(){
        $this->site_tile = get_bloginfo("name");
        $this->site_url = get_bloginfo("url");

        $this->html .= "<header class='container-fluid mb-4'>";
        $this->html .= "<div class='row'>";
        $this->html .= "<div class='col-12 htron-theme-header border-bottom'>";
        $this->html .= "<h1 class='site-title'><a href='$this->site_url'>$this->site_tile</a></h1>";
        $this->html .= "</div>"; // col
        $this->html .= "<div class='col-12 htron-theme-header-menu border-bottom'>";
        $this->html .= $this->get_menu();
        $this->html .= "</div>"; // col
        $this->html .= "</div>"; // row
        $this->html .= "</header>";
    }
    public function get_html() {
        return $this->html;
    }
    public function get_menu () {
        $args = [
            "echo" => false,
            "walker" => new \HtronTheme\Includes\Wordpress\Walker(),
            "depth"           => 1, // no dropdowns
            "container"       => "div",
            "menu_class"      => "nav justify-content-center",
        ];

        return wp_nav_menu($args);
    }
}