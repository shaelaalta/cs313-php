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
        
        <main id="contact">
            <h3>Call: 208-333-3333</h3>
            <h3>Email: notreal@me.com</h3>
            <h3>Location: North Pole 124</h3>
        </main>
    </body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</html>