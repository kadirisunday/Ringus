<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Calculator</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <h2>Budget Calculator</h2>
    <label for="totalBudget">Enter Proposed Budget ($):</label>
    <input type="number" id="totalBudget" placeholder="e.g., 1000">
    <button onclick="calculateBudget()">Calculate</button>

    <h3>Breakdown of Expenses</h3>
    <ul id="breakdown"></ul>

    <canvas id="budgetChart" width="400" height="400"></canvas>

    <script>
        // Predefined percentages for each expense category
        const expenseCategories = {
            "Housing": 30, // 30%
            "Food": 15, // 15%
            "Transportation": 10, // 10%
            "Entertainment": 5, // 5%
            "Savings": 20, // 20%
            "Healthcare": 10, // 10%
            "Miscellaneous": 10 // 10%
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
                listItem.textContent = `${category}: $${amount.toFixed(2)} (${percentage}%)`;
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
</body>

</html>