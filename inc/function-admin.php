<?php

/*
	====================
		FEATURED POST META BOX
	====================
*/
	 /**
	  * Adds a box to the main column on the Post add/edit screens.
	  */
	 function madru_featured_add_meta_box() {
		add_meta_box(
			'madru_featured_meta',
			'Em Destaque',
			'madru_featured_meta_callback',
			'post',
			'normal',
			'low'
		); //you can change the 4th paramter i.e. post to custom post type name, if you want it for something else
	}
	add_action( 'add_meta_boxes', 'madru_featured_add_meta_box' ); // DESABILITADO ATÈ PROPER IMPLEMENTAÇÂO

	/**
	* Prints the box content.
	*
	* @param WP_Post $post The object for the current post/page.
	*/
	function madru_featured_meta_callback( $post ) {

	         // Add an nonce field so we can check for it later.
	         wp_nonce_field( 'madru_meta', 'madru_featured_meta_nonce' );

	         /*
	          * Use get_post_meta() to retrieve an existing value
	          * from the database and use the value for the form.
	          */
	         $value = get_post_meta( $post->ID, 'madru_featured', true ); //my_key is a meta_key. Change it to whatever you want
				if (empty($value)){
					$value = "none";
				}

	         ?>
				<div>
		 			<p class="howto">Apenas modifique caso haja a intenção de definir o destaque do post</p>
		 		      <div class="prfx-row-content">
		 				<label>
		 					<input type="radio" name="featured_radio" value="none" <?php checked( $value, 'none' ); ?> />
		 					Não destacado <i>(Padrão)</i>
		 				</label>
		 				<br />
		 				<label>
		 					<input type="radio" name="featured_radio" value="primary" <?php checked( $value, 'primary' ); ?> />
		 					Em Destaque Primário
		 				</label>
		 				<br />
		 				<label>
		 					<input type="radio" name="featured_radio" value="secondary" <?php checked( $value, 'secondary' ); ?> />
		 					Em Destaque Secundário
		 				</label>
		 			</div>
		 		</div>
	         <?php

	 }

	 /**
	  * When the post is saved, saves our custom data.
	  *
	  * @param int $post_id The ID of the post being saved.
	  */
	 function madru_featured_save_meta_data( $post_id ) {

	         /*
	          * We need to verify this came from our screen and with proper authorization,
	          * because the save_post action can be triggered at other times.
	          */

	         // Check if our nonce is set.
	         if ( !isset( $_POST['madru_featured_meta_nonce'] ) ) {
	                 return;
	         }

	         // Verify that the nonce is valid.
	         if ( !wp_verify_nonce( $_POST['madru_featured_meta_nonce'], 'madru_meta' ) ) {
	                 return;
	         }

	         // If this is an autosave, our form has not been submitted, so we don't want to do anything.
	         if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	                 return;
	         }

	         // Check the user's permissions.
	         if ( !current_user_can( 'edit_post', $post_id ) ) {
	                 return;
	         }


	         // Sanitize user input.
	         $new_meta_value = ( isset( $_POST['featured_radio'] ) ? sanitize_html_class( $_POST['featured_radio'] ) : '' );

	         // Update the meta field in the database.
	         update_post_meta( $post_id, 'madru_featured', $new_meta_value );

	 }

	 add_action( 'save_post', 'madru_featured_save_meta_data' );



 /*
 	====================
 		'FEATURED' COLUMN ON 'POSTS' PANEL

		https://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
		https://wordpress.stackexchange.com/questions/253640/adding-custom-columns-to-custom-post-types
 	====================
 */


	 // Add the custom columns

	 add_filter( 'manage_posts_columns', 'set_custom_edit_book_columns' );

	 function set_custom_edit_book_columns($columns) {
	     $columns['madru_featured'] = __( 'Em Destaque', 'your_text_domain' );

	     return $columns;
	 }

	 // Add the data to the custom columns

	 add_action( 'manage_posts_custom_column' , 'custom_book_column', 10, 2 );
	 function custom_book_column( $column, $post_id ) {
	     switch ( $column ) {
			  case 'madru_featured' :


					$value = get_post_meta( $post_id, 'madru_featured', true);

					if ( empty($value) ) {
						echo "Não";
					} else if ( $value == 'none' ) {
						echo "Não mais";
					} else if ( $value == 'primary' ) {
						echo '<b style="color: red">Primário</b>';
					} else if ( $value == 'secondary' ) {
						echo '<b style="color: orange">Secundário</b>';
					}


	     }
	 }






 /*
    =====================
       THEME DEPENDENCIES ALERT
       Alerta para dependências (plugins) do tema que não forem cumpridas

       PaulGwamanda - https://gist.github.com/PaulGwamanda/0310a88338e604dec0127435e272c72e
    =====================
 */

	 function madru_check_theme_dependencies() {
	     $missing = array();
	     $plugins = array(
	         'cmb2/init.php' => 'CMB2',
	     );
	     foreach($plugins as $plugin => $name) {
	         if(!is_plugin_active($plugin) )
	             $missing[$plugin] = $name;
	     }
	     return $missing;
	 }

	 /**
	  * Check for theme required plugins
	  *
	  */
	 function madru_theme_dependencies() {
	     $plugins = madru_check_theme_dependencies();
	     foreach($plugins as $plugin => $name) {
	         if(!is_plugin_active($plugin) )
	             echo '<div class="error"><p>' . sprintf(__( 'Aviso: O tema madru-nerd depende do plugin <b>%s</b>', 'madru-nerd'), $name ) . ' <a href="'.admin_url().'plugins.php">' . sprintf(__( 'View Plugins', 'madru-nerd'), $name ) . '</a></p></div>';
	     }
	 }
	 add_action( 'admin_notices', 'madru_theme_dependencies' );



