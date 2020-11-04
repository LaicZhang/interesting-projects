<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('group_slider')) { ?>
<?php if (zm_get_option('tr_rslides_img')) { ?>
<div class="g-row rslides-img">
<?php } else { ?>
<div class="g-row">
<?php } ?>
	<div id="slider-group" class="slider-group">
		<?php
			$args = array(
				'posts_per_page' => zm_get_option('group_slider_n'),
				'post_type' => 'page', 
				'meta_key' => 'guide_img',
				'ignore_sticky_posts' => 1
			);
			query_posts($args);
		?>
		<?php while (have_posts()) : the_post(); ?>
		<?php $image = get_post_meta($post->ID, 'guide_img', true); ?>
		<?php $group_slider_url = get_post_meta($post->ID, 'group_slider_url', true); ?>
		<?php $small_img = get_post_meta($post->ID, 'small_img', true); ?>
		<?php 
			$s_t_a = get_post_meta($post->ID, 's_t_a', true);
			$s_t_b = get_post_meta($post->ID, 's_t_b', true);
			$s_t_c = get_post_meta($post->ID, 's_t_c', true);
			$s_n_b = get_post_meta($post->ID, 's_n_b', true);
			$s_n_b_l = get_post_meta($post->ID, 's_n_b_l', true);
		?>
			<div class="slider-group-main">
				<div class="group-big-img">
					<?php if (zm_get_option('group_slider_url')) { ?>
						<a href="<?php if ( get_post_meta($post->ID, 'group_slider_url', true) ) { ?><?php echo $group_slider_url; ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" rel="bookmark"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
					<?php } else { ?>
						<img src="<?php echo $image; ?>" />
					<?php } ?>
				</div>
				<div class="slider-group-main-box bgt">
					<div class="group-slider-main-body bgt">
						<?php if (zm_get_option('group_slider_url')) { ?>
							<?php if ( get_post_meta($post->ID, 'small_img', true) ) : ?><div class="group-small-img wow fadeInLeft bgt"><a href="<?php if ( get_post_meta($post->ID, 'group_slider_url', true) ) { ?><?php echo $group_slider_url; ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" rel="bookmark"><img src="<?php echo $small_img; ?>"></a></div><?php endif; ?>
						<?php } else { ?>
							<?php if ( get_post_meta($post->ID, 'small_img', true) ) : ?><div class="group-small-img wow fadeInLeft bgt"><img src="<?php echo $small_img; ?>"></div><?php endif; ?>
						<?php } ?>
						<?php if (zm_get_option('group_slider_t')) { ?>
							<?php if ( get_post_meta($post->ID, 's_t_b', true) ) { ?>
								<?php if (zm_get_option('m_t_no')) { ?>
									<?php if ( get_post_meta($post->ID, 'small_img', true) ) { ?>
										<div class="group-slider-main bgt group-slider-main-m animated fadeInUp">
									<?php } else { ?>
										<div class="group-slider-main no-small bgt group-slider-main-m animated fadeInUp">
									<?php } ?>
								<?php } else { ?>
									<?php if ( get_post_meta($post->ID, 'small_img', true) ) { ?>
										<div class="group-slider-main bgt animated fadeInUp">
									<?php } else { ?>
										<div class="group-slider-main no-small bgt animated fadeInUp">
									<?php } ?>
								<?php } ?>
									<div class="group-slider-content bgt">
										<p class="s-t-a animated fadeInRight bgt"><?php echo $s_t_a; ?></p>
										<p class="s-t-b animated fadeInRight bgt"><?php echo $s_t_b; ?></p>
										<p class="s-t-c animated fadeInRight bgt"><?php echo $s_t_c; ?></p>
									</div>
									<?php if ( get_post_meta($post->ID, 's_n_b', true) ) { ?>
										<div class="group-img-more animated fadeInRight bgt"><a class="bgt" href="<?php echo $s_n_b_l; ?>" rel="bookmark" target="_blank"><?php echo $s_n_b; ?></a></div>
									<?php } ?>
									<div class="clear"></div>
								</div>
							<?php } ?>
						<?php } ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div>
</div>
<?php } ?>