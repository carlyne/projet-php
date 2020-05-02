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
        <h1>Connectez-vous ! </h1>
        <form action="login_traitment.php" method="POST">
            <div>
                <input type="email" name="email" id="email" placeholder="votre email">
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="votre mot de passe">
            </div>
            <input class="button" type="submit">
        </form>
    </main>
</body>
</html>