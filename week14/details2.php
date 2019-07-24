<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Ponder07 details category name</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
     <ul>
  <li><a class="active" href="index.php">Return to Ponder 06</a></li>
  
</ul>    
<h4>You can select a product by a single Food Item</h4>
<h5>I will advice to try apple, White Bread, carrot, or display products by category name. to see producs Items names.</h5>
       
<form action="details2.php" method="GET"> Enter a Food Item Name: <input name="food_item" type="text" required> <br><br> <input type="submit"> </form>
    <table>
    <tr>
        <th>Food Item</th>
        <th>Category Name</th> <th>Description</th> <th>Food Unit</th>
        <th>Count</th>
    </tr>

    
    <?php require 'db.php';

$db = getDb();
if($_SERVER["REQUEST_METHOD"] == "GET") {
                       $food_item = $_GET['food_item']; 
               $allRows = selectByItem($db, $food_item);
        
    foreach($allRows as $r) 
    {
             echo'<tr>'. '<td>' .$r['food_item'].   '</td>'. '<td>'  .$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. '<td>' . $r['count']. '</td>'.'</tr>';
    }

    }?>
    </table>
</body>
</html>