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
    <link href="/css/edit.css" type="text/css" rel="stylesheet"/>
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
            <?php echo $message; ?>
            <form id="addProd" action="/shop/shopIndex.php" method="post">
                <label for="image">Image location:</label>
                <input type="text" name="image" id="image">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                <label for="desc">Description:</label>
                <textarea type="submit" rows='4' cols="50" name="desc" id="desc"></textarea>
                <label for="price">Price:</label>
                <input type="number" step="0.01" min="0" name="price" id="price">
                <select name='category'>
                <?php 
                    $pd = "";
                    foreach($categories as $category){
                       $pd .="<option value='" .$category[catid] ."'>$category[catname]</option>";  
                    }
                    $pd .= "</select>";
                    echo $pd;
                ?>
                </select>
                <button type="submit" name="action" value="addProd">Add Product</button>
            </form>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
    </body>
</html>