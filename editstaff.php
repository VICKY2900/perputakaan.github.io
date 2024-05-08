<?php
// Include database connection file
include_once("config.php");

// Check if form is submitted for pustakawan update, then redirect to the staff data page after update
if(isset($_POST['update'])) {
    // Retrieve form data
    $idstaff = $_POST['idstaff'];
    $namastaff = $_POST['namastaff'];

    // Update pustakawan data in the database
    $result = mysqli_query($mysqli, "UPDATE pustakawan SET namastaff='$namastaff' WHERE idstaff='$idstaff'");
    
    // Redirect to the staff data page after update
    header("Location: staff.php");
}

// Display selected pustakawan data based on idstaff
$idstaff = $_GET['idstaff'];
$result = mysqli_query($mysqli, "SELECT * FROM pustakawan WHERE idstaff=$idstaff");
$user_data = mysqli_fetch_array($result);

// Retrieve pustakawan data fields
$namastaff = $user_data['namastaff'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pustakawan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require("nav.php"); ?>
    <div class="container mt-4">
        <h2><img src="images/iconbuku.jpg" alt="" /> Edit Data Pustakawan</h2>
        <form action="editstaff.php" method="post">
            <input type="hidden" name="idstaff" value="<?php echo $idstaff; ?>">
            
            <div class="mb-3">
                <label for="namastaff" class="form-label">Nama Pustakawan</label>
                <input type="text" class="form-control" id="namastaff" name="namastaff" value="<?php echo $namastaff; ?>">
            </div>
            
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
