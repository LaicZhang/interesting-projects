<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
// 格子图标
function grid_md_cms() { ?>
<div class="grid-md<?php echo zm_get_option('grid_ico_cms_n'); ?> sort" name="<?php echo zm_get_option('grid_ico_cms_s'); ?>">
	<?php $posts = get_posts( array( 'post_type' => 'any', 'orderby' => 'menu_order', 'meta_key' => 'gw_title', 'numberposts' => '16') ); if($posts) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
		<?php 
			$gw_ico = get_post_meta($post->ID, 'gw_ico', true);
			$gw_img = get_post_meta($post->ID, 'gw_img', true);
			$gw_title = get_post_meta($post->ID, 'gw_title', true);
			$gw_content = get_post_meta($post->ID, 'gw_content', true);
			$gw_link = get_post_meta($post->ID, 'gw_link', true);
		?>
	<div class="gw-box<?php echo zm_get_option('grid_ico_cms_n'); ?>">
		<div class="gw-main sup bk gw-main-<?php if ( zm_get_option('cms_ico_b')) { ?>b<?php } ?>">
			<?php if ( get_post_meta($post->ID, 'gw_img', true) ) { ?><div class="gw-img"><img src="<?php echo get_template_directory_uri().'/prune.php?src='.$gw_img.'&w=300&h=300&zc=1'; ?>" alt="<?php echo $gw_title; ?>" /></div><?php } ?>
			<div class="gw-area">
				<?php if ( get_post_meta($post->ID, 'gw_ico', true) ) { ?><div class="gw-ico"><i class="<?php echo $gw_ico; ?>"></i></div><?php } ?>
				<?php if ( get_post_meta($post->ID, 'gw_link', true) ) { ?><a class="gw-link" href="<?php echo $gw_link; ?>" title="了解更多" rel="bookmark"><?php } ?>
					<h3 class="gw-title"><?php echo $gw_title; ?></h3>
				<?php if ( get_post_meta($post->ID, 'gw_link', true) ) { ?></a><?php } ?>
				<?php if ( get_post_meta($post->ID, 'gw_content', true) ) { ?><div class="gw-content"><?php echo $gw_content; ?></div><?php } ?>	
			</div>
		</div>
		
	</div>
	<?php endforeach; endif; ?>
	<?php wp_reset_query(); ?>
	<div class="clear"></div>
</div>
<?php }

function grid_md_group() { ?>
<div class="g-row <?php if (zm_get_option('bg_19')) { ?>g-line<?php } ?> sort" name="<?php echo zm_get_option('group_ico_s'); ?>">
	<div class="g-col">
		<div class="grid-md<?php echo zm_get_option('grid_ico_group_n'); ?>">
			<div class="group-title wow fadeInDown">
				<?php if ( zm_get_option('group_ico_t') == '' ) { ?>
				<?php } else { ?>
					<h3><?php echo zm_get_option('group_ico_t'); ?></h3>
					<div class="separator"></div>
				<?php } ?>
				<div class="group-des"><?php echo zm_get_option('group_ico_des'); ?></div>
				<div class="clear"></div>
			</div>
			<?php $posts = get_posts( array( 'post_type' => 'any', 'orderby' => 'menu_order', 'meta_key' => 'gw_title', 'numberposts' => '16') ); if($posts) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
				<?php 
					$gw_ico = get_post_meta($post->ID, 'gw_ico', true);
					$gw_img = get_post_meta($post->ID, 'gw_img', true);
					$gw_title = get_post_meta($post->ID, 'gw_title', true);
					$gw_content = get_post_meta($post->ID, 'gw_content', true);
					$gw_link = get_post_meta($post->ID, 'gw_link', true);
				?>
			<div class="gw-box<?php echo zm_get_option('grid_ico_group_n'); ?>">
				<div class="gw-main sup bk gw-main-<?php if ( zm_get_option('group_ico_b')) { ?>b<?php } ?>">
					<?php if ( get_post_meta($post->ID, 'gw_img', true) ) { ?><div class="gw-img"><img src="<?php echo get_template_directory_uri().'/prune.php?src='.$gw_img.'&w=300&h=300&zc=1'; ?>" alt="<?php echo $gw_title; ?>" /></div><?php } ?>
					<div class="gw-area">
						<?php if ( get_post_meta($post->ID, 'gw_ico', true) ) { ?><div class="gw-ico"><i class="<?php echo $gw_ico; ?>"></i></div><?php } ?>
						<?php if ( get_post_meta($post->ID, 'gw_link', true) ) { ?><a class="gw-link" href="<?php echo $gw_link; ?>" title="了解更多" rel="bookmark"><?php } ?>
							<h3 class="gw-title"><?php echo $gw_title; ?></h3>
						<?php if ( get_post_meta($post->ID, 'gw_link', true) ) { ?></a><?php } ?>
						<?php if ( get_post_meta($post->ID, 'gw_content', true) ) { ?><div class="gw-content"><?php echo $gw_content; ?></div><?php } ?>
					</div>
				</div>
			</div>
			<?php endforeach; endif; ?>
			<?php wp_reset_query(); ?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php }

