<div class="contenair-fluid">

    <form action="" method="get">
        <input type="text" name="q" />
        <input type="submit" value="cherche" />
    </form>
    <form method="GET" action="" class="mt-5">
        <label for="cars">Choisir la région ou le département :</label><br>
        <select name="shortcodes" id="shortcodes">
            <?php
            require_once plugin_dir_path(__DIR__) . 'bdd.php';
            $bdd = DBP_connet();
            var_dump($bdd);
            $recuperation = $bdd->prepare("SELECT `nom` FROM `apttwp_covidtraker`");
            $recuperation->execute();
            $datab = $recuperation->fetchAll();
            var_dump($datab);
            
                for($i=0; $i<=count($datab); $i++){
            echo '<option value="'.$datab[$i]['nom'].'">'.$datab[$i]['nom'].'</option>';
                }
            ?>  
        </select>
        <input type="submit" value="générer"/>
    </form>
</div>

<div class="mt-3">
    <table class="table table-bordered " style="margin-left: 1rem; width:98%;">
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