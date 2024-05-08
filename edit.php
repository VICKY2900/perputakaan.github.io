<?php
// Include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	// Retrieve form data
	$kodetransaksi = $_POST['kodetransaksi'];
	$idpeminjam = $_POST['idpeminjam'];
	$kodebuku = $_POST['kodebuku'];
	$tglpinjam = $_POST['tglpinjam'];
	$tglkembali = $_POST['tglkembali'];

	// Update user data in the database
	$result = mysqli_query($mysqli, "UPDATE transaksi SET idpeminjam='$idpeminjam', kodebuku='$kodebuku', tglpinjam='$tglpinjam', tglkembali='$tglkembali' WHERE kodetransaksi='$kodetransaksi'");
	
	// Redirect to homepage after update
	header("Location: transaksi.php");
}

// Display selected user data based on kodetransaksi
$kodetransaksi = $_GET['kodetransaksi'];
$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE kodetransaksi='$kodetransaksi'");
$user_data = mysqli_fetch_array($result);

// Retrieve data fields
$idpeminjam = $user_data['idpeminjam'];
$kodebuku = $user_data['kodebuku'];
$tglpinjam = $user_data['tglpinjam'];
$tglkembali = $user_data['tglkembali'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Transaksi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php require("nav.php"); ?>
<div class="container mt-4">
    <h2 class="mb-4"><img src="images/iconbuku.jpg" alt="" /> Edit Data Transaksi</h2>
    <form action="edit.php" method="post">
        <input type="hidden" name="kodetransaksi" value="<?php echo $kodetransaksi; ?>">
        
        <div class="mb-3">
            <label for="idpeminjam" class="form-label">ID Peminjam</label>
            <input type="text" class="form-control" id="idpeminjam" name="idpeminjam" value="<?php echo $idpeminjam; ?>">
        </div>
        
        <div class="mb-3">
            <label for="kodebuku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kodebuku" name="kodebuku" value="<?php echo $kodebuku; ?>">
        </div>
        
        <div class="mb-3">
            <label for="tglpinjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tglpinjam" name="tglpinjam" value="<?php echo $tglpinjam; ?>">
        </div>
        
        <div class="mb-3">
            <label for="tglkembali" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="tglkembali" name="tglkembali" value="<?php echo $tglkembali; ?>">
        </div>
        
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
