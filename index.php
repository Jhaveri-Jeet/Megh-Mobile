<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="./">
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Login to the Megh Management</title>
</head>

<body>
  <div class="contentuser">
    <h4  style="text-align: center;">Log - In</h4>
    <form action="./assets/api/user.php" method="post">
      <div class="form-group col-md-12">
        <label>Username</label>
        <input type="text" required class="form-control" placeholder="Enter the Username : "
          name="username" tabindex="1">
      </div>
      <div class="form-group col-md-12">
        <label>Password</label>
        <input type="password" required class="form-control" placeholder="Enter the Password : "
          name="password" tabindex="2">
      </div>
      <div class="formsubmit col-md-5 py-5">
        <div class="form-group">
          <input type="submit" class="form-control" value="Login" tabindex="3">
        </div>
      </div>
    </form>
    <footer class="footer">
      <div class="copyright" id="copyright">
        Developed by <a href="#">The Big Tech Company</a>
      </div>
    </footer>
  </div>
</body>

</html>