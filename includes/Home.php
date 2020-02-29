<?php

namespace HtronTheme\Includes;
class Home {
    private $view;
    
    public function __construct(){
        $this->view = new \HtronTheme\Views\Home();
    }

    public function render($args = null){
        if( have_posts() ) :
            while (have_posts()): the_post();
                $this->view->addPost(get_post());
            endwhile;
        endif;

        $this->view->render();
    }
}