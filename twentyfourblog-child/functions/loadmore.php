<?php  
	function ts_loadmore_home(){
	$args = array(
	    'posts_per_page'   => 5,
	    'orderby'          => 'date',
	    'order'            => 'DESC',
	    'post_type'        => 'post',
	    'post_status'      => 'publish'
	);
	$args['paged'] = $_POST['currentpaged'] + 5;
	$myposts = get_posts( $args ); 
	$count = '1';
	foreach ( $myposts as $post ) :
  	$idpos = $post->ID;
    $posttime = get_post_time('H:i \| d/m/Y', false, $idpos);
    $permalink = get_permalink($idpos);
    $posttitle = $post->post_title;
    $excerpt70 = strip_tags(long_content3($posttitle, 70));
    setup_postdata( $post );
?>
	<li class="home-new">
		<div class="blog-photo">
			<a href="<?php echo $permalink; ?>" title="<?php echo $posttitle; ?>">
				<?php  
					if ( has_post_thumbnail($idpos) ) { 
	                    echo  get_the_post_thumbnail( $idpos, 'thumbnail', array( 'class' => 'blog-wp-post-image' ) ); 
	                }
				?>
			</a>
		</div>
		<div class="blog-desc">
			<h4><a href="<?php echo $permalink; ?>" title="<?php echo $permalink; ?>"><?php echo $excerpt70; ?></a></h4>
			<div class="time-post">
				<p><?php echo $posttime; ?></p>
				<p>
					<?php  
						foreach ($category as $key => $value) {
					?>
                          	<a href="<?php echo home_url().'/category/'.$value->slug; ?>><?php echo $value->cat_name; ?></a>
                    <?php
                        }
					?>
				</p>
			</div>
		</div>
	</li>
<?php                	
	  	endforeach;
	  	wp_reset_postdata();
	wp_die();
}
add_action('wp_ajax_loadmorehome', 'ts_loadmore_home');
add_action('wp_ajax_nopriv_loadmorehome', 'ts_loadmore_home');
?>