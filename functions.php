<?php 
function doRequest($bdd, $request) {
    $response = $bdd->query($request);
    return $response->fetchAll(PDO::FETCH_ASSOC);
}

function doSingleRequest($bdd, $request) {
    $response = $bdd->query($request);
    return $response->fetch(PDO::FETCH_ASSOC);
}

function isArchived($element) {
    if ($element == 1) {
        return true;
    } else {
        return false;
    }
}
?>