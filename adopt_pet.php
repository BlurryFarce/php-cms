<?php

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

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
        <h1>Adopt <?php echo htmlspecialchars($pet['name']); ?></h1>
        <form action="process_adoption.php" method="POST">
            <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet['id']); ?>">
            <label for="reason">Why do you want to adopt this pet?</label>
            <textarea name="reason" id="reason" required></textarea><br>
            <input type="submit" value="Submit Application">
        </form>
<?php
    else:
        echo "<p>Pet not found.</p>";
    endif;
} else {
    echo "<p>Invalid pet ID.</p>";
}

include('includes/footer.php');
?>
