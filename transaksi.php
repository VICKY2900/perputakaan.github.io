<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan UAD - Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<?php require("nav.php") ?>

<div class="container mt-5">
    <div class="mb-4">
        <h2 class="fw-bold"><img src="images/iconbuku.jpg" alt="" class="me-2">Pencarian</h2>
        <form method="post" action="pencarian.php" class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari Pustakawan..." required />
            <button type="submit" name="kirim" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold">Membuat Data Transaksi</h2>
        <form action="transaksi.php" method="post" name="form1" class="row g-3">
            <div class="col-md-6">
                <label for="kodetransaksi" class="form-label fs-6"><strong>Kode Transaksi</strong></label>
                <input type="text" class="form-control form-control-sm" id="kodetransaksi" name="kodetransaksi" required>
            </div>
            <div class="col-md-6">
                <label for="idpeminjam" class="form-label fs-6"><strong>ID Peminjam</strong></label>
                <select class="form-select form-select-sm" id="idpeminjam" name="idpeminjam" required>
                    <option selected disabled>Pilih</option>
                    <?php
                        include_once("config.php");
                        $result = mysqli_query($mysqli, "SELECT idpeminjam, namapeminjam FROM peminjam");
                        while($user_data = mysqli_fetch_array($result)) {
                            echo "<option value='".$user_data['idpeminjam']."'>".$user_data['idpeminjam']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="kodebuku" class="form-label fs-6"><strong>Kode Buku</strong></label>
                <select class="form-select form-select-sm" id="kodebuku" name="kodebuku" required>
                    <option selected disabled>Pilih</option>
                    <?php
                        $result=mysqli_query($mysqli,"SELECT kodebuku, namabuku FROM buku");
                        while($user_data = mysqli_fetch_array($result)) {
                            echo "<option value='".$user_data['kodebuku']."'>".$user_data['kodebuku']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tglpinjam" class="form-label fs-6"><strong>Tanggal Peminjaman</strong></label>
                <input type="date" class="form-control form-control-sm" id="tglpinjam" name="tglpinjam" required>
            </div>
            <div class="col-md-6">
                <label for="tglkembali" class="form-label fs-6"><strong>Tanggal Pengembalian</strong></label>
                <input type="date" class="form-control form-control-sm" id="tglkembali" name="tglkembali" required>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="Submit" class="btn btn-primary btn-sm">Tambah</button>
            </div>
        </form>
        <?php
            if(isset($_POST['Submit'])) {
                $kodetransaksi = $_POST['kodetransaksi'];
                $idpeminjam = $_POST['idpeminjam'];
                $kodebuku = $_POST['kodebuku'];
                $tglpinjam = $_POST['tglpinjam'];
                $tglkembali = $_POST['tglkembali'];
                include_once("config.php");
                $result = mysqli_query($mysqli, "INSERT INTO transaksi(kodetransaksi,idpeminjam,kodebuku,tglpinjam,tglkembali) VALUES('$kodetransaksi','$idpeminjam','$kodebuku','$tglpinjam','$tglkembali')");
                $jumlah_buku_sebelumnya = mysqli_fetch_array(mysqli_query($mysqli, "SELECT jumlahbuku FROM buku WHERE kodebuku='$kodebuku'"))['jumlahbuku'];
                $jumlah_buku_sekarang = $jumlah_buku_sebelumnya - 1;
                mysqli_query($mysqli, "UPDATE buku SET jumlahbuku='$jumlah_buku_sekarang' WHERE kodebuku='$kodebuku'");
            }
        ?>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold">Data Transaksi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>ID Peminjam</th>
                    <th>Kode Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY kodetransaksi DESC");
                    while($user_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['kodetransaksi']."</td>";
                        echo "<td><a href='datapeminjam.php?id=".$user_data['idpeminjam']."'>".$user_data['idpeminjam']."</a></td>";
                        echo "<td><a href='databuku.php?id=".$user_data['kodebuku']."'>".$user_data['kodebuku']."</a></td>";
                        echo "<td>".$user_data['tglpinjam']."</td>"; 
                        echo "<td>".$user_data['tglkembali']."</td>"; 
                        echo "<td>
                                <a href='edit.php?kodetransaksi=".$user_data['kodetransaksi']."' class='btn btn-info btn-sm me-2'>Edit</a>
                                <a href='delete.php?kodetransaksi=".$user_data['kodetransaksi']."' class='btn btn-danger btn-sm' onclick='return confirm(`Apakah anda yakin?`)'>Delete</a>
                            </td>";
                        echo "</tr>";   
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
