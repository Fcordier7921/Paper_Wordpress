<?php
function DBP_tb_create(){
    global $wpdb;
    
    $charset_collate = $wpdb->get_charset_collate();

    //step1
    $DBP_tb_name=$wpdb->prefix ."covidtraker";

    //step2
    $DBP_query="CREATE TABLE $DBP_tb_name (
        id int(9) NOT NULL AUTO_INCREMENT,
        code varchar(30) DEFAULT NULL,
        nom varchar(130) DEFAULT NULL,
        hospitalises int(30) DEFAULT NULL,
        reanimation int(30) DEFAULT NULL,
        nouvellesHospitalisations int(30) DEFAULT NULL,
        nouvellesReanimations int(30) DEFAULT NULL,
        deces int(30) DEFAULT NULL,
        gueris int(30) DEFAULT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($DBP_query);
}