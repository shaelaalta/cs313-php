<?php
/* group work index page */

require_once '../connection/connect.php';
require_once '../connection/model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'addScripture':
        $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
        $chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT);
        $verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_NUMBER_INT);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        $topicId = filter_input(INPUT_POST, 'topics', FILTER_SANITIZE_NUMBER_INT);
        
        $scripAdded = addScripture($book, $chapter, $verse, $content);
        if($scripAdded == 0){
            include '../view/seeScript.php';
            break;
        }
        
        $scripId = addScripture($book, $chapter, $verse, $content);
        echo $scripId;
        //echo "book Id: $scripAdded";
        //$updatedSt = addSt($topicId, $scripAdded);
        /*if($updatedSt == 0){
            echo "you missed something. . .";
            break;
        }*/
        echo "you did it!";
        break;
        
    default:
        $topics = getTopics();
        include '../view/seeScript.php';
}