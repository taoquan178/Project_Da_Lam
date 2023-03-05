<?php
    $connect = mysqli_connect('localhost', 'root', 'usbw', 'php1fpt');
    if($connect){
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }else{
        echo "Kết nối thất bại!";
    }
?>

<?php
class dblib{
	private $__conn;
	function connect()
	{
		$severname = "localhost";
		$username = "root";
		$password = "usbw";
		$dbname = "php1fpt";
		
		if(!$this->__conn){
			try{
				$this->__conn = new PDO("mysql:host=$severname;dbname=$dbname",$username,$password);
				$this->__conn -> setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
				die();
				
}
}
}
	function disconnect(){
		if ($this->__conn){
			$this->__conn = null;
		}
	}

	function insert($table, $data)
	{
		
		$this->connect();
		
		
		$field_list = '';
		
		$value_list = '';
		
		
		foreach ($data as $key => $value){
			$field_list .= ",$key";
			$value_list .= ",'".$value."'";
		}
		
		
		$sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
}
	function update($table, $data, $where)
	{
		// Káº¿t ná»‘i
		$this->connect();
		$sql = '';
		// Láº·p qua data
		foreach ($data as $key => $value){
			$sql .= "$key = '".$value."',";
		}
		
		// VÃ¬ sau vÃ²ng láº·p biáº¿n $sql sáº½ thá»«a má»™t dáº¥u , nÃªn ta sáº½ dÃ¹ng hÃ m trim Ä‘á»ƒ xÃ³a Ä‘i
		$sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	function get_row($sql)
	{
		// Káº¿t ná»‘i
		$this->connect();
		
		// Thá»±c hiá»‡n láº¥y dá»¯ liá»‡u
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt->fetch();	
	}
	// HÃ m láº¥y danh sÃ¡ch
	function get_list($sql)
	{
		// Káº¿t ná»‘i
		$this->connect();
		
		// Thá»±c hiá»‡n láº¥y dá»¯ liá»‡u
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
		return $stmt->fetchALL();	
	}
	
	function get_row_number($sql)
	{
		// Kết nối
		$this->connect();
		
		// Thực hiện lấy dữ liệu
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
}
class homelib extends dblib {
	
	// Hàm Đăng ký thành viên
	function register() {
		
		$error = array();
		$data = array();
		 
		// Lấy dữ liệu
		$data ['username'] = isset ( $_POST ['username'] ) ? $_POST ['username'] : '';
		$data ['email'] = isset ( $_POST ['email'] ) ? $_POST ['email'] : '';
		$data ['password'] = isset ( $_POST ['password'] ) ? $_POST ['password'] : '';
		
//		// Kiểm tra dữ liệu
		if (empty($data ['username'])) {
			$error['username'] = 'Bạn chưa nhập tên';
		}
		
		if (empty($data ['email'])) {
			$error['email'] = 'Bạn chưa email';
		}
		
//		// kiểm tra email
		if (!filter_var($data ['email'], FILTER_VALIDATE_EMAIL)) { 
			
			$error['email'] = 'Email không đúng định dạng';
		}
		
		if (empty($data ['password'])) {
			$error['password'] = 'Bạn chưa nhập password';
		}
		
//		// Kiểm tra nếu không có lổi thì Lưu dữ liệu
		if (!$error) {
//			
//			// Mã hóa password bằng MD5 để bảo mật mật khẩu
			$data ['password'] = md5($data ['password']);
//			// Thời gian khi user được tạo
			
			
//			// Gọi hàm insert từ class_db.php để insert dữ liệu
			$this->insert("user", $data);
			$data['password'] = $_POST["password"];
			
			$error["note"] = "Đăng ký thành công";
		}
		else {
			$error["note"] = "Đăng ký thất bại";
			
		}
		
//		// Trả về $error để thông báo lổi nếu có
		$message[0] = $error;
		$message[1] = $data;
		
		return $message;
	}
	// Hàm Đăng nhập
	function login() {
		$error = array();
		$data = array();
		
		// Lấy dữ liệu
		$data ['username'] = isset ( $_POST ['username'] ) ? $_POST ['username'] : '';
		$data ['password'] = isset ( $_POST ['password'] ) ? $_POST ['password'] : '';
		
		// Kiểm tra dữ liệu
		if (empty($data ['username'])) {
			$error['username'] = 'Bạn chưa nhập tên';
		}
		
		if (empty($data ['password'])) {
			$error['password'] = 'Bạn chưa nhập password';
		}
		
		// Kiểm tra nếu không có lổi thì Lưu dữ liệu
		if (!$error) {
			
			$username = $data ['username'];
			// Mã hóa password bằng MD5 để bảo mật mật khẩu
			$password = md5($data ['password']);
			
			// SQL: hàm count(*) dùng để đếm tổng số dữ liệu được tìm thấy
			$sql = "SELECT count(*) FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
			
			// Gọi hàm get_row() từ class_db.php để lấy dữ liệu trả về cho biến $result
			$result = $this->get_row($sql);
			
			if ($result > 0) {
				// Tạo thông báo
				$error['message'] = "Đăng nhập thành công";
				
				// Lưu thông tin user vào cookie để không đăng nhập lần nữa, cookie sẽ có thời hạn 24h
				setcookie("user", $username, time() + (86400 * 30));
				
			}
			else {
				// Tạo thông báo
				$error['message'] = "username hoặc password không đúng!";
			}
		}
		
		// Trả về $error để thông báo
		$message[0] = $error;
		$message[1] = $data;
		
		return $message;
	}
}

?>
