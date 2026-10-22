<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Block direct access to .txt files
if (preg_match('/\.txt$/i', $path)) {
    http_response_code(403);
    echo "Access denied.";
    exit;
}

// Otherwise let the server handle the request normally
return false;