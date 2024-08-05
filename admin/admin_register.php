<?php

include('../includes/database.php');
include('../includes/config.php');
include('../includes/functions.php');

secure();

if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    die();
}

if (isset($_POST['username'])) {

    if ($_POST['username'] && $_POST['email'] && $_POST['password']) {

        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = md5($_POST['password']); // Use MD5 for password

        $query = 'INSERT INTO users (username, password, email, role) VALUES ("' . $username . '", "' . $password . '", "' . $email . '", "admin")';
        mysqli_query($connect, $query);

        set_message('Admin user has been added');
    }

    header('Location: admin.php');
    die();
}

include('../includes/admin_header.php');

?>

<h2>Add Admin User</h2>

<form method="post">

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>

    <input type="submit" value="Add Admin">

</form>

<p><a href="admin.php"><i class="fas fa-arrow-circle-left"></i> Return to Admin List</a></p>

<?php

include('../includes/footer.php');

?>
