<?php
   include 'db.php';
    echo 'alert("the product has been erased")';       
echo "<script>alert('the product has been erased')</script>";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        echo $id;
        
$db = getDb();
try
{
    $query = 'DELETE FROM foodstorage WHERE id = :id';
    echo $query. "<br>";
    $statement = $db->prepare('DELETE FROM foodstorage WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    }
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
echo 'alert("the product has been erased")';       
echo "<script>alert('the product has been erased')</script>";
// finally, redirect them to a new page to actually show the topics
header("Location: details.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
    }
?>
      
    
