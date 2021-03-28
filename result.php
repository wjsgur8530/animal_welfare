<?php
// 프로토콜 1 (소의 수척, 좋은 사료와 물)
// 수척 정도 (충분한 영양섭취 기준점수) 계산
function getPoorScore($poorRate)
{
    $poorScore = 0;
    if ($poorRate == 0) {
        $poorScore = 100;
    } elseif ($poorRate < 1) {
        $poorScore = 90;
    } elseif ($poorRate < 2) {
        $poorScore = 80;
    } elseif ($poorRate < 3) {
        $poorScore = 70;
    } elseif ($poorRate < 4) {
        $poorScore = 60;
    } elseif ($poorRate < 5) {
        $poorScore = 50;
    } elseif ($poorRate < 6) {
        $poorScore = 40;
    } elseif ($poorRate <= 7) {
        $poorScore = 30;
    } elseif ($poorRate <= 9) {
        $poorScore = 20;
    } elseif ($poorRate < 11) {
        $poorScore = 10;
    } else  $poorScore = 0;

    return $poorScore;
}
// 충분한 물섭취 기준 점수 계산
function getWaterScore($waterTankNum, $waterTankClean, $waterTankTime)
{
    $waterScore = 0;
    // 음수조 수 기준 합격
    if ($waterTankNum == 1) {
        // 음수조 위생 청결 or 보통
        if ($waterTankClean <= 2) {
            // 음수 행동 매우 양호 or 보통 
            if ($waterTankTime <= 2) {
                $waterScore = 100;
            } else {
                $waterScore = 80;
            }
        }
        // 음수조 위생 더러움
        else {
            if ($waterTankTime <= 2) {
                $waterScore = 60;
            } else {
                $waterScore = 45;
            }
        }
    }
    // 음수조 수 기준 초과
    else {
        // 음수조 위생 청결 or 보통
        if ($waterTankClean <= 2) {
            if ($waterTankTime <= 2) {
                $waterScore = 55;
            } else {
                $waterScore = 40;
            }
        }
        // 음수조 위생 더러움
        else {
            if ($waterTankTime <= 2) {
                $waterScore = 35;
            } else {
                $waterScore = 20;
            }
        }
    }
    return $waterScore;
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
        $strawScore = 100;
    } else if ($strawFeadTank <= 2 && $strawNormal <= 2 && $strawRestingPlace <= 2) {
        $strawScore = 80;
    } else if ($strawFeadTank <= 3 && $strawNormal <= 3 && $strawRestingPlace <= 3) {
        $strawScore = 60;
    } else if ($strawFeadTank <= 4 && $strawNormal <= 4 && $strawRestingPlace <= 4) {
        $strawScore = 40;
    } else {
        $strawScore = 20;
    }
    return $strawScore;
}
// 가축 외형위생 점수 계산
function getOutwardHygieneScore($outwardHygiene)
{
    $outwardHygieneScore = 0;
    if ($outwardHygiene == 0) {
        $outwardHygieneScore = 100;
    } elseif ($outwardHygiene <= 3) {
        $outwardHygieneScore = 90;
    } elseif ($outwardHygiene <= 6) {
        $outwardHygieneScore = 80;
    } elseif ($outwardHygiene <= 9) {
        $outwardHygieneScore = 70;
    } elseif ($outwardHygiene <= 13) {
        $outwardHygieneScore = 60;
    } elseif ($outwardHygiene <= 18) {
        $outwardHygieneScore = 50;
    } elseif ($outwardHygiene <= 23) {
        $outwardHygieneScore = 40;
    } elseif ($outwardHygiene <= 29) {
        $outwardHygieneScore = 30;
    } elseif ($outwardHygiene <= 37) {
        $outwardHygieneScore = 20;
    } elseif ($outwardHygiene <= 52) {
        $outwardHygieneScore = 10;
    } else {
        $outwardHygieneScore = 0;
    }
    return $outwardHygieneScore;
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
                $summerRestScore = 100;
            } else {
                $summerRestScore = 80;
            }
        } else {
            if ($mistSpary == 1) {
                $summerRestScore = 60;
            } else {
                $summerRestScore = 45;
            }
        }
    } else {
        if ($summerVentilating == 1) {
            if ($mistSpary == 1) {
                $summerRestScore = 55;
            } else {
                $summerRestScore = 40;
            }
        } else {
            if ($mistSpary == 1) {
                $summerRestScore = 20;
            } else {
                $summerRestScore = 0;
            }
        }
    }
    return $summerRestScore;
}
// 혹한기 - 바람차단시설, 환기시설
function getWinterRestScore($windBlock, $winterVentilating)
{
    $windRestScore = 0;
    // 바람차단시설 항목 "예"인 경우
    if ($windBlock == 1) {
        // 최소 풍속시설 항목 "예"인 경우
        if ($winterVentilating == 1) {
            $windRestScore = 100;
        } else {
            $windRestScore = 70;
        }
        // 바람차단시설 항목 "아니오 "인 경우
    } else {
        if ($winterVentilating == 1) {
            $windRestScore = 40;
        } else {
            $windRestScore = 20;
        }
    }
    return $windRestScore;
}
// 혹한기 포유송아지 열환경, 환기 세부 점수 계산
function getWinterCalfRestScore($straw, $warm, $windBlock)
{
    $winterCalfRestScore = 0;
    // 충분한 깔짚 항목 "예"
    if ($straw == 1) {
        // 충분한 보온 항목 "예"
        if ($warm == 1) {
            // 바람 차단 시설 "예"
            if ($windBlock == 1) {
                $winterCalfRestScore = 100;
            } else {
                $winterCalfRestScore = 80;
            }
        }
        // 충분한 보온 항목 "아니오"
        else {
            if ($windBlock == 1) {
                $winterCalfRestScore = 60;
            } else {
                $winterCalfRestScore = 45;
            }
        }
    }
    // 충분한 깔짚 항목 "아니오"
    else {
        if ($warm == 1) {
            if ($windBlock == 1) {
                $winterCalfRestScore = 55;
            } else {
                $winterCalfRestScore = 40;
            }
        } else {
            if ($windBlock == 1) {
                $winterCalfRestScore = 20;
            } else {
                $winterCalfRestScore = 0;
            }
        }
    }
    return $winterCalfRestScore;
}

