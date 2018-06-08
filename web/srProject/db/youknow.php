<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        //$schedTimeE = date_format($time['timeend'], 'g:i A');
        //$pd .= date_format($time['day'], 'l js F Y');
        //$pd .=" from ". date_format($time[timestart], 'g:i A') . "to ". $schedTimeE;
        $pd .= "$time[day] $time[timestart] to $time[timeend] ";
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