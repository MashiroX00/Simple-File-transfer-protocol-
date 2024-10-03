<?php
    require_once "./conf.php";

    if (isset($_FILES['files']['name'])) {
        $fileName = $_FILES['files']['name'];
        $fileTMP = $_FILES['files']['tmp_name'];

        $fileNamedir = "uploads/". basename($fileName);
        try{
            if(move_uploaded_file($fileTMP,$fileNamedir)) {
                $result = $FTP->upload_ftp($fileNamedir,$fileName);
                echo $result;
            }else {
                throw new Exception("Files Uploaded Failed.");
            }
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }else {
        echo "No files upload";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload files</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Files:</label>
            <input type="file" name="files">
        </div>
        <button type="submit">uploads</button>
    </form>
    <p>Storage: <?php echo $FTP->totalftpsize();?> MB / 5 MB</p>
    <?php $FTP->closeFTPconnect();?>
</body>
</html>