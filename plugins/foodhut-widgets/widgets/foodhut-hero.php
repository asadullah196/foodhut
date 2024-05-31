<?php
namespace FoodhutWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Foodhut hero
 *
 * Elementor widget for Foodhut hero.
 *
 * @since 1.0.0
 */
class Hello_World extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'foodhut-hero';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Foodhut Hero', 'food-hut-widgets' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-instagram-nested-gallery';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'foodhut-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'food-hut-widgets' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'food-hut-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'food-hut-widgets' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'food-hut-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'food-hut-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'food-hut-widgets' ),
					'uppercase' => __( 'UPPERCASE', 'food-hut-widgets' ),
					'lowercase' => __( 'lowercase', 'food-hut-widgets' ),
					'capitalize' => __( 'Capitalize', 'food-hut-widgets' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- header -->
		<header id="home" class="header" style="background-image: url('<?php echo get_template_directory_uri().'/assets/imgs/main.jpg'; ?>'); background-repeat: no-repeat; background-position: center; background-size: cover; position: relative; background-color: #1f1f1f;">
			<div class="overlay text-white text-center">
				<h1 class="display-2 font-weight-bold my-3">Food Hut Here</h1>
				<h2 class="display-4 mb-5">Always fresh &amp; Delightful</h2>
				<a class="btn btn-lg btn-primary" href="#gallary">View Our gallary</a>
			</div>
		</header>

		<?php
	}
}
