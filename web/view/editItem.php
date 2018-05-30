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
            <form id="updatePord" action="/shop/shopIndex.php" method="post">
                <label for="image">Current image location: <?php echo $products[invimg]; ?></label>
                <input type="text" name="image" id="image" <?php echo "value='$products[invimg]'"; ?> >
                <label for="name">Current name: <?php echo $products[invname]; ?></label>
                <input type="text" name="name" id="name" <?php echo "value='$products[invname]'"; ?> >
                <label for="desc">Current description: <?php echo $products[invdesc]; ?></label>
                <input type="text" name="desc" id="desc" <?php echo "value='$products[invdesc]'"; ?> >
                <label for="price">Current Price: <?php echo $products[invprice]; ?></label>
                <input type="number" step="0.01" min="0" name="price" id="price" <?php echo "value='$products[invprice]'"; ?> >
                <input type="hidden" name="id" <?php echo "value='$products[invid]'"; ?> >
                <button type="submit" name="action" value="changeProd">Submit Changes</button>
            </form>
        </main>
        
    </body>
</html>