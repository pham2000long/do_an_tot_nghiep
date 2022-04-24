<?php

use Illuminate\Support\Carbon;

function getDateTo($date)
{
    list($start_date, $end_date) = explode(' - ', $date);
    $start_date = str_replace('/', '-', $start_date);
    $start_date = Carbon::createFromFormat('m-d-Y', $start_date)->format('Y-m-d');

    $end_date = str_replace('/', '-', $end_date);
    $end_date = Carbon::createFromFormat('m-d-Y', $end_date)->format('Y-m-d');
    return [
        'started_at' => $start_date,
        'ended_at' => $end_date
    ];
}
