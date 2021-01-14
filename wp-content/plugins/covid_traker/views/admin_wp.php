<?php
require_once plugin_dir_path(__DIR__) . 'covid_traker.php';
// require_once __DIR__ . '/configsortcode.php';
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
    <p>apres avoir choisie la fonction dans la liste déroulante ci dessous
    veuillez copier le résulta dans votre page et cela généra automatiquement 
    un tableau de statistique. </p>
    <p>pour certain shortcodes il est naicésoire de ragouter une précision, comme le not du département ou le non dela région.</p>
    <br>
    <br>
    <form>
  <label for="cars">Choisire la fonction désirer du shortcodes :</label><br>
  <select name="shortcodes" id="shortcodes">
    <option name="department" value="department">Pour afficher un département choisi</option>
    <option name="region" value="region">Pour afficher un région choisie</option>
    <option name="departments" value="departments">Pour afficher tous les départements</option>
    <option name="regions" value="regions">Pour afficher toutes les régions</option>
    <option name="displayWidthSearchBar" value="displayWidthSearchBar">Pour afficher soit tous les départements, soit toutes les régions en fonction du choix de l'utilisateur, le tout avec un moteur de recherche</option>
  </select>
  <br><br>
  <input type="submit" value="générer">
</form>
<?php
    
?>
</div>
<?php
require __DIR__ . '/viewstab.php';
require_once 'footer.php';
?>