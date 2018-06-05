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
        
        <header><h1>photography</h1>
            <nav class="cNav" id="myNav">
                <ul>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                    <li>
                        <a href="">Gallery</a>
                    </li>
                    <li>
                        <a href="">Prices</a>
                    </li>
                    <li>
                        <a href="../view/signIn.php">Sign In</a>
                    </li>
                    <li>
                        <a href="">Schedule</a>
                    </li>
                </ul>
            </nav>
        </header>