<?php
// Include config file
require_once "./config.php";
require_once "./openssl.php";


$private_secret_key = '1f4276388ad3214c873428dbef42243f' ; //some random hex characters

	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = encrypt($_POST["username"],$private_secret_key);
		$password = $_POST["pass"];
		$email = $_POST["email"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $email == "") {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			$sql = "INSERT INTO users(
										username,
										password,
										email
									) VALUES (
										'$username',
										'$password',
										'$email'
									)";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);
			header("Location: http://localhost:82/mahoa-data/index.php");
		}
	}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="register.php" method="post">
		<table>
			<tr>
				<td colspan="2">Form dang ky</td>
			</tr>	
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Dang ky"></td>
			</tr>

		</table>

	</form>
    </div>    
</body>
</html>