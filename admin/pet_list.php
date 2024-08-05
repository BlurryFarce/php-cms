<?php
include('../includes/config.php');
include('../includes/database.php');
secure();
if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
include('../includes/admin_header.php');

$query = "SELECT * FROM pets";
$result = mysqli_query($connect, $query);
?>

<h1>Manage Pets</h1>
<a href="pet_add.php">Add Pet</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Species</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($pet = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($pet['id']); ?></td>
                <td><?php echo htmlspecialchars($pet['name']); ?></td>
                <td><?php echo htmlspecialchars($pet['species']); ?></td>
                <td><?php echo htmlspecialchars($pet['breed']); ?></td>
                <td><?php echo htmlspecialchars($pet['age']); ?></td>
                <td><?php echo htmlspecialchars($pet['description']); ?></td>
                <td>
                    <a href="pet_edit.php?id=<?php echo htmlspecialchars($pet['id']); ?>">Edit</a>
                    <a href="pet_delete.php?id=<?php echo htmlspecialchars($pet['id']); ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include('../includes/footer.php'); ?>
