<?php 
include "config.php";

// Get the search keyword from the form submission
$key = isset($_POST['cari']) ? $_POST['cari'] : '';

// Execute the SQL query based on the search keyword
$QueryString = "SELECT * FROM buku WHERE kodebuku LIKE '%$key%' OR katbuku LIKE '%$key%' OR namabuku LIKE '%$key%' OR jumlahbuku LIKE '%$key%'";
$result = mysqli_query($mysqli, $QueryString); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pencarian Buku</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <?php require("nav.php"); ?>
<div id="wrap">
    <div class="container mt-4">
        <div class="title mb-3"><img src="images/iconbuku.jpg" alt="" /> Hasil Pencarian</div>

        <!-- Display search keyword in a styled alert box -->
        <?php if (!empty($key)) : ?>
            <div class="alert alert-primary" role="alert">
                <strong>Keyword pencarian:</strong> <?php echo htmlspecialchars($key); ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Kategori Buku</th>
                    <th>Nama Buku</th>
                    <th>Jumlah Buku</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['kodebuku']."</td>";    
                    echo "<td>".$user_data['katbuku']."</td>";
                    echo "<td>".$user_data['namabuku']."</td>";
                    echo "<td>".$user_data['jumlahbuku']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
