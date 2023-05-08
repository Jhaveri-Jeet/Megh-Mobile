<?php include('../include/header.php') ?>
<?php include('../include/connection.php') ?>
<?php
$select = "SELECT * FROM Companies";
$query = $connect->query($select);
$companynames = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <li class="active">
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
        <a class="navbar-brand" href="#pablo">Add Mobile</a>
      </div>
  </nav>
  <!-- End Navbar -->
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Add Mobile</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-5 pr-1">
                  <div class="form-group">
                    <label>Company</label>
                    <input type="text" class="form-control" disabled="" placeholder="Company" value="MEGH Enterprise">
                  </div>
                </div>
                <div class="col-md-10 px-3 py-5">
                  <div class="form-group">
                    <label>Company Name</label>
                    <select id="companyid" style="height: 10%; width: 30%">
                      <?php foreach ($companynames as $companyname) { ?>
                        <option value="<?= $companyname['Id'] ?>" style="color: grey;"><?= $companyname['CompanyName'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 px-6">
                  <div class="form-group">
                    <label>Model Name</label>
                    <input type="text" class="form-control" placeholder="Enter Model Name : " name="MobileName" id="modelname">
                  </div>
                </div>
                <div class="formsubmit" style="padding-top: 12px;">
                  <div class="form-group">
                    <input type="button" class="form-control" value="Add Model" onclick="sendData()">
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <?php include('../include/footer.php') ?>
      <script>
        function sendData() {
          let companyid = $("#companyid option:selected").val();
          let modelname = $('#modelname').val();
          let data = {
            companyid: companyid,
            modelname: modelname
          }
          $.post('../api/insertmodel.php', data, function(response) {
            $('#modelname').val('');
            window.location.reload();
          })
        }
      </script>
      <?php include('../include/scripts.php') ?>