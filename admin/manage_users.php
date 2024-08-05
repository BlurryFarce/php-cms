<?php
include('../includes/config.php');
include('../includes/database.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');
?>

<h2>Manage Users</h2>
<a href="user_add.php">Add User</a>
<a href="user_list.php">View All Users</a>

<?php include('../includes/footer.php'); ?>
