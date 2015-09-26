<?php

require_once 'inc/class.Upload.php';

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="file">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="submit" value="Upload" name="upload">
    </form>
    </body>
    </html>
<?php
if(isset($_POST['upload'])) {
     $tmp_name = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
     $type = $_FILES['file']['type'];
    $name = $_FILES['file']['name'];
    $file_size = $_POST['MAX_FILE_SIZE'];

    $file = new Upload();

    $test = $file->UploadFile($name, $tmp_name);
    if($test == false && $size < $file_size) {
        echo 'Successfully';
    }
    else {
        echo 'error';
    }
}