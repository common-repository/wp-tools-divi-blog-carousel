<?php

if ( !function_exists( 'wptools_blog_carousel_fs' ) ) {
    // Create a helper function for easy SDK access.
    function wptools_blog_carousel_fs()
    {
        global  $wptools_blog_carousel_fs ;
        
        if ( !isset( $wptools_blog_carousel_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $wptools_blog_carousel_fs = fs_dynamic_init( [
                'id'             => '4156',
                'slug'           => 'wp-tools-divi-blog-carousel',
                'type'           => 'plugin',
                'public_key'     => 'pk_0a2a7e7d89f1d3fa4d73e1ae70754',
                'is_premium'     => false,
                'premium_suffix' => 'Premium',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => [
                'days'               => 7,
                'is_require_payment' => false,
            ],
                'menu'           => [
                'slug'    => 'wp-tools-divi-blog-carousel',
                'support' => false,
                'parent'  => [
                'slug' => 'et_divi_options',
            ],
            ],
                'is_live'        => true,
            ] );
        }
        
        return $wptools_blog_carousel_fs;
    }
    
    // Init Freemius.
    wptools_blog_carousel_fs();
    // Signal that SDK was initiated.
    do_action( 'wptools_blog_carousel_fs_loaded' );
}
