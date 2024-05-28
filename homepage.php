<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examiner Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 0;
            border-radius: 5px;
            display: flex;
            justify-content: flex-start;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Added box shadow */
        }

        /* Remove top margin/padding for .container-fluid */
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

        .simple-popup-overlay {
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

        .simple-popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .simple-popup-content textarea {
            width: 100%;
            max-height: 200px;
            /* Set max-height to limit the textarea height */
            resize: vertical;
            /* Allow vertical resizing */
            margin-bottom: 10px;
        }

        .error-highlight {
            color: red;
        }

        /* Navbar styles */
        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 0; /* Updated to remove bottom margin */
            border-radius: 5px;
            display: flex;
            justify-content: flex-start;
            /* Align items to the left */
            border: 1px solid #ccc;
            /* Added border */
        }

        .navbar a {
            margin-right: 10px;
            /* Adjusted margin */
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #0056b3;
        }

        /* Adjustments for main content */
        .main-content {
            margin-top: 0;
            /* Reduced top margin */
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            /* Added border */
        }

        .main-content h5 {
            margin-bottom: 20px;
        }

        .main-content table {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- New Navbar at Top -->
            <div class="col-md-12">
                <nav class="navbar fixed-top">
                    <span class="navbar-brand">Examiner Dashboard</span>
                    <div style="display: flex; margin-right: auto;">
                        <a href="homepage.php">Submissions</a>
                        <a href="#">Corrected</a>
                        <a href="#">Corrections</a>
                        <a href="#">Review</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row main-content">
            <!-- Main Content -->
            <div class="col-md-12">
                <center>
                    <p>You are logged in as an Examiner.</p>
                </center>
                <h5 class="text-center">Uncorrected Submissions</h5>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                </div> 

                <table class="table">
                    <thead>
                        <tr>
                            <th>Date submitted</th>
                            <th>Course</th>
                            <th>Exercise</th>
                            <th>User ID</th>
						    <th>Assigned Date</th>
                            <th>Credits</th> <!-- New column for Credits -->
                            <th>AI Status</th>
                            <th>Assign Examiner</th> <!-- Updated column header -->
                          <!-- Added new column header -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Duplicated entries -->
                        <tr>
                            <td>2023-08-15</td>
                            <td>CDNIS</td>
                            <td>Academic Essay</td>
                            <td>123456</td>
							<td>4/10/2024</td> <!-- Added new data for Assigned Date -->
                            <td>5</td> <!-- Random Credits -->
                            <td><button class="btn btn-warning" onclick="redirectToCorrectPage()" disabled>SpellCheck</button></td>
                            <td>
                                <select onchange="selectSpellChecker(this)">
								  <option value="McNabb">Not yet Assigned</option>
                                    <option value="McNabb">McNabb</option>
                                 
                                </select>
                            </td>
                        </tr>
						     <tr>
                            <td>2023-08-15</td>
                            <td>CDNIS</td>
                            <td>Academic Essay</td>
                            <td>123456</td>
							<td>4/10/2024</td> <!-- Added new data for Assigned Date -->
                            <td>3</td> <!-- Random Credits -->
                            <td><button class="btn btn-warning" onclick="showPopup('Correctaed')" disabled>SpellCheck</button></td>
                            <td>
                                <select onchange="selectSpellChecker(this)">
								  <option value="McNabb">Not yet Assigned</option>
                                    <option value="McNabb">McNabb</option>
                                  
                                </select>
                            </td>
                        </tr>
						     <tr>
                            <td>2023-08-15</td>
                            <td>CDNIS</td>
                            <td>Academic Essay</td>
                            <td>123456</td>
							<td>4/10/2024</td> <!-- Added new data for Assigned Date -->
                            <td>7</td> <!-- Random Credits -->
                            <td><button class="btn btn-warning" onclick="showPopup('Corrected')" disabled>SpellCheck</button></td>
                            <td>
                                <select onchange="selectSpellChecker(this)">
								  <option value="McNabb">Not yet Assigned</option>
                                    <option value="McNabb">McNabb</option>
                                
                                </select>
                            </td>
                        </tr>
						     <tr>
                            <td>2023-08-15</td>
                            <td>CDNIS</td>
                            <td>Academic Essay</td>
                            <td>123456</td>
							<td>4/10/2024</td> <!-- Added new data for Assigned Date -->
                            <td>2</td> <!-- Random Credits -->
                            <td><button class="btn btn-warning" onclick="showPopup('Corrected')" disabled>SpellCheck</button></td>
                            <td>
                                <select onchange="selectSpellChecker(this)">
								  <option value="McNabb">Not yet Assigned</option>
                                    <option value="McNabb">McNabb</option>
                                   
                            </td>
                        </tr>
						<!-- Duplicate rows with Assigned Date -->
						
						
						
                        <!-- More duplicated rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Original Popup overlay -->
    <div class="popup-overlay" id="popupOverlay">
        <!-- Original Popup content -->
    </div>

    <!-- Simplified Popup overlay -->
    <div class="simple-popup-overlay" id="simplePopupOverlay">
        <div class="simple-popup-content">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3>Spell Checker</h3>
                <button onclick="closeSimplePopup()" class="btn btn-danger">X</button>
            </div>
            <label for="errorTextbox">Student Answer</label>
            <textarea id="randomContent">Yesterday me and her goes to the store but they don't had the things we wanted. I says to them, 'Where is the bread?' but they didn't knows. Then, we goes to another store and finded the bread there. We buys some milk too because we runned out</textarea>
            <label for="errorTextbox">Errors</label>
            <textarea id="errorTextbox" readonly style="color: red;"></textarea>
            <label for="correctedTextbox">Spell Checked Corrected</label>
            <textarea id="correctedTextbox" readonly style="color: green;"></textarea>
            <label for="examinerComments">Examiner Comments</label>
            <textarea id="examinerComments" style="height: 100px;"></textarea>
            <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                <button onclick="spellCheck()" class="btn btn-warning" style="width: 48%;">SpellCheck</button>
                <button onclick="submitExamination()" class="btn btn-success" style="width: 48%;">Submit</button>
            </div>
        </div>
    </div>

    <div class="fixed-top">
        <a href="index.php"><button class="btn btn-danger mt-3 mr-3" style="float: right;">Log Out</button></a>
    </div>

    <script>
		
		function homePage() {
    window.location.href = 'homepage.php';
}
	
	function redirectToCorrectPage() {
    window.location.href = 'correct.php';
}
        function showPopup(submissionStatus) {
            if (submissionStatus === 'Corrected') {
                document.getElementById("simplePopupOverlay").style.display = "flex";
            }
        }

        function closeSimplePopup() {
            document.getElementById("simplePopupOverlay").style.display = "none";
        }

        function spellCheck() {
            const randomContent = document.getElementById("randomContent").value.trim();
            const context = "Correct the answer, grammatical error, and all. Show the list of errors and the corrected version";

            if (!randomContent) {
                alert("Please enter text to spell check.");
                return;
            }

            const apiKey = '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'; // Replace with your actual API key

            const requestData = {
                "model": "gpt-3.5-turbo",
                "messages": [
                    { "role": "user", "content": randomContent },
                    { "role": "assistant", "content": context }
                ]
            };

            fetch('https://api.openai.com/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${apiKey}`
                },
                body: JSON.stringify(requestData)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch data');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.choices && data.choices.length > 0) {
                        let responseContent = data.choices[0].message.content;
                        const errors = responseContent.match(/\[ERROR\](.*?)\[\/ERROR\]/gs); // Updated regex to capture errors spanning multiple lines
                        const corrected = responseContent.replace(/\[ERROR\](.*?)\[\/ERROR\]/g, ''); // Remove errors from corrected content
                        document.getElementById("errorTextbox").value = errors ? errors.join('\n') : 'No errors found';
                        document.getElementById("correctedTextbox").value = corrected.trim();
                    } else {
                        throw new Error('No response from API');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById("errorTextbox").value = `Error: ${error.message}`;
                    document.getElementById("correctedTextbox").value = ''; // Clear corrected content on error
                });
        }

        function selectSpellChecker(select) {
            const selectedValue = select.value;
            alert(`Selected Spell Checker: ${selectedValue}`);
        }
    </script>
</body>

</html>