// 편안한 열환경과 환기(혹서기 + 혹한기) 점수 계산
// category == 1 비육농장
// category == 2 or else 번식농장 및 일괄사육농장
function getWarmVentilationScore($summerRestScore, $winterRestScore, $winterCalfRestScore, $category)
{
    $warmVentilationScore = 0;
    if ($category == 1) {
        $warmVentilationScore = ($summerRestScore * 0.7) + ($winterRestScore * 0.3);
    } else {
        // 여기 좀 이상한 거 같기도 (송아지혹서기*0.25)+(송아지혹한기*0.25) 라고 적혀있는데 계산한건 (송아지혹한기*0.5) 이느낌 
        $warmVentilationScore = ($summerRestScore * 0.35) + ($winterRestScore * 0.15) + ($winterCalfRestScore * 0.5);
    }
    return $warmVentilationScore;
}
// protocol 2 계산
function getProtocolTwo($restScore, $warmVentilationScore)
{
    return ($restScore * 0.6) + ($warmVentilationScore * 0.4);
}

// protocol 3 ( 양호한 건강상태 )
// 다리절음 점수 계산 경미한/ 심한
function getLimpScore($limp)
{
    $limpScore = 0;
    if ($limp == 0) {
        $limpScore = 100;
    } elseif ($limp <= 1.5) {
        $limpScore = 90;
    } elseif ($limp <= 3) {
        $limpScore = 80;
    } elseif ($limp <= 5) {
        $limpScore = 70;
    } elseif ($limp <= 7) {
        $limpScore = 60;
    } elseif ($limp <= 10) {
        $limpScore = 50;
    } elseif ($limp <= 13) {
        $limpScore = 40;
    } elseif ($limp <= 20) {
        $limpScore = 30;
    } elseif ($limp <= 31) {
        $limpScore = 20;
    } elseif ($limp <= 49) {
        $limpScore = 10;
    } else {
        $limpScore = 0;
    }
    return $limpScore;
}
// 외피변형 점수 계산 
// 심각한 / 경미한 수정
// p.64  세부 기준점수표에 대한 게산식 없음
function getHairLoss($hairLoss)
{
    $hairLossScore = 0;
    if ($hairLoss == 0) {
        $hairLossScore = 100;
    } elseif ($hairLoss <= 4) {
        $hairLossScore = 90;
    } elseif ($hairLoss <= 8) {
        $hairLossScore = 80;
    } elseif ($hairLoss <= 13) {
        $hairLossScore = 70;
    } elseif ($hairLoss <= 18) {
        $hairLossScore = 60;
    } elseif ($hairLoss <= 24) {
        $hairLossScore = 50;
    } elseif ($hairLoss <= 31) {
        $hairLossScore = 40;
    } elseif ($hairLoss <= 40) {
        $hairLossScore = 30;
    } elseif ($hairLoss <= 52) {
        $hairLossScore = 20;
    } elseif ($hairLoss <= 72) {
        $hairLossScore = 10;
    } else {
        $hairLossScore = 0;
    }
    return $hairLossScore;
}
// 상해의 최소화 종합 점수 계산 p.64
function getMinimiztionOfInjury($limpScore, $hairLossScore)
{
    return ($limpScore * 0.6) + ($hairLossScore * 0.4);
}

