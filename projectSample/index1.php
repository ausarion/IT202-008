<?php
require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!--Here we create the search field-->
<form action="search1.php" method="post">
    <table>
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Product code</th>
            <th>Image</th>
            <th>Price</th>
        </tr>
        </thead>
    </table>
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" name="submit">Search</button>
</form>

<!--Here we display all existing articles on the front page-->
<h1>Front page</h1>
<h2>All products:</h2>
<div class="article-container">
    <?php
    if (isset($_POST['productName'])){
        $productName= $_POST['productName'];
    }

    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
    $db = new PDO($connection_string, "root");
    $stmt = $db->prepare("SELECT  * from `tblproductList`");
    $stmt->execute($stmt->fetchAll());
    // n

    while ($row = $stmt->fetch()) {


        echo "<h3>".$row['productName']."</h3>";
        echo "<p>".$row['product_code']."</p>";
        echo '<img src="product-images/download (2).jfif"/>';
        echo "<p>".$row['price']."</p>";
        echo "</div>";

        echo "<h3>".$row['productName']."</h3>";
        echo "<p>".$row['product_code']."</p>";
        echo '<img src="product-images/download (2).jfif"/>';
        echo "<p>".$row['price']."</p>";
        echo "</div>";


    }
    ?>
</div>

</body>
</html>

