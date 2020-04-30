<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gamelife;charset=utf8;port=3306', 'root', 'root');
$response = $bdd->query("SELECT * FROM user");
$users = $response->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game in Life</title>
</head>
<body>
    <h1>Inscrivez-vous ! </h1>
    <h2>Pour tenir à jour votre profil au quotidien</h2>

    <form action="signup_traitment.php" method="POST">
        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="votre email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="votre mot de passe">
        </div>
        <input type="submit">
    </form>
</body>
</html>