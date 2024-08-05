<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

if (isset($_POST['username'])) {

    if ($_POST['username'] && $_POST['email'] && $_POST['password']) {

        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = md5($_POST['password']); // Use MD5 for password

        $query = 'INSERT INTO users (username, password, email, role) VALUES ("' . $username . '", "' . $password . '", "' . $email . '", "user")';
        mysqli_query($connect, $query);

        set_message('Registration successful');
        header('Location: login.php');
        die();
    }

    set_message('Please fill all fields');
}

include('includes/header.php');

?>

<h2>Register</h2>

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

    <input type="submit" value="Register">

</form>

<?php

include('includes/footer.php');

?>
