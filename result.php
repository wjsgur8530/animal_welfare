<?php
// 프로토콜 1 (소의 수척, 좋은 사료와 물)
    // 수척 정도 (충분한 영양섭취 기준점수) 계산
    function get_poor_score($poor_rate) {
        $poor_score = 0;
        if($poor_rate == 0){return $poor_score = 100;} 
        elseif($poor_rate < 1) {return $poor_score = 90;}
        elseif($poor_rate < 2) {return $poor_score = 80;}
        elseif($poor_rate < 3) {return $poor_score = 70;}
        elseif($poor_rate < 4) {return $poor_score = 60;}
        elseif($poor_rate < 5) {return $poor_score = 50;}
        elseif($poor_rate < 6) {return $poor_score = 40;}
        elseif($poor_rate <= 7) {return $poor_score = 30;}
        elseif($poor_rate <= 9) {return $poor_score = 20;}
        elseif($poor_rate < 11) {return $poor_score = 10;}
        else return $poor_score = 0;
    }
    // 충분한 물섭취 기준 점수 계산
    function get_water_score($water_tank_num,$water_tank_clean,$water_tank_time) {
        $water_score = 0;
        // 음수조 수 기준 합격
        if($water_tank_num == 0){
            // 음수조 위생 청결 or 보통
            if($water_tank_clean < 2) {
                // 음수 행동 매우 양호 or 보통 
                if($water_tank_time < 2) {
                    return $water_score = 100;    
                }
                else {
                    return $water_score = 80;
                }
            }
            // 음수조 위생 더러움
            else {
                if($water_tank_time < 2) {
                    return $water_score = 60;
                }else {
                    return $water_score = 45;
                }
            }
        }
        // 음수조 수 기준 초과
        else {
            // 음수조 위생 청결 or 보통
            if($water_tank_clean < 2) {
                if($water_tank_time < 2) {
                    return $water_score = 55;
                }
                else {
                    return $water_score = 40;
                }
            }
            // 음수조 위생 더러움
            else {
                if($water_tank_time <2 ){
                    return $water_score = 35;
                }else {
                    return $water_score = 20;
                }
            }
        }
    }
// protocol 1 계산
    function get_protocol_1($poor_score,$water_score) {
        return ($poor_score * 0.7) + ($water_score * 0.3);
    }

