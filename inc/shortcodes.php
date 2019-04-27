<?php 

function phone_btn_shortcode( $atts, $content = null  ) {
    $options = get_option('ppm_theme_options');
    $phone = $options['phone'];

    if(!empty($phone)) {
        $html = '<a href="tel:'.$phone.'" class="boxed-btn phone-btn">'.$phone.'</a>';
    } else {
        $html = '';
    }
 
    return $html;
}   
add_shortcode('phone_btn', 'phone_btn_shortcode');

function phone_text_btn_shortcode( $atts, $content = null  ) {
    $options = get_option('ppm_theme_options');
    $phone = $options['phone'];

    if(!empty($phone)) {
        $html = '<a href="tel:'.$phone.'" class="phone-text-btn">'.$phone.'</a>';
    } else {
        $html = '';
    }
 
    return $html;
}   
add_shortcode('phone_text_btn', 'phone_text_btn_shortcode');

function socials_shortcode( $atts, $content = null  ) {
 
    $options = get_option('ppm_theme_options');
    $socials_markup = $options['socials'];
    
    if(!empty($socials_markup)) {
        $social_icons_markup = '<div class="social-links">';
        
        foreach($socials_markup as $link) {
            $social_icons_markup .= '<a href="'.$link['link'].'" target="_blank"><i class="'.$link['icon'].'"></i></a>';
        }
        
        $social_icons_markup .= '</div>';
        
    } else {
        $social_icons_markup = '';
    }
    
    return $social_icons_markup;
}   
add_shortcode('socials', 'socials_shortcode');

function btn_shortcode( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(
        'link' => '',
        'text' => 'Read More',
        'target' => '_self'
    ), $atts ) );

    $html = '<a href="'.$link.'" target="'.$target.'" class="boxed-btn">'.$text.'</a>';
 
    return $html;
}   
add_shortcode('btn', 'btn_shortcode');