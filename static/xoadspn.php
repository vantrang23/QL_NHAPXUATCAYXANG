<?php
session_start();

include 'connect.php';

if (isset($_GET['id_phieunhap']) ) {
    $id_phieunhap = $_GET['id_phieunhap'];
   


    // Perform the deletion
    $sql_delete = "DELETE FROM CTPN WHERE ID_PHIEUNHAP = '$id_phieunhap' ";
    $result_delete = mysqli_query($conn, $sql_delete);

    //SQL SERVER
    $sql_delete_sqlsrv = "DELETE FROM CTPN WHERE ID_PHIEUNHAP = '$id_phieunhap' ";
    $result_delete_sqlsrv = sqlsrv_query($conn_sv, $sql_delete_sqlsrv);


    if ($result_delete && $result_delete_sqlsrv) {
        // Redirect back to the page where the delete button was clicked
        $sql_delete_pn = "DELETE FROM PHIEUNHAP WHERE ID_PHIEUNHAP = '$id_phieunhap' ";
        $result_delete_pn=mysqli_query($conn, $sql_delete_pn);
        header("Location: danhsach_phieunhap.php");
        exit();
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    echo "Invalid item ID.";
}
?>
