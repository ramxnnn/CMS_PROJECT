<?php
include('reusables/connect.php');
include('includes/functions.php');

if (isset($_POST['loginButton'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        $record = mysqli_fetch_assoc($result);

        // Verify the password using password_verify()
        if (password_verify($password, $record['password'])) {
            // Password is correct, set session variables
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['id'] = $record['id'];
            $_SESSION['email'] = $record['email'];
            $_SESSION['role'] = $record['role'];

            set_message('Login successful!', 'success');
            header('Location: index.php');
            exit();
        } else {
            set_message('Invalid email or password!', 'danger');
            header('Location: login.php');
            die();
        }
    } else {
        set_message('Invalid email or password!', 'danger');
        header('Location: login.php');
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background: url('image/2.gif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Arial', sans-serif;
      }

      .login-container {
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
        color: #ffffff;
      }

      label {
        color: #ffffff; 
      }

      .form-control {
        border-radius: 5px;
        margin-bottom: 20px;
      }

      .btn-primary {
        width: 100%;
        padding: 10px;
        font-size: 18px;
        border-radius: 50px;
      }

      .btn-secondary {
        width: 100%;
        padding: 10px;
        font-size: 18px;
        border-radius: 50px;
      }

      .logo {
        display: block;
        margin: 0 auto 20px; 
        max-width: 100%; 
        height: auto; 
      }
    </style>
</head>
<body>
  <div class="login-container">
    <img src="Image/MediumLogo.png" alt="Medium Logo" class="logo">
    <h2>Login</h2>
    <?php get_message(); ?>
    <form action="login.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="loginButton">Login</button>
      <div class="mt-3 text-center">
        <p>Don't have an account? <a href="register.php" class="btn btn-secondary">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>