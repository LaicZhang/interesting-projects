<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<?php if (zm_get_option('404_go') == '404_h') { ?>
<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".stripslashes( zm_get_option('404_url') ));
exit();
?>
<?php } ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="error-404 not-found page bk da">
			<header class="entry-header">
				<h1 class="page-title"><?php echo stripslashes( zm_get_option('404_t') ); ?></h1>
			</header><!-- .page-header -->
			<div class="single-content" style="text-align: center;height: 100vh;">
				<div style="text-align: center;"><?php echo stripslashes( zm_get_option('404_c') ); ?></div>
				<?php if (!zm_get_option('404_go') || (zm_get_option('404_go') == '404_s')) { ?>
					<div style="text-align: center;margin: 30px 0;">
						<span>将于</span>
						<span id="sec-text"></span>
						<span> 秒之后，返回<?php bloginfo( 'name' ); ?>首页。</span>
					</div>
					<script>
						var t = 10;
						function countDown() {
							t -= 1;
							document.getElementById('sec-text').innerHTML = t;
							if (t == 0) {
								location.href = '<?php echo stripslashes( zm_get_option('404_url') ); ?>';
							}
							setTimeout("countDown()", 1000);
						}
						countDown();
					</script>
				<?php } ?>
				<!-- <?php get_search_form(); ?> -->
				<br /><br /><br /><br /><br /><br /><br /><br /><br />
			</div>
		</section>
	</main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>