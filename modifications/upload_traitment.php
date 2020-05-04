<?php include('../partials/service.php')?>

<?php 

$thisUserId = $_SESSION['user']['id'];

// Get file's informations
$imageUser = $_FILES['image'];
$fileSize = $imageUser['size'];

var_dump($fileSize);

// Access files's detail (extension, name, type,...)
$pathinfoData = pathinfo($imageUser['name']);

// Rename file for unique name
$fileName = $pathinfoData['filename'];
$fileExtension = $pathinfoData['extension'];
$newFileName = $fileName . '-' . uniqid() . '.' . $fileExtension;

// Move file to store diretory
move_uploaded_file($imageUser['tmp_name'], __DIR__ . '../../assets/' . $newFileName);

// Add file's name to BDD 
$requestUpdateProfilImg = "UPDATE profil SET profil_image = '$newFileName' WHERE user_id = $thisUserId";
$bdd->query($requestUpdateProfilImg);

// Back to profil page
header("Location: ../profil_page.php");
?>