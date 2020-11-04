<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
class Ajax_begin_tab {
	public function __construct() {
		add_action('wp_ajax_begin-tabs-content', array(&$this, 'ajax_begin_tab_content'));
		add_action('wp_ajax_nopriv_begin-tabs-content', array(&$this, 'ajax_begin_tab_content'));
	}

	function ajax_begin_tab_content() {
		$tab = $_POST['tab'];
		$page = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : '';
		if ($page < 1) $page = 1;

		switch ($tab) {
			case "sorta":
				?>
				<ul>
					<?php
						$recent = new WP_Query('showposts='.zm_get_option('tab_b_n').'&cat='.zm_get_option('tab_b_a_id').'&orderby=post_date&order=desc&post_status=publish&paged='. $page);
						$last_page = $recent->max_num_pages;
						while ($recent->have_posts()) : $recent->the_post();
					?>
						<?php tabs_mode(); ?>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
				<div class="clear"></div>
				<?php $this->tab_pagination($page, $last_page); ?>
				<div class="tabs-more">
					<?php
					$cat=get_term_by('id', zm_get_option('tab_b_a_id'), 'category');
					$cat_links=get_category_link($cat->term_id);
					?>
					<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><i class="be be-more"></i></a>
				</div>
				<?php
			break;

			case "sortb":
				?>
				<ul>
					<?php
						$recent = new WP_Query('showposts='.zm_get_option('tab_b_n').'&cat='.zm_get_option('tab_b_b_id').'&orderby=post_date&order=desc&post_status=publish&paged='. $page);
						$last_page = $recent->max_num_pages;
						while ($recent->have_posts()) : $recent->the_post();
					?>
						<?php tabs_mode(); ?>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
				<div class="clear"></div>
				<?php $this->tab_pagination($page, $last_page); ?>
				<div class="tabs-more">
					<?php
					$cat=get_term_by('id', zm_get_option('tab_b_b_id'), 'category');
					$cat_links=get_category_link($cat->term_id);
					?>
					<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><i class="be be-more"></i></a>
				</div>
				<?php
			break;

		case "sortc":
				?>
				<ul>
					<?php
						$recent = new WP_Query('showposts='.zm_get_option('tab_b_n').'&cat='.zm_get_option('tab_b_c_id').'&orderby=post_date&order=desc&post_status=publish&paged='. $page);
						$last_page = $recent->max_num_pages;
						while ($recent->have_posts()) : $recent->the_post();
					?>
						<?php tabs_mode(); ?>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
				<div class="clear"></div>
				<?php $this->tab_pagination($page, $last_page); ?>
				<div class="tabs-more">
					<?php
					$cat=get_term_by('id', zm_get_option('tab_b_c_id'), 'category');
					$cat_links=get_category_link($cat->term_id);
					?>
					<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><i class="be be-more"></i></a>
				</div>
				<?php
			break;

		case "sortd":
				?>
				<?php if ( zm_get_option('tab_b_d')) { ?>
					<ul>
						<?php
							$recent = new WP_Query('showposts='.zm_get_option('tab_b_n').'&cat='.zm_get_option('tab_b_d_id').'&orderby=post_date&order=desc&post_status=publish&paged='. $page);
							$last_page = $recent->max_num_pages;
							while ($recent->have_posts()) : $recent->the_post();
						?>
						<?php tabs_mode(); ?>
						<?php endwhile; wp_reset_query(); ?>
					</ul>
					<div class="clear"></div>
					<?php $this->tab_pagination($page, $last_page); ?>
					<div class="tabs-more">
						<?php
						$cat=get_term_by('id', zm_get_option('tab_b_d_id'), 'category');
						$cat_links=get_category_link($cat->term_id);
						?>
						<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><i class="be be-more"></i></a>
					</div>
				<?php } ?>
				<?php
			break;
		}
		die();
	}

	function tab_pagination($page, $last_page) {
		?>
		<div class="tab-pagination">
			<?php if ($page != $last_page) : ?>
				<a href="#" class="next"><span><i class="be be-arrowright"></i></span></a>
			<?php else : ?>
				<span>&nbsp;</span>
			<?php endif; ?>
			<?php if ($page > 1) : ?>
				<a href="#" class="previous"><span><i class="be be-arrowleft"></i></span></a>
			<?php endif; ?>
		</div>
		<input type="hidden" class="page_num" name="page_num" value="<?php echo $page; ?>" />
		<?php
	}
}

function tabs_mode() { ?>
<?php if (!zm_get_option('tabs_mode') || (zm_get_option('tabs_mode') == 'tabs_list_mode')) { ?>
	<?php the_title( sprintf( '<li class="list-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>
<?php } ?>
<?php if (zm_get_option('tabs_mode') == 'tabs_img_mode') { ?>
	<div class="xl4 xm4">
		<div id="post-<?php the_ID(); ?>" class="picture da">
			<figure class="picture-cms-img">
				<?php zm_thumbnail_a(); ?>
			</figure>
			<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</div>
	</div>
<?php } ?>
<?php }

function add_Ajax_begin_tab() {
	new Ajax_begin_tab();
}
add_action( 'init', 'add_Ajax_begin_tab');