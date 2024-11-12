<?php

// Initialize sessions
session_start();

// Include config file
require_once(".././config/connection.php");

include("./incl/header.php");

?>

<div class="container-fluid contact">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Registration successful</h1>

                    </div>
                </div>
                <div class="col-lg-3">



                </div>


                <a class="w-100 btn form-control border-secondary py-3 bg-white text-primary" href="./login.php">Login here</a>

                <div class="col-lg-3">


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const toggle = document.querySelector(".toggle"),
        input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
        if (input.type === "password") {
            input.type = "text";
            toggle.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            input.type = "password";
        }
    })
</script>

<?php include("incl/footer.php"); ?>