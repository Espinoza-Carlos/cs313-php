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
<h2>This is the whole data base inventory</h2>
<br>
    <!--<p><b>Food Item...................Category name.............Description..................Food Unit...................Count </b>      </p>-->
    <table>
    <tr>
        <th>Food Item</th>
        <th>Category Name</th> <th>Description</th> <th>Food Unit</th>
        <th>Count</th>
    </tr>
<?php
   require 'db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // retrieve the form data by using the element's name attributes value as key
        $category_name = $_GET['category_name'];
        $db = getDb();
        $allRows = selectAll($db);
        
        foreach($allRows as $r) 
        {
        /* echo'<div class="row">'. '<div class="column">'.$r['food_item'].  '</div>'. '<div class="column">'  .$r['category_name']. '</div>'. '<div class="column">' .$r['description']. '</div>'. '<div class="column">'. $r['food_unit']. '</div>'. '<div class="column">' . $r['count']. '</div>'.'</div>'.'<br>' ;
        */
         echo'<tr>'. '<td>' .$r['food_item'].   '</td>'. '<td>'  .$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. '<td>' . $r['count']. '</td>'.'</tr>';
                 }
    }
?>
    </table>
</body>
</html>