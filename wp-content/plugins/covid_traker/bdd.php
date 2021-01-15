<?php
function DBP_connet() //fonction de connextion à la base
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=wordpress;', 'root', '');
            return $bdd;
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        
    }

function DBP_tb_create(){//création de la base de donné
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



function covid_tracker_upgread()
{
    $DBP=DBP_connet();
    
    
    
    if(isset($_POST['action']) )
    {
        $idsecelt=$DBP->prepare("DELETE FROM `apttwp_covidtraker` ");
        $idsecelt->execute();
        $zero=$DBP->prepare("ALTER TABLE `apttwp_covidtraker` AUTO_INCREMENT=0 ");
        $zero->execute();
    
        $curl=curl_init('https://coronavirusapi-france.now.sh/AllLiveData');//INITIALISER l'appelle a la base de donné
        curl_setopt_array($curl, [//définier les info et le sectifica de sécurité
            CURLOPT_CAINFO=> __DIR__.DIRECTORY_SEPARATOR. 'cert.cer',
            CURLOPT_RETURNTRANSFER=> true,
            CURLOPT_TIMEOUT=> 2
            ]);
        
        $data=curl_exec($curl);//exeution du curl et ca
        if($data===false)
        {
            var_dump(curl_error($curl));
        }
        else
        {
            if(curl_getinfo($curl, CURLINFO_HTTP_CODE)=== 200)
            {
                $data=json_decode($data, true);
                $dataTable=$data["allLiveFranceData"];
                
                for($i=0; $i<=count($dataTable); $i++)
                {
                   
                   
                    $upgrader=$DBP->prepare('INSERT INTO `apttwp_covidtraker` ( `code`, `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris`) VALUES ("'.$dataTable[$i]["code"].'","'.$dataTable[$i]["nom"].'","'.$dataTable[$i]["hospitalises"].'","'.$dataTable[$i]["reanimation"].'","'.$dataTable[$i]["nouvellesHospitalisations"].'","'.$dataTable[$i]["nouvellesReanimations"].'","'.$dataTable[$i]["deces"].'","'.$dataTable[$i]["gueris"].'")');
                    $upgrader->execute();
                }

            }
        }
            
        curl_close($curl);
    }
}
//afichage d'un tableau globale departement + région
function addSat(){
    $bdd=DBP_connet();
        $recuperation = $bdd->prepare('SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker`');
        $recuperation->execute();

         while ($datab = $recuperation->fetch())
        {
            echo "<tr><td>".$datab['nom']."</td>
            <td>".$datab['hospitalises']."</td>
            <td>".$datab['reanimation']."</td>
            <td>".$datab['nouvellesHospitalisations']."</td>
            <td>".$datab['nouvellesReanimations']."</td>
            <td>".$datab['deces']."</td>
            <td>".$datab['gueris']."</td>            ";
        }
        echo'</tbody>
            </table>
            </div>';
}

//afficher tout  département
function adddep(){
    $bdd=DBP_connet();
        $recuperation = $bdd->prepare("SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker` WHERE code LIKE '%DEP%' ");
        $recuperation->execute();

         while ($datab = $recuperation->fetch())
        {
            echo "<tr><td>".$datab['nom']."</td>
            <td>".$datab['hospitalises']."</td>
            <td>".$datab['reanimation']."</td>
            <td>".$datab['nouvellesHospitalisations']."</td>
            <td>".$datab['nouvellesReanimations']."</td>
            <td>".$datab['deces']."</td>
            <td>".$datab['gueris']."</td>";
        }
        echo'</tbody>
            </table>
            </div>';
}

//afficher toutes le région
function addreg(){
    $bdd=DBP_connet();
        $recuperation = $bdd->prepare("SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker` WHERE code LIKE '%REG%' ");
        $recuperation->execute();

         while ($datab = $recuperation->fetch()) 
        {
            echo "<tr><td>".$datab['nom']."</td>
            <td>".$datab['hospitalises']."</td>
            <td>".$datab['reanimation']."</td>
            <td>".$datab['nouvellesHospitalisations']."</td>
            <td>".$datab['nouvellesReanimations']."</td>
            <td>".$datab['deces']."</td>
            <td>".$datab['gueris']."</td>";
        }
        echo'</tbody>
            </table>
            </div>';
}
