<?php

function getTimes(){
    $db = connect();
    $sql = 'SELECT * FROM schedule WHERE booked = 0';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $times = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $times;
}