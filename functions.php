<?php
//* Code goes here

// Actions
add_action( 'init', 'child_theme_init' );
add_action( 'init', 'jk_remove_storefront_header_search' );
add_action( 'init', 'jk_remove_storefront_footer_search' );
add_action( 'init', 'storefront_custom_logo' );
add_action( 'init', 'custom_remove_footer_credit', 10 );
remove_action( 'storefront_sidebar', 'storefront_get_sidebar',	10 );

// Functions

function child_theme_init() {
	if ( is_plugin_active( 'ml-slider/ml-slider.php' ) ) {
	  add_action( 'storefront_before_content', 'woa_add_full_slider', 5 );
	} 
}

function woa_add_full_slider() { ?>
	<div id="slider">
		<?php echo do_shortcode("[metaslider id=388 percentwidth=100]"); ?>
	</div>
<?php
}

function storefront_custom_logo() {
	remove_action( 'storefront_header', 'storefront_site_branding', 20 );
	add_action( 'storefront_header', 'storefront_display_custom_logo', 20 );
}

function storefront_display_custom_logo() {
?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link" rel="home">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" />
	</a>
<?php
}

function jk_remove_storefront_header_search() {
	remove_action( 'storefront_header', 'storefront_product_search', 	40 );
}

function jk_remove_storefront_footer_search() {
	remove_action( 'storefront_footer', 'storefront_product_search', 	40 );
}

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} 

function custom_storefront_credit() {
	?>
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
	</div><!-- .site-info -->
	<?php
}