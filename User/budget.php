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


    <div class="col-lg-2 rounded bg-light">



    </div>
    <div class="col-lg-8 mx-5">
      <div class="col-12">
        <div class="text-center mx-auto" style="max-width: 700px;">
          <h1 class="text-primary">Budget Overview </h1>
          <p id="budgetSummary" class="text-xl">Estimated Budget: $0 | Total Spent: $0 | Remaining: $0</p>

        </div>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
      </div>


      <!-- Summary -->
      <h3></h3>

      <!-- Budget Input Form -->
      <form id="budgetForm">
        <label for="budget">Enter Your Estimated Budget: </label>
        <input class="form-control" type="number" id="budget" required>
        <button class="btn border-secondary bg-white text-primary my-2" type="button" onclick="setBudget()">Set Budget</button>
      </form>

      <div class="my-3">
        <h6>Expense Summary</h6>
        <table id="expenseTable">
          <thead>
            <tr>
              <th>Category</th>
              <th>Description</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <!-- Expenses will appear here -->
          </tbody>
        </table>
      </div>


      <!-- Expense Table -->

      <div class="my-3">
        <h6>Track Expenses</h6>

        <!-- Expense Input Form -->
        <form id="expenseForm">
          <label for="category">Category:</label>
          <input class="form-control" type="text" id="category" required>
          <label for="description">Description:</label>
          <input class="form-control" type="text" id="description" required>
          <label for="amount">Amount:</label>
          <input class="form-control" type="number" id="amount" required>
          <button class="btn border-secondary bg-white text-primary my-2" type="button" onclick="addExpense()">Add Expense</button>
        </form>

      </div>











    </div>
    <div class="col-lg-2 rounded bg-light">



    </div>

  </div>





</div>


<script>
  let budget = 0;
  let totalSpent = 0;
  const expenses = [];

  // Function to set the budget
  function setBudget() {
    budget = parseFloat(document.getElementById('budget').value);
    updateSummary();
  }


  function addExpense() {
    const category = document.getElementById('category').value;
    const description = document.getElementById('description').value;
    const amount = parseFloat(document.getElementById('amount').value);

    // Update total spent and expenses array
    expenses.push({
      category,
      description,
      amount
    });
    totalSpent += amount;

    // Add the expense to the table
    const table = document.getElementById('expenseTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();
    newRow.innerHTML = `<td>${category}</td><td>${description}</td><td>$${amount.toFixed(2)}</td>`;

    // Reset the form
    document.getElementById('expenseForm').reset();

    updateSummary();
  }




  // Function to add an expense and send it to PHP
  function addExpense() {
    const category = document.getElementById('category').value;
    const description = document.getElementById('description').value;
    const amount = parseFloat(document.getElementById('amount').value);




    // Send data to PHP using AJAX
    fetch('save_expense.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `category=${category}&description=${description}&amount=${amount}`
      }).then(response => response.text())
      .then(data => console.log(data));

    // Add the expense to the local table and update the summary
    expenses.push({
      category,
      description,
      amount
    });
    totalSpent += amount;
    const table = document.getElementById('expenseTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();
    newRow.innerHTML = `<td>${category}</td><td>${description}</td><td>$${amount.toFixed(2)}</td>`;
    document.getElementById('expenseForm').reset();
    updateSummary();
  }

  function updateSummary() {
    const remaining = budget - totalSpent;
    document.getElementById('budgetSummary').innerHTML =
      `Budget: $${budget.toFixed(2)} | Total Spent: $${totalSpent.toFixed(2)} | Remaining: $${remaining.toFixed(2)}`;
  }


  window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
      exportFileName: "Doughnut Chart",
      exportEnabled: false,
      animationEnabled: true,
      title: {
        text: "Expense"
      },
      legend: {
        cursor: "pointer",
        itemclick: explodePie
      },
      data: [{
        type: "doughnut",
        innerRadius: 100000,
        showInLegend: true,
        toolTipContent: "<b>{name}</b>",
        indexLabel: "{name}",
        dataPoints: [{
            y: 100,
            name: "Venue"
          },
          {
            y: 150,
            name: "Venue Decoration"
          },
          {
            y: 20,
            name: "Catering"
          },
          {
            y: 30,
            name: "Flowers"
          },
          {
            y: 100,
            name: "Photography & Videography"
          },
          {
            y: 50,
            name: "Wedding Cake"
          },
          {
            y: 20,
            name: "Master of Ceremony"
          },
          {
            y: 50,
            name: "Event Personnels"
          },
          {
            y: 50,
            name: "Entertainment (DJ/Live Band)"
          },
          {
            y: 30,
            name: "Transportation & Accommodation"
          },
          {
            y: 70,
            name: "Bride & Groom Wedding Attire"
          },
          {
            y: 40,
            name: "Hair Styling & Makeup"
          },
          {
            y: 20,
            name: "Stationary / Invitations"
          },
          {
            y: 20,
            name: "Souvenirs"
          },
          {
            y: 50,
            name: "Ceremony"
          },
          {
            y: 20,
            name: "Miscellaneous"
          }
        ]
      }]
    });
    chart.render();

    function explodePie(e) {
      if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();
    }

  }
</script>



<?php include("incl/footer.php"); ?>