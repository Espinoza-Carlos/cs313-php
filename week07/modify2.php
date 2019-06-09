<!DOCTYPE html>
<html>
    <head>
<meta charset="UTF-8">
    
    <title>Ponder06 details category name</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<ul>
  <li><a class="active" href="modify.php">Return to full list view</a></li>
  </ul>
<form action="modify2.php" method="GET">
    <h2>Is this the food Item that you want to Modify?</h2>
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
        $id = $_GET['id'];
        $GLOBALS['z']= id; 
        $db = getDb();
        $allRows = selectByid2($db, $id);
        
        foreach($allRows as $r) 
        {
                echo'<tr>'. '<td>' .$r['id'].   '</td>'.'<td>' .$r['food_item'].   '</td>'. '<td>'  .$r['category_name']. '</td>'. '<td>' .$r['description']. '</td>'. '<td>'. $r['food_unit']. '</td>'. '<td>' . $r['count']. '</td>'.'</tr>';
        }
        echo '<br>';
        
        
        
    }
 
?>
  
      
    </table>
    </form>
    <br>
    <hr>
  <?php
    echo '<form action="modify3.php" method="GET">
              <input type="hidden" name="id" value="'.$id.'"><input type="submit" name="value" value="MODIFY">
              </form>'; 
     die();
              ?>
   
    
</body>
</html>