<?php
/*
Plugin Name: gestion des clients
*/
include_once("bdd.php");

add_shortcode('departments', 'shortdep');


function shortdep(){
    require plugin_dir_path(__DIR__) . 'viewstab.php';

}
