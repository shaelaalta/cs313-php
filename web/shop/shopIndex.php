<?php
/* shop organizer*/
session_start();

//require_once '../organize/connection.php';
//$path = $_SERVER['DOCUMENT_ROOT'] . '/organize/function.php';
//require_once($path);
//require_once '../../model/shop-model.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/model/shop-model.php';

if(!isset($_SESSION['cart'])){
   $_SESSION['cart'] = array();
}

if(!isset($_SESSION['count'])){
    $_SESSION['count'] = 0;
}

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = array();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'showItem':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        include '../view/prodPage.php';
        break;
        
    case 'addCart':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        
        if(!empty($_SESSION['cart'])){
            $length = count($_SESSION['cart']);
            for ($i = 0; $i < $length; $i++){
                if($_SESSION['cart'][$i][1] == $invName){
                    $_SESSION['cart'][$i][3]++;
                    $_SESSION['count']++;
                    header("location: shopIndex.php?action=viewCart");
                    break 2;
                }
                else
                    continue;
            }
        }
        
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_STRING);
        $invImg = filter_input(INPUT_POST, 'invImg', FILTER_SANITIZE_STRING);
        $amountAdd = 1;
        $itemArray = array($invImg, $invName, $invPrice, $amountAdd);
        
        array_push($_SESSION['cart'],$itemArray);
        
        $_SESSION['count']++;
        header("location: shopIndex.php?action=viewCart");
        break;
        
    case 'viewCart':
        if($_SESSION['count'] == 0){
            include '../dot.php';
        }
        else {
            $list = $_SESSION['cart'];
            include '../view/cart.php';
        }
        break;
    
    case 'remove':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $list = $_SESSION['cart'];
        $length = count($_SESSION['cart']);
        $remAmount = 0;
        $finAmount = $_SESSION['count'];
        
        foreach($list as $lists){
            if($lists[1] == $invName)
            {
                $remAmount = $lists[3];
                break;
            }
            else
                continue;
        }
        $_SESSION['count'] = $finAmount - $remAmount;
        /*for ($i = 0; $i < $length; $i++){
                if($_SESSION['cart'][$i][1] == $invName){
                    $_SESSION['count'] -= $_SESSION['cart'][$i][3];
                    break;
                }
        }*/
        
        $key = array_search($invName, $_SESSION['cart']);
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        
        header("location: shopIndex.php?action=viewCart");
        break;
        
    case 'openCheckout':
        include '../view/checkout.php';
        break;
        
    case 'keepShop':
        //$prodList = getProducts();
        //$prodDisplay = buildProductsDisplay($prodList);
        //$prodDisplay = getProducts();
        //$prodDisplay = partyTime();
        include '../view/shop.php';
        break;
        
    case 'checkout':
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        
        if(empty($clientFirstname) || empty($clientLastname) || 
                empty($clientEmail) || empty($address)){
            $message = "<p class='notice'>Please provide information for all empty form fields.</p>";
            include '../view/checkout.php';
                exit; 
        }
        
        array_push($_SESSION['user'], $clientFirstname);
        array_push($_SESSION['user'], $clientLastname);
        array_push($_SESSION['user'], $clientEmail);
        array_push($_SESSION['user'], $address);
        header("location: shopIndex.php?action=confirm");
        break;
        
    case 'confirm':
        $list = $_SESSION['cart'];
        $useri = $_SESSION['user'];
        include '../view/confirm.php';
        break;
        
    case 'cancel':
        session_unset();
        session_destroy();
        header("location: /dot.php");
        break;
        
    case 'adminLogin':
        $clientE = filter_input(INPUT_POST, 'clientE', FILTER_SANITIZE_EMAIL);
        $clientP = filter_input(INPUT_POST, 'clientP', FILTER_SANITIZE_STRING);
        if(empty($clientE) || empty($clientP)){
            $message = "<p class='notice'>Please provide ALL information</p>";
            include '../view/admin.php';
            break;
        }
        include '../view/prodMgmt.php';
        break;
    
    case 'editItem':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        include '../view/editItem.php';
        break;
        
    default:
        include '../dot.php';
}