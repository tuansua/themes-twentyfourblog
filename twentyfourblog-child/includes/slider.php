<div id="slider-wrap">
	<ul id="slider">
		<?php
			if(get_field('link_1','option') && get_field('banner_1','option')) {
		?>
		<li>
			<a href="<?php the_field('link_1','option'); ?>">
				<img src="<?php the_field('banner_1','option'); ?>" alt="<?php the_title(); ?>">
			</a>
		</li>
		<?php  
			}
			if(get_field('link_2','option') && get_field('banner_2','option')) {
		?>
		<li>
			<a href="<?php the_field('link_2','option'); ?>">
				<img src="<?php the_field('banner_2','option'); ?>" alt="<?php the_title(); ?>">
			</a>
		</li>
		<?php  
			}
			if(get_field('link_3','option') && get_field('banner_3','option')) {
		?>
		<li>
			<a href="<?php the_field('link_3','option'); ?>">
				<img src="<?php the_field('banner_3','option'); ?>" alt="<?php the_title(); ?>">
			</a>
		</li>
		<?php  
			}
		?>
	</ul>
	<div class="btns" id="next">
		<i class="fa fa-arrow-right"></i>
	</div>
	<div class="btns" id="previous">
		<i class="fa fa-arrow-left"></i>
	</div>
	<div id="counter"></div>
	<div id="pagination-wrap">
		<ul></ul>
	</div>
</div>