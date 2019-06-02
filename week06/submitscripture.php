<?php
require('db.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // retrieve the form data by using the element's name attributes value as key

           if (isset($_GET['food_item']) && isset($_GET['category_name']) && isset($_GET['description']) && isset($_GET['food_unit']) && isset($_GET['count'])){

						$food_item = $_GET['food_item'];
						$category_name = $_GET['category_name'];
						$description = $_GET['description'];
						$food_unit = $_GET['food_unit'];
                        $count = $_GET['count'];
						$db = getDb();
               
						$lastRow  = insertScripture($db, $food_item, $category_name, $description, $food_unit, $count);
					  //  if (isset($_GET['new_topic_name']) && isset($_GET['new_topic'])) {
							//New topic;
						//	$topic = $_GET['new_topic_name'];
						//	$topicId = insertTopic($db, $topic);
						//	insertScriptureTopic($db, $lastRow, $topicId);
						//} elseif (isset($_GET['check_list'])) {
				//			foreach($_GET['check_list'] as $selected){
							//@TODO insert into database
				//			insertScriptureTopic($db, $lastRow, $selected);
						}

					} else {
					    echo '<b>Error!</b>';
					}

    
$newPage = "insert_note.php";
header("Location: $newPage");
die();
}
}   
?>     