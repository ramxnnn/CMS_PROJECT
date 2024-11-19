<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video_Games</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: url(Image/background.jpg);
      background-size: 100% 100%;
      /* background-color: #343a40; */
      color: white;
      font-family: Arial, sans-serif;
    }
    h1
    {
      font: small-caps bold 24px/1 sans-serif;
      text-align: center;
      font-size: 4rem;
      font-weight: bold;
      padding: 20px;
    }
    .card {
      transition: transform 0.2s;
      background-color: #495057;
      border: none;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card-title {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .badge {
      background-color: #007bff;
      color: white;
    }
    .card-deck {
      margin-top: 20px;
    }
    .strong-text {
      font-weight: bold;
      color: #4adf17;
    }
    .button-center {
      display: flex;
      justify-content: space-between;
    }
    .button-center form {
      flex: 1;
      margin: 0 5px;
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
    <h1>Games</h1>
    <div class="row card-deck">
      <?php 
        require('reusables/connect.php');
        $query = 'SELECT games.*, gamedetails.* FROM games JOIN gamedetails ON games.game_id = gamedetails.game_id'; 
        $games = mysqli_query($connect, $query);

        foreach ($games as $game) {
          echo '<div class="col-md-4 mb-4"> 
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($game['title']) . '</h5>
                <p class="card-text"><span class="strong-text">Description:</span> ' . htmlspecialchars($game['description']) . '</p>
                <p class="card-text"><span class="strong-text">Genre:</span> ' . htmlspecialchars($game['genre']) . '</p>
                <p class="card-text"><span class="strong-text">Release Year:</span> ' . htmlspecialchars($game['release_year']) . '</p>
                <p class="card-text"><span class="strong-text">Rating:</span> ' . htmlspecialchars($game['review_score']) . '</p>
                <span class="badge">' . htmlspecialchars($game['age_rating']) . '</span>
              </div>
              <div class="card-footer">
                <div class="button-center">
                  <form method="GET" action="update.php">
                    <input type="hidden" name="game_id" value="' . $game['game_id'] . '">
                    <button class="btn btn-primary btn-lg w-100">Update</button>
                  </form>
                  <form method="GET" action="delete.php">
                    <input type="hidden" name="game_id" value="' . $game['game_id'] . '">
                    <button class="btn btn-danger btn-lg w-100">Delete</button>
                  </form>
                </div>
              </div>
            </div>
          </div>'; 
        }
      ?>
    </div>
  </div>
</body>
</html>