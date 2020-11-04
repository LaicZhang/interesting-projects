<?php require( dirname(__FILE__) . '/../../../wp-load.php' ); ?>
<?php if (zm_get_option('go_header')) { ?>
<?php
if( strlen( $_SERVER['REQUEST_URI'] ) > 384 || strpos( $_SERVER['REQUEST_URI'], "eval(") || strpos( $_SERVER['REQUEST_URI'], "base64" ) ) {
	@header( "HTTP/1.1 414 Request-URI Too Long" );
	@header( "Status: 414 Request-URI Too Long" );
	@header( "Connection: Close" );
	@exit;
}
$go_url = preg_replace( '/^url=(.*)$/i','$1',$_SERVER["QUERY_STRING"] );
if( !empty( $go_url ) ) {
	if ( $go_url == base64_encode( base64_decode( $go_url ) ) ) {
		$go_url =  base64_decode( $go_url );
	}
	preg_match( '/^(http|https|thunder|qqdl|ed2k|Flashget|qbrowser):\/\//i', $go_url, $matches );
	if( $matches ) {
		$url = $go_url;
		$title = '跳转提示';
	} else {
		preg_match( '/\./i', $go_url, $matche );
		if( $matche ) {
			$url = 'http://'. $go_url;
			$title = '跳转提示';
		} else {
			$url = 'http://'.$_SERVER['HTTP_HOST'];
			$title = '出现错误，正在返回首页';
		}
	}
} else {
	$title = '出现错误，正在返回首页';
	$url = 'http://'.$_SERVER['HTTP_HOST'];
}
?>

<?php
add_filter( 'body_class' ,'go_body_classes' );
function go_body_classes( $classes ) {
	$classes[] = 'goto';
	return $classes;
}
get_header();
?>
<meta name="robots" content="noindex, nofollow" />
<title><?php echo $title;?><?php connector(); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/go.css" />
<div class="header-sub">
	<div class="cat-des wow fadeInUp ms">
		<div class="cat-des-img"><img src="<?php echo zm_get_option('header_author_img'); ?>" alt="<?php the_author(); ?>"></div>
		<div class="des-title bgt"><h1 class="des-t bgt">跳转提示</h1></div>
	</div>
</div>
<section id="primary-goto" class="content-goto">
	<main id="main" class="site-main" role="main">
		<div class="page bk da ms">
			<?php if( empty( $matches ) ) { ?>
				<div class="alert-concent">
					<div class="alert-title">链接出现错误！</div>
				</div>
				<div style="text-align: center;margin: 30px 0;">
					<span>将于</span>
					<span id="count-text"></span>
					<span> 秒之后，返回<?php bloginfo( 'name' ); ?>首页。</span>
				</div>
				<div class="alert-footer alert-home">
					<a class="btn bk" href="<?php echo esc_url( home_url( '/' ) ); ?>">返回首页</a>
				</div>
				<script>
					var t = 10;
					function countDown() {
						t -= 1;
						document.getElementById('count-text').innerHTML = t;
						if (t == 0) {
							location.href = '<?php echo esc_url( home_url() ); ?>';
						}
						setTimeout("countDown()", 1000);
					}
					countDown();
				</script>
			<?php } else { ?>
			<div class="alert-box">
				<div class="alert-concent">
					<div class="alert-title">您将要访问</div>
					<div class="alert-url"><span class="turn-be"><i class="be be-loader"></i></span><?php echo $url;?></div>
					<div class="alert-txt">安全性未知，是否继续？</div>
				</div>
				<div class="alert-footer">
					<a class="btn alert-btn" href="<?php echo $url;?>">继续访问</a>
					<!-- <a class="btn bk" href="<?php echo esc_url( home_url( '/' ) ); ?>">返回首页</a> -->
					<span class="btn bk" onclick="closePage()">取消访问</span>
				</div>
			</div>
				<script>
					// 关闭
					function closePage() {
						host = document.referrer;
						window.location.href = host;
						window.history.back();
						window.opener=null;
						window.open('','_self');
						window.close();
						WeixinJSBridge.call('closeWindow');
					}
				</script>
			<?php } ?>
		</div>
	</main>
	<?php get_template_part('ad/ads', 'comments'); ?>
</section>
<?php get_footer(); ?>
<?php } else { ?>
<?php 
$url = $_GET['url'];
$a = '';
if( $a==$url ) {
	$b = "";
} else {
	$b = $url;
	$b = base64_decode($b);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="0.1;url=<?php echo $b; ?>">
<meta charset="utf-8">
<title>加载中</title>
<script type="text/javascript">
var msg = document.title;
msg = "" + msg;pos = 0;
function scrollMSG() {
	document.title = msg.substring(pos, msg.length) + msg.substring(0, pos);
	pos++;
	if (pos >  msg.length) pos = 0
	window.setTimeout("scrollMSG()",200);
}
scrollMSG();
</script>
<style>.body-go{overflow:hidden;background:#666}.container{display:flex;justify-content:center;align-items:center;height:100vh;overflow:hidden;animation-delay:1s}.item-1{width:20px;height:20px;background:#f583a1;border-radius:50%;background-color:#eed968;margin:7px;display:flex;justify-content:center;align-items:center}@keyframes scale{0%{transform:scale(1)}50%,75%{transform:scale(3.5)}78%,100%{opacity:0}}.item-1:before{content:'';width:20px;height:20px;border-radius:50%;background-color:#eed968;opacity:.7;animation:scale 2s infinite cubic-bezier(0,0,0.49,1.02);animation-delay:200ms;transition:.5s all ease;transform:scale(1)}.item-2{width:20px;height:20px;background:#f583a1;border-radius:50%;background-color:#eece68;margin:7px;display:flex;justify-content:center;align-items:center}@keyframes scale{0%{transform:scale(1)}50%,75%{transform:scale(3.5)}78%,100%{opacity:0}}.item-2:before{content:'';width:20px;height:20px;border-radius:50%;background-color:#eece68;opacity:.7;animation:scale 2s infinite cubic-bezier(0,0,0.49,1.02);animation-delay:400ms;transition:.5s all ease;transform:scale(1)}.item-3{width:20px;height:20px;background:#f583a1;border-radius:50%;background-color:#eec368;margin:7px;display:flex;justify-content:center;align-items:center}@keyframes scale{0%{transform:scale(1)}50%,75%{transform:scale(3.5)}78%,100%{opacity:0}}.item-3:before{content:'';width:20px;height:20px;border-radius:50%;background-color:#eec368;opacity:.7;animation:scale 2s infinite cubic-bezier(0,0,0.49,1.02);animation-delay:600ms;transition:.5s all ease;transform:scale(1)}.item-4{width:20px;height:20px;background:#f583a1;border-radius:50%;background-color:#eead68;margin:7px;display:flex;justify-content:center;align-items:center}@keyframes scale{0%{transform:scale(1)}50%,75%{transform:scale(3.5)}78%,100%{opacity:0}}.item-4:before{content:'';width:20px;height:20px;border-radius:50%;background-color:#eead68;opacity:.7;animation:scale 2s infinite cubic-bezier(0,0,0.49,1.02);animation-delay:800ms;transition:.5s all ease;transform:scale(1)}.item-5{width:20px;height:20px;background:#f583a1;border-radius:50%;background-color:#ee8c68;margin:7px;display:flex;justify-content:center;align-items:center}@keyframes scale{0%{transform:scale(1)}50%,75%{transform:scale(3.5)}78%,100%{opacity:0}}.item-5:before{content:'';width:20px;height:20px;border-radius:50%;background-color:#ee8c68;opacity:.7;animation:scale 2s infinite cubic-bezier(0,0,0.49,1.02);animation-delay:1000ms;transition:.5s all ease;transform:scale(1)}</style>
</head>
<body class="body-go">
<div class="container">
	<div class="item-1"></div>
	<div class="item-2"></div>
	<div class="item-3"></div>
	<div class="item-4"></div>
	<div class="item-5"></div>
</div>
</body>
</html>
<?php } ?>