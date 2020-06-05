<?php

function getCurrentWeekNumber()
{
    return date("l") === "Sunday" ? date("W") + 1 : date("W");
}

function getWeekDates($year, $weekNumber)
{
    $sanitized = addLeadingZero($weekNumber);
    $currentWeekDates = array();
    for ($i = 0; $i < 7; $i++) {
        $currentWeekDates[] = date("Y-m-d", strtotime("$year-W$sanitized-0 + $i days"));
    }
    return $currentWeekDates;
}

function getCurrentWeekDates($givenTime = false)
{
    return getWeekDates(date("Y"), getCurrentWeekNumber());
}