// 질병 점수 계산 (기침, 비강분비물, 안구분비물, 호흡장애, 설사, 반추위팽창, 폐사율)
// 문제점:
// 상태가 좋은데도 "주의"를 줘버리면 100점이 나올 수 없는 구조.
// "주의" 1개, "경보" 1개가 입력됐을 때 "경보"가 되도록 출력되어야 함.
// 경보 한계점 "미만" => "주의", 경보 한계점 "초과" => "경보".
// 정작 경보 한계점에 대한 "주의" 또는 "경보" 표시가 없음.
// 경계점 5%, 3%, 10%, 6%는 "이상"으로 간주하여 작성됨.
function getDiseaseSectionOne($runnyNose, $ophthalmicSecretion)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 비강분비물 상태 좋음, 안구분비물 상태 좋음 => "0"
    if ($runnyNose < 5 && $ophthalmicSecretion < 3) {
        return $sectionScores;
    }
    // 비강분비물 상태 좋음, 안구분비물(주의) => "주의"
    elseif ($runnyNose < 5 && 3 <= $ophthalmicSecretion && $ophthalmicSecretion < 6) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 비강분비물(주의), 안구분비물 상태 좋음 => "주의"
    elseif (5 <= $runnyNose && $runnyNose < 10 && $ophthalmicSecretion < 3) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 비강분비물(주의), 안구분비물(주의) => "주의"
    elseif (5 <= $runnyNose && $runnyNose < 10 && 3 <= $ophthalmicSecretion && $ophthalmicSecretion < 6) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 비강, 안구분비물 중 1개라도 "경보" => "경보"
    elseif (10 <= $runnyNose || 6 <= $ophthalmicSecretion) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}





// 질병 영역 2 계산 (기침, 호흡장애)
function getDiseaseSectionTwo($cough, $numOfSample, $respiratoryFailure)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    $coughScore = ($cough / $numOfSample) * 100;
    // 기침 상태 좋음, 호흡장애 상태 좋음 => "0"
    if ($coughScore < 4 && $respiratoryFailure < 5) {
        return $sectionScores;
    }
    // 기침 상태 좋음, 호흡장애(주의) => "주의"
    elseif ($coughScore < 4 && 5 <= $respiratoryFailure && $respiratoryFailure < 10) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기침(주의), 호흡장애 상태 좋음 => "주의"
    elseif (4 <= $coughScore && $coughScore < 8 && $respiratoryFailure < 4) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기침(주의), 호흡장애(주의) => "주의"
    elseif (4 <= $coughScore && $coughScore < 8 && 5 <= $respiratoryFailure && $respiratoryFailure < 10) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기침, 호흡장애 중 1개라도 "경보" => "경보"
    elseif (8 <= $coughScore || 10 <= $respiratoryFailure) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}
