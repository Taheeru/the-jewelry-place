    
  <?php include('attach/header.php') ?>
    <?php include 'config.php'; ?>

    <div class="embed-responsive embed-responsive-1by1">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col" style="display: none;">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Latest Hits</h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col" style="display: none;">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Performance</h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller">
                        <h2 class="tm-block-title">Storage Information</h2>
                        <div id="pieChartContainer">
                            <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Notification List</h2>
                        <div class="tm-notification-items">
                            <?php
                                $sql1 = mysqli_query($con, "SELECT d.id, d.first_name, d.last_name, d.date_created, p.prod_name, p.prod_img FROM delivery_details as d inner join products as p on d.prod_id = p.id WHERE status='Incoming'");
                                if (mysqli_num_rows($sql1)>0) {
                                    # code...
                                    while ($result = mysqli_fetch_assoc($sql1)) {
                                        # code...
                                        echo '<div class="media tm-notification-item">
                                            <div class="tm-gray-circle"><img src="data:image/jpeg;base64,'.base64_encode($result['prod_img']).'" class="rounded-circle"></div>
                                            <div class="media-body"><a href="order_details.php?id='.$result['id'].'">
                                                <p class="mb-2"><b>'.$result['first_name'].' '.$result['last_name'].' placed order for '.$result['prod_name'].'</b>.</p>
                                                <span class="tm-small tm-text-color-secondary">'.$result['date_created'].'</span></a>
                                            </div>
                                        </div>';
                                    }
                                }else{
                                    echo '<div class="media tm-notification-item">
                                                <div class="media-body">
                                                    <p class="mb-2"><b>You have not got any order</b>.</p>
                                                </div>
                                        </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">TRANSACTION ID.</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">CUSTOMER</th>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">ORDER DATE</th>
                                    <th scope="col">DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql2 = mysqli_query($con, "SELECT d.id, d.first_name, d.last_name, d.tran_id, d.status, d.country, d.state, d.address, d.date_created, p.prod_name, p.prod_img FROM delivery_details as d inner join products as p on d.prod_id = p.id ORDER BY date_created DESC");
                                    if (mysqli_num_rows($sql2)>0) {
                                        # code...
                                        // $customer = "$row['first_name'] ' ' $row['last_name']";
                                        // $location = $row['country'] ', ' $row['state'];

                                        while ($row = mysqli_fetch_assoc($sql2)) {
                                            # code...
                                            echo '
                                               
                                                <tr>
                                                    <th scope="row"><b>'.$row['tran_id'].'</b></th>
                                                    <td>
                                                        <div class="tm-status-circle moving">
                                                        </div>'.$row['status'].'
                                                    </td>
                                                    <td><b>'.$row['first_name'].' '.$row['last_name'].'</b></td>
                                                    <td><b>'.$row['prod_name'].'</b></td>
                                                    <td><b>'.$row['country'].', '.$row['state'].'</b></td>
                                                    <td>'.$row['address'].'</td>
                                                    <td>'.$row['date_created'].'</td>
                                                    <td><a href="order_details.php?id='.$row['id'].'"><i class="fa fa-th fa-2x "></i></a>
                                                </tr>'
                                                    

                                                ;
                                        }
                                    }else{
                                        echo '<div class="media tm-notification-item">
                                                    <div class="media-body">
                                                        <p class="mb-2"><b>You have not got any order</b>.</p>
                                                    </div>
                                            </div>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   <!--Footer -->

   <?php include('attach/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function(){

        fetchNotification();

        function fetchNotification(){
            $.ajax({
                url: 'enterurl',
                method: 'post',
                data: {action: 'fetchNotification'},
                success:function(response){

                }
            });
        }
    });
</script>