<?php
// session_start();

// include("./includes/header.php");

// if (!isset($_SESSION['username'])) {
//     header("location:Login/login.php");
// }




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
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
      <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="fa fa-bars text-primary"></span>
      </button>
      <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
          <a href="./dashboard.php" class="nav-item nav-link active">Dashboard</a>
          <a href="./budget.php" class="nav-item nav-link active">Budget Calculator</a>
          <a href="#" class="nav-item nav-link active">Save The Date</a>
          <a href="./checklist.php" class="nav-item nav-link active">Wedding Checklist</a>
          <a href="#" class="nav-item nav-link active">Vendors</a>
          <a href="./edit.php" class="bg-secondary rounded text-white mx-1 nav-item nav-link">Edit Profile</a>
          <a href="./logout.php" class="bg-primary rounded text-white nav-item nav-link">Logout</a>
        </div>
      </div>
    </nav>
  </div>


  <div class="container-fluid">
    <!-- <canvas id="pieChart" width="400" height="400"></canvas> -->

    <div class="container">
      <canvas id="test_canvas" width="400" height="400"></canvas>
      <h1 class="mb-4">Budget Calculator</h1>

      <div class="row g-5">
        <div class="col-md-12 col-lg-6 col-xl-7">

          <div class="row py-4">
            <div class="">
              <div class="form-item w-100">
                <div class="enter-budget-box">
                  <label for="budget">Enter Your Budget</label><br />
                  <input type="text" id="budget" class="form-control" placeholder="Enter total estimated budget">
                  <select name="" id="currency">
                    <option value="" disabled selected> Choose a currency </option>
                    <option value="N">N</option>
                    <option value="€">€</option>
                    <option value="$">$</option>
                  </select><br>
                  <button id="add-budget-btn" class="btn form-control border-secondary bg-white text-primary my-2">Start</button>
                  <button id="reset-app-btn" class="btn form-control border-secondary bg-white text-primary my-2">Reset</button>
                </div>

                <div class="add-expense-box">
                  <label for="expense">Please Enter Your Expense Title</label><br />
                  <input type="text" placeholder="(e.g Venue)" id="expense-title" /><br />
                  <label for="expense-amount">Please Enter Expense Amount</label><br />
                  <input type="text" id="expense-amount" /><br />
                  <button id="add-expense-btn" class="btn form-control border-secondary bg-white text-primary my-2">Add Expense</button>
                </div>
              </div>


            </div>





          </div>




        </div>
        <div class="col-md-12 col-lg-6 col-xl-5">

          <h4 class="mb-4">Budget Calculator summary</h4>
          <div class="budget-amount">
            <div class="balances">
              <div class="budget items">
                <p>Budget</p>
                <div class="logo">
                  <!-- <img src="img/budget.png" alt=""> -->
                </div>
                <div class="budget-amount"><span id="currency-symbol">N</span> <span id="budget-amount">0</span></div>
              </div>
              <div class="expenses items">
                <p>Expenses</p>
                <div class="logo">
                  <!-- <img src="img/expense.png" alt=""> -->
                </div>
                <div class="expenses-amount"><span id="currency-symbol">N</span> <span id="expenses-amount">0</span></div>
              </div>
              <div class="balance items">
                <p>Balance</p>
                <div class="logo">
                  <!-- <img src="img/doller.png" alt=""> -->
                </div>
                <div class="balance-amount"><span id="currency-symbol">N</span> <span id="balance-amount">0</span></div>
              </div>
            </div>
            <div class="expenses">
              <table>
                <thead>
                  <tr>
                    <td>Expense Type</td>
                    <td>Expense Amount</td>
                    <td>Delete</td>
                  </tr>
                </thead>
              </table>
              <div id="expense-list"></div>
            </div>

          </div>




        </div>
      </div>
      <h4 class="mb-4">Recommended vendors</h4>
      <div class="row g-4">
        <div class="col-lg-12">
          <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                  <img src=".././img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
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
                  <img src=".././img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
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
                  <img src=".././img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
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
                  <img src=".././img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
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
      <div class="d-flex justify-content-center my-4">
        <a href="./vendors.html" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
      </div>
    </div>
    <!-- Checkout Page End -->

  </div>
  <script>
    // const canvas = document.getElementById('pieChart');
    // const ctx = canvas.getContext('2d');

    var data = [
      ["Venue", 10],
      ["Venue Decoration", 15],
      ["Catering", 20],
      ["Photography & Videography", 10],
      ["Wedding Cake", 10],
      ["MC", 5],
      ["Event_Personnels", 10],
      ["Entertainment", 10],
      ["Transportation", 10]
    ];
    var colors = ["blue", "red", "yellow", "green", "black", "orange", "purple", "teal", "lemon"];

    var canvas = document.getElementById("test_canvas");
    var context = canvas.getContext("2d");

    // get length of data array 
    var dataLength = data.length;
    // declare variable to store the total of all values 
    var total = 0;

    // calculate total 
    for (var i = 0; i < dataLength; i++) {
      // add data value to total 
      total += data[i][1];
    }

    // declare X and Y coordinates of the mid-point and radius 
    var x = 100;
    var y = 100;
    var radius = 100;

    // declare starting point (right of circle) 
    var startingPoint = 0;

    for (var i = 0; i < dataLength; i++) {
      // calculate percent of total for current value 
      var percent = data[i][1] * 100 / total;

      // calculate end point using the percentage (2 is the final point for the chart) 
      var endPoint = startingPoint + (2 / 100 * percent);

      // draw chart segment for current element 
      context.beginPath();
      // select corresponding color 
      context.fillStyle = colors[i];
      context.moveTo(x, y);
      context.arc(x, y, radius, startingPoint * Math.PI, endPoint * Math.PI);
      context.fill();

      // starting point for next element 
      startingPoint = endPoint;

      // draw labels for each element 
      context.rect(220, 25 * i, 15, 15);
      context.fill();
      context.fillStyle = "black";
      context.fillText(data[i][0] + " (" + data[i][1] + ")", 245, 25 * i + 15);
    }

    // draw title 
    context.font = "20px Arial";
    context.textAlign = "center";
    context.fillText("Budget Breakdown", 100, 225);
  </script>

  <?php include("./incl/footer.php"); ?>