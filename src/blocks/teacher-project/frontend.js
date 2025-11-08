import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', function () {

    const projectGalleries = document.querySelectorAll('.myswiper');

    console.log('Initializing Swiper for teacher project galleries:', projectGalleries);
    
    projectGalleries.forEach((galleryElement) => {
        // Para cada galería, inicializa un Swiper.
        new Swiper(galleryElement, {
            // Opciones de configuración.
            loop: true,
            autoplay:{
                delay: 5000,
                disableOnInteraction: false,
            },
            // Botones de navegación (específicos para esta instancia).
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Paginación (específica para esta instancia).
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
        });
    });
});