<?php
header('Content-Type: application/json');

// 获取 POST 请求的数据
$data = json_decode(file_get_contents('php://input'), true);

// 数据库文件
$file = 'data.json';
$database = [];

// 如果文件存在，读取数据
if (file_exists($file)) {
    $database = json_decode(file_get_contents($file), true);
}

// 构建唯一键
$key = $data['classValue'] . '-' . $data['nameValue'] . '-' . $data['idValue'];

// 检查是否存在先前的随机数
if (isset($database[$key])) {
    $randomNumber = $database[$key];
} else {
    // 生成2000以内的随机数
    $randomNumber = rand(1, 2000);

    // 存储新的随机数
    $database[$key] = $randomNumber;

    // 将数据写入文件
    file_put_contents($file, json_encode($database));
}

// 返回随机数
echo json_encode(['randomNumber' => $randomNumber]);
?>
