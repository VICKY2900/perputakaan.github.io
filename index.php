<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan UNPAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for additional styling -->
    <style>
        /* Custom styles for header */
        .jumbotron {
            background-color: #007BFF;
            color: #fff;
            padding: 100px 20px;
            text-align: center;
        }
        /* Custom styles for main content */
        .card {
            margin-bottom: 20px;
        }
        /* Custom styles for footer */
        footer {
            background-color: #343A40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php require("nav.php"); ?>
    
    <!-- Header Section -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Welcome to Perpustakaan UNPAM</h1>
            <p class="lead">Explore our vast collection of books and resources.</p>
            <img src="images/viktor.jpg" class="img-fluid rounded-circle" alt="Library Image" style="width: 600px;">
        </div>
    </div>
    
    <!-- Main Content Section -->
    <div class="container my-5">
        <h2 class="mb-4">Library Catalog</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Buku</h5>
                        <p class="card-text">Cari buku berdasarkan kategori.</p>
                        <a href="databuku.php" class="btn btn-primary">Jelajah kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Perpustakaan UNPAM. All rights reserved.</p>
            <p>Designed with <i class="bi bi-heart-fill text-danger"></i> by Your Name</p>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
