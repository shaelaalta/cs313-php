<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        $pd .= date_formate($time['day'], 'l js F Y');
        $pd .= " from  $time[timestart] to $time[timeend]";
        $pd .= "<a href='../sched/schedIndex.php?action=bookTime'>Schedule</a><br>";
    }
    $pd .= "</div>";
    return $pd;
}