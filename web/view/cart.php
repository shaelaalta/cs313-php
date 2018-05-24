<!DOCTYPE html>
<html lang ="en">
  <head>
    <title>Dott | Baby and Toddler Store</title>
    <meta charset="utf-8"/>
    <meta name="description" content="baby and toddler toys">
    <meta name="keywords" content="toddler, baby, infant, toys, baby toys">
    <meta name="author" content="Shaela Sutton">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/home.css" type="text/css" rel="stylesheet"/>
    <link href="/css/cart.css" type="text/css" rel="stylesheet"/>
</head>
    <body>
        
        <script>
          function myFunction() {
              var x = document.getElementById("myNav");
              if (x.className === "cNav") {
                  x.className += "shrinkIt";
              }
              else {
                  x.className = "cNav";
              }
          }
      </script>
        
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
        
        <main id="cart">
            <?php
            $pd = '<div id="cart">';
                foreach($list as $lists){
                    $pd .= '<div id="item">';
                    $pd .= "<img src=" . $lists[0] . ">";
                    $pd .= "<h2>$lists[1]</h2><span>$$lists[2]</span><br><span>Amount: $lists[3]</span>";
                    $pd .= "<form id='remCart' action='/shop/shopIndex.php' method='post'><button type='submit' name='action' value='remove'>Remove From Cart</button><input type='hidden' name='invName' value='" .$lists[1] ."'>";
                    $pd .= "<hr></div>";
                }
            $pd .="</div>";
            echo $pd;
            ?>
            
            <form id="wantCheckout" action="/shop/shopIndex.php" method="post">
                <button id="checkoutButton" type="submit" name="action" value="openCheckout">Checkout</button>
                <button id="checkoutButton" type="submit" name="action" value="keepShop">Continue Shopping</button>
            </form>
        </main>

    </body>
</html>