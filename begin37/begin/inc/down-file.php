<?php 
function begin_down_file() {
	global $post;
	if ( get_post_meta($post->ID, 'button1', true) ) :
		$str.= '<div id="down-box">';
		$str.= '<div id="down-file">';
		$str.= "<h3>" . sprintf(__( '文件下载', 'begin' )) . "</h3>";
		$str.= '<div class="file-gg">' . stripslashes( zm_get_option('ad_down') ) . '</div>';
		$str.= '<div class="down-button">';

		if ( get_post_meta($post->ID, 'button1', true) ) :
			$button1 = get_post_meta($post->ID, 'button1', true);
			$url1 = get_post_meta($post->ID, 'url1', true);
			$str.= '<a  class="bk" href="' . $url1 .'" rel="external nofollow" target="_blank">' . $button1 . '</a>';
		endif;

		if ( get_post_meta($post->ID, 'button2', true) ) :
			$button1 = get_post_meta($post->ID, 'button2', true);
			$url1 = get_post_meta($post->ID, 'url2', true);
			$str.= '<a class="bk" href="' . $url2 .'" rel="external nofollow" target="_blank">' . $button1 . '</a>';
		endif;

		$str.= '</div></div></div>';
	endif;
	return $str;
}
function begin_down_file_filter($content) {
	if(!is_feed() && !is_home() && is_singular() && is_main_query()) {
	$content .= begin_down_file(1);
	}
	return $content;
}
add_filter('the_content','begin_down_file_filter');