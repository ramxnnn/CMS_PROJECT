<?php 
  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit(); 
  }
require('reusables/connect.php');

function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Games</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="public/styles.css">
  <style>
    /* Your custom styles */
    body {
      background: linear-gradient(120deg, #f3f4f7, #c1d1f3);
      color: #343a40;
      font-family: 'Arial', sans-serif;
    }
    h1 {
      text-align: center;
      margin: 20px 0;
      color: #2c3e50;
      text-transform: uppercase;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    .card-title {
      color: #f3f4f7;
      font-weight: bold;
    }
    .card-text {
      color: #f3f4f7;
    }
    .badge {
      background-color: #007bff;
      color: white;
      padding: 5px 10px;
      font-size: 14px;
      border-radius: 20px;
    }
    .button-center button {
      margin-top: 10px;
      transition: all 0.3s ease-in-out;
    }
    .button-center button:hover {
      transform: scale(1.1);
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php'); ?>
      </div>
    </div>
  </div>
  
  <div class="container">
    <h1 class="animate__animated animate__fadeInDown">Games</h1>
    <div class="row card-deck">
      <?php 
        $query = 'SELECT games.*, gamedetails.* 
                  FROM games 
                  JOIN gamedetails ON games.game_id = gamedetails.game_id'; 
        $games = mysqli_query($connect, $query);

        foreach ($games as $game) {
          echo '<div class="col-md-4 mb-4 animate__animated animate__zoomIn"> 
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($game['title']) . '</h5>
                <p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($game['description']) . '</p>
                <p class="card-text"><strong>Genre:</strong> ' . htmlspecialchars($game['genre']) . '</p>
                <p class="card-text"><strong>Release Year:</strong> ' . htmlspecialchars($game['release_year']) . '</p>
                <p class="card-text"><strong>Rating:</strong> ' . htmlspecialchars($game['review_score']) . '</p>
                <span class="badge">' . htmlspecialchars($game['age_rating']) . '</span>
              </div>';
              
          // Check if the logged-in user is an admin
          if (is_admin()) {
            echo '<div class="card-footer">
                    <div class="button-center text-center">
                      <form method="GET" action="update.php" class="d-inline">
                        <input type="hidden" name="game_id" value="' . $game['game_id'] . '">
                        <button class="btn btn-primary btn-lg w-100">Update</button>
                      </form>
                      <form method="GET" action="delete.php" class="d-inline">
                        <input type="hidden" name="game_id" value="' . $game['game_id'] . '">
                        <button class="btn btn-danger btn-lg w-100">Delete</button>
                      </form>
                    </div>
                  </div>';
          }

          echo '</div>
          </div>'; 
        }
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
