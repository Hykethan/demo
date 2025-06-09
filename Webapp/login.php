<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "myapp"; // 改為你的資料庫名稱
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

// 確認是否來自 POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $account = $_POST['account'] ?? '';
    $password = $_POST['password'] ?? '';
    // 查詢帳密
    $sql = "SELECT * FROM users WHERE account = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $account, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // ✅ 登入成功 ➝ 導向 cindata.html
        header("Location: cindata.html");
        exit();
    } else {
        echo "帳號或密碼錯誤！";
    }
    $stmt->close();
}

$conn->close();
?>
