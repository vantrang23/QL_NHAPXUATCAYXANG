<?php
session_start();
include 'connect.php';

// Khai báo utf-8 để hiển thị được tiếng Việt
header('Content-Type: text/html; charset=UTF-8');

// Xử lý đăng nhập
$sql_tramxangdau = "SELECT * FROM TRAMXANGDAU  WHERE TRANG_THAI=1";
$result_tramxangdau = mysqli_query($conn, $sql_tramxangdau);

if (isset($_POST['dangnhap'])) {
    // Lấy dữ liệu nhập vào
    $tramxangdau = $_POST['tramxangdau'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (empty($username) || empty($password) || !$tramxangdau) {
        echo 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu';
        // echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        // exit;
    }

    // Kiểm tra tên đăng nhập có tồn tại không
    $sql_tk = "SELECT TRAM_NV.ID_NV,TK.ID_TK,TR.TEN_TRAM,TRAM_NV.ID_TRAM, TK.QUYEN, TK.TEN_TK, TK.PASSWORD 
               FROM TAIKHOAN TK
               JOIN TRAM_NV ON TK.ID_NV = TRAM_NV.ID_NV
               JOIN TRAMXANGDAU TR ON TRAM_NV.ID_TRAM=TR.ID_TRAM
               WHERE TK.TRANG_THAI=1 AND TK.TEN_TK='$username' AND TK.PASSWORD='$password' ";
    
    $result_tk = mysqli_query($conn, $sql_tk) or die(mysqli_error($conn));

    if (!$result_tk || mysqli_num_rows($result_tk) == 0) {
        echo "Tên đăng nhập hoặc mật khẩu không đúng hoặc tên trạm không phù hợp với tài khoản!";
    } else {
        // Đăng nhập thành công
        $row = mysqli_fetch_array($result_tk);
        $_SESSION['username'] = $row['TEN_TK'];
        $_SESSION['id_tram']=$row['ID_TRAM'];
        $_SESSION['ten_tram']=$row['TEN_TRAM'];
        $_SESSION['id_tk']=$row['ID_TK'];
        $_SESSION['id_nv'] = $row['ID_NV'];
        $_SESSION['quyen'] = $row['QUYEN'];
       

        header("Location: index.php");
    
        exit();
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back!</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="post">
									<label class="form-label"><b>Nhập tên trạm </b></label>
								
										<div class="mb-3">

											<label class="form-label">Nhập UserName</label>
											<input class="form-control form-control-lg" type="text" name="username"  placeholder="Nhập tên tài khoản của bạn"   />
										</div>
										<div class="mb-3">
											<label class="form-label">Nhập Password</label>
											<input class="form-control form-control-lg" type="password" name="password"  placeholder="Nhập mật khẩu"  />
										</div>
										<!-- <div>
											<div class="form-check align-items-center">
												<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
												
											</div>
										</div> -->
										<div class="d-grid gap-2 mt-3">
											<!-- <in href="index.html" ></a> -->
											<input type="submit" name="dangnhap" id="" class="btn btn-lg btn-primary" value="Đăng nhập">
										</div>
									</form>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>