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
    $sql = 'INSERT INTO schedule VALUES (DEFAULT, DATE_FORMAT(":date", "%a %b %Y"), :stime, :etime, 0)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':stime', $stime, PDO::PARAM_STR);
    $stmt->bindValue(':etime', $etime, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function addAppointment($schedId, $userId){
    $db = connect();
    $sql = 'INSERT INTO apt VALUES (DEFAULT, :userid, :schedid)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userid', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':schedid', $schedId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function updateSched($schedId){
    $db = connect();
    $sql = 'UPDATE schedule SET booked = 2 WHERE schedid = :schedId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':schedId', $schedId, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getPerson($sessId){
     $db = connect();
    $sql = 'SELECT usert.userfirstname, usert.userlastname, schedule.* FROM ((apt INNER JOIN usert ON apt.userid = usert.userid AND apt.userid = :sessId) INNER JOIN schedule ON apt.schedid = schedule.schedid)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':sessId', $sessId, PDO::PARAM_STR);
    $stmt->execute();
    $specific = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $specific;
}