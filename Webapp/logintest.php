
<?php
$fake_user = "user";
$fake_password = "123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $account = $_POST['account'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($account === $fake_user && $password === $fake_password) {
        header("Location: main.html"); // 成功跳轉
        exit();
    } else {
        echo "帳號密碼錯誤!";
    }
}
?>


