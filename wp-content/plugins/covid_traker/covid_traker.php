<?php
/**
 * Plugin Name: covid traker
 * Description: can centralize the statistics of covid contamination.
 *Version: 1.0.0
 */
defined('ABSPATH') or die('rien à avoir');

include_once("bdd.php");

register_activation_hook(__FILE__, "DBP_tb_create");

add_filter( 'rest_authentication_errors', function( $result ) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }
 
    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }
 
    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});
