<?php

function selectAll($db) { 
 $stmt = $db->query('SELECT id, food_item, category_name, description, food_unit, count FROM foodstorage');
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows; 
}
function selectAll2($db) { 
 $stmt = $db->query('SELECT id, first, last, bleeding, dry, perio, ortho, fluoride, pain, ear FROM ta09_users');
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}

function insertScripture($db,$food_item, $category_name, $description, $food_unit, $count) {

	$stmt = $db->prepare('INSERT INTO foodstorage (food_item, category_name, description, food_unit, count) VALUES (:food_item, :category_name, :description, :food_unit, :count)');
	$stmt->execute(array(':food_item' => $food_item , ':category_name' => $category_name, ':description' => $description, ':food_unit' => $food_unit, ':count' => $count ));
	return $db->lastInsertId('food_item');
}

function selectById($db, $id) { 
 $stmt = $db->prepare('SELECT * FROM ta09_users WHERE id=:id');
 $stmt->execute(array(':id' => $id));
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}

function selectByBook($db, $category_name) { 
 $stmt = $db->prepare('SELECT * FROM foodstorage WHERE category_name=:category_name');
 $stmt->execute(array(':category_name' => $category_name));
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}

function selectByItem($db, $food_item) { 
 $stmt = $db->prepare('SELECT * FROM foodstorage WHERE food_item=:food_item');
 $stmt->execute(array(':food_item' => $food_item));
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}

function selectByid2($db, $id) { 
 $stmt = $db->prepare('SELECT * FROM foodstorage WHERE id=:id');
 $stmt->execute(array(':id' => $id));
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}

function insertUser($db, $login, $password) {
   $filteredLogin = filter_var($login, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
   $filteredPassword = filter_var($password, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
   if(null == $filteredLogin || null == $filteredPassword) {
      return null;
   }
   $stmt = $db->prepare('INSERT INTO ta08_users (login, password) VALUES (:login,:password)
      ');
   $stmt->bindParam(':login', $filteredLogin, PDO::PARAM_STR, 40);
   $stmt->bindParam(':password', $filteredPassword, PDO::PARAM_STR, 40);
   $stmt->execute();
   return $db->lastInsertId('ta08_users_id_seq');
}

function selectByLogin($db, $login) {
   $filteredLogin = filter_var($login, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
   if(null == $filteredLogin) {
      return null;
   }
   $stmt = $db->prepare('SELECT * FROM ta08_users WHERE login=:login');
   $stmt->bindParam(':login', $filteredLogin, PDO::PARAM_STR, 40);
   $stmt->execute();
   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $rows;
}

function getDb()
{
 return getHerokuDb();
}

function getHerokuDb() {
 try
 {
   $dbUrl = getenv('DATABASE_URL');

   $dbOpts = parse_url($dbUrl);

   $dbHost = $dbOpts["host"];
   $dbPort = $dbOpts["port"];
   $dbUser = $dbOpts["user"];
   $dbPassword = $dbOpts["pass"];
   $dbName = ltrim($dbOpts["path"],'/');
   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $db;
 }
 catch (PDOException $ex)
 {
   echo 'Error!: ' . $ex->getMessage();
   die();
 }
}

function getLocalDb(){
 try
 {
   $user = 'user';
   $password = 'pass';
   $db = new PDO('pgsql:host=localhost:5432;dbname=cs313db', $user, $password);

   // this line makes PDO give us an exception when there are problems,
   // and can be very helpful in debugging! (But you would likely want
   // to disable it for production environments.)
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch (PDOException $ex)
 {
   echo 'Error!: ' . $ex->getMessage();
   die();
   }
   return $db;
}

?>