// menu
function menu_top() { ?>
<div class="nav-top">
	<?php if (zm_get_option('profile')) { ?>
		<?php get_template_part( 'inc/users/user-profile' ); ?>
	<?php } ?>

	<?php
		wp_nav_menu( array(
			'theme_location'	=> 'header',
			'menu_class'		=> 'top-menu',
			'fallback_cb'		=> 'default_top_menu'
		) );
	?>
</div>
<?php }

function small_logo() { ?>
<?php if ( !zm_get_option('logos') && zm_get_option('logo_small'))  { ?><span class="logo-small"><img src="<?php echo zm_get_option('logo_small_b'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></span><?php } ?>
<?php }

function site_description() { ?>
	<?php $description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) : ?>
		<p class="site-description<?php if ( !zm_get_option('logos') && zm_get_option('logo_small'))  { ?> clear-small<?php } ?>"><?php echo $description; ?></p>
	<?php endif; ?>
<?php }

function menu_logo() { ?>
<?php
	if ( is_front_page() || is_home() ) : ?>
		<?php if (zm_get_option('logos')) { ?>
		<h1 class="site-title">
			<?php if ( zm_get_option('logo') ) { ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo zm_get_option('logo'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home" /><?php small_logo(); ?><span class="site-name"><?php bloginfo( 'name' ); ?></span></a>
			<?php } ?>
		</h1>
		<?php } else { ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php small_logo(); ?><?php bloginfo( 'name' ); ?></a></h1>
		<?php site_description(); ?>
	<?php } ?>
	<?php else : ?>
	<?php if (zm_get_option('logos')) { ?>
		<p class="site-title">
			<?php if ( zm_get_option('logo') ) { ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo zm_get_option('logo'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home" /><?php small_logo(); ?><span class="site-name"><?php bloginfo( 'name' ); ?></span></a>
			<?php } ?>
		</p>
	<?php } else { ?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php small_logo(); ?><?php bloginfo( 'name' ); ?></a></p>
		<?php site_description(); ?>
	<?php } ?>
<?php endif; ?>
<?php }

function menu_nav() { ?>
<?php if (zm_get_option('nav_no')) { ?>
	<span class="nav-mobile"><a href="<?php echo get_permalink( zm_get_option('nav_url') ); ?>"><i class="be be-menu"></i></a></span>
<?php } else { ?>
	<?php if (zm_get_option('m_nav')) { ?>
		<?php if ( wp_is_mobile() ) { ?>
			<span class="nav-mobile"><i class="be be-menu"></i></span>
		<?php } else { ?>
			<span id="navigation-toggle" class="bars"><i class="be be-menu"></i></span>
		<?php } ?>
	<?php } else { ?>
		<span id="navigation-toggle" class="bars"><i class="be be-menu"></i></span>
	<?php } ?>
<?php } ?>
	<?php
		wp_nav_menu( array(
			'theme_location'	=> 'navigation',
			'menu_class'		=> 'down-menu nav-menu',
			'fallback_cb'		=> 'default_menu'
		) ); 
	?>
<div id="overlay"></div>
<?php }

function mobile_login() { ?>
	<?php if ( zm_get_option('mobile_login') ) { ?>
		<?php if( is_user_logged_in() ) { ?>
			<?php global $user_identity, $user_level; wp_get_current_user(); ?>
			<div class="mobile-login show-layer" data-show-layer="login-layer" role="button">
				<?php if (zm_get_option('cache_avatar')) { ?>
					<?php global $userdata; wp_get_current_user(); echo begin_avatar($userdata->user_email, 96, '', $user_identity); ?>
				<?php } else { ?>
					<?php global $userdata; wp_get_current_user(); echo get_avatar($userdata->ID, 96, '', $user_identity); ?>
				<?php } ?>
				<div class="mobile-login-name"><?php echo $user_identity; ?></div>
			</div>
		<?php } else { ?>
			<?php if (zm_get_option('user_l')) { ?>
				<?php
				global $user_identity,$user_level;
				wp_get_current_user();
				if ($user_identity) { ?>
					<div class="mobile-login mobile-login-l show-layer" data-show-layer="login-layer" role="button"><i class="be be-timerauto"></i><span class="mobile-login-t"><?php _e( '登录', 'begin' ); ?></span></div>
				<?php } else { ?>
					<div class="mobile-login mobile-login-l"><a href="<?php echo wp_login_url( home_url() ); ?>" title="Login"><i class="be be-timerauto"></i><span class="mobile-login-t"><?php _e( '登录', 'begin' ); ?></span></a></div>
				<?php } ?>
			<?php } else { ?>
				<div class="mobile-login mobile-login-l show-layer" data-show-layer="login-layer" role="button"><i class="be be-timerauto"></i><span class="mobile-login-t"><?php _e( '登录', 'begin' ); ?></span></div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php }

// title span
function title_i() { ?>
<span class="title-i"><span></span><span></span><span></span><span></span></span>
<?php }
function more_i() { ?>
<span class="more-i"><span></span><span></span><span></span></span>
<?php }

// all author
function allauthor() { ?>
<?php
	$exclude.="user_login!='".trim($array[$excludeauthor])."'";
	$where = "WHERE ".$exclude."";
	global $wpdb;
	$table_prefix.=$wpdb->base_prefix;
	$table_prefix.="users";
	$table_prefix1.=$wpdb->base_prefix;
	$table_prefix1.="posts";

	$get_results="SELECT count(p.post_author) as post1,c.id, c.user_login, c.display_name, c.user_email, c.user_url, c.user_registered FROM {$table_prefix} as c , {$table_prefix1} as p {$where} and p.post_type = 'post' AND p.post_status = 'publish' and c.id=p.post_author GROUP BY p.post_author order by post1 DESC limit 1000";
	$comment_counts = $wpdb->get_results("$get_results");

	foreach ( $comment_counts as $count ) {
		$user = get_userdata($count->id);
		echo '<div class="cx6"><div class="author-all ms bk da">';
		$post_count = get_usernumposts($user->ID);
		if (zm_get_option('cache_avatar')) {
			$postount = begin_avatar( $user->user_email, $size = 200, '', $user->display_name);
		} else {
			$postount = get_avatar( $user->user_email, $size = 200, '', $user->display_name);
		}

			$temp=explode(" ",$user->display_name);
		 	$link = sprintf(
				'<a href="%1$s" title="%2$s" >'.$postount.'<div class="author-name">%3$s %4$s %5$s</a></div>',
				get_author_posts_url( $user->ID, $user->user_login ),
				esc_attr( sprintf( ' %s 发表 %s 篇文章', $user->display_name,get_usernumposts($user->ID) ) ),
				$temp[0],$temp[1],$temp[2]
			);
		echo $link;
		echo "</div></div>";
	}
?>
<?php }

// 作者信息
function author_inf() { ?>
<?php
	global $wpdb;
	$author_id = get_the_author_meta( 'ID' );
	$comment_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments  WHERE comment_approved='1' AND user_id = '$author_id' AND comment_type not in ('trackback','pingback')" );
?>
<div class="meta-author-box bgt">
	<div class="arrow-up"></div>
	<div class="meta-author-inf">
		<div class="meta-inf-avatar">
			<?php if (zm_get_option('cache_avatar')) { ?>
				<?php echo begin_avatar( get_the_author_meta('user_email'), '96', '', get_the_author() ); ?>
			<?php } else { ?>
				<?php echo get_avatar( get_the_author_meta('user_email'), '96', '', get_the_author() ); ?>
			<?php } ?>
		</div>
		<div class="meta-inf-name"><?php the_author(); ?></div>
		<div class="meta-inf meta-inf-posts"><span><?php the_author_posts(); ?></span><br /><?php _e( '文章', 'begin' ); ?></div>
		<div class="meta-inf meta-inf-comment"><span><?php echo $comment_count;?></span><br /><?php _e( '评论', 'begin' ); ?></div>
		<div class="clear"></div>
		<div class="meta-inf-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" rel="external nofollow"><?php _e( '更多', 'begin' ); ?></a></div>
	</div>
<div class="clear"></div>
</div>
<?php }


// 作者信息(图片)
function grid_author_inf() { ?>
<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" rel="external nofollow">
	<span class="meta-author grid-meta-author">
		<span class="meta-author-avatar" title="<?php the_author(); ?>">
			<?php if (zm_get_option('cache_avatar')) { ?>
				<?php echo begin_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
			<?php } else { ?>
				<?php echo get_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
			<?php } ?>
		</span>
	</span>
</a>
<?php }

function simple_author_inf() { ?>
<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" rel="external nofollow">
	<span class="meta-author">
		<span class="meta-author-avatar" title="<?php the_author(); ?>">
			<?php if (zm_get_option('cache_avatar')) { ?>
				<?php echo begin_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
			<?php } else { ?>
				<?php echo get_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
			<?php } ?>
		</span>
	</span>
</a>
<?php }

// 搜索
function search_class() { ?>
<div class="single-content">
	<div class="searchbar ad-searchbar">
		<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
			<?php if (zm_get_option('search_option') == 'search_cat') { ?>
				<span class="ad-search-cat">
					<span class="ad-search-cat-t">选择分类</span>
					<?php $args = array(
						'show_option_all' => '全部分类',
						'hide_empty'      => 0,
						'name'            => 'cat',
						'show_count'      => 0,
						'taxonomy'        => 'category',
						'hierarchical'    => 1,
						'depth'           => -1,
						'echo'            => 1,
						'exclude'         => zm_get_option('not_search_cat'),
					); ?>
					<?php wp_dropdown_categories( $args ); ?>
				</span>
			<?php } ?>

			<span class="search-input ad-search-input">
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="da" placeholder="<?php _e( '输入搜索内容', 'begin' ); ?>" required />
				<button type="submit" id="searchsubmit" class="bk da"><i class="be be-search"></i></button>
			</span>
		</form>
	</div>

	<?php if (zm_get_option('search_nav')) { ?>
		<nav class="ad-search-nav">
			<div class="ad-search-nav-t"><?php _e( '关键词', 'begin' ); ?></div>
			<div class="clear"></div>
			<?php
				wp_nav_menu( array(
					'theme_location'=> 'search',
					'menu_class'	=> 'ad-search-menu',
					'fallback_cb'	=> 'ad-search-menu'
				) );
			?>
		</nav>
	<?php } ?>
</div>
<?php }

// 展开全文
function all_content() { ?>
<?php if (word_num() > 800) { ?>
	<div class="all-content-box">
		<div class="all-content bk"><?php _e( '继续阅读', 'begin' ); ?></div>
	</div>
<?php } ?>
<?php }

// 友情链接
function begin_get_the_link_items( $id = null ) {
	global $wpdb,$post;
	$args  = array(
		'orderby'   => zm_get_option('rand_link'),
		'order'     => 'DESC',
		'exclude'   => zm_get_option('link_cat'),
		'category'  => $id,
	);

	$bookmarks = get_bookmarks( $args );
	$output = "";
	if ( !empty( $bookmarks ) ) {
		foreach ($bookmarks as $bookmark) {
			$output .= '<div class="link-box"><div class="link-main sup bk da">';
			if ( zm_get_option('link_ico') ) {
				$output .= '<div class="page-link-img"><img src="https://f.ydr.me/' . $bookmark->link_url . '" alt="' . $bookmark->link_name . '" /></div><div class="link-name-link"><div class="page-link-name"><a href="' . $bookmark->link_url . ' " target="_blank" >' . $bookmark->link_name . '</div><div class="links-url">' . $bookmark->link_url . '</div></div><div class="link-des-box"><div class="link-des">' . $bookmark->link_description . '</div></div></a></li>';
			} else {
				$output .= '<div class="link-letter">' . getFirstCharter($bookmark->link_name) . '</div><div class="link-name-link"><div class="page-link-name"><a href="' . $bookmark->link_url . ' " target="_blank" >' . $bookmark->link_name . '</div><div class="links-url">' . $bookmark->link_url . '</div></div><div class="link-des-box"><div class="link-des">' . $bookmark->link_description . '</div></div></a></li>';
			}
			$output .= '</div></div>';
		}
	}
	return $output;
}

function begin_get_link_items() {
	$linkcats = get_terms( 'link_category' );
	if ( !empty( $linkcats ) ) {
		foreach( $linkcats as $linkcat ){
			if ( zm_get_option('linkcat_h3') ) {
				$result .= '<div class="clear"></div><h3 class="link-cat">'.$linkcat->name.'</h3>';
			}
			if( $linkcat->description ) $result .= '<div class="linkcat-des">'.$linkcat->description .'</div>';
			$result .= begin_get_the_link_items( $linkcat->term_id );
		}
	} else {
		$result = begin_get_the_link_items();
	}
	return $result;
}

// 相关文章
function related_article() { ?>
	<?php if (!zm_get_option('related_mode') || (zm_get_option('related_mode') == 'related_normal')) { ?>
	<?php if (zm_get_option('post_no_margin')) { ?>
		<article id="post-<?php the_ID(); ?>" class="wow fadeInUp post ms bk doclose">
	<?php } else { ?>
		<article id="post-<?php the_ID(); ?>" class="wow fadeInUp post ms bk">
	<?php } ?>

			<figure class="thumbnail">
				<?php zm_thumbnail(); ?>
			<?php if (zm_get_option('no_thumbnail_cat')) { ?><span class="cat cat-roll"><?php } else { ?><span class="cat"><?php } ?><?php zm_category(); ?></span>
			</figure>

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>
			<div class="entry-content">
				<div class="archive-content">
					<?php if (has_excerpt('')){
							echo wp_trim_words( get_the_excerpt(), zm_get_option('word_n'), '...' );
						} else {
							$content = get_the_content();
							$content = wp_strip_all_tags(str_replace(array('[',']'),array('<','>'),$content));
							echo wp_trim_words( $content, zm_get_option('words_n'), '...' );
						}
					?>
				</div>

				<span class="entry-meta">
					<?php begin_related_meta(); ?>
				</span>
				<div class="clear"></div>
				<span class="title-l"></span>
			</div>
		</article>
	<?php } ?>

	<?php if (zm_get_option('related_mode') == 'slider_grid') { ?>
		<div class="r4">
			<div class="related-site">
				<figure class="related-site-img">
					<?php zm_thumbnail(); ?>
				 </figure>
				<div class="related-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			</div>
		</div>
	<?php } ?>
<?php }

// 菜单图文
function nav_img() { ?>
<div class="nav-section nav-section-img bk">
	<?php if (!zm_get_option('menu_cat_cover_md') || (zm_get_option("menu_cat_cover_md") == 'menu_cover_id')) { ?>
		<?php
			$args=array( 'include' => zm_get_option('menu_cat_cover_id') );
			$cats = get_categories($args);
			foreach ( $cats as $cat ) {
				query_posts( 'cat=' . $cat->cat_ID );
		?>
		<div class="menu-img bgt">
			<a href="<?php echo get_category_link($cat->cat_ID);?>" rel="bookmark">
				<?php if (zm_get_option('cat_cover_img')) { ?>
					<img src="<?php echo get_template_directory_uri().'/prune.php?src='.cat_cover_url().'&w='.zm_get_option('img_co_w').'&h='.zm_get_option('img_co_h').'&a='.zm_get_option('crop_top').'&zc=1'; ?>" alt="<?php single_cat_title(); ?>">
				<?php } else { ?>
					<img src="<?php echo cat_cover_url(); ?>" alt="<?php single_cat_title(); ?>">
				<?php } ?>
			</a>
			<h3><a href="<?php echo get_category_link($cat->cat_ID);?>" rel="bookmark"><?php echo $cat->cat_name; ?></a></h3>
		</div>
		<?php } wp_reset_query(); ?>
	<?php } ?>

	<?php if (zm_get_option('menu_cat_cover_md') == 'menu_post_id') { ?>
		<?php 
			$loop = new WP_Query( array( 'meta_key' => 'menu_post', 'ignore_sticky_posts' => 1 ));
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		 <div class="menu-img menu-post bgt">
			<?php zm_thumbnail(); ?>
			<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	<?php } ?>

	<?php if (zm_get_option('menu_cat_cover_md') == 'menu_all_cat') { ?>
	<ul class="menu-all-cat bgt">
		<?php
			$args=array(
				'exclude' => zm_get_option('menu_cat_e_id'),
				'hide_empty' => 0
			);
			$cats = get_categories($args);
			foreach ( $cats as $cat ) {
			query_posts( 'cat=' . $cat->cat_ID );
		?>
		<li><a class="bk" href="<?php echo get_category_link($cat->cat_ID);?>" rel="bookmark"><?php if (zm_get_option('cat_icon')) { ?><i class="<?php echo zm_taxonomy_icon_code(); ?>"></i><?php } ?><?php single_cat_title(); ?></a></li>
		<?php } ?>
		<?php wp_reset_query(); ?>
	</ul>
	<?php } ?>
	<div class="clear"></div>
</div>
<?php }

// poster
if (zm_get_option('share_poster')) {
function poster_button() { ?>
<?php global $post; ?>
<span class="poster-button"><a href="#" rel="popuprel" class="popup btn-begin-cover" data-nonce="<?php echo wp_create_nonce('create-begin-image-'.$post->ID );?>" data-id="<?php echo $post->ID; ?>" data-action="create-begin-image" id="begin-cover"  title="分享海报"><i class="be be-businesscard"></i></a></span>
<?php }
}
// 菜单全部分类
function nav_cat() { ?>
<div class="nav-section nav-section-cat bk">
	<?php if (!zm_get_option('nav_cat_md') || (zm_get_option("nav_cat_md") == 'nav_cover')) { ?>
		<?php
			$args=array( 'exclude' => zm_get_option('nav_cat_e_id') );
			$cats = get_categories($args);
			foreach ( $cats as $cat ) {
				query_posts( 'cat=' . $cat->cat_ID );
		?>
		 <div class="menu-img bgt">
			<a href="<?php echo get_category_link($cat->cat_ID);?>" rel="bookmark">
				<?php if (zm_get_option('cat_cover_img')) { ?>
					<img src="<?php echo get_template_directory_uri().'/prune.php?src='.cat_cover_url().'&w='.zm_get_option('img_co_w').'&h='.zm_get_option('img_co_h').'&a='.zm_get_option('crop_top').'&zc=1'; ?>" alt="<?php single_cat_title(); ?>">
				<?php } else { ?>
					<img src="<?php echo cat_cover_url(); ?>" alt="<?php single_cat_title(); ?>">
				<?php } ?>
			</a>
			<h3><a href="<?php echo get_category_link($cat->cat_ID);?>" rel="bookmark"><?php echo $cat->cat_name; ?></a></h3>
		</div>
		<?php } wp_reset_query(); ?>
	<?php } ?>

	<?php if (zm_get_option('nav_cat_md') == 'nav_cat') { ?>
	<ul class="menu-all-cat bgt">
		<?php
			$args=array(
				'exclude' => zm_get_option('nav_cat_e_id'),
				'hide_empty' => 0
			);
			$cats = get_categories($args);
			foreach ( $cats as $cat ) {
			query_posts( 'cat=' . $cat->cat_ID );
		?>
		<li><a class="bk" href="<?php echo get_category_link($cat->cat_ID);?>" rel="bookmark"><?php if (zm_get_option('cat_icon')) { ?><i class="<?php echo zm_taxonomy_icon_code(); ?>"></i><?php } ?><?php single_cat_title(); ?></a></li>
		<?php } ?>
		<?php wp_reset_query(); ?>
	</ul>
	<?php } ?>
	<div class="clear"></div>
</div>
<?php }