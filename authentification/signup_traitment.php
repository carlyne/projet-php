<?php include('../partials/service.php')?>

<?php 
$request = $bdd->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");

$request->execute([
    "email" => $_POST['email'],
    "password" => $_POST['password']
]);

header("Location: ../index.php");

// $request->debugDumpParams();
?>