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
            <h1>Make Your Account</h1>
            <form action="/srProject/accounts/index.php" method="post">
                <label for="fName">First Name: </label>
                <input type="text" name="fName" placeholder="Your first name..." required>
                <label for="lName">Last Name: </label>
                <input type="text" name="lName" placeholder="Your last name..." required>
                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Your email..." required>
                <label for="password">Password: </label><input type="password" name="userpassword" placeholder="Your password. . . " required>
                <button type="submit" name="action" value="login">Sign In</button>
            </form>
        </main>

    </body>
</html>