<?php
namespace HtronTheme\Views;

class Home extends Layout {    
    private $posts_html = "";
    
    public function addPost($post_card){
        $html = "<div class='card mb-4'>";
        
        if ($post_card->thumbnail_url) {
            $html .= "<img  class='card-img-top'  src='$post_card->thumbnail_url'>";
        }
        $html .= "<div class='card-body'>";
        
        $html .= "<h5 class='card-title'>$post_card->title</h5>";
        $html .= "<p class='card-text'>$post_card->excerpt</p>";
        $html .= "<p class='card-text'><small>$post_card->date</small></p>";

        $html .= "</div>"; // body

        $html .= "</div>";
        $this->posts_html .= $html;
    }

    public function render () {
        if (have_posts()) :
            $post_card = new \stdClass();
            while(have_posts()) : the_post();
                $post_card->title = get_the_title();
                $post_card->thumbnail_url = get_the_post_thumbnail_url();
                $post_card->excerpt = get_the_excerpt();
                $post_card->date = get_post_time("Y-m-d");
                $this->addPost($post_card);
            endwhile;
            $this->setBody($this->posts_html);
        endif;
        parent::render();
    }
}