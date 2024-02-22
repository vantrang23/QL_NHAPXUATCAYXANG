<?php 

session_start();

include 'connect.php';

$idnl = $_GET['idnl'];

$sql_dongia= "SELECT bg.GIA
        FROM BANGGIA bg
        JOIN NHIENLIEU nl ON bg.ID_NHIENLIEU = nl.ID_NHIENLIEU
        WHERE (bg.ID_NHIENLIEU, NGAY_CN) IN (
                SELECT ID_NHIENLIEU, MAX(NGAY_CN) AS max_ngay_cn
                FROM BANGGIA
                GROUP BY bg.ID_NHIENLIEU)
        AND ID_NHIENLIEU = $idnl";
        $result_dongia=mysqli_query($conn,$sql_dongia);
        $row_dongia=mysqli_fetch_assoc($result_dongia);

        $response = array('dg' => $row_dongia['GIA']);

        // Set the content type to JSON
        header('Content-Type: application/json');
        
        // Encode the response array as JSON and echo it
        echo json_encode($response);



?>