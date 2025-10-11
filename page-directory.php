<?php
/**
 * Template Name: Directorio Institucional
 */
get_header();
?>

<main class="site-main">
    <!-- Hero Section -->
    <section class="hero-directorio">
        <div class="hero-pattern">
            <!-- Patrón decorativo SVG -->
            <svg viewBox="0 0 1000 500" fill="currentColor">
                <circle cx="200" cy="100" r="80" opacity="0.1" />
                <circle cx="800" cy="150" r="120" opacity="0.05" />
                <circle cx="400" cy="400" r="100" opacity="0.08" />
            </svg>
        </div>
        <div class="hero-content">
            <h1 class="hero-title">Directorio Institucional</h1>
            <p class="hero-subtitle">
                Conoce a las personas y áreas que hacen posible el funcionamiento de nuestra institución educativa.
            </p>
        </div>
    </section>

    <!-- Equipo Directivo -->
    <section class="section-container">
        <h2 class="section-title">Equipo Directivo</h2>
        <p class="section-subtitle">
            Liderazgo comprometido con la excelencia educativa y el bienestar de nuestra comunidad
        </p>

        <div class="directivo-grid">
            <!-- Tarjeta 1 -->
            <div class="directivo-card fade-in-up">
                <div class="directivo-card-inner">
                    <div class="directivo-image-container">
                        <div class="directivo-placeholder">
                            MR
                        </div>
                    </div>
                    <h3 class="directivo-name">María Rodríguez</h3>
                    <p class="directivo-cargo">Rectora</p>
                    <p class="directivo-desc">
                        Lidera la institución con visión estratégica y compromiso con la calidad educativa.
                    </p>
                    <div class="directivo-contactos">
                        <a href="mailto:m.rodriguez@colegio.edu.co" class="contacto-btn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </a>
                        <a href="tel:+573001234567" class="contacto-btn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Más tarjetas del equipo directivo -->
        </div>
    </section>

    <!-- Coordinaciones y Áreas -->
    <section class="coordinaciones-section">
        <div class="section-container">
            <h2 class="section-title">Coordinaciones y Áreas</h2>
            <p class="section-subtitle">
                Especialistas dedicados al desarrollo integral de nuestros estudiantes
            </p>

            <div class="coordinaciones-grid">
                <!-- Tarjeta de Coordinación -->
                <div class="coordinacion-card fade-in-up">
                    <div class="coordinacion-icon">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                    </div>
                    <h3 class="coordinacion-title">Coordinación Académica</h3>
                    <p class="coordinacion-responsable">Carlos Mendoza</p>
                    <a href="mailto:academico@colegio.edu.co" class="coordinacion-contacto">
                        academico@colegio.edu.co
                    </a>
                </div>

                <!-- Más tarjetas de coordinaciones -->
            </div>
        </div>
    </section>

    <!-- Contactos Generales -->
    <section class="contactos-section">
        <div class="section-container">
            <h2 class="section-title">Contactos Generales</h2>
            <p class="section-subtitle">
                Estamos aquí para atenderte y resolver tus inquietudes
            </p>

            <div class="contactos-grid">
                <!-- Contacto 1 -->
                <div class="contacto-item fade-in-up">
                    <div class="contacto-icon">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <h3 class="contacto-title">Correo Institucional</h3>
                    <p class="contacto-info">Para información general y consultas</p>
                    <a href="mailto:info@colegio.edu.co" class="contacto-link">
                        info@colegio.edu.co
                    </a>
                </div>

                <!-- Más contactos generales -->
            </div>

            <div class="text-center mt-12">
                <a href="/contacto" class="cta-button">
                    Contáctanos
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>