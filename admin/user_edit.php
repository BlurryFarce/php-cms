<?php
include('../includes/config.php');
include('../includes/database.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');

if (!isset($_GET['id'])) {
    header('Location: user_list.php');
    exit();
}

$id = mysqli_real_escape_string($connect, $_GET['id']);
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = md5(mysqli_real_escape_string($connect, $_POST['password']));
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $role = mysqli_real_escape_string($connect, $_POST['role']);
    
    $query = "UPDATE users SET username = '$username', password = '$password', email = '$email', role = '$role' WHERE id = '$id'";
    if (mysqli_query($connect, $query)) {
        set_message('User updated successfully.');
        header('Location: manage_users.php');
        exit();
    } else {
        set_message('Error updating user.');
    }
}
?>

<h1>Edit User</h1>
<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
    <label for="role">Role</label>
    <select id="role" name="role">
        <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="user" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
    </select>
    <input type="submit" value="Update User">
</form>

<?php include('../includes/footer.php'); ?>
