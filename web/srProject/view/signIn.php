<!DOCTYPE html>
<html lang ="en">
  <head>
    <title>Photography</title>
    <meta charset="utf-8"/>
    <meta name="description" content="baby and toddler toys">
    <meta name="author" content="Shaela Sutton">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/srProject/css/home.css" type="text/css" rel="stylesheet"/>
    <link href="/srProject/css/signIn.css" type="text/css" rel="stylesheet"/>
</head>
    <body>
        
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/srProject/common/header.php'; ?>
        
        <main id="signIn">
            <?php if(isset($message)){ echo $message; } 
            
            if(isset($_SESSION['loggedin'])){
                echo '<form action="/srProject/account/userIndex.php" method="post">
                <button type="submit" name="action" value="logOut">Log Out</button></form>';
            }
            
            else{
            echo '<form action="/srProject/account/userIndex.php" method="post">
                <label for="button">Haven\'t created an account yet?</label><button type="submit" name="action" value="newAccount">Create Account</button>
            </form>
            
            <h1>Sign In</h1>
             
            <form action="/srProject/account/userIndex.php" method="post">
                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Your email..." required>
                <label for="password">Password: </label><input type="password" name="userpassword" placeholder="Your password. . . " required>
                <button type="submit" name="action" value="login">Sign In</button>
            </form>';
            }
        ?>
        </main>

    </body>
</html>