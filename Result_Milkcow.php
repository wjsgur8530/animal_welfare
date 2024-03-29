<?php
// 젖소
// 프로토콜 1 (소의 수척, 좋은 사료와 물)
// 수척 정도 (충분한 영양섭취 기준점수 계산)
function getPoorScore($poorRate)
{
    $poorScore = 0;
    if ($poorRate == 0) {
        return $poorScore = 100;
    } else if ($poorRate <= 3) {
        $poorScore = 90;
    } else if ($poorRate <= 6) {
        $poorScore = 80;
    } else if ($poorRate <= 8) {
        $poorScore = 70;
    } else if ($poorRate <= 10) {
        $poorScore = 60;
    } else if ($poorRate <= 13) {
        $poorScore = 50;
    } else if ($poorRate <= 16) {
        $poorScore = 40;
    } else if ($poorRate <= 20) {
        $poorScore = 30;
    } else if ($poorRate <= 26) {
        $poorScore = 20;
    } else if ($poorRate <= 44) {
        $poorScore = 10;
    } else {
        $poorScore = 0;
    }
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
    return ($poorScore * 0.65) + ($waterScore * 0.35);
    //(충분한 영양섭취 기준점수 X 0.65) + (충분한 물섭취 기준점수 X 0.35)
}

// 프로토콜 2 (편한 축사 환경)
// 편한 축사 환경 점수 계산
function getFreeStallScore($freestallNum, $sitCollision, $freeStallAreaOutCollision, $sitActionTime, $outwardHygieneLeg, $outwardHygieneBack, $outwardHygieneBreast)
{
    $freeStallActionScore = 0;
    // 프리스톨 수 점수 계산
    if ($freestallNum == 0) {
        $freestallNum = 100;
    }
    else if ($freestallNum == 1) {
        $freestallNum = 70;
    }
    else {
        $freestallNum = 40;
    }
    
    // 앉기 시 충돌 계산
    if ($sitCollision == 0) {
        $sitCollision = 100;
    }
    else if ($sitCollision == 1) {
        $sitCollision = 70;
    }
    else {
        $sitCollision = 40;
    }
    
    // 프리스톨 영역 외 앉기
    if ($freeStallAreaOutCollision == 0) {
        $freeStallAreaOutCollision = 100;
    }
    else if ($freeStallAreaOutCollision == 1) {
        $freeStallAreaOutCollision = 70;
    }
    else {
        $freeStallAreaOutCollision = 40;
    }
    
    // 앉기동작 소요시간
    if ($sitActionTime == 0) {
        $sitActionTime = 100;
    }
    else if ($sitActionTime == 1) {
        $sitActionTime = 70;
    }
    else {
        $sitActionTime = 40;
    }
    
    // 가축외형(뒤쪽 아랫다리) 위생
    if ($outwardHygieneLeg == 0) {
        $outwardHygieneLeg = 100;
    }
    else if ($outwardHygieneLeg == 1) {
        $outwardHygieneLeg = 70;
    }
    else {
        $outwardHygieneLeg = 40;
    }
    
    // 가축외형(뒷부분) 위생
    if ($outwardHygieneBack == 0) {
        $outwardHygieneBack = 100;
    }
    else if ($outwardHygieneBack == 1) {
        $outwardHygieneBack = 70;
    }
    else {
        $outwardHygieneBack = 40;
    }
    
    // 가축외형(유방) 위생
    if ($outwardHygieneBreast == 0) {
        $outwardHygieneBreast = 100;
    }
    else if ($outwardHygieneBreast == 1) {
        $outwardHygieneBreast = 70;
    }
    else {
        $outwardHygieneBreast = 40;
    }
    
    $freeStallActionScore = ($freeStallNum * 0.15) + ($sitCollision * 0.10) + ($freeStallAreaOutCollision * 0.10) + ($sitActionTime * 0.25) + ($outwardHygieneLeg * 0.15) + ($outwardHygieneBack * 0.10) + ($outwardHygieneBreast * 0.15);
    return $freeStallActionScore;
}


