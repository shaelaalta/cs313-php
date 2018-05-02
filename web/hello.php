
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
                <li><a href="hello.html">Home</a></li>
                <li><a href="/view/myWork.html">Work</a></li>
            </ul>
          </nav>
      </header>
      
      <main id="home">
          <div id='myBlah'>
              <img src="/images/issaMe.jpg">
              <h2 id='mahName'>This is me</h2>
              <p>I'm Shaela, the little girl in the photo is my little girl who means the world to me. Her name is Penelope but we call her Penny for short. One of my hobbies is I love to embroider. I picked it up on a whim and am totally addicted to it now and am always looking for something else to stitch. I've really enjoyed all my web development classes so far and I'm excited about this class and all the important things we will learn this track!</p>
          </div>
      </main>
  
    </body>
</html>