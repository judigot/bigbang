<?php

function addLeadingZero($number)
{
    return str_pad($number, 2, "0", STR_PAD_LEFT);
}

function monetize($addComma, $number)
{
    // $number = bcdiv($number, 1, 2);
    return $addComma ? number_format($number, strlen(substr(strrchr($number, "."), 1))) : $number;
}