function getRestScore($sitActionTime, $outwardHygieneLeg, $outwardHygieneBack, $outwardHygieneBreast)
{
    $restScore = 0;
    // 앉기동작 소요시간
    if ($sitActionTime == 0) {
        $sitActionTime = 100;
    }
    else if ($sitActionTime == 1) {
        $sitActionTime = 70;
    }
    else {
        $sitActionTime = 40;
    }
    
    // 가축외형(뒤쪽 아랫다리) 위생
    if ($outwardHygieneLeg == 0) {
        $outwardHygieneLeg = 100;
    }
    else if ($outwardHygieneLeg == 1) {
        $outwardHygieneLeg = 70;
    }
    else {
        $outwardHygieneLeg = 40;
    }
    
    // 가축외형(뒷부분) 위생
    if ($outwardHygieneBack == 0) {
        $outwardHygieneBack = 100;
    }
    else if ($outwardHygieneBack == 1) {
        $outwardHygieneBack = 70;
    }
    else {
        $outwardHygieneBack = 40;
    }
    
    // 가축외형(유방) 위생
    if ($outwardHygieneBreast == 0) {
        $outwardHygieneBreast = 100;
    }
    else if ($outwardHygieneBreast == 1) {
        $outwardHygieneBreast = 70;
    }
    else {
        $outwardHygieneBreast = 40;
    }
    
    $restScore = ($sitActionTime * 0.6) + ($outwardHygieneLeg * 0.15) + ($outwardHygieneBack * 0.10) + ($outwardHygieneBreast * 0.15);
    return $restScore;
}

// (송아지 포함)혹서기 - 그늘, 환기팬, 안개분무시설 점수 계산
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
        if($summerVentilating == 1){
            if($mistSpary == 1){
                $summerRestScore = 55;
            }else {
                $summerRestScore = 40;
            }
        } else {
            if($mistSpary == 1) {
                $summerRestScore = 20;
            }else {
                $summerRestScore = 0;
            }
        }
    }
    return $summerRestScore;
}

// (송아지 제외)혹한기 - 바람차단시설, 환기시설 점수 계산
function getWinterRestScore($windBlock, $winterVentilating) {
    $windRestScore = 0;
    // 바람차단시설 항목 "예"인 경우
    if($windBlock == 1){
        // 최소 풍속시설 항목 "예"인 경우
        if($winterVentilating == 1){
            $windRestScore = 100;
        }else {
            $windRestScore = 70;
        }
         // 바람차단시설 항목 "아니오 "인 경우
    } else {
        if($winterVentilating == 1) {
            $windRestScore = 40;
        }else {
            $windRestScore = 20;
        }
    }
    return $windRestScore;
}
    

// (포유송아지용)혹한기 포유송아지 열환경, 환기 세부 점수 계산
function getWinterCalfRestScore($straw, $warm, $windBlock){
    $winterCalfRestScore = 0;
    // 충분한 깔짚 항목 "예"
    if($straw == 1){
        // 충분한 보온 항목 "예"
        if($warm == 1){
            // 바람 차단 시설 "예"
            if($windBlock == 1) {
                $winterCalfRestScore = 100;
            } else {
                $winterCalfRestScore = 80;
            }
        }
        // 충분한 보온 항목 "아니오"
        else {
            if($windBlock == 1) {
                $winterCalfRestScore = 60;
            } else {
                $winterCalfRestScore = 45;
            }
        }
    }
    // 충분한 깔짚 항목 "아니오"
    else {
        if($warm == 1){
            if($windBlock == 1){
                $winterCalfRestScore = 55;
            }else {
                $winterCalfRestScore = 40;
            }
        }else {
            if($windBlock == 1){
                $winterCalfRestScore = 20;
            }else {
                $winterCalfRestScore = 0;
            }
        }
    }
    return $winterCalfRestScore;
}


// 편안한 열환경과 환기(혹서기 + 혹한기) 점수 계산
// 성우 축사 점수 + 송아지 축사 점수
// category == 3 일반 우사
// category == 4 프리스톨 우사
function getWarmVentilationScore($summerRestScore, $winterRestScore, $winterCalfRestScore, $category)
{
    $warmVentilationScore = 0;
    if($category == 3) {
        $warmVentilationScore = ($summerRestScore * 0.4) + ($winterRestScore * 0.2) + ($summerRestScore * 0.2) + ($winterCalfRestScore * 0.2);
    }
    else if($category == 4) {
        $warmVentilationScore = ($summerRestScore * 0.4) + ($winterRestScore * 0.2) + ($summerRestScore * 0.2) + ($winterCalfRestScore * 0.2);
    }
    return $warmVentilationScore;
}

