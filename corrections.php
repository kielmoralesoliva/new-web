<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Quill.js library -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .container-fluid {
            padding-top: 50px !important;
            margin-top: 0 !important;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 0;
            border-radius: 5px;
            display: flex;
            justify-content: flex-start;
            border: 1px solid #ccc;
        }

        .navbar a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #0056b3;
        }

        .main-content {
            margin-top: 0;
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
        }

        .col-md-6 textarea {
            width: 100%;
            height: 300px; /* Set a fixed height for the textareas */
        }

        .button-center {
            text-align: center;
        }

        #editor-container {
            height: 300px; /* Set a fixed height for the editor */
        }
		  .popup-content {
            position: relative;
            width: 300px;
        }

        .popup-label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .popup-input {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .popup-button {
            width: 100%;
            padding: 8px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-button:hover {
            background-color: #218838;
        }
		  .big-popup {
        width: 80%;
        height: 80%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .popup-left-image,
    .popup-right-image {
        max-width: 50%;
        max-height: 90%;
        object-fit: contain;
    }

    .popup-left-image {
        margin-right: 10px;
    }

    .popup-right-image {
        margin-left: 10px;
    }
	.longer-textbox {
    width: 75%; /* Increase by 50% */
}.btn-sm {
    padding: 5px 10px; /* Adjust padding to make the buttons smaller */
    font-size: 14px; /* Adjust font size to make the text smaller */
}
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- New Navbar at Top -->
            <div class="col-md-12">
                <nav class="navbar fixed-top">
  
                    <div style="display: flex; margin-right: auto;">
                        <a href="homepage.php" onclick="homePage()">Submissions</a>
                        <a href="#">Corrected</a>
                        <a href="#">Corrections</a>
                        <a href="#">Review</a>
                    </div>
                </nav>
            </div>
        </div>

		<div class="row main-content">
    <!-- First Column -->
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 text-center">
                <h6>Course: Academic Essay</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h6>Exercise: No. 5</h6>
            </div>
        </div>
    </div>

    <!-- Second Column -->
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 text-center">
                <h6>Student: Ricky Michael Oliva</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h6>School: CDNIS</h6>
            </div>
        </div>
    </div>
</div>

        <div class="row main-content">
            <!-- Left Side - Incorrect Grammar Textbox -->
            <div class="col-md-6">
                <h5 class="text-center">Submission</h5>
                <textarea id="incorrectContent" rows="50" style="height: 600px; font-size:14px;">
Yesterday me and her goes to the store but they don't had the things we wanted. I says to them, 'Where is the bread?' but they didn't knows. Then, we goes to another store and finded the bread there. We buys some milk too because we runned out.
                
           </textarea>
                <button class="btn btn-success btn-lg mt-3" onclick="toggleGradePopup()">Score</button>
				<button class="btn btn-success btn-lg mt-3" onclick="toggleScoringMatrix()">Matrix</button>
				<button class="btn btn-success btn-lg mt-3" onclick="toggleScoringMatrix()">Save</button>
            </div>
            <!-- Right Side - Corrected Grammar Textbox -->
            <div class="col-md-6">
                <h5 class="text-center">Examiner Comments</h5>
                <div id="editor-container" style="height: 560px; font-size:14px;">Yesterday, she and I went to the store but they didn't have the things we wanted. I said to them, "Where is the bread?" but they didn't know. Then, we went to another store and found the bread there. We bought some milk too because we had run out.</div>
                <!-- Buttons for rich text editor operations -->
            </div>
        </div>
    </div>

    <div class="fixed-bottom">
        <a href="index.php"><button class="btn btn-danger mt-3 mr-3" style="float: right;">Log Out</button></a>
    </div>
	    <div class="popup-overlay" id="matrixPopup">
        <div class="popup-content big-popup">
		 <button class="btn btn-danger btn-sm" style="position: absolute; top: 10px; right: 10px;" onclick="toggleScoringMatrix()">X</button>
  
            <!-- Left Image -->
            <img src="image2.jpg" alt="Left Image" class="popup-left-image">
            <!-- Right Image -->
            <img src="image1.png" alt="Right Image" class="popup-right-image">

        </div>
    </div>
	<div class="popup-overlay" id="gradePopup">
    <div class="popup-content">
        <div class="popup-label">Range and Accuracy:</div>
        <input type="text" id="rangeAccuracyInput" class="popup-input" placeholder="Enter grade for Range and Accuracy">

        <div class="popup-label">Lexical Resource:</div>
        <input type="text" id="lexicalResourceInput" class="popup-input" placeholder="Enter grade for Lexical Resource">

        <div class="popup-label">Structure & Organization:</div>
        <input type="text" id="structureInput" class="popup-input" placeholder="Enter grade for Structure & Organization">

        <div class="popup-label">Coherence:</div>
        <input type="text" id="coherenceInput" class="popup-input" placeholder="Enter grade for Coherence">

        <div class="button-center">
            <button class="btn btn-success btn-sm" onclick="sendGrade()">Send Grade</button>
            <button class="btn btn-danger btn-sm" onclick="toggleGradePopup()">Cancel</button>
        </div>
    </div>
</div>

    </div>


    <!-- Include Quill.js library and your script -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Your existing script here
     function toggleGradePopup() {
            var popup = document.getElementById('gradePopup');
            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'flex';
            } else {
                popup.style.display = 'none';
            }
        }
		
	    function toggleScoringMatrix() {
        var popup = document.getElementById('matrixPopup');
        if (popup.style.display === 'none' || popup.style.display === '') {
            popup.style.display = 'flex';
        } else {
            popup.style.display = 'none';
        }
    }

        // Function for sending the grade
        function sendGrade() {
            var gradeInput = document.getElementById('gradeInput').value;
            if (gradeInput) {
                alert("Grade sent successfully!");
                toggleGradePopup(); // Close the popup after sending the grade
            } else {
                alert("Please enter a grade.");
            }
        }
    </script>

    <!-- Include Quill.js library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Initialize Quill.js
        var quill = new Quill('#editor-container', {
            theme: 'snow' // Use the 'snow' theme for a clean interface
        });

        // Function for sending the grade
   
        // Function for navigating to homepage
        function homePage() {
            window.location.href = 'homepage.php';
        }
    </script>
</body>

</html>