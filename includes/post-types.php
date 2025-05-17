<?php 

// Register Custom Post Type: Testimonial
function register_testimonial_post_type() {
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'portafolio' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'portafolio' ),
        'menu_name'             => __( 'Testimonials', 'portafolio' ),
        'name_admin_bar'        => __( 'Testimonial', 'portafolio' ),
        'add_new'               => __( 'Add New', 'portafolio' ),
        'add_new_item'          => __( 'Add New Testimonial', 'portafolio' ),
        'new_item'              => __( 'New Testimonial', 'portafolio' ),
        'edit_item'             => __( 'Edit Testimonial', 'portafolio' ),
        'update_item'           => __( 'Update Testimonial', 'portafolio' ),
        'view_item'             => __( 'View Testimonial', 'portafolio' ),
        'all_items'             => __( 'All Testimonials', 'portafolio' ),
        'search_items'          => __( 'Search Testimonials', 'portafolio' ),
        'not_found'             => __( 'No testimonials found.', 'portafolio' ),
        'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'portafolio' ),
    );

    $args = array(
        'label'                 => __( 'Testimonial', 'portafolio' ),
        'description'           => __( 'Testimonials from clients or customers', 'portafolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-format-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'hierarchical'          => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'register_testimonial_post_type', 0 );


// Add Meta Box for Position
function testimonial_position_meta_box() {
    add_meta_box(
        'testimonial_position',
        __( 'Author Position', 'portafolio' ),
        'testimonial_position_meta_box_callback',
        'testimonial',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'testimonial_position_meta_box' );

function testimonial_position_meta_box_callback( $post ) {
    wp_nonce_field( 'testimonial_position_nonce', 'testimonial_position_nonce' );
    $position = get_post_meta( $post->ID, '_testimonial_position', true );
    ?>
    <label for="testimonial_position"><?php _e( 'Position/Title', 'portafolio' ); ?></label>
    <input type="text" id="testimonial_position" name="testimonial_position" value="<?php echo esc_attr( $position ); ?>" style="width: 100%;" />
    <?php
}

function save_testimonial_position( $post_id ) {
    if ( ! isset( $_POST['testimonial_position_nonce'] ) || ! wp_verify_nonce( $_POST['testimonial_position_nonce'], 'testimonial_position_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['testimonial_position'] ) ) {
        update_post_meta( $post_id, '_testimonial_position', sanitize_text_field( $_POST['testimonial_position'] ) );
    }
}
add_action( 'save_post', 'save_testimonial_position' );




// Register Custom Post Type: Education
function register_education_post_type() {
    $labels = array(
        'name'                  => _x( 'Education', 'Post Type General Name', 'portafolio' ),
        'singular_name'         => _x( 'Education', 'Post Type Singular Name', 'portafolio' ),
        'menu_name'             => __( 'Education', 'portafolio' ),
        'name_admin_bar'        => __( 'Education', 'portafolio' ),
        'add_new'               => __( 'Add New', 'portafolio' ),
        'add_new_item'          => __( 'Add New Education', 'portafolio' ),
        'edit_item'             => __( 'Edit Education', 'portafolio' ),
        'new_item'              => __( 'New Education', 'portafolio' ),
        'view_item'             => __( 'View Education', 'portafolio' ),
        'all_items'             => __( 'All Education', 'portafolio' ),
        'search_items'          => __( 'Search Education', 'portafolio' ),
        'not_found'             => __( 'No education found.', 'portafolio' ),
        'not_found_in_trash'    => __( 'No education found in Trash.', 'portafolio' ),
    );

    $args = array(
        'label'                 => __( 'Education', 'portafolio' ),
        'description'           => __( 'Educational background entries', 'portafolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'has_archive'           => false,
        'capability_type'       => 'post',
    );

    register_post_type( 'education', $args );
}
add_action( 'init', 'register_education_post_type', 0 );

// Register Custom Post Type: Experience
function register_experience_post_type() {
    $labels = array(
        'name'                  => _x( 'Experience', 'Post Type General Name', 'portafolio' ),
        'singular_name'         => _x( 'Experience', 'Post Type Singular Name', 'portafolio' ),
        'menu_name'             => __( 'Experience', 'portafolio' ),
        'name_admin_bar'        => __( 'Experience', 'portafolio' ),
        'add_new'               => __( 'Add New', 'portafolio' ),
        'add_new_item'          => __( 'Add New Experience', 'portafolio' ),
        'edit_item'             => __( 'Edit Experience', 'portafolio' ),
        'new_item'              => __( 'New Experience', 'portafolio' ),
        'view_item'             => __( 'View Experience', 'portafolio' ),
        'all_items'             => __( 'All Experience', 'portafolio' ),
        'search_items'          => __( 'Search Experience', 'portafolio' ),
        'not_found'             => __( 'No experience found.', 'portafolio' ),
        'not_found_in_trash'    => __( 'No experience found in Trash.', 'portafolio' ),
    );

    $args = array(
        'label'                 => __( 'Experience', 'portafolio' ),
        'description'           => __( 'Professional experience entries', 'portafolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 22,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'has_archive'           => false,
        'capability_type'       => 'post',
    );

    register_post_type( 'experience', $args );
}
add_action( 'init', 'register_experience_post_type', 0 );


// Add meta boxes for Education and Experience post types
function add_custom_meta_boxes() {
    add_meta_box(
        'edu_exp_meta_box',           // ID
        'Details (Year & Institution)', // Title
        'render_edu_exp_meta_box',    // Callback
        array( 'education', 'experience' ), // Post types
        'normal',                     // Context
        'default'                     // Priority
    );
}
add_action( 'add_meta_boxes', 'add_custom_meta_boxes' );

// Render the fields
function render_edu_exp_meta_box( $post ) {
    // Retrieve existing values
    $year = get_post_meta( $post->ID, '_edu_exp_year', true );
    $institution = get_post_meta( $post->ID, '_edu_exp_institution', true );

    // Output nonce for security
    wp_nonce_field( 'save_edu_exp_meta', 'edu_exp_meta_nonce' );

    echo '<p><label><strong>Year (e.g., 2018–2020):</strong></label><br />';
    echo '<input type="text" name="edu_exp_year" value="' . esc_attr( $year ) . '" style="width:100%;" /></p>';

    echo '<p><label><strong>Institution:</strong></label><br />';
    echo '<input type="text" name="edu_exp_institution" value="' . esc_attr( $institution ) . '" style="width:100%;" /></p>';
}

// Save the field values
function save_edu_exp_meta( $post_id ) {
    // Check nonce
    if ( ! isset( $_POST['edu_exp_meta_nonce'] ) || ! wp_verify_nonce( $_POST['edu_exp_meta_nonce'], 'save_edu_exp_meta' ) ) {
        return;
    }

    // Avoid autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Check user permissions
    if ( isset( $_POST['post_type'] ) && in_array( $_POST['post_type'], array( 'education', 'experience' ) ) ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    }

    // Save fields
    if ( isset( $_POST['edu_exp_year'] ) ) {
        update_post_meta( $post_id, '_edu_exp_year', sanitize_text_field( $_POST['edu_exp_year'] ) );
    }

    if ( isset( $_POST['edu_exp_institution'] ) ) {
        update_post_meta( $post_id, '_edu_exp_institution', sanitize_text_field( $_POST['edu_exp_institution'] ) );
    }
}
add_action( 'save_post', 'save_edu_exp_meta' );





//option to hide date/labels
function custom_post_display_meta_box() {
    add_meta_box(
        'custom_display_options',
        'Post Display Options',
        'custom_display_options_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'custom_post_display_meta_box');

function custom_display_options_callback($post) {
    // Use nonce for security
    wp_nonce_field('custom_display_options_nonce', 'custom_display_options_nonce_field');

    $show_date = get_post_meta($post->ID, '_show_date', true);
    $show_categories = get_post_meta($post->ID, '_show_categories', true);

    // Default to '1' (checked) if meta is not set
    $show_date = $show_date === '' ? '1' : $show_date;
    $show_categories = $show_categories === '' ? '1' : $show_categories;
    ?>
    <p>
        <label><input type="checkbox" name="custom_show_date" value="1" <?php checked($show_date, '1'); ?> /> Show Date</label>
    </p>
    <p>
        <label><input type="checkbox" name="custom_show_categories" value="1" <?php checked($show_categories, '1'); ?> /> Show Categories</label>
    </p>
    <?php
}


function save_custom_display_options($post_id) {
    if (!isset($_POST['custom_display_options_nonce_field']) || 
        !wp_verify_nonce($_POST['custom_display_options_nonce_field'], 'custom_display_options_nonce')) {
        return;
    }

    update_post_meta($post_id, '_show_date', isset($_POST['custom_show_date']) ? '1' : '0');
    update_post_meta($post_id, '_show_categories', isset($_POST['custom_show_categories']) ? '1' : '0');
}
add_action('save_post', 'save_custom_display_options');









function register_contact_message_cpt() {
    $labels = array(
        'name'                  => _x('Messages', 'Post Type General Name', 'portafolio'),
        'singular_name'         => _x('Message', 'Post Type Singular Name', 'portafolio'),
        'menu_name'             => __('Contact Messages', 'portafolio'),
        'name_admin_bar'        => __('Contact Message', 'portafolio'),
        'archives'              => __('Message Archives', 'portafolio'),
        'attributes'            => __('Message Attributes', 'portafolio'),
        'parent_item_colon'     => __('Parent Message:', 'portafolio'),
        'all_items'             => __('All Messages', 'portafolio'),
        'add_new_item'          => __('Add New Message', 'portafolio'),
        'add_new'               => __('Add New', 'portafolio'),
        'new_item'              => __('New Message', 'portafolio'),
        'edit_item'             => __('Edit Message', 'portafolio'),
        'update_item'           => __('Update Message', 'portafolio'),
        'view_item'             => __('View Message', 'portafolio'),
        'search_items'          => __('Search Messages', 'portafolio'),
        'not_found'             => __('No messages found.', 'portafolio'),
        'not_found_in_trash'    => __('No messages found in Trash.', 'portafolio'),
        'featured_image'        => __('Featured Image', 'portafolio'),
        'set_featured_image'    => __('Set featured image', 'portafolio'),
        'remove_featured_image' => __('Remove featured image', 'portafolio'),
        'use_featured_image'    => __('Use as featured image', 'portafolio'),
        'insert_into_item'      => __('Insert into message', 'portafolio'),
        'uploaded_to_this_item' => __('Uploaded to this message', 'portafolio'),
        'items_list'            => __('Messages list', 'portafolio'),
        'items_list_navigation' => __('Messages list navigation', 'portafolio'),
        'filter_items_list'     => __('Filter messages list', 'portafolio'),
    );

    $args = array(
        'label'                 => __('Contact Message', 'portafolio'),
        'description'           => __('Submitted contact forms', 'portafolio'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'), // title = subject, editor = message
        'hierarchical'          => false,
        'public'                => false, // not public
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );

    register_post_type('contact_message', $args);
}
add_action('init', 'register_contact_message_cpt');
