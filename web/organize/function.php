***************************************************
 * builds product display list of certain category
 ***************************************************/
function buildProductsDisplay($products)
{
    $pd = '<div id="group">';
    foreach ($products as $product) {
        $pd .= '<div id="item">';
        $pd .= "<a href='/shop/index.php?action=showItem&invId=$product[invId]'>";     
        $pd .= "<img src='$product[invImage]' alt='Image of $product[invName]'></a>";
        $pd .= '<hr>';
        $pd .= "<h2>$product[invName]</h2>";
        $pd .= "<span>$$product[invPrice]</span>";
        $pd .= '</div>';
    }
    $pd .= '</div>';
    return $pd;
}