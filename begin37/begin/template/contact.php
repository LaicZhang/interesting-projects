<?php if (zm_get_option('contact_us')) { ?>
<div class="contactus <?php if ( zm_get_option('contact_s')) { ?>contactus-s<?php } ?>">
	<div class="usbtn bk">
		<span>联</span><span>系</span><span>我</span><span>们</span>
	</div>
	<div class="usmain-box">
		<div class="usmain bk">
			<?php if ( !zm_get_option('weixing_us') == '' ) { ?>
			<div class="usbox usweixin">
				<img class="bk" title="微信咨询" alt="微信" src="<?php echo zm_get_option('weixing_us'); ?>"/>
				<p><i class="be be-weixin"></i><?php echo zm_get_option('weixing_us_t'); ?></p>
			</div>
			<?php } ?>

			<?php if ( !zm_get_option('usqq_id') == '' ) { ?>
			<div class="usbox usqq">
				<p><a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo zm_get_option('usqq_id'); ?>&site=qq&menu=yes" title="QQ咨询" target="_blank" rel="external nofollow" ><i class="be be-qq"></i><?php echo zm_get_option('usqq_t'); ?></a></p>
			</div>
			<?php } ?>

			<?php if ( !zm_get_option('usshang_url') == '' ) { ?>
			<div class="usbox usshang">
				<p><a target="_blank" rel="external nofollow" href="<?php echo zm_get_option('usshang_url'); ?>"><i class="be be-timerauto"></i><?php echo zm_get_option('usshang_t'); ?></a></p>
			</div>
			<?php } ?>


			<?php if ( !zm_get_option('us_phone') == '' ) { ?>
			<div class="usbox usphone">
				<?php if ( wp_is_mobile() ) { ?>
					<p><a target="_blank" rel="external nofollow" href="tel:<?php echo zm_get_option('us_phone'); ?>"><i class="be be-phone"></i>服务热线<p class="ustel"><?php echo zm_get_option('us_phone'); ?></p></a></p>
				<?php } else { ?>
					<p><i class="be be-phone"></i><?php echo zm_get_option('us_phone_t'); ?></p>
					<p class="ustel"><?php echo zm_get_option('us_phone'); ?></p>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>