<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('ajax_tabs')) { ?>
<div class="begin-tabs-content wow fadeInUp da ms bk">
	<ul class="begin-tabs has-tabs<?php if ( !zm_get_option('tab_b_d')) { ?> begin-tabs3<?php } ?>">
		<li class="tab_title selected"><a href="#" id="sorta-tab"><?php echo zm_get_option('tab_b_a'); ?></a></li>
		<li class="tab_title"><a href="#" id="sortb-tab"><?php echo zm_get_option('tab_b_b'); ?></a></li>
		<li class="tab_title"><a href="#" id="sortc-tab"><?php echo zm_get_option('tab_b_c'); ?></a></li>
		<?php if ( !zm_get_option('tab_b_d') == '' ) { ?><li class="tab_title"><a href="#" id="sortd-tab"><?php echo zm_get_option('tab_b_d'); ?></a></li><?php } ?>
	</ul>
	<div class="clear"></div>
	<div class="begin-tabs-inside<?php if (zm_get_option('tabs_mode') == 'tabs_img_mode') { ?> begin-tabs-inside-img<?php } ?> da">
		<div id="sorta-tab-content" class="tab-content"></div>
		<div id="sortb-tab-content" class="tab-content"></div>
		<div id="sortc-tab-content" class="tab-content"></div>
		<?php if ( zm_get_option('tab_b_d')) { ?>
			<div id="sortd-tab-content" class="tab-content"></div>
		<?php } ?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<?php } ?>