// 질병 영역 3 계산 (반추위 팽창, 설사)
function getDiseaseSectionThree($ruminant, $diarrhea)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 반추위 팽창, 설사 상태 좋음 => "0"
    if ($ruminant < 5 && $diarrhea < 3) {
        return $sectionScores;
    }
    // 반추위 팽창 상태 좋음, 설사(주의) => "주의"
    elseif ($ruminant < 5 && 3 <= $diarrhea && $diarrhea < 6) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 반추위 팽창(주의), 설사 좋음 => "주의"
    elseif (5 <= $ruminant && $ruminant < 10 && $diarrhea < 3) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 반추위 팽창(주의), 설사(주의) => "주의"
    elseif (5 <= $ruminant && $ruminant < 10 && 3 <= $diarrhea && $diarrhea < 6) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 반추위 팽창 ,설사 중 1개라도 "경보" => "경보"
    elseif (10 <= $ruminant || 6 <= $diarrhea) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}
// 질병 영역 4 계산 (폐사율)
// 여기 이상하네 
function getDiseaseSectionFour($fallDead)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 폐사율 상태 좋음 => 0
    if ($fallDead < 2)
        return $sectionScores;
    // 폐사율 상태 주의
    if (2 <= $fallDead && $fallDead < 4) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
        // 폐사율 상태 경보  
    } elseif (4 <= $fallDead) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}
