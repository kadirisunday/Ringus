<?php
// Include config file
require_once '.././config/connection.php';


// Define variables and initialize with empty values
$fname = $email = $username = $password = $confirm_password = "";

$fname_err = $email_err = $username_err = $password_err = $confirm_password_err = "";

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (empty(trim($_POST["fname"]))) {
		$fname_err = "Please enter a name";
	} elseif (strlen(trim($_POST["fname"])) < 3) {
		$fname_err = "Name must have atleast 3 characters.";
	} else {
		$fname = trim($_POST["fname"]);
	}

	if (empty(trim($_POST["email"]))) {
		$email_err = "Please enter a correct email";
	} else {
		$email = trim($_POST["email"]);
	}
	// Check if username is empty
	if (empty(trim($_POST['username']))) {
		$username_err = "Please enter a username.";

		// Check if username already exist
	} else {

		// Prepare a select statement
		$sql = 'SELECT id FROM users WHERE username = ?';

		if ($stmt = $conn->prepare($sql)) {
			// Set parmater
			$param_username = trim($_POST['username']);

			// Bind param variable to prepares statement
			$stmt->bind_param('s', $param_username);

			// Attempt to execute statement
			if ($stmt->execute()) {

				// Store executed result
				$stmt->store_result();

				if ($stmt->num_rows == 1) {
					$username_err = 'This username is already taken.';
				} else {
					$username = trim($_POST['username']);
				}
			} else {
				echo "Oops!, something went wrong. Please try again later.";
			}

			// Close statement
			$stmt->close();
		} else {

			// Close db connction
			$mysql_db->close();
		}
	}

	// Validate password
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";
	} elseif (strlen(trim($_POST["password"])) < 6) {
		$password_err = "Password must have atleast 6 characters.";
	} else {
		$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
	}

	// Validate confirm password
	if (empty(trim($_POST["confirm_password"]))) {
		$confirm_password_err = "Please confirm password.";
	} else {
		$confirm_password = trim($_POST["confirm_password"]);
		if (empty($password_err) && ($password != $confirm_password)) {
			$confirm_password_err = "Password did not match.";
		}
	}

	// Check input error before inserting into database

	if (empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_err)) {

		// Prepare insert statement
		$sql = 'INSERT INTO users (fname, email, username, password) VALUES (?,?,?,?)';

		if ($stmt = $conn->prepare($sql)) {

			// Set parmater
			$param_fname = $fname;
			$param_email = $email;
			$param_username = $username;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Created a password

			// Bind param variable to prepares statement
			$stmt->bind_param('ssss', $param_fname, $param_email, $param_username, $param_password);


			// Attempt to execute
			if ($stmt->execute()) {
				// Redirect to login page

				echo "Registration successful";
				header('location: ./success.php');
				// echo "Will  redirect to login page";
			} else {
				echo "Something went wrong. Try signing in again.";
			}

			// Close statement
			$stmt->close();
		}

		// Close connection
		$mysql_db->close();
	}
}
include("./incl/header.php");
?>
<div class="container-fluid contact">
	<div class="container py-5">
		<div class="p-5 bg-light rounded">
			<div class="row g-4">
				<div class="col-12">
					<div class="text-center mx-auto" style="max-width: 700px;">
						<h1 class="text-primary">Register </h1>

					</div>
				</div>
				<div class="col-lg-3">



				</div>
				<div class="col-lg-6">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name" name="fname" value="<?php echo $fname ?>" />
						<span><?php (!empty($fname_err)) ? 'has_error' : ''; ?></span>

						<input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Email" name="email" value="<?php echo $email ?>">
						<span><?php (!empty($email_err)) ? 'has_error' : ''; ?></span>

						<input type=" text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your username" name="username" value="<?php echo $username ?>">
						<span><?php (!empty($username_err)) ? 'has_error' : ''; ?></span>

						<input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Password" name="password" value="<?php echo $password ?>">
						<span><?php (!empty($password_err)) ? 'has_error' : ''; ?></span>

						<input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Confirm Password" name="password" value="<?php echo $confirm_password; ?>">
						<span><?php (!empty($confirm_password_err)) ? 'has_error' : ''; ?></span>

						<div class="form-group">
							<input type="submit" class="btn btn-block btn-outline-success" value="Submit">
							<input type="reset" class="btn btn-block btn-outline-primary" value="Reset">
						</div>
						<p>Already have an account? <a href="login.php">Login here</a>.</p>

					</form>

				</div>
				<div class="col-lg-3">


				</div>
			</div>
		</div>
	</div>
</div>






<?php include("incl/footer.php"); ?>