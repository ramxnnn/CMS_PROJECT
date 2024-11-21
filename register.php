<?php
include('reusables/connect.php');
include('includes/functions.php');

if (isset($_POST['registerButton'])) {
    $gamer_name = $_POST['gamer_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing
    $role = 'user';  // Default role

    // Check if email already exists
    $check = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        set_message('Email is already registered!', 'danger');
        header('Location: register.php');
        exit();
    }

    // Insert new user
    $query = "INSERT INTO users (gamer_name, email, password, role) VALUES ('$gamer_name', '$email', '$password', '$role')";
    if (mysqli_query($connect, $query)) {
        set_message('Registration successful! Please log in.', 'success');
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($connect); // Debugging line
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('Image/2.gif') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .registration-container {
            background-color: rgba(34, 34, 34, 0.8);
            border-radius: 10px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            color: #ffffff; 
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        label, .form-control {
            color: #ffffff;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Register</h2>
        <?php get_message(); ?>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="gamer_name" class="form-label">Gamer Name</label>
                <input type="text" class="form-control" name="gamer_name" id="gamer_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registerButton">Register</button>
        </form>
        <div class="mt-3">
            <p class="text-center">Already have an account?</p>
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
    </div>
</body>
</html>