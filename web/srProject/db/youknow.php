<?php

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function availableSched($times){
    $pd = '<div id="group">';
    foreach($times as $time){
        $pd .= "$time[day], $time[timestart], $time[timeend]";
    }
    $pd .= "</div>";
    return $pd;
}