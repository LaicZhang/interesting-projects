<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('group_new')) { ?>
<div class="g-row <?php if (zm_get_option('bg_11')) { ?>g-line<?php } ?> sort" name="<?php echo zm_get_option('group_new_s'); ?>">
	<div class="g-col">
		<div class="group-news">
			<div class="group-title wow fadeInDown">
					<?php if ( zm_get_option('group_new_t') == '' ) { ?>
					<?php } else { ?>
						<h3><?php echo zm_get_option('group_new_t'); ?></h3>
					<?php } ?>
				<div class="group-des"><?php echo zm_get_option('group_new_des'); ?></div>
				<div class="clear"></div>
			</div>
			<div class="group-news-content">
				<?php
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$recent = new WP_Query( array( 'posts_per_page' => zm_get_option('group_new_n'), 'category__not_in' => explode(',',zm_get_option('not_group_new')), 'paged' => $paged) );
				?>
				<?php while($recent->have_posts()) : $recent->the_post(); $do_not_cat[] = $post->ID; ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<figure class="thumbnail wow fadeInUp">
						<?php zm_thumbnail(); ?>
					</figure>
					<header class="entry-header wow fadeInUp bgt">
						<?php the_title( sprintf( '<h2 class="entry-title bgt"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header>

					<div class="entry-content">
						<div class="archive-content wow fadeInUp bgt">
							<?php if (has_excerpt('')){
									echo wp_trim_words( get_the_excerpt(), 30, '...' );
								} else {
									$content = get_the_content();
									$content = wp_strip_all_tags(str_replace(array('[',']'),array('<','>'),$content));
									echo wp_trim_words( $content, 40, '...' );
						        }
							?>
						</div>
						<span class="entry-meta wow fadeInUp">
							<?php begin_entry_meta(); ?>
						</span>
						<div class="clear"></div>
					</div>
				</article>
				<?php endwhile; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>