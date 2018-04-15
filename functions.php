<?php
//* Code goes here

// Actions

add_action( 'init', 'jk_remove_storefront_header_search' );
add_action( 'init', 'storefront_custom_logo' );
add_action( 'init', 'custom_remove_footer_credit', 10 );
add_action( 'init', 'remove_header_cart' );
add_action( 'storefront_header', 'jk_storefront_header_content', 40 );
remove_action( 'storefront_sidebar', 'storefront_get_sidebar',	10 );

// Functions

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

function remove_header_cart() {

	remove_action( 'storefront_header', 'storefront_header_cart', 60 );

}

function jk_storefront_header_content() { ?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<?php
}