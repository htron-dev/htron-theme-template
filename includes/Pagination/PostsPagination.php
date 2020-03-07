<?php
/**
 * PaginationPosts
 * Number pagination for archives of posts
 * =====================================================
 */
namespace HtronTheme\Includes\Pagination;

class PostsPagination {
    private $html;
    public function __construct(){
        $this->html = "";
    
        $links = paginate_links( array(
            'prev_next'          => false,
            'type'               => 'array'
          ) );
          
        if ( $links ) {

              
            $this->html .= "<nav aria-label='Page navigation example'>";
            $this->html .= "<ul class='pagination justify-content-center'>";
              
            // get_previous_posts_link will return a string or void if no link is set.
            if ( $prev_posts_link = get_previous_posts_link( __( "Previous Page", "htronthemetemplate" ) ) ) {
                  
                $this->html .= "<li class='page-item'>";
                $this->html .= $prev_posts_link;
                $this->html .= '</li>';
            }
                
            foreach($links as $index => $link) {
                // replace default class
                $links[$index] = str_replace( 'class="page-numbers"', 'class="page-link"', $link);
                $links[$index] = str_replace( 'class="page-numbers dots"', 'class="page-link disabled"', $links[$index]);
                $links[$index] = str_replace( 'class="page-numbers current"', 'class="page-link disabled"', $links[$index]);
            }
                
            $this->html .= "<li class='page-item'>";
            $this->html .= join( "</li><li class='page-item'>", $links );
            $this->html .= '</li>';
                
            // get_next_posts_link will return a string or void if no link is set.
            if ( $next_posts_link = get_next_posts_link( __( "Next Page", "htronthemetemplate" ) ) ) {

                $this->html .= "<li class='page-item'>";
                $this->html .= $next_posts_link;
                $this->html .= "</li>";
            }

            $this->html .= "</ul>";
            $this->html .= "</nav>";
        }
    }

    public function get_html() {
        return $this->html;
    }

    public function render() {
        echo $this->html;
    }
}