// protocol 2 계산
// category == 3 일반 우사
// category == 4 프리스톨 우사
// 아 이거 먼가 잘못 짠거 같다... 오버로딩으로 짜야하나? 상효가 봐줘야 할 듯...
function getProtocolTwo($restScore, $freeStallActionScore, $warmVentilationScore, $category)
{
    if($category == 3) {
        $protocolTwoScore = ($restScore * 0.6) + ($warmVentilationScore * 0.4);
    }
    else if($category == 4) {
        $protocolTwoScore = ($freeStallActionScore * 0.6) + ($warmVentilationScore * 0.4);
    }
    return $protocolTwoScore;
}


// protocol 3 (양호한 건강상태(물리/생리적 건강))
// 상해의 최소화
// 다리절음 점수 계산
function getLimpScore($limp) // 경미한, 심각한으로 2개 써야함.
{
    $limpScore = 0;
    if ($limp == 0) {
        $limpScore = 100;
    } else if ($limp <= 1.5) {
        $limpScore = 90;
    } else if ($limp <= 3) {
        $limpScore = 80;
    } else if ($limp <= 5) {
        $limpScore = 70;
    } else if ($limp <= 7) {
        $limpScore = 60;
    } else if ($limp <= 10) {
        $limpScore = 50;
    } else if ($limp <= 13) {
        $limpScore = 40;
    } else if ($limp <= 20) {
        $limpScore = 30;
    } else if ($limp <= 31) {
        $limpScore = 20;
    } else if ($limp <= 48) { // 젖소 48%, 한육우 49%
        $limpScore = 10;
    } else {
        $limpScore = 0;
    }
    return $limpScore;
}


// 외피변형 점수 계산 
// p.101 어떻게 심한, 경미한 구분 입력을 2개 받아야 하나?
// 
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

// 상해의 최소화 종합 점수 계산 p.101
function getMinimiztionOfInjury($limpScore, $hairLossScore)
{
    return ($limpScore * 0.5) + ($hairLossScore * 0.5);
}


// 질병의 최소화
// 질병 점수 계산 (기침, 비강분비물, 안구분비물, 호흡장애, 설사, 외음부분비물, 우유 내 체세포 수, 폐사율, 난산, 기립불능 소)
// 질병 영역 1 계산 (비강분비물, 안구분비물 )
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
// 문제점:
// 상태가 좋은데도 "주의"를 줘버리면 100점이 나올 수 없는 구조.
// "주의" 1개, "경보" 1개가 입력됐을 때 "경보"가 되도록 출력되어야 함.
// 경보 한계점 "미만" => "주의", 경보 한계점 "초과" => "경보".
// 정작 경보 한계점에 대한 "주의" 또는 "경보" 표시가 없음.
// 경계점 5%, 3%, 10%, 6%는 "이상"으로 간주하여 작성됨.


