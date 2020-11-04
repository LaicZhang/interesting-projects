<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
// gravatar头像调用
function cn_avatar($avatar) {
	$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://cn.gravatar.com/avatar/$1?s=$2&d=mm" alt="avatar" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
	return $avatar;
}

function ssl_avatar($avatar) {
	$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2&d=mm" alt="avatar" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
	return $avatar;
}

if (zm_get_option('no') !== 'no') :
	if (!zm_get_option('gravatar_url') || (zm_get_option("gravatar_url") == 'cn')) {
		add_filter('get_avatar', 'cn_avatar');
	}

	if (zm_get_option('gravatar_url') == 'ssl') {
		add_filter('get_avatar', 'ssl_avatar');
	}
endif;

// 后台禁止头像
if (zm_get_option('ban_avatars') && is_admin()) {
	add_filter( 'get_avatar' , 'ban_avatar' , 1 , 1 );
}
function ban_avatar( $avatar) {
	$avatar = "";
}