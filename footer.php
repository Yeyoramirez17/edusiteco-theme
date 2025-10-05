<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edusiteco
 */

?>

<footer id="colophon" class="edusiteco-footer flex flex-col">
	<div class="edusiteco-footer__content flex justify-center gap-0 px-[100px] my-12">
		<div class="edusiteco-footer__logos border-r-4 border-gray-200 px-6 w-1/3 grid grid-cols-2 grid-rows-2 gap-x-4 items-center justify-items-center py-4">
			<a class="col-span-2 flex justify-center items-center w-full" href="http://gov.co" target="_blank">
				<img 
					class="max-w-32 max-h-20 w-auto h-auto object-contain"
					src="<?php echo get_theme_file_uri("assets/img/Logo_Ministerio_de_Educación.png") ?>"
					alt="Logo Ministerio de Educación de Colombia" 
				/>
			</a>
			<a class="justify-self-end" href="http://gov.co" target="_blank">
				<img 
					class="max-w-16 max-h-12 w-auto h-auto object-contain"
					src="<?php echo get_theme_file_uri("assets/img/Logo_Colombia.png") ?>" 
					alt="Logo Colombia"
				/>
			</a>
			<?php
			if (has_custom_logo()):
				the_custom_logo();
			else:
				?>
				<a class="justify-self-start">
					<img 
						class="max-w-16 max-h-12 w-auto h-auto object-contain"
						src="<?= get_theme_file_uri("assets/img/logoipsum.png") ?>" 
						alt="<?= get_bloginfo('name') ?>" 
					/>
				</a>
				<?php
			endif;
			?>
		</div>
		<div class="edusiteco-footer__info px-6 w-1/3 border-r-4 border-gray-200">
			<h5 class="edusiteco-footer__title uppercase py-2"><?= bloginfo('name') ?></h5>
			
			<p class="edusiteco-footer__description">
				<?php echo get_bloginfo('description', 'display'); ?>
			</p>

			<p><span class="font-medium">Sede principal:</span> Colegio Antonio Nariño</p>
			<p><span class="font-medium">Dirección:</span> Carrera 12 #10-44, Popayán, Cauca</p>
			<p><span class="font-medium">Teléfono:</span> xx-xxxx-xxxx</p>
			<p><span class="font-medium">Horario de atención:</span> Lunes a Viernes de xx:xx AM a xx:xx AM</p>

				<div class="edusiteco-footer__social-links w-full flex justify-center gap-5 mt-4">
					<a href="#" target="_blank" class="group" aria-label="<?php esc_attr_e( 'Facebook', 'edusiteco' ); ?>">
						<img class="group-hover:scale-[1.2] transition-all w-8" src="<?php echo get_theme_file_uri("assets/svg/facebook.svg") ?>" alt="" />
					</a>
					<a href="#" target="_blank" class="group" aria-label="<?php esc_attr_e( 'Instagram', 'edusiteco' ); ?>">
						<img class="group-hover:scale-[1.2] transition-all w-8" src="<?php echo get_theme_file_uri("assets/svg/instagram.svg") ?>" alt="" />
					</a>
					<a href="#" target="_blank" class="group" aria-label="<?php esc_attr_e( 'YouTube', 'edusiteco' ); ?>">
						<img class="group-hover:scale-[1.2] transition-all w-8" src="<?php echo get_theme_file_uri("assets/svg/youtube.svg") ?>" alt="" />
					</a>
					<a href="#" target="_blank" class="group" aria-label="<?php esc_attr_e( 'X', 'edusiteco' ); ?>">
						<img class="group-hover:scale-[1.2] transition-all w-8" src="<?php echo get_theme_file_uri("assets/svg/twitter.svg") ?>" alt="X">
					</a>
				</div>

		</div>
		<!-- .site-info -->
		<div class="edusiteco-footer__links px-6 w-1/3">
			<h5 class="uppercase py-2">Enlaces de interés</h5>
			<ul class="">
				<li class=""><a class="text-gray-700 hover:underline text-lg" href="#">Transparencia y acceso a la información</a></li>
				<li class=""><a class="text-gray-700 hover:underline text-lg" href="#">Participa</a></li>
				<li class=""><a class="text-gray-700 hover:underline text-lg" href="#">Sobre la institución</a></li>
				<li class=""><a class="text-gray-700 hover:underline text-lg" href="#">Directorio</a></li>
				<li class=""><a class="text-gray-700 hover:underline text-lg" href="#">Sedes</a></li>
			</ul>
			<!-- .links -->
		</div>
	</div>
	<div class="w-full h-12 flex justify-between items-center px-[100px] py-2 bg-[#4488EE]">
		<a class="cursor-pointer" href="http://gov.co" target="_blank">
			<img class="h-6" src="<?php echo get_theme_file_uri("assets/img/govco.png") ?>" alt="<?php echo get_bloginfo('name') ?>">
		</a>
		<p class="text-center text-white">Edusite &copy; <?= date('Y') ?> Todos los derechos reservados.</p>
	</div>
</footer>
<!-- #colophon -->
</div>
<!-- #page -->
<?php wp_footer(); ?>
</body>

</html>