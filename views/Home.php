<?php
namespace HtronTheme\Views;

class Home extends Layout {    
    private $posts_html = "";
    
    public function addPost($post_card){
        $html = "<div class='card mb-4'>";
        
        if ($post_card->thumbnail_url) {
            $html .= "<a href='$post_card->permalink'><img  class='card-img-top'  src='$post_card->thumbnail_url'></a>";
        }
        $html .= "<div class='card-body'>";
        
        $html .= "<h2 class='h4  card-title'><a class='card-link' href='$post_card->permalink'>$post_card->title</a></h2>";
        $html .= "<p class='card-text text-secondary'><small>$post_card->date</small></p>";
        $html .= "<p class='card-text'>$post_card->excerpt</p>";
        $html .= "<div class='text-right'>";
        $html .= "<a href='$post_card->permalink' class='btn btn-primary'>". __("Read more", "htronthemetemplate") ."</a>";
        $html .= "</div>";

        $html .= "</div>"; // body

        $html .= "</div>";
        $this->posts_html .= $html;
    }
    public function setPagination () {
        $pagination = new \HtronTheme\Includes\Pagination\PostsPagination();
        $this->posts_html .= $pagination->get_html();
    }

    public function render () {
        if (have_posts()) :
            $post_card = new \stdClass();
            while(have_posts()) : the_post();
                $post_card->title = get_the_title();
                $post_card->thumbnail_url = get_the_post_thumbnail_url();
                $post_card->excerpt = get_the_excerpt();
                $post_card->date = get_post_time("Y-m-d");
                $post_card->permalink = get_permalink();
                $this->addPost($post_card);
            endwhile;
            
            $this->setPagination();
            $this->setBody($this->posts_html);
        endif;
        parent::render();
    }
}