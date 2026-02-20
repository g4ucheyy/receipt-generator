<?php
include("db.php");

if (!isset($_GET['id_cust'])) {
    die("No ID specified.");
}

$idcust = $_GET['id_cust'];

// Get main receipt info
$sql = "SELECT * FROM receipt WHERE id_cust = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $idcust);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$receipt = mysqli_fetch_assoc($result);

// Get items
$sql_items = "SELECT * FROM receipt_item WHERE id_cust = ?";
$stmt2 = mysqli_prepare($conn, $sql_items);
mysqli_stmt_bind_param($stmt2, "s", $idcust);
mysqli_stmt_execute($stmt2);
$items_result = mysqli_stmt_get_result($stmt2);

mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt2);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Receipt</title>
<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/808/808730.png">
</head>
<style>
 .receipt1 h1{
  font-size: 35px;
 }
 .receipt1 td {
    font-size: 18px;
 }
 @media print {
 #btn, #a {
    display: none;
 }
 }
    </style>
<body>
<center>
    <div class="receipt1">
 <table border="1" cellspacing="0" cellpadding="12">
    <tr>
    <th>
<h1>Receipt ID: <?php echo $idcust; ?></h1>
    </th>
    </tr>
    <tr>
   <td> Name: <?php echo $receipt['name']; ?></td><br>
    </tr>
    <tr>
   <td> Phone: <?php echo $receipt['notel']; ?></td><br>
    </tr>
    <tr>
   <td> Email: <?php echo $receipt['emel']; ?></td><br>
    </tr>
    <tr>
    <td>Address: <?php echo $receipt['address']; ?></td>
    </tr>
</table>
    

<h2>Items</h2>
<table border="1" cellpadding="4">
    <tr>
        <th>Item Name</th>
        <th>Flavour</th>
         <th>Filling</th>
         <th>Frosting</th>
         <th>Color</th>
         <th>Description</th>
        <th>Quantity</th>
</tr>
    <?php while($item = mysqli_fetch_assoc($items_result)): ?>
        <tr>

            <td><?php echo $item['item_name']; ?></td>
            <td><?php echo $item['flavour']; ?></td>
            <td><?php echo $item['filling']; ?></td>
            <td><?php echo $item['frosting']; ?></td>
            <td><?php echo $item['color']; ?></td>
            <td><?php echo $item['description']; ?></td>
            <td><?php echo $item['qtty']; ?></td>
    </tr>
       
</table>
<br>

<table border="1" cellpadding="4">
<tr>
        <th>Status</th>
        <th>Delivery Date</th>
        <th>Delivery Type</th>
        <th>Total</th>
        <th>Discount</th>
        <th>Payment</th>
        <th>Note</th>
    </tr>
    <tr>
            <td><?php echo $item['status']; ?></td>
            <td><?php echo $item['delivery_date']; ?></td>
            <td><?php echo $item['delivery_type']; ?></td>
            <td>RM <?php echo $item['total']; ?></td>
            <td><?php echo $item['discount']; ?></td>
            <td><?php echo $item['payment_method']; ?></td>
            <td><?php echo $item['note']; ?></td>
        </tr>
        <?php endwhile; ?>
</table>
    </div>
     
<br>
<br>
<a  id="a" href="index.php">Back</a> &nbsp; <button id="btn" onclick="window.print();">Print</button>
</center>

</body>
</html>
