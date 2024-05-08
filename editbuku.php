<?php
// Include database connection file
include_once("config.php");

// Check if form is submitted for book update, then redirect to the book data page after update
if(isset($_POST['update'])) {
    // Retrieve form data
    $kodebuku = $_POST['kodebuku'];
    $katbuku = $_POST['katbuku'];
    $namabuku = $_POST['namabuku'];
    $jumlahbuku = $_POST['jumlahbuku'];

    // Update book data in the database
    $result = mysqli_query($mysqli, "UPDATE buku SET katbuku='$katbuku', namabuku='$namabuku', jumlahbuku='$jumlahbuku' WHERE kodebuku='$kodebuku'");
    
    // Redirect to the book data page after update
    header("Location: databuku.php");
}

// Display selected book data based on kodebuku
$kodebuku = $_GET['kodebuku'];
$result = mysqli_query($mysqli, "SELECT * FROM buku WHERE kodebuku='$kodebuku'");
$user_data = mysqli_fetch_array($result);

// Retrieve book data fields
$katbuku = $user_data['katbuku'];
$namabuku = $user_data['namabuku'];
$jumlahbuku = $user_data['jumlahbuku'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Buku</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require("nav.php"); ?>
    <div class="container mt-4">
        <h2><img src="images/iconbuku.jpg" alt="" /> Edit Data Buku</h2>
        <form action="editbuku.php" method="post">
            <input type="hidden" name="kodebuku" value="<?php echo $kodebuku; ?>">
            
            <div class="mb-3">
                <label for="katbuku" class="form-label">Kategori Buku</label>
                <input type="text" class="form-control" id="katbuku" name="katbuku" value="<?php echo $katbuku; ?>">
            </div>
            
            <div class="mb-3">
                <label for="namabuku" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" id="namabuku" name="namabuku" value="<?php echo $namabuku; ?>">
            </div>
            
            <div class="mb-3">
                <label for="jumlahbuku" class="form-label">Jumlah Buku</label>
                <input type="text" class="form-control" id="jumlahbuku" name="jumlahbuku" value="<?php echo $jumlahbuku; ?>">
            </div>
            
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
