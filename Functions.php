<?php 
    function getSQL(){
        $serverName = "";
        $username = "";
        $password = "";
        $DBName = "accountDB";

        // Create connection
        $_SESSION['conn'] = new mysqli($serverName, $username, $password, $DBName);
        // Check connection
        if ($_SESSION['conn']->connect_error) {
            die("Connection failed: " . $_SESSION['conn'] -> connect_error);
        }
    }









    /* -------------------------------------------------------------------------------------------------------------------------------- */
    function curriculumMenu(){
        $echoString = "";
        $numbOfCorrs = intval(($_SESSION['conn']->query("SELECT COUNT(nameofCorr) FROM corriculums;")->fetch_array(MYSQLI_NUM))[0]);
        $searchCorr = $_SESSION['conn']->query("SELECT * FROM corriculums;");
        while($rowCorr = $searchCorr ->fetch_assoc()){
            echo("<div class='corriculum'>
                " . $rowCorr['nameofCorr'] . "
                <div class='classContainer'>");

                $tableName = $rowCorr['nameOfTable'];



                $numbOfCourses = intval(($_SESSION['conn']->query("SELECT COUNT(courseName) FROM " . $tableName . ";")->fetch_array(MYSQLI_NUM))[0]);
                $searchCoursesNames = $_SESSION['conn']->query("SELECT * FROM " . $tableName . ";");
                $searchCoursesDiscs = $_SESSION['conn']->query("SELECT courseDisc FROM " . $tableName .";");
                while($row = $searchCoursesNames ->fetch_assoc()){
                    echo("<button name='classB' value=". $row['courseTable'] ." class='classesDiv' style='text-decoration: none; text-align: left;'>
                        <div class='className'>" . $row['courseName'] . "</div>
                        <div class='classDescription'>" . substr($row['courseDisc'], 0, 30) . "...</div>
                    </button>");
                }
                echo("</div>
            </div>");
        }
        echo($echoString);
    }
?>