<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public static function meetingTime($time)
    {
        return Carbon::parse($time)->format('h:i A') . ' - ' .Carbon::parse($time)->addHours(1)->format('h:i A');
    }
}