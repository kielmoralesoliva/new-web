<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT API Demo</title>
</head>
<body>
    <h1>ChatGPT API Demo</h1>
    
    <label for="userInput">Type your message:</label>
    <textarea id="userInput" rows="4" cols="50"></textarea>

    <button onclick="sendMessage()">Send Message</button>

    <div id="response"></div>

    <script>
      function sendMessage() {
          var userInput = document.getElementById("userInput").value.trim(); // Trim extra spaces
          var context = "This is the context message."; // Manually set the context here

          if (!userInput) {
              alert("Please enter a message."); // Notify user if the input is empty
              return;
          }

          var apiKey = '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'; // Replace with your actual API key

          var requestData = {
              "model": "gpt-3.5-turbo",
              "messages": [{"role": "user", "content": userInput}]
          };

          if (context) {
              requestData.messages.push({"role": "assistant", "content": context});
          }

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
                  document.getElementById("response").innerText = `ChatGPT: ${data.choices[0].message.content}`;
              } else {
                  throw new Error('No response from API');
              }
          })
          .catch(error => {
              console.error('Error:', error);
              document.getElementById("response").innerText = `Error: ${error.message}`;
          });
      }
    </script>
</body>
</html>
