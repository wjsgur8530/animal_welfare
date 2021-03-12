<?php
// 프로토콜 1 (소의 수척, 좋은 사료와 물)
// 수척 정도 (충분한 영양섭취 기준점수) 계산
function getPoorScore($poorRate)
{
    $poorScore = 0;
    if ($poorRate == 0) {
        return $poorScore = 100;
    } elseif ($poorRate < 1) {
        return $poorScore = 90;
    } elseif ($poorRate < 2) {
        return $poorScore = 80;
    } elseif ($poorRate < 3) {
        return $poorScore = 70;
    } elseif ($poorRate < 4) {
        return $poorScore = 60;
    } elseif ($poorRate < 5) {
        return $poorScore = 50;
    } elseif ($poorRate < 6) {
        return $poorScore = 40;
    } elseif ($poorRate <= 7) {
        return $poorScore = 30;
    } elseif ($poorRate <= 9) {
        return $poorScore = 20;
    } elseif ($poorRate < 11) {
        return $poorScore = 10;
    } else return $poorScore = 0;
}
// 충분한 물섭취 기준 점수 계산
function getWaterScore($waterTankNum, $waterTankClean, $waterTankTime)
{
    $waterScore = 0;
    // 음수조 수 기준 합격
    if ($waterTankNum == 0) {
        // 음수조 위생 청결 or 보통
        if ($waterTankClean < 2) {
            // 음수 행동 매우 양호 or 보통 
            if ($waterTankTime < 2) {
                return $waterScore = 100;
            } else {
                return $waterScore = 80;
            }
        }
        // 음수조 위생 더러움
        else {
            if ($waterTankTime < 2) {
                return $waterScore = 60;
            } else {
                return $waterScore = 45;
            }
        }
    }
    // 음수조 수 기준 초과
    else {
        // 음수조 위생 청결 or 보통
        if ($waterTankClean < 2) {
            if ($waterTankTime < 2) {
                return $waterScore = 55;
            } else {
                return $waterScore = 40;
            }
        }
        // 음수조 위생 더러움
        else {
            if ($waterTankTime < 2) {
                return $waterScore = 35;
            } else {
                return $waterScore = 20;
            }
        }
    }
}
// protocol 1 계산
function getProtocolOne($poorScore, $waterScore)
{
    return ($poorScore * 0.7) + ($waterScore * 0.3);
}


// 프로토콜 2 (편한 축사 환경)
// 깔짚 수분 간이측정 점수 계산
function getStrawScore($strawFeadTank, $strawNormal, $strawRestingPlace)
{
    $strawScore = 0;
    if ($strawFeadTank <= 1 && $strawNormal <= 1 && $strawRestingPlace <= 1) {
        return $strawScore = 100;
    } else if ($strawFeadTank <= 2 && $strawNormal <= 2 && $strawRestingPlace <= 2) {
        return $strawScore = 80;
    } else if ($strawFeadTank <= 3 && $strawNormal <= 3 && $strawRestingPlace <= 3) {
        return $strawScore = 60;
    } else if ($strawFeadTank <= 4 && $strawNormal <= 4 && $strawRestingPlace <= 4) {
        return $strawScore = 40;
    } else {
        return $strawScore = 20;
    }
}
// 가축 외형위생 점수 계산
function getOutwardHygieneScore($outwardHygiene)
{
    $outwardHygieneScore = 0;
    if ($outwardHygiene == 0) {
        return $outwardHygieneScore = 100;
    } elseif ($outwardHygiene <= 3) {
        return $outwardHygieneScore = 90;
    } elseif ($outwardHygiene <= 6) {
        return $outwardHygieneScore = 80;
    } elseif ($outwardHygiene <= 9) {
        return $outwardHygieneScore = 70;
    } elseif ($outwardHygiene <= 13) {
        return $outwardHygieneScore = 60;
    } elseif ($outwardHygiene <= 18) {
        return $outwardHygieneScore = 50;
    } elseif ($outwardHygiene <= 23) {
        return $outwardHygieneScore = 40;
    } elseif ($outwardHygiene <= 29) {
        return $outwardHygieneScore = 30;
    } elseif ($outwardHygiene <= 37) {
        return $outwardHygieneScore = 20;
    } elseif ($outwardHygiene <= 52) {
        return $outwardHygieneScore = 10;
    } else {
        return $outwardHygieneScore = 0;
    }
}

