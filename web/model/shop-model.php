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

/*********************************************
* get all categories
**********************************************/
function getCat(){
    $db = connect();
    $sql = 'SELECT * FROM categories';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $categories;
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
function checkEmailNPass($clientE, $clientP){
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

/******************************************************
* update a product's information
*******************************************************/
function updateProduct($image, $name, $desc, $price, $id){
    $db = connect();
    $sql = 'UPDATE inventory SET invimg = :invimage, invname = :invname, invdesc = :invdesc, invprice = :invprice WHERE invid = :invid';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invimage', $image, PDO::PARAM_STR);
    $stmt->bindValue(':invname', $name, PDO::PARAM_STR);
    $stmt->bindValue(':invdesc', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':invprice', $price, PDO::PARAM_STR);
    $stmt->bindValue(':invid', $id, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

/*********************************************************
* insert product info into inventory
**********************************************************/
function addProd($image, $name, $desc, $price, $category){
    $db = connect();
    $sql = 'INSERT inventory VALUES (DEFAULT, :name, :desc, :image, :price, :catnum)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':image', $image, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':catnum', $category, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}