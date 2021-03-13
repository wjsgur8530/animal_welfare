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
function getFreeStallScore($freeStallNum, $sitCollision, $freeStallAreaOutCollision, $sitActionTime, $outwardHygieneLeg, $outwardHygieneBack, $outwardHygieneBreast)
{
    $freeStallActionScore = 0;
    // 프리스톨 수 점수 계산
    if ($freeStallNum == 0) {
        $freeStallNum = 100;
    }
    else if ($freeStallNum == 1) {
        $freeStallNum = 70;
    }
    else {
        $freeStallNum = 40;
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


?>
<?php
    //수척 정도 테스트
    echo "수척 정도 테스트: ". getPoorScore(10);
    //음수조 테스트
    echo "음수조 테스트: ". getPoorScore(0, 0, 0);
    //프로토콜1 계산
    echo "protocol1: ". getProtocolOne(60, 100);
    //프리스톨 우사 테스트
    echo "프리스톨 우사 테스트: ". getFreeStallScore(1, 1, 0, 1, 0, 1, 0);
    //일반 우사 테스트
    echo "일반 우사 테스트: ". getRestScore(1, 1, 1, 0);
    //혹서기 테스트(둘다)
    echo "혹서기 테스트: ". getSummerRestScore(1, 1, 1);
    //혹한기(송아지제외:성우만)
    echo "혹한기 테스트(송아지제외:성우만): ". getWinterRestScore(1, 1);
    //혹한기(송아지용)
    echo "혹한기 테스트(포유송아지용): ". getWinterCalfRestScore(1, 1, 1);
    //편안한 열환경과 환기 점수 계산
    echo "편안한 열환경과 환기 테스트: ". getWarmVentilationScore(60, 60, 50, 3);
    //프로토콜2 계산
    echo "protocol2(프리스톨우사): ". getProtocolTwo(60, 70, 0, 3);
    echo "protocol2(일반우사): ". getProtocolTwo(60, 0, 80, 3);
?>