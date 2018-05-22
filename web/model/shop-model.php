<?php

function getProducts(){
    $db = connection();
    $sql = 'SELECT invId, invName, invPrice FROM inventory ORDER BY invName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $prodList = $stmt->fetchAll();
    $stmt->closeCursor();
    return $prodList;
}