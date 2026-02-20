<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/808/808730.png">
</head>
<body>
    <center>
    <h1>Receipt Generator</h1>

    <table border="2" cellpadding="6" cellspacing="0">
        <tr>
        <th>No</th>
        <th>Cust ID</th>
        <th colspan="2" >Action</th>
        </tr>

        <?php
        include("db.php");

        $query = mysqli_query($conn, "SELECT * FROM receipt");
        $query2 = mysqli_query($conn, "SELECT * FROM receipt_item");
        $no = 1;

        while ($row = mysqli_fetch_assoc($query)) {

    
    echo "
    <tr>
    <td>".$no++."</td>
    <td>".$row['id_cust']."</td>";
  echo '<td><a href="delete.php?id_cust=' . $row['id_cust'] . '" onclick="return confirm(\'Are you sure?\');">Delete</a></td>';


   echo '<td><a href="view.php?id_cust=' . $row['id_cust'] . '">View</a></td>';
       
    
}
        ?>
    </table>

    <br>
    <br>
    <a href="search.php"><button>Search</button></a> &nbsp; <a href="add.php"><button>Add</button></a> 
    
    </center>
</body>
</html>