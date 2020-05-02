<?php include('../partials/service.php')?>
<?php include('../index_traitment.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="../partials/style.css">
    
</head>
<body>
    <?php include('../partials/navbar.php')?> 

    <main>
        <h1>Modifier l'image </h1>

        <form class="creation" action="upload_traitment.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="image">Ajoutez voter fichier</label>
                <input type="file" name="image" id="image">
            </div>
            <input class="button" type="submit">
        </form>
    </main>
    
</body>
</html> 