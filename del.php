<?php include 'config.php'; ?>
<?php
  
  if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];

    $sql_delete = mysqli_query($con, "DELETE FROM products WHERE id = $id");

    header('location: index.php');
  }
?>
