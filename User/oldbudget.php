<?php
session_start();

include(".././config/connection.php");

include("./incl/header.php");

?>
<?php include("./incl/user-header.php"); ?>
<div class="container-fluid">


  <div class="row g-4">


    <div class="col-lg-2 rounded bg-light">

      <?php include("incl/sidebar.php"); ?>

    </div>
    <div class="col-lg-6">
      <h1 class="mb-4">Budget Calculator</h1>
      <p>Plan your dream wedding without the stress of budgeting! Our Wedding Budget Calculator helps you set, track, and manage your wedding expenses with ease. From venue costs to floral arrangements, get a clear overview of where your money goes and make adjustments that keep you on track. Start planning today and bring your vision to life, all within your budget!
      </p>
      <ul>Here’s what our budget calculator can do:

        <li>Easily track their spending against their budget.
        </li>
        <li>Allocate funds efficiently across different categories like venue, catering, attire, etc.
        </li>
        <li>Save time and reduce stress by keeping financial planning organized.</li>

      </ul>
      <div class="row">
        <div class="">
          <div class="form-item w-100">
            <div class="enter-budget-box">
              <label for="totalBudget">Enter Your Proposed Budget (N): </label><br />
              <input class="form-control" type="number" id="totalBudget" placeholder="e.g., 1000">
              <button class="btn border-secondary bg-white text-primary my-2" onclick="calculateBudget()">Calculate</button>

            </div>
          </div>


        </div>





      </div>
    </div>
    <div class="col-lg-4">
      <h4 class="mb-4">Budget Expenses breakdown</h4>
      <ul id="breakdown"></ul>
      <canvas id="budgetChart" width="400" height="400"></canvas>
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

<script>
  // Predefined percentages for each expense category
  const expenseCategories = {
    "Venue": 10, // 30%
    "Venue Decoration": 15, // 15%
    "Catering": 20, // 10%
    "Flowers": 3, // 5%
    "Photography & Videography": 10, // 20%
    "Wedding Cake": 5, // 10%
    "Master of Ceremony": 2, // 10%
    "Event Personnels": 5, // 10%
    "Entertainment": 5, // 10%
    "Transportation & Accommodation": 3, // 10%
    "Bride & Groom Wedding Attire": 7, // 10%
    "Hair Styling & Makeup": 4, // 10%
    "Stationary / Invitations": 2, // 10%
    "Souvenirs": 2, // 10%
    "Ceremony": 5, // 10%
    "Miscellaneous": 2, // 10%
  };

  function calculateBudget() {
    const totalBudget = parseFloat(document.getElementById("totalBudget").value);
    if (isNaN(totalBudget) || totalBudget <= 0) {
      alert("Please enter a valid budget amount.");
      return;
    }

    const breakdownList = document.getElementById("breakdown");
    breakdownList.innerHTML = ""; // Clear previous results

    const expenseAmounts = [];
    const expenseLabels = [];

    for (const category in expenseCategories) {
      const percentage = expenseCategories[category];
      const amount = (totalBudget * percentage) / 100;
      expenseAmounts.push(amount);
      expenseLabels.push(category);

      const listItem = document.createElement("li");
      listItem.textContent = `${category}: N${amount.toFixed(2)}`;
      breakdownList.appendChild(listItem);
    }

    // Generate the pie chart
    generateChart(expenseLabels, expenseAmounts);
  }

  function generateChart(labels, data) {
    const ctx = document.getElementById('budgetChart').getContext('2d');

    // Destroy previous chart instance if it exists
    if (window.budgetChart) {
      window.budgetChart.destroy();
    }

    // Create new chart instance
    window.budgetChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Budget Breakdown',
          data: data,
          backgroundColor: [
            '#FF6384',
            '#36A2EB',
            '#FFCE56',
            '#4BC0C0',
            '#9966FF',
            '#FF9F40',
            '#FF6384'
          ],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
        }
      }
    });
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<?php include("incl/footer.php"); ?>