<?php
include 'class_home.php';

$homelib = new homelib();
if(isset($_POST["register_action"])){
$message=$homelib->register();
	$error = $message[0];
	$data = $message[1];
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
<title>Đăng Kí</title>
</head>

<body>
<div class="login-form">
	<h1>Đăng ký</h1>
	<form method="post" action="register.php">
		<table cellspacing="0" cellpadding="5">
			<tr>
				<?php echo isset($error['note']) ? $error['note'] : ' '; ?>
				<td>Tên Đăng Nhập</td>
				<td><input type="text" name="username" id="username"
					value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" />
                  <?php echo isset($error['username']) ? $error['username'] : ''; ?>
               </td>
			</tr>
			<tr>
				<td>Nhập Email</td>
				<td><input type="text" name="email" id="email"
					value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" />
                  <?php echo isset($error['email']) ? $error['email'] : ''; ?>
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
				<td><input type="submit" name="register_action" value="Đăng ký" /></td>
			</tr>
		</table>
	</form>
	<a  href="login.php"> <input type="submit" value="Đăng Nhập" /></a>
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