<?php
session_start();

include("./config/connection.php");

// if (!isset($_SESSION['username'])) {
//     header("location:Login/login.php");
// }


include("./includes/header.php");

?>

<!-- Navbar End -->

<!-- Hero Start -->
<div class="container-fluid py-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">Welcome</h4>
                <h1 class="mb-5 display-3 text-primary">RINGUS</h1>

            </div>
            <div class="col-md-12 col-lg-5" style="margin-top:100px">
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-100 py-3 px-4 rounded-pill" type="number"
                        placeholder="Search">
                    <button type="submit"
                        class="border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                        style="top: 0; right: 0.2%;"><i class="fas fa-search text-primary"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Featurs Section Start -->
<div class="container-fluid featurs">
    <div class="container py-5">
        <div class="col-lg-4 text-start">
            <h1>Our Features</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-calculator fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5><a href="../User/login.php" class="my-auto">Budget Calculator</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-list fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5><a href="../User/login.php" class="my-auto">Wedding Checklist</a></h5>
                        <!-- <p class="mb-0">100% security payment</p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-calendar fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5><a href="#" class="my-auto">Save The Date</a></h5>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-user fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5><a href="#vendors" class="my-auto">Vendors</a></h5>
                        <!-- <p class="mb-0">Support every time fast</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->

<!-- Banner Section Start-->
<div class="container-fluid banner bg-secondary">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">PLAN</h1>
                    <p class="fw-normal display-3 text-dark mb-4">Your Dream Wedding</p>
                    <a href="../User/login.php" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">Get
                        Started</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="img/dream-wedding.jpg" class="img-fluid w-100 rounded" alt="">


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

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
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">DeeJay</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>DJ Rolex</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                    incididunt</p>
                                <div class="d-flexitems-center flex-lg-wrap">

                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-user me-2 text-primary"></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Venue</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Alpha Events</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                    incididunt</p>
                                <div class="d-flexitems-center flex-lg-wrap">

                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-user me-2 text-primary"></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Decoration</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Sosa Decor</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                    incididunt</p>
                                <div class="d-flexitems-center flex-lg-wrap">

                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-user me-2 text-primary"></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Catering</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Havannah Foods</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                    incididunt</p>
                                <div class="d-flexitems-center flex-lg-wrap">

                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-user me-2 text-primary"></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
</div>





<!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h4 class="text-primary">Our Testimonial</h4>
            <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been
                            the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been
                            the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been
                            the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tastimonial End -->

<?php include("includes/footer.php"); ?>