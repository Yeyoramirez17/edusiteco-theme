<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<?php
$title = $attributes['title'] ?? '';
$authors = $attributes['authors'] ?? '';
$image = $attributes['image']['url'] ?? '';
$description = $attributes['description'] ?? '';
$gallery = $attributes['gallery'] ?? [];
$pdf = $attributes['pdf']['url'] ?? '';

?>
<div class="teacher-project border rounded-lg shadow-md p-6 my-4 bg-white">
	<h3 class="text-2xl font-bold mt-0 mb-2"><?php echo esc_html($title); ?></h3>

	<div class="w-full mb-4">
		<?php if ($image): ?>
			<img src="<?php echo esc_url($image); ?>" alt=""
				class="float-left w-full md:w-2/5 my-0 mr-0 md:mr-4 lg:my-0 mb-2 rounded-lg object-cover" />
		<?php endif; ?>

		<p class="text-base text-brand-secondary-800"><?php echo $description; ?></p>
	</div>

	<p class="italic text-base text-gray-600 mb-2">Por: <?php echo esc_html($authors); ?></p>


	<?php if (!empty($gallery)): ?>
		<div class="teacher-project-gallery">
			<!-- Slider main container -->
			<div class="swiper myswiper relative">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper ">
					<?php foreach ($gallery as $item): ?>
						<!-- Slides -->
						<div class="swiper-slide">
							<div class="bg-cover bg-center rounded h-48 md:h-64"
								style="background-image: url('<?php echo esc_url($item['url']); ?>');"></div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($pdf): ?>
		<a href="<?php echo esc_url($pdf); ?>"
			class="inline-block text-base bg-brand-primary text-text-dark px-4 py-2 rounded hover:bg-brand-primary-700"
			target="_blank">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				class="lucide lucide-file-text-icon lucide-file-text inline-flex">
				<path
					d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z" />
				<path d="M14 2v5a1 1 0 0 0 1 1h5" />
				<path d="M10 9H8" />
				<path d="M16 13H8" />
				<path d="M16 17H8" />
			</svg>
			Descargar PDF
		</a>
	<?php endif; ?>
</div>