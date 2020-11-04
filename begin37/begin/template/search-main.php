<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div id="search-main" class="da">
	<div class="off-search wow fadeInRight animated"></div>
	<div class="off-search-a"></div>
	<div class="search-wrap wow fadeInDown animated">
		<?php if (zm_get_option('wp_s')) { ?>
			<div class="searchbar da">
				<form method="get" id="searchform-so" action="<?php echo esc_url( home_url() ); ?>/">
					<span class="search-input">
						<input type="text" value="<?php the_search_query(); ?>" name="s" id="so" class="bk da" placeholder="<?php _e( '输入搜索内容', 'begin' ); ?>" required />
						<button type="submit" id="searchsubmit-so" class="bk da"><i class="be be-search"></i></button>
					</span>
					<?php if (zm_get_option('search_option') == 'search_cat') { ?><?php search_cat_args( ); ?><?php } ?>
					<div class="clear"></div>
				</form>
			</div>
		<?php } ?>

		<?php if (zm_get_option('baidu_s')) { ?>
		<div class="searchbar da">
			<script>
			function g(formname) {
				var url = "https://www.baidu.com/baidu";
				if (formname.s[1].checked) {
					formname.ct.value = "2097152";
				} else {
					formname.ct.value = "0";
				}
				formname.action = url;
				return true;
			}
			</script>
			<form name="f1" onsubmit="return g(this)" target="_blank">
				<span class="search-input">
					<input name=word class="swap_value bk da" placeholder="<?php _e( '输入百度站内搜索关键词', 'begin' ); ?>" name="q" />
					<input name=tn type=hidden value="bds" />
					<input name=cl type=hidden value="3" />
					<input name=ct type=hidden />
					<input name=si type=hidden value="<?php echo $_SERVER['SERVER_NAME']; ?>" />
					<button type="submit" id="searchbaidu" class="search-close bk da"><i class="be be-baidu"></i></button>
					<input name=s class="choose" type=radio />
					<input name=s class="choose" type=radio checked />
				</span>
			</form>
		</div>
		<?php } ?>

		<?php if (zm_get_option('360_s')) { ?>
		<div class="searchbar da">
			<form action="https://www.so.com/s" target="_blank" id="so360form">
				<span class="search-input">
					<input type="text" autocomplete="off"  placeholder="<?php _e( '输入360站内搜索关键词', 'begin' ); ?>" name="q" id="so360_keyword" class="bk da">
					<button type="submit" id="so360_submit" class="search-close bk da">360</button>
					<input type="hidden" name="ie" value="utf-8">
					<input type="hidden" name="src" value="zz_<?php echo $_SERVER['SERVER_NAME']; ?>">
					<input type="hidden" name="site" value="<?php echo $_SERVER['SERVER_NAME']; ?>">
					<input type="hidden" name="rg" value="1">
					<input type="hidden" name="inurl" value="">
				</span>
			</form>
		</div>
		<?php } ?>

		<?php if (zm_get_option('sogou_s')) { ?>
		<div class="searchbar da">
			<form action="https://www.sogou.com/web" target="_blank" name="sogou_queryform">
				<span class="search-input">
					<input type="text" placeholder="<?php _e( '输入搜狗站内搜索关键词', 'begin' ); ?>" name="query" class="bk da">
					<button type="submit" id="sogou_submit" class="search-close bk da" onclick="check_insite_input(document.sogou_queryform, 1)"><?php _e( '搜狗', 'begin' ); ?></button>
					<input type="hidden" name="insite" value="<?php echo $_SERVER['SERVER_NAME']; ?>">
				</span>
			</form>
		</div>
		<?php } ?>
		<div class="clear"></div>

		<?php if (zm_get_option('search_nav')) { ?>
		<nav class="search-nav hz">
			<h4 class="hz"><?php _e( '搜索热点', 'begin' ); ?></h4>
			<div class="clear"></div>
			<?php
				wp_nav_menu( array(
					'theme_location'=> 'search',
					'menu_class'    => 'search-menu',
					'fallback_cb'   => 'search_menu'
				) );
			?>
		</nav>
		<?php } ?>
	</div>
	<div class="off-search-b">
		<div class="clear"></div>
	</div>
</div>