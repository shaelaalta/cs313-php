<?php

/***************************************************
 * builds product display list of certain category
 ***************************************************/
/*function buildProductsDisplay($products)
{
    $pd = '<div id="group">';
    foreach ($products as $product) {
        $pd .= '<div id="item">';
        $pd .= "<a href='/shop/index.php?action=showItem&invId=$product[invid]'>";     
        $pd .= "<img src='$product[invimg]' alt='Image of $product[invname]'></a>";
        $pd .= '<hr>';
        $pd .= "<h2>$product[invname]</h2>";
        $pd .= "<span>$$product[invprice]</span>";
        $pd .= '</div>';
    }
    $pd .= '</div>';
    return $pd;
}*/

function partyTime(){
    $pd = "there's a party going on right here... a celebration we have but once a year";
    return $pd;
}