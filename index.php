<?php 
  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit(); 
  }

  require('reusables/connect.php');

  // Function to fetch game data and images from the RAWG API
  function fetchRawgGameData($query) {
      $apiKey = 'd580352359034650925ed7e4322f1afa'; 
      $url = "https://api.rawg.io/api/games?key=" . $apiKey . "&page_size=1&search=" . urlencode($query);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);

      return json_decode($response, true);
  }

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
   body {
      background: url('image/4.gif') no-repeat center center fixed;
      background-size: cover;
      color: #343a40;
      font-family: 'Arial', sans-serif;
    }

    h1 {
      text-align: center;
      margin: 20px 0;
      color: #f3f4f7;
      text-transform: uppercase;
      font-size: 3rem; 
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); 
      padding: 20px;
      border-radius: 8px; 
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      display: flex;
      flex-direction: column;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      flex-grow: 1;
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

    .game-image {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .row.card-deck {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .col-md-4 {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
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
          $gameData = fetchRawgGameData($game['title']);
          $imageUrl = isset($gameData['results'][0]['background_image']) ? $gameData['results'][0]['background_image'] : 'default-image.jpg'; 

          echo '<div class="col-md-4 mb-4 animate__animated animate__zoomIn"> 
            <div class="card">
              <img src="' . $imageUrl . '" alt="' . htmlspecialchars($game['title']) . '" class="game-image">
              <div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($game['title']) . '</h5>
                <p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($game['description']) . '</p>
                <p class="card-text"><strong>Genre:</strong> ' . htmlspecialchars($game['genre']) . '</p>
                <p class="card-text"><strong>Release Year:</strong> ' . htmlspecialchars($game['release_year']) . '</p>
                <p class="card-text"><strong>Rating:</strong> ' . htmlspecialchars($game['review_score']) . '</p>
                <span class="badge">' . htmlspecialchars($game['age_rating']) . '</span>
              </div>';
              
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
