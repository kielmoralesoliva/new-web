<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examiner Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
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
            height: calc(100vh - 120px); /* Adjusted height calculation */
            /* Set max-height to limit the textarea height */
            resize: none; /* Disabled resizing */
            /* Avoid vertical resizing */
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

        /* Adjustments for left and right textareas */
        .col-md-6 textarea {
            width: 100%;
        }
		.button-center {
		 display: flex;
    justify-content: center;
    margin-top: 20px;
		
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
                        <a href="#">Submissions</a>
                        <a href="#">Corrected</a>
                        <a href="#">Corrections</a>
                        <a href="#">Review</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row main-content">
		 <div class="col-md-12">
                <center>
                    <p>You are logged in as an Examiner.</p>
                </center>
                <h5 class="text-center"> Exercise No. 5 : Academic Essay</h5>
       
				</div>
		<br>
            <!-- Left Side - Incorrect Grammar Textbox -->
            <div class="col-md-6">
                <h5 class="text-center">Original Essay</h5>
                 <textarea id="incorrectContent" rows="10">
                    Yesterday me and her goes to the store but they don't had the things we wanted. I says to them, 'Where is the bread?' but they didn't knows. Then, we goes to another store and finded the bread there. We buys some milk too because we runned out.
                </textarea>
            </div>
            <!-- Right Side - Corrected Grammar Textbox -->
            <div class="col-md-6">
                <h5 class="text-center">Examiner Remarks</h5>
                <textarea id="correctedContent" rows="10" placeholder="Examiner Comments">
     </textarea>
				
            </div>
			 
<div class="col-md-12 button-center">
    <button class="btn btn-success btn-lg" onclick="review()">Submit</button>
</div>

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
    </script>
</body>

</html>