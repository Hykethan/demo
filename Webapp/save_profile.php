<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "myapp"; // 請改成你實際使用的資料庫

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gender = $_POST['gender'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? 0;
    $height = $_POST['height'] ?? 0;
    $weight = $_POST['weight'] ?? 0;

    $sql = "INSERT INTO personal_data (gender, name, age, height, weight) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidd", $gender, $name, $age, $height, $weight);

    if ($stmt->execute()) {
        echo "資料儲存成功！";
        // 可跳轉至主頁：header("Location: home.html");
    } else {
        echo "資料儲存失敗：" . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
