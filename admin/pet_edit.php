<?php
include('../includes/config.php');
include('../includes/database.php');
include('../includes/functions.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');

if (!isset($_GET['id'])) {
    header('Location: manage_pets.php');
    exit();
}

$id = mysqli_real_escape_string($connect, $_GET['id']);
$query = "SELECT * FROM pets WHERE id = '$id'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) == 0) {
    set_message('Pet not found.');
    header('Location: manage_pets.php');
    exit();
}

$pet = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $species = mysqli_real_escape_string($connect, $_POST['species']);
    $breed = mysqli_real_escape_string($connect, $_POST['breed']);
    $age = mysqli_real_escape_string($connect, $_POST['age']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $query = "UPDATE pets SET name = '$name', species = '$species', breed = '$breed', age = '$age', description = '$description' WHERE id = '$id'";
    if (mysqli_query($connect, $query)) {
        set_message('Pet updated successfully.');
        header('Location: manage_pets.php');
        exit();
    } else {
        set_message('Error updating pet.');
    }
}
?>

<h1>Edit Pet</h1>
<form method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($pet['name']); ?>" required>
    
    <label for="species">Species</label>
    <input type="text" id="species" name="species" value="<?php echo htmlspecialchars($pet['species']); ?>" required>
    
    <label for="breed">Breed</label>
    <input type="text" id="breed" name="breed" value="<?php echo htmlspecialchars($pet['breed']); ?>" required>
    
    <label for="age">Age</label>
    <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($pet['age']); ?>" required>
    
    <label for="description">Description</label>
    <textarea id="description" name="description"><?php echo htmlspecialchars($pet['description']); ?></textarea>
    
    <input type="submit" value="Update Pet">
</form>

<?php include('../includes/footer.php'); ?>
