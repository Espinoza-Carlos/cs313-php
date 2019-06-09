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

<h2>This is the whole data base inventory <br> please write the product id number to be Modify</h2>
<br>
    <table>
    <tr>
        <th>Id</th>
        <th>Food Item</th>
        <th>Category Name</th> <th>Description</th> <th>Food Unit</th>
        <th>Count</th>
    </tr>
<?php
   include 'db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $category_name = $_GET['category_name'];
        $db = getDb();
        $allRows = selectAll($db);
        
        foreach($allRows as $r) 
        {
                echo'<tr>'. '<td>' .$r['id'].   '</td>'.'<td>' .$r['food_item'].   '</td>'. '<td>'  .$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. '<td>' . $r['count']. '</td>'.'</tr>';
        }
        
    }
?>
</table>
<br>
<hr>

<form action="modify2.php" method="GET"> Enter a Food id to be Modify: <input name="id" type="text"> <br><br> <input type="submit"> </form>
    
</body>
</html>