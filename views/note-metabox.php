<?php
defined( 'ABSPATH' ) || exit;

/**
 * @psalm-var array{ id: int, description: string } $params
 */

wp_nonce_field( 'note_meta_box', 'note_meta_box_nonce' );
?>
<p>
	<?php
	wp_editor(
		$params['description'],
		'note_description',
		[
			'media_buttons' => false,
			'textarea_rows' => 10,
			'teeny'         => true,
			'quicktags'     => true,
		]
	);
	?>
</p>
