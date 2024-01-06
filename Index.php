<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title src="SNB Logo.png">Student NoteBook</title>
  <link rel="icon" href="SNB Logo.png"/>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="Courses.txt" rel="text" type="text/txt"/>
  <style>

  </style>
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
  <div id="whoWeAre">
    <img src="SNB Logo.png" id="logoForTitle">
    <div id="whoWeAreText">Student NoteBook</div>
    <div id="whoWeAreDisc">We are a fun little group made for students by the students. This is meant to be large scale but is early in developement. Many parts of this project are still in early stages and we can't wait to have a finnished project out for you. Please understand that this takes time. We are only experienced to a certain degree, so please be patient with the many potencial bugs.</div>
  </div>
  <form id="corSelect" method="post">
   <?php
   
   curriculumMenu();
    
   ?>


  </form>
  <div class="ad">
    (ad)
  </div>

  <?php
    include 'Footer.php';
  ?>

  <script src="script.js"></script>
</body>

</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_SESSION['$coursePageCT'] = $_POST['classB'];
    header("Location: CoursePage.php", TRUE, 301);
    exit();
}
?>

