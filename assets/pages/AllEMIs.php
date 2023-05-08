<?php
include("../include/connection.php");
$range = isset($_GET['range']) ? $_GET['range'] : 10;

if (isset($_GET['search'])) {
  $searchval = $_GET['search'];
  $recordCountSql = "SELECT count(*) as Count, CustomerInfo.Id FROM CustomerInfo WHERE CustomerName LIKE '%$searchval%'";
  $result = $connect->query($recordCountSql);
  $countRecord = $result->fetchAll(PDO::FETCH_ASSOC)[0]["Count"];
  $pageCount = $countRecord % $range == 0 ? ($countRecord / $range) : intval($countRecord / $range) + 1;
  if (!isset($_GET["page"])) {
    $pageNo = 1;
  } else {
    $pageNo = $_GET["page"];
  }
  $select = "SELECT Companies.CompanyName, CustomerInfo.Id, Mobiles.MobileName, CustomerInfo.CustomerName, CustomerInfo.BillDate, CustomerInfo.EMIStartingDate, CustomerInfo.EMIMonths, CustomerInfo.Amount FROM CustomerInfo INNER JOIN Mobiles ON CustomerInfo.MobileId = Mobiles.Id INNER JOIN Companies ON Mobiles.CompanyId = Companies.Id WHERE CustomerInfo.CustomerName LIKE '%$searchval%' or CustomerInfo.BillDate LIKE '%$searchval%' or Companies.CompanyName LIKE '%$searchval%' or CustomerInfo.Amount LIKE '%$searchval%' or Mobiles.MobileName LIKE '%$searchval%' LIMIT " . (($pageNo - 1) * $range) . ",$range";
  $query = $connect->query($select);
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
  $recordCountSql = "SELECT count(*) as Count FROM CustomerInfo";
  $result = $connect->query($recordCountSql);
  $countRecord = $result->fetchAll(PDO::FETCH_ASSOC)[0]["Count"];
  $pageCount = $countRecord % $range == 0 ? ($countRecord / $range) : intval($countRecord / $range) + 1;
  if (!isset($_GET["page"])) {
    $pageNo = 1;
  } else {
    $pageNo = $_GET["page"];
  }
  $select = "SELECT CustomerInfo.Id, Companies.CompanyName, Mobiles.MobileName, CustomerInfo.CustomerName, CustomerInfo.BillDate, CustomerInfo.EMIStartingDate, CustomerInfo.EMIMonths, CustomerInfo.Amount FROM CustomerInfo INNER JOIN Mobiles ON CustomerInfo.MobileId = Mobiles.Id INNER JOIN Companies ON Mobiles.CompanyId = Companies.Id WHERE CustomerInfo.Status = 'Pending' LIMIT " . (($pageNo - 1) * $range) . ",$range";
  $query = $connect->query($select);
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
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
    <li class="active">
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
                <label>Add EMI</label>
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
              <div class="col text-right">
                <label for="range">Rows Per Page</label>
                <select name="range" onchange="changerange()" id="range" class="custom-select">
                  <option value="10" <?= $range == 10 ? "selected" : '' ?>>10</option>
                  <option value="20" <?= $range == 20 ? "selected" : '' ?>>20</option>
                  <option value="50" <?= $range == 50 ? "selected" : '' ?>>50</option>
                  <option value="100" <?= $range == 100 ? "selected" : '' ?>>100</option>
                  <option value="500" <?= $range == 500 ? "selected" : '' ?>>500</option>
                </select>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th class="text-center">
                    Name
                  </th>
                  <th class="text-center">
                    Company
                  </th>
                  <th class="text-center">
                    Model
                  </th>
                  <th class="text-center">
                    Date
                  </th>
                  <th class="text-center">
                    Amount
                  </th>
                  <th class="text-center">
                    EMI Months
                  </th>
                  <th class="text-center" colspan="2">
                    Action
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($result as $ans) { ?>
                    <?php
                    $orgDate = $ans['BillDate'];
                    $newDate = date("d-m-Y", strtotime($orgDate));
                    ?>
                    <tr>
                      <td class="text-center">
                        <?= $ans['CustomerName'] ?>
                      </td>
                      <td class="text-center">
                        <?= $ans['CompanyName'] ?>
                      </td>
                      <td class="text-center">
                        <?= $ans['MobileName'] ?>
                      </td>
                      <td class="text-center">
                        <?= $newDate ?>
                      </td>
                      <td class="text-center">
                        <?= $ans['Amount'] ?>
                      </td>
                      <td class="text-center">
                        <?= $ans['EMIMonths'] ?>
                      </td>
                      <td class="text-center">
                        <a href="../pages/ViewEMI.php?Id=<?= $ans['Id'] ?>">
                          <img src="../img/eye.png" alt="" height="10%" width="30px" title="View EMI">
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="">
                          <img src="../img/dustbin.png" alt="" height="10%" width="30px" title="Delete EMI">
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div>
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php
                  for ($i = 1; $i <= $pageCount; $i++) {
                    if (!isset($_GET["page"]))
                      $_GET["page"] = 1;
                  ?>
                    <li class="page-item <?= $_GET["page"] == $i ? "active" : "" ?>"><a class="page-link" href="AllEMIs.php?page=<?= $i ?>&range=<?= $range ?>"><?= $i ?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <?php include('../include/footer.php') ?>
      <?php include('../include/scripts.php') ?>
      <script>
        function changerange() {
          var range = document.getElementById('range').value;
          window.location.href = "AllEMIs.php?range=" + range;
        }
      </script>