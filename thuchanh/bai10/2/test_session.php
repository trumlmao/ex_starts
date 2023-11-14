<?php
session_start(); // Khởi động session

if (!isset($_SESSION['name'])) {
  $_SESSION['name'] = "hocweb.com.vn"; // Khởi tạo một biến session 'name' với giá trị ban đầu là 'hocweb.com.vn'
  $_SESSION['age'] = 120; // Khởi tạo một biến session 'age' với giá trị ban đầu là 120
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Session</title>
</head>
<body>
<?php
// Hiển thị thông tin từ session
echo "Tên bạn là: " . $_SESSION['name'] . "<br/>";
echo "Số tuổi của bạn: " . $_SESSION['age'] . "<br/>";
?>
<a href="test_session.php">Click here!</a> <br>
<a href="huy_session.php">Hủy session 'name'</a>
</body>
</html>
