<?php 
session_start();
include('reusables/connect.php');
include('includes/functions.php');
secure(); // Ensure the user is logged in

// Fetch user information, including the gamer name
$user_query = "SELECT gamer_name FROM users WHERE id = '" . $_SESSION['id'] . "'";
$user_result = mysqli_query($connect, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$gamer_name = htmlspecialchars($user_data['gamer_name']);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/styles.css">
    <style>
        body {
            background: url('image/4.gif') no-repeat center center fixed; 
            background-size: cover;
            color: #343a40;
            font-family: 'Helvetica Neue', sans-serif;
        }

        .welcome-section {
            text-align: center;
            margin: 40px 0;
        }

        .rectangle1 {
            -webkit-backdrop-filter: blur(4px) brightness(100%);
            backdrop-filter: blur(4px) brightness(100%);
            background-color: #d9d9d91a;
            border: 5px solid;
            border-color: #ffffff80;
            border-radius: 50px;
            padding: 30px; 
            display: inline-block; 
        }

        .gamer-name {
            color: #ffbb33;
            font-size: 3rem;
            font-weight: bold;
        }

        h1 {
            color: #ffffff;
            font-size: 3rem;
        }

        .search-container {
            text-align: center;
            margin: 20px 0; 
        }

        .search-input {
            padding: 10px; 
            border-radius: 5px; 
            border: 3px solid darkgray; 
            border-radius: 10px;
            background-color: lightgrey; 
            color: black; 
            width: 300px; 
        }

        .search-button {
            padding: 10px 20px; 
            border-radius: 5px; 
            border: none; 
            background-color: #ffbb33; 
            color: black; 
            font-weight: bold;
            transition: background-color 0.3s; 
        }

        .search-button:hover {
            background-color: #ff9900; 
        }

        .games-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center; 
        }

        .box {
            width: 350px; 
            height: 650px; 
            background-color: rgba(255, 255, 255, 0.1); 
            border-radius: 20px; 
            padding: 15px; 
            backdrop-filter: blur(4px); 
            border: 2px solid #ffffff80; 
            margin: 10px;
        }

        .game-card {
            width: 100%; 
            height: auto;
            margin-bottom: 20px; 
            border-radius: 10px; 
            overflow: hidden; 
            transition: transform 0.3s; 
        }
        
      
        .game-card:hover {
            transform: scale(1.05); 
        }

        .card-img-top {
            height: 300px; 
            object-fit: cover; 
        }

        .card-title, .card-text {
            color: white; 
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
        <div class="welcome-section">
            <div class="rectangle1"> 
                <h1>Welcome to <span class="gamer-name">GAMER CENTRAL</span>, <?php echo $gamer_name; ?>!</h1>
            </div>
        </div>
        
        <div class="search-container">
              <form action="search.php" method="GET"> 
              <input type="text" class="search-input" placeholder="Search games..." name="query"> 
              <button type="submit" class="search-button">Search</button>
              </form>
          </div>

        <div class="games-container"> 
            <?php 
            // Query to retrieve games
            $query = 'SELECT games.*, gamedetails.* FROM games JOIN gamedetails ON games.game_id = gamedetails.game_id'; 
            $games = mysqli_query($connect, $query);

            while ($game = mysqli_fetch_assoc($games)) {
                $gameData = fetchRawgGameData($game['title']);
                $imageUrl = isset($gameData['results'][0]['background_image']) ? $gameData['results'][0]['background_image'] : 'default-image.jpg'; 

                echo '<div class="box"> <!-- Uniform container for each game -->
                        <div class="game-card">
                            <img src="' . $imageUrl . '" class="card-img-top" alt="' . htmlspecialchars($game['title']) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($game['title']) . '</h5>
                                <p class="card-text">Genre: ' . htmlspecialchars($game['genre']) . '</p>
                                <p class="card-text">Price: $' . htmlspecialchars($game['price']) . '</p>
                                <p class="card-text">Age Rating: ' . htmlspecialchars($game['age_rating']) . '</p>
                                <p class="card-text">' . htmlspecialchars($game['description']) . '</p>';
                if (is_admin()) {
                    echo '<a href="update.php?game_id=' . $game['game_id'] . '" class="btn btn-primary">Update</a>
                        <form method="GET" action="delete.php" class="d-inline">
                            <input type="hidden" name="game_id" value="' . $game['game_id'] . '">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>';
                }
                echo '</div>
                    </div>
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