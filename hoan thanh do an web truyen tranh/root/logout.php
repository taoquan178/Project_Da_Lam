<?php 
setcookie("user", "", time() - 3600);
?>
<script>
    alert("Bạn Đã Đăng xuất thàng công!");
</script>
<div class="login-form">  
<p>Đăng xuất thàng công!</p>
<a href="index.php"><input type="submit" value="Về Trang chủ" /></a>
</div>
<style>
.login-form{
    width: 100%;
    max-width: 150px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border: 2px dotted #cccccc;
    border-radius: 10px;
}

</style>