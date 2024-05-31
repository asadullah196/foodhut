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
class Foodhut_Main_Hero extends Widget_Base {

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
		return 'foodhut-main-hero';
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
		return __( 'Main Hero', 'food-hut-widgets' );
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

		$this->add_control(
			'foodhut_main_hero_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Always Fresh and Delightful', 'food-hut-widgets' ),
				'placeholder' => esc_html__( 'Type your sub title here', 'food-hut-widgets' ),
			]
		);

		$this->add_control(
			'foodhut_main_hero_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View Our Gallery', 'food-hut-widgets' ),
				'placeholder' => esc_html__( 'Add button text here', 'food-hut-widgets' ),
			]
		);

		$this->add_control(
			'foodhut_main_hero_btn_url',
			[
				'label' => esc_html__( 'Link', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
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
		<header id="home" class="header" style="background-image: url('<?php echo esc_url($settings['foodhut_main_hero_bg']['url']); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover; position: relative; background-color: #1f1f1f;">
			<div class="overlay text-white text-center">
				<h1 class="display-2 font-weight-bold my-3"><?php echo esc_html($settings['foodhut_main_hero_title']); ?></h1>
				<h2 class="display-4 mb-5"><?php echo esc_html($settings['foodhut_main_hero_sub_title']); ?></h2>
				<?php if ( ! empty( $settings['foodhut_main_hero_btn_url']['url'] ) ) : ?>
					<a class="btn btn-lg btn-primary" href="<?php echo esc_url($settings['foodhut_main_hero_btn_url']['url']); ?>"><?php echo esc_html($settings['foodhut_main_hero_btn_text']); ?></a>
				<?php endif; ?>
			</div>
		</header>

		<?php
	}
}