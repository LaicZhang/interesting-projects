<?php
// 配置邮件SMTP
add_action('phpmailer_init', 'mail_smtp');
function mail_smtp( $phpmailer ) {
	$phpmailer->FromName = ''. zm_get_option('email_name') . '';
	$phpmailer->Host = ''. zm_get_option('email_smtp') . '';
	$phpmailer->Port = 465;
	$phpmailer->Username = ''. zm_get_option('email_account') . '';
	$phpmailer->Password = ''. zm_get_option('email_authorize') . '';
	$phpmailer->From = ''. zm_get_option('email_account') . '';
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = 'ssl';
	$phpmailer->IsSMTP();
}