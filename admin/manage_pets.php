<?php
include('../includes/config.php');
include('../includes/database.php');
secure();
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
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($pet = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $pet['id']; ?></td>
                <td><?php echo $pet['name']; ?></td>
                <td><?php echo $pet['species']; ?></td>
                <td><?php echo $pet['age']; ?></td>
                <td>
                    <a href="pet_edit.php?id=<?php echo $pet['id']; ?>">Edit</a>
                    <a href="pet_delete.php?id=<?php echo $pet['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include('../includes/footer.php'); ?>
