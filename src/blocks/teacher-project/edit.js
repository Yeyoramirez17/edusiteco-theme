/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
// import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { TextControl, TextareaControl, Button } from '@wordpress/components';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

export default function Edit({ attributes, setAttributes }) {
	const { title, authors, image, description, gallery, pdf } = attributes;
	const blockProps = useBlockProps({ className: 'p-4 border rounded-lg bg-white shadow-md' });

	return (
		<div {...blockProps}>
			<h3 className="text-xl font-bold mb-4">Proyecto del Profesor</h3>

			<TextControl
				label="Título del Proyecto"
				value={title}
				onChange={(val) => setAttributes({ title: val })}
			/>

			<TextControl
				label="Autor(es)"
				value={authors}
				onChange={(val) => setAttributes({ authors: val })}
			/>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ image: media })}
					allowedTypes={['image']}
					render={({ open }) => (
						<div className="my-4">
							<Button onClick={open} variant="secondary">
								{image ? 'Cambiar imagen principal' : 'Subir imagen principal'}
							</Button>
							{image && <img src={image.url} alt={image.alt} className="mt-2 w-48 rounded" />}
						</div>
					)}
				/>
			</MediaUploadCheck>

			<TextareaControl
				label="Descripción extensa"
				value={description}
				onChange={(val) => setAttributes({ description: val })}
			/>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ gallery: media })}
					allowedTypes={['image', 'video']}
					multiple
					gallery
					render={({ open }) => (
						<div className="my-4">
							<Button onClick={open} variant="secondary">
								{gallery?.length > 0 ? 'Editar galería' : 'Agregar galería'}
							</Button>
							{gallery?.length > 0 && (
								<div className="grid grid-cols-3 gap-2 mt-2">
									{gallery.map((item) => (
										<img key={item.id} src={item.url} alt={item.alt} className="rounded" />
									))}
								</div>
							)}
						</div>
					)}
				/>
			</MediaUploadCheck>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ pdf: media })}
					allowedTypes={['application/pdf']}
					render={({ open }) => (
						<div className="my-4">
							<Button onClick={open} variant="secondary">
								{pdf ? 'Cambiar documento PDF' : 'Subir documento PDF'}
							</Button>
							{pdf && <p className="mt-2 text-sm text-gray-600">{pdf.filename}</p>}
						</div>
					)}
				/>
			</MediaUploadCheck>
		</div>
	);
}

