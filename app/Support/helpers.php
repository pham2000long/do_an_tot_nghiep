<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

function getDateTo($date)
{
    list($start_date, $end_date) = explode(' - ', $date);
    $start_date = str_replace('/', '-', $start_date);
    $start_date = Carbon::createFromFormat('m-d-Y', $start_date);

    $end_date = str_replace('/', '-', $end_date);
    $end_date = Carbon::createFromFormat('m-d-Y', $end_date);
    return [
        'started_at' => $start_date,
        'ended_at' => $end_date
    ];
}

/**
 * generate token func
 */
function generateHashToken()
{
    $newAppKey = base64_decode(substr(config('app.key'), 7));
    return hash_hmac('sha256', Str::random(40), $newAppKey);
}
