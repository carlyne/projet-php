<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gamelife;charset=utf8;port=3306', 'root', 'root');

$request = $bdd->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");

$request->execute([
    "email" => $_POST['email'],
    "password" => $_POST['password']
]);

header("Location: ../index.html");

// $request->debugDumpParams();
?>