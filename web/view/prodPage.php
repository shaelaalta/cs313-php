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
            $dbUrl = getenv('DATABASE_URL');

            if (empty($dbUrl)) {
                $dbUrl = "postgres://aaxshfcnahrbwi:ff8800c7b186b1134b1b5059e5306d47926abf3599e6fba861d9a10555cc0ecc@ec2-23-23-130-158.compute-1.amazonaws.com:5432/dbilarss332cbp";
            }

            $dbopts = parse_url($dbUrl);

            $dbHost = $dbopts["host"];
            $dbPort = $dbopts["port"];
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbName = ltrim($dbopts["path"],'/');

            try {
                $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            }
            catch (PDOException $ex) {
                print "<p>error: $ex->getMessage() </p>\n\n";
                die();
            }
            $sql = 'SELECT * FROM inventory WHERE invid = :invId';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
            $stmt->execute();
            $products = $stmt->fetch(PDO::FETCH_ASSOC);
            
            /*$prod = "";
            foreach($products as $product){
            $prod .= "<img src='$product[invimg]'><h1>$product[invname]</h1><p>$product[invdesc]</p><span>$$product[invprice]</span>";
            }*/
            $prod = "<img src='$products[invimg]'><h1>$products[invname]</h1><p>$products[invdesc]</p><span>$$products[invprice]</span>";
            echo $prod;
            ?>
            <form id="addCart" action="/organize/shopIndex.php" method="post">
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