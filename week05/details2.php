<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Ponder05 details category name</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
     <ul>
  <li><a class="active" href="index.php">Return to Ponder 05</a></li>
  
</ul>    
<h4>You can select a product by a single Food Item</h4>
<h5>I will advice to try apple, White Bread, carrot, or display products by category name. to see producs Items names.</h5>
       
<form action="details2.php" method="GET"> Enter a Food Item Name: <input name="food_item" type="text"> <br><br> <input type="submit"> </form> <p><b>Food Item...................Category name.............Description..................Food Unit...................Count </b>      </p>
    <?php require 'db.php';
//Local or Heroku
$db = getDb();
if($_SERVER["REQUEST_METHOD"] == "GET") {
        // retrieve the form data by using the element's name attributes value as key
          // if (isset($_GET['food_item'])){
               $food_item = $_GET['food_item']; 
               $allRows = selectByItem($db, $food_item);
        //   }
    foreach($allRows as $r) 
    {
     echo'<div class="row">'. '<div class="column">'.$r['food_item'].  '</div>'. '<div class="column">'  .$r['category_name']. '</div>'. '<div class="column">' .$r['description']. '</div>'. '<div class="column">'. $r['food_unit']. '</div>'. '<div class="column">' . $r['count']. '</div>'.'</div>'.'<br>' ;           
    }

    }?>
    
</body>
</html>
