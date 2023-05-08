<?php
include("../include/connection.php");
$select = "SELECT * FROM Expenses";
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
        <li>
            <a href="../pages/AddExpense.php">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p>Add Expenses</p>
            </a>
        </li>
        <li>
            <a href="../pages/AllEMIs.php">
                <i class="now-ui-icons business_globe"></i>
                <p>All EMI</p>
            </a>
        </li>
        <li class="active">
            <a href="../pages/ViewExpenses.php">
                <i class="now-ui-icons business_money-coins"></i>
                <p>All Expenses</p>
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
                <a class="navbar-brand" href="../pages/AllEMIs.php">Expenses List</a>
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
                        <a class="nav-link" href="../pages/AddExpense.php">
                            <i class="now-ui-icons ui-1_simple-add" title="Add EMI"></i>
                            <p>
                                <label>Add Expense</label>
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
                                <h4 class="card-title">Current Expenses</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th class="text-center">
                                        Expense
                                    </th>
                                    <th class="text-center">
                                        Amount
                                    </th>
                                    <th class="text-center" colspan="2">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $ans) { ?>
                                        <tr>
                                            <input type="hidden" value="<?= $ans['Id'] ?>" id="expenseid">
                                            <td class="text-center">
                                                <input type="text" disabled value="<?= $ans['Expense'] ?>" id="expense" class="expenseinfo" style="background-color: transparent; border: none; display: block; margin-left: auto; margin-right: auto; text-align: center;">
                                            </td>
                                            <td class="text-center">
                                                <input type="number" disabled value="<?= $ans['Amount'] ?>" id="amount" class="expenseinfo" style="background-color: transparent; border: none; display: block; margin-left: auto; margin-right: auto; text-align: center;">

                                            </td>
                                            <td class="text-center">
                                                <a onclick="showedit()" style="cursor: pointer;">
                                                    <img src="../img/edit.png" alt="" height="10%" width="30px" id="edit" title="Edit Expense">
                                                </a>
                                                <a onclick="editexpense()" style="cursor: pointer;">
                                                    <img src="../img/check.png" alt="" height="10%" width="30px" id="done" title="Edit Expense">
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a onclick="deleteexpense()" style="cursor: pointer;">
                                                    <img src="../img/dustbin.png" alt="" height="10%" width="30px" title="Delete Expense">
                                                </a>
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
                $('#done').hide();

                function deleteexpense() {
                    let expenseid = $('#expenseid').val();
                    let data = {
                        expenseid: expenseid,
                    }
                    $.post('../api/deleteexpense.php', data, function() {
                        location.reload();
                    })
                }

                function showedit() {
                    $('#done').show();
                    $('#edit').hide();
                    $(".expenseinfo").removeAttr('disabled');
                    $(".expenseinfo").css({
                        "border": "1px solid grey"
                    });
                }

                function editexpense() {
                    let expense = $('#expense').val();
                    let amount = $('#amount').val();
                    let expenseid = $('#expenseid').val();
                    let data = {
                        expenseid: expenseid,
                        expense: expense,
                        amount: amount,
                    }
                    $.post('../api/updateexpense.php', data, function() {
                        location.reload();
                        $('#done').hide();
                        $('#edit').show();
                        $(".expenseinfo").prop('disabled');
                        $(".expenseinfo").css({
                            "border": "none"
                        });
                    })
                }
            </script>