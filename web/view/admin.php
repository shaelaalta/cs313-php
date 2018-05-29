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
        
        <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; 
        echo $message;
        ?>
        
        <main id="admin">
            <form id="administerLogin" action="shop/shopIndex.php" method="post">
                <label for="clientE">
                    <input type="text" name="cleintE" id="clientE"
                           <?php if(isset($clientE)){echo "value='$clientE'";} ?>
                           placeholder="Your email . . ." required>
                </label>
                <label for="password">
                    <input type="text" name="cleintP" id="clientP"
                           <?php if(isset($clientP)){echo "value='$clientP'";} ?>
                           placeholder="Your password . . ." required>
                </label>
                <button id="loginButton" type="submit" name="action" value="adminLogin">Log In</button>
            </form>
        </main>
        
    </body>
</html>