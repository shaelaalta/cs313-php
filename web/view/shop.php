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
    <link href="/css/shop.css" type="text/css" rel="stylesheet"/>
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
        
        <main id="shop">
            <?
            //php echo $prodDisplay; 
            $dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 $dbUrl = "postgres://aaxshfcnahrbwi:ff8800c7b186b1134b1b5059e5306d47926abf3599e6fba861d9a10555cc0ecc@ec2-23-23-130-158.compute-1.amazonaws.com:5432/dbilarss332cbp";
}

$dbopts = parse_url($dbUrl);

print "<p>$dbUrl</p>\n\n";

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

//$products = $db->query('SELECT invId, invName, invPrice FROM inventory');
$sql = 'SELECT invId, invName, invPrice, invImg FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($products);
            
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
    echo $pd;
            ?>
        </main>
        
    </body>
</html>