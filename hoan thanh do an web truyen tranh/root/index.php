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
    <link rel="stylesheet" href="./css/menutrangchu.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Quân Tone Book</title>
</head>

<style>
    body{
	background: url("img/104.jpg");
	background-size: cover;
	}

    .menu {
    text-align: center;
    width: 100%;
    height: 150px;
    background-color: rgb(10, 52, 84, 0.44);
}
</style>

<body>
<td  ><a href="themsp.php" class="btn btn-warning" style="position: fixed;" > <img  src="img/2018-05-28-12-14-18.jpg"  style="width: 100px; border-radius: 10px;"></a></td>


<div class="menu">

	<ul> 
		<li class="logo"> <a href="index.php"> <img src="img/logo.png"> </a> </li>


	    <li> <a href="index.php"><i class="fas fa-home"></i>Trang chủ</a> </li>

		<li> <a href="truyentranh.php">Truyện Tranh</a> </li>

		<li> <a href="truyenchu.php">Truyện Chữ</a> </li>

        <!-- <li> <a href="login.php"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a> </li> -->

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
 

    <form method="POST" class="d-flex" action="">
                <input name="search" type="search" class="form-control" placeholder="Tìm kiếm Truyện..."  style="width: 500px; height: 30px;" >
                <button name="sbm" class="btn btn-success" style="width: 50px; height: 33px;" >Tìm </button>

                <?php
                if(isset($_POST['sbm']) && !empty($_POST['search'])){?>
                    <form method="POST" action="">
                        <button name="all_prd" class='btn btn-success text-light'>Tất cả sản phẩm</button>
                    </form>
                <?php } ?>

    </form>

    
    <?php
                if(isset($total_prd)){
                    if($total_prd !==0){
                        echo "<p class='text-success'>Tìm thấy $total_prd sản phẩm</p>";
                    }else{
                        echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
                    }
                }
            ?>


</div>


<div class="anh">
    
    <div class="anh1">
        <img id="img" src="img/100.jpg">
    </div>

<script>
    var index=  1;
        changeImage = function(){
        var imgs = ["./img/100.JPG","./img/101.JPG","./img/102.JPG","./img/103.jpg"];
        document.getElementById("img").src = imgs[index];
        index++;
        if(index == 4){
            index = 0
        }
    }
    setInterval(changeImage, 2000)
</script>
</div>

<div class="truyensapramat1">  

   <div class="truyensapramat2"> <p>Truyện Mới Sắp Ra Mắt</p> </div>

<div class="truyensapramat">
    <div class="item">
        <img src="img/16.jpg">
        <h3>Tam Quốc Diễn Nghĩa</h3>
    </div>
    <div class="item">
        <img src="img/17.jpg">
        <h3>Tư Duy Sâu-Diệp Tu</h3>
    </div>
    <div class="item">
        <img src="img/18.jpg">
        <h3>Cuốn Theo Chiều Gió</h3>
    </div>			
    <div class="item">
        <img src="img/19.jpg">
        <h3>Thấu Hiểu Tiếp Thị Từ A-Z</h3>
    </div>			
    <div class="item">
        <img src="img/20.jpg">
        <h3>Thám Tử Lừng Danh Nguyễn Trung Quân</h3>
    </div>			

</div>
</div> 

<div class="truyensapramat2"> <p>Truyện Mới Cập Nhập</p> </div>

<div class="content">

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
</html>