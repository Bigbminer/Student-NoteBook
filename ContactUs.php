<?php
$_SESSION['isLoggedIn'] = true;
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
  

<form method="post" id="contactUsForm">
    
    Send to:
    <select class="dropDown" name="accountR" style="margin-bottom: 10px;">
        <option value="BL">Brooks Luffman, Lead Developer and Project Manager</option>
        <option value="fake">Jimmy Fakename, Fake Position</option>
    </select>

    <div class="emailDiv">
        <div class="emailSubject">
            <input class="emailTestField" id="emailSubjectText" outline="none" placeholder="Subject" required="true" type="text" name="subject"/>
        </div>
        <div class="emailBody">
            <textarea cols="10" class="emailTestField" id="emailBodyText" outline="none" placeholder="Body" required="true" type="text" name="body"></textarea>
            <input type="submit" class="submitButton" id="emailSend" name="Send" value="Send"/>
        </div>
    </div>
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
    $email = $_POST['accountR'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    if($email && $subject && $body){
        if($email == "BL"){
            mail("Fake@email.com", $subject . "", wordwrap($body, 70, "/n", TRUE) . "");
        }
    }
}
?>

