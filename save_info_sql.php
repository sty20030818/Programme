<?php
header('Content-Type: application/json');

// 获取 POST 请求的数据
$data = json_decode(file_get_contents('php://input'), true);

// 数据库连接信息
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 生成2000以内的随机数
$randomNumber = rand(1, 2000);

// 存储个人信息和对应的随机数到数据库表
$sql = "INSERT INTO your_table_name (class, name, id, contact, random_number)
VALUES ('{$data['classValue']}', '{$data['nameValue']}', '{$data['idValue']}', '{$data['contactValue']}', $randomNumber)";

if ($conn->query($sql) === TRUE) {
    // 返回随机数
    echo json_encode(['randomNumber' => $randomNumber]);
} else {
    echo json_encode(['error' => '存储数据失败']);
}

// 关闭数据库连接
$conn->close();
?>
