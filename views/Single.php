<?php
namespace HtronTheme\Views;

class Single extends Layout {    
    private $posts_html = "";
    
    public function setPost($post){
        $html = "<div class='card mb-4'>";
        
        if ($post->thumbnail_url) {
            $html .= "<a href='$post->permalink'><img  class='card-img-top'  src='$post->thumbnail_url'></a>";
        }
        $html .= "<div class='card-body'>";
        
        $html .= "<h1 class='h4 card-title text-primary'>$post->title</h1>";
        $html .= "<p class='card-text text-secondary mb-3'><small>$post->date</small></p>";
        $html .= $post->content;

        $html .= "</div>"; // body

        $html .= "</div>";
        $this->posts_html .= $html;
    }

    public function render () {
        if (have_posts()) :
            $post = new \stdClass();
            while(have_posts()) : the_post();
                $post->title = get_the_title();
                $post->thumbnail_url = get_the_post_thumbnail_url();
                $post->content = get_the_content();
                $post->date = get_post_time("Y-m-d");
                $post->permalink = get_permalink();
                $this->setPost($post);
            endwhile;
            $this->setBody($this->posts_html);
        endif;
        parent::render();
    }
}