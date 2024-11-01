<?php
/**
 * Plugin Name:     WP Tools Divi Blog Carousel
 * Description:     A divi image carousel module to create a slide-show with image.
 * Author:          WP Tools
 * Author URI:      https://wptools.app
 * Text Domain:     wp-tools-divi-blog-carousel
 * Domain Path:     /languages
 * Version:         1.5.0
 *
 * @package         Divi_Blog_Carousel
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/freemius.php';

$loader = \WPT\DiviBlogCarousel\Loader::get_instance();

$loader['name']    = 'WP Tools Divi Blog Carousel';
$loader['version'] = '1.5.0';
$loader['dir']     = __DIR__;
$loader['url']     = plugins_url( '/' . basename( __DIR__ ) );
$loader['file']    = __FILE__;
$loader['slug']    = 'wp-tools-divi-blog-carousel';

$loader->run();
