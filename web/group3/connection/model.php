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

/**************************************
* add scripture to database
***************************************/
function addScripture($book, $chapter, $verse, $content){
    $db = connect();
    $sql = 'INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':book', $book, PDO::PARAM_INT);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    if($rowsChanged == 0){
        return NULL;
    }
    else {
        $mim = 'SELECT id FROM scripture WHERE (book = :book, chapter = :chapter, verse = :verse, content = :content)';
        $getIt = $db->prepare($mim);
        $getIt->bindValue(':book', $book, PDO::PARAM_INT);
        $getIt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
        $getIt->bindValue(':verse', $verse, PDO::PARAM_INT);
        $getIt->bindValue(':content', $content, PDO::PARAM_STR);
        $getIt->execute();
        $idNeed = $stmt->fetch(PDO::FETCH_ASSOC);
        $getIt->closeCursor();
    }
    return $idNeed;
}

/******************************************
* add a scripture topic
*******************************************/
function addSt($tid, $bookId){
    $db = connect();
    $sql ='INSERT INTO st (scrip_id, topic_id) VALUES (:scripId, :topicId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':scripId', $bookId, PDO::PARAM_INT);
    $stmt->bindValue(':topicId', $tid, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}