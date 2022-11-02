<?php
include 'config.php';

//biến nhận các lỗi khi không nhập dữ liệu
$err = [];
// lấy dữ liệu từ hàm $_POST
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sdt = $_POST['sdt'];
        $ngaysinh =$_POST['ngaysinh'];
        
        //kiểm tra nếu nhập rỗng
        if(empty($email)){
            $err['email'] = 'Bạn chưa nhập email!';
        }
        else{
            // trả về true nếu đúng định dạng email
        if(!preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)){
            $err['email'] = 'Email không đúng định dạng!';
        }
        }
        if(empty($password)){
            $err['password'] = 'Bạn chưa nhập password!';
        }
        else{
                //Kiểm tra ràng buộc mật khẩu
                if(!preg_match("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/",$password))
                {
                $err['password'] = "Mật khẩu bạn vừa nhập không đúng định dạng,
                có ít nhất 1 kí tự viết hoa, số và kí tự đặc biệt!";
                }}
        if(empty($sdt)){
            $err['sdt'] = 'Bạn chưa nhập số điện thoại!';
        }
        else{
            //Kiểm tra số điện thoại nhập có đúng định dạng số điện thoại
        if(!preg_match("/^(09|03|07|08|05)+([0-9]{8})$/",$sdt))
        {
        $err['sdt'] = "Số điện thoại không đúng!";
        }
        }
        if(empty($ngaysinh)){
            $err['ngaysinh'] = 'Bạn chưa nhập ngày sinh!';
        }

        //var_dump(!empty($err));
        if(empty($err)){
            //dữ liệu đc lưu vào bảng user
            $sql = "INSERT INTO user (email,password,sdt,ngaysinh) VALUES ('$email', '$password', '$sdt', '$ngaysinh')";
            $query = mysqli_query($conn, $sql); 
            if($query){
                header('location: main.php');
            }
    }
}
?>
<!DOCTYPE html>
<html lang="">
    <head>
		<meta charset = "utf-8">
        <meta http-equiv="X-UA_Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng ký</title>

        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
        crossorigin="anonymous">

        <style>
            .has-error{
                color: red
            }
        </style>

    </head>
	<body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST" role="form">
                        <legend>Đăng ký tài khoản</legend>

                        <div class="form-group">
                        <label for="">Email:</lable>
			            <input type="text" class="form-control" id="" placeholder="vd:XX12@gmail.com" name= "email">
                            <div class="has-error"> <!-- nếu có lỗi sẽ in ra lỗi đó --> 
                                <span> <?php echo (isset($err['email']))?$err['email']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="">Password:</lable>
			            <input type="password" class="form-control" id="" placeholder="vd:P@o12345" name= "password">
                            <div class="has-error">
                                <span> <?php echo (isset($err['password']))?$err['password']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="">Số điện thoại:</lable>
			            <input type="text" class="form-control" id="" placeholder="vd:09xxxxxxxx" name= "sdt">
                            <div class="has-error">
                                <span> <?php echo (isset($err['sdt']))?$err['sdt']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh:</lable>
                                <input type="date" class="form-control" id="" placeholder="yyyy-mm-dd" name= "ngaysinh">
                                    <div class="has-error">
                                        <span> <?php echo (isset($err['ngaysinh']))?$err['ngaysinh']:'' ?></span>
                                    </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng ký </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery --> 
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
        crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
        <script src="Hello World"></script>

    </body>
    </html>