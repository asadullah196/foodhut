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
class Foodhut_Contact_Us extends Widget_Base {

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
		return 'foodhut-contact-us';
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
		return __( 'Contact Us', 'food-hut-widgets' );
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
		return 'eicon-testimonial';
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
			'foodhut_contact_style',
			[
				'label' => __( 'Content', 'food-hut-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'foodhut_phone',
			[
				'label' => esc_html__( 'Short Code', 'food-hut-widgets' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '(123) 456-7890', 'food-hut-widgets' ),
				'placeholder' => esc_html__( 'Type your short code here', 'food-hut-widgets' ),
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

		<!-- CONTACT Bottom Section  -->
		<div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
			<div class="row">
				<div class="col-md-6 px-0">
					<div id="map" style="width: 100%; height: 100%; min-height: 400px"></div>
				</div>
				<div class="col-md-6 px-5 has-height-lg middle-items">
					<h3>FIND US</h3>
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
					<div class="text-muted">
						<?php if (!empty ($settings['foodhut_address']) ) : ?>
							<p><span class="ti-location-pin pr-3"></span> <?php echo esc_html($settings['foodhut_address']); ?></p>
						<?php endif; ?>
						<?php if (!empty ($settings['foodhut_phone']) ) : ?>
							<p><span class="ti-support pr-3"></span> <?php echo esc_html($settings['foodhut_phone']); ?></p>
						<?php endif; ?>
						<?php if (!empty ($settings['foodhut_email']) ) : ?>
							<p><span class="ti-email pr-3"></span> <?php echo esc_html($settings['foodhut_email']); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}