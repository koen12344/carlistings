<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autodealer
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'autodealer' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-top">
				<div class="container">
					<div class="topbar-left">
						<?php
						if ( '' !== get_theme_mod( 'header_time' ) ) :
							?>
							<p class="time-work"><?php echo esc_html( get_theme_mod( 'header_time', __( '10:00 AM To 5:00 PM', 'autodealer' ) ) ); ?>
							</p>
						<?php endif; ?>

						<?php
						if ( '' !== get_theme_mod( 'header_mail' ) ) :
							?>
							<a class="mail-to" href="mailto:<?php echo esc_html( get_theme_mod( 'header_mail', __( 'autodealer@no-reply.com', 'autodealer' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'header_mail', __( 'autodealer@no-reply.com', 'autodealer' ) ) ); ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="topbar-right">
						<div class="social-media">
							<?php
							if ( function_exists( 'jetpack_social_menu' ) ) {
								jetpack_social_menu();
							}
							?>
						</div>
						<?php if ( is_active_sidebar( 'topbar-languages' ) ) : ?>
							<div class="topbar-languages">
								<?php dynamic_sidebar( 'topbar-languages' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$autodealer_description = get_bloginfo( 'description', 'display' );
					if ( $autodealer_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $autodealer_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="bar"></span><?php esc_html_e( 'Menu', 'autodealer' ); ?></button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->

		<?php if ( is_front_page() && ! is_home() ) : ?>
			<?php get_template_part( 'template-parts/featured-content' ); ?>
		<?php endif; ?> <!-- featured-cotent -->

		<?php if ( ! is_front_page() ) : ?>
			<div class="page-header">
				<?php autodealer_breadcrumbs(); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! is_home() && is_front_page() ) : ?>
			<div id="content" class="site-content">
			<?php else : ?>
				<div id="content" class="site-content container">
				<?php endif; ?>
