<?php

try
{
    $bdd = new PDO('sqlite:../data/router.db');
    
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $bdd->prepare('SELECT * FROM USER');
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
catch (PDOException $e)
{
    http_response_code(500); //has to be first output instruction
    echo 'Erreur : ' . $e->getMessage();
}

?>