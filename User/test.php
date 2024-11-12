<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Expense Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        input,
        button {
            padding: 8px;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>

    <h2>Wedding Expense Tracker</h2>

    <!-- Budget Input Form -->
    <form id="budgetForm">
        <label for="budget">Enter Your Budget: </label>
        <input type="number" id="budget" required>
        <button type="button" onclick="setBudget()">Set Budget</button>
    </form>

    <h3>Track Expenses</h3>

    <!-- Expense Input Form -->
    <form id="expenseForm">
        <label for="category">Category:</label>
        <input type="text" id="category" required>
        <label for="description">Description:</label>
        <input type="text" id="description" required>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" required>
        <button type="button" onclick="addExpense()">Add Expense</button>
    </form>

    <h3>Expense Summary</h3>

    <!-- Expense Table -->
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

    <!-- Summary -->
    <h3>Budget Overview</h3>
    <p id="budgetSummary">Budget: $0 | Total Spent: $0 | Remaining: $0</p>

    <script>
        let budget = 0;
        let totalSpent = 0;
        const expenses = [];

        // Function to set the budget
        function setBudget() {
            budget = parseFloat(document.getElementById('budget').value);
            updateSummary();
        }


        // function addExpense() {
        //     const category = document.getElementById('category').value;
        //     const description = document.getElementById('description').value;
        //     const amount = parseFloat(document.getElementById('amount').value);

        //     // Update total spent and expenses array
        //     expenses.push({
        //         category,
        //         description,
        //         amount
        //     });
        //     totalSpent += amount;

        //     // Add the expense to the table
        //     const table = document.getElementById('expenseTable').getElementsByTagName('tbody')[0];
        //     const newRow = table.insertRow();
        //     newRow.innerHTML = `<td>${category}</td><td>${description}</td><td>$${amount.toFixed(2)}</td>`;

        //     // Reset the form
        //     document.getElementById('expenseForm').reset();

        //     updateSummary();
        // }




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
    </script>

</body>

</html>