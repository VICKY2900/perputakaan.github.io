<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
<style>
  /* Style for active navigation link */
  .navbar-nav .nav-item.active .nav-link {
    color: #ffffff; /* Text color */
    background-color: #007bff; /* Background color */
    border-radius: 5px; /* Rounded corners */
    padding: 8px 15px; /* Padding */
  }
</style>

</head>
<body>

<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body">
    <div class="container-fluid">
      <button
        data-mdb-collapse-init
        class="navbar-toggler"
        type="button"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'transaksi.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="transaksi.php">Transaksi</a>
          </li>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'datapeminjam.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="datapeminjam.php">Data Peminjam</a>
          </li>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'databuku.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="databuku.php">Data Buku</a>
          </li>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'staff.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="staff.php">Data Pustakawan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
</header>

</body>
</html>