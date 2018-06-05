<?php
/*
schedule controller
*/
session_start();

require_once '../db/connect.php';
require_once '../db/youknow.php';
require_once '../photoModel/sched-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'viewSched':
        $times = getTimes();
        $showTimes = availableSched($times);
        include '../view/schedule.php';
        break;
        
    case 'addSched':
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $startTime = filter_input(INPUT_POST, 'startTime', FILTER_SANITIZE_STRING);
        $endTime = filter_input(INPUT_POST, 'endTime', FILTER_SANITIZE_STRING);
        
        $insertSched = addTime($date, $startTime, $endTime);
        
        if($insertSched == 0){
            echo "it didn't work";
            break;
        }
        
        header("location: schedIndex.php?action=viewSched");
        break;
        
    default:
        include '../index.php';
        break;
}