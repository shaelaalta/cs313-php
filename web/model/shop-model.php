<?php

function getProducts(){
    $db = connect();
    $sql = 'SELECT invId, invName, invPrice FROM inventory ORDER BY invName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $prodList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $prodList;
}