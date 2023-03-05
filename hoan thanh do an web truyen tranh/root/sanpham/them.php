<?php
    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];


        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        $sql = "INSERT INTO products(prd_name, image, price, quantity, description, brand_id) VALUES('$prd_name', '$image', '$price', '$quantity', '$description', $brand_id)";

        $query = mysqli_query($connect, $sql);
        move_uploaded_file($image_tmp, 'img/'.$image);
        header('location: themsp.php');
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm Truyện</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên Truyện</label>
                    <input type="text" name="prd_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ảnh Truyện</label> <br>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label>Tác Giả</label>
                    <input type="text" name="quantity" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nội Dung</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mô tả Truyện</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="form-group">
                    <label>Thể Loại</label>
                    <select class="form-control" name="brand_id">
                        <?php
                            while ($row_brand = mysqli_fetch_assoc($query_brand)) {?>
                                <option value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                    <button name="sbm" class="btn btn-success">Thêm mới</button>
            </form>
        </div>
    </div>
</div>