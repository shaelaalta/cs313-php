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
        
        <header>
            <img id=logo src="/images/dotLogo.jpg">
            <nav class="cNav" id="myNav">
            <ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                <li><a href="../hello.php">Home</a></li>
                <li><a href="/view/shop.php">Shop</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
          </nav>
        </header>
        
        <main id="product">
            <?php 
                $prod = "<img src='$imagePlace'><h1>$invName</h1><p>$invDesc</p><span>$invPrice</span>";
                echo $prod;
            ?>
            
            <form id="addCart" action="/organize/shop.php" method="post">
                <button type="submit" name="action" value="addCart">Add to Cart</button>
                <input type="hidden" name="invName" <?php echo "value='$invName'"; ?>>
                <input type="hidden" name="invDesc" <?php echo "value='$invDesc'"; ?>>
                <input type="hidden" name="invPrice" <?php echo "value='$invPrice'"; ?>>
                <input type="hidden" name="invImg" <?php echo "value='$imagePlace'"; ?>>
            </form>
        </main>
        
    </body>
</html>