<?php
$id = $_GET["id"];
include("../assets/include/connection.php");
$select = "SELECT * FROM category ";
$purchaseselect = "SELECT * FROM purchase WHERE id=$id";
$flavourselect = "SELECT * FROM flavour";

$query = $connect->query($select);
$purchasequery = $connect->query($purchaseselect);
$flavourquery = $connect->query($flavourselect);

$result = $query->fetchAll(PDO::FETCH_ASSOC);
$purchaseresult = $purchasequery->fetch(PDO::FETCH_ASSOC);
$flavourresult = $flavourquery->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        AJ Enterprise
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="./main.php" class="simple-text logo-mini">
                    AJ
                </a>
                <a href="./main.php" class="simple-text logo-normal">
                    Chill Out
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="./main.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./category.php">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="./flavour.php">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Add Flavour</p>
                        </a>
                    </li>
                    <li>
                        <a href="./stock.php">
                            <i class="now-ui-icons business_globe"></i>
                            <p>Stock</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./purchase.php">
                            <i class="now-ui-icons shopping_shop"></i>
                            <p>Purcahse</p>
                        </a>
                    </li>
                    <li>
                        <a href="./sales.php">
                            <i class="now-ui-icons business_money-coins"></i>
                            <p>Sale</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Update Purchase</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./purchase.php">
                                    <i class="now-ui-icons business_briefcase-24" title="Add Stock"></i>
                                    <p>
                                        <label>Purchase View</label>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Purchase</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="../assets/code/updatepurchase.php">
                                    <div class="row">
                                        <div class="col-md-7 pr-1">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="AJ Enterprise">
                                            </div>
                                        </div>
                                        <div class="col-md-10 px-3 py-5">
                                            <div class="form-group">
                                                <label>Flavour</label>
                                                <input list="flavour-list" id="flavour" name="flavour" placeholder="Search your Flavour : ">
                                                <datalist id="flavour-list">
                                                    <?php foreach ($flavourresult as $ans) { ?>
                                                        <option value="<?= $ans['flavour'] ?>"></option>
                                                    <?php } ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-10 px-3 py-3">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="custom-select" tabindex="1">
                                                    <?php foreach ($result as $ans) { ?>
                                                        <option value="<?= $ans['category'] ?>"><?= $ans['category'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Packing</label>
                                                <select name="packing" class="custom-select">
                                                    <?php foreach ($result as $ans) { ?>
                                                        <option value="<?= $ans['packing'] ?>">
                                                            <?= $ans['packing'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" name="date" id="" class="form-control" value="<?= $purchaseresult['date']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-7 pr-1">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="number" class="form-control" placeholder="Quantity" name="quantity" value="<?= $purchaseresult['quantity'] ?>">
                                                <input type="hidden" class="form-control" name="id" value="<?= $purchaseresult['id'] ?>">
                                                <input type="hidden" class="form-control" name="oldquantity" value="<?= $purchaseresult['quantity'] ?>">
                                            </div>
                                        </div>
                                        <div class="formsubmit col-md-4 py-3">
                                            <div class="form-group">
                                                <input type="submit" class="form-control" value="Update Purchase" tabindex="3">
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <footer class="footer">
                                <div class="copyright" id="copyright">
                                    Coded by <a href="#">Jeet Jhaveri</a>
                                </div>
                        </div>
                        </footer>
                    </div>
                </div>
                <!--   Core JS Files   -->
                <script src="../assets/js/core/jquery.min.js"></script>
                <script src="../assets/js/core/popper.min.js"></script>
                <script src="../assets/js/core/bootstrap.min.js"></script>
                <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                <!--  Google Maps Plugin    -->
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                <!-- Chart JS -->
                <script src="../assets/js/plugins/chartjs.min.js"></script>
                <!--  Notifications Plugin    -->
                <script src="../assets/js/plugins/bootstrap-notify.js"></script>
                <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
                <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
                <script src="../assets/demo/demo.js"></script>
</body>

</html>