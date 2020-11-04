<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('grid_widget_two')) { ?>
<div id="cms-widget-two" class="wow fadeInUp">
	<?php if ( ! dynamic_sidebar( 'cms-two' ) ) : ?>
		<aside class="add-widgets da bk">
			<a href="<?php echo admin_url(); ?>widgets.php" target="_blank">点此为“杂志两栏小工具”添加小工具</a>
		</aside>
	<?php endif; ?>
	<div class="clear"></div>
</div>
<?php } ?>