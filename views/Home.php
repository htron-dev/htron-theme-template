<?php
namespace HtronTheme\Views;

class Home extends Layout {    
    private $posts = "";
    public function addPost($post){
        $this->posts .= "<h1>$post->post_title</h1>";
    }
}