<?php
// Include database connection file
include_once("config.php");

// Check if form is submitted for user update
if(isset($_POST['update'])) {
    // Retrieve form data
    $idpeminjam = $_POST['idpeminjam'];
    $namapeminjam = $_POST['namapeminjam'];
    $nohp = $_POST['nohp'];

    // Update user data in the database
    $result = mysqli_query($mysqli, "UPDATE peminjam SET namapeminjam='$namapeminjam', nohp='$nohp' WHERE idpeminjam='$idpeminjam'");
    
    // Redirect to data peminjam page after update
    header("Location: datapeminjam.php");
}

// Display selected user data based on idpeminjam
$idpeminjam = $_GET['idpeminjam'];
$result = mysqli_query($mysqli, "SELECT * FROM peminjam WHERE idpeminjam='$idpeminjam'");
$user_data = mysqli_fetch_array($result);

// Retrieve data fields
$namapeminjam = $user_data['namapeminjam'];
$nohp = $user_data['nohp'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Peminjam</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require("nav.php"); ?>
    <div class="container mt-4">
        <h2><img src="images/iconbuku.jpg" alt="" /> Edit Data Peminjam</h2>
        <form action="editpeminjam.php" method="post">
            <input type="hidden" name="idpeminjam" value="<?php echo $idpeminjam; ?>">
            
            <div class="mb-3">
                <label for="namapeminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="namapeminjam" name="namapeminjam" value="<?php echo $namapeminjam; ?>">
            </div>
            
            <div class="mb-3">
                <label for="nohp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $nohp; ?>">
            </div>
            
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