// 편안한 휴식(깔짚 수분 , 가축 외형위생) 점수 계산
function getRestScore($strawScore, $outwardHygieneScore)
{
    return ($strawScore * 0.5) + ($outwardHygieneScore * 0.5);
}
// 혹서기 - 그늘, 환기팬, 안개분무 시설 점수 계산
function getSummerRestScore($shade, $summerVentilating, $mistSpary)
{
    $summerRestScore = 0;
    // 충분한 그늘 항목 "예"인 경우
    if ($shade == 1) {
        // 충분한 풍속 항목 "예"인 경우
        if ($summerVentilating  == 1) {
            //안개분무 풍속 "예"인 경우
            if ($mistSpary == 1) {
                return $summerRestScore = 100;
            } else {
                return $summerRestScore = 80;
            }
        } else {
            if ($mistSpary == 1) {
                return $summerRestScore = 60;
            } else {
                return $summerRestScore = 45;
            }
        }
    } else {
        if($summerVentilating == 1){
            if($mistSpary == 1){
                return $summerRestScore = 55;
            }else {
                return $summerRestScore = 40;
            }
        } else {
            if($mistSpary == 1) {
                return $summerRestScore = 20;
            }else {
                return $summerRestScore = 0;
            }
        }
    }
}
// 혹한기 - 바람차단시설, 환기시설
function getWinterRestScore($windBlock,$winterVentilating) {
    $windRestScore = 0;
    // 바람차단시설 항목 "예"인 경우
    if($windBlock == 1){
        // 최소 풍속시설 항목 "예"인 경우
        if($winterVentilating == 1){
            return $windRestScore = 100;
        }else {
            return $windRestScore = 70;
        }
         // 바람차단시설 항목 "아니오 "인 경우
    } else {
        if($winterVentilating == 1) {
            return $windRestScore = 40;
        }else {
            return $windRestScore = 20;
        }
    }
}
// 혹한기 포유송아지 열환경, 환기 세부 점수 계산
function getWinterCalfRestScore($straw,$warm,$windBlock){
    $winterCalfRestScore = 0;
    // 충분한 깔짚 항목 "예"
    if($straw == 1){
        // 충분한 보온 항목 "예"
        if($warm == 1){
            // 바람 차단 시설 "예"
            if($windBlock == 1) {
                return $winterCalfRestScore = 100;
            } else {
                return $winterCalfRestScore = 80;
            }
        }
        // 충분한 보온 항목 "아니오"
        else {
            if($windBlock == 1) {
                return $winterCalfRestScore = 60;
            } else {
                return $winterCalfRestScore = 45;
            }
        }
    }
    // 충분한 깔짚 항목 "아니오"
    else {
        if($warm == 1){
            if($windBlock == 1){
                return $winterCalfRestScore = 55;
            }else {
                return $winterCalfRestScore = 40;
            }
        }else {
            if($windBlock == 1){
                return $winterCalfRestScore = 20;
            }else {
                return $winterCalfRestScore = 0;
            }
        }
    }
}

// 편안한 열환경과 환기(혹서기 + 혹한기) 점수 계산
// category == 1 비육농장
// category == 2 or else 번식농장 및 일괄사육농장
function getWarmVentilationScore($summerRestScore,$winterRestScore,$winterCalfRestScore,$category){
    $warmVentilationScore = 0;
    if($category == 1) {
        $warmVentilationScore = ($summerRestScore*0.7) + ($winterRestScore * 0.3);
        return $warmVentilationScore;
    } else {
        // 여기 좀 이상한 거 같기도 (송아지혹서기*0.25)+(송아지혹한기*0.25) 라고 적혀있는데 계산한건 (송아지혹한기*0.5) 이느낌 
        $warmVentilationScore = ($summerRestScore*0.35) + ($winterRestScore * 0.15) +($winterCalfRestScore * 0.5);
        return $warmVentilationScore;
    }
}
// protocol 2 계산
function getProtocolTwo($restScore,$warmVentilationScore) {
    return ($restScore * 0.6) + ($warmVentilationScore * 0.4);
}