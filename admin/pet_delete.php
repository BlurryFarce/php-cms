<?php
include('../includes/config.php');
include('../includes/database.php');
include('../includes/functions.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: pet_list.php');
    exit();
}

$id = mysqli_real_escape_string($connect, $_GET['id']);
$query = "DELETE FROM pets WHERE id = '$id'";
if (mysqli_query($connect, $query)) {
    set_message('Pet deleted successfully.');
} else {
    set_message('Error deleting pet.');
}

header('Location: pet_list.php');
exit();
?>
