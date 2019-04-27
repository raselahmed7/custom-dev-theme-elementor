<?php 

if( class_exists( 'CSF' ) ) {
    $theme_options_prefix = 'ppm_theme_options';

    CSF::createOptions( $theme_options_prefix, array(
        'menu_title' => 'Theme Options',
        'framework_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
    ) );

    CSF::createSection( $theme_options_prefix, array(
        'title'  => 'General',
        'fields' => array(

            array(
                'id'              => 'socials',
                'type'            => 'group',
                'title'           => 'Social Links',
                'button_title'    => 'Add New Link',
                'accordion_title' => 'Add New',
                'fields'          => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Select icon',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                        'desc'  => esc_html__('Type social link', 'ppm-quickstart'),
                    ),
                ),
            ),

            array(
                'id'    => 'phone',
                'type'  => 'text',
                'title' => 'Phone number',
            ),

        )
    ) );

    CSF::createSection( $theme_options_prefix, array(
        'title'  => 'Backup',
        'fields' => array(
            array(
                'id'    => 'backup',
                'type'  => 'backup',
                'title' => 'Backup',
            ),
        )
    ) );


    // Metaboxes

    // Page metabox
    $post_metabox_prefix = 'ppm_page_meta';
    CSF::createMetabox( $post_metabox_prefix, array(
        'title'     => 'Page Options',
        'post_type' => 'page',
        'data_type' => 'serialize', 
    ) );

    CSF::createSection( $post_metabox_prefix, array(
        'title'  => 'Options',
        'fields' => array(
            array(
                'id'    => 'enable_page_title',
                'type'  => 'switcher',
                'title' => 'Enable page title?',
                'default' => true,
            ),
            array(
                'id'    => 'default_padding',
                'type'  => 'switcher',
                'title' => 'Enable default padding?',
                'default' => true,
            ),
        )
    ) );

} else {
    function ppm_quickstart_codestar_install_notice() {
        ?>
        <div class="notice notice-warning">
            <p><strong><?php echo wp_get_theme(); ?></strong> required <strong>Codestar Framework</strong> plugin to be installed and activated on your site.</p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'ppm_quickstart_codestar_install_notice' );
}
