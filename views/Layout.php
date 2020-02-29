<?php
namespace HtronTheme\Views;

class Layout {
    private $html;
    private $sidebar = "<aside class='bg-secondary'>side</aside>";
    private $body = "body";
    private $options;
    
    function __construct($options = null){
        if(!$options){
            $this->options = new \stdClass();
            $this->options->sidebar = true;            
        }
    }

    function setSidebar(string $sidebar){
        $this->sidebar = $sidebar;
    }

    function setBody(string $body){
        $this->body = $body;
    }

    function render(){
        $this->html .= "<div class='d-flex align-items-stretch w-100'>";        
        
        $this->html .= "<main class='bg-primary'>";
        $this->html .= $this->body;
        $this->html .= "</main>";
        
        if($this->options->sidebar){
            $this->html .= $this->sidebar;
        }

        $this->html .= "</div>";


        echo $this->html;
    }
}