<?php
/*
Plugin Name: gestion des clients
*/
include_once("bdd.php");


// schortecode pour afficher tout les département

function shortdep()
{
    include __DIR__ . '/views/viewstabdep.php'; //essayer d'inclure la vue
    adddep();
}
function shortreg()
{
    require __DIR__ . '/views/viewstabreg.php';
    addreg();
}
function shortdepOne($atts)
{

    $dep = $atts[1];
    require __DIR__ . '/views/viewstabdep.php';
    $bdd = DBP_connet();

    $recuperation = $bdd->prepare("SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker` WHERE nom LIKE '$dep' ");
    $recuperation->execute();
    $datab = $recuperation->fetch();
    
    echo "<tr><td>" . $datab['nom'] . "</td>
                    <td>" . $datab['hospitalises'] . "</td>
                    <td>" . $datab['reanimation'] . "</td>
                    <td>" . $datab['nouvellesHospitalisations'] . "</td>
                    <td>" . $datab['nouvellesReanimations'] . "</td>
                    <td>" . $datab['deces'] . "</td>
                    <td>" . $datab['gueris'] . "</td>";
}
function shortregOne($atts)
{
    $reg = $atts[1];

    require __DIR__ . '/views/viewstabreg.php';
    $bdd = DBP_connet();
    $recuperation2 = $bdd->prepare("SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker` WHERE nom LIKE '$reg' ");
    $recuperation2->execute();
    $datab2 = $recuperation2->fetch();

    echo "<tr><td>" . $datab2['nom'] . "</td>
        <td>" . $datab2['hospitalises'] . "</td>
        <td>" . $datab2['reanimation'] . "</td>
        <td>" . $datab2['nouvellesHospitalisations'] . "</td>
        <td>" . $datab2['nouvellesReanimations'] . "</td>
        <td>" . $datab2['deces'] . "</td>
        <td>" . $datab2['gueris'] . "</td>";
}
function shortdisplay()
{
    if (isset($_GET['q']) && !empty($_GET['q']) ) {
        $q=$_GET['q'];
        $s=explode(" ",$q);
        echo 'statistique du covid pour : '.$q.'';
        include __DIR__ . '/views/viewstabSearch.php'; //essayer d'inclure la vue
        $bdd = DBP_connet();
        $REQUEST="SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker`";
        foreach($s as $mot){
            if(strlen($mot)>2){
                if($i==0){
                    $REQUEST.=" WHERE ";
                }else{
                    $REQUEST.=" WHERE ";
                }
                $REQUEST.="nom LIKE '%$mot%' OR hospitalises LIKE '%$mot%' OR reanimation LIKE '%$mot%' OR nouvellesHospitalisations LIKE '%$mot%' OR nouvellesReanimations LIKE '%$mot%' OR deces LIKE '%$mot%' OR gueris LIKE '%$mot%'";
                $i++;
            }
        }   
        $recuperation3 = $bdd->prepare($REQUEST);
        $i=0;
        
        
    $recuperation3->execute();
    

    
        while ($datab3 = $recuperation3->fetch())
        {
            echo "<tr><td>" . $datab3['nom'] . "</td>
        <td>" . $datab3['hospitalises'] . "</td>
        <td>" . $datab3['reanimation'] . "</td>
        <td>" . $datab3['nouvellesHospitalisations'] . "</td>
        <td>" . $datab3['nouvellesReanimations'] . "</td>
        <td>" . $datab3['deces'] . "</td>
        <td>" . $datab3['gueris'] . "</td>";
        }
        echo'</tbody>
            </table>
            </div>';
        
    }else{
        echo 'Veuillez remplire le champ';
        include __DIR__ . '/views/viewstabSearch.php'; //essayer d'inclure la vue
        adddep();
        

    }
}

function gest()
{
    add_shortcode('departments', 'shortdep'); //ajout du schortecode 
    add_shortcode('regions', 'shortreg');
    add_shortcode('department', 'shortdepOne');
    add_shortcode('region', 'shortregOne');
    add_shortcode('displayWidthSearchBar', 'shortdisplay');
}
add_action('init', 'gest');





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
