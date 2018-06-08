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
        $dateDay= date_format($date, 'l d F Y');
        $timeS = date_create($time['timestart']);
        $stime = date_format($timeS, 'g:i A');
        $timeE = date_create($time['timeend']);
        $etime = date_format($timeE, 'g:i A');
        $pd .= "$dateDay from $stime to $etime ";
        $pd .= "<a href='../sched/schedIndex.php?action=bookTime&timeId=$time[schedid]'>Schedule</a>";
        if($sessionClearance == 3){
            $pd .= "<a href='../sched/schedIndex.php?action=delTime&timeId=$time[schedid]'>Delete</a>'\"; }?><br>";
        }
        else { $pd .= "<br>"; }
    $pd .= "</div>";
    return $pd;
}

function buildPersonalSched($personal){
    $pd = '<div id="personalSched">';
    foreach($personal as $pers){
        $date = date_create($pers['day']);
        $dateDay= date_format($date, 'l d F Y');
        $timeS = date_create($pers['timestart']);
        $stime = date_format($timeS, 'g:i A');
        $timeE = date_create($pers['timeend']);
        $etime = date_format($timeE, 'g:i A');
        $pd .= "$pers[userfirstname] $pers[userlastname] your photoshoot is on $dateDay from $stime-$etime<br>";
    }
    $pd .="</div>";
    return $pd;
}