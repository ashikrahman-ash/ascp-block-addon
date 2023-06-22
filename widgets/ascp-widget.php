<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ascp_Element_Widget extends \Elementor\Widget_Base {
    /**
	* Get widget name.
	* Retrieve oEmbed widget name.
	*/
	public function get_name() {
		return 'ascp';
	}

    /**
	* Get widget title.
	* Retrieve oEmbed widget title.
	*/
	public function get_title() {
		return esc_html__( 'ascp', 'ascp-block-widget' );
	}

	/**
	* Get widget icon.
	* Retrieve oEmbed widget icon.
	*/
	public function get_icon() {
		return 'eicon-kit-plugins';
	}

	/**
	* Get custom help URL.
	* Retrieve a URL where the user can get more information about the widget.
	*/
	public function get_custom_help_url() {
		return 'https://ascp.widget.com';
	}

	/**
	* Get widget categories.
	* Retrieve the list of categories the oEmbed widget belongs to.
	*/
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	* Get widget keywords.
	* Retrieve the list of keywords the oEmbed widget belongs to.
	*/
	public function get_keywords() {
		return [ 'ascp', 'text', 'tag' ];
	}


	/**
	* Get widget style & script dependency.
	* 
	*/
    public function get_script_depends() {
		return [ 'first-widget-script' ];
	}

	public function get_style_depends() {
		return [ 'first-widget-style' ];
	}


    /**
	* Register oEmbed widget controls.
	*
	*/
    protected function register_controls() {

		$this->start_controls_section(
			'ascp_section',
			[
				'label' => esc_html__( 'Ascp Content', 'ascp-block-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'ascp_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Ascp Title', 'ascp-block-widget' ),
				'placeholder' => esc_html__( 'Enter your title', 'ascp-block-widget' ),
                'default' => esc_html__( 'title', 'ascp-block-widget' )
			]
		);

        $this->add_control(
			'ascp_size',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'Ascp Size', 'ascp-block-widget' ),
				'placeholder' => '0',
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 50,
			]
		);

        $this->add_control(
			'open_lightbox',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Ascp Lightbox', 'ascp-block-widget' ),
				'options' => [
					'default' => esc_html__( 'Default', 'ascp-block-widget' ),
					'yes' => esc_html__( 'Yes', 'ascp-block-widget' ),
					'no' => esc_html__( 'No', 'ascp-block-widget' ),
				],
				'default' => 'no',
			]
		);

		$this->add_control(
			'ascp_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Ascp Alignment', 'ascp-block-widget' ),
                'default' => 'left',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ascp-block-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ascp-block-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ascp-block-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
			]
		);

        $this->end_controls_section();

        
		$this->start_controls_section(
			'ascp_accordion',
			[
				'label' => esc_html__( 'Ascp Accrodion', 'ascp-block-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'ascp-block-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'ascp-block-widget' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'ascp-block-widget' ),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'ascp-block-widget' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Content' , 'ascp-block-widget' ),
						'show_label' => false,
					],
					[
						'name' => 'list_color',
						'label' => esc_html__( 'Color', 'ascp-block-widget' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
						],
					]
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'ascp-block-widget' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'ascp-block-widget' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        $this->end_controls_section();





		// $this->end_controls_section();

	}



    /**
	* Render widget output on the frontend.
	*
	*/
	protected function render() {

        $settings = $this->get_settings_for_display();
        $title = $settings['ascp_title'];
        $alignment = $settings['ascp_alignment'];

        echo "<h2 class='ascp-heading-title' style='text-align:".esc_attr($alignment)."'>".esc_html($title)."</h2>";

    }

	protected function content_template() {}



}



