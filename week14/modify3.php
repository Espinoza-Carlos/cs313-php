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
<h2>Modify the Food Item to the data base</h2>
    

   <?php
   include 'db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $GLOBALS['z']= id; 
        $db = getDb();
        $allRows = selectByid2($db, $id);
        
        foreach($allRows as $r) 
        {
            echo '<form action="modify4.php" method="POST">
           <input type="hidden" value="'.$r['id'].'" name="id" id="id"><br>
           <label for="food_item"><b>Food Item</label>    
           <input type="text" value="'.$r['food_item'].'" name="food_item" id="food_item" required><br>
           <label for="category_name">category_name</label>          
           <select name ="category_name">
           <option selected=>'.$r['category_name'].'</option>
           <option value="Fruit">Fruit</option>
           <option value="Vegetable">Vegetable</option>
           <option value="Bread">Bread</option>
           <option value="Produce">Produce</option>
           <opti on value="Can">Can</option>
           <option value="Dairy">Dairy</option>
           </select><br>
           <label for="description">description</label>          
           <input name="description" id="description" type="text" value="'.$r['description'].'" required><br>
           <label for="food_unit">food_unit</label>
           <select name ="food_unit">
           <option selected=>'.$r['food_unit'].'</option>
           <option value="gal">Gallon</option>
           <option value="qt">Quart</option>
           <option value="pt">Pint</option>
           <option value="cup">Cup</option>
           <option value="oz">Ounces</option>
           <option value="lb">Pounds</option>
           <option value="kl">kilogram</option>
           <option value="floz">Fluid Ounce</option>
           <option value="g">Gram</option>
           <option value="mg">Milligram</option>
           </select><br>                
           <label for="count">count</label>              
           <input name="count" id="count" type="text" value="'.$r['count'].'" required><br>
           <br /><br />   </b>   
           <input type="submit" value="Modify in to Database" />
           </form>' ;
                   }
            }
 ?>        
</body>
</html>