<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

if (isset($_POST['username'])) {

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = md5($_POST['password']); 

    $query = 'SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $password . '" LIMIT 1';
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header('Location: index.php');
        die();
    } else {
        set_message('Invalid username or password');
    }
}

include('includes/header.php');

?>

<h2>Login</h2>

<form method="post">

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>

    <input type="submit" value="Login">

</form>

<?php

include('includes/footer.php');

?>
