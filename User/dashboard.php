<?php
session_start();

include(".././config/connection.php");

if (!isset($_SESSION['username'])) {
    include("./incl/header.php");
} else {

    include("./incl/header-dashboard.php");
}

?>
<?php include("./incl/user-header.php"); ?>
<div class="container-fluid">


    <div class="row g-4">
        <div class="col-12">
            <div class="text-center mx-auto" style="max-width: 700px;">
                <p class="display-6">Welcome <?php echo $_SESSION['username']; ?></p>
            </div>
        </div>

        <div class="col-lg-2 rounded bg-light">



        </div>
        <div class="col-lg-8">

        </div>

    </div>


</div>




<?php include("incl/footer.php"); ?>