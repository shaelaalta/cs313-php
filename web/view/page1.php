<!DOCTYPE html>
<html lang ="en">
  <head>
    <title>Shaela Sutton | Home</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/hello.css" type="text/css" rel="stylesheet"/>
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
          <div id='date'>
            <?php
                echo date("M d y");
            ?>
          </div>
          
          <h1>Shaela Sutton</h1>
          <nav class="cNav" id="myNav">
            <ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                <li><a href="../hello.php">Home</a></li>
                <li><a href="/view/page1.php">Work</a></li>
            </ul>
          </nav>
      </header>
        
        <main>
            <a href="/view/group3.html">Week 3 Group Work</a>
        </main>
        
    </body>
</html>