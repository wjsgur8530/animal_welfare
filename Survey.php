<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.

        $poor=$_POST['poor'];
        $water_tank_num=$_POST['water_tank_num'];
        $water_tank_clean=$_POST['water_tank_clean'];
        $water_tank_time=$_POST['water_tank_time'];
        $straw_fead_tank=$_POST['straw_fead_tank'];
        $straw_normal=$_POST['straw_normal'];
        $straw_resting_place=$_POST['straw_resting_place'];
        $outward_hygiene=$_POST['outward_hygiene'];
        $shade=$_POST['shade'];
        $summer_ventilating=$_POST['summer_ventilating'];
        $mist_spray=$_POST['mist_spray'];
        $wind_block=$_POST['wind_block'];
        $winter_ventilating=$_POST['winter_ventilating'];
        $winter_straw=$_POST['winter_straw'];
        $calf_warm=$_POST['calf_warm'];
        $calf_wind_block=$_POST['calf_wind_block'];
        $limp=$_POST['limp'];
        $hair_loss=$_POST['hair_loss'];
        $cough=$_POST['cough'];
        $runny_nose=$_POST['runny_nose'];
        $ophthalmic_secretion=$_POST['ophthalmic_secretion'];
        $respiratory_failure=$_POST['respiratory_failure'];
        $diarrhea=$_POST['diarrhea'];
        $ruminant=$_POST['ruminant'];
        $fall_dead=$_POST['fall_dead'];
        $horn=$_POST['horn'];
        $horn_anesthesia=$_POST['horn_anesthesia'];
        $horn_painkiller=$_POST['horn_painkiller'];
        $castration=$_POST['castration'];
        $castration_anesthesia=$_POST['castration_anesthesia'];
        $castration_painkiller=$_POST['castration_painkiller'];
        $struggle=$_POST['struggle'];
        $harmony=$_POST['harmony'];
        $touch_possibility=$_POST['touch_possibility'];
        $touch_near=$_POST['touch_near'];
        $touch_far=$_POST['touch_far'];
        $touch_impossibility=$_POST['touch_impossibility'];

        if(empty($poor)){
            $errMSG = "1번 문항이 비었습니다.";
        }
    
                
        if(!isset($errMSG)) // 이름과 나라 모두 입력이 되었다면 
        {
            try{
                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다. 
                $stmt = $con->prepare('INSERT INTO survey(poor, water_tank_num, water_tank_clean, water_tank_time, straw_fead_tank, straw_normal, straw_resting_place, outward_hygiene, shade, summer_ventilating, mist_spray, wind_block, winter_ventilating, winter_straw, calf_warm, calf_wind_block, limp, hair_loss, cough, runny_nose, ophthalmic_secretion, respiratory_failure, diarrhea, ruminant, fall_dead, horn, horn_anesthesia, horn_painkiller, castration, castration_anesthesia, castration_painkiller, struggle, harmony, touch_possibility, touch_near, touch_far, touch_impossibility) VALUES(:poor, :water_tank_num, :water_tank_clean, :water_tank_time, :straw_fead_tank, :straw_normal, :straw_resting_place, :outward_hygiene, :shade, :summer_ventilating, :mist_spray, :wind_block, :winter_ventilating, :winter_straw, :calf_warm, :calf_wind_block, :limp, :hair_loss, :cough, :runny_nose, :ophthalmic_secretion, :respiratory_failure, :diarrhea, :ruminant, :fall_dead, :horn, :horn_anesthesia, :horn_painkiller, :castration, :castration_anesthesia, :castration_painkiller, :struggle, :harmony, :touch_possibility, :touch_near, :touch_far, :touch_impossibility )');
                $stmt->bindParam(':poor', $poor);
                $stmt->bindParam(':water_tank_num', $water_tank_num);
                $stmt->bindParam(':water_tank_clean', $water_tank_clean);
                $stmt->bindParam(':water_tank_time', $water_tank_time);
                $stmt->bindParam(':straw_fead_tank', $straw_fead_tank);
                $stmt->bindParam(':straw_normal', $straw_normal);
                $stmt->bindParam(':straw_resting_place', $straw_resting_place);
                $stmt->bindParam(':outward_hygiene', $outward_hygiene);
                $stmt->bindParam(':shade', $shade);
                $stmt->bindParam(':summer_ventilating', $summer_ventilating);
                $stmt->bindParam(':mist_spray', $mist_spray);
                $stmt->bindParam(':wind_block', $wind_block);
                $stmt->bindParam(':winter_ventilating', $winter_ventilating);
                $stmt->bindParam(':winter_straw', $winter_straw);
                $stmt->bindParam(':calf_warm', $calf_warm);
                $stmt->bindParam(':calf_wind_block', $calf_wind_block);
                $stmt->bindParam(':limp', $limp);
                $stmt->bindParam(':hair_loss', $hair_loss);
                $stmt->bindParam(':cough', $cough);
                $stmt->bindParam(':runny_nose', $runny_nose);
                $stmt->bindParam(':ophthalmic_secretion', $ophthalmic_secretion);
                $stmt->bindParam(':respiratory_failure', $respiratory_failure);
                $stmt->bindParam(':diarrhea', $diarrhea);
                $stmt->bindParam(':ruminant', $ruminant);
                $stmt->bindParam(':fall_dead', $fall_dead);
                $stmt->bindParam(':horn', $horn);
                $stmt->bindParam(':horn_anesthesia', $horn_anesthesia);
                $stmt->bindParam(':horn_painkiller', $horn_painkiller);
                $stmt->bindParam(':castration', $castration);
                $stmt->bindParam(':castration_anesthesia', $castration_anesthesia);
                $stmt->bindParam(':castration_painkiller', $castration_painkiller);
                $stmt->bindParam(':struggle', $struggle);
                $stmt->bindParam(':harmony', $harmony);
                $stmt->bindParam(':touch_possibility', $touch_possibility);
                $stmt->bindParam(':touch_near', $touch_near);
                $stmt->bindParam(':touch_far', $touch_far);
                $stmt->bindParam(':touch_impossibility', $touch_impossibility);

                if($stmt->execute())
                {
                    $successMSG = "정보 입력이 성공적입니다.";
                }
                else
                {
                    $errMSG = "정보 입력에 실패하셨습니다.";
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
            }
        }

    }

?>


<?php 
    if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;

	$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
   
    if( !$android )
    {
?>
    <html>
       <body>

            <form action="<?php $_PHP_SELF ?>" method="POST">
                Name: <input type = "text" name = "name" />
                tel: <input type = "text" name = "tel" />
                age: <input type = "text" name = "age" />
                num: <input type = "text" name = "num" />
                sam: <input type = "text" name = "sam" />
                <input type = "submit" name = "submit" />
            </form>
       
       </body>
    </html>

<?php 
    }
?>