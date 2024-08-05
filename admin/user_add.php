<?php
include('../includes/config.php');
include('../includes/database.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = md5(mysqli_real_escape_string($connect, $_POST['password']));
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $role = mysqli_real_escape_string($connect, $_POST['role']);
    
    $query = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
    if (mysqli_query($connect, $query)) {
        set_message('User added successfully.');
        header('Location: manage_users.php');
        exit();
    } else {
        set_message('Error adding user.');
    }
}
?>

<h1>Add User</h1>
<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <label for="role">Role</label>
    <select id="role" name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <input type="submit" value="Add User">
</form>

<?php include('../includes/footer.php'); ?>
