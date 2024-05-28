
<?php
header('Content-Type: application/json');

// Check if prompt data is sent in the request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prompt'])) {
    $prompt = $_POST['prompt'];
    $apiKey = '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';
    $url = 'https://api.openai.com/v1/engines/gpt-3.5-turbo/completions';

    $data = array(
        'prompt' => $prompt,
        'max_tokens' => 150,
        'temperature' => 0.7
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\nAuthorization: Bearer " . $apiKey,
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo json_encode(array('response' => 'Error occurred while fetching AI response'));
    } else {
        $response = json_decode($result, true);
        echo json_encode(array('response' => $response['choices'][0]['text']));
    }
} else {
    echo json_encode(array('response' => 'No prompt data received'));
}
?>