<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sites.css" />
<style type="text/css">
#primary {
	position: relative;
	background: #fff;
	width: 100%;
	margin: 0 0 10px 0;
	padding: 10;
	border: 1px solid #ddd;
	border-radius: 2px;
}
</style>
<section id="primary" class="content-area bk da">
	<main id="main" class="site-main" role="main">
		<div class="sites-box">
			<?php if ( have_posts() ) : ?>
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=1000');?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="archive-5">
					<?php if ( get_post_meta($post->ID, 'sites_img_link', true) ) { ?>
						<?php $sites_img_link = get_post_meta($post->ID, 'sites_img_link', true); ?>
						<span class="sites-archive-title sites-archive-title-img wow fadeInUp">
							<figure class="picture-img sites-img bk">
								<?php if ( get_post_meta($post->ID, 'shot_img', true) ) { ?>
									<?php zm_sites_shot_img(); ?>
								<?php } else { ?>
									<?php zm_sites_thumbnail(); ?>
								<?php } ?>
							</figure>
							<a href="<?php echo $sites_img_link; ?>" target="_blank" rel="external nofollow"><?php the_title(); ?></a>
						</span>
					<?php } else { ?>
						<?php $sites_link = get_post_meta($post->ID, 'sites_link', true); ?>
						<?php if ( get_post_meta($post->ID, 'shot_img', true) ) { ?>
						<span class="sites-archive-title sites-archive-title-img wow fadeInUp">
							<figure class="picture-img sites-img bk">
								<?php zm_sites_shot(); ?>
							</figure>
							<a href="<?php echo $sites_link; ?>" target="_blank" rel="external nofollow"><?php the_title(); ?></a>
						</span>
						<?php } else { ?>
							<span class="sites-archive-title wow fadeInUp"><a class="sites-title-t bk" href="<?php echo $sites_link; ?>" target="_blank" rel="external nofollow"><?php the_title(); ?></a></span>
						<?php } ?>
					<?php } ?>
					<div class="clear"></div>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
				您还没有添加网址
			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</main>
</section>

<?php get_footer(); ?>