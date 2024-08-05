<?php
include('../includes/config.php');
include('../includes/database.php');
include('../includes/functions.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $query = "DELETE FROM users WHERE id = '$id'";
    if (mysqli_query($connect, $query)) {
        set_message('User deleted successfully.');
    } else {
        set_message('Error deleting user.');
    }
}
header('Location: manage_users.php');
exit();
?>
