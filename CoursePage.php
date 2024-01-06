<?php
session_start();
include 'Functions.php';
getSQL();
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
</head>

<div>


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


  <?php
    echo("<script>console.log('". $_SESSION['$coursePageCT'] ."');</script>");
  ?>
  <?php
    $numbOfCorrs = intval(($_SESSION['conn']->query("SELECT COUNT(nameofCorr) FROM corriculums;")->fetch_array(MYSQLI_NUM))[0]);
    $searchCorr = $_SESSION['conn']->query("SELECT * FROM corriculums;");
    while($rowCorr = $searchCorr ->fetch_assoc()){
            $tableName = $rowCorr['nameOfTable'];
            $numbOfCourses = intval(($_SESSION['conn']->query("SELECT COUNT(courseName) FROM " . $tableName . ";")->fetch_array(MYSQLI_NUM))[0]);
            $searchCoursesNames = $_SESSION['conn']->query("SELECT * FROM " . $tableName . ";");
            $searchCoursesDiscs = $_SESSION['conn']->query("SELECT courseDisc FROM " . $tableName .";");
            while($row = $searchCoursesNames ->fetch_assoc()){
                if($row['courseTable'] == $_SESSION['$coursePageCT']){
                    $_SESSION['courseTB'] = $row['courseTable'];
                    $_SESSION['courseCorrTB'] = $tableName;
                    echo("<div class='courseTitle'>". $row['courseName'] ."</div>");
                    echo("<div class='courseDescText'>". $row['courseDisc'] ."</div>");

                    //$_SESSION['courseCorrTB'] = ($_SESSION['conn']->query("SELECT nameOfTable FROM corriculums WHERE nameOfTable='". $tableName ."'")->fetch_array(MYSQLI_NUM))[0];
                    //echo("<script>console.log('". $_SESSION['courseCorrTB'] ."');</script>");
                }
            }
    }
  ?>

<div class="iconKey">
        <img src="T (2).png" class="courseRIMG"></img>
        <img src="PPs (2).png" class="courseRIMG"></img>
        <img src="Test (2).png" class="courseRIMG"></img>
        <div>Notes</div>
        <div>Practice Problems</div>
        <div>Test</div>
    </div>    

  <form method="post" class="courseRHolder">

  <?php
    $echoString = "";
            $numbOfFiles = intval(($_SESSION['conn']->query("SELECT COUNT(fileName) FROM " . $_SESSION['$coursePageCT'] . ";")->fetch_array(MYSQLI_NUM))[0]);
            $searchCoursesNames = $_SESSION['conn']->query("SELECT * FROM " . $_SESSION['$coursePageCT'] . ";");
            //$searchCoursesDiscs = $_SESSION['conn']->query("SELECT fileDisc FROM " . $_SESSION['$coursePageCT'] .";");
            while($row = $searchCoursesNames ->fetch_assoc()){
                echo("<button name='selectedFile' class='courseResource' value=". $row['fileName'].">
                <img src='");
                if($row['typeOfFile'] == "Notes"){
                    echo("T (2).png");
                } else if($row['typeOfFile'] == "Test"){
                    echo("Test (2).png");
                } else if($row['typeOfFile'] == "PPs"){
                    echo("PPs (2).png");
                }
                echo("' class='courseRIMG'></img>
                <div class='courseRText'> 
                <div class='courseRName'>
                    ". $row['fileName'] ."
                </div>
                <div class='courseRDesc'>
                ". substr($row['fileDesc'], 0, 30) ."...
                </div>
                </div>
                <div class='courseRLDR' style='color: rgb(". intval(255 - ((100 / (($row['fileLikes'] + $row['fileDislikes']) / $row['fileLikes'])) * 255)) .", ". intval((100 / (($row['fileLikes'] + $row['fileDislikes']) / $row['fileLikes'])) * 255) .", 0);'>
        ". (100 / (($row['fileLikes'] + $row['fileDislikes']) / $row['fileLikes'])) ."%
                </div>
                </button>");
            }
    
  ?>
 

</form>

  
  <div class="ad">
    (ad)
  </div>
  <?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_SESSION['filePTitle'] = $_POST['selectedFile'];
    header("Location: FilePage.php", TRUE, 301);
    exit();
}

?>
  <?php
    include 'Footer.php';
  ?>
  <script src="signUp.js"></script>
</body>

</html>
