<?php
//getting id from url

if (isset($_GET['id'])) {

    $id = $_GET['id'];

}



?>
   <?php include('attach/header.php') ?>

<?php
    $connect = mysqli_connect("localhost", "root", "", "blob"); 
        $query = "SELECT * FROM products WHERE id='$id'"; 
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result)){
                
                $prod_name = $row['prod_name'];
                $prod_cat = $row['prod_cat'];
                $price = $row['price'];
                $availability = $row['availability'];
                $prod_desc = $row['prod_desc'];

              }
?>
    <!--
  Product Admin CSS Template
  https://templatemo.com/tm-524-product-admin
  -->

    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Edit Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" method="post" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="name"
                      name="prod_name"
                      type="text"
                      value="<?php echo $prod_name;?>"
                      class="form-control validate"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="5"
                      name="prod_desc"
                      value="<?php echo $prod_desc;?>"
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category
                    </label>
                    <input
                      id="category"
                      name="prod_cat"
                      type="text"
                      value="<?php echo $prod_cat;?>"
                      class="form-control validate"
                    />
                  </div>
                  <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Price
                          </label>
                          <input
                            id="price"
                            name="price"
                            type="text"
                            value="<?php echo $price;?>"
                            class="form-control validate"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Availability
                          </label>
                          <input
                            id="availability"
                            name="availability"
                            type="text"
                            value="<?php echo $availability;?>"
                            class="form-control validate"
                          />
                        </div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

              <?php
                $query = "SELECT * FROM products WHERE id='$id'"; 
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($result)){
                
                $prod_name = $row['prod_name'];
                $prod_cat = $row['prod_cat'];
                $price = $row['price'];
                $availability = $row['availability'];
                $prod_desc = $row['prod_desc'];

                echo '

                <div class="tm-product-img-edit mx-auto">
                  <img id"output_image" src="data:image/jpeg;base64,'.base64_encode($row['prod_img'] ).'" alt="Product image" class="img-fluid d-block mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById("fileInput").click();"
                  ></i>
                </div>
                ';
              }
              ?>

                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" name="fileInput" type="file" accept="fileInput/*" onchange="preview_image(event)" style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="CHANGE IMAGE NOW"
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="update" class="btn btn-primary btn-block text-uppercase">Update Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
// including the database connection file
include_once("../config.php");
 
if(isset($_POST['update']))
{    
    $id = $_GET['id'];
    
    $prod_name=$_POST['prod_name'];
    $prod_cat=$_POST['prod_cat'];
    $prod_desc=$_POST['prod_desc'];    
    $price=$_POST['price'];    
    $availability=$_POST['availability'];   
    
    // checking empty fields
    if(empty($prod_name) || empty($prod_cat) || empty($prod_desc) || empty($price)) {    
            
        if(empty($prod_name)) {
            echo "<font color='red'>Product name field is empty.</font><br/>";
        }
        
        if(empty($prod_cat)) {
            echo "<font color='red'>Category field is empty.</font><br/>";
        }
        
        if(empty($prod_desc)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        } 
        if(empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $sql = "UPDATE products SET prod_name=:prod_name, prod_desc=:prod_desc, prod_cat=:prod_cat, price=:price WHERE id=:id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':prod_name', $prod_name);
        $query->bindparam(':prod_desc', $prod_desc);
        $query->bindparam(':prod_cat', $prod_cat);
        $query->bindparam(':price', $price);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
    
    }
}
?>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
    <?php include('attach/footer.php') ?>