<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Game</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #343a40;
      color: white;
      font-family: Arial, sans-serif;
    }
    .container {
      margin-top: 20px;
    }
    h1 {
      font-weight: bold;
      color: #4adf17; /* Set color for h1 */
    }
    .form-label {
      color: #ffffff;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      width: 25%;
      font-size: 1.2rem;
      padding: 12px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .submit-btn {
      display: flex;
      justify-content: flex-end; /* Align button to the right */
      margin-top: 20px; /* Add margin for spacing */
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  
  <?php 
    require('reusables/connect.php');
    $game_id = $_GET['game_id'];
    $query = "SELECT * FROM games INNER JOIN gamedetails ON games.game_id = gamedetails.game_id WHERE games.game_id = '$game_id'";
    $game = mysqli_query($connect, $query);
    $result = $game->fetch_assoc();
  ?>
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4"><?php echo htmlspecialchars($result['title']); ?></h1>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="includes/updateGame.php">
          <input type="hidden" name="game_id" value="<?php echo $result['game_id']; ?>">

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($result['title']); ?>">
          </div>

          <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo htmlspecialchars($result['genre']); ?>">
          </div>

          <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo htmlspecialchars($result['publisher']); ?>">
          </div>

          <div class="mb-3">
            <label for="review_score" class="form-label">Review Score</label>
            <input type="number" class="form-control" id="review_score" name="review_score" value="<?php echo htmlspecialchars($result['review_score']); ?>">
          </div>

          <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="number" class="form-control" id="release_year" name="release_year" value="<?php echo htmlspecialchars($result['release_year']); ?>">
          </div>
      </div>

      <div class="col-md-6">
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars($result['description']); ?></textarea>
          </div>

          <div class="mb-3">
            <label for="platform" class="form-label">Platform</label>
            <input type="text" class="form-control" id="platform" name="platform" value="<?php echo htmlspecialchars($result['platform']); ?>">
          </div>

          <div class="mb-3">
            <label for="multiplayer" class="form-label">Multiplayer</label>
            <input type="text" class="form-control" id="multiplayer" name="multiplayer" value="<?php echo htmlspecialchars($result['multiplayer']); ?>">
          </div>

          <div class="mb-3">
            <label for="age_rating" class="form-label">Age Rating</label>
            <input type="text" class="form-control" id="age_rating" name="age_rating" value="<?php echo htmlspecialchars($result['age_rating']); ?>">
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($result['price']); ?>">
          </div>

          <div class="submit-btn">
            <button type="submit" class="btn btn-primary" name="updateGame">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
