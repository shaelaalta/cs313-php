<?php
/*
schedule controller
*/
session_start();

require_once '../db/connect.php';
require_once '../db/youknow.php';
require_once '../photoModel/sched-model.php';

if(isset($_SESSION['loggedin'])){
    $sessionName = $_SESSION['clientData']['userfirstname'];
    $sessionClearance = $_SESSION['clientData']['clearance']; 
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'viewSched':
        $times = getTimes();
        $showTimes = availableSched($times);
        
        if(isset($_SESSION['loggedin'])){
            $sessId = $_SESSION['clientData']['userid'];
            $personal = getPerson($sessId);
            $seePersonal = buildPersonalSched($personal);
        }
        include '../view/schedule.php';
        break;
        
    case 'addSched':
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $startTime = filter_input(INPUT_POST, 'startTime', FILTER_SANITIZE_STRING);
        $endTime = filter_input(INPUT_POST, 'endTime', FILTER_SANITIZE_STRING);
        
        $testDate = strtotime($date);
        
        if($testDate == 0 || ($testDate < strtotime('now'))){
            echo "nope";
            break;
        }
        
        $insertSched = addTime($date, $startTime, $endTime);
        
        if($insertSched == 0){
            echo "it didn't work";
            break;
        }
        
        header("location: schedIndex.php?action=viewSched");
        break;
        
    case 'delTime':
        break;
        
    case 'bookTime':
        $schedId = filter_input(INPUT_GET, 'timeId', FILTER_SANITIZE_NUMBER_INT);
        $userId = $_SESSION['clientData']['userid'];
        
        $addAppt = addAppointment($schedId, $userId);
        if($addAppt == 0){
            echo "nope";
            break;
        }
        
        $schedCheck = updateSched($schedId);
        if($schedCheck == 0)
        {
            echo "didn't work";
            break;
        }
        header("location: schedIndex.php?action=viewSched");
        break;
        
    default:
        include '../index.php';
        break;
}