<?php include('../include/header.php') ?>

<div class="sidebar-wrapper" id="sidebar-wrapper">
  <ul class="nav">
    <li>
      <a href="./main.php">
        <i class="now-ui-icons design_app"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="active">
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
        <a class="navbar-brand" href="#pablo">Add Company</a>
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
            <h5 class="title">Add Company</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-3 pr-1">
                  <div class="form-group">
                    <label>Company</label>
                    <input type="text" class="form-control" disabled="" placeholder="Company" value="MEGH Enterprise">
                  </div>
                </div>
                <div class="col-md-5 px-1">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Enter Company Name : " name="CompanyName" id="CompanyName" tabindex="1">
                  </div>
                </div>
                <div class="formsubmit" style="padding-top: 14px;">
                  <div class="form-group">
                    <input type="submit" class="form-control" value="Add Company" tabindex="2" onclick="sendData()">
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <?php include('../include/footer.php') ?>

      <script>
        function sendData() {
          let CompanyName = $("#CompanyName").val();
          let data = {
            companyname: CompanyName,
          }
          $.post('../api/insertcompany.php', data, function(result) {
            alert(result)
          })
        }
      </script>
      <?php include('../include/scripts.php') ?>