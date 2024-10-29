<?php
// Include config file
require_once '.././config/connection.php';


// Define variables and initialize with empty values
$name = $email = $country = $state = $price = $description = $picture = $username = $password = $confirm_password = "";

$fname_err = $email_err = $username_err = $password_err = $confirm_password_err = "";

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (empty(trim($_POST["name"]))) {
		$fname_err = "Please enter a name";
	} else {
		$name = trim($_POST["name"]);
	}

	if (empty(trim($_POST["email"]))) {
		$email_err = "Please enter a correct email";
	} else {
		$email = trim($_POST["email"]);
	}

	if (empty(trim($_POST["country"]))) {
		$country_err = "Please enter the country you are from";
	} else {
		$country = trim($_POST["country"]);
	}

	if (empty(trim($_POST["state"]))) {
		$state_err = "Please enter your state";
	} else {
		$state = trim($_POST["state"]);
	}

	if (empty(trim($_POST["price"]))) {
		$price_err = "Please enter your minimum service price";
	} else {
		$price = trim($_POST["price"]);
	}


	if (empty(trim($_POST["description"]))) {
		$description_err = "Please describe your service";
	} else {
		$description = trim($_POST["description"]);
	}

	// Image upload handling
	$targetDir = "uploads/"; // Directory where images will be uploaded
	$targetFile = $targetDir . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

	// Check if image file is a actual image
	$check = getimagesize($_FILES["picture"]["tmp_name"]);
	if ($check === false) {
		echo "File is not an image.";
		$uploadOk = 0;
	}

	// Check file size (limit to 2MB)
	if ($_FILES["picture"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	}
	// If everything is ok, try to upload file
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

		echo "Image uplaoded successfully";
	}


	// Check if username is empty
	if (empty(trim($_POST['username']))) {
		$username_err = "Please enter a username.";

		// Check if username already exist
	} else {

		// Prepare a select statement
		$sql = 'SELECT vendorID FROM vendors WHERE username = ?';

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
		$password = trim($_POST["password"]);
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
		$sql = 'INSERT INTO vendors (name, email, description, price, country, state, picture, username, password) VALUES (?,?,?,?,?,?,?,?,?)';

		if ($stmt = $conn->prepare($sql)) {

			// Set parmater
			$param_name = $name;
			$param_email = $email;
			$param_description = $description;
			$param_price = $price;
			$param_country = $country;
			$param_state = $state;
			$param_picture = $picture;
			$param_username = $username;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Created a password

			// Bind param variable to prepares statement
			$stmt->bind_param('sssdsssss', $param_name, $param_email, $param_description, $param_price, $param_country, $param_state, $param_picture, $param_username, $param_password);

			// Attempt to execute
			if ($stmt->execute()) {
				// Redirect to login page
				header('location: ./login.php');
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
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
						<input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Vendors Name" name="name" value="<?php echo $name ?>" />
						<span><?php (!empty($name_err)) ? 'has_error' : ''; ?></span>

						<input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Email" name="email" value="<?php echo $email ?>">
						<span><?php (!empty($email_err)) ? 'has_error' : ''; ?></span>

						<input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter your country" name="country" value="<?php echo $country ?>">
						<span><?php (!empty($country_err)) ? 'has_error' : ''; ?></span>

						<input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter your state" name="state" value="<?php echo $state ?>">
						<span><?php (!empty($state_err)) ? 'has_error' : ''; ?></span>

						<input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter your price" name="price" value="<?php echo $price ?>">
						<span><?php (!empty($price_err)) ? 'has_error' : ''; ?></span>

						<input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Describe your service" name="description" value="<?php echo $description ?>">
						<span><?php (!empty($description_err)) ? 'has_error' : ''; ?></span>

						<input type=" text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your username" name="username" value="<?php echo $username ?>">
						<span><?php (!empty($username_err)) ? 'has_error' : ''; ?></span>

						<input type=" password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Password" name="password" value="<?php echo $password ?>">
						<span><?php (!empty($password_err)) ? 'has_error' : ''; ?></span>

						<input type=" password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Confirm Password" name="password" value="<?php echo $confirm_password; ?>">
						<span><?php (!empty($confirm_password_err)) ? 'has_error' : ''; ?></span>


						<input type="file" lass="w-100 form-control border-0 py-3 mb-4" name="picture" accept="image/*" required>

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