<?php
include("db.php");

// Get the ID to delete
if (!isset($_GET['id_cust'])) {

    die("No ID specified.");


}

$idcust = $_GET['id_cust'];

// --- Delete from receipt_item first ---
$sql_items = "DELETE FROM receipt_item WHERE id_cust = ?";
$stmt = mysqli_prepare($conn, $sql_items);
mysqli_stmt_bind_param($stmt, "s", $idcust);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// --- Then delete from receipt ---
$sql_receipt = "DELETE FROM receipt WHERE id_cust = ?";
$stmt2 = mysqli_prepare($conn, $sql_receipt);
mysqli_stmt_bind_param($stmt2, "s", $idcust);
mysqli_stmt_execute($stmt2);
mysqli_stmt_close($stmt2);

mysqli_close($conn);

header("Location: index.php"); // Redirect to main page
exit();
?>
