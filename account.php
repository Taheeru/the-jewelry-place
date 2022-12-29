  
  <?php  $connect = mysqli_connect("localhost", "root", "", "blob"); 

 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["file"]["tmp_name"])); 
      $name = $_POST["name"]; 
      $email = $_POST["email"]; 
      $account_type = $_POST["account_type"];
      $password = $_POST["password"]; 
      $phone = $_POST["phone"]; 
 
      $query = "INSERT INTO admin(name,email,account_type,phone,password,admin_img) VALUES ('$name','$email','$account_type','$phone','$password','$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("New admin successfully registered...")</script>';  
      }  
 }  
 ?>  

  <?php include('attach/header.php') ?>

           <script>  
             $(document).ready(function(){  
                  $('#insert').click(function(){  
                       var image_name = $('#profile-img').val();  
                       if(image_name == '')  
                       {  
                            alert("Please Select Image");  
                            return false;  
                       }  
                       else  
                       {  
                            var extension = $('#profile-img').val().split('.').pop().toLowerCase();  
                            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                            {  
                                 alert('Invalid Image File');  
                                 $('#profile-img').val('');  
                                 return false;  
                            }  
                       }  
                  });  
             });  
 </script> 
        <form action="" method="post" enctype="multipart/form-data" class="tm-signup-form row">

      <div class="container mt-5">
        
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Accounts</h2>
              <p class="text-white">Accounts</p>
              <select class="custom-select" name="account_type">
                <option value="0">Select account</option>
                <option value="1">Admin</option>
                <option value="2">Editor</option>
                <option value="3">Merchant</option>
                <option value="4">Customer</option>
              </select>
            </div>
          </div>
        </div>
        <!-- row -->
 
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Change Avatar</h2>
              <div class="tm-avatar-container">
                <input type="file" name="file" id="profile-img">
                <img
                  src="img/avatar.png"
                  alt="Avatar"
                  id="profile-img-tag"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <button class="btn btn-primary btn-block text-uppercase">
                Upload New Photo
              </button>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
                <div class="form-group col-lg-6">
                  <label for="name">Account Name</label>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Re-enter Password</label>
                  <input
                    id="password2"
                    name="password2"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <input
                    type="submit"
                    name="insert"
                    id="insert"
                    class="btn btn-primary btn-block text-uppercase"
                    value="Update Your Profile"
                  />
                     
                </div>
                <div class="col-12">
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Delete Your Account
                  </button>
                </div>
            </div>
          </div>
        </div>
      </div>
      </form>

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

    $("#profile-img").change(function(){

        readURL(this);

    });

</script>
   <!--Footer -->

   <?php include('attach/footer.php') ?>