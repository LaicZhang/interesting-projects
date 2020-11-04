<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('group_tab')) { ?>
<div class="g-row <?php if (zm_get_option('bg_17')) { ?>g-line<?php } ?> sort" name="<?php echo zm_get_option('group_tab_s'); ?>">
	<div class="g-col">
		<div class="group-tabs-content wow fadeInUp da ms bk">
			<ul class="group-tabs has-tabs<?php if ( !zm_get_option('tab_b_d')) { ?> group-tabs3<?php } ?>">
				<li class="tab_title selected"><a href="#" id="groupa-tab"><?php echo zm_get_option('anli_t'); ?></a></li>
				<li class="tab_title"><a href="#" id="groupb-tab"><?php echo zm_get_option('cp_t'); ?></a></li>
				<?php if ( !zm_get_option('sb_t') == '' ) { ?><li class="tab_title"><a href="#" id="groupc-tab"><?php echo zm_get_option('sb_t'); ?></a></li><?php } ?>
				<?php if ( !zm_get_option('by_t') == '' ) { ?><li class="tab_title"><a href="#" id="groupd-tab"><?php echo zm_get_option('by_t'); ?></a></li><?php } ?>
			</ul>
			<div class="clear"></div>
			<div class="group-tabs-inside da">
				<div id="groupa-tab-content" class="tab-content"></div>
				<div id="groupb-tab-content" class="tab-content"></div>
				<?php if ( zm_get_option('sb_t')) { ?>
					<div id="groupc-tab-content" class="tab-content"></div>
				<?php } ?>
				<?php if ( zm_get_option('by_t')) { ?>
					<div id="groupd-tab-content" class="tab-content"></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php } ?>