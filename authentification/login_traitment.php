<?php include('../partials/service.php')?>

<?php 

$thisUserEmail = $_POST['email'];

$request = "SELECT * FROM user WHERE email = '$thisUserEmail'";
$response = $bdd->query($request);
$user = $response->fetch(PDO::FETCH_ASSOC);

// check if connexion is valided
if ($_POST['password'] == $user['password']) {
    echo "vous êtes connecté";
    $_SESSION['user'] = $user;
} else {
    echo "try again";
}

header("Location: ../index.php");
?>