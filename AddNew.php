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

    
    <form method="post" enctype="multipart/form-data">  
    
    <div id="typeSelect">
        <div id="typeSelectFormTtle">What Are You Adding?</div>

        <div class="TSLabel" id="newCorrBL" onclick="getType('Corriculum')">New Corriculum</div>

        <div class="TSLabel" id="newCorsBL" onclick="getType('Course')">New Course</div>

        <div class="TSLabel" id="newNoteBL" onclick="getType('Notes')">New Notes</div>

        <div class="TSLabel" id="newTestBL" onclick="getType('Test')">New Test</div>

        <div class="TSLabel" id="newPPBL" onclick="getType('PP')">New Practice Problems</div>
    </div>

        <div class="AddNewBackground" id="AddCorriculum">
            <div class="ANBTitle">New Corriculum</div>

            <div class="addNewSmallDiv" id="corriculumAddName">
                <div>Corriculum Name</div>
                <input id="corriculumAddNameText" class="textField" name="corriculumName" type="text"/>
                <input class="submitButton" type="submit" name="submitType" value="Submit Corriculum"/>
            </div>
        </div>

        <div id="AddCourse" class="AddNewBackground">
            <div class="ANBTitle">New Course</div>

            <div class="addNewSmallDiv" id="courseAddName">
                <div>Corriculum</div>


                <select name="corris" class="dropDown">
                <?php
                    createCorrDropDown();
                ?>
                </select>


                <div>Course Name</div>
                <input id="courseAddNameText" class="textField" name="courseName" type="text"/>
                <div>Course Syllabus</div>
                <textarea rows="5" cols="35" id="courseAddDescriptionText" name="courseDisc" class="textField" type="text" style="height: 100px"></textarea>
                <input class="submitButton" type="submit" name="submitType" value="Submit Course"/>
            </div>
        </div>

        <div id="AddNotes" class="AddNewBackground">
            <div class="ANBTitle">New Notes</div>

            <div class="addNewSmallDiv" id="courseAddName">
            <div>Course</div>
            <select name="coursesNotes" class="dropDown">
                <?php
                    createDropDown();
                ?>

                </select>

                <div>Unit And Notes Name</div>
                <input id="notesAddNameText" class="textField" name="notesName" type="text"/>
                <div>Notes Description</div>
                <textarea rows="5" cols="35" id="notesAddDescriptionText" name="notesDesc" class="textField" type="text" style="height: 100px"></textarea>
                <div>Notes File</div>
                <input type="file" name="fileNotes" class="addFile"/>
                <input class="submitButton" type="submit" name="submitType" value="Submit Notes"/>
            </div>
        </div>

        <div id="AddTest" class="AddNewBackground">
            <div class="ANBTitle">New Test Paper</div>
            <div class="addNewSmallDiv" id="courseAddName">
            <div>Course</div>
            <select name="coursesTest" class="dropDown">
                <?php
                    createDropDown();
                ?>

                </select>
                <div>Test Name</div>
                <input id="testAddNameText" class="textField" name="testName" type="text"/>
                <div>Test Description</div>
                <textarea rows="5" cols="35" id="testAddDescriptionText" name="testDesc" class="textField" type="text" style="height: 100px"></textarea>
                <div>Test File</div>
                <input name="testFile" class="addFile" type="file"/>
                <input class="submitButton" type="submit" name="submitType" value="Submit Test"/>
            </div>
        </div>

        <div id="AddPP" class="AddNewBackground">
            <div class="ANBTitle">New Pracitce Problems</div>
            <div class="addNewSmallDiv" id="courseAddName">
            <div>Course</div>
            <select name="coursesPP" class="dropDown">
                <?php
                    createDropDown();
                ?>

                </select>
                <div>Unit And Unique Name</div>
                <input id="PPAddNameText" class="textField" name="PPName" type="text"/>
                <div>Description</div>
                <textarea rows="5" cols="35" id="PPAddDescriptionText" name="PPDesc" class="textField" type="text" style="height: 100px;"></textarea>
                <div>Practice Problems File</div>
                <input name="PPFile" class="addFile" type="file"/>
                <input class="submitButton" type="submit" name="submitType" value="Submit Problems"/>
            </div>
        </div>
        <div id='termsOfSubmition'><div id='termsTitle'>Terms And Conditions</div><div id='termsOfSubmitionText'>By clicking acccept you are agreeing to the following:<br> None of this work is subject to copyright law and you take full responsibility of any and all illegal and inappropriate contents in the file or field. You are liable for any personal information displayed online. You agree that your account can be terminated if deemed necissary.</div><label class='submitButton' id='agreeCLabel' for="agreeChekbox">Accept<input id="agreeChekbox" type="Checkbox" required="true"/></label></div>
    
    </form>

    <?php
        
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //include 'Functions.php';
            $type = $_POST['submitType'];
            if($type == "Submit Corriculum"){ //------------------------------------------------------------------------------------------------
                $corriculumName = $_POST['corriculumName'];
                $searchDB = intval(($_SESSION['conn']->query("SELECT Count(nameofCorr) FROM corriculums WHERE nameofCorr= '" . $corriculumName . "';")->fetch_array(MYSQLI_NUM))[0]);
                //$search = $searchDB -> fetch_count();
                if($searchDB == 0){
                    $index = 0;
                        $tableName = substr($corriculumName, 0, 1);
                        while(strpos(substr($corriculumName, $index), " ") != FALSE){
                            $index += strpos(substr($corriculumName, $index), " ") + 1;
                            $tableName .= substr($corriculumName, $index, 1);
                        }
                        $tableName .= "Table";
                $query = "INSERT INTO corriculums (nameofCorr, nameOfTable) VALUES('$corriculumName', '$tableName')";
                $_SESSION['conn']->query($query);
                $_SESSION['conn']->query("CREATE TABLE " . $tableName . "(courseName Text(50), courseDisc Text(500), courseTable TEXT(50));");
                //header("Location: Index.php", TRUE, 301);
                //exit();
                }

            } else if($type == "Submit Course"){ //------------------------------------------------------------------------------------------------
                $corrics = $_POST['corris'];
                $newCourseName = $_POST['courseName'];
                $courseDisc = $_POST['courseDisc'];
                $tableName = ($_SESSION['conn']->query("SELECT * FROM corriculums WHERE nameofCorr='$corrics';"))->fetch_assoc();
                        
                $searchDB = intval(($_SESSION['conn']->query("SELECT Count(courseName) FROM ". $tableName['nameOfTable'] ." WHERE courseName= '$corrics';")->fetch_array(MYSQLI_NUM))[0]);
                if($searchDB == 0){
                    $oldTableName = $tableName['nameOfTable'];
                    
                    
                    $index = 0;
                        $tableCName = substr($newCourseName, 0, 1);
                        $index = 1;
                        while(strpos(substr($newCourseName, $index), " ") != FALSE){
                            $index += strpos(substr($newCourseName, $index), " ") + 1;
                            $tableCName .= substr($newCourseName, $index, 1);
                        }
                        $tableCName .= "Table";
                    $query = "INSERT INTO ". $oldTableName ." (courseName, courseDisc, courseTable) VALUES('$newCourseName', '$courseDisc', '$tableCName');";
                    $_SESSION['conn']->query($query);
                $_SESSION['conn']->query("CREATE TABLE " . $tableCName . " (typeOfFile Text(10), fileName Text(50), fileDesc Text(500), fileLikes INT, fileDislikes INT, theFile MEDIUMBLOB);");
                    //header("Location: Index.php", TRUE, 301);
                    //exit();
                }
            } else if($type == "Submit Notes"){ //------------------------------------------------------------------------------------------------
                $targetDir = "uploads/";
                $tableName = $_POST['coursesNotes'];
                $theFile = $_FILES['fileNotes'];
                $fileName = $_POST['notesName'];
                $fileDesc = $_POST['notesDesc'];
                $fileType = "Notes";
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($theFile["name"]);
                echo("<script>console.log('". $target_file ."');</script>");
                $searchDB = intval(($_SESSION['conn']->query("SELECT Count(fileName) FROM ". $tableName ." WHERE fileName= '$fileName';")->fetch_array(MYSQLI_NUM))[0]);
                if($searchDB == 0){
                    //move_uploaded_file($theFile['tmp_name'], $target_file);
                    $query = "INSERT INTO ". $tableName ." (typeOfFile, fileName, fileDesc, fileLikes, fileDislikes, theFile) VALUES('". $fileType ."', '$fileName', '$fileDesc', 1, 1, '". $target_file ."');";
                    $_SESSION['conn']->query($query);
                } else {
                    echo("<div style='font-size:20px; color:rgba(255, 100, 100, 1);'>Already a File by that Name!</div>");
                }
            } else if($type == "Submit Test"){ //------------------------------------------------------------------------------------------------
                $targetDir = "uploads/";
                $tableName = $_POST['coursesTest'];
                $theFile = $_FILES['testFile'];
                $fileName = $_POST['testName'];
                $fileDesc = $_POST['testDesc'];
                $fileType = "Test";
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($theFile["name"]);
                echo("<script>console.log('". $target_file ."');</script>");
                $searchDB = intval(($_SESSION['conn']->query("SELECT Count(fileName) FROM ". $tableName ." WHERE fileName= '$fileName';")->fetch_array(MYSQLI_NUM))[0]);
                if($searchDB == 0){
                    //move_uploaded_file($theFile['tmp_name'], $target_file);
                    $query = "INSERT INTO ". $tableName ." (typeOfFile, fileName, fileDesc, fileLikes, fileDislikes, theFile) VALUES('". $fileType ."', '$fileName', '$fileDesc', 1, 1, '". $target_file ."');";
                    $_SESSION['conn']->query($query);
                } else {
                    echo("<div style='font-size:20px; color:rgba(255, 100, 100, 1);'>Already a File by that Name!</div>");
                }

            } else if($type == "Submit Problems"){ //------------------------------------------------------------------------------------------------
                $targetDir = "uploads/";
                $tableName = $_POST['coursesPP'];
                $theFile = $_FILES['PPFile'];
                $fileName = $_POST['PPName'];
                $fileDesc = $_POST['PPDesc'];
                $fileType = "PPs";
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($theFile["name"]);
                echo("<script>console.log('". $target_file ."');</script>");
                $searchDB = intval(($_SESSION['conn']->query("SELECT Count(fileName) FROM ". $tableName ." WHERE fileName= '$fileName';")->fetch_array(MYSQLI_NUM))[0]);
                if($searchDB == 0){
                    //move_uploaded_file($theFile['tmp_name'], $target_file);
                    $query = "INSERT INTO ". $tableName ." (typeOfFile, fileName, fileDesc, fileLikes, fileDislikes, theFile) VALUES('". $fileType ."', '$fileName', '$fileDesc', 1, 1, '". $target_file ."');";
                    $_SESSION['conn']->query($query);
                } else {
                    echo("<div style='font-size:20px; color:rgba(255, 100, 100, 1);'>Already a File by that Name!</div>");
                }

            } 
            
        }
    ?>


  <script src="AddNew.js"></script>
