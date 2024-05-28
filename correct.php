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
        }

        .button-center {
            text-align: center;
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
                        <a href="homepage.php" onclick="homePage()">Submissions</a>
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
                <h5 class="text-center">Exercise No. 5: Academic Essay</h5>
            </div>
            <br>
            <!-- Left Side - Incorrect Grammar Textbox -->
            <div class="col-md-6">
                <h5 class="text-center">Submission</h5>
                <textarea id="incorrectContent" rows="10">
Yesterday me and her goes to the store but they don't had the things we wanted. I says to them, 'Where is the bread?' but they didn't knows. Then, we goes to another store and finded the bread there. We buys some milk too because we runned out.
                </textarea>
            </div>
            <!-- Right Side - Corrected Grammar Textbox -->
            <div class="col-md-6">
                <h5 class="text-center">Corrected Grammar / Errors</h5>
                <textarea id="correctedContent" rows="10" readonly></textarea>
            </div>
            <div class="col-md-12 button-center">
                <button class="btn btn-warning btn-lg" onclick="spellCheck()">Spell Check</button>
                <button class="btn btn-success btn-lg" onclick="redirectToCorrectPage()">Review</button>
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
    window.location.href = 'corrections.php';
}
	
        function spellCheck() {
            const incorrectContent = document.getElementById("incorrectContent").value.trim();

            if (!incorrectContent) {
                alert("Please enter text to spell check.");
                return;
            }

            const apiKey = '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'; // Replace with your actual API key

            const requestData = {
                "model": "gpt-3.5-turbo",
                "messages": [
                    { "role": "user", "content": incorrectContent },
                    { "role": "assistant", "content": "Correct the answer, grammatical error, and all. Show the list of errors and the corrected version" }
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
                        const corrected = responseContent.replace(/\[ERROR\](.*?)\[\/ERROR\]/g, ''); // Remove errors from corrected content
                        document.getElementById("correctedContent").value = corrected.trim();
                    } else {
                        throw new Error('No response from API');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById("correctedContent").value = `Error: ${error.message}`;
                });
        }

        function review() {
            // Function for review button
        }
    </script>
</body>

</html>