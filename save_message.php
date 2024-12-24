<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Đã nhận yêu cầu POST!";
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['message'])) {
        $message = $data['message'];
        $file = 'messages.txt';
        file_put_contents($file, $message . "\n", FILE_APPEND);
        echo "Tin nhắn đã được lưu thành công.";
    } else {
        http_response_code(400);
        echo "Không tìm thấy tin nhắn để lưu.";
    }
} else {
    http_response_code(405);
    echo "Phương thức không được hỗ trợ.";
}
?>
