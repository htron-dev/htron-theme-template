<?php
namespace HtronTheme\Views;

class Layout {
    private $html;
    private $header;
    private $footer;
    private $sidebar = "<aside class='bg-secondary col-12 col-md-4'>side</aside>";
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
        }
    }

    function setSidebar (string $sidebar) {
        $this->sidebar = $sidebar;
    }

    function setBody (string $body) {
        $this->body = $body;
    }
    function setHeader(string $header = null) {
        if(!$header) {
            $this->header .= "<header class='bg-warning container-fluid mb-4'>";
            $this->header .= "<div class='row'>";
            $this->header .= "Header";
            $this->header .= "</div>";
            $this->header .= "</header>";
        }
    }

    function render(){
        
        $this->html .= "<div class='container'>";        
        $this->html .= "<div class='row'>";
        $this->html .= "<main class='col-12 col-md-8'>";
        $this->html .= $this->body;
        $this->html .= "</main>";
        
        if($this->options->sidebar){
            $this->html .= $this->sidebar;
        }
        
        $this->html .= "</div>"; // row
        $this->html .= "</div>"; // container
        
        // if wanna show header
        if($this->options->header){
            get_header();
            echo $this->header;
          
        }

        echo $this->html;
        
        // if wanna show footer
        if($this->options->footer){
            get_footer();
        }
    }
}