<?php
include("db.php");

// Check for search form submit
if (isset($_GET['q']) && !empty($_GET['q'])) {

    $q = trim($_GET['q']);

    // Search receipt table for matching ID OR name
    $sql = "SELECT id_cust FROM receipt 
            WHERE id_cust LIKE ? OR name LIKE ?
            LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);

    $like = "%{$q}%";
    mysqli_stmt_bind_param($stmt, "ss", $like, $like);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Found matching customer
        $idcust = $row['id_cust'];
        header("Location: view.php?id_cust=" . urlencode($idcust));
        exit();
    } else {
        $message = "No matching receipt found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Receipt</title>
</head>
<body>
    <center>
        <br>
    <h1>Search Receipt</h1>

    <form method="get">
        <input type="text" name="q" placeholder="Search by ID or Name" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    </center>
</body>
</html>
