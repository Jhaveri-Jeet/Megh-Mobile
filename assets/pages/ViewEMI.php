<?php
include("../include/connection.php");
$id = $_GET['Id'];
$select = "SELECT * FROM EMI WHERE CustomerInfoId = $id && Status = 'Pending'";
$query = $connect->query($select);
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include('../include/header.php') ?>

<div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
        <li>
            <a href="./main.php">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="../pages/AddCompany.php">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p>Add Company</p>
            </a>
        </li>
        <li>
            <a href="../pages/AddMobile.php">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p>Add Mobiles</p>
            </a>
        </li>
        <li class="active">
            <a href="../pages/AllEMIs.php">
                <i class="now-ui-icons business_globe"></i>
                <p>All EMI</p>
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
                <a class="navbar-brand" href="../pages/AllEMIs.php">EMI List</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <form>
                    <div class="input-group no-border">
                        <input type="text" name="search" class="form-control" placeholder="Search..." tabindex="1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <i class="now-ui-icons ui-1_zoom-bold" tabindex="2"></i> -->
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/AddEMI.php">
                            <i class="now-ui-icons ui-1_simple-add" title="Add EMI"></i>
                            <p>
                                <label>View EMI</label>
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
                        <div class="row">
                            <div class="col-lg-10">
                                <h4 class="card-title">Current EMI</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th class="text-center">
                                        Date
                                    </th>
                                    <th class="text-center">
                                        Amount
                                    </th>
                                    <th class="text-center">
                                        Status
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $ans) { ?>
                                        <?php
                                        $orgDate = $ans['EMIDueDate'];
                                        $newDate = date("d-m-Y", strtotime($orgDate));
                                        ?>
                                        <tr>
                                            <input type="hidden" value="<?= $ans['EMIDueDate'] ?>" id="duedate">
                                            <input type="hidden" value="<?= $_GET['Id'] ?>" id="customerid">
                                            <td class="text-center">
                                                <?= $newDate ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $ans['DueAmount'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $ans['Status'] ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="submit" style="height: 30px; width: 60px; border: 1px solid grey; border-radius: 10px; background-color: green;color: white;" onclick="changeStatus()">Paid</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('../include/footer.php') ?>
            <?php include('../include/scripts.php') ?>
            <script>
                function changeStatus() {
                    let date = $('#duedate').val();
                    let customerid = $('#customerid').val();
                    let data = {
                        date: date,
                        customerid: customerid,
                    }
                    $.post('../api/updateemi.php', data, function(){
                        location.reload();
                    })
                }
            </script>