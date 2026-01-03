<?php

namespace App\Helpers;

use Carbon\Carbon;

class AppointmentDateHelper
{
    public static function nextDateForDay(string $day): string
    {
        $today = Carbon::today();
        $targetDay = ucfirst($day);

        $appointmentDate = Carbon::parse("next {$targetDay}");

        if ($today->format('l') === $targetDay) {
            $appointmentDate = $today;
        }

        return $appointmentDate->toDateString();
    }
}
