<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Compara_inmuebles
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function compara_inmuebles_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'compara_inmuebles_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function compara_inmuebles_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'compara_inmuebles_pingback_header' );

/**
 * Verify if inmuebles page exists
 */
function ci_validate_page_for_slug( $page_slug ) {

	$page = get_page_by_path( $page_slug, OBJECT );

	if( isset( $page ) ) {
		return true;
	}
	else {
		return false;
	}

}