// section 1,2,3,4 의 care, warning 점수 합산 
function getCareWarningScore($sectionOneScore, $sectionTwoScore, $sectionThreeScore, $sectionFourScore)
{
    $careWarningScore = array("care" => 0, "warning" => 0);

    $careWarningScore["care"] = $sectionOneScore["care"] + $sectionTwoScore["care"] + $sectionThreeScore["care"] + $sectionFourScore["care"];
    $careWarningScore["warning"] = $sectionOneScore["warning"] + $sectionTwoScore["warning"] + $sectionThreeScore["warning"] + $sectionFourScore["warning"];

    return $careWarningScore;
}
// 질병 종합 점수 계산
function getDiseaseScore($careWarningScore)
{
    $care = $careWarningScore["care"];
    $warning = $careWarningScore["warning"];
    $diseaseScore = (100 / 4) * (4 - (($care) + 3 * ($warning)) / 3);

    return round($diseaseScore);
}
// 제각 점수 계산
// 누락된 부분이 "사후진통제"만 사용했을 경우
function getHornRemovalScore($horn, $hornAnesthesia, $hornPainkiller)
{
    $hornRemovalScore = 0;
    // 제각안함
    if ($horn == 1) {
        $hornRemovalScore = 100;
    } // 송아지 제각 가열 방식
    elseif ($horn == 2) {
        // 마취제 사용
        if ($hornAnesthesia == 1) {
            // 사후진통제 사용
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 75;
            } else {
                $hornRemovalScore = 52;
            }
        }
        // 마취제 미사용
        else {
            if ($hornPainkiller == 1) {
                // 사후 진통제만 사용했을 경우 (누락 부분)
                $hornRemovalScore = 49;
            }
            // 처치 없음
            else {
                $hornRemovalScore = 28;
            }
        }
    }
    // 송아지 제각 화학적 방식
    elseif ($horn == 3) {
        // 마취제 사용
        if ($hornAnesthesia == 1) {
            // 사후진통제 사용
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 58;
            } else {
                $hornRemovalScore = 39;
            }
        }
        // 마취제 미사용
        else {
            // 사후 진통제만 사용했을 경우 (누락 부분)
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 41;
            } else {
                $hornRemovalScore = 20;
            }
        }
    }
    // 성우 제각
    // 송아지는 사후진통제만 했을 때 점수가 마취제 점수보다 높은데 왜 성우는 더 높지 마취제가
    else {
        if ($hornAnesthesia == 1) {
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 27;
            } else {
                $hornRemovalScore = 17;
            }
        } else {
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 16;
            } else {
                $hornRemovalScore = 2;
            }
        }
    }
    return $hornRemovalScore;
}
// 거세 점수 계산 
// **프로토콜이랑 맞추느라 조건문 순서 바꿔서 안드로이드도 추가 변경 필요함**
function getCastrationScore($castration, $castrationAnesthesia, $castrationPainkiller)
{
    $castrationScore = 0;
    // 거세 안함 
    if ($castration == 1) {
        $castrationScore  = 100;
    }
    // 외과적 수술
    elseif ($castration == 2) {
        if ($castrationAnesthesia == 1) {
            if ($castrationPainkiller == 1) {
                $castrationScore = 34;
            } else {
                $castrationScore = 21;
            }
        } else {
            //"사후진통제"만 사용했을 경우 (누락 부분)
            if ($castrationPainkiller == 1) {
                $castrationScore = 20;
            } else {
                $castrationScore = 0;
            }
        }
    }
    // 고무링
    elseif ($castration == 3) {
        if ($castrationAnesthesia == 1) {
            if ($castrationPainkiller == 1) {
                $castrationScore = 21;
            } else {
                $castrationScore = 17;
            }
        } else {
            //"사후진통제"만 사용했을 경우 (누락 부분)
            if ($castrationPainkiller == 1) {
                $castrationScore = 17;
            } else {
                $castrationScore = 2;
            }
        }
    }
    // Burdizzo 
    elseif ($castration == 4) {
        if ($castrationAnesthesia == 1) {
            if ($castrationPainkiller == 1) {
                $castrationScore = 35;
            } else {
                $castrationScore = 21;
            }
        } else {
            //"사후진통제"만 사용했을 경우 (누락 부분)
            if ($castrationPainkiller == 1) {
                $castrationScore = 19;
            } else {
                $castrationScore = 0;
            }
        }
    }
    return $castrationScore;
}

