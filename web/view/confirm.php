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
    <link href="/css/cart.css" type="text/css" rel="stylesheet"/>
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
        
        <main id="confirm">
            <?php
            $sh = 'div id=show"';
            foreach($userInfo as $useri){
                $sh .= "<h2>Billing Info</h2>";
                $sh .= "<h3>$useri[$clientFirstname] $useri[$clientLastname]</h3>";
                $sh .= "<h4>email: $useri[$clientEmail]</h4>";
                $sh .= "<h4>address: $useri[$address]</h4>";
            }
            ?>
            <?php
            $totalCost = 0;
            $pd = '<div id="cart">';
                foreach($list as $lists){
                    $pd .= '<div id="item">';
                    $pd .= "<img src=" . $lists[0] . ">";
                    $pd .= "<h2>$lists[1]</h2><span>$$lists[2]</span><br><span>Amount: $lists[3]</span>";
                    $pd .= "<hr></div>";
                    $totalCost += $list[2];
                }
            $pd .="</div>";
            echo $pd;
            echo "$". $totalCost;
            ?>
            
            <form id="checkoutForm" action="/organize/shopIndex.php" method="post"><button type="submit" name="action" value="confirmed">Confirm</button>
            <button type="submit" name="action" value="cancel">Cancel</button>
            </form>
        </main>

    </body>
</html>