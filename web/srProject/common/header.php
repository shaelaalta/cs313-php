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
        
<header><a href="../index.php" id="title"><h1>photography</h1></a>
            <nav class="cNav" id="myNav">
                <ul>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                    <li>
                        <a href="srProject/index.php">Home</a>
                    </li>
                    <li>
                        <a href="">Gallery</a>
                    </li>
                    <li>
                        <a href="">Prices</a>
                    </li>
                    <li>
                        <a href="/srProject/account/userIndex.php">Account</a>
                    </li>
                    <li>
                        <a href="/srProject/sched/schedIndex.php?action=viewSched">Schedule</a>
                    </li>
                </ul>
            </nav>
        </header>