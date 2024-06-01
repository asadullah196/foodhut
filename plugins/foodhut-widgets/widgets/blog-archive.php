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
class Foodhut_Blog_Archive extends Widget_Base {

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
		return 'foodhut-blog-archive';
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
		return __( 'All Blogs', 'food-hut-widgets' );
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
		return 'eicon-kit-details';
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
			'foodhut_blog_archive_style',
			[
				'label' => __( 'Blog', 'food-hut-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'foodhut_title',
			[
				'label' => esc_html__( 'Title', 'food-hut-widgets' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Events At The Food Hut', 'food-hut-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'food-hut-widgets' ),
			]
		);

		$this->add_control(
			'foodhut_blog_number',
			[
				'label' => esc_html__( 'Blog Number', 'food-hut-widgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
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

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['foodhut_blog_number'],
		);

		$query = new \WP_Query( $args );

		?>

		<!-- BLOG Section  -->
		<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
			<h2 class="section-title py-5"><?php echo esc_html($settings['foodhut_title']); ?></h2>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="row">
						<?php if ( $query->have_posts() ) : ?>
							<?php while ( $query->have_posts() ) : $query->the_post();
								$categories = get_the_category(get_the_ID());
						?>
						<div class="col-md-4 my-3 my-md-0">
							<a href="#"class="card bg-transparent border">
								<?php if(has_post_thumbnail()) : ?>
									<img src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="Blog Thumbnail" class="rounded-0 card-img-top mg-responsive">
								<?php endif; ?>
								<div class="card-body">
									<h1 class="text-center mb-4">
										<a href="#" class="badge badge-primary">
											$ 
											<?php
												// Getting value from ACF
												$blog_pricing = function_exists('get_field') ? get_field('blog_price') : null;
												echo esc_html($blog_pricing);
											?>
										</a>
									</h1>
									<h4 class="pt20 pb20"><a class="text-white" href="<?php the_permalink( ); ?>"><br/><?php the_title(); ?></a></h4><br/>
									<p class="text-white">
										<?php 
											$post_content = get_the_content();
											$word_limit = !empty($display_blog_description) ? $display_blog_description : 40;
											$trimmed_content = wp_trim_words($post_content, $word_limit);
											echo $trimmed_content;
										?>
									</p>
								</div>
							</a>
						</div>
						<?php endwhile; wp_reset_postdata(); endif;  ?> 
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}