</body>

</html>

<?php
    function createCorrDropDown(){
                    $serverName = "localhost";
                    $username = "root";
                    $password = "Volleyball24%68";
                    $DBName = "accountDB";
                    
                    // Create connection
                    $_SESSION['conn'] = new mysqli($serverName, $username, $password, $DBName);
                    // Check connection
                    if ($_SESSION['conn']->connect_error) {
                      die("Connection failed: " . $_SESSION['conn'] -> connect_error);
                    }
                    
                    $echoString = "";
                    $numbOfCorrs = intval(($_SESSION['conn']->query("SELECT COUNT(nameofCorr) FROM corriculums;")->fetch_array(MYSQLI_NUM))[0]);
                    $searchCorr = $_SESSION['conn']->query("SELECT nameofCorr FROM corriculums;");
                    while($rowCorr = $searchCorr ->fetch_assoc()){
                        echo("<option value='" . $rowCorr['nameofCorr'] . "' class='dropDown'>
                            " . $rowCorr['nameofCorr'] . "
                        </option>");
                    }
    }


    function createDropDown(){
        $serverName = "localhost";
                    $username = "root";
                    $password = "Volleyball24%68";
                    $DBName = "accountDB";
                    
                    // Create connection
                    $_SESSION['conn'] = new mysqli($serverName, $username, $password, $DBName);
                    // Check connection
                    if ($_SESSION['conn']->connect_error) {
                      die("Connection failed: " . $_SESSION['conn'] -> connect_error);
                    }
                    
                    $echoString = "";
                    $numbOfCorrs = intval(($_SESSION['conn']->query("SELECT COUNT(nameofCorr) FROM corriculums;")->fetch_array(MYSQLI_NUM))[0]);
                    $searchCorr = $_SESSION['conn']->query("SELECT nameofCorr FROM corriculums;");
                    while($rowCorr = $searchCorr ->fetch_assoc()){
                        $index = 0;
                        $tableName = substr($rowCorr['nameofCorr'], 0, 1);
                        while(strpos(substr($rowCorr['nameofCorr'], $index++), " ") != FALSE){
                            $index = strpos(substr($rowCorr['nameofCorr'], $index++), " ") + 2;
                            $tableName .= substr($rowCorr['nameofCorr'], $index, 1);
                        }
                        $tableName .= "Table";
                        echo("<script>console.log('" . $tableName . "');</script>");



                        $numbOfCourses = intval(($_SESSION['conn']->query("SELECT COUNT(courseName) FROM " . $tableName . ";")->fetch_array(MYSQLI_NUM))[0]);
                        $searchCoursesNames = $_SESSION['conn']->query("SELECT * FROM " . $tableName . ";");
                        $searchCoursesDiscs = $_SESSION['conn']->query("SELECT courseDisc FROM " . $tableName .";");
                        while($row = $searchCoursesNames ->fetch_assoc()){
                        echo("<option value='" . $row['courseTable'] . "'>
                            " . $row['courseName'] . "
                        </option>");
                        }
                        
                        
                        
                        
                        //echo("</select>");


                    }
    }
?>