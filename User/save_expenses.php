<?php
session_start();

include(".././config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];

  $sqll = "INSERT INTO wedding_expenses (category, description, amount) VALUES ('$category', '$description', '$amount')";
  if ($conn->query($sqll) === TRUE) {
    echo "Expense added successfully!";
  } else {
    echo "Error: " . $conn->error;
  }
}