// 고통의 최소화(제각+거세) 종합 점수 계산
function getMinimiztionOfPainScore($hornRemovalScore, $castrationScore)
{
    return ($hornRemovalScore * 0.7) + ($castrationScore * 0.3);
}
// protocol 3 종합 점수 계산
function getProtocolThree($minimizationOfInjuryScore, $diseaseScore, $minimizationOfPainScore)
{
    return ($minimizationOfInjuryScore * 0.35) + ($diseaseScore * 0.4) + ($minimizationOfPainScore * 0.25);
}
// 사회적 행동의 표현(투쟁행동, 화합행동)" 종합 기준점수
function getStruggleScore($struggle, $harmony)
{
    // 투쟁행동 비율 계산
    $struggleRatio = ($struggle / ($struggle + $harmony)) * 100;
    $struggleScore = 0;
    // 투쟁행동빈도 0.5 이하일때
    if ($struggle <= 0.5) {
        if ($struggleRatio > 100) {
            return $struggleScore = -1;
        }
        if ($struggleRatio == 100) {
            $struggleScore = 58;
        } else if ($struggleRatio >= 90) {
            $struggleScore = 62;
        } else if ($struggleRatio >= 80) {
            $struggleScore = 67;
        } else if ($struggleRatio >= 70) {
            $struggleScore = 73;
        } else if ($struggleRatio >= 60) {
            $struggleScore = 78;
        } else if ($struggleRatio >= 50) {
            $struggleScore = 83;
        } else if ($struggleRatio >= 40) {
            $struggleScore = 87;
        } else if ($struggleRatio >= 30) {
            $struggleScore = 91;
        } else if ($struggleRatio >= 20) {
            $struggleScore = 93;
        } else if ($struggleRatio >= 10) {
            $struggleScore = 95;
        } else {
            $struggleScore = 100;
        }
        return $struggleScore;
    } // 투쟁행동빈도 0.5 초과, 1.5 이하일때 
    else if (0.5 < $struggle && $struggle <= 1.5) {
        if ($struggleRatio > 100) {
            return $struggleScore = -1;
        }
        if ($struggleRatio == 100) {
            $struggleScore = 34;
        } else if ($struggleRatio >= 90) {
            $struggleScore = 41;
        } else if ($struggleRatio >= 80) {
            $struggleScore = 47;
        } else if ($struggleRatio >= 70) {
            $struggleScore = 52;
        } else if ($struggleRatio >= 60) {
            $struggleScore = 57;
        } else if ($struggleRatio >= 50) {
            $struggleScore = 61;
        } else if ($struggleRatio >= 40) {
            $struggleScore = 65;
        } else if ($struggleRatio >= 30) {
            $struggleScore = 67;
        } else if ($struggleRatio >= 20) {
            $struggleScore = 69;
        } else if ($struggleRatio >= 10) {
            $struggleScore = 72;
        } else {
            $struggleScore = 100;
        }
    } // 투쟁행동빈도 1.5 초과, 3 이하일때 
    else if (1.5 < $struggle && $struggle <= 3) {
        if ($struggleRatio > 100) {
            return $struggleScore = -1;
        }
        if ($struggleRatio == 100) {
            $struggleScore = 25;
        } else if ($struggleRatio >= 90) {
            $struggleScore = 30;
        } else if ($struggleRatio >= 80) {
            $struggleScore = 35;
        } else if ($struggleRatio >= 70) {
            $struggleScore = 39;
        } else if ($struggleRatio >= 60) {
            $struggleScore = 42;
        } else if ($struggleRatio >= 50) {
            $struggleScore = 45;
        } else if ($struggleRatio >= 40) {
            $struggleScore = 47;
        } else if ($struggleRatio >= 30) {
            $struggleScore = 48;
        } else if ($struggleRatio >= 20) {
            $struggleScore = 49;
        } else if ($struggleRatio >= 10) {
            $struggleScore = 52;
        } else {
            $struggleScore = 100;
        }
        // 40 % 점수에서 왜 내려가는 지?
    } // 투쟁행동빈도 3 초과, 8 이하일때 
    else if (3 < $struggle && $struggle <= 8) {
        if ($struggleRatio > 100) {
            return $struggleScore = -1;
        }
        if ($struggleRatio == 100) {
            $struggleScore = 8;
        } else if ($struggleRatio >= 90) {
            $struggleScore = 13;
        } else if ($struggleRatio >= 80) {
            $struggleScore = 16;
        } else if ($struggleRatio >= 70) {
            $struggleScore = 19;
        } else if ($struggleRatio >= 60) {
            $struggleScore = 22;
        } else if ($struggleRatio >= 50) {
            $struggleScore = 24;
        } else if ($struggleRatio >= 40) {
            // 왜 여기서 점수가 내려가는지?
            $struggleScore = 20;
        } else if ($struggleRatio >= 30) {
            $struggleScore = 27;
        } else if ($struggleRatio >= 20) {
            $struggleScore = 28;
        } else if ($struggleRatio >= 10) {
            $struggleScore = 30;
        } else {
            $struggleScore = 100;
        }
    } // 투쟁행동빈도 8 초과일때
    else if (8 < $struggle) {
        if ($struggleRatio > 100) {
            return $struggleScore = -1;
        }
        if ($struggleRatio == 100) {
            $struggleScore = 0;
        } else if ($struggleRatio >= 90) {
            $struggleScore = 3;
        } else if ($struggleRatio >= 80) {
            $struggleScore = 3;
        } else if ($struggleRatio >= 70) {
            $struggleScore = 4;
        } else if ($struggleRatio >= 60) {
            $struggleScore = 5;
        } else if ($struggleRatio >= 50) {
            $struggleScore = 6;
        } else if ($struggleRatio >= 40) {
            $struggleScore = 6;
        } else if ($struggleRatio >= 30) {
            $struggleScore = 6;
        } else if ($struggleRatio >= 20) {
            $struggleScore = 7;
        } else if ($struggleRatio >= 10) {
            $struggleScore = 8;
        } else {
            $struggleScore = 100;
        }
    }
}
// 편안한 사람-가축 관계(회피거리) 종합 점수 계산
function untouchableCowScore($touchNear, $touchFar, $touchImpossibility)
{
    // 만질 수 없는 소의 비율
    $untouchableCow = ($touchNear + (3 * $touchFar) + (5 * $touchImpossibility)) / 5;
    $untouchableCowScore = 0;
    if ($untouchableCow == 0) {
        $untouchableCowScore = 100;
    } elseif (1 <= $untouchableCow   && $untouchableCow <= 7) {
        $untouchableCowScore = 95;
    } elseif (8 <= $untouchableCow   && $untouchableCow <= 13) {
        $untouchableCowScore = 90;
    } elseif (14 <= $untouchableCow   && $untouchableCow <= 18) {
        $untouchableCowScore = 85;
    } elseif (19 <= $untouchableCow   && $untouchableCow <= 22) {
        $untouchableCowScore = 80;
    } elseif (23 <= $untouchableCow   && $untouchableCow <= 26) {
        $untouchableCowScore = 75;
    } elseif (27 <= $untouchableCow   && $untouchableCow <= 29) {
        $untouchableCowScore = 70;
    } elseif (30 <= $untouchableCow   && $untouchableCow <= 32) {
        $untouchableCowScore = 65;
    } elseif (33 <= $untouchableCow   && $untouchableCow <= 35) {
        $untouchableCowScore = 60;
    } elseif (36 <= $untouchableCow   && $untouchableCow <= 38) {
        $untouchableCowScore = 55;
    } elseif (39 <= $untouchableCow   && $untouchableCow <= 41) {
        $untouchableCowScore = 50;
    } elseif (42 <= $untouchableCow   && $untouchableCow <= 45) {
        $untouchableCowScore = 45;
    } elseif (46 <= $untouchableCow   && $untouchableCow <= 49) {
        $untouchableCowScore = 40;
    } elseif (50 <= $untouchableCow   && $untouchableCow <= 54) {
        $untouchableCowScore = 35;
    } elseif (55 <= $untouchableCow   && $untouchableCow <= 59) {
        $untouchableCowScore = 30;
    } elseif (60 <= $untouchableCow   && $untouchableCow <= 66) {
        $untouchableCowScore = 25;
    } elseif (67 <= $untouchableCow   && $untouchableCow <= 73) {
        $untouchableCowScore = 20;
    } elseif (74 <= $untouchableCow   && $untouchableCow <= 80) {
        $untouchableCowScore = 15;
    } elseif (86 <= $untouchableCow   && $untouchableCow <= 91) {
        $untouchableCowScore = 10;
    } elseif (92 <= $untouchableCow   && $untouchableCow <= 92) {
        $untouchableCowScore = 5;
    } elseif (94 <= $untouchableCow   && $untouchableCow <= 100) {
        $untouchableCowScore = 0;
    }
    return $untouchableCowScore;
}
// protocol 4 종합 점수 계산
function getProtocolFour($struggleScore,$untouchableCowScore){
    return ($struggleScore*0.65)+($untouchableCowScore*0.35);
}

// protocol 1,2,3,4 점수 합산
function getTotalScore($protocolScoreOne,$protocolScoreTow,$protocolScoreThree,$protocolScoreFour){
    return $protocolScoreOne+$protocolScoreTow+$protocolScoreThree+$protocolScoreFour;
}
?>
 
