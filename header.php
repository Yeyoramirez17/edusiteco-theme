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
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&amp;display=swap"
		rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-background-light dark:bg-background-dark font-plus-jakarta'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'edusiteco'); ?></a>

		<header class="w-full">
			<!-- Top Bar - Gobierno de Colombia -->
			<div class="bg-primary px-4 sm:px-6 lg:px-8">
				<div class="max-w-7xl mx-auto flex items-center justify-between h-12">
					<a href="https://www.gov.co" rel="noopener noreferrer" target="_blank">
						<img 
							alt="Logo Gov.co" class="h-6"
							src="<?php echo get_theme_file_uri("assets/img/govco.png"); ?>" 
						/>
					</a>
					<div class="hidden md:flex items-center space-x-6">
						<a class="text-white text-sm font-medium hover:underline" href="#">Transparencia</a>
						<a class="text-white text-sm font-medium hover:underline" href="#">Participa</a>
						<a class="text-white text-sm font-medium hover:underline" href="#">Directorio</a>
					</div>
					<div class="md:hidden">
						<button class="text-white p-2 bg-gray-100 hover:bg-gray-300 transition-colors" id="mobile-menu-button">
							<img 
								class="w-6" src="<?php echo get_theme_file_uri("assets/svg/menu-burger.svg") ?>"
								alt="<?php echo esc_attr_e('Menu ITA', 'edusiteco'); ?>" 
							/>
						</button>
					</div>
				</div>
			</div>

			<!-- Mobile Menu (Top) -->
			<div class="hidden md:hidden bg-primary/95 backdrop-blur-sm" id="mobile-menu">
				<div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
					<a class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-white/10"
						href="#">Transparencia</a>
					<a class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-white/10"
						href="#">Participa</a>
					<a class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-white/10"
						href="#">Directorio</a>
				</div>
			</div>

			<!-- Main Header -->
			<div class="bg-background-light dark:bg-background-dark border-b-4 border-accent">
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
					<div class="flex items-center justify-between h-20">
						<div class="flex items-center">
							<div class="flex-shrink-0">
								<?php
								// Logo del sitio
								if (has_custom_logo()) {
									the_custom_logo();
								} else {
									?>
									<div class="site-branding">
										<?php if (is_front_page() && is_home()): ?>
											<h1 class="site-title font-quartzo-bold text-3xl">
												<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
													class="text-text-light dark:text-text-dark hover:text-primary transition-colors">
													<?php bloginfo('name'); ?>
												</a>
											</h1>
										<?php else: ?>
											<p class="site-title font-quartzo-bold text-2xl">
												<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
													class="text-text-light dark:text-text-dark hover:text-primary transition-colors">
													<?php bloginfo('name'); ?>
												</a>
											</p>
										<?php endif; ?>

										<?php
										$edusiteco_description = get_bloginfo('description', 'display');
										if ($edusiteco_description || is_customize_preview()):
											?>
											<p class="site-description text-sm text-gray-600 mt-1">
												<?php echo $edusiteco_description; ?>
											</p>
										<?php endif; ?>
									</div>
									<?php
								}
								?>
							</div>

							<!-- Desktop Navigation -->
							<nav class="hidden lg:flex lg:ml-10 lg:space-x-8">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_class' => 'flex space-x-8',
										'container' => false,
										'items_wrap' => '%3$s',
										'fallback_cb' => false,
										'walker' => new Custom_Nav_Walker()
									)
								);

								// Menú por defecto si no hay menú configurado
								if (!has_nav_menu('menu-1')) {
									edusiteco_default_menu();
								}
								?>
							</nav>
						</div>

						<div class="flex items-center space-x-4">
							<!-- Search Bar -->
							<div class="hidden md:block relative">
								<?php get_search_form(); ?>
							</div>

							<!-- Botón Tema Oscuro/Claro -->
							<button id="theme-toggle"
								class="p-2 rounded-[50%] flex justify-center items-center bg-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors text-text-light dark:text-text-dark"
								aria-label="Cambiar tema">
								<img
									class="h-6 w-auto dark:hidden"
									src="<?php echo get_theme_file_uri('assets/svg/dark-theme.svg') ?>"
									alt="<?php echo esc_attr_e('Cambiar tema oscuro', 'edusiteco'); ?>"
								/>
								<img
									class="h-6 w-auto hidden dark:block"
									src="<?php echo get_theme_file_uri('assets/svg/light-theme.svg') ?>"
									alt="<?php echo esc_attr_e('Cambiar tema claro', 'edusiteco'); ?>"
								/>
							</button>

							<!-- Mobile Menu Button -->
							<div class="lg:hidden">
								<button
									class="text-text-light dark:text-text-dark p-2 rounded-md bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
									id="main-mobile-menu-button">
									<img 
										class="w-6"
										src="<?php echo get_theme_file_uri('assets/svg/menu-burger.svg') ?>"
										alt="<?php echo esc_attr_e('Menu Principal', 'edusiteco'); ?>"
									/>
								</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Mobile Main Menu -->
				<div class="hidden lg:hidden border-t border-border-light dark:border-border-dark"
					id="main-mobile-menu">
					<div class="pt-2 pb-4 space-y-1">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_class' => 'space-y-1',
								'container' => false,
								'items_wrap' => '<div class="space-y-1">%3$s</div>',
								'fallback_cb' => 'edusiteco_default_mobile_menu',
								'walker' => new Mobile_Nav_Walker()
							)
						);

						// Menú móvil por defecto
						if (!has_nav_menu('menu-1')) {
							edusiteco_default_mobile_menu();
						}
						?>

						<!-- Mobile Search -->
						<div class="p-4 md:hidden border-t border-border-light dark:border-border-dark">
							<div class="relative">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>