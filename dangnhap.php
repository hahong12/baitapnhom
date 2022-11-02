<?php
// Include database, session
include 'config.php';
//biến nhận các lỗi khi không nhập dữ liệu
$err = [];
// Hàm isset() được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ của máy tính hay chưa
//nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];       
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
                if(!preg_match("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/",$password)){
                    if (strlen($password) < 6 || strlen($password) > 10) {
                        $err['password'] = "Mật khẩu bạn vừa nhập không đúng định dạng,
                        có ít nhất 1 kí tự viết hoa, số và kí tự đặc biệt!";
                    }
                }
            }
// Các biến chứa code JS về thông báo
$show_alert = "<script>$('#formSignin .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignin .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignin .alert').attr('class', 'alert alert-success');</script>";
 
//truy vấn dữ liệu
$sql = "SELECT * FROM user WHERE email = '$email'";
$query = mysqli_query($conn, $sql);

//Kiểm tra thông tin email, password đúng trong csdl sql chưa?
$checkEmail = mysqli_num_rows($query);
if($checkEmail ==1){
    $sql1 = "SELECT * FROM user WHERE password = '$password'";
    $query1 = mysqli_query($conn, $sql1);//hàm truy vấn csdl
    $checkpass = mysqli_num_rows($query1);//trả về số lượng hàng trong một tập kết quả
        if($checkpass ==1){
            //lưu vào session phải khởi tạo session ở config.php  Session dùng để lưu trữ dữ liệu trên Server 
            //và đồng thời nó sẽ có một đoạn code dữ liệu được lưu trữ ở client (cookie). Còn Cookie thì lưu trữ dữ liệu trên máy Client

            //dùng cookie để lưu thông tin đăng nhập, cookie chỉ là file 
            //nhỏ được Server chỉ định lưu trữ trên máy tính của Client và PHP có thể truy xuất tới được
            //Cookie sẽ không bị mất khi bạn đóng ứng dụng, nó phụ thuộc vào thời gian sống mà bạn thiết lập cho nó
            include 'session.php';
            // Hiển thị thông tin lưu trong Session
            // phải kiểm tra có tồn tại không trước khi hiển thị nó ra
            if (isset($_SESSION['email']))
            {
                echo "Chào bạn". $_SESSION['email']."đã đăng nhập";
            }
            setcookie('email',$email,time()+3600,'/','',0,0);
            setcookie('password',$password,time()+3600,'/','',0,0);    
            header('location: main2.php');
        }
        else{ 
            echo "Sai mật khẩu! Vui lòng đăng nhập lại!!!";
        }
    }
else {
    echo "Email không tồn tại! Vui lòng đăng nhập lại!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="">
    <head>
		<meta charset = "utf-8">
        <meta http-equiv="X-UA_Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập</title>

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
                        <legend>Đăng nhập</legend>
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
                        <div class="wthree-text">
						    <label class="anim">
                                <input type="checkbox" class="checkbox" value="" name ="save">
                                <!-- <?php if(isset($_COOKIE['email'])) echo "checked"?> -->
                                <span>Lưu mật khẩu</span>
						    </label>
					    </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập </button>
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