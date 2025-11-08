/**
 * Inicialización de Swiper para las galerías del bloque Teacher Project
 */

document.addEventListener('DOMContentLoaded', function () {
    // Verificar si Swiper está disponible
    if (typeof Swiper === 'undefined') {
        console.warn('Swiper no está cargado. Asegúrate de encolarlo en functions.php');
        return;
    }

    const swiperContainers = document.querySelectorAll('.teacher-project-gallery .myswiper');

    swiperContainers.forEach((container) => {
        new Swiper(container, {
			// Configuración básica
			loop: true,
			spaceBetween: 10,
			grabCursor: true,
			
			// Responsive breakpoints
			slidesPerView: 1,
			
			// Navegación
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
			// Paginación
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
				dynamicBullets: true,
			},
			
			// Scrollbar opcional
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			
			// Autoplay (opcional, descomentarlo si se desea)
			// autoplay: {
			// 	delay: 3000,
			// 	disableOnInteraction: false,
			// },
			
			// Keyboard
			keyboard: {
				enabled: true,
			},
			
			// Efecto
			effect: 'slide', // Opciones: 'slide', 'fade', 'cube', 'coverflow', 'flip'
			
			// Lazy loading
			lazy: {
				loadPrevNext: true,
			},
			
			// A11y
			a11y: {
				enabled: true,
			},
		});
    });
});