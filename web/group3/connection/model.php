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
    $rowsChanged = $pdo->lastInserId('scripture_id_seq');
    $stmt->closeCursor();
    return $rowsChanged;
}