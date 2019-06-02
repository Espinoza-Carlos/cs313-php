<body>
    <li><a class="active" href="index.php">Return to Ponder 06</a></li>
        
<?php
$food_item = htmlspecialchars($_POST['food_item']);
$category_name = htmlspecialchars($_POST['category_name']);
$description = htmlspecialchars($_POST['description']);
$food_unit = htmlspecialchars($_POST['food_unit']);
$count = htmlspecialchars($_POST['count']);
require('db.php');
$db = get_db();

$stmt = $db->prepare('INSERT INTO foodstorage(food_item, category_name, description, food_unit, count) VALUES (:food_item, :category_name, :description, :food_unit, :count);');
$stmt->bindValue(':food_item', $food_item, PDO::PARAM_INT);
$stmt->bindValue(':category_name', $category_name, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':food_unit', $food_unit, PDO::PARAM_STR);
$stmt->bindValue(':count', $count, PDO::PARAM_STR);
$stmt->execute();
$new_page = "details.php?food_item=$food_item";
header("Location: $new_page");
die();
?>
    </body>