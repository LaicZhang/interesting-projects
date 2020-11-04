<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php if ( get_post_meta($post->ID, 'postauthor', true) ) : ?>
<div class="authorbio wow fadeInUp ms bk">
	<?php if (zm_get_option('cache_avatar')) { ?>
	<?php echo begin_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
	<?php } else { ?>
	<?php echo get_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
	<?php } ?>
	<ul class="spostinfo">
		<?php $author = get_post_meta($post->ID, 'postauthor', true); ?>
		<?php $aurl = get_post_meta($post->ID, 'authorurl', true); ?>
		<li><?php _e( '本文由', 'begin' ); ?> <a target="_blank" rel="nofollow" href="<?php echo $aurl ?>" ><b><?php echo $author ?></b></a> <?php _e( '投稿', 'begin' ); ?>，<?php _e( '于', 'begin' ); ?><?php time_ago( $time_type ='posts' ); ?><?php _e( '发表', 'begin' ); ?></li>
		<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_indicate' ) ) ); ?></li>
	</ul>
	<div class="clear"></div>
</div>
<?php else: ?>
<div class="authorbio wow fadeInUp ms bk">
	<?php if (zm_get_option('copyright_avatar')) { ?>
		<?php if (zm_get_option('cache_avatar')) { ?>
		<?php echo begin_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
		<?php } else { ?>
		<?php echo get_avatar( get_the_author_meta('email'), '64', '', get_the_author() ); ?>
		<?php } ?>
	<?php } ?>
	<ul class="spostinfo">
		<?php $copy = get_post_meta($post->ID, 'copyright', true); ?>
		<?php if ( get_post_meta($post->ID, 'from', true) ) : ?>
			<?php $original = get_post_meta($post->ID, 'from', true); ?>
			<li>
				<strong><?php _e( '版权声明', 'begin' ); ?></strong> <?php _e( '本文源自', 'begin' ); ?>
				<?php if ( get_post_meta($post->ID, 'copyright', true) ) : ?>
					<a href="<?php echo $copy ?>" rel="nofollow" target="_blank"><?php echo $original ?></a>，
				<?php else: ?>
					<?php echo $original ?>，
				<?php endif; ?>
				<?php the_author_posts_link(); ?> <?php _e( '整理', 'begin' ); ?> <?php _e( '发表于', 'begin' ); ?> <?php time_ago( $time_type ='posts' ); ?>
			</li>
			<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_indicate' ) ) ); ?></li>
		<?php else: ?>
			<?php if ( zm_get_option('copyright_statement') == '' ) { ?>
				<li><?php _e( '本文由', 'begin' ); ?> <?php the_author_posts_link(); ?> <?php _e( '发表于', 'begin' ); ?> <?php time_ago( $time_type ='posts' ); ?></li>
			<?php } else { ?>
				<li class="reprinted"><?php echo zm_get_option('copyright_statement'); ?></li>
			<?php } ?>
			<li class="reprinted"><?php echo str_replace( array('{{title}}', '{{link}}' ), array( get_the_title(), get_permalink() ), stripslashes( zm_get_option( 'copyright_indicate' ) ) ); ?></li>
		<?php endif; ?>
	</ul>
	<div class="clear"></div>
</div>
<?php endif; ?>