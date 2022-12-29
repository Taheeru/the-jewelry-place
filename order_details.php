<?php include 'config.php'; ?>
<?php
  
  if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql_update = mysqli_query($con, "UPDATE delivery_details SET status = 'Pending' WHERE id = $id");
  }
?>

<?php
  if (isset($_POST['complete'])) {
    # code...
  }
  if (isset($_POST['delete'])) {
    # code...
        $sql_update = mysqli_query($con, "DELETE FROM delivery_details WHERE id = $id");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts - Product Admin Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <div class="" id="home">
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="index.php">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
          </a>
          <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars tm-nav-icon"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php">
                  <i class="fas fa-shopping-cart"></i> Products
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="accounts.html">
                  <i class="far fa-user"></i> Accounts
                </a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link d-block" href="login.php">
                  Admin, <b>Logout</b>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <?php
        $sql_fetch = mysqli_query($con, "SELECT d.note, p.prod_name, p.prod_desc, p.prod_img, d.first_name, d.last_name, d.email, d.country, d.state, d.address, d.date_created, d.phone FROM delivery_details as d INNER JOIN products as p ON p.id = d.prod_id WHERE d.id=$id");
        while ($row = mysqli_fetch_assoc($sql_fetch)) :?>
      <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">Order Details</h2>
              <p class="text-white">Accounts</p>
              <p class="text-white"><?php echo $row['note']; ?></p>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title"><?php echo $row['prod_name']; ?></h2>
              <div class="tm-avatar-container">
                <img
                  src="img/avatar.png"
                  alt="Avatar"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <p class="text-white"><?php echo $row['prod_desc']; ?></p>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Billing Details</h2>
              <form action="" method="post" class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="name">Customer Name</label>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    class="form-control validate"
                    value="<?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Customer Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    value="<?php echo $row['email']; ?>"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="address">Customer home address</label>
                  <input
                    id="address"
                    name="address"
                    type="text"
                    value="<?php echo $row['address']; ?>"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="location">Customer location</label>
                  <input
                    id="location"
                    name="location"
                    value="<?php echo $row['country']; ?>, <?php echo $row['state']; ?>"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input
                    id="phone"
                    name="phone"
                    type="tel"
                    value="<?php echo $row['phone']; ?>"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="date">Order Date</label>
                  <input
                    id="date"
                    name="date"
                    type="text"
                    value="<?php echo $row['date_created']; ?>"
                    class="form-control validate"
                  />
                </div>
                <div class="col-12">
                  <button
                    type="submit"
                    name="complete"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Complete Transaction
                  </button>
                  <button
                    type="submit"
                    name="delete"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Delete Transaction
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile ?>
      <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
          </p>
        </div>
      </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
