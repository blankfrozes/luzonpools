<?php

namespace App\Pools;

use Illuminate\Support\Carbon;
use App\Models\Constants\TimeConstant;

class CheckTime
{

    public static function checkFirstLiveDraw($second = 0): bool
    {
        $firstFinishTime = Carbon::parse(TimeConstant::FIRST_FINISH_TIME)->toDateTimeString();
        $firstStartTime = Carbon::parse(TimeConstant::FIRST_START_TIME)->addSeconds($second)->toDateTimeString();

        return Carbon::now('Asia/Jakarta')->between($firstStartTime, $firstFinishTime);
    }

    public static function checkSecondLiveDraw($second = 0): bool
    {
        $secondFinishTime = Carbon::parse(TimeConstant::SECOND_FINISH_TIME)->toDateTimeString();
        $secondStartTime = Carbon::parse(TimeConstant::SECOND_START_TIME)->addSeconds($second)->toDateTimeString();

        return Carbon::now('Asia/Jakarta')->between($secondStartTime, $secondFinishTime);
    }

    public static function checkThirdLiveDraw($second = 0): bool
    {
        $thirdFinishTime = Carbon::parse(TimeConstant::THIRD_FINISH_TIME)->toDateTimeString();
        $thirdStartTime = Carbon::parse(TimeConstant::THIRD_START_TIME)->addSeconds($second)->toDateTimeString();

        return Carbon::now('Asia/Jakarta')->between($thirdStartTime, $thirdFinishTime);
    }

    public static function checkFourthLiveDraw($second = 0): bool
    {
        $fourthFinishTime = Carbon::parse(TimeConstant::FOURTH_FINISH_TIME)->toDateTimeString();
        $fourthStartTime = Carbon::parse(TimeConstant::FOURTH_START_TIME)->addSeconds($second)->toDateTimeString();

        return Carbon::now('Asia/Jakarta')->between($fourthStartTime, $fourthFinishTime);
    }
}