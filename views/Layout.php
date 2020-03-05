<?php
namespace HtronTheme\Views;

class Layout {
    private $html;
    private $header;
    private $footer;
    private $sidebar;
    private $body;
    private $options;
    
    function __construct($options = null){
        if(!$options){
            $this->options = new \stdClass();
            $this->options->sidebar = true;            
            $this->options->header = true;
            $this->options->footer = true;
            // set header
            $this->setHeader();
            $this->setSidebar();
        }
    }
    // set name of sidebar
    function setSidebar (string $sidebar = null) {
        if(!$sidebar) {
            $this->sidebar = "htron-theme-sidebar";
        }
    }

    function setBody (string $body) {
        $this->body = $body;
    }
    function setHeader(string $header = null) {
        if (!$header) {
            $header = new \HtronTheme\Includes\Header\DefaultHeader();
            $this->header = $header->get_html();
        }
    }

    function render(){
        
        // if wanna show header
        if($this->options->header){
            get_header();
            echo $this->header;
        }

        echo "<div class='container'>";
        echo "<div class='row'>";
        
        echo "<main class='col-12 col-md'>";
        echo $this->body;
        echo "</main>";
        
        // if wanna show sidebar
        if($this->options->sidebar && is_active_sidebar($this->sidebar)){
            echo "<aside class='htron-theme-sidebar col-12 col-md-4 border'>";
            get_sidebar($this->sidebar);
            echo "</aside>";
        }
        
        echo "</div>"; // row
        echo "</div>"; // container
        
        // if wanna show footer
        if($this->options->footer){
            get_footer();
        }
    }
}