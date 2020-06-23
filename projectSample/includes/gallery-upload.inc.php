<?php
if (isset($_POST['submit'])) {
    $newFileName = $_POST['filename'];

    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['fileTitle'];
    $imageDesc = $_POST['fileDesc'];

    $file = $_FILES['file'];


    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../productSample/product-images". $imageFullName;
                require "config.php";

                if (empty($imageTitle) || empty($imageDesc)) {
                    header("Location: ../gallery.php?upload=empty");
                    exit();
                } else {
                    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                    $db = new PDO($connection_string, "root");
                    $stmt = $db->prepare("SELECT  * FROM gallery");

                    if (!$stmt) {
                        echo "SQL statement failed!";
                    } else {
                        $stmt->execute();
                        $result = $stmt->rowCount();
                        $rowCount = $result;
                        $setImageOrder = $rowCount + 1;

                        $stmt = $db->prepare("INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?;");
                        //$params = array(":fileTitle"=> $imageTitle, ":fileDesc"=> $imageDesc, ":file"=> $imageFullName );
                       // echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
                        if (!$stmt) {
                            echo "SQL statement failed!";
                        } else {
                            $stmt->bindParam( "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            $stmt->execute();

                            move_uploaded_file($fileTempName, $fileDestination);

                            header("Location: ../gallery.php?upload=success");
                        }
                    }
                }
            } else {
                echo "File size is too big!";
                exit();
            }
        } else {
            echo "You had an error!";
            exit();
        }
    } else {
        echo "You need to upload a proper file type!";
        exit();
    }

}
?>