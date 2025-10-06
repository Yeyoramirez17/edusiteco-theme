<?php
/**
 * The main template file for the front page
 *
 * @package edusiteco
 */

get_header();
?>

	<main id="primary" class="site-main">

		<!-- Hero Section - Carrusel -->
		<section class="hero-section relative bg-gray-100">
			<div class="swiper-container overflow-hidden">
				<div class="swiper-wrapper">
					<!-- Slide 1 -->
					<div class="swiper-slide relative">
						<div class="bg-cover bg-center h-96 lg:h-[600px]" style="background-image: url('<?php echo get_theme_file_uri("assets/img/hero.jpg"); ?>')">
							<div class="absolute inset-0 bg-black bg-opacity-40"></div>
							<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
								<div class="text-white max-w-2xl">
									<h1 class="text-4xl lg:text-6xl font-bold font-display mb-4">Bienvenidos a <?php echo get_bloginfo('name'); ?></h1>
									<p class="text-xl lg:text-2xl mb-8">Formando líderes para el futuro con excelencia académica y valores</p>
									<div class="flex flex-col sm:flex-row gap-4">
										<a href="#admissions" class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-lg font-semibold text-lg transition-colors text-center">
											Admisiones
										</a>
										<a href="#about" class="bg-white hover:bg-gray-100 text-primary px-8 py-3 rounded-lg font-semibold text-lg transition-colors text-center">
											Conoce más
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Slide 2 -->
					<div class="swiper-slide relative">
						<div class="bg-cover bg-center h-96 lg:h-[600px]" style="background-image: url('<?php echo get_theme_file_uri("assets/img/hero.jpg"); ?>')">
							<div class="absolute inset-0 bg-black bg-opacity-40"></div>
							<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
								<div class="text-white max-w-2xl">
									<h2 class="text-4xl lg:text-6xl font-bold font-display mb-4">Excelencia Educativa</h2>
									<p class="text-xl lg:text-2xl mb-8">Programas académicos innovadores y docentes altamente calificados</p>
									<a href="#programs" class="bg-accent hover:bg-accent/90 text-white px-8 py-3 rounded-lg font-semibold text-lg transition-colors inline-block">
										Nuestros Programas
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Navigation -->
				<div class="swiper-button-next text-white mr-4"></div>
				<div class="swiper-button-prev text-white ml-4"></div>
				<div class="swiper-pagination"></div>
			</div>
		</section>

		<!-- Sección de Comunicados -->
		<section class="py-16 bg-background-light dark:bg-background-dark">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-12">
					<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">Comunicados Recientes</h2>
					<p class="text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto">Mantente informado sobre las últimas noticias y anuncios de nuestra institución</p>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
					<?php
					// Query para los últimos 4 comunicados
					$comunicados = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'category_name' => 'comunicados'
					));

					if ($comunicados->have_posts()) :
						while ($comunicados->have_posts()) : $comunicados->the_post();
					?>
					<article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
						<?php if (has_post_thumbnail()) : ?>
							<div class="h-48 overflow-hidden">
								<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
							</div>
						<?php endif; ?>
						
						<div class="p-6">
							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
								<a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
									<?php the_title(); ?>
								</a>
							</h3>
							
							<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
								<span class="material-icons text-xs mr-1">event</span>
								<time datetime="<?php echo get_the_date('c'); ?>">
									<?php echo get_the_date(); ?>
								</time>
							</div>
							
							<p class="text-text-light dark:text-text-dark text-sm line-clamp-3">
								<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
							</p>
							
							<a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-primary hover:text-primary/80 font-semibold text-sm transition-colors">
								Leer más →
							</a>
						</div>
					</article>
					<?php
						endwhile;
						wp_reset_postdata();
					else :
					?>
					<!-- Comunicados de ejemplo cuando no hay posts -->
					<?php for ($i = 1; $i <= 4; $i++): ?>
					<article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
						<div class="h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
							<span class="text-gray-400 dark:text-gray-500 material-icons text-4xl">article</span>
						</div>
						<div class="p-6">
							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">Comunicado Importante <?php echo $i; ?></h3>
							<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
								<span class="material-icons text-xs mr-1">event</span>
								<time><?php echo date('j M Y'); ?></time>
							</div>
							<p class="text-text-light dark:text-text-dark text-sm">Información relevante sobre actividades y anuncios de la institución educativa.</p>
							<a href="#" class="inline-block mt-4 text-primary hover:text-primary/80 font-semibold text-sm transition-colors">Leer más →</a>
						</div>
					</article>
					<?php endfor; ?>
					<?php endif; ?>
				</div>

				<div class="text-center">
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
						Ver todos los comunicados
						<span class="material-icons ml-2">arrow_forward</span>
					</a>
				</div>
			</div>
		</section>

		<!-- Sección de Sedes -->
		<section id="campuses" class="py-16 bg-gray-50 dark:bg-gray-900">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-12">
					<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">Nuestras Sedes</h2>
					<p class="text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto">Conoce nuestras instalaciones y ubicaciones estratégicas</p>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
					<!-- Sede Principal -->
					<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">
						<div class="h-48 bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center">
							<span class="text-white material-icons text-6xl">school</span>
						</div>
						<div class="p-6">
							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Principal</h3>
							<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
								<div class="flex items-start">
									<span class="material-icons text-primary text-base mr-2 mt-0.5">location_on</span>
									<span>Carrera 15 #445-67, Barrio Centro, Bogotá D.C.</span>
								</div>
								<div class="flex items-center">
									<span class="material-icons text-primary text-base mr-2">phone</span>
									<span>(601) 234-5678</span>
								</div>
								<div class="flex items-center">
									<span class="material-icons text-primary text-base mr-2">schedule</span>
									<span>7:00 AM - 4:00 PM</span>
								</div>
							</div>
							<a href="#" class="mt-4 inline-flex items-center text-primary hover:text-primary/80 font-semibold transition-colors">
								Ver más información
								<span class="material-icons ml-1 text-sm">chevron_right</span>
							</a>
						</div>
					</div>

					<!-- Sede Norte -->
					<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">
						<div class="h-48 bg-gradient-to-br from-accent to-orange-500 flex items-center justify-center">
							<span class="text-white material-icons text-6xl">location_city</span>
						</div>
						<div class="p-6">
							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Norte</h3>
							<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
								<div class="flex items-start">
									<span class="material-icons text-primary text-base mr-2 mt-0.5">location_on</span>
									<span>Calle 100 #45-20, Usaquén, Bogotá D.C.</span>
								</div>
								<div class="flex items-center">
									<span class="material-icons text-primary text-base mr-2">phone</span>
									<span>(601) 234-5679</span>
								</div>
								<div class="flex items-center">
									<span class="material-icons text-primary text-base mr-2">schedule</span>
									<span>7:00 AM - 4:00 PM</span>
								</div>
							</div>
							<a href="#" class="mt-4 inline-flex items-center text-primary hover:text-primary/80 font-semibold transition-colors">
								Ver más información
								<span class="material-icons ml-1 text-sm">chevron_right</span>
							</a>
						</div>
					</div>

					<!-- Sede Sur -->
					<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">
						<div class="h-48 bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center">
							<span class="text-white material-icons text-6xl">apartment</span>
						</div>
						<div class="p-6">
							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Sur</h3>
							<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
								<div class="flex items-start">
									<span class="material-icons text-primary text-base mr-2 mt-0.5">location_on</span>
									<span>Diagonal 45 Sur #25-80, Rafael Uribe, Bogotá D.C.</span>
								</div>
								<div class="flex items-center">
									<span class="material-icons text-primary text-base mr-2">phone</span>
									<span>(601) 234-5680</span>
								</div>
								<div class="flex items-center">
									<span class="material-icons text-primary text-base mr-2">schedule</span>
									<span>7:00 AM - 4:00 PM</span>
								</div>
							</div>
							<a href="#" class="mt-4 inline-flex items-center text-primary hover:text-primary/80 font-semibold transition-colors">
								Ver más información
								<span class="material-icons ml-1 text-sm">chevron_right</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Sección Institucional -->
		<section id="about" class="py-16 bg-background-light dark:bg-background-dark">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-12">
					<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">Nuestra Institución</h2>
					<p class="text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto">Comprometidos con la excelencia educativa y la formación integral</p>
				</div>

				<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
					<div>
						<h3 class="text-2xl font-bold text-text-light dark:text-text-dark mb-6 font-display">Nuestra Historia</h3>
						<p class="text-text-light dark:text-text-dark mb-4 leading-relaxed">
							Fundada en 1985, nuestra institución ha sido pionera en la educación de calidad, formando generaciones de profesionales y ciudadanos comprometidos con el desarrollo del país.
						</p>
						<p class="text-text-light dark:text-text-dark leading-relaxed">
							A lo largo de más de tres décadas, hemos mantenido nuestro compromiso con la excelencia académica, la innovación educativa y la formación en valores.
						</p>
					</div>
					<div class="bg-gray-200 dark:bg-gray-700 h-80 rounded-lg flex items-center justify-center">
						<span class="text-gray-400 dark:text-gray-500 material-icons text-6xl">history_edu</span>
					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
					<!-- Misión -->
					<div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
						<div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
							<span class="material-icons text-white">flag</span>
						</div>
						<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-4">Misión</h3>
						<p class="text-text-light dark:text-text-dark text-sm leading-relaxed">
							Formar ciudadanos íntegros y competentes mediante una educación de calidad que promueva el desarrollo intelectual, ético y social, contribuyendo al progreso de la sociedad.
						</p>
					</div>

					<!-- Visión -->
					<div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
						<div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
							<span class="material-icons text-white">visibility</span>
						</div>
						<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-4">Visión</h3>
						<p class="text-text-light dark:text-text-dark text-sm leading-relaxed">
							Ser reconocidos como la institución educativa líder en innovación pedagógica y formación integral, siendo referente de excelencia académica a nivel nacional.
						</p>
					</div>

					<!-- Valores -->
					<div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
						<div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
							<span class="material-icons text-white">favorite</span>
						</div>
						<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-4">Valores</h3>
						<ul class="text-text-light dark:text-text-dark text-sm space-y-2 text-left">
							<li class="flex items-center">
								<span class="material-icons text-primary text-sm mr-2">check_circle</span>
								Respeto y tolerancia
							</li>
							<li class="flex items-center">
								<span class="material-icons text-primary text-sm mr-2">check_circle</span>
								Responsabilidad
							</li>
							<li class="flex items-center">
								<span class="material-icons text-primary text-sm mr-2">check_circle</span>
								Honestidad
							</li>
							<li class="flex items-center">
								<span class="material-icons text-primary text-sm mr-2">check_circle</span>
								Excelencia
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- Formulario de Contacto -->
		<section id="contact" class="py-16 bg-gray-50 dark:bg-gray-900">
			<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-12">
					<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">Contáctanos</h2>
					<p class="text-lg text-text-light dark:text-text-dark">Estamos aquí para responder tus preguntas y escuchar tus sugerencias</p>
				</div>

				<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 border border-border-light dark:border-border-dark">
					<form class="space-y-6" id="contact-form">
						<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
							<div>
								<label for="name" class="block text-sm font-medium text-text-light dark:text-text-dark mb-2">Nombre completo *</label>
								<input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
							</div>
							<div>
								<label for="email" class="block text-sm font-medium text-text-light dark:text-text-dark mb-2">Correo electrónico *</label>
								<input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
							</div>
						</div>
						
						<div>
							<label for="subject" class="block text-sm font-medium text-text-light dark:text-text-dark mb-2">Asunto *</label>
							<input type="text" id="subject" name="subject" required class="w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
						</div>
						
						<div>
							<label for="message" class="block text-sm font-medium text-text-light dark:text-text-dark mb-2">Mensaje *</label>
							<textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 border border-border-light dark:border-border-dark rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark"></textarea>
						</div>
						
						<div>
							<button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white py-3 px-6 rounded-lg font-semibold transition-colors flex items-center justify-center">
								<span class="material-icons mr-2">send</span>
								Enviar mensaje
							</button>
						</div>
					</form>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();