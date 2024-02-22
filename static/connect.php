<?php
$host = 'localhost:3306'; 
$db   = 'qlnxcx'; 
$user = 'root'; 
$pass = '123456'; 

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($host, $user, $pass, $db);
// Kiểm tra kết nối
// if ($conn->connect_error) {
//     die("Lỗi kết nối: " . $conn->connect_error);
// } else{echo "Kết nối thành công!<br>";}

//SQL

// $serverName = "VANTRANG"; // Replace with your SQL Server's name or address
// $connectionOptions = array(
//     "CharacterSet" => "UTF-8",
//     "Database" => "QLNXCX",
//     "Uid" => "sa",
//     "PWD" => "123456",
    
//     "TrustServerCertificate" => true
// );

// $conn_sv = sqlsrv_connect($serverName, $connectionOptions);

// if ($conn_sv) {
//     echo "Connection established.<br />";
// } else {
    
 
// echo "Connection could not be established.<br />";
//     die(print_r(sqlsrv_errors(), true));
// }



?>