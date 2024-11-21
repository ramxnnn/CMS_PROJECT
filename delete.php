<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: white;
            font-family: Arial, sans-serif;
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
    $gameID = $_GET['game_id'];
    $query = "SELECT * FROM games WHERE game_id = '$gameID'";
    $game = mysqli_query($connect, $query);

    if ($game && mysqli_num_rows($game) > 0) {
        $result = mysqli_fetch_assoc($game);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4">Delete Game: <?php echo htmlspecialchars($result['title']); ?></h1>
                <p class="lead">Are you sure you want to delete this game?</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <form method="POST" action="includes/deleteGame.php">
                    <input type="hidden" name="game_id" value="<?php echo $gameID; ?>">
                    <button type="submit" class="btn btn-danger" name="deleteGame">Delete</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <?php
    } else {
        echo '<div class="container"><p>Game not found.</p></div>';
    }
    ?>
</body>
</html>