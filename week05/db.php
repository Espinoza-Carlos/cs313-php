<?php

function selectAll($db) { 
 $stmt = $db->query('SELECT food_item, category_name, description, food_unit, count FROM foodstorage');
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}

function selectById($db, $category_name) { 
 $stmt = $db->prepare('SELECT * FROM foodstorage WHERE category_name=:category_name');
 $stmt->execute(array(':category_name' => $category_name));
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
