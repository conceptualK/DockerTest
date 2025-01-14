<?php
// Check if the file parameter is set
if (!isset($_GET['file'])) {
    die("No file specified.");
}

// Sanitize the file name to prevent directory traversal attacks
$file = basename($_GET['file']);

// Define the path to the files directory
$path = './' . $file;

// Check if the file exists
if (!file_exists($path)) {
    die("File not found.");
}

// Set headers to force download
header('Content-Description: File Transfer');
header('Content-Type: application/zip'); // Use correct MIME type for ZIP files
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($path));

// Clear output buffer to avoid corrupting the download
ob_clean();
flush();

readfile($path);
exit;
?>
