<?php
include('includes/config.php');
include('includes/database.php');
include('includes/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM pets WHERE id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pet = mysqli_fetch_assoc($result);

    if ($pet):
?>
        <h1><?php echo htmlspecialchars($pet['name']); ?></h1>
        <p>Species: <?php echo htmlspecialchars($pet['species']); ?></p>
        <p>Breed: <?php echo htmlspecialchars($pet['breed']); ?></p>
        <p>Age: <?php echo htmlspecialchars($pet['age']); ?></p>
        <p>Description: <?php echo htmlspecialchars($pet['description']); ?></p>
        <a href="adopt_pet.php?id=<?php echo htmlspecialchars($pet['id']); ?>" class="btn">Adopt</a>
<?php
    else:
        echo "<p>Pet not found.</p>";
    endif;
} else {
    echo "<p>Invalid pet ID.</p>";
}

include('includes/footer.php');
?>
