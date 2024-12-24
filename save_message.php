<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu JSON từ yêu cầu
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra nếu tin nhắn tồn tại
    if (isset($data['message'])) {
        $message = $data['message'];
        $file = 'messages.txt';  // Đường dẫn đến file tin nhắn

        // Kiểm tra khả năng ghi vào file
        if (file_put_contents($file, $message . "\n", FILE_APPEND) === false) {
            // Nếu không thể ghi vào file, thông báo lỗi
            echo "Không thể ghi vào file.";
        } else {
            // Nếu thành công, thông báo lưu tin nhắn
            echo "Tin nhắn đã được lưu thành công.";
        }
    } else {
        // Nếu không có tin nhắn, trả về lỗi 400
        http_response_code(400);
        echo "Không tìm thấy tin nhắn để lưu.";
    }
} else {
    // Nếu phương thức không phải POST, trả về lỗi 405
    http_response_code(405);
    echo "Phương thức không được hỗ trợ.";
}
?>
