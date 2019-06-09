<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Ponder Week07</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
     <ul>
  <li><a class="active" href="../assignments.html">Return to assignments</a></li>
  
</ul>    
<h2>Mothers food list</h2>
<br>
<div>
<h4>You can select a product by category name</h4>
<h5>After selecting a category click on submit</h5>
<form action="index.php" method="GET">
  Enter a product:
  <br><br>
  <select name ="category_name">
  <option value="Fruit">Fruit</option>
  <option value="Vegetable">Vegetable</option>
  <option value="Bread">Bread</option>
  <option value="Produce">Produce</option>
  <option value="Can">Can</option>
  <option value="Dairy">Dairy</option>
</select>
<input type="submit">
</form>
<table>
    <tr>
        <th>Food Item</th>
        <th>Category Name</th> <th>Description</th> <th>Food Unit</th>
        <th>Count</th>
    </tr>
<?php
require 'db.php';
$db = getDb();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['category_name']))
    {
     $category_name = $_GET['category_name'];
     echo $category_name;
      $allRows = selectByBook($db, $category_name);         
    } 
    foreach($allRows as $r) 
    {
             echo'<tr>'. '<td>' .$r['food_item'].   '</td>'. '<td>'  .$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. '<td>' . $r['count']. '</td>'.'</tr>';
    }
    } 
?>
    </table>    
</div>        
<hr>    
<div>    
<h4>You can see all the elements on the data base if you click on the next button</h4>    
<form action="index.php" method="GET">
  Display all:
    <input name="category_name" type="button" onclick="window.location.href = 'details.php';" value="Display" />
</form>
</div>        
<br>    
<hr>
<div>    
<h4>In order to see one product by item name and all its charachteristics if you click on the next button</h4>    
<form action="index.php" method="GET">
  Display all:
    <input name="category_name" type="button" onclick="window.location.href = 'details2.php';" value="Display" />
</form>
</div>        
<br>    
<hr>
<div>    
<h4>You can add new products to the data base if you click on the next button</h4>    
<form action="index.php" method="GET">
  Insert Data:
    <input name="category_name" type="button" onclick="window.location.href = 'insert_note.php';" value="Insert" />
</form>
</div>        
<br>    
<hr>
<div>    
<h4>You can delete products from the data base if you click on the next button</h4>    
<form action="index.php" method="GET">
  Delete Data:
    <input name="category_name" type="button" onclick="window.location.href = 'delete.php';" value="Delete" />
</form>
</div>        
<br>    
<hr>
<div>    
<h4>You can Modify products from the data base if you click on the next button</h4>    
<form action="index.php" method="GET">
  Modify Data:
    <input name="category_name" type="button" onclick="window.location.href = 'modify.php';" value="Modify" />
</form>
</div>        
<br>    
<hr>
</body>
</html>
