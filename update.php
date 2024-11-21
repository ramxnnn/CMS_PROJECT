<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }
        h1 {
            font-weight: bold;
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

    <?php 
    require('reusables/connect.php');
    $game_id = $_GET['game_id'];
    $query = "SELECT * FROM games INNER JOIN gamedetails ON games.game_id = gamedetails.game_id WHERE games.game_id = '$game_id'";
    $game = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($game);
    ?>

    <div class="container">
        <h1 class="display-4">Update Game: <?php echo htmlspecialchars($result['title']); ?></h1>
        <form method="POST" action="includes/updateGame.php">
            <input type="hidden" name="game_id" value="<?php echo $result['game_id']; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($result['title']); ?>" required>
            </div<div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo htmlspecialchars($result['genre']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo htmlspecialchars($result['publisher']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="review_score" class="form-label">Review Score</label>
                <input type="number" class="form-control" id="review_score" name="review_score" value="<?php echo htmlspecialchars($result['review_score']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="release_year" class="form-label">Release Year</label>
                <input type="number" class="form-control" id="release_year" name="release_year" value="<?php echo htmlspecialchars($result['release_year']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($result['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="platform" class="form-label">Platform</label>
                <input type="text" class="form-control" id="platform" name="platform" value="<?php echo htmlspecialchars($result['platform']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="multiplayer" class="form-label">Multiplayer</label>
                <input type="text" class="form-control" id="multiplayer" name="multiplayer" value="<?php echo htmlspecialchars($result['multiplayer']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="age_rating" class="form-label">Age Rating</label>
                <input type="text" class="form-control" id="age_rating" name="age_rating" value="<?php echo htmlspecialchars($result['age_rating']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($result['price']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="updateGame">Update Game</button>
        </form>
    </div>
</body>
</html>