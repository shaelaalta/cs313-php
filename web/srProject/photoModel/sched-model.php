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

function addTime($date, $stime, $etime){
    $db = connect();
    $sql = 'INSERT INTO schedule VALUES (DEFAULT, :date, :stime, :etime, 0)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':stime', $stime, PDO::PARAM_STR);
    $stmt->bindValue(':etime', $etime, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}