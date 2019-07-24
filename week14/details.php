<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Final app </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
     <ul>
  <li><a class="active" href="index.php">Return to Health history main menu</a></li>
  
</ul>    
<h2>This is the filled Health history</h2>
<br>
    <table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th> <th>Bleedind Gums?</th> <th>Dry Mouth</th>
        <th>Periodontal Treatment?</th><th>Orthodontic Treatment?</th> <th>Flouride on Water?</th><th>Are you on pain?</th><th>Ear pain?</th>
    </tr>
<?php
   require 'db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") { 
        $id = $_GET['id'];
        $db = getDb();
        $allRows = selectAll2($db);
        //$allRows = selectById($db, $id);
        foreach($allRows as $r) 
        {
                echo'<tr>'. '<td>' .$r['first']. '</td>'. '<td>'. $r['last']. '</td>'. '<td>' . $r['bleeding']. '</td>'. '<td>' . $r['dry']. '</td>'. '<td>' . $r['perio']. '</td>'. '<td>' . $r['ortho']. '</td>' . '<td>' . $r['fluoride'].  '</td>'. '<td>' . $r['pain']. '</td>'. '<td>' . $r['ear']. '</td>'.  '</tr>';
        }
    }
?>
    </table>
    <h1>THANK YOU FOR YOUR HEALTH HISTORY</h1>
    <h3>Now your visit will be faster</h3>
</body>
</html>