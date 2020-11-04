<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('related_mode') == 'slider_grid') { ?>
<div id="related-img" class="wow fadeInUp ms da bk">
<?php } ?>
<?php if (!zm_get_option('related_mode') || (zm_get_option('related_mode') == 'related_normal')) { ?>
<div class="related-article">
<?php } ?>
	<?php
		$post_num = zm_get_option('related_n');
		global $post;
		$tmp_post = $post;
		$tags = ''; $i = 0;
		if ( get_the_tags( $post->ID ) ) {
		foreach ( get_the_tags( $post->ID ) as $tag ) $tags .= $tag->slug . ',';
		$tags = strtr(rtrim($tags, ','), ' ', '-');
		$myposts = get_posts('numberposts='.$post_num.'&tag='.$tags.'&exclude='.$post->ID);
		foreach($myposts as $post) {
		setup_postdata($post);
	?>

	<?php related_article(); ?>

	<?php
		$i += 1;
		}
		}
		if ( $i < $post_num ) {
		$post = $tmp_post; setup_postdata($post);
		$cats = ''; $post_num -= $i;
		foreach ( get_the_category( $post->ID ) as $cat ) $cats .= $cat->cat_ID . ',';
		$cats = strtr(rtrim($cats, ','), ' ', '-');
		$myposts = get_posts('numberposts='.$post_num.'&category='.$cats.'&exclude='.$post->ID);
		foreach($myposts as $post) {
		setup_postdata($post);
	?>

	<?php related_article(); ?>

	<?php }
	}
		$post = $tmp_post; setup_postdata($post);
	?>
	<div class="clear"></div>
</div>
<?php if (zm_get_option('post_no_margin') || zm_get_option('news_model')) { ?><div class="domargin"></div><?php } ?>