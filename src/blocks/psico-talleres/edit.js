import { TextControl, DateTimePicker, Button } from "@wordpress/components";
import { MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";

export default function Edit({ attributes, setAttributes }) {
    const { items } = attributes;

    const addItem = () => {
        const nuevo = { titulo: "", fecha: "", lugar: "", imagen: "" };
        setAttributes({ items: [...items, nuevo] });
    };

    const updateItem = (index, key, value) => {
        const newItems = [...items];
        newItems[index][key] = value;
        setAttributes({ items: newItems });
    };

    return (
        <div className="p-4 border bg-white rounded">
            <h3 className="text-xl font-semibold mb-4">Actividades / Talleres</h3>

            {items.map((item, i) => (
                <div key={i} className="border p-4 rounded mb-4 grid gap-3">
                    <TextControl
                        label="Título"
                        value={item.titulo}
                        onChange={(v) => updateItem(i, "titulo", v)}
                    />

                    <DateTimePicker
                        label="Fecha"
                        currentDate={item.fecha}
                        onChange={(v) => updateItem(i, "fecha", v)}
                    />

                    <TextControl
                        label="Lugar"
                        value={item.lugar}
                        onChange={(v) => updateItem(i, "lugar", v)}
                    />

                    <MediaUploadCheck>
                        <MediaUpload
                            onSelect={(media) => updateItem(i, "imagen", media.url)}
                            allowedTypes={["image"]}
                            render={({ open }) => (
                                <Button onClick={open} variant="secondary">
                                    {item.imagen ? "Cambiar imagen" : "Subir imagen"}
                                </Button>
                            )}
                        />
                    </MediaUploadCheck>

                    {item.imagen && (
                        <img src={item.imagen} className="w-32 rounded mt-2" />
                    )}
                </div>
            ))}

            <Button onClick={addItem} variant="primary">
                + Agregar Actividad
            </Button>
        </div>
    );
}
