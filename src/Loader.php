<?php
namespace WPT\DiviBlogCarousel;

use WPTools\Pimple\Container;

/**
 * Container
 */
class Loader extends Container
{
    /**
     *
     * @var mixed
     */
    public static $instance;

    public function __construct()
    {
        parent::__construct();

        $this['bootstrap'] = function ($container) {
            return new WP\Bootstrap($container);
        };

        $this['post'] = function ($container) {
            return new WP\Post($container);
        };

        $this['divi'] = function ($container) {
            return new Divi\Divi($container);
        };

        $this['carousel_module_fields'] = function ($container) {
            return new \WPT_Divi_Blog_Carousel_Modules\DiviBlogCarouselModule\Fields($container);
        };
    }

    /**
     * Get container instance.
     */
    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new Loader();
        }

        return self::$instance;
    }

    /**
     * Plugin run
     */
    public function run()
    {
        // activation hook
        register_activation_hook($this['file'], [$this['bootstrap'], 'register_activation_hook']);

        //divi actions
        add_action('et_builder_ready', [$this['divi'], 'et_builder_ready'], 1);
        add_action('divi_extensions_init', [$this['divi'], 'divi_extensions_init']);

        add_action('wp_enqueue_scripts', [$this['divi'], 'enqueue_divi_module_assets']);

        $loader = $this;
        //admin menu
        add_action('admin_menu', function () use ($loader) {
            add_submenu_page(
                'et_divi_options',
                'Divi Blog Carousel',
                'Divi Blog Carousel',
                'manage_options',
                'wp-tools-divi-blog-carousel',
                function () use ($loader) {
                    ob_start();
                    require $loader['dir'] . '/resources/views/menu.php';
                    echo ob_get_clean();
                }
            );
        },
            100
        );

        add_action('wp_print_styles', function () {
            wp_dequeue_style('et_pb_wptools_blog_carousel-styles');
        });
    }
}