// 질병 영역 2 계산 (기침, 호흡장애)
function getDiseaseSectionTwo($cough, $numOfSample, $respiratoryFailure)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    $coughScore = ($cough / $numOfSample) * 100;
    // 기침 상태 좋음, 호흡장애 상태 좋음 => "0"
    if($cough < 3 && $respiratoryFailure < 3.25) {
        return $sectionScores;
    }
    // 기침 상태 좋음, 호흡장애(주의) => "주의"
    elseif($cough < 3 && 3.25 <= $respiratoryFailure && $respiratoryFailure < 6.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기침(주의), 호흡장애 상태 좋음 => "주의"
    elseif(3 <= $cough && $cough < 6 && $respiratoryFailure < 3.25) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기침(주의), 호흡장애(주의) => "주의"
    elseif(3 <= $cough && $cough < 6 && 3.25 <= $respiratoryFailure && $respiratoryFailure < 6.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기침, 호흡장애 중 1개라도 "경보" =>
    elseif(6 <= $cough || 6.5 <= $respiratoryFailure) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    
    return $sectionScores;
}


// 질병 영역 3 계산 (설사)
function getDiseaseSectionThree($diarrhea)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    //설사 상태 좋음 => "0"
    if($diarrhea < 3.25) {
        return $sectionScores;
    }
    //설사(주의) => "주의"
    elseif($diarrhea < 6.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    //설사(경보) => "경보"
    elseif(6.5 <= $diarrhea) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}


// 질병 영역 4 계산 (유방염)
function getDiseaseSectionFour($breastInflammation)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 유방염 상태 좋음 => "0"
    if($breastInflammation < 8.75) {
        return $sectionScores;
    }
    // 유방염(주의) => "주의"
    elseif($breastInflammation < 17.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 유방염(경보) => "경보"
    elseif(17.5 <= $breastInflammation) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}

// 질병 영역 5 계산 (외음부분비물)
function getDiseaseSectionFive($outGenitalsSecretion)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 외음부분비물 상태 좋음 => "0"
    if($outGenitalsSecretion < 2.25) {
        return $sectionScores;
    }
    // 외음부분비물(주의) => "주의"
    elseif($outGenitalsSecretion < 4.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 외음부분비물(경보) => "경보"
    elseif(4.5 <= $outGenitalsSecretion) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}

// 질병 영역 6 계산 (난산)
function getDiseaseSectionSix($dystocia)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 난산 상태 좋음 => "0"
    if($dystocia < 2.75) {
        return $sectionScores;
    }
    // 난산(주의) => "주의"
    elseif($dystocia < 5.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 난산(경보) => "경보"
    elseif(5.5 <= $dystocia) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}

// 질병 영역 7 계산 (기립불능)
function getDiseaseSectionSeven($astasia)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 기립불능 상태 좋음 => "0"
    if($astasia < 2.75) {
        return $sectionScores;
    }
    // 기립불능(주의) => "주의"
    elseif($astasia < 5.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 기립불능(경보) => "경보"
    elseif(5.5 <= $astasia) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}

// 질병 영역 8 계산 (폐사율)
function getDiseaseSectionEight($fallDead)
{
    $sectionScores = array("care" => 0, "warning" => 0);
    // 폐사율(주의) => "주의"
    if (2.25 < $fallDead && $fallDead < 4.5) {
        $sectionScores["care"] = $sectionScores["care"] + 1;
    }
    // 폐사율(경보) => "경보"
    elseif (4.5 <= $fallDead) {
        $sectionScores["warning"] = $sectionScores["warning"] + 1;
    }
    return $sectionScores;
}


// section 1,2,3,4,5,6,7,8 의 care, warning 점수 합산 
function getCareWarningScore($sectionOneScore, $sectionTwoScore, $sectionThreeScore, $sectionFourScore, $sectionFiveScore, $sectionSixScore, $sectionSevenScore, $sectionEightScore)
{
    $careWarningScore = array("care" => 0, "warning" => 0);
    // "주의" 합산
    $careWarningScore["care"] = $sectionOneScore["care"] + $sectionTwoScore["care"] + $sectionThreeScore["care"] + $sectionFourScore["care"] + $sectionFiveScore["care"] + $sectionSixScore["care"] + $sectionSevenScore["care"] + $sectionEightScore["care"];
    
    // "경보" 합산
    $careWarningScore["warning"] = $sectionOneScore["warning"] + $sectionTwoScore["warning"] + $sectionThreeScore["warning"] + $sectionFourScore["warning"] + $sectionFiveScore["warning"] + $sectionSixScore["warning"] + $sectionSevenScore["warning"] + $sectionEightScore["warning"];

    return $careWarningScore;
}

// 질병 종합 점수 계산
function getDiseaseScore($careWarningScore)
{
    $care = $careWarningScore["care"];
    $warning = $careWarningScore["warning"];
    $diseaseScore = (100 / 8) * (8 - (($care) + 3 * ($warning)) / 3);

    return round($diseaseScore);
}

// 해당관리로 인한 고통
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
                $hornRemovalScore = 75; //마취, 진통 둘다
            } else {
                $hornRemovalScore = 52; //마취
            }
        }
        // 마취제 미사용
        else {
            if ($hornPainkiller == 1) {
                // 사후 진통제만 사용했을 경우 (누락 부분)
                $hornRemovalScore = 49; //사후 진통제
            }
            // 처치 없음
            else {
                $hornRemovalScore = 28; //처치 없음
            }
        }
    }
    // 송아지 제각 화학적 방식
    elseif ($horn == 3) {
        // 마취제 사용
        if ($hornAnesthesia == 1) {
            // 사후진통제 사용
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 58; //마취, 진통 둘다
            } else {
                $hornRemovalScore = 39; //마취
            }
        }
        // 마취제 미사용
        else {
            // 사후 진통제만 사용했을 경우 (누락 부분)
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 41; //사후 진통제
            } else {
                $hornRemovalScore = 20; //처치 없음
            }
        }
    }
    // 성우 제각
    // 송아지는 사후진통제만 했을 때 점수가 마취제 점수보다 높은데 왜 성우는 더 높지 마취제가
    else {
        if ($hornAnesthesia == 1) {
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 27; //마취, 진통 둘다
            } else {
                $hornRemovalScore = 17; //마취
            }
        } else {
            if ($hornPainkiller == 1) {
                $hornRemovalScore = 16; //사후 진통제
            } else {
                $hornRemovalScore = 2; //처치 없음
            }
        }
    }
    return $hornRemovalScore;
}

