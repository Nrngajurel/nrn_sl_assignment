<!-- Write a file upload script to upload an image file (.jpg/.png) of size up to 20 KB to the server. -->
<?php
function dd($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $fileNameNew = uniqid('', true).'.'.$fileActualExt;
                // make directory uploads if not exists
                if(!file_exists('uploads')){
                    mkdir('uploads');
                }
                $fileDestination = './uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo '<img src="'.$fileDestination.'" alt="">';
            }else{
                echo 'File size is too big';
            }
        }else{
            echo 'There was an error uploading your file';
        }
    }else{
        echo 'You cannot upload files of this type';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php File Upload</title>
</head>
<body>
    <div class="container">
        <h1>Upload Image</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">File</label><br>
                <input type="file" name="file" id="file">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload">
            </div>
        </form>
    </div>
</body>
</html>