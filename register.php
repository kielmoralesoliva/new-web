<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6 text-center">
        <img src="logo.jpg" alt="Logo" class="logo" height="150"><br><br>
        <h2 class="title">Register as an Examiner</h2>
        <form class="register-form" method="post" action="register.php">
          <div class="form-group">
            <input type="text" id="examiner-username" name="examiner-username" class="form-control custom-input"
              placeholder="Username" required>
          </div>
          <div class="form-group">
            <input type="email" id="examiner-email" name="examiner-email" class="form-control custom-input"
              placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="password" id="examiner-password" name="examiner-password" class="form-control custom-input"
              placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block custom-btn">Register</button>
        </form>
        <p class="mt-3">Already registered? <a href="examiner.php">Login</a></p>
      </div>
    </div>
  </div>
</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["examiner-username"];
    $email = $_POST["examiner-email"];
    $password = $_POST["examiner-password"];
    
    // Perform validation if needed
    
    $mysqli = new mysqli("localhost", "root", "", "ucode");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql = "INSERT INTO ucode_db (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Registration successful. You can now login.');</script>";
    } else {
        echo "Error: " . $mysqli->error;
    }
    $mysqli->close();
}
?>

