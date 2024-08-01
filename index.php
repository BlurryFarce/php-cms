<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Welcome to My Website!</h1>
  <p>This is the website frontend!</p>

  <?php

  $query = 'SELECT *
    FROM pets';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> pets in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['name']; ?></h2>
      <p>Species: <?php echo $record['species']; ?></p>
      <p>Breed: <?php echo $record['breed']; ?></p>
      <p>Description: <?php echo $record['description']?></p>
      <p><?php echo $record['age']?> years old</p>

    </div>

    <hr>

  <?php endwhile; ?>

</body>
</html>
