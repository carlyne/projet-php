<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>
<?php include('functions.php')?>

<?php 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $profilView = (int) $_GET['id'];

    $requestProfilView = "SELECT * FROM profil WHERE id = $profilView";
    $infosProfilView = doSingleRequest($bdd, $requestProfilView);

    $requestViewCompetences = "SELECT * FROM competence_profil INNER JOIN competence_list ON competence_profil.competence_id = competence_list.id WHERE profil_id = $profilView";
    $viewCompetences = doRequest($bdd, $requestViewCompetences);

    $requestObjectifs = "SELECT * FROM objectif WHERE profil_id = $profilView";
    $viewObjectifs = doRequest($bdd, $requestObjectifs);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="partials/style.css">
</head>
<body>

    <?php include('partials/navbar.php')?>  
    <header class="banner"></header>

    <main class="profil-page">
        <div class="card">


            <!-- Gestion des compétences -->
            <section class="competences">
                <h2>Compétences</h2>

                <?php foreach($viewCompetences as $competence) :?>
                    <ul>
                        <li>
                            <strong><?= $competence['name'] ?> :</strong> <?= $competence['content'] ?>
                        </li>
                            <li>State : <?= $competence['state_evol'] ?> %</li>
                    </ul>
                <?php endforeach;?>
            </section>
            

            <!-- Affichage du pseudo + image -->
            <section class="character">
                <h1>Pseudo : <?= $infosProfilView['pseudo'] ?> </h1>

                <?php if(empty($infosProfilView['profil_image'])) : ?>
                    <img src="assets/man-default-avatar.png" alt="" width="100%" height="auto">
                <?php else : ?>
                    <img src="assets/<?= $infosProfilView['profil_image'] ?>" alt="" width="100%" height="auto">
                <?php endif; ?>
            </section>

            
            <!-- gestion des objectifs -->
            <section class="objectifs">
                <h2>Objectifs</h2>
                
                <?php foreach($viewObjectifs as $objectif) :?>
                    <ul>
                        <li>
                            <strong><?= $objectif['name'] ?> :</strong> <?= $objectif['content'] ?>
                        </li>
                    </ul>
                <?php endforeach;?>
            </section>
            
        </div>


    </main>

    



    
</body>
</html>