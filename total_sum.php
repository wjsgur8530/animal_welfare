<?php
   $conn = mysqli_connect("localhost", "root", "" , "");
   $sql = "SELECT * FROM survey order by poor desc limit 1;";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
       //전체 프로토콜 입력 값
       echo "survey1: " . $row["poor"]. "<br>". "survey2: " . $row["water_tank_num"]. "<br>";
       
       //신체 충실도
       if((float)$row["poor"] == 0){
           $poor = 100;
       }
       else if((float)$row["poor"] <= 0.5){
           $poor = 90;
       }
       else if((float)$row["poor"] <= 1){
           $poor = 80;
       }
       else if((float)$row["poor"] <= 2){
           $poor = 70;
       }
       else if((float)$row["poor"] <= 3){
           $poor = 60;
       }
       else if((float)$row["poor"] <= 4){
           $poor = 50;
       }
       else if((float)$row["poor"] <= 5){
           $poor = 40;
       }
       else if((float)$row["poor"] <= 6){
           $poor = 30;
       }
       else if((float)$row["poor"] <= 8){
           $poor = 20;
       }
       else if((float)$row["poor"] <= 10){
           $poor = 10;
       }
       else {
           $poor = 0;
       }
       
       //음수조 평가
       
       
       echo "신체 충실도 점수: ". "$poor". "<br>";
       $protocol1 = json_decode($poor);
       echo "프로토콜1값은: ";
           echo "$protocol1". "<br>";
       
       //json echo
       var_dump($protocol1);
       
       //json data insert --> mysql(result)
       $sql = "INSERT INTO result(protocol1) VALUES('$protocol1')";
       
       if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }

       
   }
   }else{
   echo "테이블에 데이터가 없습니다.";
   }
   mysqli_close($conn); // 디비 접속 닫기
?>
