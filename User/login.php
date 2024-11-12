<?php

// Initialize sessions
session_start();

// Include config file
require_once(".././config/connection.php");

// Check if the user is already logged in, if yes then redirect him to dashboard page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ./dashboard.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = '';
$username_err = $password_err = '';

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if username is empty
    if (empty(trim($_POST['username']))) {
        echo 'Please enter username.';
    } else {
        $username = trim($_POST['username']);
    }

    // Check if password is empty
    if (empty(trim($_POST['password']))) {
        echo 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }


    $sql = 'SELECT id, username, password FROM users WHERE username = ?';

    if ($stmt = $conn->prepare($sql)) {

        // Set parmater
        $param_username = $username;

        // Bind param to statement
        $stmt->bind_param('s', $param_username);

        // Attempt to execute
        if ($stmt->execute()) {

            // Store result
            $stmt->store_result();

            // Check if username exists. Verify user exists then verify
            if ($stmt->num_rows == 1) {
                // Bind result into variables
                $stmt->bind_result($id, $username, $hashed_password);

                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {

                        // Start a new session
                        session_start();

                        // Store data in sessions
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;

                        // Redirect to user to page
                        header('location: ./dashboard.php');
                    } else {
                        // Display an error for passord mismatch
                        echo 'Invalid password';
                    }
                }
            } else {
                echo "Username does not exists.";
            }
        } else {
            echo "Oops! Something went wrong please try again";
        }
        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}

include("./incl/header.php");

?>

<div class="container-fluid contact">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Login </h1>

                    </div>
                </div>
                <div class="col-lg-3">



                </div>
                <div class="col-lg-6">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your username" name="username">
                        <p><?php (!empty($username_err)) ? 'has_error' : ''; ?></p>
                        <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Password" name="password">
                        <p><?php (!empty($password_err)) ? 'has_error' : ''; ?></p>

                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit" name="login">Login</button>
                    </form>
                    <p class="mb-4">Don't have an account? Signup <a href="./register.php">Here</a>.</p>
                </div>
                <div class="col-lg-3">


                </div>
            </div>
        </div>
    </div>
</div>



<?php include("incl/footer.php"); ?>