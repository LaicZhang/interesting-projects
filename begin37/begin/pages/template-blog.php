<?php
/*
Template Name: 博客页面
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header(); ?>

<div id="primary" class="content-area common">
	<main id="main" class="site-main<?php if (zm_get_option('post_no_margin')) { ?> domargin<?php } ?>" role="main">
		<?php if (zm_get_option('order_by')) { begin_orderby(); }?>
		<?php if (zm_get_option('slider')) { ?>
			<?php
				if ( !is_paged() ) :
					get_template_part( 'template/slider' );
				endif;
			?>
		<?php } ?>

		<?php if (zm_get_option('cms_top')) { ?>
			<?php
				if ( !is_paged() ) :
					get_template_part( 'template/b-top' );
				endif;
			?>
		<?php } ?>

		<?php get_template_part( '/template/blog-special' ); ?>

		<?php if (zm_get_option('cat_all')) { ?>
			<?php
				if ( !is_paged() ) :
				require get_template_directory() . '/template/all-cat.php';
				endif;
			?>
		<?php } ?>

		<?php 
			if ( !is_paged() ) :
			get_template_part( '/template/b-cover' ); 
			endif;
		?>
		<?php if (zm_get_option('cms_top')) { ?>
			<?php
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$notcat = explode(',',zm_get_option('not_cat_n'));
				$args = array(
					'category__not_in' => $notcat,
				    'ignore_sticky_posts' => 0, 
					'paged' => $paged,
					'meta_query' => array(
						array(
							'key' => 'cms_top',
							'compare' => 'NOT EXISTS'
						)
					)
				);
				query_posts( $args );
				begin_order();
		 	?>
		<?php } else { ?>
			<?php
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$notcat = explode(',',zm_get_option('not_cat_n'));
				$args = array(
					'category__not_in' => $notcat,
				    'ignore_sticky_posts' => 0, 
					'paged' => $paged
				);
				query_posts( $args );
				begin_order();
		 	?>
		<?php } ?>

		<?php
			if ( !is_paged() ) :
				get_template_part( '/inc/filter-general' );
			endif;
		?>

		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template/content', get_post_format() ); ?>

			<?php get_template_part('ad/ads', 'archive'); ?>

			<?php if (zm_get_option('blog_ajax_tabs')) { ?>
				<?php if ($wp_query->current_post == 3 && !is_paged()) { ?>
					<?php if (zm_get_option('post_no_margin')) { ?><div class="upclose"></div><?php } ?>
					<?php get_template_part( '/template/cat-tab' ); ?>
				<?php } ?>
			<?php } ?>

		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template/content', 'none' ); ?>
		<?php endif; ?>

	</main><!-- .site-main -->

	<?php begin_pagenav(); ?>

</div><!-- .content-area -->

<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>