<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('group_carousel')) { ?>
<div id="section-gtg" class="g-row sort" name="<?php echo zm_get_option('group_carousel_s'); ?>">
	<div class="g-col bgt">
		<div class="hot-box bgt">
			<div class="group-title wow fadeInDown bgt">
				<?php if ( zm_get_option('group_carousel_t') == '' ) { ?>
				<?php } else { ?>
					<h3 class="bgt"><?php echo zm_get_option('group_carousel_t'); ?></h3>
				<?php } ?>
				<div class="group-des bgt"><?php echo zm_get_option('carousel_des'); ?></div>
				<div class="clear"></div>
			</div>

			<div id="slider-hot" class="slider-hot wow fadeIn bgt">
				<?php 
					if (zm_get_option('group_gallery')) {
						$loop = new WP_Query(array('tax_query' => array( array('taxonomy' => 'gallery', 'field' => 'id', 'terms' => explode(',',zm_get_option('group_gallery_id') ))), 'posts_per_page' => zm_get_option('carousel_n')) );
					} else {
						$loop = new WP_Query( array( 'cat' => zm_get_option('group_carousel_id'), 'posts_per_page' => zm_get_option('carousel_n'), 'post__not_in' => get_option( 'sticky_posts'), 'post__not_in' => $do_not_duplicate ) );
					}
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post bk da'); ?>>
					<?php zm_thumbnail_scrolling(); ?>
					<div class="clear"></div>
					<?php the_title( sprintf( '<h2 class="carousel-title bgt"><a class="bgt" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
<?php add_action('wp_footer', 'carousel_bg'); ?>
<?php } ?>