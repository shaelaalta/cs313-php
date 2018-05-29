<?php
/* 
 * Database Connections
 */
function connect(){
    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
        $dbUrl =       "postgres://aaxshfcnahrbwi:ff8800c7b186b1134b1b5059e5306d47926abf3599e6fba861d9a1055  5cc0ecc@ec2-23-23-130-158.compute-1.amazonaws.com:5432/dbilarss332cbp";
    }

    $dbopts = parse_url($dbUrl);

    print "<p>$dbUrl</p>\n\n";

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    try {
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
        print "<p>error: $ex->getMessage() </p>\n\n";
        die();
    }
    
    return $db;
}