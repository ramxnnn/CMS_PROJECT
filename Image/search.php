<?php 
session_start();
include('reusables/connect.php');
include('includes/functions.php');
secure(); // Ensure the user is logged in

$search_query = '';
if (isset($_GET['query'])) {
    $search_query = mysqli_real_escape_string($connect, $_GET['query']); 
}

function fetchRawgGameData($query) {
    $apiKey = 'd580352359034650925ed7e4322f1afa'; 
    $url = "https://api.rawg.io/api/games?key=" . $apiKey . "&page_size=10&search=" . urlencode($query); 
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
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('image/4.gif') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
        }

        .games-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center; 
        }

        .box {
            width: 379px; 
            height: auto; 
            background-color: rgba(255, 255, 255, 0.1); 
            border-radius: 20px; 
            padding: 15px; 
            border: 2px solid #ffffff80; 
            margin: 10px;
        }

        .game-card {
            margin-bottom: 20px; 
        }

        .card-img-top {
            height: 150px; 
            object-fit: cover; 
            border-radius: 10px; 
        }

        .search-container {
            text-align: center;
            margin: 20px 0; 
        }

        .search-input {
            padding: 10px; 
            border-radius: 5px; 
            border: 1px solid #ffffff80; 
            background-color: rgba(255, 255, 255, 0.1); 
            color: white; 
            width: 250px; 
        }

        .search-button {
            padding: 10px 20px; 
            border-radius: 5px; 
            border: none; 
            background-color: #ffbb33; 
            color: black; 
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #ff9900; 
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
        <h1 class="text-center">Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h1> <!-- Display search query -->
        <div class="games-container"> <!-- Container for game boxes -->
            <?php 
            // Use the RAWG API to fetch search results
            $searchResults = fetchRawgGameData($search_query);
            
            if (isset($searchResults['results']) && count($searchResults['results']) > 0) {
                foreach ($searchResults['results'] as $result) {
                    $title = htmlspecialchars($result['name']);
                    $imageUrl = $result['background_image'] ?? 'default-image.jpg';

                    echo '<div class="box">
                            <div class="game-card">
                                <h5 class="card-title">' . $title . '</h5>
                                <img src="' . $imageUrl . '" alt="' . $title . '" class="card-img-top">
                              </div>
                          </div>';
                }
            } else {
                echo '<p class="text-center">No games found.</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
