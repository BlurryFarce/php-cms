<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = 'SELECT * FROM pets WHERE id = ' . $id;
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        $pet = mysqli_fetch_assoc($result);
    } else {
        header('Location: pet_list.php');
        die();
    }
}

include('includes/header.php');

?>

<h2>Pet Details</h2>

<p><strong>Name:</strong> <?php echo htmlentities($pet['name']); ?></p>
<p><strong>Breed:</strong> <?php echo htmlentities($pet['breed']); ?></p>
<p><strong>Description:</strong> <?php echo htmlentities($pet['description']); ?></p>

<?php if (isset($_SESSION['id'])): ?>
    <a href="adopt_pet.php?id=<?php echo $pet['id']; ?>">Adopt this Pet</a>
<?php endif; ?>

<p><a href="pet_list.php">Back to Pet List</a></p>

<?php

include('includes/footer.php');

?>
