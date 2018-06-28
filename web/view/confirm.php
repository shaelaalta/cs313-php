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
    <link href="/css/confirm.css" type="text/css" rel="stylesheet"/>
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
            $sh = '<div id="show">';
                $sh .= "<h2>Billing Info</h2>";
                $sh .= "<h3>$useri[0] $useri[1]</h3>";
                $sh .= "<h4>email: $useri[2]</h4>";
                $sh .= "<h4>address: $useri[3]</h4>";
                $sh .="</div>";
            echo $sh;
            
            $totalCost = 0;
            $pd = '<h2>Order</h2><div id="cart">';
                foreach($list as $lists){
                    $pd .= '<div id="item">';
                    $pd .= "<img src=" . $lists[0] . ">";
                    $pd .= "<h2>$lists[1]</h2><span>$$lists[2]</span><br><span>Amount: $lists[3]</span>";
                    $pd .= "<hr></div>";
                    $totalCost += ($lists[2] * $lists[3]);
                }
            $pd .="</div>";
            echo $pd;
            echo "Total: $". $totalCost;
            ?>
            
            <form id="checkoutForm" action="/shop/shopIndex.php" method="post"><button type="submit" name="action" value="confirmed">Confirm</button>
            <button type="submit" name="action" value="cancel">Cancel</button>
            </form>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
    </body>
</html>