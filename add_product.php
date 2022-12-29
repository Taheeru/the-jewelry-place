<?php  
 $connect = mysqli_connect("localhost", "root", "", "blob");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["fileInput"]["tmp_name"])); 
      $product_name = $_POST["product_name"]; 
      $description = $_POST["description"]; 
      $category = $_POST["category"]; 
      $price = $_POST["price"]; 
      $stock = $_POST["stock"]; 
      $query = "INSERT INTO products(prod_name,price,prod_desc,prod_cat,unit_in_stock,prod_img) VALUES ('$product_name','$price','$description','$category','$stock','$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>   
<?php include('attach/header.php') ?>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="product_name"
                      name="product_name"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea
                      id="description"
                      name="description"
                      class="form-control validate"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="category"
                    >
                      <option selected>Select category</option>
                      <option value="School Bags">School Bags</option>
                      <option value="Travellers Bag">Travellers Bag</option>
                      <option value="Female Shoes">Female Shoes</option>
                      <option value="Male Shoes">Male Shoes</option>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="price"
                            >Price
                          </label>
                          <input
                            id="price"
                            name="price"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
<!--                       <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Expire Date
                          </label>
                          <input
                            id="expire_date"
                            name="expire_date"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div> -->
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Units In Stock
                          </label>
                          <input
                            id="stock"
                            name="stock"
                            type="number"
                            class="form-control validate"
                            required
                          />
                        </div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class=" mx-auto">
                  <input id="fileInput" name="fileInput" type="file" accept="fileInput/*" onchange="preview_image(event)"  />
                </div>
                <div class="custom-file mt-3 mb-3">
                                    <img
                    id="profile-img-tag"
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                  ></img>

                  <input
                    type="submit"
                    class="btn btn-primary btn-block mx-auto"
                    value="UPLOAD PRODUCT IMAGE"
                    
                  />
                </div>
                      <script type="text/javascript">

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {

                $('#profile-img-tag').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#fileInput").change(function(){

        readURL(this);

    });

</script>
<!--                 <div class="row">
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="price"
                        >Price
                      </label>
                      <input
                        id="price"
                        name="price"
                        type="text"
                        class="form-control validate"
                        data-large-mode="true"
                          />
                    </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Units 
                          </label>
                          <input
                            id="stock"
                            name="stock"
                            type="text"
                            class="form-control validate"
                            required
                          />
                        </div>                    
                  </div> -->
              </div>
              <div class="col-12">
                <button type="submit" name="insert" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include('attach/footer.php') ?>
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