<?php include('../partials/service.php')?>

<?php 

$thisUserEmail = $_POST['email'];

// Add User
$queryInsertUser = $bdd->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
$queryInsertUser->execute([
    "email" => $thisUserEmail,
    "password" => $_POST['password']
]);

// Add Profil User
$querySelectUserId = $bdd->query("SELECT * FROM user WHERE email = '$thisUserEmail'");
$user = $querySelectUserId->fetch(PDO::FETCH_ASSOC);
$userId = (int) $user['id'];

$bdd->query("INSERT INTO profil (user_id) VALUES($userId)");

// Back to Homepage
header("Location: ../index.php");

?>  