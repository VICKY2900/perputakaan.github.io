<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan UAD - Data Buku</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<?php require("nav.php"); ?>

<div class="container mt-5">

    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Pencarian</h2>
        <form method="post" action="caribuku.php" class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari Buku..." required />
            <button type="submit" name="kirim" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold">Membuat Data Buku</h2>
        <form action="databuku.php" method="post" class="mb-4">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fs-6">Kode Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" name="kodebuku" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fs-6">Kategori Buku</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="katbuku" value="akademik" checked>
                        <label class="form-check-label fs-6">Akademik</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="katbuku" value="novel">
                        <label class="form-check-label fs-6">Novel</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fs-6">Nama Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" name="namabuku" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fs-6">Jumlah Buku</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" name="jumlahbuku" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="Submit" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['Submit'])) {
            $kodebuku = $_POST['kodebuku'];
            $katbuku = $_POST['katbuku'];
            $namabuku = $_POST['namabuku'];
            $jumlahbuku = $_POST['jumlahbuku'];

            include_once("config.php");

            $result = mysqli_query($mysqli, "INSERT INTO buku(kodebuku,katbuku,namabuku,jumlahbuku) VALUES('$kodebuku','$katbuku','$namabuku','$jumlahbuku')");
            
            echo "Buku berhasil ditambahkan.<br>";
        }
        ?>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Data Buku</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Kategori Buku</th>
                    <th>Nama Buku</th>
                    <th>Jumlah Buku</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                include_once("config.php");
                $result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY kodebuku DESC");

                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['kodebuku']."</td>";
                    echo "<td>".$user_data['katbuku']."</td>";
                    echo "<td>".$user_data['namabuku']."</td>";
                    echo "<td>".$user_data['jumlahbuku']."</td>";
                    echo "<td>
                            <a href='editbuku.php?kodebuku=$user_data[kodebuku]' class='btn btn-info btn-sm me-2'>Edit</a>
                            <a href='deletebuku.php?kodebuku=$user_data[kodebuku]' class='btn btn-danger btn-sm' onclick='return confirm(`Apakah anda yakin?`)'>Delete</a>
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
