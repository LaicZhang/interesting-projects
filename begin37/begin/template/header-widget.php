<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('header_widget')) { ?>
<div class="header-sub">
<div id="header-widget" class="wow fadeInUp">
	<?php dynamic_sidebar( 'header-widget' ); ?>
	<div class="clear"></div>
</div>
</div>
<?php } ?>