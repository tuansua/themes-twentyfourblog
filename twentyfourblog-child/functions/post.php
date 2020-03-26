<?php 
function long_content($text){
  if(strlen($text) >=110){
    $cut= substr($text,0, 110);
    return substr($cut,0, strrpos($cut," ")).'...';
  }else return $text;
}
function long_content3 ($text, $number){
  if(strlen($text) >=$number){
    $cut= substr($text,0, $number);
    return substr($cut,0, strrpos($cut," ")).'...';
  }else return $text;
}
function new_home( $temp = '',$postPerPage= '',$format = '' ) {
  if ($postPerPage == '') {
        $postPerPage = 5;
  }
  $args = array(
  'posts_per_page'   => $postPerPage,
  'category'         => $temp,
  'orderby'          => 'date',
  'order'            => 'DESC',
  'post_type'        => 'post',
  'post_status'      => 'publish'
  );
  $myposts = get_posts( $args ); 
  $count = '1';
    if ( $myposts ) {
      if ($format == 1) {
        $string = '<div class="fomat'.$format.'-container">';
                      foreach ( $myposts as $post ) :
                        setup_postdata( $post );
                        $idpos = $post->ID;
                        $permalink = get_permalink($idpos);
                        $posttitle = $post->post_title;
                        if ($count == '1') {
                          $string .= '<div class="item-fomat-1 item-'.$count.'">
                            <a href="'.$permalink.'" title="'.$posttitle.'">';
                              if ( has_post_thumbnail($idpos) ) { 
                                $string .= get_the_post_thumbnail( $idpos, 'large', array( 'class' => 'blog-wp-post-image' ) ); 
                            }
                $string .= '</a>
                            <div class="blog-desc">
                              <h4><a href="'.$permalink.'" title="'.$posttitle.'">'.$posttitle.'</a></h4>
                            </div>
                          </div>
                          <div class="fomat'.$format.'-row2">';
                        } else {
                          $string .= '<div class="item-fomat-1 item-'.$count.'">
                            <a href="'.$permalink.'" title="'.$posttitle.'">';
                              if ( has_post_thumbnail($idpos) ) { 
                                $string .= get_the_post_thumbnail( $idpos, 'medium', array( 'class' => 'blog-wp-post-image' ) ); 
                            }
                $string .= '</a>
                            <div class="blog-desc">
                              <h4><a href="'.$permalink.'" title="'.$posttitle.'">'.$posttitle.'</a></h4>
                            </div>
                          </div>';
                          if ($count == $postPerPage) {
                            $string .= '</div>';
                          }
                        }
                        $count++;
                      endforeach; 
                      wp_reset_postdata();
        $string .= '</div>';
      } else {
        $string = '<div class="Latest_news_dm">
                    <ul class="ul-first_dm lionelpham">';
                      foreach ( $myposts as $post ) :
                            setup_postdata( $post );
                            $idpos = $post->ID;
                            $posttime = get_post_time('H:i \| d/m/Y', false, $idpos);
                            $permalink = get_permalink($idpos);
                            $posttitle = $post->post_title;
                            setup_postdata( $post );
                            if ($count <= '5') {
                              $string .= '';
                            } else {
                              $string .= '<li class="home-new">';
                                            $string .= '<div class="blog-photo">';
                                              $string .= '<a href="'.$permalink.'" title="'.$posttitle.'">';
                                            if ( has_post_thumbnail($idpos) ) { 
                                                $string .= get_the_post_thumbnail( $idpos, 'medium', array( 'class' => 'blog-wp-post-image' ) ); 
                                            }
                                  $string .= '</a>';
                                            $string .= '</div>';
                                            $string .= '<div class="blog-desc">';
                                              $string .= '<h4><a href="'.$permalink.'" title="'.$posttitle.'">'.long_content3($posttitle, 70).'</a></h4>';
                                              $string .= '<div class="time-post">';
                                                $string .= '<p>'.$posttime.'</p>';
                                                $string .= '<p>';
                                                $category = get_the_category($post->ID);
                                                    foreach ($category as $key => $value) {
                                                      $string .= '<a href="'.home_url().'/category/'.$value->slug.'">'.$value->cat_name.'</a>';
                                                    }
                                                $string .= '</p>';
                                              $string .= '</div>';
                                            $string .= '</div>';
                                          $string .= '</li>';
                            }
                          $count++;
                      endforeach; 
                      wp_reset_postdata();
        $string .= '</ul>';
        $string .= '<div class="tsloadmore">Xem Thêm</div>';
                  $string .= '</div>';
        wp_reset_postdata();
      }
    }
    return $string;
}
?>