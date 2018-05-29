<?php

function getProducts(){
    $db = connect();
    $sql = 'SELECT invId, invName, invPrice, invImg FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}