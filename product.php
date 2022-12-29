<?php include('attach/header.php') ?>
<?php include 'config.php'; ?>

    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">UNIT IN STOCK</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">DATE MODIFIED</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  $connect = mysqli_connect("localhost", "root", "", "blob"); 
                    $query = "SELECT id,prod_name,unit_in_stock,price,date_modified FROM products"; 
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result)){
                      $id=$row['id'];
                        echo "
                          <tr><a href='edit_product.php?id=$id'>
                            <th scope='row'><input type='checkbox'/></th>
                            <td class='tm-product-name'><a href='edit_product.php?id=$id'>".$row['prod_name']."</a></td>
                            <td>".$row['unit_in_stock']."</td>
                            <td>".$row['price']."</td>
                            <td>".$row['date_modified']."</td>
                            <td>
                              <a href='del.php?id=$id' class='tm-product-delete-link'>
                                <i class='far fa-trash-alt tm-product-delete-icon'></i>
                              </a>
                            </td></a>
                          </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add_product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                  <?php  $connect = mysqli_connect("localhost", "root", "", "blob"); 
                    $query = "SELECT category_name FROM category"; 
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result)){
                        echo "
                          <tr>
                            <td class='tm-product-name'>".$row['category_name']."</td>
                            <td class='text-center'>
                              <a href='del.php?id=$id' class='tm-product-delete-link'>
                                <i class='far fa-trash-alt tm-product-delete-icon'></i>
                              </a>
                            </td>
                          </tr>";
                    }
                  ?>

                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button>
          </div>
        </div>
      </div>
    </div>
   <?php include('attach/footer.php') ?>