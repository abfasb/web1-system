<?php 

$requestedPage = $_SERVER['REQUEST_URI'];
$realPath = realpath(__DIR__ . $requestedPage);

if ($realPath === false || !file_exists($realPath)) {
    http_response_code(404); // Set the status code to 404
    include('./views/utils/error.php'); // Include your custom 404 error page
    exit; // Stop further execution
}

?>