<?php

/*********************************************
* gets all the products
*********************************************/
function getProducts(){
    $db = connect();
    $sql = 'SELECT invId, invName, invPrice, invImg FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

/***********************************************
* gets one product with the invID
************************************************/
function getUnoProduct($invId){
    $db = connect();
    $sql = 'SELECT * FROM inventory WHERE invid = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetch(PDO::FETCH_ASSOC);
    return $products;
}

/******************************************************
* checks emails and password when administrator logs in
********************************************************/
checkEmailNPass($clientE, $clientP){
    $db = connect();
    $check = 'SELECT clientemail, clientpass FROM client WHERE clientemail = :email';
    $getIt = $db->prepare($check);
    $getIt->bindValue(':email', $clientE, PDO::PARAM_STR);
    $getIt->execute();
    $matchEmail = $getIt->fetch(PDO::FETCH_ASSOC);
    $getIt->closeCursor();
    if(empty($matchEmail)){
        return 0;
    }
    else if($matchEmail[clientpass] != $clientP){
        return 0;
    }
    return 1;
}