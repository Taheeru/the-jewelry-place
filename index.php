   <!--Header -->

   <?php include('attach/header.php') ?>
   <?php include 'config.php'; ?>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
<!--                         <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+234 802 035 8984</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="assets/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>MOVADO WRIST</span>
                            <h2>24 Karat <br />100% Gold</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php  
                        $query = "SELECT prod_name,prod_img FROM products"; 
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result)){
                            echo '
                                <div class="col-lg-3">
                                    <div class="categories__item set-bg">
                                        <img src="data:image/jpeg;base64,'.base64_encode($row['prod_img'] ).'">
                             
                            ';
                            echo "<h5><a href='#''>".$row['prod_name']."</a></h5>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".shoes">Shoes</li>
                            <li data-filter=".bags">Bags</li>
                            <li data-filter=".watches">Wrist Watches</li>
                            <li data-filter=".devices">Electronics</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 10"; 
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result)){
                            $id=$row['id'];
                            echo '
                                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row['prod_img'] ).'">
                                            ';
                                            
                             
                            echo "<ul class='featured__item__pic__hover'>
                                                <li><a href='product_details.php?id=$id'><i class='fa fa-heart'></i></a></li>
                                                <li><a href='#'><i class='fa fa-retweet'></i></a></li>
                                                <li><a href='#'><i class='fa fa-shopping-cart'></i></a></li>
                                            </ul>
                                        </div>";
                            echo "<div class='featured__item__text'>
                                            <h6><a href='#'>".$row['prod_name']."</a></h6>";
                            echo "<h5># ".$row['price']."</h5>
                                        </div>
                                    </div>
                                </div>";
                        }
                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="assets/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="assets/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                            <?php
                                $query1 = "SELECT * FROM products ORDER BY id DESC LIMIT 3"; 
                                $result1 = mysqli_query($con, $query1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    $id=$row1['id'];
                                    echo '<a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row1['prod_img'] ).'">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>'.$row1['prod_desc'].'</h6>
                                                <span>'.$row1['price'].'</span>
                                            </div>
                                        </a>';
                                }
                        ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php
                                $query1 = "SELECT * FROM products ORDER BY id DESC LIMIT 3,3"; 
                                $result1 = mysqli_query($con, $query1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    $id=$row1['id'];
                                    echo '<a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row1['prod_img'] ).'">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>'.$row1['prod_desc'].'</h6>
                                                <span>'.$row1['price'].'</span>
                                            </div>
                                        </a>';
                                }
                        ?>
<!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            <?php
                                $query1 = "SELECT * FROM products ORDER BY id DESC LIMIT 3,6"; 
                                $result1 = mysqli_query($con, $query1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    $id=$row1['id'];
                                    echo '<a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row1['prod_img'] ).'">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>'.$row1['prod_desc'].'</h6>
                                                <span>'.$row1['price'].'</span>
                                            </div>
                                        </a>';
                                }
                        ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php 
                                $query1 = "SELECT * FROM products ORDER BY id DESC LIMIT 3,9"; 
                                $result1 = mysqli_query($con, $query1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    $id=$row1['id'];
                                    echo '<a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row1['prod_img'] ).'">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>'.$row1['prod_desc'].'</h6>
                                                <span>'.$row1['price'].'</span>
                                            </div>
                                        </a>';
                                }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            <?php
                                $query1 = "SELECT * FROM products ORDER BY id DESC LIMIT 3,12"; 
                                $result1 = mysqli_query($con, $query1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    $id=$row1['id'];
                                    echo '<a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row1['prod_img'] ).'">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>'.$row1['prod_desc'].'</h6>
                                                <span>'.$row1['price'].'</span>
                                            </div>
                                        </a>';
                                }
                        ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php
                                $query1 = "SELECT * FROM products ORDER BY id DESC LIMIT 3"; 
                                $result1 = mysqli_query($con, $query1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    $id=$row1['id'];
                                    echo '<a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                            <img src="data:image/jpeg;base64,'.base64_encode($row1['prod_img'] ).'">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>'.$row1['prod_desc'].'</h6>
                                                <span>'.$row1['price'].'</span>
                                            </div>
                                        </a>';
                                }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>News Feeds</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="assets/img/product/samsung.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Samsung Galaxy Note20 5G</a></h5>
                            <p>Timeless design in premium colors, including the Mystic Bronze with its new Haze texture that highlights the fine craftsmanship. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="assets/img/product/nivea.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Nivea Smooth Sensation Body Lotion</a></h5>
                            <p>NIVEA Smooth Daily Moisture Body Lotion 16.9 Fluid Ounce </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="assets/img/product/tv.jpeg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Samsung Super 6 4K UHD TV</a></h5>
                            <p>Samsung has announced a new line of online-exclusive 4K UHD Smart TVs. The TVs come with Super 6 features and support for apps like Netflix, Prime Video and YouTube. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

   <!--Footer -->

   <?php include('attach/footer.php') ?>