// protocol3 종합 점수 계산
// 상해의 최소화, 질병의 최소화, 해당관리로 인한 고통 최소화 점수 계산
function getProtocolThree($minimizationOfInjuryScore, $diseaseScore, $minimizationOfPainScore)
{
    return ($minimizationOfInjuryScore * 0.3) + ($diseaseScore * 0.5)+ ($minimizationOfPainScore * 0.2);
}


// 적절한 행동(정신적 건강상태)
// 사회적 행동의 표현(투쟁행동)
// 투쟁 행동(머리박치기, 투쟁행동빈도(머리박치기 제외))
function getStruggleScore($headButt, $struggle)
{
    // 사회적행동 지수
    $socialBehavior = 100 * ((43.8) - (4 * $headButt + 11 * $struggle)) / 43.8;
    
    // 투쟁행동 비율 계산
    // 투쟁행동 지수: 100 - [100 X [{43.8} - (4 X (머리박치기) + 11 X (머리박치기 제외 투쟁행동))] / 43.8
    // 100 - 사회적행동 지수
    $struggleRatio = 100 - $socialBehavior;
    $struggleScore = 0;
    
    if($struggleRatio == 0) {
        $struggleScore = 100;
    }
    else if($struggleRatio <= 4 ) {
        $struggleScore = 90;
    }
    else if($struggleRatio <= 9 ) {
        $struggleScore = 80;
    }
    else if($struggleRatio <= 14 ) {
        $struggleScore = 70;
    }
    else if($struggleRatio <= 19 ) {
        $struggleScore = 60;
    }
    else if($struggleRatio <= 25 ) {
        $struggleScore = 50;
    }
    else if($struggleRatio <= 32 ) {
        $struggleScore = 40;
    }
    else if($struggleRatio <= 41 ) {
        $struggleScore = 30;
    }
    else if($struggleRatio <= 53 ) {
        $struggleScore = 20;
    }
    else if($struggleRatio <= 71 ) {
        $struggleScore = 10;
    }
    else if($struggleRatio <= 100 ) {
        $struggleScore = 0;
    }
    return $struggleScore;
} // *투쟁 행동 프로토콜은 다시 봐야할 듯 값이 정확치 않음.


