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
            <!--<div id="group">
            <div id="item">
                <a href="/organize/shopIndex.php?action=straight"><img src="/images/straightGym.jpg" alt="image of the straight gym"></a>
                <hr>
                <h2>Straight Lines Play Gym</h2><span>$57.45</span>
            </div>
            <div id="item">
                <a href="/organize/shopIndex.php?action=curve"><img src="/images/curveGym.jpg" alt="image of the straight gym"></a>
                <hr>
                <h2>Play Gym</h2><span>$63.23</span>
            </div>
            </div>-->
            <?php 
            //echo $prodList;
            $dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = //"postgres://postgres:password@localhost:5432/cs313db";
     "postgres://aaxshfcnahrbwi:ff8800c7b186b1134b1b5059e5306d47926abf3599e6fba861d9a10555cc0ecc@ec2-23-23-130-158.compute-1.amazonaws.com:5432/dbilarss332cbp";
}

$dbopts = parse_url($dbUrl);

print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

foreach ($db->query('SELECT invId, invName, invPrice FROM inventory') as $row)
{
 print "<p>$row[0]</p>\n\n";
}
            ?>
        </main>
        
    </body>
</html>