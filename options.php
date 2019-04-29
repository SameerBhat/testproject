<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate .
 *
 */

function optionsframework_options() {

	$options = array();
	$options[] = array(
		'name' => __( 'Basic Settings', 'iba' ),
		'type' => 'heading'
	);


	$options[] = array(
		'name' => __( 'Logo', 'iba' ),
		'desc' => __( 'Add Logo Here.', 'iba' ),
		'id' => 'logo_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Footer Logo', 'iba' ),
		'desc' => __( 'Add Footer Logo Here.', 'iba' ),
		'id' => 'logo_footer',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'CORPORATE OFFICE', 'iba' ),
		'desc' => __( 'CORPORATE OFFICE ADDRESS.', 'iba' ),
		'id' => 'office_textarea',
		'std' => 'Address',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Phone', 'iba' ),
		'desc' => __( 'Enter Phone No.', 'iba' ),
		'id' => 'phone',
		'std' => '+91124567890',
		'class' => 'mini',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fax', 'iba' ),
		'desc' => __( 'Enter Fax No.', 'iba' ),
		'id' => 'fax',
		'std' => '033-7894-5896',
		'class' => 'mini',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Email', 'iba' ),
		'desc' => __( 'Enter Email Id.', 'iba' ),
		'id' => 'email',
		'std' => 'info@theiba.net',
		'class' => 'mini',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Follow Us', 'iba' ),
		'desc' => __( 'Enter Description.', 'iba' ),
		'id' => 'follow_content',
		'std' => 'Add Content',
		'type' => 'textarea'
	);
	
	$options[] = array(
		'name' => __( 'RSS Link', 'iba' ),
		'desc' => __( 'Enter RSS Link.', 'iba' ),
		'id' => 'link',
		'std' => 'http://#',
		'class' => 'mini',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Image On Certificate', 'iba' ),
		'desc' => __( 'Add certificate Here.', 'iba' ),
		'id' => 'certificate_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Copy Right', 'iba' ),
		'desc' => __( 'Enter copyrighht.', 'iba' ),
		'id' => 'copyright_content',
		'std' => 'CopyRight @ 2018 ',
		'type' => 'textarea'
	);
	
	$options[] = array(
		'name' => __( 'Facebook Link', 'iba' ),
		'desc' => __( 'Enter Facebook Link.', 'iba' ),
		'id' => 'facebook',
		'std' => 'http://#',
		'class' => 'mini',
		'type' => 'text'
	);
		$options[] = array(
		'name' => __( 'Facebook Link', 'iba' ),
		'desc' => __( 'Enter twitter Link.', 'iba' ),
		'id' => 'twitter',
		'std' => 'http://#',
		'class' => 'mini',
		'type' => 'text'
	);
		$options[] = array(
		'name' => __( 'Google Plus Link', 'iba' ),
		'desc' => __( 'Enter Google Plus Link.', 'iba' ),
		'id' => 'google',
		'std' => 'http://#',
		'class' => 'mini',
		'type' => 'text'
	);
		$options[] = array(
		'name' => __( 'Linkdin Link', 'iba' ),
		'desc' => __( 'Enter Linkdin Link.', 'iba' ),
		'id' => 'linkdin',
		'std' => 'http://#',
		'class' => 'mini',
		'type' => 'text'
	);
	

	$options[] = array(
		'name' => __( 'Catalogue', 'iba' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __( 'IBA Interactive Catalogue', 'iba' ),
		'desc' => __( 'Enter IBA Interactive Catalogue content.', 'iba' ),
		'id' => 'catalogue_content',
		'std' => '',
		'type' => 'textarea'
	);
	
	$options[] = array(
		'name' => __( 'catelogue Image', 'iba' ),
		'desc' => __( 'Add catelogue Image.', 'iba' ),
		'id' => 'catelogue_image',
		'type' => 'upload'
	);
	
	$options[] = array(
		'name' => __( 'Catalogue Link', 'iba' ),
		'desc' => __( 'Enter Link.', 'iba' ),
		'id' => 'catelogue_link',
		'std' => 'http://#',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Celebrating Years', 'iba' ),
		'desc' => __( 'Enter Content.', 'iba' ),
		'id' => 'celebrating_content',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Celebrating Years Image', 'iba' ),
		'desc' => __( 'Enter Image.', 'iba' ),
		'id' => 'celebrating_image',
		'type' => 'upload'
	);
	

	$options[] = array(
		'name' => __( 'Other', 'iba' ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'iba' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'iba' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'iba_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'name' => __( 'Read more Link', 'iba' ),
		'desc' => __( 'Enter Link.', 'iba' ),
		'id' => 'read_more_link',
		'std' => 'http://#',
		'type' => 'text'
	);


	$options[] = array(
		'name' => __( 'Member', 'iba' ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'iba' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'iba' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'iba_member_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'name' => __( 'PDF File Link', 'iba' ),
		'desc' => __( 'Enter Link.', 'iba' ),
		'id' => 'member_pdf_link',
		'std' => 'http://#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Page Link', 'iba' ),
		'desc' => __( 'page Link.', 'iba' ),
		'id' => 'member_page_link',
		'std' => 'http://#',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Supplier', 'iba' ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'iba' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'iba' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'iba_supplier_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'name' => __( 'PDF File Link', 'iba' ),
		'desc' => __( 'Enter Link.', 'iba' ),
		'id' => 'supplier_pdf_link',
		'std' => 'http://#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Page Link', 'iba' ),
		'desc' => __( 'page Link.', 'iba' ),
		'id' => 'supplier_page_link',
		'std' => 'http://#',
		'type' => 'text'
	);

	return $options;
}