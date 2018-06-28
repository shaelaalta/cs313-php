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
    <link href="/css/about.css" type="text/css" rel="stylesheet"/>
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
        
        <main id="about">
           <img src="../images/happy.jpg">
            <div id="myBlah">
                <h2 id="mahName">Hello, I'm Awesome</h2>
                <p>This is my family and after we added Dot to our happy little family I sturggled with finding large kid toys that weren't a total eyesore in my home, yet still functional and easy to store. This store I started became something I loved as I tried to answe all these problems I came across as a mom buying toys for my little Dot.</p>
            </div>
        </main>
        
    </body>
</html>