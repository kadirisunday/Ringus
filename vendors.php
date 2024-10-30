<?php
session_start();
// include './Admin/admin/init.php';
include("./config/connection.php");

// if (!isset($_SESSION['username'])) {
//     header("location:Login/login.php");
// }


include("./includes/header.php");

?>

<!-- Navbar End -->

<!-- Hero Start -->






<!-- Vendors Shop Start-->
<div class="container-fluid fruite py-5" id="vendors">
    <div class="container py-5">

        <div class="row g-4">
            <div class="col-lg-4 text-start">
                <h1>Vendors</h1>
            </div>
            <div class="col-lg-8 text-end">
                <ul class="nav nav-pills d-inline-flex text-center mb-5">
                    <li class="nav-item">
                        <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                            href="#tab-1">
                            <span class="text-dark" style="width: 130px;">View All</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <?php
                    $allItems = "SELECT * from vendors";
                    $result = $conn->query($allItems);
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {

                            echo '<div class="col-md-6 col-lg-4 col-xl-3">';
                            echo '<div class="rounded position-relative fruite-item">';
                            echo '<div class="fruite-img">';
                            echo "<img class='img-fluid w-100 rounded-top' src='Vendor/uploads/" . $row['picture'] .  "alt='Vendors image' />";
                            echo '</div>';
                            echo "<div class='text-white bg-secondary px-3 py-1 rounded position-absolute'
                                style='top: 10px; left: 10px;'>" . $row['description'] . "</div>";
                            echo "<div class='p-4 border border-secondary border-top-0 rounded-bottom'>";
                            echo "<h4>" . $row['name'] . "</h4>";
                            echo "<span>" . $row['state'] . "</span>";
                            echo "<span>" . $row['country'] . "</span>";
                            echo "<p>" . $row['price'] . "</p>";
                            echo "<div class='d-flexitems-center flex-lg-wrap'>";

                            echo "<a href=''
                                        class='btn border border-secondary rounded-pill px-3 text-primary'><i
                                            class='fa fa-user me-2 text-primary'></i> View</a>";
                            echo '</div>';
                            echo '</div>';
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>





                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
</div>







<?php include("includes/footer.php"); ?>