/*
 =====================
    RESPONSIFY.JS FEATURED IMAGE DATA-FOCUS METABOX
	 *using CMB2
 =====================
*/

add_action( 'cmb2_admin_init', 'madru_register_featimage_data_focus' );

function madru_register_featimage_data_focus() {
	$prefix = '_madru_data_focus_';

	$featimage_data_focus = new_cmb2_box( array(
		'id'            => $prefix . 'featimage_data_focus',
		'title'         => 'Foco da imagem em destaque',
		'object_types'  => array( 'post' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'side',
		 'priority'   => 'low',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$featimage_data_focus->add_field( array(
		'name' => 'howto',
		'id'   => $prefix . 'note',
		'type' => 'text_small',
		'render_row_cb' => 'Utilize <a href="http://responsifyjs.space/app/">http://responsifyjs.space/app/</a> e insira as coordenadas abaixo',
	) );

	$featimage_data_focus->add_field( array(
		'name' => esc_html__( 'Left', 'cmb2' ),
		'id'   => $prefix . 'left',
		'type' => 'text_small',
		'default' => '1',
		//'render_row_cb' => 'yourprefix_render_row_cb',
	) );
	$featimage_data_focus->add_field( array(
		'name' => esc_html__( 'Top', 'cmb2' ),
		'id'   => $prefix . 'top',
		'type' => 'text_small',
		'default' => '1',
		//'render_row_cb' => 'yourprefix_render_row_cb',
	) );
	$featimage_data_focus->add_field( array(
		'name' => esc_html__( 'Right', 'cmb2' ),
		'id'   => $prefix . 'right',
		'type' => 'text_small',
		'default' => '1',
		//'render_row_cb' => 'yourprefix_render_row_cb',
	) );
	$featimage_data_focus->add_field( array(
		'name' => esc_html__( 'Bottom', 'cmb2' ),
		'id'   => $prefix . 'bottom',
		'type' => 'text_small',
		'default' => '1',
		//'render_row_cb' => 'yourprefix_render_row_cb',
	) );
}

function madru_data_focus( $post_id ) {
	$left = get_post_meta( $post_id, '_madru_data_focus_left', true);
	$top = get_post_meta( $post_id, '_madru_data_focus_top', true);
	$right = get_post_meta( $post_id, '_madru_data_focus_right', true);
	$bottom = get_post_meta( $post_id, '_madru_data_focus_bottom', true);

 	return array(
		'data-focus-left' 	=> $left,
		'data-focus-top' 		=> $top,
		'data-focus-right' 	=> $right,
		'data-focus-bottom' 	=> $bottom
	);
}
