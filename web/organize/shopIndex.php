<?php
/* shop organizer*/
session_start();

if(!isset($_SESSION['cart'])){
   $_SESSION['cart'] = array();
}

if(!isset($_SESSION['count'])){
    $_SESSION['count'] = 0;
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'straight':
        $imagePlace = "/images/straightGym.jpg";
        $invName = "Straight Gym";
        $invDesc = "This baby gym with it's straight lines give it a modern, clean feel that will add to the feel of your home with it's warm wood texture.";
        $invPrice = "57.45";
        include '../view/prodpage.php';
        break;
    
    case 'curve':
        $imagePlace = "/images/curveGym.jpg";
        $invName = "Curved Gym";
        $invDesc = "This baby gym with it's curves gives it a sleek, modern look that will add to your home with it's warm wood texture.";
        $invPrice = "63.23";
        include '../view/prodpage.php';
        break;
        
    case 'addCart':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDesc = filter_input(INPUT_POST, 'invDesc', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_STRING);
        $invImg = filter_input(INPUT_POST, 'invImg', FILTER_SANITIZE_STRING);
        $itemArray = array();
        
        array_push($itemArray.$invImg);
        array_push($itemArray.$invName);
        array_push($itemArray.$invDesc);
        array_push($itemArray.$invPrice);
        
        array_push($_SESSION['cart'].$itemArray);
        $_SESSION['count']++;
        header("location: /organize/shopIndex?action=viewCart");
        break;
        
    case 'viewCart':
        $list = $_SESSION['cart'];
        include '../view/cart.php';
        break;
        
    default:
        include '../dot.php';
}