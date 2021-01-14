<?php
require_once plugin_dir_path(__DIR__) . 'covid_traker.php';
// require_once __DIR__ . '/configsortcode.php';
require_once 'header.php';
?>

<div class="container">
    <h1 style="text-align: center;">Bienvenue sur le Plugin Covid Tracker</h1>
    <div class="row">
        <form method="post">
            <p style="margin-left:1rem; font-family: aral; font-size: 1rem;">Mettre a jour les données statistique du COVID: clique <button class="btn primary-btn" type="submit" name="action" value="maj" style="font-family: aral; margin-bottom: 0.2rem; font-style: italic; color: blue;">Ici</button></p>
        </form>
    </div>
<?php covid_tracker_upgread()?>
</div>
<?php
// require __DIR__ . '/viewstab.php';
require_once 'footer.php';
?>