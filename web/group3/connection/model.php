<?php
function getTopics(){
    $db = connect();
    $sql = 'SELECT * FROM topic';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $topics;
}