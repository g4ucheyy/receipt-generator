<?php
include("db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Receipt</title>
      <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/808/808730.png">
</head>
<body>
    <center>
        <h1>Add Receipt</h1>
        <form action="" method="post">
            <label>Customer/Order ID </label><br>
            <input type="text" name="id_cust" required> <br>
            <label>Name</label><br>
            <input type="text" name="name" required> <br>
            <label>Phone Number</label> <br>
            <input type="number" name="notel" required> <br>
            <label>Email</label><br>
            <input type="email" name="emel" required> <br>
            <label>Address</label><br>
            <input type="text" name="address" required> <br>
           <br>
            <input type="submit" name="hantar" value="Next">


        </form>
    </center>
    
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idcust = $_POST['id_cust'];
    $name = $_POST['name'];
    $notel = $_POST['notel'];
    $emel = $_POST['emel'];
    $address = $_POST['address'];

    // --- Prepare statement properly ---
    $sql = "INSERT INTO receipt (id_cust, name, notel, emel, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $idcust, $name, $notel, $emel, $address);
    mysqli_stmt_execute($stmt);

    // Save ID into session for step 2
    $_SESSION['id_cust'] = $idcust;

    // Redirect to step 2
    header("Location: add2.php");
    exit();
}

?>