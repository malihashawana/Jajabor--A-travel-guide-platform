<?php
$file = 'C:\Users\asira\OneDrive\Documents\GitHub\jajabor.com\custom_login\storage\app\private\receipts\receipt_6778251d9db9f.pdf';
if (file_exists($file)) {
    $handle = fopen($file, 'r');
    if ($handle) {
        echo "File opened successfully!";
        fclose($handle);
    } else {
        echo "Failed to open the file.";
    }
} else {
    echo "File does not exist.";
}
?>
