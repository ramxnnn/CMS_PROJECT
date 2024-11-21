<?php
include('../reusables/connect.php');
include('../includes/functions.php');
secure();

if (!is_admin()) {
    set_message('You are not authorized to update games!', 'danger');
    header('Location: index.php');
    exit();
}

if (isset($_POST['updateGame'])) {
    $game_id = $_POST['game_id'];
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

    // Update games table
    $query = "UPDATE games SET 
        title = '" . mysqli_real_escape_string($connect, $title) . "',
        genre = '" . mysqli_real_escape_string($connect, $genre) . "',
        publisher = '" . mysqli_real_escape_string($connect, $publisher) . "',
        review_score = '" . mysqli_real_escape_string($connect, $review_score). "',
        release_year = '" . mysqli_real_escape_string($connect, $release_year) . "' 
        WHERE game_id = " . intval($game_id);

    if (mysqli_query($connect, $query)) {
        // Update gamedetails table
        $detailsQuery = "UPDATE gamedetails SET 
            description = '" . mysqli_real_escape_string($connect, $description) . "',
            platform = '" . mysqli_real_escape_string($connect, $platform) . "',
            multiplayer = '" . mysqli_real_escape_string($connect, $multiplayer) . "',
            age_rating = '" . mysqli_real_escape_string($connect, $age_rating) . "',
            price = '" . mysqli_real_escape_string($connect, $price) . "' 
            WHERE game_id = " . intval($game_id);

        if (mysqli_query($connect, $detailsQuery)) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "There was an error updating game details: " . mysqli_error($connect);
        }
    } else {
        echo "There was an error updating the game: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>