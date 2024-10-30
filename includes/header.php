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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .accordion {
            cursor: pointer;
            padding: 18px;
            background-color: #007BFF;
            color: white;
            border: none;
            text-align: left;
            outline: none;
            font-size: 16px;
            transition: 0.4s;
        }

        .panel {
            display: none;
            padding: 0 18px;
            background-color: #f9f9f9;
            overflow: hidden;
        }

        .checklist-item {
            display: flex;

            margin: 10px 0;
        }

        .checklist-item label {

            color: black;
            text-align: left;
            font-size: 18px;

        }

        .checklist-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .checklist-item.checked label {
            text-decoration: line-through;
            color: gray;

        }

        .progress-bar-container {
            background-color: #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }

        .progress-bar {
            height: 20px;
            width: 0%;
            background-color: #28a745;
            text-align: center;
            color: white;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- Navbar start -->
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="./index.php" class="navbar-brand"><img style="height: 120px;"
                    src="img/ringusnow_logo_transparent.png" class="" alt="RingUs Logo"></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="../budget.php" class="dropdown-item">Budget Calculator</a>
                            <a href="../User/login.php" class="dropdown-item">Save The Date</a>
                            <a href="../checklist.php" class="dropdown-item">Wedding Checklist</a>
                            <a href="../vendors.php" class="dropdown-item">Vendors</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">About Us</a>
                    <a href="#" class="nav-item nav-link">Contact</a>
                    <a href="../Vendor/register.php" class="nav-item nav-link">Become A Vendor</a>
                    <a href="../User/login.php" class="bg-secondary rounded text-white mx-1 nav-item nav-link">Login</a>
                    <a href="../User/register.php" class="bg-primary rounded text-white nav-item nav-link">Register</a>
                </div>
            </div>
        </nav>
    </div>