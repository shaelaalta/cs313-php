<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        //$pd .= date_format($time['day'], 'l js F Y');
        $date = date_create($time['day']);
        $pd .= date_format($date, 'l d F Y');
        $timeS = date_create($time[timestart]);
        $stime = date_format($timeS, 'g:i A');
        $timeE = date_create($time[timeend]);
        $etime = date_format($timeE, 'g:i A');
        $pd .= "$date from $stime to $etime ";
        $pd .= "<a href='../sched/schedIndex.php?action=bookTime&timeId=$time[schedid]'>Schedule</a><br>";
    }
    $pd .= "</div>";
    return $pd;
}

function buildPersonalSched($personal){
    $pd = '<div id="personalSched">';
    foreach($personal as $pers){
        $pd .= "$pers[userfirstname] $pers[userlastname] your photoshoot is on $pers[day] from $pers[timestart]-$pers[timeend]<br>";
    }
    $pd .="</div>";
    return $pd;
}