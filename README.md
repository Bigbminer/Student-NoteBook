# Student-NoteBook

## Functionality
We are a fun little group made for students by the students. Student NoteBook is a website with the goal to allow students to uplaod their notes a markups to help other people study for tests. It will allow others to add curriculums, courses, and any media for the course, like notes, tests, and pictures.
There is a high potencial for missuse so there will be an accounts feature. 

## How to use Student NoteBook
Unfortunately because this is an amiture build, the website may be challenging to enitiate. Here is a hopefully comprehensive step-by-step guide to start the website on your computer.

### 1. Download Files
Simple enough, download all of the media in the repository and place them in the one folder.

### 2. Set Up MySQL
If you don't have MySQL downloaded the website will not function. On mac you will need to use HomeBrew to instal and run MySQL on the terminal. I do not know the specifics of Windows when running MySQL. The web has plenty of examples on how to install MySQL onto the terminal. After installation, create a database by the name of `accountDB` and add a table by the name of `Corriculums` with the collumns `nameofCorr` as a char(50) and `nameOfTable` as a char(50) in that order. These will ensure the courses can be made and found throughout the site. Next, to allow for accounts to be saved and managed, create a table called `accountsTable` with the collumns `accountName` as a char(50), `accountPassword` as a char(50), `isTeacher` as a bit in that order. The rest of the tables will be autonomous. In the `Functions.php` file, put the corresponding data from your account when logging into MySQL. Leave `$serverName` empty we will come back to this later. 

### 3. Set Up PHP
Same with MySQL, install php onto the terminal. Then type "cd" along with the folder file path of the website files. Then to make the domain on the local computer, write "php -S localhost:8080". Return to the `Functions.php` file and initialize `$serverName` as "localhost". Have fun!

### 4. Extra
If you want to test the email stuff enter the `ContactUs.php` file and edit the email ID at the bottom.

## About the Developers
At the moment the one running the account is the only one working on this project. Find out more about me on LinkedIn and on the website.

