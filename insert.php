<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.

        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $age=$_POST['age'];
        $num=$_POST['num'];
        $sam=$_POST['sam'];

        if(empty($name)){
            $errMSG = "이름을 입력하세요.";
        }
        else if(empty($tel)){
            $errMSG = "전화번호를 입력하세요.";
        }
        else if(empty($age)){
            $errMSG = "나이를 입력하세요.";
        }


        if(!isset($errMSG)) // 이름과 나라 모두 입력이 되었다면 
        {
            try{
                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다. 
                $stmt = $con->prepare('INSERT INTO person(name, tel, age, num, sam) VALUES(:name, :tel, :age, :num, :sam)');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':tel', $tel);
                $stmt->bindParam(':age', $age);
                $stmt->bindParam(':num', $num);
                $stmt->bindParam(':sam', $sam);

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