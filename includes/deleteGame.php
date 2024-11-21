<?php
include('../reusables/connect.php');
include('../includes/functions.php');

secure();

if(!is_admin()) {
    set_message('You are not authorized to delete games', 'danger');
    header('Location: index.php');
    exit();
}

if (isset($_POST['deleteGame'])) {
    $game_id = $_POST['game_id'];

    $stmt = $connect->prepare("DELETE FROM gamedetails WHERE game_id = ?");
    $stmt->bind_param("i", $game_id);
    $stmt->execute();

    $stmt = $connect->prepare("DELETE FROM games WHERE game_id = ?");
    $stmt->bind_param("i", $game_id);
    
    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "There was an error deleting the game: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($connect);
}
?>