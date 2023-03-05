<?php
include 'class_home.php' ;
$id = $_GET['id'];  
$sql ="SELECT * FROM products Where prd_id = $id";

$query = mysqli_query($connect,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Truyện Chữ Của Quân</title>
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
			<?php 
			}
			?>

	</ul>
</div>
<?php
    while ($row = mysqli_fetch_assoc($query)) {?>
<div class="form">


       <div class="anh">

<img src="img/<?php echo $row['image']; ?>" width="200px" style="border-radius: 10px;" >

       </div>

    <div class="chitietsp">
    <h2 style="font-family: 'Pacifico', cursive;"><?php echo $row['prd_name']; ?></h2>
    <h3>Tác Giả: <?php echo $row['quantity']; ?></h3>
    <h3><p> Nội Dung Truyện:</p>  <?php echo $row['description']; ?></h3>
    </div>

</div>
<div class="form1">
<h3 style="font-family: 'Pacifico', cursive; text-align: center;"><?php echo $row['prd_name']; ?></h3>
<h2><?php echo $row['price']; ?></h2>
</div>



<div class="ketthuctruyen">
    <a href="index.php"> <img src="img/logo.png"> </a>

    <div class="up1"> <a href="">Chap Tiếp Theo </a> </div>

    <div class="tren">
        <ul> 
    
            <li> <a href="index.php"><i class="fas fa-home"></i>Trang chủ </a><i class="fas fa-chevron-right"></i> </li>
    
            <li> <a href="truyenchu.php">Truyện Chữ </a><i class="fas fa-chevron-right"></i> </li>
    
            <li><?php echo $row['prd_name']; ?> </li>
 
        </ul>
    </div>

    <div style="height: 50px;">
        <p>

        </p>
    </div>
    <a style="font-size: 16px;" > Gmail: taoquan178@gmail.com </a>

    <div class="up1"> <a style="font-size: 16px;"  href="https://www.facebook.com/profile.php?id=100011049578902">Facebook Cá Nhân: Nguyễn Trung Quân </a> </div>

</div>
<?php } ?>
</body>

<style>
    .form{
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    padding: 15px;
    border: 2px dotted #000000;
    border-radius: 10px;
    grid-gap: 25px;
    display: flex;
}
.form1{
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    padding: 15px;
    border: 2px dotted #000000;
    border-radius: 10px;
    /* grid-gap: 25px;
    display: flex; */
}

/* body{
    background: rgb(0,212,255);
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(42,77,166,1) 0%, rgba(63,9,121,0.6786064767703957) 30%, rgba(2,0,36,1) 100%);
} */
.truyen{
font-size: 20px;
color: white;
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
color: while;
}

/* .gioithieutruyen{
    height: 230px;
    padding: 20px 150px;
    width: 800px;
    margin: 10px auto;
    background-color: rgb(10, 52, 84, 0.44);
} */
.ketthuctruyen{
    color: white;
    height: 160px;
    padding: 20px 150px;
    /* width: 800px; */
    margin: 10px auto;
    background-color: rgb(10, 52, 84, 0.44); 
}
.tren ul li{
    display: inline-block;
    padding: 2px;
    color: white;

}
.tren ul li a{
    font-size: 17px;
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
/* .duoi{
    float: right;
    display: flex;
} */

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