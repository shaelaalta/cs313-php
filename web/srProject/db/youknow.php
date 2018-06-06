<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        $schedDay = $time[day];
        $schedTimeS = $time[timestart];
        $schedTimeE = $time[timeend];
        $pd .= date_format($schedDay, 'l js F Y');
        $pd .= " from ". date_format($schedTimeS, 'g:i A') . "to ". date_format($schedTimeE, 'g:i A');
        $pd .= "<a href='../sched/schedIndex.php?action=bookTime'>Schedule</a><br>";
    }
    $pd .= "</div>";
    return $pd;
}