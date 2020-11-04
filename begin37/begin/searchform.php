<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="searchbar da">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
		<span class="search-input">
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="bk da" placeholder="<?php _e( '输入搜索内容', 'begin' ); ?>" required />
			<button type="submit" id="searchsubmit" class="bk da"><i class="be be-search"></i></button>
		</span>
		<div class="clear"></div>
	</form>
</div>