<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('ad_a')) { ?>
<div class="tg-cms wow fadeInUp<?php if (zm_get_option('post_no_margin') && zm_get_option('news_model') == 'news_normal') { ?> upclose<?php } ?>">
	<?php if ( wp_is_mobile() ) { ?>
		<?php if ( zm_get_option('ad_a_c_m') ) { ?><div class="tg-m tg-site"><?php echo stripslashes( zm_get_option('ad_a_c_m') ); ?></div><?php } ?>
	<?php } else { ?>
		<?php if ( zm_get_option('ad_a_c') ) { ?><div class="tg-pc tg-site"><?php echo stripslashes( zm_get_option('ad_a_c') ); ?></div><?php } ?>
	<?php } ?>
</div>
<?php } ?>