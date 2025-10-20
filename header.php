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
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-background-light dark:bg-background-dark font-plus-jakarta'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'edusiteco'); ?></a>

		<header class="w-full">
			<!-- Top Bar - Gobierno de Colombia -->
			<div class="bg-gov-top px-4 sm:px-6 lg:px-8">
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
			<div class="hidden md:hidden bg-gov-top backdrop-blur-sm" id="mobile-menu">
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
								class="p-2 rounded-full flex justify-center items-center bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-colors text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-white"
								aria-label="Cambiar tema"
							>
								<!-- SVG para modo claro -->
								<svg class="h-6 w-auto dark:hidden" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
									<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
									<g id="SVGRepo_iconCarrier"> 
										<path d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z" fill="currentColor">
										</path> 
									</g>
								</svg>
								<!-- SVG para modo oscuro -->
								<svg class="h-6 w-auto hidden dark:block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
									<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
									<g id="SVGRepo_iconCarrier"> 
										<circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5"></circle> 
										<path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M19.7778 4.22266L17.5558 6.25424" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M4.22217 4.22266L6.44418 6.25424" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M6.44434 17.5557L4.22211 19.7779" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
										<path d="M19.7778 19.7773L17.5558 17.5551" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> 
									</g>
								</svg>
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