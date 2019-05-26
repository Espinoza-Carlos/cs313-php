<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Ponder Week05</title>
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
<h5>The categories are Can, Fruit, Vegetable, Bread, Dairy </h5>
<form action="index.php" method="GET">
  Enter a product:
  <input name="category_name" type="text">
  <br><br>
  <input type="submit">
</form>
<p><b>Food Item...................Category name.............Description..................Food Unit...................Count </b>      </p>
<?php
require 'db.php';
//Local or Heroku
$db = getDb();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // retrieve the form data by using the element's name attributes value as key
           if (isset($_GET['category_name']))
    {
     $category_name = $_GET['category_name'];
      $allRows = selectByBook($db, $category_name);         
    } 
    foreach($allRows as $r) 
    {
     echo'<div class="row">'. '<div class="column">'.$r['food_item'].  '</div>'. '<div class="column">'  .$r['category_name']. '</div>'. '<div class="column">' .$r['description']. '</div>'. '<div class="column">'. $r['food_unit']. '</div>'. '<div class="column">' . $r['count']. '</div>'.'</div>'.'<br>' ;        
    }

    } 
?>
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
<h4>You can see all the elements on the data base if you click on the next button</h4>    
<form action="index.php" method="GET">
  Display all:
    <input name="category_name" type="button" onclick="window.location.href = 'details2.php';" value="Display" />
</form>
</div>        
<br>    
<hr>
   
</body>
</html>
