<?php
$_SESSION['role_name'] = 'admin';
include ('header1.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Product Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gallery.css">
</head>
<body>
<main>

    <section class="gallery-links">
        <div class="wrapper">
            <h2>Gallery</h2>

            <div class="gallery-container">
                <?php
                require ('config.php');
                $conn = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                $db = new PDO($conn, "root");
                $stmt = $db->prepare("SELECT * FROM gallery ORDER BY  orderGallery DESC ");
                if (!$stmt) {
                    echo "SQL statement failed";
                }else {
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    while ($row = $result) {
                        echo '<a href="#">
                          <div style="background-image: url(../projectSample/product-images/'.$row["imgFullNameGallery"].');"></div>
                          <h3>'.$row["titleGallery"].'</h3>
                          <p>'.$row["descGallery"].'</p>
                        </a>';
                    }
                }

                ?>
                
            </div>
            <?php
            if(isset($_SESSION['user'])) {
                echo '<div class="gallery-upload">
                <h2>Upload</h2>
                <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                <input type="text" name="filename" placeholder="File name...">
                <input type="text" name="fileTitle" placeholder="Image title...">
                <input type="text" name="fileDesc" placeholder="Image description...">
                <input type="file" name="file">
                <button type="submit" name="submit">UPLOAD</button>
              </form>
              </div>';
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>
