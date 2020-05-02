<?php include('../partials/service.php')?>

<?php 

$thisUserEmail = $_POST['email'];

// Insert new user
$queryInsertUser = $bdd->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
$queryInsertUser->execute([
    "email" => $thisUserEmail,
    "password" => $_POST['password']
]);

// Insert new user's profil
$querySelectUserId = $bdd->query("SELECT * FROM user WHERE email = '$thisUserEmail'");
$user = $querySelectUserId->fetch(PDO::FETCH_ASSOC);
$userId = (int) $user['id'];

$bdd->query("INSERT INTO profil (user_id) VALUES($userId)");

// Bind profil to user
$requestProfilId = "SELECT * FROM profil WHERE user_id=$userId";
$getProfilId = $bdd->query($requestProfilId);
$profilId = $getProfilId->fetch(PDO::FETCH_ASSOC);

$queryInsertUserProfil = $bdd->prepare("UPDATE user SET profil = :profil WHERE id = :id");
$queryInsertUserProfil->execute([
    "profil" => $profilId['id'],
    "id" => $userId 
]);

// Back to Homepage
header("Location: ../index.php");

?>  