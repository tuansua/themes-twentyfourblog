<?php

get_header();
$current_term = get_queried_object();
print_r($current_term);
?>
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			<h1 class="title-tours1"><?php single_cat_title(); ?></h1>
			<?php
				$count = 1;
					$args = array(
					  'posts_per_page'   => 3,
					  'offset'           => '',
					  'category'         => $temp,
					  'category_name'    => '',
					  'orderby'          => 'date',
					  'order'            => 'DESC',
					  'include'          => '',
					  'exclude'          => '',
					  'meta_key'         => '',
					  'meta_value'       => '',
					  'post_type'        => 'post',
					  'post_mime_type'   => '',
					  'post_parent'      => '',
					  'author'     => '',
					  'author_name'    => '',
					  'post_status'      => 'publish',
					  'suppress_filters' => true
					 );
					$myposts = get_posts( $args );
                        if ( $myposts ) {

                            echo '<ul class="custom-catalog">';
                            foreach ( $myposts as $post ) :
                                setup_postdata( $post );
                            	
                                //print_r($post);
                                 echo '<li class="customcatalog-image">
	                                      <div class="catalog-desc">
	                                      <h2><a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">'.$post->post_title.'</a></h2>
	                                      </div>
	                                    </li>';                         
                                	/*if ($count % 8 == 0) {
                                		echo '<hr style="width: 100%; height: 2px; color: red; margin-top: 10px; margin-bottom: 10px;" />';
                                	}
                            $count++;*/
                            endforeach; 
                            echo '</ul>';
                        wp_reset_postdata();
                    }
               ?>

		</div>

	</div>
</div>

<?php get_footer();

// Omit Closing PHP Tags
