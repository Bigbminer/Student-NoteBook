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
    <div id="signLog">
      <div id="login"><a href="Login.php" class="navbarthing">Log In</a></div>
      <div id="signIn" href="Signin.php"><a href="Signin.php" class="navbarthing">Sign Up</a></div>
  </div>
</div>

<form id="signUpDiv" method="post">
    <div id="sUDTitle">Sign Up</div>
    <?php
        function nameError(){
            echo("<div style='font-size:20px; color:rgba(255, 100, 100, 1);'>Username Must be Unique!</div>");
        }
    ?>
    <div id="userNamePassword">
    <div class="sUDIsTeacherText" style="display:inline-box;">
        Username
        <input required="true" id="sUDName" type="text" name="userName">
    </div>
    <div class="sUDIsTeacherText" style="display:inline-box;">
        Password
        <input required="true" id="sUDPassword" type="password" name="password">
    </div>
</div>
    <div id="isTeacherDiv">
        <label for="teacherCheckbox" class="studentandteacherC" id="teacherDiv" style="text-align:center;" onclick="checkTeacher(0)" onmouseover="isTeacherOnHover(false)" onmouseout="isTeacherOut(true)">
            Teacher
            <input required="true" id="teacherCheckbox" type="radio" name="isTeacher" value="1">
            <img id="studentIMG" src="Teacher.png">
</label>
        <label for="studentCheckbox" required="true" class="studentandteacherC" id="studentDiv" style="text-align:center;" onclick="checkTeacher(1)" onmouseover="isTeacherOnHover(true)" onmouseout="isTeacherOut(true)">
            Student
            <input required="true" id="studentCheckbox" type="radio" name="isTeacher" value="0">
            <img id="studentIMG" src="Student (1).png">
</label>
    </div>
    <input id="submitSignUp" type="submit" required="true">
    <?php
include 'Functions.php';
getSQL();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    error_reporting(0);
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $isTeacher = $_POST['isTeacher'];
    $searchDB = $_SESSION['conn']->query("SELECT accountName FROM accountsTable WHERE accountName= '$userName';");
    $search = $searchDB -> fetch_assoc();
    if($search["accountName"] != $userName){
        $query = "INSERT INTO accountsTable (accountName, accountPassword, isTeacher) VALUES('$userName', '$password', '$isTeacher')";
        $_SESSION['conn']->query($query);
        $_SESSION['isLoggedIn'] = false;
        $_SESSION['userName'] = $userName;
        header("Location: Index.php", TRUE, 301);
        exit();
    } else {
        nameError();
    }
}

?>
</form>
  
  <div class="ad">
    (ad)
  </div>
  <script src="signUp.js"></script>
</body>

</html>