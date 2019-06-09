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
<h2>Add the new Food Item to the data base</h2>

       
<?php 
require ("db.php");
$db = getDb();
?>        
<h2>Insert your new product</h2>
<br>
<form action="submitscripture.php" method="POST">
  <label for="food_item">Food Item</label>    
  <input name="food_item" id="food_item" type="text"><br>
  <label for="category_name">category_name</label>          
  <select name ="category_name">
  <option value="Fruit">Fruit</option>
  <option value="Vegetable">Vegetable</option>
  <option value="Bread">Bread</option>
  <option value="Produce">Produce</option>
  <option value="Can">Can</option>
  <option value="Dairy">Dairy</option>
  </select><br>
  <label for="description">description</label>          
  <input name="description" id="description" type="text"><br>
  <label for="food_unit">food_unit</label>
  <select name ="food_unit">
  <option value="gal">Gallon</option>
  <option value="qt">Quart</option>
  <option value="pt">Pint</option>
  <option value="cup">Cup</option>
  <option value="oz">Ounces</option>
  <option value="kl">kilogram</option>
  <option value="floz">Fluid Ounce</option>
  <option value="g">Gram</option>
  <option value="mg">Milligram</option>
  </select><br>                
  <!--<input name="food_unit" id="food_unit" type="text"><br>-->
  <label for="count">count</label>              
  <input name="count" id="count" type="text"><br>
  <br /><br />      
  
  <input type="submit" value="Add to Database" />

</form>
</body>
</html>