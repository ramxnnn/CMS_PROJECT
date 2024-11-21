<?php
include('../reusables/connect.php');
include('../includes/functions.php');
secure();

if (!is_admin()) {
    set_message('You are not authorized to add games!', 'danger');
    header('Location: index.php');
    exit();
}

if (isset($_POST['addGame'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $publisher = $_POST['publisher'];
    $review_score = $_POST['review_score'];
    $release_year = $_POST['release_year'];
    $description = $_POST['description'];
    $platform = $_POST['platform'];
    $multiplayer = $_POST['multiplayer'];
    $age_rating = $_POST['age_rating'];
    $price = $_POST['price'];
  require('../reusables/connect.php');
    // Insert into the games table
    $query = "INSERT INTO games (title, genre, publisher, review_score, release_year) VALUES (
        '" . mysqli_real_escape_string($connect, $title) . "',
        '" . mysqli_real_escape_string($connect, $genre) . "',
        '" . mysqli_real_escape_string($connect, $publisher) . "',
        '" . mysqli_real_escape_string($connect, $review_score) . "',
        '" . mysqli_real_escape_string($connect, $release_year) . "'
    )";

    if (mysqli_query($connect, $query)) {
        $game_id = mysqli_insert_id($connect);

        // Insert into the gamedetails table
        $detailsQuery = "INSERT INTO gamedetails (`game_id`, `description`, `platform`, `multiplayer`, `age_rating`, `price`) VALUES (
            $game_id,
            '" . mysqli_real_escape_string($connect, $description) . "',
            '" . mysqli_real_escape_string($connect, $platform) . "',
            '" . mysqli_real_escape_string($connect, $multiplayer) . "',
            '" . mysqli_real_escape_string($connect, $age_rating) . "',
            '" . mysqli_real_escape_string($connect, $price) . "'
        )";

        if (mysqli_query($connect, $detailsQuery)) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "There was an error adding game details: " . mysqli_error($connect);
        }
    } else {
        echo "There was an error adding the game: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>