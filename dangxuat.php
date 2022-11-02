<?php
class Logout {
	public function __construct()
	{
		unset($_SESSION['email']); // xóa session đã tạo khi đăng nhập
		unset($_SESSION['password']); // xóa session đã tạo khi đăng nhập
		header('location:main.php'); // chuyển hướng về trang chủ
	}
}
$logout = new Logout();
?>