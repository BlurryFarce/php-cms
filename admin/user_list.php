<?php
include('../includes/config.php');
include('../includes/database.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');

$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);
?>

<h1>Users List</h1>
<a href="user_add.php">Add User</a>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($user = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td>
                <a href="user_edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                <a href="user_delete.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include('../includes/footer.php'); ?>
