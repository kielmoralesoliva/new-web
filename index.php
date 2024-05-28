<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6 text-center">
        <img src="logo.jpg" alt="Logo" class="logo" height="150"><br><br>
        <h2 class="title">ADMIN</h2>
        <h2 class="title">Token Management Login</h2>
        <form class="login-form" method="post" action="">
          <div class="form-group">
            <label for="username"></label>
            <input type="text" id="username" name="username" class="form-control custom-input"
              placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="password"></label>
            <input type="password" id="password" name="password" class="form-control custom-input"
              placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block custom-btn">Login</button>
          <p class="mt-3">Switch to <a href="examiner.php">Examiner Login</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mysqli = new mysqli("localhost", "root", "", "ucode");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql = "SELECT * FROM ucode_db WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($sql);

    if ($result === false) {
        echo "Error: " . $mysqli->error;
    } elseif ($result->num_rows == 1) {
        
        header("Location: homepage.php");
        exit;
    } else {
       
        echo "<br><center><b> <h5 style='color:red;'>Invalid username or password. Please try again.</h2></b></center>";
    }
    $mysqli->close();
}
?>