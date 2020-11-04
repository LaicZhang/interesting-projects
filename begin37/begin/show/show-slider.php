<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="g-row">
	<div class="show-header-box da">
		<?php 
			$s_a_img_d = get_post_meta($post->ID, 's_a_img_d', true);
			$s_a_img_x = get_post_meta($post->ID, 's_a_img_x', true);
			$s_a_t_a = get_post_meta($post->ID, 's_a_t_a', true);
			$s_a_t_b = get_post_meta($post->ID, 's_a_t_b', true);
			$s_a_t_c = get_post_meta($post->ID, 's_a_t_c', true);
			$s_a_n_b = get_post_meta($post->ID, 's_a_n_b', true);
			$s_a_n_b_l = get_post_meta($post->ID, 's_a_n_b_l', true);
		?>
		<div class="show-header-img">
			<?php if ( get_post_meta($post->ID, 's_a_img_d', true) ) { ?>
				<div class="show-big-img"><img src="<?php echo $s_a_img_d; ?>"></div>
				<div class="show-header-main bgt">
					<div class="show-small-img wow fadeInLeft bgt"><img src="<?php echo $s_a_img_x; ?>"></div>
					<?php if ( get_post_meta($post->ID, 's_a_t_b', true) ) { ?>
						<div class="show-header-w bgt">
							<div class="show-header-content bgt">
								<p class="s-t-a wow fadeInRight bgt"><?php echo $s_a_t_a; ?></p>
								<p class="s-t-b wow fadeInRight bgt"><?php echo $s_a_t_b; ?></p>
								<p class="s-t-c wow fadeInRight bgt"><?php echo $s_a_t_c; ?></p>
							</div>
							<?php if ( get_post_meta($post->ID, 's_a_n_b', true) ) { ?>
								<div class="group-img-more wow fadeInRight bgt"><a class="bk" href="<?php echo $s_a_n_b_l; ?>" rel="bookmark" target="_blank"><?php echo $s_a_n_b; ?></a></div>
							<?php } ?>
						</div>
					<?php } ?>
					
				</div>
			<?php } ?>
		</div>
	</div>
</div>