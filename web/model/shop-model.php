<?php

function getProducts(){
    $db = connect();
    $sql = 'SELECT invId, invName, invPrice FROM inventory';
    $stmt = $db->prepare($sql);
    //$stmt = $db->query($sql);
    $stmt->execute();
    $prodList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$stmt->closeCursor();
    return $prodList;
}