// 편안한 사람-가축 관계(회피거리) 종합 점수 계산
function untouchableCowScore($touchNear, $touchFar, $touchImpossibility)
{
    // 만질 수 없는 소의 비율
    $untouchableCow = ((3 * $touchNear) + (11 * $touchFar) + (26 * $touchImpossibility)) / 26;
    $untouchableCowScore = 0;
    if ($untouchableCow == 0) {
        $untouchableCowScore = 100;
    } elseif (1 <= $untouchableCow   && $untouchableCow <= 2) {
        $untouchableCowScore = 95;
    } elseif (3 <= $untouchableCow   && $untouchableCow <= 5) {
        $untouchableCowScore = 90;
    } elseif (6 <= $untouchableCow   && $untouchableCow <= 7) {
        $untouchableCowScore = 85;
    } elseif (8 <= $untouchableCow   && $untouchableCow <= 9) {
        $untouchableCowScore = 80;
    } elseif (10 <= $untouchableCow   && $untouchableCow <= 11) {
        $untouchableCowScore = 75;
    } elseif (12 <= $untouchableCow   && $untouchableCow <= 14) {
        $untouchableCowScore = 70;
    } elseif (15 <= $untouchableCow   && $untouchableCow <= 17) {
        $untouchableCowScore = 65;
    } elseif (18 <= $untouchableCow   && $untouchableCow <= 19) {
        $untouchableCowScore = 60;
    } elseif (20 <= $untouchableCow   && $untouchableCow <= 22) {
        $untouchableCowScore = 55;
    } elseif (23 <= $untouchableCow   && $untouchableCow <= 25) {
        $untouchableCowScore = 50;
    } elseif (26 <= $untouchableCow   && $untouchableCow <= 28) {
        $untouchableCowScore = 45;
    } elseif (29 <= $untouchableCow   && $untouchableCow <= 32) {
        $untouchableCowScore = 40;
    } elseif (33 <= $untouchableCow   && $untouchableCow <= 36) {
        $untouchableCowScore = 35;
    } elseif (37 <= $untouchableCow   && $untouchableCow <= 41) {
        $untouchableCowScore = 30;
    } elseif (42 <= $untouchableCow   && $untouchableCow <= 46) {
        $untouchableCowScore = 25;
    } elseif (47 <= $untouchableCow   && $untouchableCow <= 52) {
        $untouchableCowScore = 20;
    } elseif (53 <= $untouchableCow   && $untouchableCow <= 60) {
        $untouchableCowScore = 15;
    } elseif (61 <= $untouchableCow   && $untouchableCow <= 71) {
        $untouchableCowScore = 10;
    } elseif (72 <= $untouchableCow   && $untouchableCow <= 86) {
        $untouchableCowScore = 5;
    } elseif (87 <= $untouchableCow   && $untouchableCow <= 100) {
        $untouchableCowScore = 0;
    }
    return $untouchableCowScore;
}

// protocol 4 종합 점수 계산
function getProtocolFour($struggleScore, $untouchableCowScore){
    return ($struggleScore * 0.55)+($untouchableCowScore * 0.45);
}

// protocol 1,2,3,4 점수 합산
function getTotalScore($protocolScoreOne, $protocolScoreTow, $protocolScoreThree, $protocolScoreFour){
    return $protocolScoreOne + $protocolScoreTow + $protocolScoreThree + $protocolScoreFour;
}

