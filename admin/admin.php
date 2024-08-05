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

<h1>Admin Panel</h1>
<p>Welcome to the admin panel.</p>

<?php include('../includes/footer.php'); ?>
