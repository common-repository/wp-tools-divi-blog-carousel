<?php
namespace WPT\DiviBlogCarousel\WP;

/**
 * Post.
 */
class Post
{
    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Get list of items
     */
    public function get_post_list()
    {
        global $wpdb;
        // list key is a string
        // divi visual builder select wants strings as keys
        $list = ['0-p' => 'Select Post'];

        $query = sprintf('SELECT ID, post_title FROM %s
                         WHERE post_type = "post"
                         AND post_status = "publish"', $wpdb->posts);

        $results = $wpdb->get_results($query);

        if ($results and !empty($results)) {
            foreach ($results as $key => $post) {
                $list[sprintf('%s-p', $post->ID)] = $post->post_title;
            }
        }

        return $list;
    }

    public function render_post_item($post_id)
    {
        $blog = get_post($post_id);
        if (!$blog) {
            return '';
        }
        $featured_image = '';
        $attachment_id  = get_post_thumbnail_id($blog->ID);
        $featured_image = wp_get_attachment_image_url($attachment_id, 'large');

        ob_start();
        require $this->container['dir'] . '/resources/views/wptools-divi-carousel-blog-item.php';
        return ob_get_clean();
    }
}