?>
<?php
    //수척 정도 테스트
    echo "수척 정도 테스트: ". getPoorScore(10)."<br>";
    //음수조 테스트
    echo "음수조 테스트: ". getPoorScore(0, 0, 0)."<br>";
    //프로토콜1 계산
    echo "protocol1: ". getProtocolOne(60, 100)."<br>";
    echo "-----------------------<br>";
    //프리스톨 우사 테스트
    echo "프리스톨 우사 테스트: ". getFreeStallScore(1, 1, 0, 1, 0, 1, 0)."<br>";
    //일반 우사 테스트
    echo "일반 우사 테스트: ". getRestScore(1, 1, 1, 0)."<br>";
    //혹서기 테스트(둘다)
    echo "혹서기 테스트: ". getSummerRestScore(1, 1, 1)."<br>";
    //혹한기(송아지제외:성우만)
    echo "혹한기 테스트(송아지제외:성우만): ". getWinterRestScore(1, 1)."<br>";
    //혹한기(송아지용)
    echo "혹한기 테스트(포유송아지용): ". getWinterCalfRestScore(1, 1, 1)."<br>";
    //편안한 열환경과 환기 점수 계산
    echo "편안한 열환경과 환기 테스트: ". getWarmVentilationScore(60, 60, 50, 3)."<br>";
    //프로토콜2 계산
    echo "protocol2(프리스톨우사): ". getProtocolTwo(60, 70, 0, 3)."<br>";
    echo "protocol2(일반우사): ". getProtocolTwo(60, 0, 80, 3)."<br>";
    echo "-----------------------<br>";
    //다리절음 테스트
    echo "다리절음 테스트: ". getLimpScore(40)."<br>";
    //외피변형 테스트
    echo "외피변형 테스트: ". getHairLoss(30)."<br>";
    //상해의 최소화
    echo "상해의 최소화 테스트: ".getMinimiztionOfInjury(50, 40)."<br>";
    //질병1영역
    echo "질병1영역 테스트(비강,안구분비물): ".print_r(getDiseaseSectionOne(10, 6))."<br>";
    //질병2영역
    echo "질병2영역 테스트(기침,호흡장애): ".print_r(getDiseaseSectionTwo(6.5, 100, 6.5))."<br>";
    //질병3영역
    echo "질병3영역 테스트(설사): ".print_r(getDiseaseSectionThree(6.5))."<br>";
    //질병4영역
    echo "질병4영역 테스트(유방염): ".print_r(getDiseaseSectionFour(17.5))."<br>";
    //질병5영역
    echo "질병5영역 테스트(외음부분비물): ".print_r(getDiseaseSectionFive(4.5))."<br>";
    //질병6영역
    echo "질병6영역 테스트(난산): ".print_r(getDiseaseSectionSix(5.5))."<br>";
    //질병7영역
    echo "질병7영역 테스트(기립불능): ".print_r(getDiseaseSectionSeven(5.5))."<br>";
    //질병8영역
    echo "질병8영역 테스트(폐사율): ".print_r(getDiseaseSectionEight(4.5))."<br>";
    //주의 경보 합산
    echo "주의 경보 합산 테스트: ".print_r(getCareWarningScore(getDiseaseSectionOne(10, 6), getDiseaseSectionTwo(6.5, 100, 6.5), getDiseaseSectionThree(6.5), getDiseaseSectionFour(17.5), getDiseaseSectionFive(4.5), getDiseaseSectionSix(5.5), getDiseaseSectionSeven(5.5), getDiseaseSectionEight(4.5)))."<br>";
    //질병 종합 점수 테스트
    echo "질병 종합 점수 테스트: ". getDiseaseScore(getCareWarningScore(getDiseaseSectionOne(10, 6), getDiseaseSectionTwo(6.5, 100, 6.5), getDiseaseSectionThree(6.5), getDiseaseSectionFour(17.5), getDiseaseSectionFive(4.5), getDiseaseSectionSix(5.5), getDiseaseSectionSeven(5.5), getDiseaseSectionEight(4.5)))."<br>";
    //제각 점수 테스트
    echo "제각 점수 테스트: ".getHornRemovalScore(3, 1, 1)."<br>";
    //프로토콜3 계산
    echo "protocol3: ".getProtocolThree(getMinimiztionOfInjury(50, 40), getDiseaseScore(getCareWarningScore(getDiseaseSectionOne(10, 6), getDiseaseSectionTwo(6.5, 100, 6.5), getDiseaseSectionThree(6.5), getDiseaseSectionFour(17.5), getDiseaseSectionFive(4.5), getDiseaseSectionSix(5.5), getDiseaseSectionSeven(5.5), getDiseaseSectionEight(4.5))), getHornRemovalScore(3, 1, 1))."<br>";
    echo "-----------------------<br>";
    //투쟁행동 점수 테스트
    echo "투쟁행동 점수 테스트: ".getStruggleScore(0.1, 0.1)."<br>";
    //회피거리 점수 테스트
    echo "회피거리 점수 테스트: ".untouchableCowScore(10, 10, 10)."<br>";
    //프로토콜 4 계산
    echo "protocol4: ".getProtocolFour(getStruggleScore(0.1, 0.1), untouchableCowScore(10, 10, 10))."<br>";
    //전체 종합 점수
    echo "전체 종합 점수: ".getTotalScore(getProtocolOne(60, 100), getProtocolTwo(60, 70, 0, 3), getProtocolThree(getMinimiztionOfInjury(50, 40), getDiseaseScore(getCareWarningScore(getDiseaseSectionOne(10, 6), getDiseaseSectionTwo(6.5, 100, 6.5), getDiseaseSectionThree(6.5), getDiseaseSectionFour(17.5), getDiseaseSectionFive(4.5), getDiseaseSectionSix(5.5), getDiseaseSectionSeven(5.5), getDiseaseSectionEight(4.5))), getHornRemovalScore(3, 1, 1)), getProtocolFour(getStruggleScore(0.1, 0.1), untouchableCowScore(10, 10, 10)))."<br>";
?>
