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
            echo '<form action="delete3.php" method="GET">
           <label for="food_item">Food Item</label>    
              <input type="text" value="'.$r['food_item'].'" name="food_item" id="food_item">
              </form>';
            //echo '<form action="delete3.php" method="GET">
              //<input type="hidden" name="id" value="'.$id.'"><input type="submit" name="value" value="DELETE">
              //</form>'; 
            //.$r['id'].
            //    echo'<tr>'. '<td>' .$r['id'].   '</td>'.'<td>' .$r['food_item'].   '</td>'. '<td>'  //.$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. //'<td>' . $r['count']. '</td>'.'</tr>';
        }
        
        
        
        
    }
 

    

  

?>        

</body>
</html>