<?php session_start();?>
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
    <link href="/css/prod.css" type="text/css" rel="stylesheet"/>
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
        
        <main id="product">
            <?php
            $prod = "<img src='$products[invimg]'><h1>$products[invname]</h1><p>$products[invdesc]</p><span>$$products[invprice]</span>";
            echo $prod;
            ?>
            
            <form id="addCart" action="/shop/shopIndex.php" method="post">
                <button type="submit" name="action" value="addCart">Add to Cart</button>
                <input type="hidden" name="invName" <?php echo "value='$products[invname]'"; ?> >
                <input type="hidden" name="invDesc" 
                       <?php 
                       $str = addslashes($products[invdesc]);
                       echo "value='$str'"; ?> >
                <input type="hidden" name="invPrice" <?php echo "value='$products[invprice]'"; ?> >
                <input type="hidden" name="invImg" <?php echo "value='$products[invimg]'"; ?> >
            </form>

        </main>
        
    </body>
</html>