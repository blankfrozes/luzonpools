<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Pools\CheckTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class LiveController extends Controller
{
    protected function getFirstResult()
    {
        return Result::where([
            'complete' => CheckTime::checkFirstLiveDraw(0) ?
                (Result::where(['complete' => 0])->exists() ? 0 : 1) :
                1,
        ])->orderBy('periode', 'desc')->first();
    }

    protected function getSecondResult()
    {
        return Result::where([
            'complete' => CheckTime::checkSecondLiveDraw(0) ?
                (Result::where(['complete' => 0])->exists() ? 0 : 1) :
                1,
        ])->orderBy('periode', 'desc')->first();
    }

    protected function getThirdResult()
    {
        return Result::where([
            'complete' => CheckTime::checkThirdLiveDraw(0) ?
                (Result::where(['complete' => 0])->exists() ? 0 : 1) :
                1,
        ])->orderBy('periode', 'desc')->first();
    }

    protected function getFourthResult()
    {
        return Result::where([
            'complete' => CheckTime::checkFourthLiveDraw(0) ?
                (Result::where(['complete' => 0])->exists() ? 0 : 1) :
                1,
        ])->orderBy('periode', 'desc')->first();
    }

    protected function checkHideOrShowNumber($second = 0, $string, $offset, $length){
        if(CheckTime::checkFirstLiveDraw(0)){
            return CheckTime::checkFirstLiveDraw($second) ? substr($string, $offset, $length) : null;
        }else if(CheckTime::checkSecondLiveDraw(0)){
            return CheckTime::checkSecondLiveDraw($second) ? substr($string, $offset, $length) : null;
        }else if(CheckTime::checkThirdLiveDraw(0)){
            return CheckTime::checkThirdLiveDraw($second) ? substr($string, $offset, $length) : null;
        }else if(CheckTime::checkFourthLiveDraw(0)){
            return CheckTime::checkFourthLiveDraw($second) ? substr($string, $offset, $length) : null;
        }else{
            return substr($string, $offset, $length);
        }

        return null;
    }

    protected function setFirstLiveDraw(){
        return [
            'consolation' => [
                [
                    $this->checkHideOrShowNumber(30, $this->getFirstResult()->consolation, 0, 1),
                    $this->checkHideOrShowNumber(60, $this->getFirstResult()->consolation, 1, 1),
                    $this->checkHideOrShowNumber(90, $this->getFirstResult()->consolation, 2, 1),
                    $this->checkHideOrShowNumber(120, $this->getFirstResult()->consolation, 3, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getFirstResult()->consolation, 5, 1),
                    $this->checkHideOrShowNumber(60, $this->getFirstResult()->consolation, 6, 1),
                    $this->checkHideOrShowNumber(90, $this->getFirstResult()->consolation, 7, 1),
                    $this->checkHideOrShowNumber(120, $this->getFirstResult()->consolation, 8, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getFirstResult()->consolation, 10, 1),
                    $this->checkHideOrShowNumber(60, $this->getFirstResult()->consolation, 11, 1),
                    $this->checkHideOrShowNumber(90, $this->getFirstResult()->consolation, 12, 1),
                    $this->checkHideOrShowNumber(120, $this->getFirstResult()->consolation, 13, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getFirstResult()->consolation, 15, 1),
                    $this->checkHideOrShowNumber(60, $this->getFirstResult()->consolation, 16, 1),
                    $this->checkHideOrShowNumber(90, $this->getFirstResult()->consolation, 17, 1),
                    $this->checkHideOrShowNumber(120, $this->getFirstResult()->consolation, 18, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getFirstResult()->consolation, 20, 1),
                    $this->checkHideOrShowNumber(60, $this->getFirstResult()->consolation, 21, 1),
                    $this->checkHideOrShowNumber(90, $this->getFirstResult()->consolation, 22, 1),
                    $this->checkHideOrShowNumber(120, $this->getFirstResult()->consolation, 23, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getFirstResult()->consolation, 25, 1),
                    $this->checkHideOrShowNumber(60, $this->getFirstResult()->consolation, 26, 1),
                    $this->checkHideOrShowNumber(90, $this->getFirstResult()->consolation, 27, 1),
                    $this->checkHideOrShowNumber(120, $this->getFirstResult()->consolation, 28, 1),
                ],
            ],
            'starter' => [
                [
                    $this->checkHideOrShowNumber(150, $this->getFirstResult()->starter, 0, 1),
                    $this->checkHideOrShowNumber(180, $this->getFirstResult()->starter, 1, 1),
                    $this->checkHideOrShowNumber(210, $this->getFirstResult()->starter, 2, 1),
                    $this->checkHideOrShowNumber(240, $this->getFirstResult()->starter, 3, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getFirstResult()->starter, 5, 1),
                    $this->checkHideOrShowNumber(180, $this->getFirstResult()->starter, 6, 1),
                    $this->checkHideOrShowNumber(210, $this->getFirstResult()->starter, 7, 1),
                    $this->checkHideOrShowNumber(240, $this->getFirstResult()->starter, 8, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getFirstResult()->starter, 10, 1),
                    $this->checkHideOrShowNumber(180, $this->getFirstResult()->starter, 11, 1),
                    $this->checkHideOrShowNumber(210, $this->getFirstResult()->starter, 12, 1),
                    $this->checkHideOrShowNumber(240, $this->getFirstResult()->starter, 13, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getFirstResult()->starter, 15, 1),
                    $this->checkHideOrShowNumber(180, $this->getFirstResult()->starter, 16, 1),
                    $this->checkHideOrShowNumber(210, $this->getFirstResult()->starter, 17, 1),
                    $this->checkHideOrShowNumber(240, $this->getFirstResult()->starter, 18, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getFirstResult()->starter, 20, 1),
                    $this->checkHideOrShowNumber(180, $this->getFirstResult()->starter, 21, 1),
                    $this->checkHideOrShowNumber(210, $this->getFirstResult()->starter, 22, 1),
                    $this->checkHideOrShowNumber(240, $this->getFirstResult()->starter, 23, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getFirstResult()->starter, 25, 1),
                    $this->checkHideOrShowNumber(180, $this->getFirstResult()->starter, 26, 1),
                    $this->checkHideOrShowNumber(210, $this->getFirstResult()->starter, 27, 1),
                    $this->checkHideOrShowNumber(240, $this->getFirstResult()->starter, 28, 1),
                ],
            ],
            'thirdPrize' => [
                $this->checkHideOrShowNumber(240, $this->getFirstResult()->third, 0, 1),
                $this->checkHideOrShowNumber(300, $this->getFirstResult()->third, 1, 1),
                $this->checkHideOrShowNumber(360, $this->getFirstResult()->third, 2, 1),
                $this->checkHideOrShowNumber(420, $this->getFirstResult()->third, 3, 1),
            ],
            'secondPrize' => [
                $this->checkHideOrShowNumber(480, $this->getFirstResult()->second, 0, 1),
                $this->checkHideOrShowNumber(540, $this->getFirstResult()->second, 1, 1),
                $this->checkHideOrShowNumber(600, $this->getFirstResult()->second, 2, 1),
                $this->checkHideOrShowNumber(660, $this->getFirstResult()->second, 3, 1),
            ],
            'grandPrize' => [
                $this->checkHideOrShowNumber(720, $this->getFirstResult()->first, 0, 1),
                $this->checkHideOrShowNumber(780, $this->getFirstResult()->first, 1, 1),
                $this->checkHideOrShowNumber(840, $this->getFirstResult()->first, 2, 1),
                $this->checkHideOrShowNumber(900, $this->getFirstResult()->first, 3, 1),
            ],
            'date' => $this->getFirstResult()->created_at,
            // 'date' => Carbon::parse($this->getFirstResult()->created_at)->locale('en')->translatedFormat('l, d F Y'),
            'periode' => $this->getFirstResult()->periode,
        ];
    }

    public function livedraw(): JsonResponse
    {
        $response = $this->setFirstLiveDraw();

        CheckTime::checkFirstLiveDraw(900) ? $this->setLiveDrawToComplete() : null;

        return response()->json($response);
    }

    protected function setLiveDrawToComplete()
    {
        return Result::where([
            'complete' => 0,
        ])->update(['complete' => 1]);
    }
}