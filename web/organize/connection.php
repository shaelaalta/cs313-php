<?php
/* 
 * Database Connections
 * PDO Attempt, wish me luck
 * Shaela Sutton
 *host=67.60.89.156
 * host=ec2-23-23-130-158.compute-1.amazonaws.com
 */
function connect()
{   
    try
    {
        /*$dbUrl = getenv('postgres://aaxshfcnahrbwi:ff8800c7b186b1134b1b5059e5306d47926abf3599e6fba861d9a10555cc0ecc@ec2-23-23-130-158.compute-1.amazonaws.com:5432/dbilarss332cbp');
        $dbopts = parse_url($dbUrl);
        $user= 'aaxshfcnahrbwi';
        $password = 'ff8800c7b186b1134b1b5059e5306d47926abf3599e6fba861d9a10555cc0ecc';
        $db = new PDO($dbopts, $user, $password);
        return $db;*/
        
        $dbUrl = getenv('DATABASE_URL');
        $dbopts = parse_url($dbUrl);
        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName =  ltrim($dbopts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        return $db;
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
}