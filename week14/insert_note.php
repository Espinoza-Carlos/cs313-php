<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Final app insert health history</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    

</head>
<body>
     <ul>
  <li><a class="active" href="index.php">Return to health history menu</a></li>
  
</ul>    
<h2>Add the a new Health history to the data base</h2>

       
<?php 
require ("db.php");
$db = getDb();

?>        
<h2>Patient Information</h2>
<br>
<form action="submit.php" method="POST">
  <!--<label for="birthdate"><b>Birth date</b></label>    
  <input last="birthdate" id="birthdate" placeholder="YY-MM-DD"  type="date" required><br>-->
  
  <label for="first"><b>First Name</b></label>  
  <input name="first" id="first"  type="text" required><br>
  <label for="last"><b>Last Name</b></label>    
  <input name="last" id="last"  type="text" required><br>
  <label for="bleeding"><b>Do you have Bleeding Gums?</b></label>          
  <select name ="bleeding">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>
  <label for="dry"><b>Do you have dry mouth?</b></label>          
  <select name ="dry">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>
  <label for="perio"><b>Are you under Periodontal treatment?</b></label>          
  <select name ="perio">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>  
  <label for="ortho"><b>Are you under orthodontic treatment?</b></label>          
  <select name ="ortho">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>     
  <label for="flouride"><b>do your wather system use flouride in your wather?</b></label>   <select name ="flouride">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>     
  <label for="pain"><b>Are you in pain?</b></label>          
  <select name ="pain">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>     
  <label for="ear"><b>do you experience ear pain in the morning?</b></label>          
  <select name ="ear">
  <option value="yes">yes</option>
  <option value="no">no</option>
  </select><br>     
  <br /><br /> 
  <input type="submit" value="Add to Database" />

</form>
<script>
//    var test = $userName ;
//    document.getElementById("usser").value = test;
</script>

</body>
</html>