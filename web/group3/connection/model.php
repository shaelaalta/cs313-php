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
    /*if($rowsChanged = 0){
        return NULL;
    }
    else {
        $idNeed = getScripId($book, $chapter, $verse, $content);
    }
    return $idNeed;*/
    return $rowsChanged;
}

/***************************************
* get scripture Id and send it back
****************************************/
function getThatScrip($book, $chapter, $verse, $content){
    $db = connect();
    $sql = 'SELECT id FROM scripture WHERE book = :book AND chapter = :chapter AND verse = :verse AND content = :content';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->execute();
    $scripId = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $scripId;
}


/******************************************
* add a scripture topic
*******************************************/
function addSt($tid){
    $db = connect();
    $bookId = $db->lastInsertId("scripture_id_seq");
    $sql ='INSERT INTO st (scrip_id, topic_id) VALUES (:scripId, :topicId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':scripId', $bookId, PDO::PARAM_INT);
    $stmt->bindValue(':topicId', $tid, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}