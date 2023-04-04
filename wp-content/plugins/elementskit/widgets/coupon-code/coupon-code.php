<?php
namespace Elementor;

use \Elementor\ElementsKit_Widget_Coupon_Code_Handler as Handler;

if ( ! defined( 'ABSPATH' ) ) exit;

class Elementskit_Widget_Coupon_Code extends Widget_Base {

	use \Elementskit_Lite\Widgets\Widget_Notice;

	public $base;
	
	public function get_name() {
		return Handler::get_name();
	}

	public function get_title() {
		return Handler::get_title();
	}

	public function get_icon() {
		return Handler::get_icon();
	}

	public function get_categories() {
		return Handler::get_categories();
	}

	public function get_keywords() {
		return ['ekit', 'promo', 'discount', 'gift', 'offer'];
	}

	public function get_help_url() {
		return 'https://wpmet.com/doc/coupon-code/';
	}

	protected function register_controls() {

		// Coupon Content
		$this->start_controls_section (
			'ekit_coupon_code_content',
			[
				'label' => esc_html__( 'Content', 'elementskit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'ekit_coupon_style',
			[
				'label' => esc_html__( 'Coupon Style', 'elementskit' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-3',
				'options' => [
					'style-3' => esc_html__( 'Slide', 'elementskit' ),
					'style-2' => esc_html__( 'Slide With Curve', 'elementskit' ),
					'style-4' => esc_html__( 'Slide With Angle', 'elementskit' ),
					'style-6' => esc_html__( 'Right Curve', 'elementskit' ),
					'style-7' => esc_html__( 'Button With Input ', 'elementskit' ),
				],
			]
		);

		// Coupon Title
		$this->add_control(
			'ekit_coupon_text',
			[
				'label' => esc_html__( 'Coupon Label', 'elementskit' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Get 50% OFF ', 'elementskit' ),
				'placeholder' => esc_html__( 'Get 50% OFF ', 'elementskit' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_control(
			'ekit_copybtn_text',
			[
				'label' => esc_html__( 'Button Label', 'elementskit' ),
				'type'  => Controls_Manager::TEXT,
				'default' => esc_html__( 'Copy Code', 'elementskit' ),
				'dynamic' 		=> [ 'active' => true ],
				'label_block' => true,
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->add_control(
			'ekit_after_copy_text',
			[
				'label' => esc_html__( 'After Copy', 'elementskit' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Copied!', 'elementskit' ),	
				'dynamic' 		=> [ 'active' => true ],
				'label_block' => true,
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		// Coupon Code
		$this->add_control(
			'ekit_coupon_code',
			[
				'label' => esc_html__( 'Coupon', 'elementskit' ),
				'type'  => Controls_Manager::TEXT,
				'default' => esc_html__( 'XS46-58XS-XS25', 'elementskit' ),
				'placeholder' => esc_html__( 'XS46-58XS-XS25 ', 'elementskit' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_heading',
			[
				'label' => esc_html__( 'Button Icon', 'elementskit' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'ekit_coupon_icons',
			[
				'label' => esc_html__( 'Icon', 'elementskit' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'ekit_coupon_icon',
				'label_block' => true,
				'skin' => 'inline',
				'default' => [
					'value' => 'fa fa-cut',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'elementskit' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'elementskit' ),
					'right' => esc_html__( 'After', 'elementskit' ),
				],
				'condition'	=> [
					'ekit_coupon_icons[value]!' => '',
				]
			]
		);

		$this->add_control(
			'ekit_coupon_flex_direction',
			[
				'label' => esc_html__( 'Direction', 'elementskit' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'row' => [
						'title' => esc_html__( 'Row - horizontal', 'elementskit' ),
						'icon' => 'eicon-arrow-right',
					],
					'column' => [
						'title' => esc_html__( 'Column - vertical', 'elementskit' ),
						'icon' => 'eicon-arrow-down',
					],
					'row-reverse' => [
						'title' => esc_html__( 'Row - reversed', 'elementskit' ),
						'icon' => 'eicon-arrow-left',
					],
					'column-reverse' => [
						'title' => esc_html__( 'Column - reversed', 'elementskit' ),
						'icon' => 'eicon-arrow-up',
					],
				],
				'default' => 'row-reverse',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .ekit-wid-con .ekit_coupon_btn_group' => 'flex-direction: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				]
			]
		);

		$this->add_control(
			'ekit_coupon_flex_align',
			[
				'label' => esc_html__( 'Align Items', 'elementskit' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html_x( 'Start', 'Flex Container Control', 'elementskit' ),
						'icon' => 'eicon-flex eicon-align-start-v',
					],
					'center' => [
						'title' => esc_html_x( 'Center', 'Flex Container Control', 'elementskit' ),
						'icon' => 'eicon-flex eicon-align-center-v',
					],
					'flex-end' => [
						'title' => esc_html_x( 'End', 'Flex Container Control', 'elementskit' ),
						'icon' => 'eicon-flex eicon-align-end-v',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .ekit-wid-con .ekit_coupon_btn_group' => 'align-items: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				]
			]
		);

		$this->add_control(
			'ekit_coupon_action_type',
			[
				'label' => esc_html__( 'Select Action', 'elementskit' ),
				'type'  => Controls_Manager::SELECT,
				'default' => 'click',
				'options' => [
					'click'  => esc_html__( 'Click', 'elementskit' ),
					'popup'  => esc_html__( 'Popup', 'elementskit' ),
				],
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				]
			]
		);

		$this->end_controls_section();

		// Popup Content Section
		$this->start_controls_section (
			'ekit_coupon_code_popup_content',
			[
				'label' => esc_html__( 'Popup', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'ekit_coupon_action_type' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				]
			],
		);

		$this->add_control(
			'ekit_coupon_modal_title_',
			[
				'label' => esc_html__( 'Title', 'elementskit' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( ' ElementsKit Coupon Code Widget', 'elementskit' ),
				'placeholder' => esc_html__( 'Title', 'elementskit' ),
				'dynamic' => [
					'active' => true,
				],

			]
		);

		$this->add_control(
			'ekit_coupon_modal_desc',
			[
				'label' => esc_html__( 'Description', 'elementskit' ),
				'type'  => Controls_Manager::TEXT,
				'default' => esc_html__( 'Use the coupon code on site.', 'elementskit' ),
				'placeholder' => esc_html__( 'Description', 'elementskit' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'ekit_copy_btn_text',
			[
				'label' => esc_html__( 'Copy Button', 'elementskit' ),
				'type'  => Controls_Manager::TEXT,
				'default' => esc_html__( 'Copy Code', 'elementskit' ),
				'dynamic' 		=> [ 'active' => true ],

			]
		);

		$this->add_control(
			'ekit_after_copied_text',
			[
				'label' => esc_html__( 'After Copy', 'elementskit' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Copied!', 'elementskit' ),	
				'dynamic' 		=> [ 'active' => true ],			
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_modal_align',
			[
				'label' => esc_html__( 'Text Alignment', 'elementskit' ),
				'type'  => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'elementskit' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementskit' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementskit' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-body .ekit-coupon-modal-info' => 'text-align: {{VALUE}};',
				],
			]
		);

		// Ekit Close Icon
		$this->add_control(
			'ekit_coupon_popup_close_btn',
			[
				'label' => esc_html__('Close Icon', 'elementskit'),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_control( 
			'ekit_coupon_close_button_icons', 
			[
				'label' => esc_html__( 'Icon', 'elementskit' ),
				'type'  => Controls_Manager::ICONS,
				'fa4compatibility' => 'ekit_team_close_icon_change',
				'skin' => 'inline',
				'default' => [
					'value'     => 'fas fa-times',
					'library'   => 'fa-solid',
				],
				'label_block'   => true,
			]
		);

		$this->end_controls_section();

		/** Coupon Button Style */ 
		$this->start_controls_section(
			'ekit_coupon_button_style',
			[
				'label' => esc_html__( 'Button', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Button style 2
		$this->add_control(
			'ekit_coupon_btn_separator_normal_style_2',
			[
				'label' => esc_html__( 'Separator Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link::before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link::after' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .ekit-coupon-wrapper .ekit_coupon_text.style-2::after' => 'border-right-color: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-2',
				],
			]
		);

		// Button style_6
		$this->add_control(
			'ekit_coupon_btn_before_style_6',
			[
				'label' => esc_html__( 'Separator Top Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#99bbef',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text .coupon-text::before' => 'border-top-color: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-6',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_btn_after_style_6',
			[
				'label' => esc_html__( 'Separator Bottom Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#587eb9',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text .coupon-text::after' => 'border-bottom-color: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-6',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_text_align',
			[
				'label' => esc_html__( 'Text Alignment', 'elementskit' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'elementskit' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementskit' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementskit' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ekit_coupon_typography',
				'label'     => esc_html__( 'Typography', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text',
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'condition' => [
					'ekit_coupon_style!' => 'style-7'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ekit_coupon_style_7_typography',
				'label'     => esc_html__( 'Typography', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn',
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->start_controls_tabs( 
			'ekit_coupon_btn_tabs_style' 
		);

		$this->start_controls_tab(
			'ekit_coupon_btn_tab_normal',
			[
				'label' => esc_html__( 'Normal', 'elementskit' ),
			]
		);

		// Button style_3 and style_4
		$this->add_responsive_control(
			'ekit_coupon_btn_label_normal',
			[
				'label'			=> esc_html__( 'Button Label Width (%)', 'elementskit' ),
				'type'			=> Controls_Manager::SLIDER,
				'selectors'		=> [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text' => 'width: {{SIZE}}%;',
				],
				'condition' => [
					'ekit_coupon_style!' => ['style-7']
				],
			]
		);

		// Button style_4
		$this->add_control(
			'ekit_coupon_btn_separator_normal_color',
			[
				'label'  => esc_html__( 'Separator Color', 'elementskit' ),
				'type'   => Controls_Manager::COLOR,
				'default'   => '#99bbef',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text::after' => 'border-left-color: {{VALUE}}',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-4',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'elementskit' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn .ekit_copybtn_text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn .ekit_after_copy_text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'ekit_coupon_btn_bg_color_normal',
				'default'   => '',
				'selector'  => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text',
				'exclude'   => ['image'],
				'condition' => [
					'ekit_coupon_style' => ['style-2', 'style-3', 'style-4', 'style-6']
				], 
			)
		);

		/** style_7 */
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'ekit_couponBtn_bg_color_normal',
				'default'   => '',
				'selector'  => '{{WRAPPER}} .ekit_coupon_btn_group > .ekit_coupon_copybtn',
				'exclude'   => ['image'],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_border_normal_style',
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link',
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_border_normal_style7',
				'selector' => '{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn',
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), 
			[
				'name' => 'ekit_coupon_btn_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'elementskit' ),
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_coupon_btn_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'elementskit' ),
			]
		);

		// Button style_3 and style_4
		$this->add_responsive_control(
			'ekit_coupon_btn_label_hover',
			[
				'label'		=> esc_html__( 'Button Label Width (%)', 'elementskit' ),
				'type'		=> Controls_Manager::SLIDER,
				'default' => ['size' => 80 ],
				'selectors'	=> [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover .ekit_coupon_text' => 'width: {{SIZE}}%;',
				],
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_separator_hover_color',
			[
				'label'  => esc_html__( 'Separator Color', 'elementskit' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover .ekit_coupon_text::after' => 'border-left-color: {{VALUE}}',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-4',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_title_hover_color',
			[
				'label'     => esc_html__( 'Text Color', 'elementskit' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover .ekit_coupon_text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn:hover .ekit_copybtn_text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn:hover .ekit_after_copy_text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'ekit_coupon_btn_bg_color_hover',
				'default'   => '',
				'selector'  => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_text:hover',
				'exclude'   => ['image'],
				'condition' => [
					'ekit_coupon_style' => ['style-2', 'style-3', 'style-4', 'style-6']
				],   
			)
		);

		/** style_7 */
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'ekit_couponBtn_bg_color_hover',
				'default'   => '',
				'selector'  => '{{WRAPPER}} .ekit_coupon_btn_group > .ekit_coupon_copybtn:hover',
				'exclude'   => ['image'],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],

			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_border_hover_style',
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover',
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_border_hover_style7',
				'selector' => '.ekit_coupon_btn_group .ekit_coupon_copybtn:hover',
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), 
			[
				'name' => 'ekit_coupon_btn_box_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'elementskit' ),
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper:hover .coupon-btn-link',
			]
		);

		// Button style_6
		$this->add_control(
			'ekit_coupon_btn_hover_before',
			[
				'label' => esc_html__( 'Curve Top Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#99bbef',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover .ekit_coupon_text .coupon-text::before' => 'border-top-color: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-6',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_btn_hover_after',
			[
				'label' => esc_html__( 'Curve Bottom Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#587eb9',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover .ekit_coupon_text .coupon-text::after' => 'border-bottom-color: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-6',
				],
			]
		); 

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'ekit_coupon_hover_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link' =>  'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .popup_copy_button' =>  'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'top' => '10',
					'right' => '10',
					'bottom' => '10' ,
					'left' => '10',
					'unit' => 'px'
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper :is(.ekit_coupon_text, .ekit_coupon_code)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'ekit_coupon_style' => ['style-2', 'style-3', 'style-4','style-6',],
				],
			]
		);

		// Button style_7
		$this->add_responsive_control(
			'ekit_couponBtn_style_7_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'top' => '9',
					'right' => '9',
					'bottom' => '9',
					'left' => '9',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copybtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->end_controls_section();

		/** Coupon Icon Style */ 
		$this->start_controls_section(
			'ekit_cupon_icon_style',
			[
				'label' => esc_html__( 'Icon', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_coupon_icons[value]!' => ''
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_size',
			[
				'label' => esc_html__( 'Font Size', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_text i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_text svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; position: relative; top: 3px;',
					'{{WRAPPER}} .ekit_coupon_copybtn i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_copybtn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; position: relative; top: 3px;',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_text i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ekit_coupon_copybtn i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ekit_coupon_copybtn svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .ekit_coupon_text svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_text i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ekit_coupon_copybtn i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ekit_coupon_copybtn svg' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ekit_coupon_text svg' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_spacing',
			[
				'label' => esc_html__( 'Spacing', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_text .ekit-coupon-code-icon-before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_text .ekit-coupon-code-icon-after' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_copybtn .ekit-coupon-code-icon-before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_copybtn .ekit-coupon-code-icon-after' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_text svg' => 'margin-right: {{SIZE}}{{UNIT}}; margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_copybtn svg' => 'margin-right: {{SIZE}}{{UNIT}}; margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_icon_border',
				'selector' => '{{WRAPPER}} .ekit_coupon_text i, {{WRAPPER}} .ekit_coupon_copybtn i, {{WRAPPER}} .ekit_coupon_copybtn svg, {{WRAPPER}} .ekit_coupon_text svg',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_text i, {{WRAPPER}} .ekit_coupon_copybtn i, {{WRAPPER}} .ekit_coupon_copybtn svg, {{WRAPPER}} .ekit_coupon_text svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_text i, {{WRAPPER}} .ekit_coupon_text svg, {{WRAPPER}} .ekit_coupon_copybtn i, {{WRAPPER}} .ekit_coupon_copybtn svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		/** Coupon Code style */
		$this->start_controls_section( 
		'ekit_coupon_code_style',
			[
				'label' => esc_html__('Coupon', 'elementskit'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_code_align',
			[
				'label' => esc_html__( 'Code Alignment', 'elementskit' ),
				'type'  => Controls_Manager::CHOOSE,
				'options' => [
					'left'      => [
						'title' => esc_html__( 'Left', 'elementskit' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementskit' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementskit' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_code' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_action_type!' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_code_style7_align',
			[
				'label' => esc_html__( 'Code Alignment', 'elementskit' ),
				'type'  => Controls_Manager::CHOOSE,
				'options' => [
					'left'      => [
						'title' => esc_html__( 'Left', 'elementskit' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementskit' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementskit' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ekit_coupon_code_typography',
				'label' => esc_html__( 'Typography', 'elementskit' ),
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .ekit_coupon_code span',
				'condition' => [
					'ekit_coupon_style!' => 'style-7',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ekit_coupon_style7_code_typography',
				'label' => esc_html__( 'Typography', 'elementskit' ),
				'selector' => '{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code',
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_code_color',
			[
				'label' => esc_html__( 'Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#101010',
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_code' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_code_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_code:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'ekit_coupon_code_bg_color',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_code, {{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code',
				'exclude'  => ['image'],
			]
		);

		$this->start_controls_tabs( 
			'ekit_coupon_code_styles',
			[
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
			]
		);

		$this->start_controls_tab(
			'ekit_coupon_code_styles_normal',
			[
				'label' => esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_code_border_style_2',
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link, {{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code',
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_coupon_code_styles_hover',
			[
				'label' => esc_html__( 'Hover', 'elementskit' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_code_border_style_2_hover',
				'selector' => '{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link:hover, {{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code:hover',
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				]
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'ekit_coupon_code_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ekit-coupon-wrapper .coupon-btn-link .ekit_coupon_code' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ekit_coupon_btn_group .ekit_coupon_copy_code' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'ekit_coupon_style' => 'style-7',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		/** Popup Modal Box Section style */
		$this->start_controls_section( 
			'ekit_coupon_popup_modal_box',
			[
				'label' => esc_html__('Popup Modal Box', 'elementskit'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_coupon_action_type' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'ekit_coupon_modal_box_background',
				'label' => esc_html__( 'Background', 'elementskit' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .elementskit-coupon-popup .modal-content',
				'exclude'  => ['image'],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_modal_box_border',
				'label' => esc_html__( 'Border', 'elementskit' ),
				'selector' => '{{WRAPPER}} .elementskit-coupon-popup .modal-content',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_modal_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_modal_box_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_modal_box_margin',
			[
				'label' => esc_html__( 'Margin', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		/** Popup Close Icon Style */
		$this->start_controls_section (
			'ekit_coupon_popup_close_icon_style',
			[
				'label' => esc_html__( 'Popup Close Icon', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_coupon_action_type' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				]
			],
		);

		$this->add_control(
			'ekit_coupon_close_icon_alignment',
			[
				'label' => esc_html__( 'Close Icon Alignment', 'elementskit' ),
				'type'  => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementskit' ),
						'icon'  => 'eicon-text-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementskit' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => '{{VALUE}}: 10px;',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_close_icon_vertical_align',
			[
				'label' => esc_html__( 'Vertical Position ', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'top:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_close_icon_horizontal_align',
			[
				'label' => esc_html__( 'Horizontal Position ', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => '{{ekit_coupon_close_icon_alignment.VALUE}}: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control( 
			'ekit_coupon_close_icon_size', 
			[
				'label'           => esc_html__('Font Size', 'elementskit'),
				'type'            => Controls_Manager::SLIDER,
				'size_units'      => ['px','em'],
				'range'           => [
					'px' => [ 'min'  => 0, 'max'  => 96, 'step' => 2 ],
					'em' => [ 'min'  => 0, 'max'  => 6, 'step' => 0.2 ]
				],
				'default'         => [ 'size' => 16, 'unit' => 'px' ],
				'selectors'       => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close svg' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs( 
			'ekit_icon_box_icon_colors' 
		);

		$this->start_controls_tab(
			'ekit_coupon_icon_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_coupon_icon_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_icon_secondary_color_normal',
			[
				'label' => esc_html__( 'Icon Background', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_close_icon_border',
				'label' => esc_html__( 'Border', 'elementskit' ),
				'selector' => '{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_coupon_icon_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_coupon_hover_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close:hover svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_hover_background_color',
			[
				'label' => esc_html__( 'Icon Background', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'ekit_coupon_border_icon_group',
				'label'     => esc_html__( 'Border', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close:hover',
			]
		);

		$this->end_controls_tab();  

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'ekit_coupon_close_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_close_icon_padding',
			[
				'label'     => esc_html__( 'Padding', 'elementskit' ),
				'type'      => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px','em' ],
				'selectors'     => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ekit_coupon_close_icon_hw',
			[
				'label' => esc_html__( 'Use Height Width', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'elementskit' ),
				'label_off' => esc_html__( 'Hide', 'elementskit' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_close_icon_width',
			[
				'label' => esc_html__( 'Width', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 60,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_coupon_close_icon_hw' => 'yes'
				],
			]
		);
		
		$this->add_responsive_control(
			'ekit_coupon_close_icon_height',
			[
				'label' => esc_html__( 'Height', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 60,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_coupon_close_icon_hw' => 'yes'
				],
			]
		);
		
		$this->add_responsive_control(
			'ekit_coupon_close_icon_lheight',
			[
				'label' => esc_html__( 'Line Height', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 60,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .elementskit-coupon-popup .modal-content .ekit-coupon-modal-close' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_coupon_close_icon_hw' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		/** Popup Title and Description */
		$this->start_controls_section (
			'ekit_coupon_popup_title_desc_style',
			[
				'label' => esc_html__( 'Popup Title & Description', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_coupon_action_type' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				]
			],
		);

		/** Popup Title style */
		$this->add_control(
			'ekit_coupon_modal_title_heading',
			[
				'label' => esc_html__( 'Title', 'elementskit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'ekit_coupon_modal_title_color',
			[
				'label'      => esc_html__( 'Color', 'elementskit' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .ekit_coupon_modal_title' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ekit_coupon_modal_title_typography',
				'label'     => esc_html__( 'Typography', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .ekit_coupon_modal_title',
			]
		); 

		$this->add_responsive_control(
			'ekit_coupon_modal_title_margin_bottom',
			[
				'label' => esc_html__( 'Margin Bottom', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_modal_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		/** Popup Description style */ 
		$this->add_control(
			'ekit_coupon_modal_desc_heading',
			[
				'label' => esc_html__( 'Description', 'elementskit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'ekit_coupon_modal_desc_color',
			[
				'label'      => esc_html__( 'Color', 'elementskit' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .ekit_coupon_modal_desc' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ekit_coupon_modal_desc_typography',
				'label'     => esc_html__( 'Typography', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .ekit_coupon_modal_desc',
			]
		); 

		$this->add_responsive_control(
			'ekit_coupon_modal_desc_margin_bottom',
			[
				'label' => esc_html__( 'Margin Bottom', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ekit_coupon_modal_desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);    

		$this->end_controls_section();

		/** Popup Copy Button style */
		$this->start_controls_section (
			'ekit_coupon_popup_copy_btn_style',
			[
				'label' => esc_html__( 'Popup Copy Button', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_coupon_action_type' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				]
			],
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ekit_coupon_popup_copy_btn_typography',
				'label'     => esc_html__( 'Typography', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button',
			]
		); 

		$this->start_controls_tabs( 
			'ekit_coupon_popup_tabs'
		);

		$this->start_controls_tab(
			'ekit_coupon_popup_tab',
			[
				'label' => esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_coupon_popup_copy_btn_color',
			[
				'label' => esc_html__('Color', 'elementskit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button' => 'color:{{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'ekit_coupon_popup_copy_btn_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button',
				'exclude'  => ['image'],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_popup_copy_btn_border',
				'label' => esc_html__( 'Border', 'elementskit' ),
				'selector' => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_popup_copy_btn_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();  

		$this->start_controls_tab(
			'ekit_coupon_popup_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_coupon_popup_copy_btn_hover_color',
			[
				'label' => esc_html__('Color', 'elementskit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button:hover' => 'color:{{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'ekit_coupon_popup_copy_btn_hover_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button:hover',
				'exclude'  => ['image'],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_popup_copy_btn_hover_border',
				'label' => esc_html__( 'Border', 'elementskit' ),
				'selector' => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button:hover',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_popup_copy_btn_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();  
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'ekit_coupon_copy_button_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],				
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_copy_button_margin',
			[
				'label' => esc_html__( 'Margin', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],				
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .popup_copy_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		/** Popup Copy Code style */
		$this->start_controls_section (
			'ekit_coupon_popup_copy_code_style',
			[
				'label' => esc_html__( 'Popup Copy Code', 'elementskit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_coupon_action_type' => 'popup',
					'ekit_coupon_style!' => 'style-7',
				]
			],
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ekit_coupon_popup_copy_code_typography',
				'label'     => esc_html__( 'Typography', 'elementskit' ),
				'selector'  => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code',
			]
		); 

		$this->start_controls_tabs( 
			'ekit_coupon_popup_copy_code_tabs'
		);

		$this->start_controls_tab(
			'ekit_coupon_popup_copy_code_tab',
			[
				'label' => esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_coupon_popup_copy_code_color',
			[
				'label' => esc_html__('Color', 'elementskit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code' => 'color:{{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'ekit_coupon_popup_copy_code_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code',
				'exclude'  => ['image'],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_popup_copy_code_border',
				'label' => esc_html__( 'Border', 'elementskit' ),
				'selector' => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_popup_copy_code_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();  

		$this->start_controls_tab(
			'ekit_coupon_popup_copy_code_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_coupon_popup_copy_code_hover_color',
			[
				'label' => esc_html__('Color', 'elementskit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code:hover' => 'color:{{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'ekit_coupon_popup_copy_code_hover_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code:hover',
				'exclude'  => ['image'],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ekit_coupon_popup_copy_code_hover_border',
				'label' => esc_html__( 'Border', 'elementskit' ),
				'selector' => '{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code:hover',
			]
		);

		$this->add_responsive_control(
			'ekit_coupon_popup_copy_code_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();  
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'ekit_coupon_copy_code_padding',
			[
				'label' => esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'{{WRAPPER}} .modal-content .modal-body .ekit-coupon-modal-info .ekit-coupon-outer .ekit_modal_code' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		$this->insert_pro_message();
	}

	protected function render() {
		echo '<div class="ekit-wid-con">';
			$this-> render_raw();
		echo '</div>';
	}

	protected function render_raw( ) {
		$settings = $this->get_settings_for_display();
		extract($settings);

		$popup_class =  $ekit_coupon_action_type == 'popup' ? 'ekit-coupon-popup' : '';

		$this->add_render_attribute( 'coupon', [
			'class' => 'ekit_coupon_code',
			'id'    => 'copy_code',
			'data-coupon' =>$ekit_coupon_code,
			'data-coupon-text' => $ekit_after_copy_text,
		]);

		if($ekit_coupon_style == 'style-7'): ?>
		<div class="ekit_coupon_btn_group">
			<span class="ekit_modal_code ekit_coupon_copy_code" <?php echo $this->get_render_attribute_string('coupon'); ?> data-coupon="<?php echo esc_attr($ekit_coupon_code ); ?>"> <?php echo esc_html($ekit_coupon_code ); ?> </span>
			<button class="ekit_btn popup_copy_button ekit_coupon_copybtn" <?php echo $this->get_render_attribute_string( 'modal_copy_code' ); ?>>
				<?php $ekit_coupon_icon_align == 'left' && Icons_Manager::render_icon( $settings['ekit_coupon_icons'], [ 'aria-hidden' => 'true', 'class' => 'ekit-coupon-code-icon-before' ] ); ?>
					<span class="ekit_coupon_btn_group_wrap">
						<span class="ekit_copybtn_text"> <?php echo wp_kses($ekit_copybtn_text, \ElementsKit_Lite\Utils::get_kses_array()); ?>  </span>
					</span>
				<?php $ekit_coupon_icon_align == 'right' && Icons_Manager::render_icon( $settings['ekit_coupon_icons'], [ 'aria-hidden' => 'true', 'class' => 'ekit-coupon-code-icon-after' ] ); ?>
			</button>
		</div>       
		<?php  else : ?>
			<div class="ekit-coupon-wrapper open-button" id="ekit_coupon_wrapper" data-popup-select="<?php echo esc_attr($ekit_coupon_action_type); ?>"  ekit_modal_open="ekit_coupon_popup" href="javascript:void(0)">  
			<a class="coupon-btn-link <?php echo esc_html($popup_class); ?>" data-mfp-src="#ekit_coupon_modal_<?php echo esc_attr($this->get_id()); ?>">
					<div class="ekit_coupon_text <?php echo esc_html($ekit_coupon_style); ?>" id="btn_copy_code">
						<?php $ekit_coupon_icon_align == 'left' && Icons_Manager::render_icon( $settings['ekit_coupon_icons'], [ 'aria-hidden' => 'true', 'class' => 'ekit-coupon-code-icon-before' ] ); 
						
						if (!empty($settings['ekit_coupon_text']) ) : ?>
							<span class="coupon-text"><?php echo esc_html( $settings['ekit_coupon_text'] ); ?></span>
						<?php endif;

						$ekit_coupon_icon_align == 'right' && Icons_Manager::render_icon( $settings['ekit_coupon_icons'], [ 'aria-hidden' => 'true', 'class' => 'ekit-coupon-code-icon-after' ] ); ?>                          
					</div>
					<div <?php $this->print_render_attribute_string( 'coupon' ); ?>>
						<span><?php echo esc_html($ekit_coupon_code ); ?></span>
					</div>
				</a>
			</div>
		<?php endif; ?>

		<?php if($ekit_coupon_action_type == 'popup') : ?>
			<!-- Popup Modal -->
			<div class="zoom-anim-dialog mfp-hide elementskit-coupon-popup" id="ekit_coupon_modal_<?php echo esc_attr($this->get_id()); ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<button type="button" class="ekit-coupon-modal-close">
							<?php Icons_Manager::render_icon( $ekit_coupon_close_button_icons, ['aria-hidden' => 'true'] ); ?>
						</button>
						<div class="modal-body">
							<div class="ekit-coupon-modal-info<?php echo !empty($image_html) ? ' has-img' : ''; ?>">
								<h3 class="ekit_coupon_modal_title"><?php echo esc_html( $ekit_coupon_modal_title_ ); ?></h3>
								<p class="ekit_coupon_modal_desc"> <?php echo wp_kses($ekit_coupon_modal_desc, \ElementsKit_Lite\Utils::get_kses_array()); ?> </p>
								<div class="ekit-coupon-outer">
									<span class="ekit_modal_code" <?php $this->print_render_attribute_string('coupon'); ?> data-coupon="<?php echo esc_attr($ekit_coupon_code ); ?>"> <?php echo esc_html($ekit_coupon_code ); ?> </span>
									<button class="ekit_btn popup_copy_button" <?php $this->print_render_attribute_string( 'modal_copy_code' ); ?>>
									<span class="ekit_copy_btn_text"><?php echo wp_kses($ekit_copy_btn_text, \ElementsKit_Lite\Utils::get_kses_array()); ?></span>
										<span class="ekit_after_copied_text"><?php echo wp_kses($ekit_after_copied_text, \ElementsKit_Lite\Utils::get_kses_array()); ?></span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<?php
	}
}