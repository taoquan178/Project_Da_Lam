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
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Danh sách Truyện</h2>
            <h2> <a href="index.php"><i class="fas fa-home"></i>Về Trang Chủ</a></h2>
            <form method="POST" class="d-flex" action="">
                <input name="search" type="search" class="form-control">
                <button name="sbm" class="btn btn-success">Tìm kiếm</button>
            </form>
        </div>

        <div class="card-body">
            <?php
                if(isset($total_prd)){
                    if($total_prd !==0){
                        echo "<p class='text-success'>Tìm thấy $total_prd sản phẩm</p>";
                    }else{
                        echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
                    }
                }
            ?>
            <table class="table bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên Truyện</th>
                        <th>Ảnh Truyện</th>
                        <th>Nội Dung</th>
                        <th>Tác Giả</th>
                        <th>Mô tả Truyện</th>
                        <th>Thể Loại</th>
                        <th width="12%">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($query)) {?>
                            <tr>
                                <td><?php echo $i++; ?></th>
                                <td><?php echo $row['prd_name']; ?></td>

                                <td>
                                    <img src="img/<?php echo $row['image']; ?>" width="150">
                                
                                </td>

                                <td><?php echo $row['price']; ?>k</td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['brand_name']; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="themsp.php?page_layout=sua&id=<?php echo $row['prd_id']; ?>">Sửa</a>

                                    <a onclick="return Del('<?php  echo $row['prd_name'];?>')" class="btn btn-danger" href="themsp.php?page_layout=xoa&id=<?php echo $row['prd_id']; ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="themsp.php?page_layout=them" class="btn btn-primary">
                Thêm mới
            </a>

            <?php
                if(isset($_POST['sbm']) && !empty($_POST['search'])){?>
                    <form method="POST" action="">
                        <button name="all_prd" class='btn btn-success text-light'>Tất cả sản phẩm</button>
                    </form>
                <?php } ?>
        </div>
    </div>
</div>

<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>