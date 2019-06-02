<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Ponder06 details category name</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
     <ul>
  <li><a class="active" href="index.php">Return to Ponder 05</a></li>
  
</ul>    
<h4>You can select a product by a single Food Item</h4>
<h5>I will advice to try apple, White Bread, carrot, or display products by category name. to see producs Items names.</h5>
       
<!--<form action="insert_note.php" method="post">
    Enter a Food Item Name: <input name="food_item" type="text"> <br><br> <input type="submit"> </form>
    <table>
    <tr>
        <th>Food Item</th>
        <th>Category Name</th> <th>Description</th> <th>Food Unit</th>
        <th>Count</th>
    </tr>
-->
    <!-- <p><b>Food Item...................Category name.............Description..................Food Unit...................Count </b>      </p>-->
    <?php require 'db.php';
    //require('details2.php');
//Local or Heroku
$db = getDb();
$food_item = selectAll($db);
?>        
<h2>Insert Scripture</h2>
<br>
<form action="submitscripture.php" method="GET">
  food_item:
  <input name="food_item" type="text"><br>
  category_name:
  <input name="category_name" type="text"><br>
  description:
  <input name="description" type="text"><br>
    food_unit:
  <input name="food_unit" type="text"><br>
    count:
  <input name="count" type="text"><br>
  <textarea name ="content" rows="6" cols="50"></textarea><br>
    <?php
    foreach($topics as $t) {
    	$food_item = $t['food_item'];
    	$category_name = $t['category_name'];
        $description = $t['description'];
    	$food_unit = $t['food_unit'];
        $count = $t['count'];
    	echo '<input type="checkbox" name="check_list[]" value="'.$id.'"><label>'.$name.'</label><br>';
    }
    ?>        
    Create New Topic:
  <input name="new_topic_name" type="text"><br>
  <input type="checkbox" name="new_topic" value="new_topic"><br>'
  <input type="submit">
</form>
<?php
  displayAllScriptures($db);
  ?>	    
if($_SERVER["REQUEST_METHOD"] == "post") {
        // retrieve the form data by using the element's name attributes value as key
          // if (isset($_GET['food_item'])){
               $food_item = $_GET['food_item']; 
               $allRows = selectByItem($db, $food_item);
        //   }
    foreach($allRows as $r) 
    {
     /*echo'<div class="row">'. '<div class="column">'.$r['food_item'].  '</div>'. '<div class="column">'  .$r['category_name']. '</div>'. '<div class="column">' .$r['description']. '</div>'. '<div class="column">'. $r['food_unit']. '</div>'. '<div class="column">' . $r['count']. '</div>'.'</div>'.'<br>' ;   */
        echo'<tr>'. '<td>' .$r['food_item'].   '</td>'. '<td>'  .$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. '<td>' . $r['count']. '</td>'.'</tr>';
    }

    }?>
    </table>
</body>
</html>

 <?php
$food_item = htmlspecialchars($_POST['food_item']);
//$category_name = htmlspecialchars($_POST['category_name']);
require('db.php');
$db = get_db();
$stmt = $db->prepare('INSERT INTO foodstorage(food_item) VALUES (:food_item);');
//$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
$stmt->bindValue(':food_item', $food_item, PDO::PARAM_STR);
$stmt->execute();
$new_page = "index.php?category_name=$category_name";
header("Location: $new_page");
die();
?>