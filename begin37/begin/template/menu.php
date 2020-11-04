<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if (zm_get_option('header_normal')) { ?>
<header id="masthead" class="site-header-o">
	<div id="header-main-o" class="header-main-o da">
		<?php if (!zm_get_option('top_nav_no')) { ?>
		<nav id="header-top" class="header-top-o bkx">
			<?php menu_top(); ?>
		</nav><!-- #top-header -->
		<?php } ?>

		<div class="logo-box">
			<?php if (zm_get_option("logo_css")) { ?>
				<div class="logo-site-o">
			<?php } else { ?>
				<div class="logo-sites-o">
			<?php } ?>
				<?php menu_logo(); ?>
			</div><!-- .logo-site -->
			<?php if ( zm_get_option('header_contact') ) { ?><div class="contact-header"><?php echo zm_get_option('header_contact'); ?></div><?php } ?>
			<div class="clear"></div>
		</div>
		<?php if (zm_get_option("menu_full")) { ?>
		<div id="menu-container-o" class="menu-container-o-full da bk">
		<?php } else { ?>
		<div id="menu-container-o" class="da bk">
		<?php } ?>
			<div id="navigation-top" class="bgt">
				<?php if (zm_get_option("menu_search_button")) { ?><span class="nav-search nav-search-o"></span><?php } ?>
				<?php if (zm_get_option('menu_login') && ( !wp_is_mobile() ) ) { ?>
					<span class="menu-login"><?php get_template_part( 'inc/users/user-profile' ); ?></span>
				<?php } ?>
				<div id="site-nav-wrap-o">
					<div id="sidr-close">
						<span class="toggle-sidr-close"><i class="be be-cross"></i></span>
						<?php mobile_login(); ?>
					</div>
					<nav id="site-nav" class="main-nav-o">
						<?php menu_nav(); ?>
					</nav>
				</div>

				<?php if (zm_get_option("nav_cat")) { ?><?php nav_cat(); ?><?php } ?>
				<?php if (zm_get_option("menu_post")) { ?><?php nav_img(); ?><?php } ?>
				<?php if (zm_get_option('weibo_t')) { get_template_part( 'template/weibo' ); } ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
<?php if ( !zm_get_option('top_bg') == '' ) { ?><?php add_action('wp_footer', 'top_bg'); ?><?php } ?>
</header><!-- #masthead -->
<?php } else { ?>
<?php if (zm_get_option('top_nav_no')) { ?>
<header id="masthead" class="site-header site-header-h">
<?php } else { ?>
<header id="masthead" class="site-header da site-header-s">
<?php } ?>
<?php if (!zm_get_option('menu_m') || (zm_get_option("menu_m") == 'menu_d')){ ?>
	<div id="header-main" class="header-main">
<?php } ?>
<?php if (zm_get_option('menu_m') == 'menu_n'){ ?>
	<div id="header-main-n" class="header-main-n">
<?php } ?>
<?php if (zm_get_option('menu_m') == 'menu_g'){ ?>
	<div id="header-main-g" class="header-main-g">
<?php } ?>
		<?php if (!zm_get_option('top_nav_no')) { ?>
		<nav id="header-top" class="header-top da">
			<?php menu_top(); ?>
		</nav><!-- #top-header -->
		<?php } ?>
		<div id="menu-container" class="da">
			<div id="navigation-top" class="bgt">
				<?php if (zm_get_option("menu_search_button")) { ?><span class="nav-search"></span><?php } else { ?><span class="nav-search-room"></span><?php } ?>
				<?php if (zm_get_option('menu_login') && ( !wp_is_mobile() ) ) { ?>
					<span class="menu-login"><?php get_template_part( 'inc/users/user-profile' ); ?></span>
				<?php } ?>
				<?php if (zm_get_option("logo_css")) { ?>
				<div class="logo-site">
				<?php } else { ?>
				<div class="logo-sites">
				<?php } ?>
					<?php menu_logo(); ?>
				</div><!-- .logo-site -->

				<div id="site-nav-wrap">
					<div id="sidr-close">
						<span class="toggle-sidr-close"><i class="be be-cross"></i></span>
						<?php mobile_login(); ?>
					</div>
					<nav id="site-nav" class="main-nav">
						<?php menu_nav(); ?>
					</nav>
				</div>
				<?php if (zm_get_option("nav_cat")) { ?><?php nav_cat(); ?><?php } ?>
				<?php if (zm_get_option("menu_post")) { ?><?php nav_img(); ?><?php } ?>
				<?php if (zm_get_option('weibo_t')) { get_template_part( 'template/weibo' ); } ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->
<?php } ?>
<?php if (zm_get_option("menu_search_button")) { ?><?php get_template_part( 'template/search-main' ); ?><?php } ?>