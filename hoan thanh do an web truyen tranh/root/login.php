<?php

	include 'class_home.php';


// Khởi tạo class_home.php
$homelib = new homelib();

// Kiểm tra có bấm nút Đăng ký hay không! nếu có thực hiện đăng ký
if (isset ( $_POST ["login_action"] )) {
	$message = $homelib->login();
	$error = $message[0];
	$data = $message[1];
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Đăng Nhập</title>

</head>
<body>

<div class="login-form">
	<h1>Đăng Nhập</h1>
	<?php echo isset($error['message']) ? $error['message'] : ''; ?>
	<form method="post" action="login.php">
		<div class =cont>
		<table cellspacing="0" cellpadding="5">
			<tr>
				<td>Tên Đăng Nhập</td>
				<td><input type="text" name="username" id="username"
					value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" />
                  <?php echo isset($error['username']) ? $error['username'] : ''; ?>
               </td>
			</tr>
			<tr>
				<td>Nhập Mật khẩu</td>
				<td><input type="text" name="password" id="password"
					value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" />
                  <?php echo isset($error['password']) ? $error['password'] : ''; ?>
               </td>
			</tr>
			<tr>
				<td><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></td>
				<td><input type="submit" name="login_action" value="Đăng nhập" /></td>
			</tr>
		</table>
			</div>
	</form>
	<td><a  href="register.php"> <input type="submit" value="Đăng ký" /></a></td>

	</div>

</body>
<style>
.login-form{
    width: 100%;
    max-width: 300px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border: 2px dotted #cccccc;
    border-radius: 10px;
}

</style>

</html>


