<?php
require('config.php');
$msg = '';if(isset($_POST['Upload'])){
    $target = "product-images/".basename($_FILES['image']['name']);


    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
    $db = new PDO($connection_string, "root");
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $query = $db->query( "INSERT INTO `images`(image,text) VALUES ('$image', '$text')");
    $params = array();
   $query->execute($params);
    if (move_uploaded_file($_FILES['image']['name'], $target)){
        $msg = "Image uploaded successfully";
    }else{
        $msg = "There was a problem";
    }
}
?>
<?php
include ('header1.php')
?>


<?php
$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
$db = new PDO($connection_string, "root");
$query = $db->query("SELECT * FROM images WHERE image='image' && text='text'");
$result = $query->execute();
while ($row= $query->fetchAll(PDO::FETCH_ASSOC)) {
    echo "<div id='image_div'>";
        echo "<img src='product-images/".$row['image']."'>";
        echo "<p>".$row['text']. "</p>";
    echo "</div>";
}
?>
<div class="gallery-upload">
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="100000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea name="text" cols="40" rows="4" placeholder="Images"></textarea>
        </div>
        <input type="submit" name="Upload">

    </form>
</div>
</body>
</html>
