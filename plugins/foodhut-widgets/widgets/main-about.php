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
class Foodhut_Main_About extends Widget_Base {

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
		return 'foodhut-main-about';
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
		return __( 'Main About', 'food-hut-widgets' );
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
		return 'eicon-gallery-grid';
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
			'foodhut_main_hero_style',
			[
				'label' => __( 'Style', 'food-hut-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'foodhut_main_hero_bg',
			[
				'label' => esc_html__( 'Choose Background Image', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'foodhut_main_hero_title',
			[
				'label' => esc_html__( 'Title', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Food Hut', 'food-hut-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'food-hut-widgets' ),
			]
		);

		$demo_description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, quisquam accusantium nostrum modi, nemo, officia veritatis ipsum facere maxime assumenda voluptatum enim! Labore maiores placeat impedit, vero sed est voluptas!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita alias dicta autem, maiores doloremque quo perferendis, ut obcaecati harum';

		$this->add_control(
			'foodhut_description',
			[
				'label' => esc_html__( 'Description', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( $demo_description, 'food-hut-widgets' ),
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

		<!--  About Section  -->
		<div id="about" class="container-fluid wow fadeIn" id="about"data-wow-duration="1.5s">
			<div class="row">
				<div class="col-lg-6 has-img-bg"></div>
				<div class="col-lg-6">
					<div class="row justify-content-center">
						<div class="col-sm-8 py-5 my-5">
							<h2 class="mb-4"><?php echo esc_html($settings['foodhut_main_hero_title']); ?></h2>
							<p>
							<?php
								// Check if Elementor is in edit mode
								$is_edit_mode = \Elementor\Plugin::$instance->editor->is_edit_mode();

								if ( $is_edit_mode ) {
									// Output the content with tags in the backend (editor)
									echo wp_kses_post( $settings['foodhut_description'] );
								} else {
									// Output the content without tags in the frontend
									echo esc_html( wp_strip_all_tags( $settings['foodhut_description'] ) );
								}
							?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}