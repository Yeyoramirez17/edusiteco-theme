<?php
$items = $attributes['items'] ?? [];

if (empty($items)) return;

echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 py-8">';

foreach ($items as $item) {
    ?>
    <div class="bg-white shadow border rounded overflow-hidden">
        <?php if (!empty($item['imagen'])): ?>
            <img src="<?php echo esc_url($item['imagen']); ?>" class="w-full h-48 object-cover" />
        <?php endif; ?>

        <div class="p-4">
            <h3 class="text-xl font-bold"><?php echo esc_html($item['titulo']); ?></h3>

            <?php if (!empty($item['fecha'])): ?>
                <p class="text-gray-600 mt-1">📅 <?php echo esc_html($item['fecha']); ?></p>
            <?php endif; ?>

            <?php if (!empty($item['lugar'])): ?>
                <p class="text-gray-600">📍 <?php echo esc_html($item['lugar']); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

echo '</div>';
