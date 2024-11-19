<?php
if (isset($_POST['deleteGame'])) {
    $game_id = $_POST['game_id'];
    require('../reusables/connect.php');

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
