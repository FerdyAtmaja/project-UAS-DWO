<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Works - Purchase</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php
            include "navbar.php";
            include "logout.php";
            include "scroll-top-button.php";
            ?>


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Yearly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Pembelian</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            include "connect.php";
                                            $query = mysqli_query($conn, 'SELECT count(distinct PurchaseOrderId) as count FROM fact_purchase');
                                            $row = mysqli_fetch_array($query);

                                            echo $row['count'] ?></div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Penjualan Tahun ini </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $query = mysqli_query($conn, "SELECT COUNT(DISTINCT(f.PurchaseOrderId)) PurchaseOrder FROM fact_purchase f JOIN time t ON f.timeID=t.time_id WHERE t.tahun=2004");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo number_format($row['PurchaseOrder'], 0, ".", ",");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jenis Produk Terjual</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            include "connect.php";
                                            $query = mysqli_query($conn, 'SELECT count(distinct ProductID) as product FROM fact_purchase');
                                            $row = mysqli_fetch_array($query);

                                            echo $row['product'] ?></div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Penjualan Bulan Ini</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $query = mysqli_query($conn, "SELECT COUNT(DISTINCT(f.PurchaseOrderId)) PurchaseOrder FROM fact_purchase f JOIN time t ON f.timeID=t.time_id WHERE t.tahun=2004 AND bulan=9");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo number_format($row['PurchaseOrder'], 0, ".", ",");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Table -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Data Pembelian
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Purchase Order ID</th>
                                        <th>Ship Method ID</th>
                                        <th>Product ID</th>
                                        <th>Vendor ID </th>
                                        <th>Time ID</th>
                                        <th>Employee ID</th>
                                        <th>Order Qty</th>
                                        <th>Received Qty</th>
                                        <th>Rejected Qty</th>
                                        <th>Stocked Qty</th>
                                        <th>Line Total</th>
                                        <th>Status</th>
                                        <th>Sub Total</th>
                                        <th>Tax Amount</th>
                                        <th>Freight</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Purchase Order ID</th>
                                        <th>Ship Method ID</th>
                                        <th>Product ID</th>
                                        <th>Vendor ID </th>
                                        <th>Time ID</th>
                                        <th>Employee ID</th>
                                        <th>Order Qty</th>
                                        <th>Received Qty</th>
                                        <th>Rejected Qty</th>
                                        <th>Stocked Qty</th>
                                        <th>Line Total</th>
                                        <th>Status</th>
                                        <th>Sub Total</th>
                                        <th>Tax Amt</th>
                                        <th>Freight</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include "connect.php";

                                    $query = mysqli_query($conn, 'SELECT * FROM fact_purchase where PurchaseOrderID');
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data['PurchaseOrderID'] ?></td>
                                            <td><?php echo $data['ShipMethodID'] ?></td>
                                            <td><?php echo $data['ProductID'] ?></td>
                                            <td><?php echo $data['VendorID'] ?></td>
                                            <td><?php echo $data['TimeID'] ?></td>
                                            <td><?php echo $data['EmployeeID'] ?></td>
                                            <td><?php echo $data['OrderQty'] ?></td>
                                            <td><?php echo $data['ReceivedQty'] ?></td>
                                            <td><?php echo $data['RejectedQty'] ?></td>
                                            <td><?php echo $data['StockedQty'] ?></td>
                                            <td><?php echo $data['LineTotal'] ?></td>
                                            <td><?php echo $data['Status'] ?></td>
                                            <td><?php echo $data['SubTotal'] ?></td>
                                            <td><?php echo $data['TaxAmt'] ?></td>
                                            <td><?php echo $data['Freight'] ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include "footer.php" ?>

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->



        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>


    </body>

    </script>

</html>