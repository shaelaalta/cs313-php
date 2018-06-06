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
    
    <main id="sched">
        
        <?php 
        if(isset($sessionName)){
            echo "Welcome $sessionName";
        }
        
        echo $showTimes; ?>
        
        <form action="../sched/schedIndex.php" method="post">
            <label for="date">Enter the Date: </label>
            <input type="date" name="date" required>
            <label for="startTime">Start Time: </label>
            <input type="time" name="startTime" required>
            <label for="endTime">End Time: </label>
            <input type="time" name="endTime" required>
            <button type="submit" name="action" value="addSched">Add Photoshoot Time</button>
        </form>
    </main>
</body>
</html>