<?php
require_once plugin_dir_path(__DIR__) . 'covid_traker.php';
require_once 'header.php';
?>

<div class="container">
    <h1 style="text-align: center;">Bienvenue sur le Plugin Covid Tracker</h1>
    <div class="row">
        <form method="post">
            <button class="btn primary-btn" type="submit" name="action" value="maj" style="margin-left:12rem;">Mettre à
                jour la base de donnée</button>
        </form>
    </div>

</div>
<div class="mt-5">
    <table class="table table-bordered " style="margin-left: 13rem; width:80%;">
        <thead class="table-info table-sm">
            <tr>
                <th scope="col" style="width:15%">nom du départment ou de la région</th>
                <th scope="col" style="width:8%">personne hospitalises</th>
                <th scope="col" style="width:8%">personne réanimation</th>
                <th scope="col" style="width:10%">les nouvelles Hospitalisations </th>
                <th scope="col" style="width:8%">Les Reanimations</th>
                <th scope="col" style="width:5%">Les deces</th>
                <th scope="col" style="width:10%">Les personne qui sont gueris</th>
            </tr>
        </thead>
        <tbody>
        <?php addSat(); ?>
        </tbody>
    </table>

</div>
<?php
require_once 'footer.php';
?>