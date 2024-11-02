<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    
    // Specify the upload directory
    $upload_dir = 'uploads/';
    
    // Create the uploads directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($tmp_name, $upload_dir . $file_name)) {
        echo json_encode(['success' => true, 'file' => $file_name]);
    } else {
        echo json_encode(['success' => false, 'message' => 'File upload failed.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
