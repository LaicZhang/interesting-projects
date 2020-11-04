<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('group_cat_b')) { ?>
<div class="g-row <?php if (zm_get_option('bg_16')) { ?>g-line<?php } ?> sort" name="<?php echo zm_get_option('group_cat_b_s'); ?>">
	<div class="g-col">
		<div class="group-cat">
			<?php $display_categories =  explode(',',zm_get_option('group_cat_b_id') ); foreach ($display_categories as $category) { ?>
			<?php if (zm_get_option('group_no_cat_child')) { ?>
				<?php query_posts( array('cat' => $category ) ); ?>
				<?php query_posts( array( 'showposts' => 1, 'category__in' => array(get_query_var('cat')), 'post__not_in' => $do_not_cat ) ); ?>
			<?php } else { ?>
				<?php query_posts( array( 'showposts' => 1, 'cat' => $category, 'post__not_in' => $do_not_cat ) ); ?>
			<?php } ?>


			<div class="gr2">
				<div class="gr-cat-box">
					<h3 class="gr-cat-title"><a class="wow fadeInDown" href="<?php echo get_category_link($category);?>" title="<?php echo strip_tags(category_description($category)); ?>"><?php single_cat_title(); ?></a></h3>
					<div class="gr-cat-more wow fadeInDown"><a href="<?php echo get_category_link($category);?>"><?php _e( '更多', 'begin' ); ?> <i class="be be-fastforward"></i></a></div>
					<div class="clear"></div>
					<div class="gr-cat-site">
						<?php if (zm_get_option('group_cat_b_top')) { ?>

							<?php query_posts( array ( 'category__in' => array(get_query_var('cat')), 'meta_key' => 'cat_top', 'showposts' => 1, 'ignore_sticky_posts' => 1 ) ); while ( have_posts() ) : the_post(); $do_not_cat[] = $post->ID;?>
								<figure class="gr-thumbnail wow fadeInUp"><?php zm_long_thumbnail(); ?></figure>
								<?php the_title( sprintf( '<h2 class="gr-title wow fadeInUp"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							<?php endwhile; ?>

							<div class="clear"></div>
							<ul class="gr-cat-list">
								<?php if (zm_get_option('group_no_cat_child')) { ?>
									<?php query_posts( array( 'showposts' => zm_get_option('group_cat_b_n'), 'cat' => $category, 'offset' => 0, 'category__in' => array(get_query_var('cat')),  'post__not_in' => $do_not_cat ) ); ?>
								<?php } else { ?>
									<?php query_posts( array( 'showposts' => zm_get_option('group_cat_b_n'), 'cat' => $category, 'offset' => 0, 'post__not_in' => $do_not_cat ) ); ?>
								<?php } ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<li class="list-date wow fadeInUp"><?php the_time('m/d') ?></li>
									<?php the_title( sprintf( '<li class="list-title wow fadeInUp"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>
								<?php endwhile; ?>
								<?php wp_reset_query(); ?>
							</ul>


						<?php } else { ?>

							<?php while ( have_posts() ) : the_post(); ?>
								<figure class="gr-thumbnail wow fadeInUp"><?php zm_long_thumbnail(); ?></figure>
								<?php the_title( sprintf( '<h2 class="gr-title wow fadeInUp"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							<?php endwhile; ?>

							<div class="clear"></div>
							<ul class="gr-cat-list">
								<?php if (zm_get_option('group_no_cat_child')) { ?>
									<?php query_posts( array( 'showposts' => zm_get_option('group_cat_b_n'), 'cat' => $category, 'offset' => 1, 'category__in' => array(get_query_var('cat')),  'post__not_in' => $do_not_cat ) ); ?>
								<?php } else { ?>
									<?php query_posts( array( 'showposts' => zm_get_option('group_cat_b_n'), 'cat' => $category, 'offset' => 1, 'post__not_in' => $do_not_cat ) ); ?>
								<?php } ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<li class="list-date wow fadeInUp"><?php the_time('m/d') ?></li>
									<?php the_title( sprintf( '<li class="list-title wow fadeInUp"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>
								<?php endwhile; ?>
								<?php wp_reset_query(); ?>
							</ul>

						<?php } ?>
					</div>
				</div>

			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php } ?>