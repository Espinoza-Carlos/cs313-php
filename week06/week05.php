<html>
<body>

<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

//print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

foreach ($db->query('SELECT now()') as $row)
{
 print "<p>$row[0]</p>\n\n";
}

echo '<h1> Scripture Resources </h1>';
foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
{

  echo '<ul>';
  echo '<li>';
  echo '<b>';
  echo  $row['book'];
  echo '  ';
  //echo '<li>';
  echo  $row['chapter'];
  echo '<b> : </b>';
  //echo '<li>';
  echo  $row['verse'];

  echo '</b>';
  //echo '<li>';
  echo '<b>- </b>';
  echo $row['content'];
  echo '<b> </b>';
  echo '</li>';
  echo '</ul>';
  echo '<br/>';
}
echo '<h2>Stret Challenge 01</h2>';
echo '<a href= "details.php? id=' .$r['id'].'>Click here</a>';

?>

</body>
</html>