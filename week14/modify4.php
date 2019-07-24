<?php
// get the data from the POST
$id = $_POST['id'];
echo $id. "<br>"; 
$food_item = $_POST['food_item'];
echo $food_item. "<br>"; 
$category_name = $_POST['category_name'];
echo $category_name. "<br>";
$description = $_POST['description'];
echo $description. "<br>";
$food_unit = $_POST['food_unit'];
echo $food_unit. "<br>";
$count = $_POST['count'];
echo $count. "<br>";
require('db.php');
$db = getDb();
try
{
    
   //$query = 'UPDATE foodstorage SET(food_item, category_name, description, food_unit, count) VALUES (:food_item, :category_name, :description, :food_unit, :count)';
   // echo $query. "<br>";
    //$statement = $db->prepare($query);
    $statement = $db->prepare('UPDATE foodstorage SET food_item= :food_item, category_name= :category_name, description= :description, food_unit= :food_unit, count= :count WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->bindValue(':food_item', $food_item);
    $statement->bindValue(':category_name', $category_name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':food_unit', $food_unit);
    $statement->bindValue(':count', $count);
    $statement->execute();
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
// finally, redirect them to a new page to actually show the topics
header("Location: details.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>