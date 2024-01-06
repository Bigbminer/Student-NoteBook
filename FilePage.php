<?php
$_SESSION['isLoggedIn'] = true;
session_start();
?>

<!DOCTYPE html>
<html id="html">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title src="SNB Logo.png">Student NoteBook</title>
  <link rel="icon" href="SNB Logo.png"/>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="Courses.txt" rel="text" type="text/txt"/>
</head>

<div>
<?php
include 'Functions.php';
getSQL();



?>

</div>

<body>

  <div id="navBar">
    <a href="index.php" id="returnMain">
    <div id="logo">
      <img id="logoIMG" src="SNB Logo.png">
    </div>
    <div id="title"><a href="index.php" class="navbarthing">Student NoteBook</a></div>
</a>
        <?php
            echo("<script>console.log(" . $_SESSION['isLoggedIn'] . ");</script>");

            if($_SESSION['isLoggedIn']){
                echo("<div id='signInLog'>
                <div id='login'><a href='Login.php' class='navbarthing'>Log In</a></div>
                <div id='signIn' href='Signin.php'><a href='Signin.php' class='navbarthing'>Sign Up</a></div>
                </div>");
                echo("<script>console.log('out');</script>");
            } else {
                echo("<script>console.log('in');</script>");
                echo("<div id='account'><div id='UserName' style='font-size:30px; color:rgba(255, 255, 255, 1);'>" .$_SESSION['userName'] . "</div> <div id='accountOpti'><a id='LogOut' class='accountEdit' href='Logout.php'>Log Out</a><a id='delAcc' class='accountEdit' href='DeleteAccount.php'>Delete</a></div></div> <a href='AddNew.php' id='addSomething'>+</a>");
            }
        ?>
  </div>


<div class="filePageHeader" id="filePageH">
<div class="roundLCornerDiv" id="roundLCornerD">
    <div class="rLCCover"></div>
</div>
<div class="roundRCornerDiv" id="roundRCornerD">
    <div class="rRCCover"></div>
</div>
<?php
    echo("<div class='filePageTitle'>". $_SESSION['filePTitle'] ."</div>");
    echo("<div class='filePageDesc'>". ($_SESSION['conn']->query("SELECT fileDesc FROM " . $_SESSION['$coursePageCT'] . " WHERE fileName= '". $_SESSION['filePTitle'] ."';")->fetch_array(MYSQLI_NUM))[0] ."</div>");
?>
</div>


  <div class="ad">
    (ad)
  </div>
  <?php
    include 'Footer.php';
  ?>
  <script src="FilePage.js"></script>
</body>

</html>

