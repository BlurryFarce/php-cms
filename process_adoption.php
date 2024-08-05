<?php
include('includes/config.php');
include('includes/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pet_id = $_POST['pet_id'];
    $user_id = $_SESSION['id'];
    $reason = $_POST['reason'];

    $query = "INSERT INTO adoption_requests (user_id, pet_id, status, request_date) VALUES (?, ?, 'pending', NOW())";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $user_id, $pet_id);
    mysqli_stmt_execute($stmt);

    header('Location: thank_you.php');
    exit();
}
?>
