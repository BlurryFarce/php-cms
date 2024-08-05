<?php
include('../includes/config.php');
include('../includes/functions.php');
include('../includes/database.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $species = mysqli_real_escape_string($connect, $_POST['species']);
    $breed = mysqli_real_escape_string($connect, $_POST['breed']);
    $age = (int)$_POST['age'];
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $query = "INSERT INTO pets (name, species, breed, age, description) VALUES ('$name', '$species', '$breed', '$age', '$description')";
    if (mysqli_query($connect, $query)) {
        set_message('Pet added successfully.');
        header('Location: pet_list.php');
        exit();
    } else {
        set_message('Error adding pet.');
    }
}
?>

<h1>Add Pet</h1>
<form method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>

    <label for="species">Species</label>
    <input type="text" id="species" name="species" required>

    <label for="breed">Breed</label>
    <input type="text" id="breed" name="breed" required>

    <label for="age">Age</label>
    <input type="number" id="age" name="age" required>

    <label for="description">Description</label>
    <textarea id="description" name="description"></textarea>

    <input type="submit" value="Add Pet">
</form>

<?php include('../includes/footer.php'); ?>
