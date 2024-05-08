<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan UNPAM - Data Pustakawan</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<?php require("nav.php"); ?>

<div class="container mt-5">

    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Pencarian</h2>
        <form method="post" action="caristaff.php" class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari Pustakawan..." required />
            <button type="submit" name="kirim" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold">Membuat Data Pustakawan</h2>
        <form action="staff.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="idstaff" class="form-label fs-6"><strong>ID Pustakawan</strong></label>
                <input type="text" class="form-control form-control-sm" name="idstaff" required>
            </div>
            <div class="col-md-6">
                <label for="namastaff" class="form-label fs-6"><strong>Nama Pustakawan</strong></label>
                <input type="text" class="form-control form-control-sm" name="namastaff" required>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="Submit" class="btn btn-primary btn-sm">Tambahkan</button>
            </div>
        </form>
        <?php
        if(isset($_POST['Submit'])) {
            $idstaff = $_POST['idstaff'];
            $namastaff = $_POST['namastaff'];

            include_once("config.php");

            $result = mysqli_query($mysqli, "INSERT INTO pustakawan (idstaff, namastaff) VALUES ('$idstaff', '$namastaff')");

            if ($result) {
                echo "<p class='mt-3 text-success fs-6'>User added successfully.</p>";
            } else {
                echo "<p class='mt-3 text-danger fs-6'>Failed to add user.</p>";
            }
        }
        ?>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Data Pustakawan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pustakawan</th>
                    <th>Nama Pustakawan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                include_once("config.php");
                $result = mysqli_query($mysqli, "SELECT * FROM pustakawan ORDER BY idstaff DESC");

                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['idstaff']."</td>";
                    echo "<td>".$user_data['namastaff']."</td>";
                    echo "<td>
                            <a href='editstaff.php?idstaff=$user_data[idstaff]' class='btn btn-info btn-sm me-2'>Edit</a>
                            <a href='deletestaff.php?idstaff=$user_data[idstaff]' class='btn btn-danger btn-sm' onclick='return confirm(`Apakah anda yakin?`)'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
        
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
