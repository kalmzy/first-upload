<?php
require_once '../Database/connection.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $email = trim($_POST["email"]);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username already exists
    $stmt = $conn->prepare("SELECT username FROM user_table WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username already exists!";
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $conn->prepare("INSERT INTO user_table (firstname, lastname, birthday, gender, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss",$firstname, $lastname, $birthday, $gender, $email, $username, $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    
<head>
	<title>My Awesome Login Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="user_card">
            <div class="brand_logo_container">
                <img src="typography-kalmz.png" class="brand_logo" alt="Logo">
            </div>
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" name="birthday" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            <select name="gender" class="form-control" required>
                                <option value="">Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>

            <div class="mt-3 text-center sign-up">
                <span class="text-white">Already have an account?</span> <a href="login.php">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>
