<?php
// Bắt đầu hoặc tiếp tục phiên làm việc
session_start();

// Hủy bỏ tất cả các biến phiên làm việc
$_SESSION = array();

// Hủy bỏ phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập hoặc trang chính
header("Location: login.php"); // Thay thế "login.php" bằng trang bạn muốn chuyển hướng sau khi đăng xuất
exit();
?>
