<?php
/**
 * Plugin Name: covid traker
 * Description: can centralize the statistics of covid contamination.
 *Version: 1.0.0
 */
include_once("bdd.php");

defined('ABSPATH') or die('rien à avoir');


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

//Ajout de lien de notre plugin dans le menu latéral
add_action( 'admin_menu', 'pluginLink' );

function pluginLink()
{
add_menu_page(
'Covid Tracker - Admin', //Titre de la page
'Covid Tracker', //Lien devant être affiché dans la barre latérale
'manage_options', //Obligatoire pour que ca fonctionne
'covid_tracker_admin', //Le Slug
'covid_tracker_admin_page'//Le callBack
);
}

//Maintenant génération de l'intérieur de la page admin quand le slug est appelé
function covid_tracker_admin_page(){
    require_once("views/admin_wp.php");
    }

