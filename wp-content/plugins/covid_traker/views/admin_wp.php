<?php
require_once plugin_dir_path(__DIR__) . 'covid_traker.php';
require_once plugin_dir_path(__DIR__) . 'bdd.php';
require_once 'header.php';
?>

<div class="container">
    <h1 style="text-align: center; text-decoration: underline overline #FF3028;">Bienvenue sur le Plugin Covid Tracker</h1>
    <div class="row mt-5">
        <form method="post">
            <p style="margin-left:1rem; font-family: aral; font-size: 1rem;">Mettre a jour les données statistique du COVID: clique <button class="btn primary-btn" type="submit" name="action" value="maj" style="font-family: aral; margin-bottom: 0.2rem; font-style: italic; color: blue;">Ici</button></p>
        </form>
    </div>
<?php covid_tracker_upgread()?>
</div>
<div>
    <h5>Le generateur de shortcodes :</h5>
    <p>Comment utiliser un shortcodes? </p>
    <p>Apres avoir choisi la fonction dans la liste déroulante ci dessous
    appyer sur générer et copier le résulta dans votre page et cela généra automatiquement 
    un tableau de statistique que vous avez en exemple ci-dessous. </p>
    <p>pour certain shortcodes il est naicésoire de ragouter une précision, comme le not du département ou le non dela région.</p>
    <br>
    <br>
    <form method="POST" action="/wp-admin/admin.php?page=covid_tracker_admin">
  <label for="cars">Choisire la fonction désirer du shortcodes :</label><br>
  <select  name="shortcodes" id="shortcodes">
    <option value="department dep: non du département">Pour afficher un département choisi</option>
    <option value="region rep: non de la région">Pour afficher un région choisie</option>
    <option value="departments">Pour afficher tous les départements</option>
    <option value="regions">Pour afficher toutes les régions</option>
    <option value="displayWidthSearchBar">Pour afficher soit tous les départements, soit toutes les régions en fonction du choix de l'utilisateur, le tout avec un moteur de recherche</option>
  </select>
  <br><br>
  <input type="submit" value="générer">
</form>
<div class="mt-3">
  <p>Le shortcodes a copier :</p>
    <?php
      if(isset($_POST['shortcodes']) && !empty($_POST['shortcodes']) ){
      echo '['.$_POST['shortcodes'].']';
      }  
      
    ?>
    <p class="mt-5">exemple de rendu :</p>
    <div>
        <?php
            if($_POST['shortcodes'] === "department dep: non du département"){
              require __DIR__ . '/viewstab.php';
                $bdd=DBP_connet();
                $recuperation = $bdd->prepare("SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker` WHERE nom LIKE 'Ain' ");
                $recuperation->execute();
                $datab = $recuperation->fetch();
          
                    echo "<tr><td>".$datab['nom']."</td>
                    <td>".$datab['hospitalises']."</td>
                    <td>".$datab['reanimation']."</td>
                    <td>".$datab['nouvellesHospitalisations']."</td>
                    <td>".$datab['nouvellesReanimations']."</td>
                    <td>".$datab['deces']."</td>
                    <td>".$datab['gueris']."</td>"; 

            } elseif ($_POST['shortcodes'] === "region rep: non de la région") {
                require __DIR__ . '/viewstab.php';
                $bdd=DBP_connet();
                $recuperation2 = $bdd->prepare("SELECT `nom`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris` FROM `apttwp_covidtraker` WHERE nom LIKE 'Corse' ");
                $recuperation2->execute();
                $datab2 = $recuperation2->fetch();
          
                    echo "<tr><td>".$datab2['nom']."</td>
                    <td>".$datab2['hospitalises']."</td>
                    <td>".$datab2['reanimation']."</td>
                    <td>".$datab2['nouvellesHospitalisations']."</td>
                    <td>".$datab2['nouvellesReanimations']."</td>
                    <td>".$datab2['deces']."</td>
                    <td>".$datab2['gueris']."</td>"; 

            } elseif ($_POST['shortcodes'] === "departments"){
              require __DIR__ . '/viewstab.php';
              adddep(); 
            } elseif ($_POST['shortcodes'] === "regions"){
              require __DIR__ . '/viewstab.php';
              addreg(); 
            } elseif ($_POST['shortcodes'] === "displayWidthSearchBar"){
              
              echo 'en cour de développement';
            }
            
        ?>
    </div>
</div>
</div>
<?php

require_once 'footer.php';
?>