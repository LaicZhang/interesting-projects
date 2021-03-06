<?php
/**
 * 分类图片布局，使用标准缩略图尺寸，有缩略图
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<style type="text/css">
#picture .post {
	width: 33.3333333333333%;
}

@media screen and (max-width:600px) {
	#picture .post {
		width: 50%;
	}
}
</style>
<section id="primary" class="content-area">
	<div id="picture" class="content-area category-img-s">
		<main id="main" class="site-main" role="main">
			<?php if ((zm_get_option('no_child')) && is_category() ) { ?>
				<?php 
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					query_posts(array('category__in' => array(get_query_var('cat')), 'paged' => $paged,));
				?>
			<?php } ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('picture wow fadeInUp'); ?>>
				<div class="picture-box sup ms bk">
					<figure class="picture-img">
						<?php if (zm_get_option('hide_box')) { ?>
							<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><div class="hide-box"></div></a>
							<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><div class="hide-excerpt"><?php if (has_excerpt('')){ echo wp_trim_words( get_the_excerpt(), 62, '...' ); } else { echo wp_trim_words( get_the_content(), 72, '...' ); } ?></div></a>
						<?php } ?>
						<?php zm_thumbnail(); ?>
						<?php if ( has_post_format('video') ) { ?><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-play"></i></a><?php } ?>
						<?php if ( has_post_format('quote') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-display"></i></a></div><?php } ?>
						<?php if ( has_post_format('image') ) { ?><div class="img-ico"><a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><i class="be be-picture"></i></a></div><?php } ?>
					</figure>
					<?php the_title( sprintf( '<h2 class="grid-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<span class="grid-inf">
						<?php if ( has_post_format('link') ) { ?>
							<?php if ( get_post_meta($post->ID, 'link_inf', true) ) { ?>
								<span class="link-inf"><?php $link_inf = get_post_meta($post->ID, 'link_inf', true);{ echo $link_inf;}?></span>
							<?php } else { ?>
								<span class="g-cat"><?php zm_category(); ?></span>
							<?php } ?>
						<?php } else { ?>
							<span class="g-cat"><?php zm_category(); ?></span>
						<?php } ?>
						<span class="grid-inf-l">
							<?php if ( !has_post_format('link') ) { ?><span class="date"><i class="be be-schedule"></i> <?php the_time( 'm/d' ); ?></span><?php } ?>
							<?php if (zm_get_option('meta_author')) { ?><span class="grid-author"><?php grid_author_inf(); ?></span><?php } ?>
							<?php if( function_exists( 'the_views' ) ) { the_views( true, '<span class="views"><i class="be be-eye"></i> ','</span>' ); } ?>
							<?php if ( get_post_meta($post->ID, 'zm_like', true) ) : ?><span class="grid-like"><span class="be be-thumbs-up-o">&nbsp;<?php zm_get_current_count(); ?></span></span><?php endif; ?>
						</span>
		 			</span>
		 			<div class="clear"></div>
				</div>
			</article>
			<?php endwhile;?>
		</main><!-- .site-main -->
		<?php begin_pagenav(); ?>
	</div>
</section><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>