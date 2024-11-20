<?php
include('reusables/connect.php');
include('includes/functions.php');

if (isset($_POST['loginButton'])) {
    $query = 'SELECT * 
              FROM users
              WHERE email = "' . $_POST['email'] . '"
              AND password = "' . md5($_POST['password']) . '"
              LIMIT 1';

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result)) {
        $record = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['id'] = $record['id'];
        $_SESSION['email'] = $record['email'];
        $_SESSION['role'] = $record['role']; 

        set_message('Login successful!', 'success');
        header('Location: index.php');
        die();
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

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
  box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
  padding: 40px;
  width: 100%;
  max-width: 400px;
  animation: fadeIn 1s ease-in-out;
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
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.alert {
  margin-top: 20px;
}

@keyframes fadeIn {
  0% { opacity: 0; transform: translateY(-50px); }
  100% { opacity: 1; transform: translateY(0); }
}

  </style>

</head>
<body>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
          <div class="login-container">
            <h2>Login</h2>
            <?php get_message(); ?>
            <form action="login.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
              </div>
              <button type="submit" class="btn btn-primary" name="loginButton">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybWtb3VtWvJ6mYekpvvpXs9AqS4uWFbiK6U+Lf0GjjfAX3q2E" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0U6dp6/x4zDhKxhQpIpxR9zz2lY1nL4/SC5WhXb+c+9bf4a4" crossorigin="anonymous"></script>
</body>
</html>
