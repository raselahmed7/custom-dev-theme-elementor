<?php

class PPM_Button_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'oembed';
    }
    
	public function get_title() {
		return __( 'Button', 'ppm-quickstart' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {


        
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Configuration', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button text', 'ppm-quickstart' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Learn More'
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'ppm-quickstart' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url'
			]
		);

		$this->add_control(
			'target',
			[
				'label' => __( 'Open in new tab?', 'ppm-quickstart' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        if($settings['target'] == 'no') {
            $target= "_self";
        } else {
            $target= "_blank";
        }

		echo '<a class="boxed-btn" href="'.$settings['link'].'" target="'.$target.'">'.$settings['btn_text'].'</a>';

	}

}


class PPM_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'slider';
    }
    
	public function get_title() {
		return __( 'Slider', 'ppm-quickstart' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {


        
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Slides', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slide Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Slide Content' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_btn_text', [
				'label' => __( 'Button text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read More' , 'plugin-domain' ),
			]
		);

		$repeater->add_control(
			'slide_link', [
				'label' => __( 'Button link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'slide_bg', [
				'label' => __( 'Slide Background', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Slide Title', 'plugin-domain' ),
						'slide_btn_text' => __( 'Read More', 'plugin-domain' ),
					]
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        if(!empty($settings['slides'])) {
            $html = '';
            $random = rand(8977,897987);
            if(count($settings['slides']) > 1) {
                $html .= '<script>
                    jQuery(document).ready(function($) {
                        $("#slide-'.$random.'").slick({

                        });
                    });
                </script>';
            }
            $html .= '<div id="slide-'.$random.'" class="slides">';
                foreach($settings['slides'] as $slide) {
                    $html .= '<div style="background-image:url('.wp_get_attachment_image_url($slide['slide_bg']['id'], 'large').')" class="single-slide-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <div class="slide-text">
										<h2>'.$slide['title'].'</h2>
										'.wpautop(do_shortcode($slide['content'])).'
                                        <a href="'.$slide['slide_link'].'" class="boxed-btn">'.$slide['slide_btn_text'].'</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            $html .= '</div>';
        } else {
            $html = '<div class="alert alert-warning">Please add slides.</div>';
        }
        


        echo $html;

	}

}