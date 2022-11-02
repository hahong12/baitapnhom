<?php
        include 'config.php';
        // Nếu click vào nút Lưu mật khẩu
        if (isset($_POST['save']))
        {
            // Lưu Session
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        }
        
            // Hiển thị thông tin lưu trong Session
            // phải kiểm tra có tồn tại không trước khi hiển thị nó ra
            if (isset($_SESSION['email']))
            {
                echo "Chào bạn"." ".$_SESSION['email']." "."đã đăng nhập"."<br>";
            }

?>
            <a href="main2.php"><br>Về trang chủ</a>

