<?php
session_start();

include(".././config/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RingUs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href=".././css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href=".././css/style.css" rel="stylesheet">
    <link href=".././css/app.css" rel="stylesheet">
</head>

<body>
    <div class="container px-0">
        <h2 class="display-5">Welcome home <?php echo $_SESSION['username']; ?></h2>
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href=".././index.php" class="nav-item nav-link active">Home</a>
                    <a href="./dashboard.php" class="nav-item nav-link active">Dashboard</a>
                    <a href="./budget.php" class="nav-item nav-link active">Budget Calculator</a>
                    <a href="#" class="nav-item nav-link active">Save The Date</a>
                    <a href="#" class="nav-item nav-link active">Wedding Checklist</a>
                    <a href="#" class="nav-item nav-link active">Vendors</a>
                    <a href="./edit.php" class="bg-secondary rounded text-white mx-1 nav-item nav-link">Edit Profile</a>
                    <a href="./logout.php" class="bg-primary rounded text-white nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>
    </div>



    <?php include("incl/footer.php"); ?>