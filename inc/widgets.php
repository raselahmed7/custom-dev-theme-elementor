<?php 

function ppm_quickstart_widget_areas() {

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'PerfectPoingMarketing' ),
		'id' => 'right_sidebar',
		'before_widget' => '<div class="%2$s single-sidebar-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

}
add_action('widgets_init', 'ppm_quickstart_widget_areas');
