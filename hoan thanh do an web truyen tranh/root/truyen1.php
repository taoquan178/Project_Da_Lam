<?php
    require_once 'class_home.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Thí Thần Thánh Chiến Chi Lộ</title>
</head>
<body>
    
<div class="menu">

	<ul> 
		<li class="logo"> <a href="index.php"> <img src="img/logo.png"> </a> </li>


	    <li> <a href="index.php"><i class="fas fa-home"></i>Trang chủ</a> </li>

		<li> <a href="truyentranh.php">Truyện Tranh</a> </li>

		<li> <a href="truyenchu.php">Truyện Chữ</a> </li>

        <?php if(isset($_COOKIE["user"])){?>
            <li class="nav-item">
             <h3> <span class="nav-link">Xin Chào! <?php echo $_COOKIE["user"]; ?></span> </h3>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Đăng xuất</a>
            </li>
			<?php 
			}
			else {
			?>
			<li class="nav-item">
				<a class="nav-link" href="login.php"> <i class="fas fa-sign-in-alt"></i>  Đăng nhập</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" href="register.php">Đăng ký</a>
			</li> -->
			<?php 
			}
			?>

	</ul>
</div>

<div class="gioithieutruyen">
<div class="tren">

    <ul> 
    
        <li> <a href="index.php"><i class="fas fa-home"></i>Trang chủ </a><i class="fas fa-chevron-right"></i> </li>

        <li> <a href="truyentranh.php">Đọc Truyện </a><i class="fas fa-chevron-right"></i> </li>

        <li> <a href="">Thí Thần Thánh Chiến Chi Lộ  </a></li>

        <li> <a href=""> - Chap 1 </a></li>

    </ul>

</div>
<p style="color: white; font-size: 18px;">Nội Dung Truyện: </p>
<p style="color: white; font-size: 18px;">Trần Tri Liệu là một học sinh giỏi ở thời hiện đại,
 thiên tài kiếm đạo, vì theo đuổi gái mà bị sét đánh
  rơi vào trong thế giới trò chơi, không cách nào trở
  ra được! Hắn muốn sống sót trong thế giới trò chơi
  này nhưng không ngờ lại đụng độ phải hàng khủng cấp
  Thần ngay khi vừa bắt đầu game! Người chơi Trần Tri
  Liệu chấp nhận số phận thất bại trước Thần hay bức
   phá để có thể trở về thế giới thật đây?</p>
<div class="up1"> <a style="color: white; text-decoration: none; font-size: 20px;" href="">Chap Tiếp Theo </a> </div>

</div>

<div class="truyen">
    <div class="anhtruyentranh">

        <div><img src="datatruyentranh/001.jpg"></div>
        <div><img src="datatruyentranh/002.jpg"></div>
        <div><img src="datatruyentranh/003.jpg"></div>
        <div><img src="datatruyentranh/004.jpg"></div>
        <div><img src="datatruyentranh/005.jpg"></div>
        <div><img src="datatruyentranh/006.jpg"></div>
        <div><img src="datatruyentranh/007.jpg"></div>
        <div><img src="datatruyentranh/008.jpg"></div>
        <div><img src="datatruyentranh/009.jpg"></div>

    </div>
</div>           
<div class="ketthuctruyen">
    <a href="index.php"> <img src="img/logo.png"> </a>

    <div class="up1"> <a href="">Chap Tiếp Theo </a> </div>

    <div class="tren">
        <ul> 
    
            <li> <a href="index.php"><i class="fas fa-home"></i>Trang chủ </a><i class="fas fa-chevron-right"></i> </li>
    
            <li> <a href="truyentranh.php">Truyện Tranh </a><i class="fas fa-chevron-right"></i> </li>
    
            <li> <a href="">Thí Thần Thánh Chiến Chi Lộ </a></li>
 
        </ul>
    </div>

    <div style="height: 50px;">
        <p>

        </p>
    </div>
    <a style="font-size: 16px;" > Gmail: taoquan178@gmail.com </a>

    <div class="up1"> <a style="font-size: 16px;"  href="">Facebook Cá Nhân: Nguyễn Trung Quân </a> </div>

</div>

</body>

<style>
body{
    background: rgb(0,212,255);
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(42,77,166,1) 0%, rgba(63,9,121,0.6786064767703957) 30%, rgba(2,0,36,1) 100%);
}
.truyen{
width: 500px;
margin: 20px auto;
padding: 20px 150px;
background-color: rgb(10, 52, 84, 0.44);
}
.item img{
width: 150px;
height: 200px;
border-radius: 10px;
}
h3{
font-weight: bold;
color: white;
}
.anhtruyentranh img{
    width: 500px;
}
.gioithieutruyen{
    height: 230px;
    padding: 20px 150px;
    width: 800px;
    margin: 10px auto;
    background-color: rgb(10, 52, 84, 0.44);
}
.ketthuctruyen{
    color: white;
    height: 160px;
    padding: 20px 150px;
    width: 800px;
    margin: 10px auto;
    background-color: rgb(10, 52, 84, 0.44); 
}
.tren ul li{
    display: inline-block;
    padding: 2px;
    color: white;

}
.tren ul li a{
    font-size: 20px;
    color: white;
    text-decoration: none;
}
.ketthuctruyen a{
    font-size: 20px;
    text-decoration: none;
    color: white;
}
.up1{
    float: right;
    display: flex;
}
.duoi{
    float: right;
    display: flex;
}

.menu {
    text-align: center;
    /* width: 100%;
    height: 150px; */
    background-color: rgb(10, 52, 84, 0.44);
}
.menu ul li {
    display: inline-block;
    padding: 10px;
}
.menu ul li a{
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    color: #eac65f;
}

</style>
</html>