   <!--Header -->

<?php include('attach/header.php') ?>

<div class="col-lg-4">
<?php
//getting id from url

if (isset($_GET['id'])) {

    $id = $_GET['id'];

}



?>

   
<?php  
if (isset($_POST["submit"])) {
$connect = mysqli_connect("localhost", "root", "", "blob");
        $rand = rand(0000000, 9999999);

        $first_name     = $_POST["fname"]; 
        $last_name      = $_POST["lname"];
        $country        = $_POST["country"];
        $sname          = $_POST["sname"];
        $addr           = $_POST["addr"];
        $town           = $_POST["town"];
        $state          = $_POST["state"];
        $zip            = $_POST["zip"];
        $phone          = $_POST["phone"];
        $email          = $_POST["mail"];
        $note           = $_POST["note"];
        $address        = "$sname ' ' $addr";
        $tran_id        = "DS-' '$rand";

        //insert data to database        
        $sql = "INSERT INTO delivery_details(prod_id, first_name, last_name, country, address, town, state, postal_code, phone, email, note, tran_id) 
                VALUES('$id', '$first_name', '$last_name', '$country', '$address', '$town', '$state', '$zip', '$phone', '$email', '$note', '$tran_id')";

      if(mysqli_query($connect, $sql))  
      {  
           echo '<script>alert("Details Inserted into Database")</script>';  
      }  
    
}

?>


  
</div>

     <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/hero/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="" method="post" role="form">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="fname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lname">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="sname" class="checkout__input__add">
                                <input type="text" name="addr" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zip">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="mail">
                                    </div>
                                </div>
                            </div>
                            <p>Your orders will delivered to the above address, please ensure provided information is correct.</p>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="note" 
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                            <input type="submit" name="submit" class="site-btn" value="PLACE ORDER"/>
                        </div>
                        <?php  $connect = mysqli_connect("localhost", "root", "", "blob"); 
					        $query = "SELECT * FROM products WHERE id='$id'"; 
					            $result = mysqli_query($connect, $query);
					            while($row = mysqli_fetch_array($result)){
					                $discount = 0.99;
					                $prod_name = $row['prod_name'];
					                $prod_cat = $row['prod_cat'];
					                $price = $row['price'];
					                $availability = $row['availability'];
					                $prod_desc = $row['prod_desc'];
					                $subtotal = $price + 900;
					                $total = $subtotal * $discount;

					                echo "
				                        <div class='col-lg-4 col-md-6'>
				                            <div class='checkout__order'>
				                                <h4>Your Order</h4>
				                                <div class='checkout__order__products'>Products <span>Total</span></div>
				                                <ul>
				                                    <li>$prod_name<span>$price</span></li>
				                                    <li>Delivery fee <span>900.00</span></li>
				                                </ul>
				       
				                                <div class='checkout__order__subtotal'>Subtotal <span>$subtotal</span></div>
				                                <div class='checkout__order__discount'>Discount <span style='color:#9f100d;'>0.99%</span></div>
				                                <div class='checkout__order__total'>Total <span style='color:#14a10d;'>$total</span></div>
				                                <div class='checkout__input__checkbox'>
				                                    <label for='payment'>
				                                        Payment on delivery
				                                        <input type='checkbox' id='payment'>
				                                        <span class='checkmark'></span>
				                                    </label>
				                                </div>
				                            </div>
				                        </div>					                
				                    ";
					            }
					        ?>
                        </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

   <!--Footer -->

   <?php include('attach/footer.php') ?>