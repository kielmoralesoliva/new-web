<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examiner Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Logo and Sidebar -->
      <div class="col-md-3 bg-light">
        <div class="py-4 pl-4">
          <div class="d-flex align-items-center">
            <img src="logo.jpg" alt="Logo" class="logo" height="50">
            <h5 class="ml-2">CDNIS</h5>
          </div><br>
          <h5>Examiner Dashboard</h5>
          <hr>
          <div class="mb-4">
            <h6 class="text-muted">Dashboard</h6>
            <ul class="list-unstyled">
              <li><a href="homepage.php">Corrected Submissions</a></li>
              <li><a href="#" class="text-center">Uncorrected Submissions</a></li>
              <li><a href="#">Settings</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Main Content -->
      <div class="col-md-9">
        <div class="p-4">
          <div class="mb-4">
            <h4 class="bg-light p-2">My School</h4>
          </div>

          <div class="mb-4">
            <p>You are logged in as an Examiner.</p>
            <h5 class="text-center">Uncorrected Submissions</h5>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search..." aria-label="Search"
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>Date submitted</th>
                  <th>School</th>
                  <th>Course</th>
                  <th>Exercise</th>
                  <th>User ID</th>
                  <th>Submission Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2023-08-15</td>
                  <td>CDNIS</td>
                  <td>Academic Essay</td>
                  <td>5</td>
                  <td>123456</td>
                  <td><button onclick="showPopup()" class="btn btn-success">Spell Check</button></td>
                </tr>
                <tr>
                  <td>2023-08-16</td>
                  <td>CDNIS</td>
                  <td>Academic Structure</td>
                  <td>8</td>
                  <td>789012</td>
                  <td><button onclick="showPopup()" class="btn btn-success">Spell Check</button></td>
                </tr>
                <tr>
                  <td>2023-08-17</td>
                  <td>CDNIS</td>
                  <td>Academic Essay</td>
                  <td>3</td>
                  <td>345678</td>
                  <td><button onclick="showPopup()" class="btn btn-success">Spell Check</button></td>
                </tr>
                <tr>
                  <td>2023-08-18</td>
                  <td>CDNIS</td>
                  <td>Academic Structure</td>
                  <td>6</td>
                  <td>901234</td>
                  <td><button onclick="showPopup()" class="btn btn-success">Spell Check</button></td>
                </tr>
                <tr>
                  <td>2023-08-19</td>
                  <td>CDNIS</td>
                  <td>Academic Essay</td>
                  <td>2</td>
                  <td>567890</td>
                  <td><button onclick="showPopup()" class="btn btn-success">Spell Check</button></td>
                </tr>
                <tr>
                  <td>2023-08-20</td>
                  <td>CDNIS</td>
                  <td>Academic Structure</td>
                  <td>9</td>
                  <td>123987</td>
                  <td><button onclick="showPopup()" class="btn btn-success">Spell Check</button></td>
                </tr>
                <!-- Add more sample data as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup overlay -->
  <div class="popup-overlay" id="popupOverlay">
    <!-- Popup content -->
    <div class="popup-content">
      <!-- Logo -->
      <img src="logo.jpg" alt="Logo" height="50">
      <!-- ChatGPT logo -->
      <img src="chatgpt.png" alt="ChatGPT Logo" height="50">
      <!-- Text -->
      <p>Send this activity for ChatGPT assessment?</p>
      <!-- Buttons --><
      <button onclick="sendToChatGPT()" class="btn btn-primary">Send to ChatGPT</button>
      <button onclick="cancel()" class="btn btn-secondary">Cancel</button>
    </div>
  </div>

  <!-- Log Out Button -->
  <div class="fixed-top">
    <a href="index.php"><button class="btn btn-danger mt-3 mr-3" style="float: right;">Log Out</button></a>
  </div>

  <script>
    function showPopup() {
      document.getElementById("popupOverlay").style.display = "flex";
    }

    function sendToChatGPT() {
      console.log("Sending activity to ChatGPT...");
      closePopup();
    }

    function cancel() {
      console.log("Sending cancelled.");
      closePopup();
    }

    function closePopup() {
      document.getElementById("popupOverlay").style.display = "none";
    }
  </script>
</body>

</html>