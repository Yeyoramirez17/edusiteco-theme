import { __ } from '@wordpress/i18n';

// Block Editor components
import {
    MediaUpload,
    MediaUploadCheck,
    RichText,
    InspectorControls
} from "@wordpress/block-editor";

// UI Components
import {
    Button,
    TextControl,
    SelectControl,
    RangeControl,
    PanelBody,
    Textarea
} from "@wordpress/components";

export default function Edit({ attributes, setAttributes }) {
    // Destructure all block attributes - Order matters!
    const { items, sectionTitle, sectionDescription, columns, imageHeight, shadowDepth } = attributes;

    // Update a specific resource item in the array
    const updateItem = (index, key, value) => {
        const newItems = [...items];
        newItems[index][key] = value;
        setAttributes({ items: newItems });
    };

    // Remove a resource item from the block
    const deleteItem = (index) => {
        const newItems = items.filter((_, i) => i !== index);
        setAttributes({ items: newItems });
    };

    // Add new empty resource item to the array
    const addItem = () => {
        const newItem = {
            titulo: "",
            tipo: "",
            url: "",
            imagen: "",
            descripcion: "",  // Item description field
            isExternalUrl: true
        };
        setAttributes({ items: [...items, newItem] });
    };

    // Shadow depth options - Spanish labels
    const shadowOptions = [
        { label: __('Sin sombra (Plano)', 'edusiteco'), value: 0 },
        { label: __('Sombra ligera (2px)', 'edusiteco'), value: 1 },
        { label: __('Sombra media (8px)', 'edusiteco'), value: 2 },
        { label: __('Sombra fuerte (16px)', 'edusiteco'), value: 3 }
    ];

    return (
        <>
            {/* Inspector Controls Panel - Right sidebar configuration */}
            <InspectorControls>

                {/* ============================================
                    SECTION SETTINGS PANEL
                    ============================================ */}
                <PanelBody title={__('Configuración de la sección', 'edusiteco')} initialOpen={true}>

                    {/* Section Title Control */}
                    <TextControl
                        label={__('Título de la sección', 'edusiteco')}
                        value={sectionTitle}
                        onChange={(v) => setAttributes({ sectionTitle: v })}
                        help={__('Encabezado principal de la sección de recursos', 'edusiteco')}
                    />

                    {/* Section Description Control - BLOCK DESCRIPTION */}
                    <TextControl
                        label={__('Descripción de la sección', 'edusiteco')}
                        value={sectionDescription}
                        onChange={(v) => setAttributes({ sectionDescription: v })}
                        placeholder={__('Breve descripción de los recursos...', 'edusiteco')}
                        help={__('Texto que aparece bajo el título (opcional)', 'edusiteco')}
                    />

                    {/* Number of columns selector (1-4) */}
                    <RangeControl
                        label={__('Número de columnas', 'edusiteco')}
                        value={columns}
                        onChange={(v) => setAttributes({ columns: v })}
                        min={1}
                        max={4}
                        help={__('Móvil siempre muestra 1 columna. Esto controla tablet y escritorio.', 'edusiteco')}
                    />
                </PanelBody>

                {/* ============================================
                    CARD STYLING PANEL
                    ============================================ */}
                <PanelBody title={__('Estilo de las tarjetas', 'edusiteco')} initialOpen={false}>

                    {/* Image height control in pixels */}
                    <RangeControl
                        label={__('Alto de la imagen (píxeles)', 'edusiteco')}
                        value={imageHeight}
                        onChange={(v) => setAttributes({ imageHeight: v })}
                        min={128}
                        max={400}
                        step={16}
                        help={__('Alto de las imágenes de recursos. Rango: 128px a 400px', 'edusiteco')}
                    />

                    {/* Shadow depth selector */}
                    <SelectControl
                        label={__('Sombra de la tarjeta', 'edusiteco')}
                        value={shadowDepth}
                        options={shadowOptions}
                        onChange={(v) => setAttributes({ shadowDepth: v })}
                        help={__('Efecto de profundidad visual para las tarjetas', 'edusiteco')}
                    />
                </PanelBody>
            </InspectorControls>

            {/* ============================================
                MAIN EDITOR PREVIEW AREA
                ============================================ */}
            <div className="editor-psico-resources p-6 bg-gray-50 dark:bg-gray-800 rounded-lg">

                {/* Section Header with Title and Description Preview */}
                <div className="mb-8 border-b-2 border-gray-200 dark:border-gray-700 pb-4">
                    {/* Section Title */}
                    <RichText
                        tagName="h2"
                        value={sectionTitle}
                        onChange={(v) => setAttributes({ sectionTitle: v })}
                        className="text-2xl font-bold text-gray-900 dark:text-white"
                        placeholder={__('Ingresa el título de la sección...', 'edusiteco')}
                    />

                    {/* Section Description Preview */}
                    {sectionDescription && (
                        <p className="text-gray-600 dark:text-gray-300 text-sm mb-4 italic">
                            {sectionDescription}
                        </p>
                    )}

                    {/* Configuration Info */}
                    <p className="text-xs text-gray-500 dark:text-gray-400 mt-2 font-mono">
                        {__('Columnas:', 'edusiteco')} {columns} | {__('Alto:', 'edusiteco')} {imageHeight}px | {__('Sombra:', 'edusiteco')} {shadowOptions[shadowDepth].label}
                    </p>
                </div>

                {/* ============================================
                    RESOURCES GRID PREVIEW
                    ============================================ */}
                <div className={`grid gap-6 mb-8`} style={{ gridTemplateColumns: `repeat(${Math.min(columns, 3)}, 1fr)` }}>
                    {items.map((item, i) => (
                        <div
                            key={i}
                            className="bg-white dark:bg-gray-700 rounded-lg p-4 transition-all duration-300 border border-gray-200 dark:border-gray-600"
                        >
                            {/* Image Preview Section */}
                            <div className="mb-4 border-2 border-dashed border-gray-300 dark:border-gray-500 rounded-lg p-3 bg-gray-50 dark:bg-gray-600">
                                {item.imagen ? (
                                    <div className="relative">
                                        <img
                                            src={item.imagen}
                                            alt={item.titulo}
                                            style={{ height: `${imageHeight}px` }}
                                            className="w-full object-cover rounded mb-2"
                                        />
                                        <p className="text-xs text-gray-600 dark:text-gray-300 text-center">
                                            {__('Vista previa (', 'edusiteco')}{imageHeight}{__('px)', 'edusiteco')}
                                        </p>
                                    </div>
                                ) : (
                                    <p className="text-sm text-gray-500 dark:text-gray-400 text-center py-6">
                                        📷 {__('Sin imagen seleccionada', 'edusiteco')}
                                    </p>
                                )}
                            </div>

                            {/* Image Upload Button - FIRST CONTROL */}
                            <MediaUploadCheck>
                                <MediaUpload
                                    onSelect={(media) => updateItem(i, "imagen", media.url)}
                                    allowedTypes={["image"]}
                                    render={({ open }) => (
                                        <Button
                                            onClick={open}
                                            variant="secondary"
                                            className="w-full mb-4"
                                        >
                                            📸 {item.imagen ? __('Cambiar imagen', 'edusiteco') : __('Subir imagen', 'edusiteco')}
                                        </Button>
                                    )}
                                />
                            </MediaUploadCheck>

                            {/* Title Input */}
                            <TextControl
                                label={__('Título del recurso', 'edusiteco')}
                                value={item.titulo}
                                onChange={(v) => updateItem(i, "titulo", v)}
                                placeholder={__('Ej: Guía de manejo del estrés', 'edusiteco')}
                                className="mb-3"
                            />

                            {/* Description Input - ITEM DESCRIPTION */}
                            <TextControl
                                label={__('Descripción del recurso', 'edusiteco')}
                                value={item.descripcion}
                                onChange={(v) => updateItem(i, "descripcion", v)}
                                placeholder={__('Breve descripción del recurso...', 'edusiteco')}
                                help={__('Máximo 120 caracteres', 'edusiteco')}
                                className="mb-3"
                            />

                            {/* Resource Type Selector */}
                            <SelectControl
                                label={__('Tipo de recurso', 'edusiteco')}
                                value={item.tipo}
                                options={[
                                    { label: __('Seleccionar tipo', 'edusiteco'), value: "" },
                                    { label: "📄 PDF", value: "PDF" },
                                    { label: "🎥 Video", value: "Video" },
                                    { label: "📊 Infografía", value: "Infographic" },
                                    { label: "📖 Guía", value: "Guide" },
                                    { label: "🌐 Recurso Web", value: "Web Resource" },
                                ]}
                                onChange={(v) => updateItem(i, "tipo", v)}
                                className="mb-3"
                            />

                            {/* URL Input for External Links */}
                            <TextControl
                                label={__('URL externa (Enlace)', 'edusiteco')}
                                value={item.url}
                                onChange={(v) => updateItem(i, "url", v)}
                                placeholder="https://ejemplo.com/recurso"
                                help={__('URL a un recurso externo o enlace', 'edusiteco')}
                                className="mb-3"
                            />

                            {/* File Upload for Internal Files (PDF, Documents) */}
                            <MediaUploadCheck>
                                <MediaUpload
                                    onSelect={(media) => updateItem(i, "url", media.url)}
                                    allowedTypes={["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"]}
                                    render={({ open }) => (
                                        <Button
                                            onClick={open}
                                            variant="tertiary"
                                            className="w-full mb-4"
                                        >
                                            📁 {item.url && item.url.includes('wp-content') ? __('Cambiar archivo', 'edusiteco') : __('Subir archivo (PDF/DOC)', 'edusiteco')}
                                        </Button>
                                    )}
                                />
                            </MediaUploadCheck>

                            {/* Delete Button */}
                            <Button
                                onClick={() => deleteItem(i)}
                                variant="tertiary"
                                isDestructive
                                className="w-full"
                            >
                                🗑️ {__('Eliminar recurso', 'edusiteco')}
                            </Button>
                        </div>
                    ))}
                </div>

                {/* Add New Resource Button */}
                <Button
                    onClick={addItem}
                    variant="primary"
                    className="w-full bg-brand-primary hover:bg-brand-secondary text-white"
                >
                    ➕ {__('Agregar nuevo recurso', 'edusiteco')}
                </Button>
            </div>
        </>
    );
}