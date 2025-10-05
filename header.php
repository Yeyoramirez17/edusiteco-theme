<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edusiteco
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e('Skip to content', 'edusiteco'); ?></a>

		<header id="masthead" class="site-header flex flex-col border-b border-gray-300 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1)]">
			<div class="h-12 py-2 bg-[#4488EE] w-full flex items-center px-15">
				<a class="  cursor-pointer" href="http://gov.co" target="_blank">
					<img class="h-6" src="<?php echo get_theme_file_uri("assets/img/govco.png") ?>" alt="Portal Govierno de Colombia" srcset="" />
				</a>
			</div>
			<div class="border-b-4 border-yellow-500">
				<nav class="flex justify-center items-center px-15 py-3">
					<ul class="flex gap-8">
						<li><a class="font-normal text-lg text-gray-700 underline underline-offset-2" href="#">Transparencia y acceso a la información</a></li>
						<li><a class="font-normal text-lg text-gray-700 underline underline-offset-2" href="#">Participa</a></li>
						<li><a class="font-normal text-lg text-gray-700 underline underline-offset-2" href="#">Directorio</a></li>
					</ul>
				</nav>
			</div>
			<div class="flex justify-between items-center px-15 py-3">
				<div class="site-branding ">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()):
						?>
						<h1 class="site-title uppercase flex items-center hover:text-blue-500 font-quartzo-bold text-2xl">
							<a class="text-2xl" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<?php bloginfo('name'); ?>
							</a>
						</h1>
						<?php
					else:
						?>
						<p class="site-title uppercase text-2xl font-quartzo-bold">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<?php bloginfo('name'); ?>
							</a>
						</p>
						<?php
					endif;
					$edusiteco_description = get_bloginfo('description', 'display');
					if ($edusiteco_description || is_customize_preview()):
						?>
						<p class="site-description">
							<?php echo $edusiteco_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</p>
					<?php endif; ?>
				</div>
				<!-- .site-branding -->

				<div id="site-navigation" class="main-navigation flex border-none outline-none">
					<button class="menu-toggle bg-transparent border-none outline-none hidden" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e('Primary Menu', 'edusiteco'); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_class'     => "flex justify-center items-center gap-4",
							'menu_id'        => 'primary-menu',
							'container'      => 'nav',
							'container_class'=> ''
						)
					);
					?>
				</div>
				<!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->