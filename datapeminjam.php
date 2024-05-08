<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan - Data Peminjam</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<?php require("nav.php"); ?>

<div class="container mt-5">

    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Pencarian</h2>
        <form method="post" action="caripinjam.php" class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari Pustakawan..." required />
            <button type="submit" name="kirim" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold">Membuat Data Peminjam</h2>
        <form action="datapeminjam.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="idpeminjam" class="form-label">ID Peminjam</label>
                <input type="text" class="form-control" name="idpeminjam" required>
            </div>
            <div class="col-md-6">
                <label for="namapeminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" name="namapeminjam" required>
            </div>
            <div class="col-md-6">
                <label for="nohp" class="form-label">No. HP</label>
                <input type="text" class="form-control" name="nohp" required>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="Submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
        <?php
        if(isset($_POST['Submit'])) {
            $idpeminjam = $_POST['idpeminjam'];
            $namapeminjam = $_POST['namapeminjam'];
            $nohp = $_POST['nohp'];

            include_once("config.php");

            $result = mysqli_query($mysqli, "INSERT INTO peminjam(idpeminjam, namapeminjam, nohp) VALUES('$idpeminjam', '$namapeminjam', '$nohp')");
            
            if($result) {
                echo "<p class='mt-3 text-success'>Data peminjam berhasil ditambahkan.</p>";
            } else {
                echo "<p class='mt-3 text-danger'>Gagal menambahkan data peminjam.</p>";
            }
        }
        ?>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Data Peminjam</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Peminjam</th>
                    <th>Nama Peminjam</th>
                    <th>No. HP</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                include_once("config.php");
                $result = mysqli_query($mysqli, "SELECT * FROM peminjam ORDER BY idpeminjam DESC");
                while($user_data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $user_data['idpeminjam']; ?></td>
                        <td><?php echo $user_data['namapeminjam']; ?></td>
                        <td><?php echo $user_data['nohp']; ?></td>
                        <td>
                            <a href="editpeminjam.php?idpeminjam=<?php echo $user_data['idpeminjam']; ?>" class="btn btn-info btn-sm me-2">Edit</a>
                            <a href="deletepinjam.php?idpeminjam=<?php echo $user_data['idpeminjam']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
          
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
