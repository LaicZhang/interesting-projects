<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div id="sidebar" class="widget-area cms-sidebar">
	<div class="wow fadeInUp">
		<?php if ( ! dynamic_sidebar( 'cms-s' ) ) : ?>
			<aside id="add-widgets" class="widget widget_text bk">
				<h3 class="widget-title da bkx"><i class="be be-warning"></i>添加小工具</h3>
				<div class="textwidget">
					<a href="<?php echo admin_url(); ?>widgets.php" target="_blank">点此为“杂志布局侧边栏”添加小工具</a>
				</div>
			</aside>
		<?php endif; ?>
	</div>
</div>
<div class="clear"></div>