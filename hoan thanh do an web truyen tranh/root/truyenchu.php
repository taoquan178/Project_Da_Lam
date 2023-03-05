<?php
    require_once 'class_home.php';
?>
<?php
    if(isset($_POST['sbm']) && !empty($_POST['search'])){
        $search = $_POST['search'];
        $sql = "SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.brand_id WHERE prd_name LIKE '%$search%'";
        $query = mysqli_query($connect, $sql);
        $total_prd = mysqli_num_rows($query);
    }else{
        $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
        $query = mysqli_query($connect, $sql);
    }

    if(isset($_POST['all_prd'])){
        unset($_POST['sbm']);
    }
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
    <title>Quân Tone Book-Đọc Truyện</title>
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
<div class="truyensapramat2"> <p>Danh Sách Truyện Chữ</p> </div>
<div class="danhsachtruyen">
<?php
    $i = 1;
    while ($row = mysqli_fetch_assoc($query)) {?>

<a href="chitietsp.php?id=<?php echo $row['prd_id'];?>">
<div class="item">   
    <img src="img/<?php echo $row['image']; ?>" width="150"> 
   <h3> <?php echo $row['prd_name']; ?></h3>
</div>
</a>

<?php } ?>


</div>
</body>

<style>
body{
	background: rgb(0,212,255);
	background: linear-gradient(90deg, rgba(0,212,255,1) 0%,
	 rgba(42,77,166,1) 0%, rgba(63,9,121,0.6786064767703957) 30%, rgba(2,0,36,1) 100%);
}
.danhsachtruyen{
    width: 500px;
	margin: 20px auto;
    padding: 20px 150px;
	display: grid;
	grid-template-columns: 161px 161px 157px;
	/* grid-template-rows: 300px 300px 300px 300px; */
	grid-gap: 10px;
    background-color: rgb(10, 52, 84, 0.44);
}
.danhsachtruyen a{
	text-decoration: none;
}
.item img{
	width: 150px;
	height: 200px;
	border-radius: 10px;
}
h3{
    font-family: 'Pacifico', cursive;
	font-weight: bold;
	color:black;
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
.truyensapramat2{
    background-color: rgb(10, 52, 84, 0.44);
    height: 40px;
    font-size: 22px;
    width: 1000px;
    margin: 0 auto;
}
.truyensapramat2 p {
    text-align: center;
    color:white;
    background: rgb(0,212,255);
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%,
     rgba(42,77,166,1) 0%, rgba(63,9,121,0.6786064767703957) 30%, rgba(2,0,36,1) 100%);
    font-family:Brush Script MT;
    padding: 7px;
} 
</style>
</html>