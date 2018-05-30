
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
        <h1>Shaela Sutton</h1>
          <nav class="cNav" id="myNav">
            <ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                <li><a href="hello.php">Home</a></li>
                <li><a href="/view/page1.php">Work</a></li>
            </ul>
          </nav>
      </header>
    <main id="scripture">
        <form id="scriptureForm" action="/scripture/scripIndex.php" method="post">
            <label for="book">Book: </label>
            <input type="text" name="book">
            <label for="chapter">Chapter: </label>
            <input type="number" name="chapter">
            <label for="verse">Verse: </label>
            <input type="number" name="verse">
            <label for="content">Content: </label><textarea type="submit" name="content" rows="6" cols="50"></textarea>
            <label for="topics">Topics: </label>
            <select name='topics'>
                <?php 
                    $pd = "";
                    foreach(topics as topic){
                       $pd .="<option value='" .$topic[topicid] ."'>$topic[topicname]</option>";  
                    }
                    $pd .= "</select>";
                echo $pd;
                ?>
            </select>
            <button id='scripButton' type="submit" name="action" value="addScripture"></button>
        </form>
    </main>
</body>
</html>