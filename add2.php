<?php
include("db.php");
session_start();

if (!isset($_SESSION['id_cust'])) {
    die("SESSION EXPIRED. GO BACK <a href='add.php'>BACK</a>");
}

$idcust = $_SESSION['id_cust'];

// continuation from add.php

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
            <label>Item Name </label><br>
            <input type="text" name="item_name" required> <br>
            <label>Flavour</label><br>
            <input type="text" name="flavour" > <br>
            <label>Filling</label> <br>
            <input type="text" name="filling" > <br>
            <label>Color</label><br>
            <input type="text" name="color" > <br>
            <label>Description</label><br>
            <textarea name="description"></textarea><br>
            <label>Quantity</label><br>
            <input type="text" name="qtty" required> <br>
           <br>
           <label>Status</label><br>
           <select name="status" required>
            <option value="">-- SELECT --</option>
            <option value="started">Started</option>
            <option value="finished">Finished</option>
            <option value="delivered">Delivered</option>
           </select> <br>
           <label>Delivery Date</label><br>
           <input type="date" name="delivery_date"><br>
             <label>Delivery Type</label><br>
           <select name="delivery_type" required>
            <option value="">-- SELECT --</option>
            <option value="pickup">Pick-Up</option>
            <option value="delivery">Delivery</option>
           </select> <br>
           <label>Total</label><br>
           <input type="text" name="total" required><br>
            <label>Discount</label><br>
           <input type="text" name="discount" required><br>
           <label>Payment Method</label><br>
            <select name="payment_method" required>
            <option value="">-- SELECT --</option>
            <option value="cash">Cash</option>
            <option value="qr">Qr</option>
             <option value="other">Other</option>
           </select> <br>
           <label>Note</label><br>
           <textarea name="note"></textarea><br>



            <input type="submit" name="hantar" value="Submit">


        </form>
    </center>
    
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idcust = $_SESSION['id_cust'];

    $item_name = $_POST['item_name'];
    $flavour = $_POST['flavour'];
    $filling = $_POST['filling'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    $qtty = $_POST['qtty'];
    $status = $_POST['status'];
    $delivery_date = $_POST['delivery_date'];
    $delivery_type = $_POST['delivery_type'];
    $total = $_POST['total'];
    $discount = $_POST['discount'];
    $payment_method = $_POST['payment_method'];
    $note = $_POST['note'];

    $sql = "INSERT INTO receipt_item 
            (id_cust, item_name, flavour, filling, color, description, 
             qtty, status, delivery_date, delivery_type, total, discount, payment_method, note)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssisssddss",
        $idcust,
        $item_name,
        $flavour,
        $filling,
        $color,
        $description,
        $qtty,
        $status,
        $delivery_date,
        $delivery_type,
        $total,
        $discount,
        $payment_method,
        $note
    );

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    session_destroy();

    echo "Receipt successfully saved!";
    header("Location: index.php");
    exit();

}

    ?>