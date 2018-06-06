<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        $pd .= date_format($time['day'], 'l js F Y');
        $schedTimeE = date_format($time['timeend'], 'g:i A');
        $pd .=" from ". date_format($time[timestart], 'g:i A') . "to ". $schedTimeE;
        $pd .= "<a href='../sched/schedIndex.php?action=bookTime'>Schedule</a><br>";
    }
    $pd .= "</div>";
    return $pd;
}