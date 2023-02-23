<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Pools\CheckTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class LiveController extends Controller
{
    protected function getLiveResult()
    {
        return Result::where([
            'complete' => Result::where(['complete' => 0])->exists() ? 0 : 1,
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

    protected function setLiveDraw(){
        return [
            'consolation' => [
                [
                    $this->checkHideOrShowNumber(30, $this->getLiveResult()->consolation, 0, 1),
                    $this->checkHideOrShowNumber(60, $this->getLiveResult()->consolation, 1, 1),
                    $this->checkHideOrShowNumber(90, $this->getLiveResult()->consolation, 2, 1),
                    $this->checkHideOrShowNumber(120, $this->getLiveResult()->consolation, 3, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getLiveResult()->consolation, 5, 1),
                    $this->checkHideOrShowNumber(60, $this->getLiveResult()->consolation, 6, 1),
                    $this->checkHideOrShowNumber(90, $this->getLiveResult()->consolation, 7, 1),
                    $this->checkHideOrShowNumber(120, $this->getLiveResult()->consolation, 8, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getLiveResult()->consolation, 10, 1),
                    $this->checkHideOrShowNumber(60, $this->getLiveResult()->consolation, 11, 1),
                    $this->checkHideOrShowNumber(90, $this->getLiveResult()->consolation, 12, 1),
                    $this->checkHideOrShowNumber(120, $this->getLiveResult()->consolation, 13, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getLiveResult()->consolation, 15, 1),
                    $this->checkHideOrShowNumber(60, $this->getLiveResult()->consolation, 16, 1),
                    $this->checkHideOrShowNumber(90, $this->getLiveResult()->consolation, 17, 1),
                    $this->checkHideOrShowNumber(120, $this->getLiveResult()->consolation, 18, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getLiveResult()->consolation, 20, 1),
                    $this->checkHideOrShowNumber(60, $this->getLiveResult()->consolation, 21, 1),
                    $this->checkHideOrShowNumber(90, $this->getLiveResult()->consolation, 22, 1),
                    $this->checkHideOrShowNumber(120, $this->getLiveResult()->consolation, 23, 1),
                ],
                [
                    $this->checkHideOrShowNumber(30, $this->getLiveResult()->consolation, 25, 1),
                    $this->checkHideOrShowNumber(60, $this->getLiveResult()->consolation, 26, 1),
                    $this->checkHideOrShowNumber(90, $this->getLiveResult()->consolation, 27, 1),
                    $this->checkHideOrShowNumber(120, $this->getLiveResult()->consolation, 28, 1),
                ],
            ],
            'starter' => [
                [
                    $this->checkHideOrShowNumber(150, $this->getLiveResult()->starter, 0, 1),
                    $this->checkHideOrShowNumber(180, $this->getLiveResult()->starter, 1, 1),
                    $this->checkHideOrShowNumber(210, $this->getLiveResult()->starter, 2, 1),
                    $this->checkHideOrShowNumber(240, $this->getLiveResult()->starter, 3, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getLiveResult()->starter, 5, 1),
                    $this->checkHideOrShowNumber(180, $this->getLiveResult()->starter, 6, 1),
                    $this->checkHideOrShowNumber(210, $this->getLiveResult()->starter, 7, 1),
                    $this->checkHideOrShowNumber(240, $this->getLiveResult()->starter, 8, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getLiveResult()->starter, 10, 1),
                    $this->checkHideOrShowNumber(180, $this->getLiveResult()->starter, 11, 1),
                    $this->checkHideOrShowNumber(210, $this->getLiveResult()->starter, 12, 1),
                    $this->checkHideOrShowNumber(240, $this->getLiveResult()->starter, 13, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getLiveResult()->starter, 15, 1),
                    $this->checkHideOrShowNumber(180, $this->getLiveResult()->starter, 16, 1),
                    $this->checkHideOrShowNumber(210, $this->getLiveResult()->starter, 17, 1),
                    $this->checkHideOrShowNumber(240, $this->getLiveResult()->starter, 18, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getLiveResult()->starter, 20, 1),
                    $this->checkHideOrShowNumber(180, $this->getLiveResult()->starter, 21, 1),
                    $this->checkHideOrShowNumber(210, $this->getLiveResult()->starter, 22, 1),
                    $this->checkHideOrShowNumber(240, $this->getLiveResult()->starter, 23, 1),
                ],
                [
                    $this->checkHideOrShowNumber(150, $this->getLiveResult()->starter, 25, 1),
                    $this->checkHideOrShowNumber(180, $this->getLiveResult()->starter, 26, 1),
                    $this->checkHideOrShowNumber(210, $this->getLiveResult()->starter, 27, 1),
                    $this->checkHideOrShowNumber(240, $this->getLiveResult()->starter, 28, 1),
                ],
            ],
            'thirdPrize' => [
                $this->checkHideOrShowNumber(240, $this->getLiveResult()->third, 0, 1),
                $this->checkHideOrShowNumber(300, $this->getLiveResult()->third, 1, 1),
                $this->checkHideOrShowNumber(360, $this->getLiveResult()->third, 2, 1),
                $this->checkHideOrShowNumber(420, $this->getLiveResult()->third, 3, 1),
            ],
            'secondPrize' => [
                $this->checkHideOrShowNumber(480, $this->getLiveResult()->second, 0, 1),
                $this->checkHideOrShowNumber(540, $this->getLiveResult()->second, 1, 1),
                $this->checkHideOrShowNumber(600, $this->getLiveResult()->second, 2, 1),
                $this->checkHideOrShowNumber(660, $this->getLiveResult()->second, 3, 1),
            ],
            'grandPrize' => [
                $this->checkHideOrShowNumber(720, $this->getLiveResult()->first, 0, 1),
                $this->checkHideOrShowNumber(780, $this->getLiveResult()->first, 1, 1),
                $this->checkHideOrShowNumber(840, $this->getLiveResult()->first, 2, 1),
                $this->checkHideOrShowNumber(900, $this->getLiveResult()->first, 3, 1),
            ],
            'date' => $this->getLiveResult()->created_at,
            'periode' => $this->getLiveResult()->periode,
        ];
    }

    public function livedraw(): JsonResponse
    {
        $response = $this->setLiveDraw();

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