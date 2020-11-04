<div id="user-profile">
<?php
	global $user_identity,$user_level;
	wp_get_current_user();
	if ($user_identity) { ?>
		<?php if ( zm_get_option('user_url') == '' ) { ?>

			<div class="user-box">
				<div class="user-my">
					<?php if (zm_get_option('cache_avatar')) { ?>
						<?php global $userdata; wp_get_current_user(); echo begin_avatar($userdata->user_email, 96, '', $user_identity); ?><span class="hi-user"><a href="javascript:void(0)"><?php echo $user_identity; ?>，<?php _e( '您好！', 'begin' ); ?></a></span>
					<?php } else { ?>
						<?php global $userdata; wp_get_current_user(); echo get_avatar($userdata->ID, 96, '', $user_identity); ?><span class="hi-user"><a href="javascript:void(0)"><?php echo $user_identity; ?>，<?php _e( '您好！', 'begin' ); ?></a></span>
					<?php } ?>
				</div>
				<div class="user-info bgt">
					<div class="arrow-up"></div>
					<div class="user-info-min">
						<h3 class="hz"><?php echo $user_identity; ?></h3>
						<div class="usericon">
							<?php if (zm_get_option('cache_avatar')) { ?>
								<?php global $userdata; wp_get_current_user(); echo begin_avatar($userdata->user_email, 96, '', $user_identity); ?>
							<?php } else { ?>
								<?php global $userdata; wp_get_current_user(); echo get_avatar($userdata->ID, 96, '', $user_identity); ?>
							<?php } ?>
						</div>
						<div class="userinfo">
							<p>
								<?php if (current_user_can('manage_options')) { 
								echo '<a href="' . admin_url() . '" target="_blank">'.sprintf(__( '管理站点', 'begin' )).'</a>'; } else { 
								echo '<a href="' .get_permalink( zm_get_option('user_url') ) . '" target="_blank">'.sprintf(__( '用户中心', 'begin' )).'</a>'; } ?>
								<a href="<?php echo wp_logout_url('index.php'); ?>"><?php _e( '登出', 'begin' ); ?></a>
							</p>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
	
		<?php } else { ?>

			<div class="user-box">
				<div class="user-my">
					<?php if (zm_get_option('cache_avatar')) { ?>
						<?php global $userdata; wp_get_current_user(); echo begin_avatar($userdata->user_email, 96, '', $user_identity); ?><span class="hi-user"><a href="javascript:void(0)"><?php echo $user_identity; ?>，<?php _e( '您好！', 'begin' ); ?></a></span>
					<?php } else { ?>
						<?php global $userdata; wp_get_current_user(); echo get_avatar($userdata->ID, 96, '', $user_identity); ?><span class="hi-user"><a href="javascript:void(0)"><?php echo $user_identity; ?>，<?php _e( '您好！', 'begin' ); ?></a></span>
					<?php } ?>
				</div>
				<div class="user-info bgt">
					<div class="arrow-up"></div>
					<div class="user-info-min bk">
						<h3 class="hz"><?php echo $user_identity; ?></h3>
						<div class="usericon">
							<?php if (zm_get_option('cache_avatar')) { ?>
								<?php global $userdata; wp_get_current_user(); echo begin_avatar($userdata->user_email, 96, '', $user_identity); ?>
							<?php } else { ?>
								<?php global $userdata; wp_get_current_user(); echo get_avatar($userdata->ID, 96, '', $user_identity); ?>
							<?php } ?>
						</div>
						<div class="userinfo">
							<p>
								<?php if (current_user_can('manage_options')) { 
								echo '<a href="' .get_permalink( zm_get_option('user_url') ) . '">'.sprintf(__( '用户中心', 'begin' )).'</a>';
								echo '<a href="' . admin_url() . '" target="_blank">'.sprintf(__( '管理站点', 'begin' )).'</a>'; } else { 
								echo '<a href="' .get_permalink( zm_get_option('user_url') ) . '">'.sprintf(__( '用户中心', 'begin' )).'</a>'; 
								if (zm_get_option('no_admin')) {} else {echo '<a href="' . admin_url() . '" target="_blank">'.sprintf(__( '管理站点', 'begin' )).'</a>';}} ?>
								<a href="<?php echo wp_logout_url('index.php'); ?>"><?php _e( '登出', 'begin' ); ?></a>
							</p>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

	<?php } else { ?>
		<?php if ( zm_get_option('reg_url') == '' ) { ?>
			<div class="user-login"><?php echo stripslashes( zm_get_option('wel_come') ); ?></div>
		<?php } else { ?>
			<div class="user-login"><a href="<?php echo stripslashes( zm_get_option('reg_url') ); ?>" target="_blank"><i class="be be-personoutline"></i><?php _e( '注册', 'begin' ); ?></a></div>
		<?php } ?>
	<?php } ?>

	<?php if (zm_get_option('user_l')) { ?>
		<?php if ( !is_user_logged_in()){ ?>
			<div class="nav-set">
			 	<div class="nav-login">
					<a href="<?php echo wp_login_url(  home_url() ); ?>"><i class="be be-timerauto"></i><?php _e( '登录', 'begin' ); ?></a>
				</div>
					<div class="clear"></div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<?php if ( !is_user_logged_in()){ ?>
			<div class="nav-set">
			 	<div class="nav-login">
					<div class="show-layer" data-show-layer="login-layer" role="button"><i class="be be-timerauto"></i><?php _e( '登录', 'begin' ); ?></div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
	<?php } ?>

	<div class="clear"></div>
</div>