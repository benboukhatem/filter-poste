<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor filter Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
 class Elementor_filter_Widget extends \Elementor\Widget_Base {
	 
	 /**
	 * Get widget name.
	 *
	 * Retrieve filter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tabposte';
	}
	
	/**
	 * Get widget title.
	 *
	 * Retrieve filter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'table filter', 'elementor-filter-poste' );
	}
	
	/**
	 * Get widget icon.
	 *
	 * Retrieve filter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-table';
	}
	
	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://mail.google.com/mail/u/0/?pli=1#inbox';
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the filter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'post', 'url', 'link' ];
	}
	
	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Poste table', 'elementor-filter-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'filer-name',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'name', 'elementor-filter-widget' ),
				'placeholder' => esc_html__( 'enter your name', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'filter-description',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Description', 'elementor-filter-widget' ),
				'placeholder' => esc_html__( 'enter your description', 'elementor-filter-widget' ),
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);

		// $this->add_control(
			// 'url',
			// [
				// 'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
				// 'type' => \Elementor\Controls_Manager::TEXT,
				// 'input_type' => 'url',
				// 'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			// ]
		// );
		
		

		$this->end_controls_section();
		
		$this->start_controls_section(
			'config_section',
			[
				'label' => esc_html__( 'Search', 'elementor-filter-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				
			]
		);
		
			$this->add_control(
			'label-search',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label search', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Chercher un poste', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'label-place',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label place', 'elementor-filter-widget' ),
				'default' => esc_html__( 'place', 'elementor-filter-widget' ),
			]
		);
		
		
		// $this->add_control(
			// 'select_poste_place',
			// [
				// 'type' => \Elementor\Controls_Manager::SELECT,
				// 'label' => esc_html__( 'Lightbox', 'elementor-filter-widget' ),
				// 'options' => [ ],
				// 'default' => 'no',
			// ]
		// );
		$this->add_control(
			'label-department',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label department', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Department', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'label-type-poste',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label type poste', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Type poste', 'elementor-filter-widget' ),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'table_section',
			[
				'label' => esc_html__( 'Label title', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'label-title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Label title', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Title', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'label-tbloc',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Label location', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Location', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'label-tbdep',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label department', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Department', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'label-tb-type-poste',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label type poste', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Type poste', 'elementor-filter-widget' ),
			]
		);
	
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'tab_silder',
			[
				'label' => esc_html__( 'slider form', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		
			$this->add_control(
				'show_slider',
				[
					'label' => esc_html__( 'Show Title', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'your-plugin' ),
					'label_off' => esc_html__( 'Hide', 'your-plugin' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
		
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'tabcolor_section',
			[
				'label' => esc_html__( 'tab color', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
			]
		);
		$argsoffre = array(
			  'post_type'   => 'proctor-postTab',
			  'numberposts' => -1, 
			  'orderby'=> 'menu_order', 
			  'order' => 'ASC'
			);
			
			$alloffres = get_posts( $argsoffre );
			$index=1;
			 foreach ( $alloffres as $key => $proj ) { 
					$this->add_control(
						'title_color'.$index,
						[
							'label' => esc_html__( 'panel color '.$index.'  ', 'elementor-filter-widget' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .title' => 'color: {{VALUE}}',
							],
						]
					);
					
					$this->add_control(
						'contenu_color'.$index,
						[
							'label' => esc_html__( 'contenu color '.$index.'  ', 'elementor-filter-widget' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .title' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'sous_contenu_color'.$index,
						[
							'label' => esc_html__( 'Sous contenu color '.$index.'  ', 'elementor-filter-widget' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .title' => 'color: {{VALUE}}',
							],
						]
					);
					
					$index++;
			 }
			 
			$this->add_control(
				'unity_widthcadretab',
				[
					'type' => \Elementor\Controls_Manager::SELECT,
					'label' => esc_html__( 'unity width', 'elementor-filter-widget' ),
					'options' => [
						'default' => esc_html__( 'px', 'elementor-filter-widget' ),
						'px' => esc_html__( 'px', 'elementor-filter-widget' ),
						'%' => esc_html__( '%', 'elementor-filter-widget' ),
						'rem' => esc_html__( 'rem', 'elementor-filter-widget' ),
					],
					'default' => 'px',
				]
			);
			$this->add_control(
				'control-widthcadretab',
				[
					'type' => \Elementor\Controls_Manager::NUMBER,
					'label' => esc_html__( 'width', 'elementor-filter-widget' ),
				]
			);
			$this->add_control(
				'control-paddingcadrex',
				[
					'type' => \Elementor\Controls_Manager::NUMBER,
					'label' => esc_html__( 'Padding X (px)', 'elementor-filter-widget' ),
				]
			);
			$this->add_control(
				'control-paddingcadrey',
				[
					'type' => \Elementor\Controls_Manager::NUMBER,
					'label' => esc_html__( 'Padding Y (px)', 'elementor-filter-widget' ),
				]
			);
		$this->end_controls_section();
		
		
		//Image before contenu text
		
	
       $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Typography + Color', 'elementor-filter-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'name color', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Titre' , 'elementor-filter-widget' ),
				'selector' => '{{WRAPPER}} .title',
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description color', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .desciption' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desciption_typography',
				'label' => esc_html__( 'Description' , 'elementor-filter-widget' ),
				'selector' => '{{WRAPPER}} .desciption',
			]
		);
		$this->add_control(
			'tablink_color',
			[
				'label' => esc_html__( 'tab color', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tablink' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tablink_typography',
				'label' => esc_html__( 'Tab panel' , 'elementor-filter-widget' ),
				'selector' => '{{WRAPPER}} .tablink',
			]
		);
		$this->add_control(
			'contenu-tab',
			[
				'label' => esc_html__( 'contenu tab color', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contenu-tab' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'contenu-tab_typography',
				'label' => esc_html__( 'Tab panel' , 'elementor-filter-widget' ),
				'selector' => '{{WRAPPER}} .contenu-tab',
			]
		);
		
		$this->end_controls_section();
		
		
        		$this->start_controls_section(
			'tabstyleimg_section1',
			[
				'label' => esc_html__( 'Image before contenu text', 'elementor-filter-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'image_background',
			[
				'label' => esc_html__( 'Choose under contenu Image background text', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA
				
			]
		);
		
		$this->add_control(
			'unity_top',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'unity top', 'elementor-filter-widget' ),
				'options' => [
					'default' => esc_html__( 'px', 'elementor-filter-widget' ),
					'px' => esc_html__( 'px', 'elementor-filter-widget' ),
					'%' => esc_html__( '%', 'elementor-filter-widget' ),
				],
				'default' => 'px',
			]
		);
		
		$this->add_control(
			'control-top-img',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'top', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'unity_right',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'unity right', 'elementor-filter-widget' ),
				'options' => [
					'default' => esc_html__( 'px', 'elementor-filter-widget' ),
					'px' => esc_html__( 'px', 'elementor-filter-widget' ),
					'%' => esc_html__( '%', 'elementor-filter-widget' ),
				],
				'default' => 'px',
			]
		);
		
		$this->add_control(
			'control-right-img',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'right', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'control-opacity-img',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'opacity', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'unity_width',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'unity width', 'elementor-filter-widget' ),
				'options' => [
					'default' => esc_html__( 'px', 'elementor-filter-widget' ),
					'px' => esc_html__( 'px', 'elementor-filter-widget' ),
					'%' => esc_html__( '%', 'elementor-filter-widget' ),
					'rem' => esc_html__( 'rem', 'elementor-filter-widget' ),
				],
				'default' => 'px',
			]
		);
		$this->add_control(
			'control-width-img',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'width(%)', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'unity_height',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'unity height', 'elementor-filter-widget' ),
				'options' => [
					'default' => esc_html__( 'px', 'elementor-filter-widget' ),
					'px' => esc_html__( 'px', 'elementor-filter-widget' ),
					'%' => esc_html__( '%', 'elementor-filter-widget' ),
					'rem' => esc_html__( 'rem', 'elementor-filter-widget' ),
				],
				'default' => 'px',
			]
		);
		$this->add_control(
			'control-height-img',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'height(%)', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'background_size',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'background-size', 'elementor-filter-widget' ),
				'options' => [
					'cover' => esc_html__( 'cover', 'elementor-filter-widget' ),
					'auto' => esc_html__( 'auto', 'elementor-filter-widget' ),
					'contain' => esc_html__( 'contain', 'elementor-filter-widget' ),
					'inherit' => esc_html__( 'inherit', 'elementor-filter-widget' ),
					'revert' => esc_html__( 'revert', 'elementor-filter-widget' ),
					'unset' => esc_html__( 'unset', 'elementor-filter-widget' ),
				],
				'default' => 'cover',
			]
		);
		$this->add_control(
			'background_repat',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'background-repeat', 'elementor-filter-widget' ),
				'options' => [
					'no-repeat' => esc_html__( 'no-repeat', 'elementor-filter-widget' ),
					'repeat' => esc_html__( 'repeat', 'elementor-filter-widget' ),
					'repeat-x' => esc_html__( 'repeat-x', 'elementor-filter-widget' ),
					'repeat-y' => esc_html__( 'repeat-y', 'elementor-filter-widget' ),
					'revert' => esc_html__( 'revert', 'elementor-filter-widget' ),
					'round' => esc_html__( 'round', 'elementor-filter-widget' ),
					'space' => esc_html__( 'space', 'elementor-filter-widget' )
				],
				'default' => 'no-repeat',
			]
		);
		
		
		
		$this->end_controls_section();
		
		//------------------------------------------------------------------------------------------
		//Image before all contenu
		$this->start_controls_section(
			'tabstyleimgallconenu_section',
			[
				'label' => esc_html__( 'Image before all contenu', 'elementor-filter-widget' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
			]
		);
		
		//---------------------------------------------------------------------------------------
		
				$this->add_control(
					'image_backgroundall',
					[
						'label' => esc_html__( 'Choose  contenu Image background text', 'elementor-filter-widget' ),
						'type' => \Elementor\Controls_Manager::MEDIA
						
					]
				);
				
				$this->add_control(
					'unity_topall',
					[
						'type' => \Elementor\Controls_Manager::SELECT,
						'label' => esc_html__( 'unity top', 'elementor-filter-widget' ),
						'options' => [
							'default' => esc_html__( 'px', 'elementor-filter-widget' ),
							'px' => esc_html__( 'px', 'elementor-filter-widget' ),
							'%' => esc_html__( '%', 'elementor-filter-widget' ),
						],
						'default' => 'px',
					]
				);
				
				$this->add_control(
					'control-top-all-img',
					[
						'type' => \Elementor\Controls_Manager::NUMBER,
						'label' => esc_html__( 'top', 'elementor-filter-widget' ),
					]
				);
				
				$this->add_control(
					'unity_rightall',
					[
						'type' => \Elementor\Controls_Manager::SELECT,
						'label' => esc_html__( 'unity right', 'elementor-filter-widget' ),
						'options' => [
							'default' => esc_html__( 'px', 'elementor-filter-widget' ),
							'px' => esc_html__( 'px', 'elementor-filter-widget' ),
							'%' => esc_html__( '%', 'elementor-filter-widget' ),
						],
						'default' => 'px',
					]
				);
				
				$this->add_control(
					'control-rightall-img',
					[
						'type' => \Elementor\Controls_Manager::NUMBER,
						'label' => esc_html__( 'right', 'elementor-filter-widget' ),
					]
				);
				
				$this->add_control(
					'control-opacityall-img',
					[
						'type' => \Elementor\Controls_Manager::NUMBER,
						'label' => esc_html__( 'opacity', 'elementor-filter-widget' ),
					]
				);
				$this->add_control(
					'unity_widthall',
					[
						'type' => \Elementor\Controls_Manager::SELECT,
						'label' => esc_html__( 'unity width', 'elementor-filter-widget' ),
						'options' => [
							'default' => esc_html__( 'px', 'elementor-filter-widget' ),
							'px' => esc_html__( 'px', 'elementor-filter-widget' ),
							'%' => esc_html__( '%', 'elementor-filter-widget' ),
							'rem' => esc_html__( 'rem', 'elementor-filter-widget' ),
						],
						'default' => 'px',
					]
				);
				$this->add_control(
					'control-widthall-img',
					[
						'type' => \Elementor\Controls_Manager::NUMBER,
						'label' => esc_html__( 'width(%)', 'elementor-filter-widget' ),
					]
				);
				$this->add_control(
					'unity_heightall',
					[
						'type' => \Elementor\Controls_Manager::SELECT,
						'label' => esc_html__( 'unity height', 'elementor-filter-widget' ),
						'options' => [
							'default' => esc_html__( 'px', 'elementor-filter-widget' ),
							'px' => esc_html__( 'px', 'elementor-filter-widget' ),
							'%' => esc_html__( '%', 'elementor-filter-widget' ),
							'rem' => esc_html__( 'rem', 'elementor-filter-widget' ),
						],
						'default' => 'px',
					]
				);
				$this->add_control(
					'control-heightall-img',
					[
						'type' => \Elementor\Controls_Manager::NUMBER,
						'label' => esc_html__( 'height(%)', 'elementor-filter-widget' ),
					]
				);
				
				$this->add_control(
					'background_sizeall',
					[
						'type' => \Elementor\Controls_Manager::SELECT,
						'label' => esc_html__( 'background-size', 'elementor-filter-widget' ),
						'options' => [
							'cover' => esc_html__( 'cover', 'elementor-filter-widget' ),
							'auto' => esc_html__( 'auto', 'elementor-filter-widget' ),
							'contain' => esc_html__( 'contain', 'elementor-filter-widget' ),
							'inherit' => esc_html__( 'inherit', 'elementor-filter-widget' ),
							'revert' => esc_html__( 'revert', 'elementor-filter-widget' ),
							'unset' => esc_html__( 'unset', 'elementor-filter-widget' ),
						],
						'default' => 'cover',
					]
				);
				$this->add_control(
					'background_repatall',
					[
						'type' => \Elementor\Controls_Manager::SELECT,
						'label' => esc_html__( 'background-repeat', 'elementor-filter-widget' ),
						'options' => [
							'no-repeat' => esc_html__( 'no-repeat', 'elementor-filter-widget' ),
							'repeat' => esc_html__( 'repeat', 'elementor-filter-widget' ),
							'repeat-x' => esc_html__( 'repeat-x', 'elementor-filter-widget' ),
							'repeat-y' => esc_html__( 'repeat-y', 'elementor-filter-widget' ),
							'revert' => esc_html__( 'revert', 'elementor-filter-widget' ),
							'round' => esc_html__( 'round', 'elementor-filter-widget' ),
							'space' => esc_html__( 'space', 'elementor-filter-widget' )
						],
						'default' => 'no-repeat',
					]
				);
		
		//---------------------------------------------------------------------------------------
		
		
		$this->end_controls_section();
		
		//Image before all contenu
		$this->start_controls_section(
			'tabanimation_section',
			[
				'label' => esc_html__( 'tab activé', 'elementor-filter-widget' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
			]
		);
		$this->add_control(
			'tab-bckcolor-active',
			[
				'label' => esc_html__( 'background-color', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .activetab' => 'background-color: {{VALUE}} !important;',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_control(
			'tab-color-active',
			[
				'label' => esc_html__( 'color', 'elementor-filter-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .activetab' => 'color: {{VALUE}} !important;',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);
		
		$this->add_control(
				'control-opacity',
				[
					'type' => \Elementor\Controls_Manager::NUMBER,
					'label' => esc_html__( 'opacity', 'elementor-filter-widget' ),
					'default' =>1,
				]
		);
		
		
		$this->end_controls_section();
		
		//hover
		
		$this->start_controls_section(
			'tabhover_section',
			[
				'label' => esc_html__( 'tab hover', 'elementor-filter-widget' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
			]
		);
		
		$this->add_control(
						'hover_color',
						[
							'label' => esc_html__( 'color ', 'elementor-filter-widget' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .hovercolor' => 'color: {{VALUE}}',
							],
						]
					);
		$this->add_control(
						'hover_bkgcolor',
						[
							'label' => esc_html__( 'color ', 'elementor-filter-widget' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .hoverbkgcolor' => 'background-color: {{VALUE}}',
							],
						]
					);	
        $this->add_control(
				'hover-opacity',
				[
					'type' => \Elementor\Controls_Manager::NUMBER,
					'label' => esc_html__( 'opacity', 'elementor-filter-widget' ),
					'default' =>1,
				]
		);	
		
		
		
		$this->end_controls_section();
	}
	
	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		//get element
		$titre= $settings["filer-name"];
		$description= $settings["filter-description"];
		
		//get search
		$label_search= $settings["label-search"];
        $place= $settings["label-place"];
		$department= $settings["label-department"];
		$type_poste= $settings["label-type-poste"];
		
		//get table
		$tbtitle= $settings["label-title"];
		$Location= $settings["label-tbloc"];
		$tbdepartment= $settings["label-tbdep"];
		$tb_type_poste= $settings["label-tb-type-poste"];
		
		//img all background
		
		$unity_topall= $settings["unity_topall"];
		$control_topall_img= $settings["control-top-all-img"];
		$topallimg=$control_topall_img."".$unity_topall;


		$unity_rightall= $settings["unity_rightall"];
		$control_rightall_img= $settings["control-rightall-img"];
		$rightallimg=$control_rightall_img."".$unity_rightall;

		
		$control_opacityall_img= $settings["control-opacityall-img"];
		$opacityallimg=$control_opacityall_img;

		$unity_widthall= $settings["unity_widthall"];
		$control_widthall_img= $settings["control-widthall-img"];
		$widthallimg=$control_widthall_img."".$unity_widthall;


		$unity_heightall= $settings["unity_heightall"];
		$control_heightall_img= $settings["control-heightall-img"];
		$heightallimg=$control_heightall_img."".$unity_heightall;
		
		//bckground sizeall
		$controd_bckg_sizeall= $settings["background_sizeall"];
		
		//bckground repall
		$controd_bckg_repall= $settings["background_repatall"];
		
		
		//-----------------------------------------------------------
		$unity_widthcadretab = $settings["unity_widthcadretab"];
		$control_widthcadretab = $settings["control-widthcadretab"];
		$widthcadretab=$control_widthcadretab."".$unity_widthcadretab;
		
		
		?>
		<style>
		.tabcontent:before {
				content: "";
				position: absolute;
				background-image: url(<?php echo $settings['image_backgroundall']['url']; ?>);
				width: <?php echo $widthallimg; ?>;
				height: <?php echo $heightallimg; ?>;
				background-repeat: <?php echo $controd_bckg_repall; ?>;
				background-size: <?php echo $controd_bckg_sizeall; ?>;
				opacity: <?php echo $opacityallimg; ?>;
				top: <?php echo $topallimg; ?>;
				right: <?php echo $rightallimg; ?>;
			}
		.tabcontent {
			position: relative;
		}
		</style>
		<?php
		
		//img background
		$unity_top= $settings["unity_top"];
		$control_top_img= $settings["control-top-img"];
		$topimg=$control_top_img."".$unity_top;


		$unity_right= $settings["unity_right"];
		$control_right_img= $settings["control-right-img"];
		$rightimg=$control_right_img."".$unity_right;

		
		$control_opacity_img= $settings["control-opacity-img"];
		$opacityimg=$control_opacity_img;

		$unity_width= $settings["unity_width"];
		$control_width_img= $settings["control-width-img"];
		$widthimg=$control_width_img."".$unity_width;


		$unity_height= $settings["unity_height"];
		$control_height_img= $settings["control-height-img"];
		$heightimg=$control_height_img."".$unity_height;
		
		//bckground size
		$controd_bckg_size= $settings["background_size"];
		
		//bckground rep
		$controd_bckg_rep= $settings["background_repat"];
		
		
		?>
		<style>
		.contenu-tab:before {
				content: "";
				position: absolute;
				background-image: url(<?php echo $settings['image_background']['url']; ?>);
				width: <?php echo $widthimg; ?>;
				height: <?php echo $heightimg; ?>;
				background-repeat: <?php echo $controd_bckg_rep; ?>;
				background-size: <?php echo $controd_bckg_size; ?>;
				opacity: <?php echo $opacityimg; ?>;
				top: <?php echo $topimg; ?>;
				right: <?php echo $rightimg; ?>;
			}
		.contenu-tab {
			position: relative;
		}
		.activetab{
			opacity: <?php echo $settings["control-opacity"]; ?>;
		}
		.tablink{
			transition: background-color 600ms linear; 
		}
		
		button.tablink:hover{
			background-color: <?php echo $settings["hover_bkgcolor"]; ?> !important;
			color: <?php echo $settings["hover_color"]; ?> !important;
			opacity: <?php echo $settings["hover-opacity"]; ?> !important;
		}
		</style>
		<?php
		
		
				
				// type post
				
				$typepost = array(
				  'post_type'   => 'proctor-postTab',
				  'numberposts' => -1, 
				  'orderby'=> 'menu_order', 
				  'order' => 'ASC'
				);
				
				$typepost = get_posts( $typepost );
				
				//les offres
				
				$argsoffre = array(
				  'post_type'   => 'proctor-postTab',
				  'numberposts' => -1, 
				  'orderby'=> 'menu_order', 
				  'order' => 'ASC'
				);
			
			    $alloffres = get_posts( $argsoffre );
			
			// echo "<pre>";
			// print_r($typepost);
			
			
				
		 
	
		
		 
		
		?>
		<style>
			.bk-pos {
				width: 100%;
				padding: 5px;
			}
			.avanced-serch {
				display: flex;
				width: 100%;
				margin-bottom: 20px;
			}
			.activeblock {
				display: block !important;
			}
		
			.block-id-cadre {
				
				
				padding: <?php echo $settings["control-paddingcadrex"]; ?>px <?php echo $settings["control-paddingcadrey"]; ?>px;
				
				border-radius: 0;
				width: <?php  echo $widthcadretab ; ?>;
			}
			.active-cadre {
				
				text-align: center;
				cursor: pointer;

			} 
			.tabcontent {
				
				display: none;
				padding: 0px 20px 20px 20px;
				height: 100%;
				margin-top: -6px;
			
			}
			div#tab3231 {
				padding-left: 0;
			}
			.block-content {
				display: flex;
				
			}
			.blk-divis {
				width: 100%;
				padding: 15px;
			}
			.blk-divis {
					width: 100%;
					padding: 15px;
				}
			.mobileposte{
				  display: none;
			  }	
			
			.tabmenu1254896{
				grid-template-columns: repeat(2,1fr) !important;
				flex-direction: row;
				height: 520px; 
			}
			.tabmenu1254896 .image-post{
				    margin: auto;
					align-items: center;
					justify-content: center;
			}
			.tabmenu1254896 img{
				    margin: auto;
					display: block;
			}
			
			@media only screen and (max-width: 850px) {
			  .mobileposte{
				    display: block;
					width: 100%;
					cursor: pointer;
			  }
			  .tabdesktop {
					display: none;
				}
			.tabmenu1254896 {
					
					flex-direction: column;
				}
            .regular1 {
					display: none !important;
				}

			.activeblock img{
				
				
				animation-name: slidemobileimage !important;
				
			}
			}	
			@keyframes slidein {
			  from {
				top: 85px;
			  }

			  to {
				 top: 0px;
			  }
			}
			
			
			@keyframes slideimage {
			 
			  from {
				margin-left: -80%;
			  }

			  to {
				margin-left: 0px;
			  }
			}
			@keyframes slidemobileimage {
			 
			  from {
				margin-left: 180%;
			  }

			  to {
				margin-left: 0px;
			  }
			}
			@keyframes fade-in {
			  from {
				opacity: 0;
			  }
			  to {
				opacity: 1;
			  }
			}
			@keyframes fade-out {
			  from {
				opacity: 1;
			  }
			  to {
				opacity: 0;
			  }
			}
			 
			.oldtab1 {
				background-color: #ddd0fa;
				
			}
			.oldtab2 {
				background-color: #E3F4FF;
				
			}
			.oldtab3 {
				background-color: #EBF1FD;
				
			}
			.oldtab4 {
				background-color: #E1DEEB;
				
			}	
			// .oldtab1 button, .oldtab2  button, .oldtab3 button, .oldtab4 button{
				// top: 0 !important;	
			// }			 
			.activemenu{
				
				animation-duration: 1s;
				animation-name: slidein;
			}
			.activeblock  {
				
				animation-duration: 2s;
				animation-name: fade-in;
				
			}
			.activeblock img{
				
				animation-duration: 1s;
				animation-name: slideimage;
				
			}
		</style>
		<div class="suo-introdection">
				<h3 class="title"><?php echo $titre; ?></h3>
				<p class="desciption"><?php echo $description; ?></p>
		</div>
		
	
		
		
						
						
						
				
              
				<!--<button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">Home</button>
				<button class="tablink" onclick="openPage('News', this, 'green')" >News</button>
				<button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
				<button class="tablink" onclick="openPage('About', this, 'orange')">About</button>-->
				
				<div class="menutab oldtab1 ">
				 <?php
				    $index=1;
					$tabb = array();
					$tabbcontenu = array();
					
					if($settings["show_slider"] != "yes"){
						  foreach ( $alloffres as $key => $proj ) { 
							  
							  $tabb[$index] = $settings["title_color".$index];
							  $tabbcontenu[$index] = $settings["contenu_color".$index];
							  $tabbsouscontenu[$index] = $settings["sous_contenu_color".$index];
							  
							?>
							
							<button class="tablink activemenu tabdesktop block-id-cadre <?php if($index == 1) echo 'activetab';  ?>"   <?php if($index == 1) echo 'id="defaultOpen"';  ?> data-id="<?php  echo $index; ?>" style="background-color: <?php  echo $tabb[$index]; ?> " ><div class="titre_link"><?php echo $proj->post_title; ?></div>
							  <div class="feature-icon">
								
									<img src="/wp-content/plugins/filter-poste/widgets/icon/Stroke 1.svg" class="fa-chevron-down" />
									<img src="/wp-content/plugins/filter-poste/widgets/icon/Arrow - Right 2.svg" class="fa-chevron-up" style="display:none;" />
								
							  </div>
							</button>
						  <?php
						  
							 $index++;
						  }
					}else{
						?>
						<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
						<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
                        <style>
						.regular1 .slick-prev { grid-area: btnprev; }
						.regular1 .slick-list { grid-area: liste; margin: 0px 40px 0px 40px; }
						.regular1 .slick-next { grid-area: btnnext; }
						.regular1 .slick-dots { grid-area: dot; }
						.regular1 {
							display: grid;
							  grid-template-areas:
								'btnprev liste liste liste liste btnnext'
								'dot dot dot dot dot dot';
							  gap: 10px;
							  padding: 10px;
						}
						.regular1 .slick-dots li button {
							display: none;
						}
						.regular1 ul.slick-dots li::marker {
							display: none !important;
							font-size: 0;
						}
						.regular1 .slick-dots li {
							width: 9px;
							float: left;
							height: 9px;
							margin-right: 8px;
							background: #7c4a4a;
							border-radius: 50%;
							position: relative;
						}
						.regular1 .slick-dots {
							grid-area: dot;
							display: block;
							margin: auto;
						}
						.regular1 li.slick-active:before {
							content: ".";
							width: 4px;
							height: 4px;
							position: absolute;
							top: 2px;
							left: 2px;
							background: #0073aa;
							border-radius: 50%;
						}
						.slick-arrow i {
							display: none;
						}
						.fa-angle-right:before , .fa-angle-left:before {
							
							top: 35px;
							position: absolute;
							
						}
					
						</style>
						<div class="regular1 slider" >
						
							<?php
							foreach ( $alloffres as $key => $proj ) { 
								  
								  $tabb[$index] = $settings["title_color".$index];
								  $tabbcontenu[$index] = $settings["contenu_color".$index];
								  $tabbsouscontenu[$index] = $settings["sous_contenu_color".$index];
								  
								?>
								<div>
									<button class="tablink tabdesktop block-id-cadre <?php if($index == 1) echo 'activetab';  ?>"   <?php if($index == 1) echo 'id="defaultOpen"';  ?> data-id="<?php  echo $index; ?>" style="background-color: <?php  echo $tabb[$index]; ?> " ><?php echo $proj->post_title; ?></button>
																								
								</div>
							 <?php
							  
								 $index++;
							  }
							  
							  ?>
							  
						</div>
						
						<script>
						jQuery(document).on('ready', function() {

						   
							  jQuery(".regular1").slick({
								dots: true,
								infinite: true,
								slidesToShow: 4,
								slidesToScroll: 4,
								prevArrow: '<div class="fa fa-angle-left"><i class="fa-angle-left"></i></div>',
								nextArrow: '<div class="fa fa-angle-right"><i class="fa-angle-right"></i></div>',
								
							    
								// variableWidth: true,
								// centerPadding: '100px'
							  });
					  
						});
						</script>
						  <?php
					}
				  
				  ?>
				  </div>
				   <?php
				    $index=1;
				  foreach ( $alloffres as $key => $proj ) { 
				  
				           $partnerFields = get_fields( $proj->ID);
						   $image = wp_get_attachment_image_src( get_post_thumbnail_id( $proj->ID ), 'single-post-thumbnail' );
						   
						   //echo "<pre>";
						    //print_r($proj);
						   // echo $image[0];
				    ?>
					<div class="block-id-cadre  <?php if($index == 1) echo 'active-cadre';  ?> mobileposte" data-id="<?php  echo $index; ?>" style="background-color: <?php  echo $tabb[$index]; ?> "  >
					      <span class="blk-cadre"><?php echo $proj->post_title; ?></span>
						  
						  <div class="feature-icon">
								
										<img src="/wp-content/plugins/filter-poste/widgets/icon/Stroke 1.svg" class="fa-chevron-down" />
										<img src="/wp-content/plugins/filter-poste/widgets/icon/Arrow - Right 2.svg" class="fa-chevron-up" style="display:none;" />
									
						  </div>
						  
					</div>
					<div id="<?php echo "tab".$proj->ID; ?>" class="tabcontent  blockcontenu<?php echo $index; ?> <?php if($index == 1) echo 'activeblock';  ?>" style="background-color: <?php  echo $tabbcontenu[$index]; ?> " >
					<div id="contenu_cadre_tab_<?php echo "tab".$proj->ID; ?>" class="block-content tabmenu1254896" style="background-color: <?php  echo $tabbsouscontenu[$index]; ?> " >
					   
					   <div class="image-post blk-divis">
					   
							<img src="<?php echo $image[0]; ?>" class="img-res-post"/>
					   
					   </div>
					   <div id="contenu_tab_<?php echo "tab".$proj->ID; ?>" class="contenu-tab blk-divis ">
					  
							<p><?php  echo $proj->post_content; ?></p>
					   </div>
					   
					  
					</div>  
					</div>
				  <?php
				  
				     $index++;
				  }
				  
				  ?>


				<script>
			

				// Get the element with id="defaultOpen" and click on it
				
			
				jQuery( document ).ready(function() {
					
					sessionStorage.setItem('color', 'oldtab1');
					sessionStorage.setItem('colormobile', 'oldtabmobile1');
					
					jQuery(".tablink").click(function(){
					    jQuery(".tablink").removeClass("activetab");
						jQuery(".tablink").css("background-color", "");
						jQuery(".tablink").parent().css("background-color", "");
						jQuery(".tablink").attr("id","");
						
						colorid = [];
						cadrem = [];
						
						colorid[1]="#CEB8FD";
						cadrem[1]="#E1D3FE";
						
						colorid[2]="#E3F4FF";
						cadrem[2]="#F0F7F9";
						
						
						colorid[3]="#EBF1FD";
						cadrem[3]="#DCE2EF";
						
						
						colorid[4]="#E1DEEB";
						cadrem[4]="#EAE9F1";
						
						//color_old=jQuery("#color_old").val();
						
						
						id=jQuery(this).data("id");
						
						jQuery(this).css("background-color", colorid[id]);
						//jQuery(this).fadeOut(1000, function() {
							jQuery(this).css("background-color", colorid[id]).css("top",0).css("display","inline-block");
							jQuery(this).parent().css("background-color", cadrem[id]).css("display","inline-block");
							colorold = sessionStorage.getItem('color');
							console.log(colorold);
							jQuery(".menutab").removeClass(colorold).addClass("oldtab"+id);
							sessionStorage.setItem('color', "oldtab"+id);
							jQuery("#color_old").val(colorid[id]);
						//});
						

						jQuery(this).addClass("activetab");
					})
					jQuery(".block-id-cadre").click(function(){

						id=jQuery(this).attr("data-id");
						console.log(id);
						jQuery(".block-id-cadre").removeClass("active-cadre");
						jQuery(".tabcontent").removeClass("activeblock");
						jQuery(this).addClass("active-cadre");
						jQuery(".blockcontenu"+id).addClass("activeblock");
						
						console.log(id);
						colorid = [];
						cadrem = [];
						
						colorid[1]="#CEB8FD";
						cadrem[1]="#E1D3FE";
						
						colorid[2]="#E3F4FF";
						cadrem[2]="#F0F7F9";
						
						
						colorid[3]="#EBF1FD";
						cadrem[3]="#DCE2EF";
						
						
						colorid[4]="#E1DEEB";
						cadrem[4]="#EAE9F1";
						
						//color_old=jQuery("#color_old").val();
						
						
						id=jQuery(this).data("id");
						
						jQuery(this).css("background-color", colorid[id]);
						jQuery(this).css("background-color", colorid[id]).css("top",0).css("display","inline-block");
						jQuery(this).parent().css("background-color", cadrem[id]).css("display","inline-block");
					});
				});
				
				</script>


		
		
		<?php
		
			// get all partners 
				// $argsPartners = array(
				  // 'post_type'   => 'department',
				  // 'numberposts' => -1, 
				  // 'orderby'=> 'title', 
				  // 'order' => 'ASC'
				// );
				
		 // $allPartners = get_posts( $argsPartners );
		 
		 	
			
	
		

	}


	 
 }
 
 ?>
 
