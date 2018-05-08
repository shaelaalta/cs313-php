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
        
        <header>
            <img id=logo src="/images/dotLogo.jpg">
            <nav class="cNav" id="myNav">
            <ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                <li><a href="hello.php">Home</a></li>
                <li><a href="/view/prodPage.php">Shop</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
          </nav>
        </header>
        
        <main id="home">
            <h1>Welcome to Our Store!</h1>
            <img id="homePic" src="/images/hands.jpg">
            <h2>Modern toys for the modern family</h2>
        </main>
        
    </body>
</html>