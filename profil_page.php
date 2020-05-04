<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>
<?php include('functions.php')?>

<?php 


    if( isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['profil']) {
        // redirect to profil page view
        header("Location: profil_view_page.php?id=" . $_GET['id']);
        
    } else {

        if($isUserConnected === true) {
        // Get user's profil
        $requestUserProfil = "SELECT * FROM profil WHERE id = $profilId";
        $userProfil = doSingleRequest($bdd, $requestUserProfil);

        // Get user's competences
        $requestUserCompetences = "SELECT * FROM competence_profil LEFT JOIN competence_list ON competence_profil.competence_id = competence_list.id WHERE profil_id = $profilId";
        $competences = doRequest($bdd, $requestUserCompetences);

        // Get user's profil image
        $profilImage = $userProfil['profil_image'];

        //Get user's objectifs
        $requestUserObjectifs = "SELECT * FROM objectif WHERE profil_id = $profilId";
        $objectifs = doRequest($bdd, $requestUserObjectifs);

        }
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

                <?php foreach($competences as $competence) :?>
                    <ul>
                        <li>
                            <strong><?= $competence['name'] ?> :</strong> <?= $competence['content'] ?>
                        </li>
                        <li>State : <?= $competence['state_evol'] ?> %</li>
                        <li>
                            <button class="profil-button"><a href="modifications/delete_traitment.php?competence=<?= $competence['competence_id'] ?>">Delete</a></button>
                            <button class="profil-button"><a href="modifications/edit_competence.php?competence=<?= $competence['competence_id'] ?>">Edit</a></button>
                        </li>
                    </ul>
                <?php endforeach;?>
            </section>
            

            <!-- Affichage du pseudo + image -->
            <section class="character">
                <h1>Pseudo : <?= $userProfil['pseudo'] ?> </h1>

                <?php if(empty($profilImage)) : ?>
                    <img src="assets/man-default-avatar.png" alt="" width="100%" height="auto">
                <?php else : ?>
                    <img src="assets/<?= $profilImage ?>" alt="" width="100%" height="auto">
                <?php endif; ?>
            </section>

            
            <!-- gestion des objectifs -->
            <section class="objectifs">
                <h2>Objectifs</h2>
                
                <?php foreach($objectifs as $objectif) :?>
                    <ul>
                        <li <?php if(isArchived($objectif['archived'])) :?> class="archived" <?php endif;?>>
                            <strong><?= $objectif['name'] ?> :</strong> <?= $objectif['content'] ?>
                        </li>

                        <li>
                            <button class="profil-button disabled <?php if(isArchived($objectif['archived'])) :?> hidden <?php endif;?>">
                                <a href="modifications/archive_traitment.php">Archive</a>
                            </button>
                        </li>
                    </ul>
                <?php endforeach;?>
            </section>
            
        </div>
        
        <div>
            <button><a href="modifications/add_competence.php">Ajouter une compétence</a></button>
            <button><a href="modifications/upload.php">Modifier l'image</a></button>
        </div>


    </main>

    



    
</body>
</html>