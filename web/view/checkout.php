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
    <link href="/css/check.css" type="text/css" rel="stylesheet"/>
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
        
        <main id="check">
            <?php
            echo $message;
            ?>
            
            <form id="checkoutForm" action="/organize/shopIndex.php" method="post">
                <label for="clientFirstname">First Name:</label>
                <input type="text" name="clientFirstname" id="clientFirstname"
                   <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?>
                   placeholder="Your first name . . ." required>
            
                <label for="clientLastname">Last Name:</label>
                <input type="text" name="clientLastname" id="clientLastname"
                   <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>
                   placeholder="Your last name . . ." required>
            
                <label for="clientEmail">Email:</label>
                <input type="email" name="clientEmail" id="clientEmail"
                   <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>
                   placeholder="Your email . . ." required>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" 
                       <?php if(isset($address)){echo "value='$address'";} ?>
                placeholder = "Your address. . . "
                required>
                <button type="submit" name="action" value="checkout">Place Order</button>
            </form>
        </main>

    </body>
</html>