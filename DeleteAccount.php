<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title href="SNB Logo.png">Student NoteBook</title>
  <link rel="icon" href="SNB Logo.png"/>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="Courses.txt" rel="text" type="text/txt"/>
</head>
<body onload="BodyLoaded();">
<div id="navBar">
    <a href="index.php" id="returnMain">
    <div id="logo">
      <img id="logoIMG" src="SNB Logo.png">
    </div>
    <div id="title"><a href="index.php" class="navbarthing">Student NoteBook</a></div>
</a>



<div id="loggedOut">Are you sure you want to <p id="loCool">Delete Account?</p> This can not be undone.  <form method="post"><button name="delete" value="true" id="deleteButton">Delete</button></form></div>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      include 'Functions.php';
      getSQL();
      
      $searchDB = $_SESSION['conn']->query("DELETE FROM accountsTable WHERE accountName = '" . strval($_SESSION['userName']) . "';");
      $_SESSION['isLoggedIn'] = true;
      header("Location: Index.php", TRUE, 301);
      exit();

    }
?>
<script src="signOut.js"></script>
</body>
</html>