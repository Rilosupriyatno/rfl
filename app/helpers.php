<?php

use Illuminate\Support\Str;

function cleanString($string)
{
    // Remove symbols and underscores
    $cleanString = preg_replace('/[\W_]+/', '', $string);

    // Convert to lowercase
    $cleanString = Str::lower($cleanString);

    return $cleanString;
}

function rupiah($number)
{
    return "Rp " . number_format($number,0,',','.');
}