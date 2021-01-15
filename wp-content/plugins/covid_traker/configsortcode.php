<?php
/*
Plugin Name: gestion des clients
*/
include_once("bdd.php");


// schortecode pour afficher tout les département

function shortdep(){
    $dep = include __DIR__ . '/viewstabdep.php';//essayer d'inclure la vue
    $dep =adddep();
    return $dep;
         
}

function gest_dep(){
 add_shortcode('departments', 'shortdep');}
add_action( 'init', 'gest_dep' );





// //schortecode pour afficher tout les régions
    
// add_shortcode('regions', 'shortreg');
// function shortreg(){
//     require plugin_dir_path(__DIR__) . 'viewstab.php';
//     addreg();
// }

// //schortecode pour afficher un département choisi

// add_shortcode('department', 'shortdepone');
// function shortdepone($atts){
//     require plugin_dir_path(__DIR__) . 'viewstab.php';

// }



// add_shortcode('region', 'shortregone');
