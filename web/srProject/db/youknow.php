<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        $pd .= date_format($time[day], 'l js F Y');
        $schedTimeS = $time[timestart];
        $schedTimeE = $time[timeend];
        $pd .=" from ". date_format($schedTimeS, 'g:i A') . "to ". date_format($schedTimeE, 'g:i A');
        $pd .= "<a href='../sched/schedIndex.php?action=bookTime'>Schedule</a><br>";
    }
    $pd .= "</div>";
    return $pd;
}