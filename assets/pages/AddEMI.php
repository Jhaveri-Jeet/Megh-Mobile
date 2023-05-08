<?php include('../include/header.php') ?>
<?php include('../include/connection.php') ?>
<?php
$selectCompany = "SELECT * FROM Companies";
$query = $connect->query($selectCompany);
$companynames = $query->fetchAll(PDO::FETCH_ASSOC);

$selectMobile = "SELECT * FROM Mobiles";
$query = $connect->query($selectMobile);
$mobilenames = $query->fetchAll(PDO::FETCH_ASSOC);
?>
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
        <li>
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
                <a class="navbar-brand" href="#pablo">Add EMI</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/AllEMIs.php">
                            <i class="now-ui-icons business_briefcase-24" title="Add EMI"></i>
                            <p>
                                <label>All EMI</label>
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
                        <h4 class="card-title">Add EMI</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-10 pr-1 px-3 py-3">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="MEGH Enterprise">
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input list="Company-list" id="company" name="Company" placeholder="Search your Company : " required>
                                        <datalist id="Company-list">
                                            <?php foreach ($companynames as $name) { ?>
                                                <option value="<?= $name['CompanyName'] ?>" data-companyid="<?= $name['Id'] ?>"></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input list="Mobile-list" id="mobile" name="Mobile" placeholder="Search your Model : " required>
                                        <datalist id="Mobile-list">
                                            <?php foreach ($mobilenames as $name) { ?>
                                                <option value="<?= $name['MobileName'] ?>" data-mobileid="<?= $name['Id'] ?>"></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" name="Customer-Name" id="customer-name" class="form-control" placeholder="Enter Customer Name : " required>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Customer Number</label>
                                        <input type="text" name="Customer-Number" id="customer-number" class="form-control" placeholder="Enter Customer Number : " required>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Bill Date</label>
                                        <input type="date" id="bill-date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>EMI Starting Date</label>
                                        <input type="date" id="emi-starting-date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>EMI Months</label>
                                        <input type="number" name="emi-months" id="emi-months" class="form-control" placeholder="EMI Months : " required>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" class="form-control" placeholder="Amount : " name="Amount" id="amount" required onfocusout="calculateEMI()">
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>EMI Amount</label>
                                        <input type="number" class="form-control" placeholder="EMI TO BE PAID : " id="emi-amount" disabled>
                                    </div>
                                </div>
                                <div class="col-md-5 px-3 py-3">
                                    <div class="form-group">
                                        <label>Profit</label>
                                        <input type="number" class="form-control" placeholder="Profit : " name="Profit" id="profit" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="formsubmit col-md-5 py-5">
                        <div class="form-group">
                            <input type="button" class="form-control" value="Add EMI" tabindex="3" onclick="sendData()">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('../include/footer.php') ?>
        <?php include('../include/scripts.php') ?>
        <script>
            function sendData() {
                let selectedCompany = $("#company").val();
                let companyId = $("#Company-list option[value='" + selectedCompany + "']").data('companyid');
                let selectedMobile = $("#mobile").val();
                let mobileId = $("#Mobile-list option[value='" + selectedMobile + "']").data('mobileid');
                let customerName = $("#customer-name").val();
                let customerNumber = $("#customer-number").val();
                let billDate = $("#bill-date").val();
                let emiStartingDate = $("#emi-starting-date").val();
                let emiMonths = $("#emi-months").val();
                let amount = $("#amount").val();
                let profit = $("#profit").val();
                let emiAmount = amount / emiMonths;
                let data = {
                    companyId: companyId,
                    mobileId: mobileId,
                    customerName: customerName,
                    customerNumber: customerNumber,
                    billDate: billDate,
                    emiStartingDate: emiStartingDate,
                    emiMonths: emiMonths,
                    amount: amount,
                    profit: profit,
                    emiAmount: emiAmount,
                }

                $.post("../api/insertemi.php", data, function() {
                    window.location.reload();
                })
            }

            function calculateEMI() {
                let amount = $("#amount").val()
                let emiMonths = $('#emi-months').val()
                let emiAmount = amount / emiMonths;

                $('#emi-amount').val(emiAmount)
            }
        </script>