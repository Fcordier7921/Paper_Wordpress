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

function covid_tracker_admin_page(){
$curl=curl_init('https://coronavirusapi-france.now.sh/AllLiveData');
curl_setopt_array($curl, [
    CURLOPT_CAINFO=> __DIR__.DIRECTORY_SEPARATOR. 'wp-content\plugins\covid_traker\cert.cer',
    CURLOPT_RETURNTRANSFER=> true,
    CURLOPT_TIMEOUT=> 1
    ]);

$data=curl_exec($curl);
if($data===false){
    var_dump(curl_error($curl));
}else{
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE)=== 200){
        $data=json_decode($data, true);
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
}
curl_close($curl);
}