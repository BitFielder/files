<?php
// MySQL 데이터베이스 연결 설정
$servername = "localhost";
$username = "ashe152";
$password = "sniping45!";
$dbname = "ashe152";

// 데이터베이스 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// GET 방식으로 전달된 데이터 확인
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $intemp = isset($_GET['intemp']) ? $_GET['intemp'] : null;
    $outtemp = isset($_GET['outtemp']) ? $_GET['outtemp'] : null;
    $inhumi = isset($_GET['inhumi']) ? $_GET['inhumi'] : null;
    $outhumi = isset($_GET['outhumi']) ? $_GET['outhumi'] : null;
    $matter = isset($_GET['matter']) ? $_GET['matter'] : null;
    $camic = isset($_GET['camic']) ? $_GET['camic'] : null;

    // 온습도 및 가스 데이터가 유효한지 확인
    if ($intemp !== null && $outtemp !== null &&
        $inhumi !== null && $outhumi !== null &&
        $matter !== null && $camic !== null) {
        // 데이터베이스에 데이터 업데이트
        $sql = "UPDATE testtable1 SET
                intemp = '$intemp',
                outtemp = '$outtemp',
                inhumi = '$inhumi',
                outhumi = '$outhumi',
                matter = '$matter',
                camic = '$camic'
                WHERE code = 1";

        if ($conn->query($sql) === TRUE) {
            echo "Data received and logged successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid data received.";
    }
} else {
    echo "Invalid request method.";
}

// 데이터베이스 연결 종료
$conn->close();
?>