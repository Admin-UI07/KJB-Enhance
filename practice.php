<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_submit'])) {
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    
    if ($_FILES['test_file']['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['test_file']['tmp_name'], 'test_upload.txt');
        echo "File uploaded!";
    } else {
        echo "Error: " . $_FILES['test_file']['error'];
    }
}

?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="test_file">
    <button type="submit" name="test_submit">Upload</button>
</form>