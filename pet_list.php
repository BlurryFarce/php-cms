<?php
include('includes/config.php');
include('includes/database.php');
include('includes/header.php');

// Fetch the list of pets from the database
$query = "SELECT id, name, species, breed, age, description FROM pets";
$result = mysqli_query($connect, $query);
?>

<h1>Pet List</h1>

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
                    <a href="pet_details.php?id=<?php echo htmlspecialchars($pet['id']); ?>" class="btn">View Details</a>
                    <a href="adopt_pet.php?id=<?php echo htmlspecialchars($pet['id']); ?>" class="btn">Adopt</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include('includes/footer.php'); ?>
