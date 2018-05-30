<?php
/* group work index page */

require_once '../connection/connect.php';
require_once '../connection/model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    default:
        $topics = getTopics();
        include '../view/seeScript.php';
}