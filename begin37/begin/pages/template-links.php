<?php
/*
Template Name: 友情链接
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php if (zm_get_option('link_ico')) { ?>
<meta name="referrer" content="no-referrer" />
<?php } ?>
<?php get_header(); ?>
<div id="content-links" class="content-area">
	<main id="main" class="link-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( get_post_meta($post->ID, 'header_img', true) || get_post_meta($post->ID, 'header_bg', true) ) { ?>
			<?php } else { ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('ms bk da'); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<div class="entry-content">
						<div class="single-content">
							<?php the_content(); ?>
							<?php edit_post_link('<i class="be be-editor"></i>', '<div class="page-edit-link edit-link">', '</div>' ); ?>
						</div>
						<div class="clear"></div>
					</div>
				</article>
			<?php } ?>

			<article class="link-page">
				<div class="link-content">
					<?php echo begin_get_link_items(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<div class="clear"></div>
		<?php if ( comments_open() || get_comments_number() ) : ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>
	</main>
</div>
<?php get_footer(); ?>